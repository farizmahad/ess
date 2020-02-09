<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $this->load->helper('tgl_indo');
        $this->load->model('Home_model');
		$this->load->model('Pengajuan_model');
	    $this->load->library('upload');
        $this->load->helper('url');


    }
	public function index()
	{
        $daterange=$this->input->get('daterange');
        $ID = $this->ion_auth->user()->row()->id;
	    $data['per_assign']=$this->Home_model->per_assign($ID);
        $data['per_bel_selesai']=$this->Home_model->per_bel_selesai($ID,$daterange);
	    $data['count_persetujuan']=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
        $data['count_permintaan']=$this->Home_model->count_per_bel_selesai($ID,$daterange);

		$data['count_total']=$data['count_persetujuan']+$data['count_permintaan'];

		$this->load->view('layouts/header',$data);
	    $this->load->view('layouts/sidebar',$data);
	    $this->load->view('dashboard',$data);
        $this->load->view('layouts/footer');

	}

  public function ferdi_nitip(){
    $this->load->view('telkom.html');
  }

    public function news_feed()
	{

    date_default_timezone_set("Asia/Jakarta");
    $tanggal_sekarang=date('Y-m-d');
    $tanggal_data=date('Y-m-d', strtotime('-3 month', strtotime($tanggal_sekarang)));
    $data['news']=$this->Home_model->get_news($tanggal_data,$tanggal_sekarang);
    $ID = $this->ion_auth->user()->row()->id;
    $data['id_login']=$ID;
    $jml_karakter = strlen($ID);
    $data['sementara']=$this->Home_model->select_tabel_sementara($ID,$jml_karakter);
		$this->load->view('layouts/header',$data);
	  $this->load->view('layouts/sidebar',$data);
	  $this->load->view('news_feed',$data);
    $this->load->view('layouts/footer');

	}


    public function add(){
    	/*

		  $datas=array(
            'id'=>'2',
            'name'=>'oyeeee',
            'qty'=>'1',
            'price'=>'1',
            'keterangan'=>'shhshshhshhs'
          );

           $this->cart->insert($datas);
           */

           $nomororder = rand();
           $ID = $this->ion_auth->user()->row()->id;
           $random=$nomororder."_".$ID;


           $foto = $_FILES['foto']['name'];




        $tmp = $_FILES['foto']['tmp_name'];



        $path = "../files/news/".$foto;


      if(move_uploaded_file($tmp, $path)){
        /*

            $foto = $_FILES['foto']['name'];

        $foto_name = str_replace(" ", "_", $foto);

        $config['upload_path'] = './files/news/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|csv';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
*/
           $this->Home_model->insert_news_detail($foto,$random);
         }
           redirect('Dashboard/news_feed','Refresh');

	}





	function acak()
{
	$panjang=18;
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}


	public function insert_news(){
		$nomororder = rand();

		   $date_posted=date('Y-m-d h:i:s');
    	   $ID = $this->ion_auth->user()->row()->id;
    	   $jml_karakter = strlen($ID);
    	   $news= $this->input->post('news');


           $this->Home_model->insert_news($news,$ID,$date_posted);

           /*
                 $last_insert_id = $this->db->insert_id();
           $am=$this->Home_model->select_tabel_sementara($ID,$jml_karakter);






           foreach($am as $a){
           	 $filenya=$a->file;
           	  $filenya1=$a->file;
           	 $this->Home_model->insert_detail_news($last_insert_id,$filenya,$filenya1);
           }
            $this->Home_model->truncate($ID,$jml_karakter);
            */

           redirect('Dashboard/news_feed','Refresh');

	}


	   function replay_submit(){
		$date_komentar=date('Y-m-d h:i:s');
		$ID = $this->ion_auth->user()->row()->id;
		$id_news=$this->input->post('id_news');
		$replay=$this->input->post('replay');
		$id_user=$this->input->post('id_user');
		$this->Home_model->insert_komentar($ID,$id_news,$replay,$date_komentar);

	}


     function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->Home_model->search_users($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)

                $arr_result[] = $row->first_name;

                echo json_encode($arr_result);
            }
        }
    }


     public function news_like()
  {

        $ids     = $this->input->post('ids');
        $id_login= $this->input->post('id_login');
        $status  = $this->input->post('status');

        if($status==0){
        $this->Home_model->insert_like($ids,$id_login);
        }elseif($status==1){

           $this->Home_model->delete_like($ids,$id_login);

          }
        }




    function replay_komentar($id){
    	$data['id_user'] = $this->ion_auth->user()->row()->id;
    	$data['get_news']=$this->Home_model->get_komentar_news($id);
        $this->load->view('replay_komentar',$data);
    }

 function search_user(){
        $search = $this->input->get_post('search', TRUE);
	    $data['search']=$this->Home_model->search_user($search);
	    $data['user_search']=$this->Home_model->get_users_all();

$this->load->view('layouts/header',$data);
	    $this->load->view('layouts/sidebar',$data);
	    $this->load->view('search_user',$data);
        $this->load->view('layouts/footer');


	}


     function news_selengkapnya($id){
      /*
        $news_lengkap=$this->Home_model->get_news();
        foreach($news_lengkap as $leng){
          $id_ne[]=$leng->id_news;
        }
*/
        $news_lengkap=$this->Home_model->get_news();
         foreach($news_lengkap as $leng){
          $id_ne[]=$leng->id_news;
        }


        $data['jumlah_news']=$id;
        $data['news']=$this->Home_model->get_news_ter($id_ne);
        $this->load->view('selengkapnya',$data);
    }



      function detail_komentar(){
        $id_news=$this->input->get('id_news');
           $status=$this->input->get('status');
           $id_news_komentar=$this->input->get('id_news_komentar');



        $data['news']=$this->Home_model->get_news_by_id($id_news);
        if($status==0){
        $update=$this->Home_model->update_klik_komentar($id_news_komentar);
      }elseif($status==1){
         $update=$this->Home_model->update_klik_like($id_news_komentar);
      }
      $ID = $this->ion_auth->user()->row()->id;
      $data['id_login']=$ID;
         $jml_karakter = strlen($ID);
         $data['sementara']=$this->Home_model->select_tabel_sementara($ID,$jml_karakter);
        $this->load->view('layouts/header',$data);
      $this->load->view('layouts/sidebar',$data);
        $this->load->view('reply_comment');
        $this->load->view('layouts/footer');
    }
/*
	public function multipleImageStore()
  {

      $countfiles = count($_FILES['files']['name']);

      for($i=0;$i<$countfiles;$i++){

        if(!empty($_FILES['files']['name'][$i])){

          // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];

          // Set preference
          $config['upload_path'] = './uploads/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000'; // max_size in kb
          $config['file_name'] = $_FILES['files']['name'][$i];

          //Load upload library
          $this->load->library('upload',$config);
          $arr = array('msg' => 'something went wrong', 'success' => false);
          // File upload
          if($this->upload->do_upload('file')){

           $data = $this->upload->data();
           $insert['name'] = $data['file_name'];
           $this->db->insert('images',$insert);
           $get = $this->db->insert_id();
          $arr = array('msg' => 'Image has been uploaded successfully', 'success' => true);

          }
        }

      }
      echo json_encode($arr);

  }
*/


    function edit_komentar($id){
      $data['id_user'] = $this->ion_auth->user()->row()->id;
       $data['news']=$this->Home_model->get_news_id($id);
      /*
      $data['get_news']=$this->Home_model->get_komentar_news($id);
      */
        $this->load->view('edit_komentar',$data);
    }


    function update_news(){

        $data=$this->Home_model->update_news();
        echo json_encode($data);
    }

    function delete_news(){

        $data=$this->Home_model->delete_news();
        echo json_encode($data);
    }

     function update_komentar_news(){

        $data=$this->Home_model->update_komentar_news();
        echo json_encode($data);
    }

  function delete_komentar_news(){

        $data=$this->Home_model->delete_komentar_news();
        echo json_encode($data);
    }




}
