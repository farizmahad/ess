<?php

Class Profile_detail_model extends CI_Model

{



   function get_users($ID){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->join('gedung','divisi.id_gedung = gedung.id_gedung');
		$this->db->where('users.id',$ID);
		return $this->db->get()->result();

	}



   function get_users_aktif(){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->join('gedung','divisi.id_gedung = gedung.id_gedung');
		$this->db->where('users.active','1');
		return $this->db->get()->result();

	}
/*
	 function get_feedback($ID){

		$this->db->select('*');
		$this->db->from('feedback');
		$this->db->join('users','users.id = feedback.id_pengirim');
		$this->db->where('feedback.id_penerima',$ID);
		return $this->db->get()->result();

	}
	*/

	 function get_history_job_profile($ID){

		$this->db->select('*');
		$this->db->from('history_job_profile');
		$this->db->join('users','users.id = history_job_profile.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('history_job_profile.id_user',$ID);
		return $this->db->get()->result();

	}

	 function get_history_compensation($ID){

		$this->db->select('*');
		$this->db->from('profile_history_compensation');
		$this->db->join('users','users.id = profile_history_compensation.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('profile_history_compensation.id_user',$ID);
		return $this->db->get()->result();

	}

	function get_goal($ID,$status_selesai){

		$this->db->select('*');
		$this->db->from('goal');
		$this->db->join('category_goal','goal.id_category_goal = category_goal.id_category_goal');
		$this->db->join('users','users.id = goal.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('goal.id_user',$ID);
		if($status_selesai==0 or $status_selesai==1){
             $this->db->where('goal.status_selesai','0');
             $this->db->or_where('goal.status_selesai','1');
		}else{
		$this->db->where('goal.status_selesai',$status_selesai);
	    }
		return $this->db->get()->result();

	}


	function get_goal_detail($ID){

		$this->db->select('*');
		$this->db->from('goal');
		$this->db->join('users','users.id = goal.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->join('category_goal','goal.id_category_goal = category_goal.id_category_goal');
		$this->db->where('goal.id_goal',$ID);
		return $this->db->get()->result();

	}


	function get_goal_discussion($ID){

		$this->db->select('*');
		$this->db->from('goal_discussion');
        $this->db->join('goal','goal.id_goal = goal_discussion.id_goal');
		$this->db->join('users','users.id = goal_discussion.id_pengirim');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('goal_discussion.id_goal',$ID);
		return $this->db->get()->result();

	}

	function get_competencies($ID){

		$this->db->select('*,users.id as user_id');
		$this->db->from('competencies');
		$this->db->join('users','users.id = competencies.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('competencies.id_user',$ID);
		return $this->db->get()->result();

	}



	function get_development_items($ID,$limit="" , $offset=""){

		$this->db->select('*,users.id as user_id,development_penerima.status as status_penerima');
		$this->db->from('development');
		$this->db->join('development_penerima','development.development_id = development_penerima.development_id');
		$this->db->join('users','users.id = development.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->join('goal','goal.id_goal = development.parent');
		if($limit){
			$this->db->limit($limit,$offset);
		}
		$this->db->where('development.id_user',$ID);
		$this->db->where('development_penerima.status >0');
		$this->db->where('development_penerima.status !=','7');
		$this->db->limit('5');
		$this->db->order_by('tanggal','DESC');
		return $this->db->get()->result();

	}


	function get_development_items_penerima($ID,$limit="" , $offset=""){

		$this->db->select('*,users.id as user_id,development_penerima.status as status_penerima');
		$this->db->from('development_penerima');
		$this->db->join('development','development.development_id = development_penerima.development_id');
		$this->db->join('users','users.id = development.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->join('goal','goal.id_goal = development.parent');
		if($limit){
			$this->db->limit($limit,$offset);
		}
		$this->db->where('development_penerima.id_penerima',$ID);
		return $this->db->get()->result();

	}




	function get_parent_development($id_parent){

		$this->db->select('*,users.id as user_id');
		$this->db->from('development');
		$this->db->join('users','users.id = development.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('development.development_id',$id_parent);
		return $this->db->get()->result();

	}


		function get_development(){

		$this->db->select('*,users.id as user_id');
		$this->db->from('development');
		$this->db->join('users','users.id = development.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		return $this->db->get()->result();

	}


		function get_feedback($ID){

		$this->db->select('*,users.id as user_id');
		$this->db->from('feedback');
	    $this->db->join('question','question.id_question = feedback.id_question');
		$this->db->join('users','users.id = feedback.id_pengirim');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('feedback.id_penerima',$ID);
		return $this->db->get()->result();

	}


      	function get_feedback_detail($ID){

		$this->db->select('*');
		$this->db->from('feedback');
		$this->db->join('question','question.id_question = feedback.id_question');
		$this->db->join('users','users.id = feedback.id_pengirim');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('feedback.id_feedback',$ID);
		return $this->db->get()->result();

	}


	function get_feed_back_tambahan($ID){

		$this->db->select('*');
		$this->db->from('detail_feed_back');
		$this->db->join('feed_back','feed_back.id_feed_back = detail_feed_back.id_feed_back');
		$this->db->where('detail_feed_back.id_detail_feed_back',$ID);
		return $this->db->get()->result();

	}


	function get_question(){

		$this->db->select('*');
		$this->db->from('question');
		return $this->db->get()->result();

	}

	function get_provinsi_id($id){

		$this->db->select('*');
		$this->db->from('wilayah_provinsi');
		$this->db->where('id',$id);
		return $this->db->get()->result();

	}


	function get_provinsi(){

		$this->db->select('*');
		$this->db->from('wilayah_provinsi');
		return $this->db->get()->result();

	}

	 function get_kota(){

		$this->db->select('*');
		$this->db->from('wilayah_kabupaten');
		return $this->db->get()->result();

	}

	


	function get_kota_id($id){

		$this->db->select('*');
		$this->db->from('wilayah_kabupaten');
		$this->db->where('id',$id);
		return $this->db->get()->result();

	}

	function get_kota_provinsi($id){

		$this->db->select('*');
		$this->db->from('wilayah_kabupaten');
		$this->db->where('provinsi_id',$id);
		return $this->db->get()->result();

	}


   	function get_category_goal(){

		$this->db->select('*');
		$this->db->from('category_goal');
		return $this->db->get()->result();

	}

	function get_penerima_pertanyaan($id_penerima){

		$this->db->select('email');
		$this->db->from('users');
		$this->db->where_in('id',$id_penerima);
		return $this->db->get()->result();

	}


	function get_feed_back($id_login){

		$this->db->select('*');
		$this->db->from('feed_back');
		$this->db->join('users','users.id = feed_back.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('id_pembuat',$id_login);
		return $this->db->get()->result();

	}

	function get_feed_back_detail($ID){

		$this->db->select('*');
		$this->db->from('feed_back');
		$this->db->join('users','users.id = feed_back.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('feed_back.id_feed_back',$ID);
		return $this->db->get()->result();

	}

	function get_feed_back_penerima($ID){

		$this->db->select('*');
		$this->db->from('detail_feed_back');
		$this->db->join('users','users.id = detail_feed_back.id_penerima');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('detail_feed_back.id_feed_back',$ID);
		return $this->db->get()->result();

	}


  
	function get_feed_back_terima_pertanyaan($id_login){

		$this->db->from('detail_feed_back');
		$this->db->join('feed_back','feed_back.id_feed_back = detail_feed_back.id_feed_back');
		$this->db->join('users','users.id = feed_back.id_pembuat');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('detail_feed_back.id_penerima',$id_login);
		return $this->db->get()->result();

	}
	/*

   function get_feed_back_received($id){

		$this->db->from('detail_feed_back');
		$this->db->join('feed_back','feed_back.id_feed_back = detail_feed_back.id_feed_back');
		$this->db->join('users','users.id = detail_feed_back.id_penerima');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('feed_back.id_user',$id);
		return $this->db->get()->result();

	}
*/


	function get_saran_detail($ID){

		$this->db->select('*');
		$this->db->from('detail_feed_back');
		$this->db->join('feed_back','feed_back.id_feed_back = detail_feed_back.id_feed_back');
		$this->db->where('detail_feed_back.id_detail_feed_back',$ID);
		return $this->db->get()->result();

	}

// update

	function update_competencies($id_competencies,$id_user,$competencies,$assessed_rating,$category)
  {

    $this->competencies =  $competencies;
    $this->assessed_rating = $assessed_rating;
    $this->category = $category;
    $this->db->update('competencies', $this, array('id_competencies' => $id_competencies)); 
  }


    function update_development($development_id,$id_user,$development_items,$additional_information,$parent,$status)
  {

    $this->development_items =  $development_items;
    $this->additional_information = $additional_information;
    $this->status = $status;
    $this->parent = $parent;
    $this->db->update('development', $this, array('development_id' => $development_id)); 
  }

      function update_development_penerima($id_detail,$status_penerima)
  {

    $this->status =  $status_penerima;
    $this->db->update('development_penerima', $this, array('id_detail' => $id_detail)); 
  }


  function update_personal($id,$jenis_kelamin,$tanggal_lahir,$negara_lahir,$id_provinsi_lahir,$id_kota_lahir,$status_pernikahan,$agama,$status_kewarganegaraan)
  {

    $this->jenis_kelamin =  $jenis_kelamin;
    $this->tanggal_lahir =  $tanggal_lahir;
    $this->negara_lahir  = $negara_lahir;
    $this->id_provinsi_lahir  = $id_provinsi_lahir;
    $this->id_kota_lahir  = $id_kota_lahir;
    $this->status_pernikahan  = $status_pernikahan;
    $this->agama  = $agama;
    $this->status_kewarganegaraan  = $status_kewarganegaraan;

    $this->db->update('users', $this, array('id' => $id)); 
  }


   function update_goal($goal,$description,$id_category_goal,$status,$supports,$weight,$due_date,$id_login,$reviews,$id_goal)
  {





    $this->goal              =  $goal;
    
    $this->description       =  $description;

    $this->id_category_goal  =  $id_category_goal;

    $this->status_selesai           =  $status;
    $this->support         =  $supports;
    $this->weight            =  $weight;
    $this->due_date          =  $due_date;
    $this->reviews           =  $reviews;
    

   

    $this->db->update('goal', $this, array('id_goal' => $id_goal)); 
  }



     function update_feed_back($date,$id_pengirim,$id_feed_back,$kelebihan,$kekurangan,$id_detail_feed_back,$status_privasi)
  {

    $this->date =  $date;
    $this->kelebihan = $kelebihan;
    $this->kekurangan = $kekurangan;
    $this->status = '1';
     $this->status_privasi = $status_privasi;
    $this->db->update('detail_feed_back', $this, array('id_detail_feed_back' => $id_detail_feed_back)); 
  }


   
     function update_status_goal($id,$status)
  {

    $this->status_selesai =  $status;
    $this->db->update('goal', $this, array('id_goal' => $id)); 
  }



     function update_poin_pengembangan_penerima($id_detail,$id_development,$persetujuan,$catatan,$tanggal)
  {

    $this->status  =  $persetujuan;
    $this->catatan =  $catatan;
    $this->tanggal_diterima =  $tanggal;
    $this->db->update('development_penerima', $this, array('id_detail' => $id_detail)); 
  }

    function update_approv_development($id_development,$persetujuan)
  {

    $this->status  =  $persetujuan;
    $this->db->update('development', $this, array('development_id' => $id_development)); 
  }

 //insert

  function insert_competencies($id_user,$competencies,$assessed_rating,$category){
   
    $this->db->set('id_user',$id_user);
    $this->db->set('competencies',$competencies);
    $this->db->set('assessed_rating',$assessed_rating);
    $this->db->set('category',$category);
    $this->db->insert('competencies');
  }


   function insert_feedback($date,$id_pengirim,$id_penerima,$question,$kelebihan,$kekurangan){
   
    $this->db->set('tanggal_kirim',$date);
    $this->db->set('id_pengirim',$id_pengirim);
    $this->db->set('id_penerima',$id_penerima);
    $this->db->set('id_question',$question);
    $this->db->set('kelebihan',$kelebihan);
    $this->db->set('kekurangan',$kekurangan);
    $this->db->insert('feedback');
  }

   function insert_goal($goal,$description,$id_category_goal,$status,$supports,$weight,$due_date,$id_login,$reviews){
   
    $this->db->set('goal',$goal);
    $this->db->set('description',$description);
    $this->db->set('id_category_goal',$id_category_goal);
    $this->db->set('status_selesai',$status);
    $this->db->set('support',$supports);
    $this->db->set('weight',$weight);
    $this->db->set('id_user',$id_login);
    $this->db->set('reviews',$reviews);
    $this->db->set('due_date',$due_date);
    $this->db->insert('goal');
  }



   function insert_discussion_goal($id_goal,$replay,$date_komentar,$ID){
   
    $this->db->set('id_goal',$id_goal);
    $this->db->set('discussion',$replay);
    $this->db->set('date_discussion',$date_komentar);
    $this->db->set('id_pengirim',$ID);
    $this->db->insert('goal_discussion');
  }

  
//feed back baru
    function insert_feed_back($date_feed_back,$id_pembuat,$question,$id_user){
   
    $this->db->set('date_feed_back',$date_feed_back);
    $this->db->set('question',$question);
    $this->db->set('id_pembuat',$id_pembuat);
    $this->db->set('id_user',$id_user);
    $this->db->insert('feed_back');
  }

  function get_feed_back_received($id,$limit=""){

		$this->db->from('detail_feed_back');
		
		$this->db->join('feed_back','feed_back.id_feed_back = detail_feed_back.id_feed_back');
		$this->db->join('users','users.id = detail_feed_back.id_penerima');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		if($limit){
			$this->db->limit('3');
		}
		$this->db->where('feed_back.id_user',$id);
		$this->db->where('detail_feed_back.status',1);
        $this->db->where('detail_feed_back.status_privasi',0);
		return $this->db->get()->result();

	}
	
//cekk
	  function cek_id_penerima($email){

		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email',$email);
		return $this->db->get()->result();

	}


	function cek_line_manajer($id){

		$this->db->select('id_line_manajer,email');
		$this->db->from('users');
		$this->db->where('id',$id);
		return $this->db->get()->result();

	}

	 function insert_development($development_items,$additional_information,$parent,$id_user,$tanggal){
   
    $this->db->set('development_items',$development_items);
    $this->db->set('additional_information',$additional_information);
    $this->db->set('parent',$parent);
    $this->db->set('id_user',$id_user);
    $this->db->set('tanggal',$tanggal);
    $this->db->insert('development');
  }

   function insert_development_penerima($last_insert_id,$id_line_manajer){
   
    $this->db->set('development_id',$last_insert_id);
    $this->db->set('id_penerima',$id_line_manajer);
    $this->db->insert('development_penerima');
  }



	function count_development_items($ID){

		$this->db->select('*,users.id as user_id');
		$this->db->from('development');
		$this->db->join('users','users.id = development.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->join('goal','goal.id_goal = development.parent');
		$this->db->where('development.id_user',$ID);
		return $this->db->get()->num_rows();

	}


   function get_poin_pengembangan_detail($id){

		$this->db->select('*');
		$this->db->from('development');
		$this->db->join('users','users.id = development.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->join('goal','goal.id_goal = development.parent');
		$this->db->where('development.development_id',$id);
		return $this->db->get()->result();

	}



    function kirim_saran($id_pembuat,$id_user,$question,$date_feed_back){
   
    $this->db->set('question',$question);
    $this->db->set('id_pembuat',$id_pembuat);
    $this->db->set('id_user',$id_user);
    $this->db->set('date_feed_back',$date_feed_back);
    $this->db->insert('feed_back');
  }


    function kirim_detail_saran($last_insert_id,$id_pembuat,$kelebihan,$kekurangan,$date_feed_back,$status,$status_privasi){
   
    $this->db->set('id_feed_back',$last_insert_id);
    $this->db->set('id_penerima',$id_pembuat);
    $this->db->set('kelebihan',$kelebihan);
    $this->db->set('kekurangan',$kekurangan);
    $this->db->set('date',$date_feed_back);
    $this->db->set('status','1');
       $this->db->set('status_privasi',$status_privasi);
    $this->db->insert('detail_feed_back');
  }


   function cek_email_penerima($id){

		$this->db->select('email,first_name,last_name');
		$this->db->from('users');
		$this->db->where('id',$id);
		return $this->db->get()->result();

	}

	function cek_divisi($id){

		$this->db->select('users.id_divisi');
		$this->db->from('users');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->where('users.id',$id);
		return $this->db->get()->result();

	}


}