<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Detail extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){ redirect('login');}
		$this->load->model('Profile_model'); 
		$this->load->model('Profile_detail_model');
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->helper('tgl_indo');
	}
	
	public function index($id)
	{
		
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
		$this->load->view('layouts/header');
		/*
		$this->load->view('layouts_profile/header_profile',$data);
		$this->load->view('layouts_profile/sidebar_profile',$data);
		*/
	    $this->load->view('profile_detail/detail_pekerjaan',$data);
	    $this->load->view('layouts/footer');

		
	}

	

   public function ringkasan_profile($id)
	{
        
        $data['feedback']=$this->Profile_detail_model->get_feed_back_received($id,'5');
        /*
		$data['feedback']=$this->Profile_detail_model->get_feedback($id);
        */
        $data['id_penerima']=$id;
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
		$this->load->view('layouts/header');
	    $this->load->view('profile_detail/ringkasan_profile',$data);
	    $this->load->view('layouts/footer');



		
	}

	public function history_pegawai($id)
	{
		$data['history_job_profile']=$this->Profile_detail_model->get_history_job_profile($id);
		$data['history_compensation']=$this->Profile_detail_model->get_history_compensation($id);
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
		$this->load->view('layouts/header');
	    $this->load->view('profile_detail/history_pegawai',$data);
	    $this->load->view('layouts/footer');		
	}

/*
    	public function competencies($id)
	{
		
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
		$this->load->view('layouts/header');
	    $this->load->view('profile_detail/competencies',$data);
	    $this->load->view('layouts/footer');		
	}
*/

	public function competencies($id)
	{
		$data['id_login'] = $this->ion_auth->user()->row()->id;
		$data['id_data']=$id;
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
        $data['competencies']=$this->Profile_detail_model->get_competencies($id);
        $compe=$this->Profile_detail_model->get_competencies($id);
        foreach($compe as $dat){
        	$user_id=$dat->user_id;
        }
		$this->load->view('layouts/header');
	    $this->load->view('profile_detail/competencies',$data);
	    $this->load->view('layouts/footer');		
	}

	public function goal($id)
	{
		$data['id_login'] = $this->ion_auth->user()->row()->id;
		$data['id_data']  = $id;
		$data['goal']=$this->Profile_detail_model->get_goal($id,'0');
		$data['category_goal']=$this->Profile_detail_model->get_category_goal();
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
		$this->load->view('layouts/header');
	    $this->load->view('profile_detail/goal',$data);
	    //$this->load->view('layouts/footer');		
	}



    public function goal_close($id)
    {
        $data['id_login'] = $this->ion_auth->user()->row()->id;
        $data['id_data']  = $id;
        $data['goal']=$this->Profile_detail_model->get_goal($id,'2');
        $data['category_goal']=$this->Profile_detail_model->get_category_goal();
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
        $this->load->view('layouts/header');
        $this->load->view('profile_detail/goal_close',$data);
        $this->load->view('layouts/footer');        
    }

/*
	public function feedback($id)
	{
	    $data['id_login'] = $this->ion_auth->user()->row()->id;
	    $data['id_penerima_user']=$id;
        /*
	    $data['feedback']=$this->Profile_detail_model->get_feedback($id);
        */
        /*
        $data['feedback']=$this->Profile_detail_model->get_feed_back_received($id);
	    $data['question']=$this->Profile_detail_model->get_question($id);
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
		$this->load->view('layouts/header');
	    $this->load->view('profile_detail/feedback',$data);
	    $this->load->view('layouts/footer');		
	}

/*
	function replay(){

       $id= $this->input->post('ids');
        $data['id_goal']=$id;
        $data['id_login'] = $this->ion_auth->user()->row()->id;

        $data['goal']=$this->Profile_detail_model->get_goal_detail($id);
       
        $data['goal_discussion']=$this->Profile_detail_model->get_goal_discussion($id);
        
        $this->load->view('profile_detail/replay',$data);
    }
*/


    
    public function feedback($id)
    {
        $data['id_login'] = $this->ion_auth->user()->row()->id;
        $data['id_penerima_user']=$id;
        /*
        $data['feedback']=$this->Profile_detail_model->get_feedback($id);
        */


        $data['feedback']=$this->Profile_detail_model->get_feed_back_received($id);

        $data['question']=$this->Profile_detail_model->get_question($id);
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
        $data['users_aktif']=$this->Profile_detail_model->get_users_aktif();
        $this->load->view('layouts/header');
        $this->load->view('profile_detail/feedback',$data);
        $this->load->view('layouts/footer');    
    }

    function replay($id){
        $data['id_login'] = $this->ion_auth->user()->row()->id;
        $data['foto_login'] = $this->ion_auth->user()->row()->foto;
        $data['id_goal']=$id;
        $data['goal']=$this->Profile_detail_model->get_goal_detail($id);
        $data['goal_discussion']=$this->Profile_detail_model->get_goal_discussion($id);
        $this->load->view('profile_detail/replay',$data);
    }
	
	  function replay_submit(){
		  $date_komentar=date('Y-m-d h:i:s');
		  $ID = $this->ion_auth->user()->row()->id;
		   $id_goal=$this->input->post('id_goal');
		   $replay=$this->input->post('replay');
		  $id_user=$this->input->post('id_user');
		$this->Profile_detail_model->insert_discussion_goal($id_goal,$replay,$date_komentar,$ID);
		
	}

	function result(){
       $id= $this->input->post('ids');
       $tambahan= $this->input->post('tambahan');

        $data['id']=$id;

        $data['tambahan']=$tambahan;
        $data['feedback']=$this->Profile_detail_model->get_feed_back_tambahan($id);
        $this->load->view('profile_detail/result',$data);
    }


    function result_penerima(){
       $id= $this->input->post('ids');
       $tambahan= $this->input->post('tambahan');


        $data['id']=$id;

        $data['tambahan']=$tambahan;
        
        $data['development']=$this->Profile_detail_model->get_poin_pengembangan_detail($id);
       
        
        $this->load->view('profile_detail/result_poin_pengembangan',$data);
    }

    public function personal_information($id)
	{  

	    $data['provinsi']=$this->Profile_detail_model->get_provinsi();
	    $data['kota']=$this->Profile_detail_model->get_kota();
	    $data['users']=$this->Profile_detail_model->get_users($id);
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
		$this->load->view('layouts/header');
	    $this->load->view('profile_detail/personal_information_2',$data);
	    $this->load->view('layouts/footer');		
	}


    function add_ajax_kab($provinsi){

		
		$query = $this->Profile_detail_model->get_kota_provinsi($provinsi);
		$str = $this->db->last_query();
		
		$data = "<option value=''>- Select Kota / Kabupaten -</option>";
	    foreach ($query as $value) {
	        $data .= "<option value='".$value->id."'>".$value->nama."</option>";
	    }
	    echo $data;
	}

		public function development_items($id)
	{
		$data['id_login'] = $this->ion_auth->user()->row()->id;
        $data['id_line_manajer'] = $this->ion_auth->user()->row()->id_line_manajer;
        $data['id_user']=$id;
        $data['id_data']=$id;
        /*
$this->load->helper('url');
        $this->load->library('pagination');
        
     
        
        $config['base_url'] = base_url().'Profile_Detail/development_items/'.$id; 
        $config['total_rows'] = $this->Profile_detail_model->count_development_items($id);
        $config['per_page'] =2; 
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $form = $this->uri->segment(4);
        $ID = $this->ion_auth->user()->row()->id;
      
        $this->pagination->initialize($config); 
*/


		$data['development']=$this->Profile_detail_model->get_development_items($id);
        /*
        $data['link']= $this->pagination->create_links();
        */
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
        $data['goal']=$this->Profile_detail_model->get_goal($id,'0');
        $data['development_all']=$this->Profile_detail_model->get_development();
		$this->load->view('layouts/header');
	    $this->load->view('profile_detail/development_items',$data);
	    $this->load->view('layouts/footer');		
	}



     public function penerima_poin_pengembangan($id)
    {
        $data['id_login'] = $this->ion_auth->user()->row()->id;
        $data['id_line_manajer'] = $this->ion_auth->user()->row()->id_line_manajer;
    
        $data['development']=$this->Profile_detail_model->get_development_items_penerima($id);
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
        $data['goal']=$this->Profile_detail_model->get_goal($id,'0');
        $data['development_all']=$this->Profile_detail_model->get_development();
        $this->load->view('layouts/header');
        $this->load->view('profile_detail/penerima_poin_pengembangan',$data);
        $this->load->view('layouts/footer');        
    }


     public function organisasi($id)
    {
         $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
        $cek_divisi=$this->Profile_detail_model->cek_divisi($id);
        foreach($cek_divisi as $div){
            $id_divisi=$div->id_divisi;
        }
        $data['users_divisi'] = $this->Profile_model->users_divisi($id_divisi);
        $divisi = $this->Profile_model->users_divisi($id_divisi);
           foreach($divisi as $di){
        $data['nama_divisi']=$di->nama_divisi;
    }
        $this->load->view('layouts/header');
        $this->load->view('profile_detail/organisasi',$data);
        $this->load->view('layouts/footer');        
    }

        public function development_items_history($id)
    {
        /*
        
        $data['development']=$this->Profile_detail_model->get_development_items($id);
        */

        $data['id_login']=$this->ion_auth->user()->row()->id;
        $data['id_data']=$id;
        $data['development']=$this->Profile_detail_model->get_development_items($id);
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
        $data['goal']=$this->Profile_detail_model->get_goal($id,'0');
        $data['development_all']=$this->Profile_detail_model->get_development();
        $this->load->view('layouts/header');
        $this->load->view('profile_detail/development_items_history',$data);
        $this->load->view('layouts/footer');        
    }



    
        public function history_pertanyaan_diterima($id)
    {  

		$data['id_login'] = $this->ion_auth->user()->row()->id;
        $data['id_penerima_user']=$id;
        $data['feedback']=$this->Profile_detail_model->get_feedback($id);
        $data['question']=$this->Profile_detail_model->get_question($id);
        $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
        $data['users_aktif']=$this->Profile_detail_model->get_users_aktif();


        /*
           data question feedback yang sudah dikirim

        */
        $first_name    = $this->ion_auth->user()->row()->first_name;
        $last_name     = $this->ion_auth->user()->row()->last_name;
        $data['first_name']=$first_name;
        $data['last_name']=$last_name;
        $id_login = $this->ion_auth->user()->row()->id;

        $data['question_feed_back']=$this->Profile_detail_model->get_feed_back_terima_pertanyaan($id_login);
        $this->load->view('layouts/header');
        $this->load->view('profile_detail/terima_pertanyaan',$data);
        $this->load->view('layouts/footer');    
         
    }


        public function riwayat_kirim_saran($id)
    {  

       $data['detail_pekerjaan']=$this->Profile_detail_model->get_users($id);
        $this->load->view('layouts/header');
        $this->load->view('profile_detail/riwayat_kirim_saran',$data);
        $this->load->view('layouts/footer');    
         
    }


	public function save_competencies(){

        $id_competencies             = $this->input->post('id_competencies');
        $id_user                     = $this->input->post('id_user');
        $competencies                = $this->input->post('competencies');
        $assessed_rating             = $this->input->post('assessed_rating');
        $category                    = $this->input->post('category');

        if($id_competencies){

        $this->Profile_detail_model->update_competencies($id_competencies,$id_user,$competencies,$assessed_rating,$category);
           
        }else{
         $this->Profile_detail_model->insert_competencies($id_user,$competencies,$assessed_rating,$category);           
        }

        redirect('performance-competencies/'.$id_user);

    }


    public function save_development(){

        $tanggal=date('Y-m-d');
        $development_id              = $this->input->post('development_id');
        $id_user                     = $this->input->post('id_user');
        $development_items           = $this->input->post('development_items');
        $additional_information      = $this->input->post('additional_information');
        $parent                      = $this->input->post('parent');
        $id_line_manajer             = $this->input->post('id_line_manajer');
        $status_penerima             = $this->input->post('status_penerima');
        $id_detail                   = $this->input->post('id_detail');

        if($id_line_manajer){
                $id_line_manajer=$id_line_manajer;
        }else{
                
        }

        if($development_id){
$this->Profile_detail_model->update_development_penerima($id_detail,$status_penerima);
      
        $this->Profile_detail_model->update_development($development_id,$id_user,$development_items,$additional_information,$parent,$status_penerima);

        

        }else{
         $this->Profile_detail_model->insert_development($development_items,$additional_information,$parent,$id_user,$tanggal);
         $last_insert_id = $this->db->insert_id();  

         $this->Profile_detail_model->insert_development_penerima($last_insert_id,$id_line_manajer);  

        }

        if($id_line_manajer){
              $cek_manajer=$this->Profile_detail_model->cek_line_manajer($id_line_manajer);
              foreach($cek_manajer as $ce){
                $email[]=$ce->email;
              }
        }else{
               $email[]=array('ranipandawarman@gmail.com');
        }

         $this->kirim_email_development_items($email, $last_insert_id,$id_user);
        redirect('development-items/'.$id_user);

    }
	

     function kirim_email_development_items($email, $last_insert_id,$id_user){
        $date=date('Y-m-d');
        $id_development=$last_insert_id;
        $cek_user=$this->Profile_detail_model->get_users($id_user);
        foreach($cek_user as $ce){
            $first_name=$ce->first_name;
            $last_name =$ce->last_name;
        }

        $data['first_name']=$first_name;
        $data['last_name']=$last_name;
                $this->load->library('email');

        $i=0;
        while ($i <= $count_email)
        {
           $email_penerima=$email[$i];
           $penerima=$this->Profile_detail_model->cek_id_penerima($email_penerima);
           foreach($penerima as $pem){
            $id_penerima=$pem->id;

           }
           $data['id_penerima']=$id_penerima;
           $data['email_penerima']=$email_penerima;
           $message = $this->load->view('email_feed_back/kirim_poin_pengembangan',$data, TRUE);
           $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
           $this->email->to($email_penerima);
           $this->email->subject('Permintaan Poin Pengembangan - Baru by ('.$first_name.' '.$last_name.') - ('.$date.')');
           $this->email->message($message);
           $this->email->send();
       $i=$i+1;
     }  

  }


	  public function save_feedback(){

        $id_feedback                 = $this->input->post('id_feedback');
        $date                        = $this->input->post('date');
        $id_pengirim                 = $this->input->post('id_pengirim');
        $id_penerima                 = $this->input->post('id_penerima');
        $question                    = $this->input->post('question');
        $kelebihan                   = $this->input->post('kelebihan');
        $kekurangan                  = $this->input->post('kekurangan');
     

        if($id_feedback){

        $this->Profile_detail_model->update_development($development_id,$id_user,$development_items,$additional_information,$parent,$status);
           
        }else{
         $this->Profile_detail_model->insert_feedback($date,$id_pengirim,$id_penerima,$question,$kelebihan,$kekurangan);           
        }

        redirect('feedback/'.$id_penerima);

    }


     public function save_personal(){

        $id                          = $this->input->post('id');
        $jenis_kelamin               = $this->input->post('jenis_kelamin');
        $tanggal_lahir               = $this->input->post('tanggal_lahir');
        $negara_lahir                = $this->input->post('negara_lahir');
        $id_provinsi_lahir           = $this->input->post('id_provinsi_lahir');
        $id_kota_lahir               = $this->input->post('id_kota_lahir');
        $status_pernikahan           = $this->input->post('status_pernikahan');
        $agama                       = $this->input->post('agama');
        $status_kewarganegaraan      = $this->input->post('status_kewarganegaraan');


        if($id){

        $this->Profile_detail_model->update_personal($id,$jenis_kelamin,$tanggal_lahir,$negara_lahir,$id_provinsi_lahir,$id_kota_lahir,$status_pernikahan,$agama,$status_kewarganegaraan);
           
        }else{
         $this->Profile_detail_model->insert_competencies($id_user,$competencies,$assessed_rating,$category);           
        }

        redirect('personal-information/'.$id);

    }
	


	public function save_goal(){

        $goal                        = $this->input->post('goal');
        $description                 = $this->input->post('description');
        $id_category_goal            = $this->input->post('id_category_goal');
        $status                      = $this->input->post('status');
        $supports                    = $this->input->post('supports');
        $weight                      = $this->input->post('weight');
        $due_dat                    = $this->input->post('due_date');
        $due_date  =date("Y-m-d", strtotime($due_dat) );
        $id_login                    = $this->input->post('id_login');
        $id_goal                     = $this->input->post('id_goal');
        $reviews                     = $this->input->post('reviews');
        if($id_goal){
        $this->Profile_detail_model->update_goal($goal,$description,$id_category_goal,$status,$supports,$weight,$due_date,$id_login,$reviews,$id_goal);
        }else{
         $this->Profile_detail_model->insert_goal($goal,$description,$id_category_goal,$status,$supports,$weight,$due_date,$id_login,$reviews);           
        }

        redirect('tujuan-individu/'.$id_login);

    }

     public function update_feed_back(){

        $date                        = $this->input->post('date');
        $id_pengirim                 = $this->input->post('id_pengirim');
        $id_feed_back                = $this->input->post('id_feed_back');
        $kelebihan                   = $this->input->post('kelebihan');
        $kekurangan                  = $this->input->post('kekurangan');
        $id_detail_feed_back         = $this->input->post('id_detail_feed_back');
         $status_privasi         = $this->input->post('status_privasi');


        $this->Profile_detail_model->update_feed_back($date,$id_pengirim,$id_feed_back,$kelebihan,$kekurangan,$id_detail_feed_back,$status_privasi);
        redirect('pertanyaan-terima/'.$id_pengirim);

    }


      public function update_status_goal(){

        $id_goal                     = $this->input->post('id_goal');
        $status                      = $this->input->post('status');
        $id_login                    = $this->input->post('id_login');
        $id_data                     = $this->input->post('id_data');

        $this->Profile_detail_model->update_status_goal($id_goal,$status);
        redirect('tujuan-individu/'.$id_data);

    }


    public function save_penerima_poin_pengembangan(){

        $id_competencies             = $this->input->post('id_competencies');
        $id_user                     = $this->input->post('id_user');
        $competencies                = $this->input->post('competencies');
        $assessed_rating             = $this->input->post('assessed_rating');
        $category                    = $this->input->post('category');

        if($id_competencies){

        $this->Profile_detail_model->update_competencies($id_competencies,$id_user,$competencies,$assessed_rating,$category);
           
        }else{
         $this->Profile_detail_model->insert_competencies($id_user,$competencies,$assessed_rating,$category);           
        }



        redirect('performance-competencies/'.$id_user);

    }


    public function save_approv_poin_pengembangan(){
        $tanggal=date('Y-m-d');
        $id_login                    = $this->input->post('id_login');
        $id_development              = $this->input->post('id_development');
        $persetujuan                 = $this->input->post('persetujuan');
        $catatan                     = $this->input->post('catatan'); 
        $id_detail                   = $this->input->post('id_detail');       
        $this->Profile_detail_model->update_approv_development($id_development,$persetujuan);


        $this->Profile_detail_model->update_poin_pengembangan_penerima($id_detail,$id_development,$persetujuan,$catatan,$tanggal);

        redirect('penerima-poin-pengembangan/'.$id_login);

    }



     public function kirim_saran(){

        $id_pembuat                = $this->input->post('id_pembuat');
        $id_user                   = $this->input->post('id_user');
        $question                  = $this->input->post('question');
        $date_feed_back            = $this->input->post('date_feed_back');


        $kelebihan                   = $this->input->post('kelebihan');
        $kekurangan                  = $this->input->post('kekurangan');
        $status_privasi              = $this->input->post('status_privasi');
        
        $this->Profile_detail_model->kirim_saran($id_pembuat,$id_user,$question,$date_feed_back);           
        $last_insert_id = $this->db->insert_id();

        $this->Profile_detail_model->kirim_detail_saran($last_insert_id,$id_pembuat,$kelebihan,$kekurangan,$date_feed_back,'1',$status_privasi);
        $cek_email=$this->Profile_detail_model->cek_email_penerima($id_user);
        foreach($cek_email as $em){
            $email_penerima=$em->email;
            $first_name    =$em->first_name;
            $last_name     =$em->last_name;
        }

        $this->kirim_email_saran($email_penerima,$first_name,$last_name,$id_user);

        redirect('pertanyaan-terima/'.$id_pembuat);

    }


    function kirim_email_saran($email,$first_name,$last_name,$id_user){
        $this->load->library('email');
        $data['first_name']=$first_name;
        $data['last_name']=$last_name;
        $data['email']=$email;
        $data['id_user']=$id_user;
           $message = $this->load->view('email_feed_back/notif_saran',$data, TRUE);
           $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
           $this->email->to($email);
           $this->email->subject('Pemberitahuan Saran Baru - Baru by ('.$first_name.' '.$last_name.')');
           $this->email->message($message);
           $this->email->send();
       
  }

	

}
