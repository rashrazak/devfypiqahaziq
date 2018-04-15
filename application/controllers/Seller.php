<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

   

    public function index(){
        if($this->session->userdata('logged_in')){
            $user_id = $this->session->userdata('user_id');
            $data['recent']= $this->Fypmodel->recentBuyer($user_id);
            // $data['previous']= $this->Fypmodel->previousBuyer($user_id);
            $data['shopName']= $this->Fypmodel->shopName($user_id);
            // var_dump($data);exit;
            $this->load->view('seller/home', $data);
            

        }else{

            redirect('Login');

        }
    }    
    public function update(){

        if($this->session->userdata('logged_in')){
            
                $user_id = $this->session->userdata('user_id');
                $data['results']= $this->Fypmodel->upd8seller($user_id);
                $this->load->view('seller/update',  $data);           
            
        }else{

            echo "error occured";

        }
    }

    public function updateitem(){

        if($this->session->userdata('logged_in')){
                $id = $this->input->get('itemid');        
                $data['item']= $this->Fypmodel->read_item_update($id);
                $this->load->view('seller/updateitem',  $data);           
            
        }else{

            echo "error occured";

        }
    }
    public function update_process(){

        $this->form_validation->set_rules('email','Email');
        $this->form_validation->set_rules('password', 'Password');

        $this->form_validation->set_rules('fname', 'Nama' );
        $this->form_validation->set_rules('shopname', 'Shop Name' );
        $this->form_validation->set_rules('companyname', 'Company Name' );
        $this->form_validation->set_rules('icpp', 'IC atau Passport');

        $this->form_validation->set_rules('hp', 'Nombor Telefon' );
        $this->form_validation->set_rules('maybankaccount', 'Akaun Bank');

        if($this->form_validation->run()== FALSE ){

        $data = array('errors' => validation_errors());

        $this->session->set_flashdata($data); //set_userdata

        redirect('Seller/update');


        }else{

        $fnamex =$this->input->post('fname');                   
        $icppx = $this->input->post('icpp'); 

        $hpx = $this->input->post('hp');
        $maybankx = $this->input->post('maybankaccount');
        $shopx = $this->input->post('shopname');
        $companyx = $this->input->post('companyname'); 
        $passwordx = $this->input->post('password');
        $emailx = $this->input->post('email');
        $idx = $this->input->post('id');

        $this->Fypmodel->upd8seller_confirm([

        'emel' => $emailx,
        'password' => $passwordx,
        'fname' => $fnamex,
        'hp' => $hpx,
        'shopname'=> $shopnx,
        'companyname'=> $companyx,
        'icpp' => $icppx,
        'hp' => $hpx,
        'icpp' => $icppx,
        'maybankaccount' => $maybankx




        ],$idx);

        $this->session->set_flashdata('upd8','Your information have been updated');

        redirect('Seller/update');

        }
              
              



    }
    public function cart(){
        
        if($this->session->userdata('logged_in')){

        $data['logout'] = 'component/logout'; //data scoping
        $this->load->view('seller/update',$data);


        }else{

        redirect('Login');

        }
    }
    public function buy(){

        if($this->session->userdata('logged_in')){

        $data['logout'] = 'component/logout'; //data scoping
        $this->load->view('seller/buy',$data);


        }else{

        redirect('Login');

        }
    }
    //items
    public function items(){
        if($this->session->userdata('logged_in')){
            
            $user_id = $this->session->userdata('user_id');
            $data['data'] = $this->Fypmodel->read_item($user_id);
            //var_dump($data);exit;
            $this->load->view('seller/items',$data);

           

        }else{

            redirect('Login');

        }
    }
    public function add_items(){
        if($this->session->userdata('logged_in')){
            
            $user_id = $this->session->userdata('user_id');
            $data['results']= $this->Fypmodel->read_item($user_id);
            $this->load->view('seller/additem',$data);

        }else{

            redirect('Login');

        }
    }
    public function del_items(){

    }
    public function upd_items(){

    }




























}