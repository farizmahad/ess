<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_Manager extends CI_Controller {

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
		
		$this->load->model('Profile_model'); 
		$this->load->model('Profile_detail_model');
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->helper('tgl_indo');
	}
	
	public function kirim_pertanyaan($id)
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

        $data['question_feed_back']=$this->Profile_detail_model->get_feed_back($id_login);
		$this->load->view('layouts/header');
	    $this->load->view('profile_detail/kirim_pertanyaan',$data);
	    $this->load->view('layouts/footer');	
	}



	  public function save_feedback_question(){

        $date_feed_back                       = $this->input->post('date');
        $id_pembuat                           = $this->input->post('id_pembuat');
        $question                             = $this->input->post('question');
        $id_user                              = $this->input->post('id_user');
        $id_penerima                   		  = $_POST['id_penerima'];
        

        $id_login                             = $this->ion_auth->user()->row()->id;
        $this->Profile_detail_model->insert_feed_back($date_feed_back,$id_pembuat,$question,$id_user);
        $last_insert_id = $this->db->insert_id();  
        
        $result = array();
        foreach($_POST['id_penerima'] AS $key => $val){
            $result[] = array(
                 "id_feed_back" => $last_insert_id
                ,"id_penerima" => $_POST['id_penerima'][$key]
                ,"status"      => '0'
            );
        }           
       
        $res = $this->db->insert_batch('detail_feed_back', $result);
        $select_email_penerima=$this->Profile_detail_model->get_penerima_pertanyaan($id_penerima);
        foreach($select_email_penerima as $sel){
        	$email[]=$sel->email;
        } 
        $this->kirim_pertanyaan_penerima($email, $last_insert_id,$id_pembuat);
        redirect('kirim-pertanyaan/'.$id_login);

    }


    function kirim_pertanyaan_penerima($email, $last_insert_id,$id_pembuat){
        $date=date('Y-m-d');
        $first_name    = $this->ion_auth->user()->row()->first_name;
        $last_name     = $this->ion_auth->user()->row()->last_name;
        $count_email   =  count($email);
        $id_feed_back  =  $last_insert_id;
        $id_pembuat    =  $id_pembuat;


        $data['first_name']   = $first_name;
        $data['last_name']    = $last_name;
        $data['id_feed_back'] = $id_feed_back;
        $data['id_pembuat  '] = $id_pembuat;

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
           $message = $this->load->view('email_feed_back/kirim_question',$data, TRUE);
           $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
           $this->email->to($email_penerima);
           $this->email->subject('Permintaan Jawab Pertanyaan - Baru by ('.$first_name.' '.$last_name.') - ('.$date.')');
           $this->email->message($message);
           $this->email->send();
       $i=$i+1;
     }  

  }

  function result(){
       $id= $this->input->post('ids');
       $tambahan= $this->input->post('tambahan');

        $data['id']=$id;



        $data['tambahan']=$tambahan;
        $data['feed_back_detail']=$this->Profile_detail_model->get_feed_back_detail($id);
        $this->load->view('profile_detail/result_question',$data);
    }

   	function replay_question($id){

        $data['id_feed_back']=$id;
        /*
        $data['goal']=$this->Profile_detail_model->get_goal_detail($id);
        $data['goal_discussion']=$this->Profile_detail_model->get_goal_discussion($id);
        */
        $data['feed_back_detail']=$this->Profile_detail_model->get_feed_back_detail($id);
        $data['feed_back_penerima']=$this->Profile_detail_model->get_feed_back_penerima($id);
        $this->load->view('profile_detail/replay_question_feedback',$data);
    }
	
	

}
