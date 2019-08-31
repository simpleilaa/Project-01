<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session','form_validation',));
		$this->load->helper(array('url','form','security'));
		$this->load->model('M_user');

	}

	public function index()
	{
		if ($this->session->userdata('statses') == "admin") {
		redirect(base_url('admin'));
		}else{
		$this->load->view('admin/V_login');
		}
	}

	public function loginn(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		$cek=$this->M_user->cek_admin($username,$password)->num_rows();
		if ($cek>0) {
			
			$data_session = array(
				'username' => $username,
				'password' => $password,
				'statses' => "admin" 
				);
			$this->session->set_userdata($data_session);
			redirect(base_url('admin/dashboard'));
			// print_r($data_session);
		}else{
			redirect(base_url('admin'));
		}
	}
	public function logoutt(){
		$data_session = array(
				'username' => $username,
				'password' => $password,
				'statses' => "admin" 
				);
		$this->session->unset_userdata($data_session);
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}


}
