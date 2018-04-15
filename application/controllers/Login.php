<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function submitx()
	{
		//$this->load->model('Apartmentmodel');
		$this->form_validation->set_rules('email','Email','trim|required|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
	   //$verif = "admin";
		if($this->form_validation->run()== FALSE ){

			$data = array('errors' => validation_errors());

			$this->session->set_flashdata($data); //set_userdata

			redirect('Login');


		} else {

			$emailx =$this->input->post('email');

			$passwordx = $this->input->post('password'); 

			$user_id =$this->Fypmodel->get_user($emailx , $passwordx); //continue here 24/10/17w

			if ($this->input->post('submit') == "Login")
			  {
				   
				   if(!$user_id){

						$this->session->set_flashdata('login_fail','Registration Problem');
						redirect('Login');
						
					}elseif($user_id <2 ){
							 
						$user_data = array(						   
							'user_id'	=> $user_id ,
							'email'   	=> $emailx ,																		
							'logged_in' => true );
						   
							$this->session->set_userdata($user_data);
							//$this->session->set_flashdata('login_success','You are now logged in');
							
							redirect('Admin');
								
							}else{

								$user_data = array(
					
								'user_id' => $user_id ,
								'email' => $emailx ,
								'companyname'	=> $shopx,
								'logged_in' => true 
										);
								$this->session->set_userdata($user_data);
								//$this->session->set_flashdata('login_success','You are now logged in');
					
								redirect('Seller');
							}
					
			
		
		   
					} else{
							$this->session->set_flashdata('login_fail','Registration Problem');
						redirect('Welcome');

					   } 
					}
	}
}
