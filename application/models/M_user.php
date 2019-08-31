<?php 
 
class M_user extends CI_Model{

	function cek_login($username,$password){
		return $this->db->query("SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' LIMIT 1");
	}
	

	function cek_admin($username,$password){
		return $this->db->query("SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password' LIMIT 1");
	}

	

}