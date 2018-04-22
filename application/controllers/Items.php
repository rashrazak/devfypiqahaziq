<?php 

class Items extends CI_Controller {

    public function index(){

        // $this->input->get('itemid');
        // $this->load->view('viewitem');
    }
    public function view(){


        $id = $this->input->get('itemid');
        $data['item'] = $this->Fypmodel->read_item_customer($id);
        $data['item'] = $data['item'][0];
        $id           = $data['item']['userid'];
        // var_dump($id);exit;
        $data['company']= $this->Fypmodel->getCompanyDetails($id);
        $data['company'] = $data['company'][0];
        // var_dump($data);exit;   
        $this->load->view('viewitem', $data);
    }
    public function cart(){
        $cart = array();
        $cart['quantity'] = $this->input->post('quantity');
        $cart['email'] = $this->session->userdata('emailC');
        $cart['id'] = $this->input->post('id');
        //var_dump($cart);
        $this->Fypmodel->add_into_cart($cart);

        $result['data'] = $this->Fypmodel->list_from_cart($cart['email']);

        $this->load->view('viewCart',$result);



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
    public function submitPayment(){

        $items   = $this->input->post('items');
        $address   = $this->input->post('address');
        $price   = $this->input->post('totalprice');
        $emailx  = $this->input->post('email');
        $hp      = $this->input->post('hp');
        $path = './assets/receipt/';
        chmod($path, 0777);

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '';
        $config['max_height']  = '';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        
        $this->load->library('upload', $config);
        // var_dump($hp);exit;
        if ($this->upload->do_upload()) {
            $data = array('upload_data' => $this->upload->data());
            $datax = $this->upload->data();
            //var_dump($datax['file_name']);exit;
            $this->resize($data['upload_data']['full_path'],$data['upload_data']['file_name']);
        }else{
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);exit;
        }
            $return = $this->Fypmodel->payment_receive($datax['file_name'], $items ,$price, $emailx, $hp, $address);
            if ($return == true) {
                $this->Fypmodel->paid_cart($emailx);
                $this->session->set_flashdata('success','Succesfully Approved Thank You');
                redirect('Items/cart');
            }
        
        

    }
    public function search(){

        $search = $this->input->get('search');
        if (empty($search)) {
            $return['data'] = $this->Fypmodel->read_item_allSearch();
            $return['searchx'] = "";
        }else{
            $return['data'] = $this->Fypmodel->searchList($search);
            $return['searchx'] = $search;
             // var_dump($return);exit;
        }
       

        $this->load->view('viewSearch',$return);
    }
    public function history(){

        $email = $this->session->userdata('emailC');
        $return['data'] = $this->Fypmodel->historyList($email);
        $this->load->view('viewHistory',$return);
    }






}