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

	function get_goal($ID){

		$this->db->select('*');
		$this->db->from('goal');
		$this->db->join('users','users.id = goal.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('goal.id_user',$ID);
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
/*
	function get_goal_detail($ID){

		$this->db->select('*');
		$this->db->from('goal');
		$this->db->join('users','users.id = goal.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('goal.id_goal',$ID);
		return $this->db->get()->result();

	}
*/
	function get_competencies($ID){

		$this->db->select('*,users.id as user_id');
		$this->db->from('competencies');
		$this->db->join('users','users.id = competencies.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('competencies.id_user',$ID);
		return $this->db->get()->result();

	}


    

	function get_development_items($ID){

		$this->db->select('*,users.id as user_id');
		$this->db->from('development');
		$this->db->join('goal','goal.id_goal = development.parent');
		$this->db->join('users','users.id = development.id_user');
		$this->db->join('divisi','users.id_divisi = divisi.id_divisi');
		$this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
		$this->db->where('development.id_user',$ID);
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
    $this->status            =  $status;
    $this->support         =  $supports;
    $this->weight            =  $weight;
    $this->due_date          =  $due_date;
    $this->reviews           =  $reviews;
    $this->db->update('goal', $this, array('id_goal' => $id_goal)); 
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
    $this->db->set('status',$status);
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



}