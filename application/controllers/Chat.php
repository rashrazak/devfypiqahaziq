<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function chatAdmin($userEmail=''){

		$emailAdmin = $this->session->userdata('email');
		$data['email'] = $emailAdmin;
		$data['users'] = $users;
		$this->load->view('admin/chat', $data);

	}
	public function chatSeller(){
		$emailAdmin = 'fypiqa@gmail.com';
		$emailUser = $this->session->userdata('emailC');
		$nameUser = $this->session->userdata('nameC');
		$data['email'] = $emailUser;
		$data['emailAdmin'] = $emailAdmin;
		$data['namex'] = $nameUser;
		// var_dump($nameUser);exit;
		$this->load->view('chat', $data);

	}
	public function chatCustomer(){
		$emailAdmin = 'fypiqa@gmail.com';
		$emailUser = $this->session->userdata('email');
		$data['email'] = $emailUser;
		$data['emailAdmin'] = $emailAdmin;
		$this->load->view('seller/chat', $data);

	}



}