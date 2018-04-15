<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    

    public function index()
	{
        if($this->session->userdata('logged_in')){
            $data['logout'] = 'component/logout'; //data scoping
             $this->load->view('admin/home',$data);
        

        }else{

            redirect('Login');

        }
    }
    public function view_seller()
	{
        if($this->session->userdata('logged_in')){
            $data['logout'] = 'component/logout'; //data scoping
             $this->load->view('admin/view_seller',$data);
        

        }else{

            redirect('Login');

        }
    }

    public function view_notification()
	{
        if($this->session->userdata('logged_in')){
            $data['logout'] = 'component/logout'; //data scoping
             $this->load->view('admin/view_notification',$data);
        

        }else{

            redirect('Login');

        }
    }

    public function view_buyer()
	{
        if($this->session->userdata('logged_in')){
            $data['logout'] = 'component/logout'; //data scoping
             $this->load->view('admin/view_buyer',$data);
        

        }else{

            redirect('Login');

        }
    }
    public function view_report()
	{
        if($this->session->userdata('logged_in')){
            $data['logout'] = 'component/logout'; //data scoping
             $this->load->view('admin/view_report',$data);
        

        }else{

            redirect('Login');

        }
    }

    /* 
    View -> seller/user/notification/report  ->(click) -> 
    update -> update_seller/update_user/update_notification/update_report ->
    modify/delete  
    */
    
    public function update(){
        
        if($this->session->userdata('logged_in')){
            
            $data['logout'] = 'component/logout'; //data scoping
            
            $this->load->view('seller/update',$data);
        

        }else{

            redirect('Login');
            
            }
    }

    public function update_seller(){

        if($this->session->userdata('logged_in')){
            
            $data['logout'] = 'component/logout'; //data scoping
            $this->load->view('seller/update_seller',$data);
        

        }else{

            redirect('Login');
            
            }

    }

    public function update_notification(){
        
        if($this->session->userdata('logged_in')){
            
            $data['logout'] = 'component/logout'; //data scoping
            $this->load->view('seller/update_notification',$data);
        

        }else{

            redirect('Login');
            
            }         
    
    
    }

    public function update_buyer(){
        
        if($this->session->userdata('logged_in')){
            
            $data['logout'] = 'component/logout'; //data scoping
            $this->load->view('seller/update_buyer',$data);
        

        }else{

            redirect('Login');
            
            }         
    
    
    }
    public function update_report(){
        
        if($this->session->userdata('logged_in')){
            
            $data['logout'] = 'component/logout'; //data scoping
            $this->load->view('seller/update_buyer',$data);
        

        }else{

            redirect('Login');
            
            }         
    
    
    }




























}