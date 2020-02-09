<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
	ini_set('memory_limit', '1024M');
class Api extends REST_Controller {

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

	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
		$this->load->model('Api_Kacab_model');
		$this->load->model('User_pengajuan_model');
		$this->load->model('Mpdf_model');
		$this->load->model('Login_model');
		$this->load->model('Pengajuan_model');
		$this->db2 = $this->load->database('database2', TRUE);
	}

	//Menampilkan data kontak
	function index_get()
	{
		$id = $this->get('id');
		if($id == ''){
			$login = $this->Login_model->getAllUsers();
		} else {
			$this->db->where('id', $id);
			$login = $this->Login_model->getAllUsers();
		}
		$this->response($login, 200);
	}

	public function daftar_konfirmasi_produk_get($id_user){

		$users = $this->User_pengajuan_model->get_users($id_user);
        /*
		if (!$this->ion_auth->logged_in()){ redirect('login');}

        $group_manager         = array('manager');
        $group_kepala_regional = array('kepala regional');


        if ($this->ion_auth->in_group($group_manager)){
            $draft="4";
        }elseif ($this->ion_auth->in_group($group_kepala_regional)) {
            $draft="5";
        }

        $ID = $this->ion_auth->user()->row()->id;
        $daftar_konfirmasi_produk = $this->Kacab_model->daftar_konfirmasi_produk_toko($ID,$draft); */

		if ($users){
			// Set the response and exit
			//$this->response($daftar_konfirmasi_produk, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			$this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}else{
			// Set the response and exit
			$this->response(array(
				'status' => FALSE,
				'message' => 'No users were found'
			), REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}

	 public function loginess_post(){
      $this->load->library('ion_auth');
         //TI1021399
        // $username = $this->post('email');
        // $password = $this->post('password');

        $identity = $this->post('email');
        $password = $this->post('password');
        $remember = TRUE; // remember the user
        $user="";
        if ($this->ion_auth->login($identity, $password, $remember)){
			$user=1;
        }else{
			$user=0;
        }

       if ($user)
            {
				$user =$this->ion_auth->user()->row();
				// Set the response and exit
				$this->response($user->user_id, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response($user,REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
    }







    //------------Get seorang data user ----------------------------------------------------------/

     public function users_get($uid)
	{
		$produk=$this->Pengajuan_model->cek_users($uid);


		if ($produk)
        {
            // Set the response and exit
            $this->response($produk, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
                // Set the response and exit
            $this->response(array(
                'status' => FALSE,
                'message' => 'No users were found'
            ), REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}


	///////////////////////----------------------------


   ///////////////////////////////////////  ==========================  ////////////////////////SO

   function kontak_get(){
      $id = $this->get('id');
      if($id == ''){
        $kontak = $this->db2->get('t_outlet')->result();
      }else{
        $this->db2->where('id', $id);
        $kontak = $this->db2->get('t_outlet')->result();
      }
      $this->response($kontak, 200);
    }

/*
     function data_barang_get(){
      $id_barang = $this->get('id');
      $status = $this->get('status');
      $dept = $this->get('dept');
      if($id_barang == ''){
        if($status != ''){
          if($dept != ''){
            $this->db2->where('dept', $dept);
          }
          $this->db2->where('status_so', $status);
        }
        $data = $this->db2->get('m_barang', 50)->result();
      }else{
        if($dept != ''){
          $this->db2->where('dept', $dept);
        }
        $this->db2->where('status_so', $status);
        $this->db2->where('sku', $id_barang);
        $data = $this->db->get('m_barang', 50)->result();
      }

      $this->response($data, 200);
    }
*/

     function data_barang_get(){
      $outlet = $this->get('outlet');
      $id_barang = $this->get('id');
      $status = $this->get('status');
      $dept = $this->get('dept');
			$role = $this->get('role');
			$history = $this->get('history');


      if($id_barang == ''){
				if($role == 1){
					if($status != ''){
	          if($dept != ''){
	            $this->db2->where('dept', $dept);
	          }
	        }
	        $this->db2->where('status_so', $status);
					if($history == ''){
						$this->db2->where_not_in('stok_moka',0);
					}
					$this->db2->group_by("sku");
	        $data = $this->db2->get($outlet, 50)->result();
				}else{
					if($status != ''){
	          if($dept != ''){
	            $this->db2->where('dept', $dept);
	          }
	        }
					$this->db2->group_by("sku");
	        $this->db2->where('status_ho', $status);
					if($history == ''){
						$this->db2->where_not_in('stok_moka',0);
					}
					$this->db2->group_by("sku");
	        $data = $this->db2->get($outlet, 50)->result();
				}

      }else{

				if($role == 1){
					if($dept != ''){
	          $this->db2->where('dept', $dept);
	        }
	        $this->db2->where('status_so', $status);
	        $this->db2->where('sku', $id_barang);
					$this->db2->where_not_in('stok_moka',0);
	        $data = $this->db->get($outlet, 50)->result();
				}else{
					if($dept != ''){
	          $this->db2->where('dept', $dept);
	        }
	        $this->db2->where('status_ho', $status);
	        $this->db2->where('sku', $id_barang);
					$this->db2->where_not_in('stok_moka',0);
	        $data = $this->db->get($outlet, 50)->result();
				}

      }

      $this->response($data, 200);
    }

    /*

      function cari_barang_get(){
      $keyword = $this->get('id');
      $status = $this->get('status');
      $dept = $this->get('dept');
      if($keyword == ''){
        if($dept != ''){
          $this->db2->where('dept', $dept);
        }
        $data = $this->db2->get('m_barang')->result();
      }else{
        $this->db2->like('sku', $keyword);
        $this->db2->or_like('name', $keyword);
        $this->db2->where('status_so', $status);
        if($dept != ''){
          $this->db2->where('dept', $dept);
        }
        $data = $this->db2->get('m_barang')->result();
      }

      $this->response($data, 200);
    }
 */

    function cari_barang_get(){
      $outlet = $this->get('outlet');
      $keyword = $this->get('id');
      $status = $this->get('status');
      $dept = $this->get('dept');
			$role = $this->get('role');

      if($keyword == ''){
        if($dept != ''){
          $this->db2->where('dept', $dept);
        }
				$this->db2->group_by("sku");
        $data = $this->db2->get($outlet)->result();
      }else{
        $this->db2->like('sku', $keyword);
        $this->db2->or_like('name', $keyword);
				// if($role == '0'){
				// 	$this->db2->where('status_ho', $status);
				// }else{
				// 	$this->db2->where('status_so', $status);
				// }
        if($dept != ''){
          $this->db2->where('dept', $dept);
        }
				$this->db2->group_by("sku");
        $data = $this->db2->get($outlet)->result();
      }

      $this->response($data, 200);
    }




    /*

     function update_data_get(){

      $sku = $this->get('sku');
      $stok_moka = $this->get('stok_moka');
      $stok_real = $this->get('stok_real');

      //$this->response(array('sku'=> $sku, 200));
      $this->db2->set('stok_moka', $stok_moka);
      $this->db2->set('stok_real', $stok_real);
      $this->db2->set('status_so', 1);
      $this->db2->where('sku', $sku);
      $update = $this->db2->update('m_barang');
      //
      if($update){
        $this->response(array('status' => '200'));
      }else{
        $this->response(array('status' => 'fail', 502));
      }

    }
*/
    function update_data_get(){
      $outlet = $this->get('outlet');
      $sku = $this->get('sku');
      $user = $this->get('user');
      $stok_gudang = $this->get('stok_gudang');
      $stok_area = $this->get('stok_area');
      $stok_lain = $this->get('stok_lain');
      $stok_real = $this->get('stok_real');
      $catatan = $this->get('catatan');

      //$this->response(array('sku'=> $sku, 200));
      $this->db2->set('stok_gudang', $stok_gudang);
      $this->db2->set('stok_area', $stok_area);
      $this->db2->set('stok_lain', $stok_lain);
      $this->db2->set('catatan', $catatan);
      $this->db2->set('stok_real', $stok_real);
      $this->db2->set('last_edited', $user);
      $this->db2->set('status_so', 1);
      $this->db2->where('sku', $sku);
      $update = $this->db2->update($outlet);
      //
      if($update){
        $this->response(array('status' => '200'));
      }else{
        $this->response(array('status' => 'fail', 502));
      }

    }

		function revisi_data_get(){
      $outlet = $this->get('outlet');
      $sku = $this->get('sku');
      $user = $this->get('user');
      $stok_revisi = $this->get('stok_revisi');
      $catatan_revisi = $this->get('catatan_revisi');

      //$this->response(array('sku'=> $sku, 200));
      // $this->db2->set('catatan_revisi', $catatan_revisi);
      $this->db2->set('stok_revisi', $stok_revisi);
			$this->db2->set('editor_revisi', $user);
      $this->db2->set('status_ho', 1);
      $this->db2->where('sku', $sku);
      $update = $this->db2->update($outlet);
      //
      if($update){
        $this->response(array('status' => '200'));
      }else{
        $this->response(array('status' => 'fail', 502));
      }

    }


    //nu ieu contoh post can aya isina
    function index_post(){

        $sku = $this->get('sku');
        $stok_moka = $this->get('stok_moka');
        $stok_real = $this->get('stok_real');


      // = $this->db->insert('telepon', $data);

      $this->db2->set('stok_moka', $stok_moka);
      $this->db2->set('stok_real', $stok_real);
      //$this->db->where('sku', $sku);
      $update = $this->db2->update('m_barang');

      if($update){
        $this->response($data, 200);
      }else{
        $this->response(array('status' => 'fail', 502));
      }

    }
    //TRANSAKSI


     function transaksi_get(){
      $id = $this->get('id');
      if($id == ''){
        $kontak = $this->db2->get('t_transaksi')->result();
      }else{
        $this->db2->where('id', $id);
        $kontak = $this->db2->get('t_transaksi')->result();
      }

      $this->response($kontak, 200);
    }

    function transaksi2_post(){
      $data = array(
        'id' => $this->post('id'),
        'nama'=> $this->post('nama'),
        'nomor'=> $this->post('nomor')
      );

      $insert = $this->db2->insert('telepon', $data);

      if($insert){
        $this->response($data, 200);
      }else{
        $this->response(array('status' => 'fail', 502));
      }
    }

   public function aksi_kirim_post(){


          $nama_file=rand();
          $pdfFilePath = FCPATH."/files/laporan/".$nama_file.".pdf"; //tentukan nama file dan lokasi report yang akan kita buat

          $file=$nama_file.".pdf";
          /*
          $data['siswa']=$this->Mpdf_model->select_data_siswa();
          */
          /*
          $data['barang_ho']=$this->Mpdf_model->select_barang_ho();
          */





      $email        				= $this->post('email');
      $dept                = $this->post('dept');
      $lokasi       				= $this->post('lokasi');
      $tanggal						= date('Y-m-d');
      $pelaksana       				= $this->post('pelaksana');
      $no_handphone       			= $this->post('no_handphone');
      $outlet                       = $this->post('outlet');


			//Insert data t_log_report
			// $dataInsert = array(
      //   'sender'=> $pelaksana,
      //   'target'=> $email,
			// 	'date'=> $tanggal,
      // );
			//
      // $this->db2->insert('t_log_report', $dataInsert);
			//


      $data['lokasi']=$lokasi;
      $data['tanggal']=$tanggal;
      $data['pelaksana']=$pelaksana;
      $data['no_handphone']=$no_handphone;
       $data['outlet']=$outlet;
       $data['dept']=$dept;

      $this->Mpdf_model->tambah_log($pelaksana,$email,$tanggal);

      if($dept){
        $data['barang_departemen']=$this->Mpdf_model->select_barang_departemen($dept,$outlet);
      }
      $data['departemen']=$this->Mpdf_model->select_departemen_ho($outlet);

      $mpdf = new \Mpdf\Mpdf();
      $data = $this->load->view('api/hasilPrint', $data, TRUE);
      $mpdf->WriteHTML($data);
      /*
      $pdfFilePath = FCPATH."/files/pengajuan/1.pdf";
      */
      $tes=$mpdf->Output($pdfFilePath,'F');

      /*
          $this->load->helper('download');
      $isi = 'Here is some text!';
          $nama_file = 'mytext.txt';
          force_download($nama_file, $isi);
          */

         $this->kirim_email_mpdf($email,$file,$lokasi,$tanggal,$pelaksana,$no_handphone);




  }



    public function kirim_email_mpdf($email,$file,$lokasi,$tanggal,$pelaksana="",$no_handphone=""){



     $this->load->library('email');
     $data['asu']="asu";
     $data['lokasi']=$lokasi;
     $data['tanggal']=$tanggal;

     $data['pelaksana']=$pelaksana;
     $data['no_handphone']=$no_handphone;

     $message = $this->load->view('email_baru/tes_mpdf',$data, TRUE);
     $this->email->from('no-reply@bursasajadah.com', 'PT. Aarti Jaya');
     $this->email->to($email);
     /*
     $this->email->cc('leni@aartijaya.com');
     $this->email->bcc('teni_rachmawati@aartijaya.com');
     */



     $this->email->subject('LAPORAN STOCK OPNAME (#'.$lokasi.') - ('.$pelaksana.')- ('.$tanggal.')');
     $this->email->message($message);

     if($file){
     $this->email->attach('http://portal.aartijaya.com/files/laporan/'.$file);
     }


     $insert=$this->email->send();


     if($insert){

        $this->response($insert, 200);
      }else{
       $this->response(array('status' => 'fail', 502));
      }


	}


   function export_excel_post(){
    ob_start();

      $outlet               = $this->post('outlet');


           $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Nama')
                      ->setCellValue('C1', 'Jenis Kelamin');



               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A1' , '1')
                           ->setCellValue('B1' , 'Rani')
                           ->setCellValue('C1', 'Laki-laki');



          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Latihan.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');




   }




}
?>
