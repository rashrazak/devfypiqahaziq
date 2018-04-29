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
            $search = $this->input->get('search');
                if (empty($search)) {
                    $return['data'] = $this->Fypmodel->read_user_allSearch();
                    $return['searchx'] = "";
                }else{
                    $return['data'] = $this->Fypmodel->searchListUser($search);
                    $return['searchx'] = $search;
                     // var_dump($return);exit;
                }
                // var_dump($return);exit;
             $this->load->view('admin/view_seller',$return);
        

        }else{

            redirect('Login');

        }
    }

    public function seller_details()
    {
        if($this->session->userdata('logged_in')){
            $seller_details = $this->input->get('seller');
            $return['data'] = $this->Fypmodel->upd8seller2($seller_details);
            // var_dump($return['data']['id']);exit;
            $return['items'] = $this->Fypmodel->getItemsAdmin($return['data']['id']);
            
            // foreach ($return['items'] as $key => $items) {
            //     # code...
            // }
            // var_dump($return);exit;
             $this->load->view('admin/seller_details',$return);
        

        }else{

            redirect('Login');

        }
    }

    public function view_receipt()
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