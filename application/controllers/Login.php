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
    function resize($path,$file){
        $config['image_library']='gd2';
        $config['source_image']=$path ;
        $config['create_thumb']=FALSE ;
        $config['maintain_ratio']=TRUE ;
        $config['width']=500 ;
        $config['height']=700 ;
        $config['new_image']='./assets/imagex/'.$file ;
        
        $this->load->library('image_lib',$config);
        $this->image_lib->resize();
    }
	public function manualLogin(){

		$data = $this->input->post();
		$email = $data['email'];
		$password = $data['password'];

		$return = $this->Fypmodel->loginCustomer($email);

		// var_dump($return);exit; 

			$set_data = array(		
			'nameC'     => $return['name'] ,
			'emailC'    => $email ,
			'hpC'	    => $return['hp'],
			'photourlC' => $return['photourl'] 
			);

			$this->session->set_userdata($set_data);
			redirect('/');
	}
	public function manualSignUp(){

		$datay = $this->input->post();
		// var_dump($datay);exit;
		if (empty($datay)) {

			 $this->load->view('signup');
		}else{
			$email = $datay['email'];
			$password = $datay['password'];
			$fname = $datay['fname'];


		 	$path = './assets/imagex/signup';
	        chmod($path, 0777);

	        $config['upload_path'] = $path;
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = '1000';
	        $config['max_width']  = '';
	        $config['max_height']  = '';
	        $config['overwrite'] = TRUE;
	        $config['remove_spaces'] = TRUE;
	        
	        $this->load->library('upload', $config);

	        if ($this->upload->do_upload()) {
	            $data = array('upload_data' => $this->upload->data());
	            $datax = $this->upload->data();
	            // var_dump($datax['file_name']);exit;
	            $this->resize($data['upload_data']['full_path'],$data['upload_data']['file_name']);
	            
	            $return = $this->Fypmodel->signUp($datax['file_name'], $email, $password, $fname);
	            if ($return == true) {
	            	redirect('/');
	            }
	        }
		}
	}
}
