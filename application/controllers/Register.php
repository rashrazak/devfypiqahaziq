<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function seller()
	{
		$this->load->view('register/sellerregister'); //register in login page
    }

    public function seller2()
	{
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password1]');
        $this->form_validation->set_rules('password1', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('fname', 'Full Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('icpp', 'IC / Company Registration', 'required');
       
        $this->form_validation->set_rules('hp', 'Nombor Telefon', 'required');
        $this->form_validation->set_rules('account', 'Akaun Bank', 'required');
        
        if($this->form_validation->run()== FALSE ){

        $data = array('errors' => validation_errors());

        $this->session->set_flashdata($data); //set_userdata

        redirect('Register/seller2');
        }else{
           
               
                 $fnamex =$this->input->post('fname');
                $addressx = $this->input->post('address');
                $icppx = $this->input->post('icpp'); 
                
                $hpx = $this->input->post('hp');
                $maybankx = $this->input->post('account'); 
                $passwordx = $this->input->post('password');
                $emailx = $this->input->post('email');
                $user_id =$this->Fypmodel->register_user( $fnamex, $addressx, $icppx, $hpx, $maybankx, $emailx , $passwordx);
                echo $user_id;
                $this->Fypmodel->register_sales($user_id);
                $data1 = array('successRegister' => 'Registration is success ! please login');
                redirect('Login', $data1);
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

    public function registeritem()
	{   
        $this->form_validation->set_rules('itemname', 'Item Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('id', 'UserID', 'required');

        $item   = $this->input->post('itemname');
        $desc   = $this->input->post('description');
        $price  = $this->input->post('price');
        $id     = $this->session->userdata('user_id');
        $categ  = $this->input->post('categories');

        $path = './assets/imagex/';
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
            //var_dump($datax['file_name']);exit;
            $this->resize($data['upload_data']['full_path'],$data['upload_data']['file_name']);
            
            $return = $this->Fypmodel->ins_item($datax['file_name'], $item, $desc, $price, $id, $categ);
            if ($return == true) {
                $this->session->set_flashdata('success','Succesfully Added');
                redirect('Seller/add_items');
            }
        }
        
 
    }
    public function updateitem()
	{   
        $this->form_validation->set_rules('itemname', 'Item Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('id', 'id', 'required');

        $item   = $this->input->post('itemname');
        $desc   = $this->input->post('description');
        $price  = $this->input->post('price');
        $id     = $this->input->post('id');
        $url    = $this->input->post('url');
        $categ  = $this->input->post('categories');
        $path = './assets/imagex/';
        chmod($path, 0777);

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '';
        $config['max_height']  = '';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $datax = array();
        if ($this->upload->do_upload()) {
            $data = array('upload_data' => $this->upload->data());
            $datax = $this->upload->data();
            //var_dump($datax['file_name']);exit;
            $this->resize($data['upload_data']['full_path'],$data['upload_data']['file_name']);
        }else{
            $datax['file_name'] = $url;

        }
            
        $return = $this->Fypmodel->upd_item($datax['file_name'], $item, $desc, $price, $id, $categ);
       
        if ($return == true) {
            
            $this->session->set_flashdata('success','Succesfully Added');
            redirect('Seller/updateitem?itemid='.$id);
        }
        
    }
    
    
    public function buyer()
	{
		//$this->load->view('sellerRegister'); //register in login page
	}
}
