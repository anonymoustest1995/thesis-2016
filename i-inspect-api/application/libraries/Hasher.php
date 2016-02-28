<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hasher {

 
    private $PBKDF2_HASH_ALGORITHM = "sha256";
	private $PBKDF2_ITERATIONS = 999;
	private $PBKDF2_SALT_BYTE_SIZE =  18;
	private $PBKDF2_HASH_BYTE_SIZE =  18;
	private $HASH_SECTIONS = 4;
	private $HASH_ALGORITHM_INDEX = 0;
	private $HASH_ITERATION_INDEX = 1;
	private $HASH_SALT_INDEX =  2;
	private $HASH_PBKDF2_INDEX = 3;


	/**
    *check if username exist
    *
    *@param username
    *@return database items
    */
    public function authLogin ($username, $password)
    {
    	$CI = & get_instance();
  		$CI->load->model('users_model');
   		$user = $CI->users_model->get_users_credential($username);

        $verify = $this->validatePassword($password, @$user->user_password );

        if ($verify)
        {
        	$CI->session->set_userdata(
        								array(
					                    'user_id' 		=> $user->user_id,
					                    'user_username' => $user->user_username,
					                    'user_firstname'=> $user->user_firstname,
					                    'user_lastname' => $user->user_lastname,
					                    'user_email' 	=> $user->user_email,
					                    'user_position' => $user->user_position_link,
					                    'is_logged_in' 	=> true,
                						)
                					);

        	return true;
        }
        else
        {
        	return false;
        }

    }

	
	/**
	*ceates hash
	*
	*/
	public function createHash($password)
		{
		    $salt = base64_encode(mcrypt_create_iv($this->PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
		    return $this->PBKDF2_HASH_ALGORITHM . ":" . $this->PBKDF2_ITERATIONS . ":" .  $salt . ":" . 
		        base64_encode($this->pbkdf2(
		            $this->PBKDF2_HASH_ALGORITHM,
		            $password,
		            $salt,
		            $this->PBKDF2_ITERATIONS,
		            $this->PBKDF2_HASH_BYTE_SIZE,
		            true
		        ));
		}


	/**
	*check if password is valid
	*
	*/
	public function validatePassword($password, $correct_hash)
		{
		    $params = explode(":", $correct_hash);
		    if(count($params) < $this->HASH_SECTIONS)
		       return false; 
		    $pbkdf2 = base64_decode($params[$this->HASH_PBKDF2_INDEX]);
		    return $this->slow_equals(
		        $pbkdf2,
		        $this->pbkdf2(
		            $params[$this->HASH_ALGORITHM_INDEX],
		            $password,
		            $params[$this->HASH_SALT_INDEX],
		            (int)$params[$this->HASH_ITERATION_INDEX],
		            strlen($pbkdf2),
		            true
		        )
		    );
		}


	private function slow_equals($a, $b)
		{
		    $diff = strlen($a) ^ strlen($b);
		    for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
		    {
		        $diff |= ord($a[$i]) ^ ord($b[$i]);
		    }
		    return $diff === 0; 
		}


	private function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
		{
		    $algorithm = strtolower($algorithm);
		    if(!in_array($algorithm, hash_algos(), true))
		        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
		    if($count <= 0 || $key_length <= 0)
		        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

		    if (function_exists("hash_pbkdf2")) {
		        
		        if (!$raw_output) {
		            $key_length = $key_length * 2;
		        }
		        return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
		    }

		    $hash_length = strlen(hash($algorithm, "", true));
		    $block_count = ceil($key_length / $hash_length);

		    $output = "";
		    for($i = 1; $i <= $block_count; $i++) {
		        
		        $last = $salt . pack("N", $i);
		        
		        $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
		        
		        for ($j = 1; $j < $count; $j++) {
		            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
		        }
		        $output .= $xorsum;
		    }

		    if($raw_output)
		        return substr($output, 0, $key_length);
		    else
		        return bin2hex(substr($output, 0, $key_length));
		}



}

?>