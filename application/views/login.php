<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

	$this->load->view('templates/headermain');
?>

<?php 
	$attributes = array('id'=>'login_form','class'=>'form_horizontal'); ?>
	

<?php 
		
		if($this->session->flashdata('errors')):

		echo '<font color="red">Error ERORRS</font>';
		
		 endif;
		 if($this->session->flashdata('successRegister')):
			
		echo $this->session->flashdata('successRegister');
		
			endif;
			

 ?>


<?php
	echo form_open('Login/submitx',$attributes); //form location ke controller,,
?>

<style type="text/css">

</style>
<br><br> 
<center>
	 <!-- <img src="<?php echo base_url();?>image/header1.jpg" alt="Logo" style="width:600px;height:200px;"> -->
</center>
<section  class="content-section text-center">
<div class="container " >
        <div class="row">
            <div class="col-lg-8 mx-auto">
               
                   
                        <h3 >Please Login</h3>
                   
                    <div class="panel-body">
<div class="form-group">



			<?php //echo form_label('Username');
				$data = array('class' => 'form-control' , 
						'placeholder' => 'E-mail', 
						'name'=>'email',
						'type' => 'email', 
						'autofocus' 
					);

			 ?>	
			<?php echo form_input($data); ?>




</div>
<div class="form-group">



			<?php //echo form_label('Username');
				$data2 = array('class' => 'form-control' , 
						'placeholder' => 'Password', 
						'name'=>'password',
						'type' => 'password'

					);

			 ?>	
			<?php echo form_password($data2); ?>




</div> 
<div class="form-group">



			<?php //echo form_label('Username');
				$data3 = array('class' => 'btn btn-default btn-lg' , 						
						'name'=>'submit',
						'value' => 'Login'

					);

			 ?>	
			<?php echo form_submit($data3); ?>


<a class="pull-right" href="<?php echo site_url('Register/seller') ?>">Register?</a>

</div>


<?php 
	
	if($this->session->flashdata('login_fail')):

		$remind =$this->session->flashdata('login_fail');
		echo '<font size="3" color="red">'.$remind.'</font>';


	endif;

	echo form_close();

?>
   </div>
                </div>
</section>


				
                       <?php 
	$this->load->view('templates/footermain');
?>

          