<?php
Class Login_model extends CI_Model
{

	
	public function getAllUsers(){
		
		$this->db->select('*');
        $this->db->from('users');
        
        return $this->db->get()->result();
	}
	
	public function getAllUsers_id($email, $password){
		
		$this->db->select('email, password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        
        return $this->db->get()->result();
	}
	
	public function getAlljabatan_all(){
		
		$this->db->select('*');
        $this->db->from('jabatan');
        
        return $this->db->get()->result();
	}
	
	public function getAlljabatan($nama_jabatan){
		
		$this->db->select('*');
        $this->db->from('jabatan');
        $this->db->where('nama_jabatan', $nama_jabatan);
        
        return $this->db->get()->result();
	}
	
	public function tampil_warna(){
		
		return $this->db->get('warna')->result();
	}



}