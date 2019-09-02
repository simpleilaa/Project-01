<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session','form_validation',));
		$this->load->helper(array('url','form','security'));
		$this->load->model(array('M_user','Users'));

	}

	public function index()
	{
		if ($this->session->userdata('statses') == "login") {
		redirect(base_url('channel'));
		}else{
		$this->load->view('V_login');
		}
	}

	public function login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		$cek = Users::where('username',$username)->where('password',$password)->get();
		// var_dump(count($cek));
		// return false;
		if (count($cek)>0) {
			if($cek[0]['role']=='user'){
				$data_session = array(
					'username' => $username,
					'password' => $password,
					'statses' => "login" 
					);
				$this->session->set_userdata($data_session);
				redirect(base_url('channel'));
			}else if($cek[0]['role']=='admin'){
				$data_session = array(
					'username' => $username,
					'password' => $password,
					'statses' => "admin" 
					);
				$this->session->set_userdata($data_session);
				redirect(base_url('admin'));
			}
			// print_r($data_session);
		}else{
			echo '
				<script>alert("invalid username or password");window.location.href="'.base_url().'";</script>
			';
			// redirect(base_url());
		}
	}
	public function logout(){
		$data_session = array(
				'username' => $username,
				'password' => $password,
				'statses' => "login" 
				);
		$this->session->unset_userdata($data_session);
		$this->session->sess_destroy();
		redirect(base_url());
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
