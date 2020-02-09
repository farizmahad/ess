<?php
Class HRD_model extends CI_Model
{

function get_users(){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->join('gedung','divisi.id_gedung = gedung.id_gedung');
		return $this->db->get()->result();

	}

	function history_job_profile($id){

		$this->db->select('*');
		$this->db->from('history_job_profile');
		$this->db->join('users','users.id = history_job_profile.id_user');
		$this->db->join('divisi','history_job_profile.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','history_job_profile.id_jabatan = jabatan.id_jabatan');
		$this->db->where('history_job_profile.id_user',$id);
		return $this->db->get()->result();

	}

	function history_compensation($id){

		$this->db->select('*');
		$this->db->from('profile_history_compensation');
		$this->db->join('users','users.id = profile_history_compensation.id_user');
		$this->db->join('jabatan','profile_history_compensation.id_jabatan = jabatan.id_jabatan');
		$this->db->where('profile_history_compensation.id_user',$id);
		return $this->db->get()->result();

	}

	function cek_users($id){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->join('gedung','divisi.id_gedung = gedung.id_gedung');
		$this->db->where('id',$id);
		return $this->db->get()->result();

	}

function get_jabatan(){

		$this->db->select('*');
		$this->db->from('jabatan');
		return $this->db->get()->result();

	}
function get_divisi(){

		$this->db->select('*');
		$this->db->from('divisi');
		return $this->db->get()->result();

	}


	  function insert_history_job($id_divisi,$id_jabatan,$type,$id_user,$reason,$tanggal,$tanggal_input){
   
    $this->db->set('id_user',$id_user);
    $this->db->set('date_update',$tanggal);
    $this->db->set('id_divisi',$id_divisi);
    $this->db->set('id_jabatan',$id_jabatan);
    $this->db->set('type',$type);
    $this->db->set('reason',$reason);
     $this->db->set('tanggal_input',$tanggal_input);
    $this->db->insert('history_job_profile');
  }
 

  function insert_compensation($id_jabatan,$primary_compensation,$id_history_job,$id_user,$tanggal_requi,$reason,$base_pay,$round){
   
    $this->db->set('date_update',$tanggal_requi);
    $this->db->set('reason',$reason);
    $this->db->set('base_pay',$base_pay);
    $this->db->set('persent_change',$round);
    $this->db->set('primary_compensation',$primary_compensation);
    $this->db->set('currency','Rp');
    $this->db->set('id_user',$id_user);
     $this->db->set('id_jabatan',$id_jabatan);
    $this->db->insert('profile_history_compensation');
  }


  function update_history_job($id_history_job,$id_divisi,$id_jabatan,$type,$id_user,$reason,$tanggal_requi)
  {

    $this->id_divisi  =  $id_divisi;
    $this->id_jabatan =  $id_jabatan;
    $this->type       =  $type;
    $this->reason     =  $reason;
    $this->date_update =  $tanggal_requi;
    /*
    $this->id_jabatan =  $id_jabatan;
    $this->type       =  $type;
    $this->reason     =  $reason;
    $this->tanggal    =  $tanggal_requi;
    */
    $this->db->update('history_job_profile', $this, array('id_history_job' => $id_history_job)); 
  }


   function hapus_history($id)
  {
	$this->db->where('id_history_job', $id);
    $this->db->delete('history_job_profile');	
  }

   function hapus_compensation($id)
  {
	$this->db->where('id_history_com', $id);
    $this->db->delete('profile_history_compensation');	
  }

  function get_history_profile($id){

		$this->db->select('*');
		$this->db->from('history_job_profile');
		$this->db->where('id_history_job', $id);
		return $this->db->get()->result();

	}



  function update_compensation($id_jabatan,$primary_compensation,$id_history_job,$id_user,$tanggal_requi,$reason,$base_pay,$persen,$id_history_com)
  {

    $this->id_jabatan  =  $id_jabatan;
    $this->reason      =  $reason;
    $this->date_update =  $tanggal_requi;
    $this->base_pay    =  $base_pay;
    $this->persent_change    =  $persen;
    $this->primary_compensation    =  $primary_compensation;

    /*
    /*
    $this->id_jabatan =  $id_jabatan;
    $this->type       =  $type;
    $this->reason     =  $reason;
    $this->tanggal    =  $tanggal_requi;
    */
    $this->db->update('profile_history_compensation', $this, array('id_history_COM' => $id_history_com)); 
  }

function get_compensation_id($id){

		$this->db->select('*');
		$this->db->from('profile_history_compensation');
		$this->db->join('users','users.id = profile_history_compensation.id_user');
		$this->db->join('jabatan','profile_history_compensation.id_jabatan = jabatan.id_jabatan');
		$this->db->where('profile_history_compensation.id_history_com',$id);
		return $this->db->get()->result();

	}

  function tampil_satu_users($id){

    $this->db->select('users.ID_pegawai,users.first_name,users.id_divisi,users.id_jabatan,users.jenis_kelamin,users.phone,users.id_line_manajer,users.status_pegawai,users.tanggal_masuk,users.fte,users.id_provinsi_lahir,users.id_kota_lahir,users.status_pernikahan,users.id,users.agama,users.status_kewarganegaraan,users.email');
    $this->db->from('users');
    $this->db->where('users.id',$id);
    return $this->db->get()->result();

  }

  function tampil_provinsi(){

    $this->db->select('*');
    $this->db->from('wilayah_provinsi');
    return $this->db->get()->result();

  }
  function tampil_kota(){

    $this->db->select('*');
    $this->db->from('wilayah_kabupaten');
    return $this->db->get()->result();

  }


  function ubah_data_pegawai($id_pegawai,$nama_pegawai,$id_divisi,$id_jabatan,$id_provinsi_lahir,$id_kota_lahir,$status_pernikahan,$agama,$status_kewarganegaraan,$jenis_kelamin,$perusahaan,$telepon,$atasan_langsung,$status_pegawai,$tanggal_masuk,$fte,$id,$email){



       $this->ID_pegawai =  $id_pegawai;
       $this->first_name =  $nama_pegawai;
       $this->id_divisi =  $id_divisi;
       $this->id_jabatan =  $id_jabatan;
       $this->jenis_kelamin =  $jenis_kelamin;
       $this->company =  $perusahaan;
       $this->phone =  $telepon;
       $this->id_line_manajer =  $atasan_langsung;
       $this->status_pegawai =  $status_pegawai;
       $this->tanggal_masuk =  $tanggal_masuk;
        $this->fte =  $fte;
        $this->id_provinsi_lahir =  $id_provinsi_lahir;
        $this->email =  $email;
        $this->id_kota_lahir =  $id_kota_lahir;
        $this->status_pernikahan =  $status_pernikahan;
         $this->agama =  $agama;
         $this->status_kewarganegaraan =  $status_kewarganegaraan;
       $this->db->update('users', $this, array('id' => $id)); 
  }
    

  function tambah_data_pegawai($id_pegawai,$nama_pegawai,$id_divisi,$id_jabatan,$id_provinsi_lahir,$id_kota_lahir,$status_pernikahan,$agama,$status_kewarganegaraan,$jenis_kelamin,$perusahaan,$telepon,$atasan_langsung,$status_pegawai,$tanggal_masuk,$fte,$email){

        $this->db->set('ID_pegawai',$id_pegawai);
        $this->db->set('first_name',$nama_pegawai);
        $this->db->set('id_divisi',$id_divisi);
        $this->db->set('id_jabatan',$id_jabatan);
         $this->db->set('email',$email);
        $this->db->set('jenis_kelamin',$jenis_kelamin);
        $this->db->set('company',$perusahaan);
        $this->db->set('phone',$telepon);
        $this->db->set('id_line_manajer',$atasan_langsung);
         $this->db->set('status_pegawai',$status_pegawai);
         $this->db->set('tanggal_masuk',$tanggal_masuk);
         $this->db->set('fte',$fte);
         $this->db->set('id_provinsi_lahir',$id_provinsi_lahir);
         $this->db->set('id_kota_lahir',$id_kota_lahir);
         $this->db->set('status_pernikahan',$status_pernikahan);
          $this->db->set('agama',$agama);
         $this->db->set('status_kewarganegaraan',$status_kewarganegaraan);
        $this->db->insert('users');

  }

}