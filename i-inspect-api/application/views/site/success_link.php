


<div class="col-sm-offset-4 col-sm-8">
	<?=$user->user_username ?>
</div>

<div class="col-sm-offset-4 col-sm-8">
	<a href="<?= base_url() ?>qr_code_generate/print_qr/<?= $user->user_id ?>">Print Qr Code</a>
</div>

<?php if(!empty($user->user_id)) ?>
	<a href="<?= base_url() ?>assets/images/qr_codes/<?= $user->user_id ?>"> QR code LINK</a>
