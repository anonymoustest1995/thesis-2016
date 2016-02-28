<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Qr_code extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('qr_model', 'user');
        $this->load->library('ciqrcode');
        $this->config->load('qr_code');
    }

public function slink() {

header("Content-Type: image/png");
$params['data'] = 'This is a text to encode become QR Code';
$this->ciqrcode->generate($params);
}


}
