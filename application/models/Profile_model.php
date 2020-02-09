<?php

Class Profile_model extends CI_Model

{



  function get_users($ID){



		$this->db->select('divisi.nama_divisi,users.id,users.username,users.email,users.first_name,users.last_name,users.company,users.phone,users.foto,users.id_divisi,users.id_jabatan,users.id_line_manajer,jabatan.nama_jabatan');

		$this->db->from('users');

		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');

		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');

		$this->db->where('users.id',$ID);

		return $this->db->get()->result();

	}


	
	 function users_divisi($id_divisi){

		$this->db->select('divisi.nama_divisi,users.id,users.username,users.email,users.first_name,users.last_name,users.company,users.phone,users.foto,users.id_divisi,users.id_jabatan,users.id_line_manajer,jabatan.nama_jabatan');
		$this->db->from('users');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','jabatan.id_jabatan = users.id_jabatan');
		$this->db->where('users.id_divisi',$id_divisi);
		$this->db->order_by('id_line_manajer','ASC');
		return $this->db->get()->result();
	}

	function get_divisi(){

		$this->db->select('*');
		$this->db->from('divisi');
		return $this->db->get()->result();
	}

	function get_jabatan(){

		$this->db->select('*');
		$this->db->from('jabatan');
		return $this->db->get()->result();
	}

	function atasan_langsung(){

		$this->db->select('*');
		$this->db->from('users_groups');
		$this->db->join('groups','groups.id = users_groups.group_id');
		$this->db->join('users','users_groups.user_id = users.id');
		$this->db->join('divisi','divisi.id_divisi = users.id_divisi');
		$this->db->where('groups.name','manager');
		return $this->db->get()->result();
	}


   function select_user_id($id){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('divisi','divisi.id_divisi = users.id_divisi');
		$this->db->join('jabatan','jabatan.id_jabatan = users.id_jabatan');
		return $this->db->get()->result();
	}


	function delete_user($id){
		
		$this->db->where('id', $id);
		$this->db->delete('users');
	}




}