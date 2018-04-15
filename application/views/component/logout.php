<?php 

	echo form_open('register/logout');

	$data = array(
		'class' =>'btn btn-primary btn-sm ' ,
		'value' => 'LOGOUT'  
		);

	//$data = '<a><i class="fa fa-sign-out fa-fw"></i> Logout</a>';

	
	echo form_submit($data);
	echo form_close();

	?>