<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class User_pengajuan extends CI_Controller {

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


    public function __construct()
    {

        parent::__construct();
        $this->load->model('user_pengajuan_model');
        $this->load->model('toko_model');
        $this->load->helper('tgl_indo');
        $this->load->model('Pengajuan_model');
        $this->load->model('Master_model');
        $this->load->model('ion_auth_model');
         $this->load->model('Purchase_model');
        $this->load->library('cart');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->helper('download');
        $this->load->library('excel');
        $apikey='?apikey=64c9bc94ff52e54a9f1c55229c852c36';

        
        
    }

	public function index()
	{   
        if (!$this->ion_auth->logged_in()){ redirect('login');}
        $data['id']=1;
       
        $ID= $this->ion_auth->user()->row()->id;
        $data['barang']  =$this->user_pengajuan_model->get_barang_non_dagang();
        $data['detail_sementara'] = $this->user_pengajuan_model->get_detail_sementara($ID);
		    $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('user/form_tambah_permintaan_3_inline',$data);
        $this->load->view('layouts/footer');
	}
  

/*
  function add_barang_db(){

        $mst_barang        = $this->input->post('id_barang');
        $barang_db         = explode("^",$mst_barang);
        $id_barang         = $barang_db[0];
        $nama_kategori     = $barang_db[1];
        $nama_barang       = $barang_db[2];
       

        $id_user           = $this->ion_auth->user()->row()->id;

        $tanggal_daftar    = date('Y-m-d');
        $jumlah_barang     = $this->input->post('jumlah_barang');
        $cek_kategori=$this->user_pengajuan_model->cek_pic_kategori($nama_kategori);
       
        foreach($cek_kategori as $rows){
          $id_kategori=$rows->id_kategori;
        }
    
        $satuan              = $this->input->post('satuan') ;
        $tanggal_dibutuhkan  = $this->input->post('tanggal_dibutuhkan');
        $tanggal_requi       = date("Y-m-d", strtotime($tanggal_dibutuhkan) );
        $deskripsi           = $this->input->post('deskripsi');
        /*

        $this->user_pengajuan_model->insert_detail_barang_pengajuan($id_kategori,$nama_kategori,$id_barang,$nama_barang,$jumlah_barang,$satuan,$tanggal_requi,$deskripsi,$id_user,$tanggal_daftar);

        $last_insert_id = $this->db->insert_id();
        echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Berhasil ditambah! 
            </b></div>');
            */

        //kirim email notif
            /*
        $cek_pic_kategori=$this->user_pengajuan_model->cek_pic_kategori($nama_kategori);

        foreach($cek_pic_kategori as $row){
          $id_pic[]=$row->id;
          $email_pic[] =$row->email;
          $firstname_pic =$row->first_name;
          $lastname_pic  =$row->last_name;
        }
        

       $datas=array(
            'id'=>$id_barang,
            'name'=>$nama_barang,
            'qty'=>'4',
            'price'=>'0',
          );
           $an=$this->cart->insert($datas);
           


        /*
        $this->kirim_email_pic($id_pic,$email_pic,$id_user,$last_insert_id,$firstname_pic,$lastname_pic);
        */
        /*
        redirect('tambah-permintaan-barang-non-dagang');
      
    }
    */

	/*
    function add_barang(){

        $id_barang   =$this->input->post('id_barang');
        $tanggal_dibutuhkan   =$this->input->post('tanggal_dibutuhkan');
        $tanggal_requi       = date("Y-m-d", strtotime($tanggal_dibutuhkan) );
        $id_s        = explode("|",$id_barang);
        $id_k        = explode("|",$id_kategori);
      
		$id            = $id_s[0];
		$nama_barang   = $id_s[1];
    $id_kategori   = $id_k[0];
    $nama_kategori = $id_k[1];

		$datas=array(
            'id'=>$id,
            'name'=>$nama_barang,
            'qty'=>$this->input->post('jumlah_barang'),
            'price'=>'0',
            'keterangan'=>$this->input->post('deskripsi'),
            'tanggal_dibutuhkan'=>$tanggal_requi,
            'satuan'=>$this->input->post('satuan'),
            'id_kategori'=>$id_kategori,
            'nama_kategori'=>$nama_kategori,
          );
           $an=$this->cart->insert($datas);
           echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Barang berhasil ditambah! 
            </b></div>');
        redirect('user-barang-non-dagang');
			
    }
*/

    function update_keranjang(){
        $item = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $nama_barang = $this->input->post('nama_barang');
        $satuan = $this->input->post('satuan');
        $price = $this->input->post('price');
        $tanggal_dibutuhkan = $this->input->post('tanggal_dibutuhkan');
        $keterangan = $this->input->post('keterangan');

       for($i=0;$i < count($item);$i++)
        {
            
         $data = array(
            'rowid' => $item[$i],
            'name' => $nama_barang[$i],
            'qty' => $qty[$i],
            'price' => $price[$i],
            'keterangan' => $keterangan[$i],
            'satuan' => $satuan[$i],
            'tanggal_dibutuhkan' => $tanggal_dibutuhkan[$i]
        );
            $this->cart->update($data);
        }



       

     redirect('user-barang-non-dagang');
    }

    function hapus_pengajuan($product){
        $data = array(
            'rowid' => $product,
            'qty' => 0
        );

        $this->cart->update($data);
        redirect('user-barang-non-dagang','Refresh');
    }

  public function add_ajax_barang($val){
        $query = $this->user_pengajuan_model->barang($val);
           $str = $this->db->last_query();
    
    $data = "<option value=''>- Pilih Barang -</option>";
      foreach ($query->result() as $value) {
          $data .= "<option value='".$value->id_barang."-".$value->nama_barang."'>".$value->nama_barang."</option>";
      }
      echo $data;

  }

	public function simpan_pengajuan_pr()
	{
		    $id_kategori                = $this->input->post('id_kategori');
        $id_user_pengajuan          = $this->input->post('id_user_pengajuan');
        $tanggal_pengajuan          = date('Y-m-d');
        $id_jenis_request           = '1';
        $first_name                 = $this->input->post('first_name');
        $last_name                  = $this->input->post('last_name');

        $this->user_pengajuan_model->insert_pengajuan($id_kategori,$id_user_pengajuan,$tanggal_pengajuan,$id_jenis_request);
        $last_insert_id = $this->db->insert_id();
         foreach ($this->cart->contents() as $items):
              $order_detail['id_pengajuan'] = $last_insert_id;
              $order_detail['nama_barang'] = $items['name'];
              $order_detail['id_barang'] = $items['id'];
              $order_detail['qty'] = $items['qty'];
              $order_detail['harga'] = $items['price'];
              $order_detail['tharga'] = $items['subtotal'];
              $order_detail['keterangan'] = $items['keterangan'];
              $order_detail['tanggal_dibutuhkan'] = $items['tanggal_dibutuhkan'];
              $order_detail['satuan'] = $items['satuan'];
              $this->db->insert("detail_pengajuan", $order_detail);
          endforeach;

         //insert history_pengajuan
         $cek_id_penerima=$this->user_pengajuan_model->cek_id_penerima($id_kategori);
         


         foreach($cek_id_penerima as $pem){
            $id_pic=$pem->id_user;
            $email=$pem->email;

         }


         $this->user_pengajuan_model->tambah_riwayat_pengajuan($last_insert_id,$id_pic);
         $this->kirim_email($id_pic,$email,$last_insert_id,$first_name,$last_name);
         $this->cart->destroy();
         $this->session->unset_userdata('users');
        

        echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Pengajuan berhasil dikirim! 
            </b></div>');
        redirect('user-barang-non-dagang');
	}

      function kirim_email($id_pic,$email,$last_insert_id,$first_name="",$last_name=""){

       $data['first_name']=$first_name;
       $data['last_name'] =$last_name;
       $data['id_pengajuan'] =$last_insert_id;
       $message = $this->load->view('email_permintaan/konfirm', $data,TRUE);
       $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
       $this->email->to($email);
       $this->email->subject('Pengajuan Permintaan Baru');
       $this->email->message($message);
       $this->email->send();
 }

     public function persetujuan()
     { 
        $ID_s = $this->ion_auth->user()->row()->id;
        $users_groups = $this->ion_auth_model->get_users_groups($ID_s)->result();
            $groups_array = array();
            foreach ($users_groups as $group)
            {
                $groups_array[$group->id] = $group->name;
                $groupname=$group->name;
                $groupid=$group->id;
            }
       

           $grup=array('manager');
          if ($this->ion_auth->in_group($group)){ 
           $data['daftar_persetujuan']=$this->user_pengajuan_model->select_daftar_persetujuan_pr($groupid,$ID_s);
          }else{
            $data['daftar_persetujuan']=$this->user_pengajuan_model->select_daftar_persetujuan_pr($groupid);
          }
       

        

        $grup=array('manager');
          if ($this->ion_auth->in_group($group)){ 
        $daftar=$this->Pengajuan_model->select_daftar_persetujuan($groupid,$ID_s);
        }else{
         $daftar=$this->Pengajuan_model->select_daftar_persetujuan($groupid);
        }
        foreach($daftar as $da){

            $data['email_pengirim']       =$da->email;
            $data['id_pengirim']          =$da->id;
            $data['id_pengajuan']         =$da->id_pengajuan;
            $data['id_jenis_request']     =$da->id_jenis_request;
            $data['urutan_pengajuan']     =$da->urutan;
            $data['urutan_groups']        =$da->id_groups;
            $data['id_history']           =$da->id_his;
            $data['id_user']              =$da->id_user;
            $data['id_penerima']          =$da->id_penerima;

        }
        
        $daterange=$this->input->get('daterange');
        $data['count_persetujuan']=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
        $data['count_permintaan']=$this->Home_model->count_per_bel_selesai($ID,$daterange);
        
        $data['count_total']=$data['count_persetujuan']+$data['count_permintaan'];
        
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidebar');
        $this->load->view('user/persetujuan_vw',$data);
        $this->load->view('layouts/footer');
    }



    public function jadikan_pr(){
    
        $id_pengajuan=$this->input->get('id');
        $data['kodeunik'] = $this->Pengajuan_model->code_otomatis();
        $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();
        $data['barang']=$this->Pengajuan_model->select_master_barang();
        $data['gedung']=$this->Pengajuan_model->select_master_gedung();
        $data['vendor']=$this->Pengajuan_model->select_master_vendor();
        $data['bank']=$this->Pengajuan_model->select_master_bank();
        $data['divisi']=$this->Pengajuan_model->select_master_divisi();
        $data['get_detail_pengajuan']=$this->user_pengajuan_model->get_detail_pengajuan($id_pengajuan);
        $data['get_pengajuan']=$this->user_pengajuan_model->get_detail_pr($id_pengajuan);
         $this->load->view('layouts/header',$data);
         $this->load->view('layouts/sidebar');
         $this->load->view('user/tambah_pr_vw',$data);
         $this->load->view('layouts/footer');

    }


    public function detail_pr(){
     
     $id_pengajuan=$this->input->post('ids');
     
     $data['detail_pr']=$this->user_pengajuan_model->get_detail_pr($id_pengajuan);
     $data['detail_barang_pr']=$this->user_pengajuan_model->get_detail_pengajuan($id_pengajuan);

     $this->load->view('user/detail_pr',$data);
    }


    public function send_keputusan(){
     
       $ID_pic     = $this->ion_auth->user()->row()->id;
       $email_pic  = $this->ion_auth->user()->row()->email;
       $firstname_pic  = $this->ion_auth->user()->row()->first_name;
       $lastname_pic   = $this->ion_auth->user()->row()->last_name;
       $tanggal=date('Y-m-d');

       $catatan         = $this->input->post('catatan');
       $status_approval = $this->input->post('status_approval');
       $id_pengajuan    = $this->input->post('id_pengajuan');
       
       $detail_pengajuan=$this->user_pengajuan_model->get_detail_pr($id_pengajuan);
       foreach($detail_pengajuan as $row){
           
              $first_name=$row->first_name;
              $last_name =$row->last_name;
              $email =$row->email;

       }
       

       $cek_terakhir=$this->Pengajuan_model->cek_status_terakhir($id_pengajuan);
        foreach($cek_terakhir as $c){
            $id_history=$c->id_history;
        }

       if($status_approval==2 or $status_approval==3 or $status_approval=="5"){
          $this->user_pengajuan_model->update_pengajuan($id_pengajuan,$status_approval,$ID_pic);
          $this->user_pengajuan_model->update_riwayat_persetujuan($status_approval,$id_history,$ID_pic,$tanggal);
        $this->kirim_email_pembuat($email,$id_pengajuan,$first_name,$last_name,$firstname_pic,$lastname_pic,$status_approval);
       }

       redirect('daftar-persetujuan-pr');
    }


    public function kirim_email_pembuat($email,$id_pengajuan,$first_name,$last_name,$firstname_pic,$lastname_pic,$status_approval){
     
       
       $data['detail_pengajuan']=$this->user_pengajuan_model->get_detail_pengajuan($id_pengajuan);
       $data['first_name']=$first_name;
       $data['last_name'] =$last_name;
       $data['id_pengajuan'] =$id_pengajuan;
       $data['first_name_pic']=$firstname_pic;
       $data['last_name_pic'] =$lastname_pic;
       $data['status_approval']=$status_approval;
       $message = $this->load->view('email_permintaan/konfirm_status', $data,TRUE);
       $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
       $this->email->to($email);
       $this->email->subject('Konfirmasi Status Pengajuan Permintaan');
       $this->email->message($message);
       $this->email->send();
    }


    function hapus_detail_barang(){
       $id_detail    =$this->input->get('id_detail');
       $id_pengajuan =$this->input->get('id_pengajuan');
       $this->user_pengajuan_model->hapus_detail_barang($id_detail);
       redirect('user_pengajuan/jadikan_pr?id='.$id_pengajuan);


    }

    function update_detail_barang(){

        $id           = $this->input->post('id_detail');
        $harga        = $this->input->post('harga');
        $id_vendor    = $this->input->post('id_vendor');
        $id_pengajuan = $this->input->post('id_pengajuan');
        $qty          = $this->input->post('qty');
        $satuan       = $this->input->post('satuan');
        $updateArray = array();

for($x = 0; $x < sizeof($id); $x++){

    $total[] = $harga[$x] * $qty[$x];
    
    $updateArray[] = array(
        'id_detail' =>$id[$x],
        'id_vendor' => $id_vendor[$x],
        'qty'       => $qty[$x],
        'harga'     => $harga[$x],
        'satuan'    => $satuan[$x],
        'tharga'    =>$total[$x]
    );
}      
     $this->db->update_batch('detail_pengajuan',$updateArray, 'id_detail');
     redirect('user_pengajuan/jadikan_pr?id='.$id_pengajuan);

    }

    public function save_submission(){

        $no_pengajuan         = $this->input->post('no_pengajuan');
        $id_pengajuan         = $this->input->post('id_pengajuan');
        $tanggal_pengajuan    = $this->input->post('tanggal_pengajuan');
        $id_jenis_request     = $this->input->post('id_jenis_request');
        $keterangan           = $this->input->post('keterangan');
        $tanggal_required     = $this->input->post('tanggal_required');
        $tanggal_requi        = date("Y-m-d", strtotime($tanggal_required) );
        $tujuan               = $this->input->post('tujuan');
        $id_gedung            = $this->input->post('id_gedung');
        $metode_pembayaran    = $this->input->post('metode_pembayaran');
        $ppn                  = $this->input->post('ppn');
        $id_bank              = $this->input->post('id_bank');
        $tanggal_jatuh_tem    = $this->input->post('tanggal_jatuh_tempo');
        $tanggal_jatuh_tempo  = date("Y-m-d", strtotime($tanggal_jatuh_tem) );
        $ID                   = $this->ion_auth->user()->row()->id;
        $status_approval      = 1;


        // selesai mengambil ID user yang login
        // cek jumlah group users
        
        $cek_jumlah_group_users=$this->Pengajuan_model->cek_jumlah_group_users($ID);

         // jika dia punya 1 group
        if($cek_jumlah_group_users==1){
        $cek_level_user     = $this->Pengajuan_model->cek_users($ID);
        foreach($cek_level_user as $rows){
              $group=$rows->name;
              $id_groups=$rows->id_groups;
              $email_pembuat=$rows->email;
              $id_line_manajer=$rows->id_line_manajer;
        }
        // jika punya lebih dari 1
        }else{
         $cek_group_users=$this->Pengajuan_model->cek_group_users($ID);
        
         foreach ($cek_group_users as $m) :
         $as[]=$m->group_id;
         ",";
        endforeach;
       $jabs = count($as)-1;  
       $value = $as;
       $ranking = array();
       foreach ($value as $k => $v){
          array_push($ranking, $v);
      }
  for ($a = 0; $a <= $jabs; $a++) {
  $id_g=$as[$a]; 
        $cekurutan=$this->Pengajuan_model->cekrule($id_jenis_request,$id_g);
        foreach($cekurutan as $ceks):
             $urutan_array[]=$ceks->urutan;
        endforeach;
      }
$terbesar=MAX($urutan_array);
/*
echo $terbesar;
die;


$MAX_VALUE=200;
    $a=$urutan_array;
    for($i=0;$i<count($a) ;$i++){
             if($a[$i] < $MAX_VALUE){
                 $MAX_VALUE=$a[$i];
             }

}
*/
$urutan_d= $terbesar;
$cek_id_groups=$this->Pengajuan_model->nextrule($id_jenis_request,$urutan_d);
foreach($cek_id_groups as $gr){

    $id_groups=$gr->id_groups;
}
}

        $foto = $_FILES['foto']['name'];
        if($foto){
        $foto_name = str_replace(" ", "_", $foto);
        $config['upload_path'] = './files/pengajuan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|csv';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
      }

        // Jika pilih permintaan barang
       $cari_total=$this->user_pengajuan_model->get_detail_pengajuan($id_pengajuan);
                foreach($cari_total as $tot){
                  $total_belanja +=$tot->tharga;
                }
        if($id_jenis_request==1){
            $aturan=$this->Pengajuan_model->select_aturan($id_jenis_request);
            if(count($aturan>0)){
            foreach($aturan as $row){
                $batas_atas=$row->batas_atas;
              }
            }
            if($total_belanja > $batas_atas){
              $id_jenis_request=3;
            }else{
              $id_jenis_request=1;
            }

        }
        // Selesai Permintaan Barang

        if($ppn){
             $total_belanja=$jumlahtotal;
        }else{
            $total_belanja=$total_belanja;
        }


      

        // Cek Rule

        $cekrule=$this->Pengajuan_model->cekrule($id_jenis_request,$id_groups);

        foreach($cekrule as $rul){
             $urutan=$rul->urutan;
        }

        /*
        $cek_manager=$this->Pengajuan_model->user_by_id($ID);
        foreach($cek_manager as $cem){
            $id_manager=$cem->id_line_manajer;
        }

        if($id_manager !=0 and $id_groups==2){
        foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }
       }elseif($id_manager==0 and $id_groups==2){


         foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }

        
             $urutan=$urutan+1;
       }elseif($id_manager==0 and $id_groups !=2){

     

         foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }
       }
       */
      
        // Selesai cek rule
        $this->user_pengajuan_model->update_pengajuan_new($no_pengajuan,$id_pengajuan,$tanggal_requi,$id_gedung,$metode_pembayaran,$id_bank,$tanggal_jatuh_tempo,$keterangan,$tujuan,$foto_name);
        $last_insert_id = $id_pengajuan;

        $cek_terakhir=$this->Pengajuan_model->cek_status_terakhir($id_pengajuan);

        foreach($cek_terakhir as $c){
            $id_history=$c->id_history;
        }

        $this->Pengajuan_model->update_history_pengajuan_new($status_approval,$id_history,$tanggal_pengajuan,$ID,$ket,$foto_name);


        /*
        $id_terakhir=$this->Pengajuan_model->select_id_terakhir();
        foreach($id_terakhir as $row){
             $last_insert_id = $row->id_pengajuan;
        }
        */
        
        $next_urutan=$urutan+1;
        $nextrule=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
        foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groupss=$next->id_groups;
        }

        $cek_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
        foreach($cek_manajer as $man){
          $id_line_manajer=$man->id_line_manajer;
        }

       

        
        // cek user penerimaa

        // jika urutan 1 and group name == manager -> artinya jika dia staff biasa dan grup penerima selanjutnya adalah manager

        if($urutan==1 and $namagroup=="manager"){
            $next=1;
              if($id_line_manajer !=0){
                
                
                      $cek_penerima=$this->Pengajuan_model->select_manajer($ID);
                      foreach ($cek_penerima as $ce) {
                             $id_penerima=$ce->id_line_manajer;
                         }
                       $cek_email_penerima=$this->Pengajuan_model->select_manajer($id_penerima);
                       foreach ($cek_email_penerima as $c):
                               $email_penerima[]=$c->email;
                               /*
                               
                               $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                               */
                        endforeach;

           
              }elseif($id_line_manajer==0 or $id_line_manajer==NULL){
               $next=$urutan+2;

               

               $nextrules=$this->Pengajuan_model->nextrule($id_jenis_request,$next);
                    foreach($nextrules as $nexts){
                          $namagroups=$nexts->nama_group;
                          $id_groupss=$nexts->id_groups;
                          }
              $cek_penerimaa_n=$this->Pengajuan_model->select_penerima($id_groupss);
                   foreach ($cek_penerimaa_n as $cemn) {
                          $id_penerima=$cemn->user_id;
                          $email_penerima[]=$cemn->email;
                          /*
                          $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                          */
                         }
              }
              

        }elseif($urutan !=1 and $namagroup !='manager'){
               

              $cek_penerimaa=$this->Pengajuan_model->select_penerima($id_groups);
              foreach ($cek_penerimaa as $cem) {
                 $id_penerima=$cem->user_id;
                 $email_penerima[]=$cem->email;
                 /*
                 $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                 */
                 }

        }elseif($urutan==1 and $namagroup !='manager'){
               $urutan=$urutan+2;
               $next=$urutan+2;
               $nextrules=$this->Pengajuan_model->nextrule($id_jenis_request,$urutan);
                    foreach($nextrules as $nexts){
                          $namagroups=$nexts->nama_group;
                          $id_groups=$nexts->id_groups;
                          }
              $cek_penerimaa_n=$this->Pengajuan_model->select_penerima($id_groups);
                   foreach ($cek_penerimaa_n as $cemn) {
                          $id_penerima=$cemn->user_id;
                          $email_penerima[]=$cemn->email;
                          /*
                          $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                          */
                    }

        }elseif($urutan !=1 and $namagroup =='manager'){
            if($id_line_manajer !=0){
                 
                
                      $cek_penerima=$this->Pengajuan_model->select_manajer($ID);
                      foreach ($cek_penerima as $ce) {
                             $id_penerima=$ce->id_line_manajer;
                         }
                       $cek_email_penerima=$this->Pengajuan_model->select_manajer($id_penerima);
                       foreach ($cek_email_penerima as $c):
                               $email_penerima[]=$c->email;
                               /*
                               
                               $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                               */
                        endforeach;

           
              }elseif($id_line_manajer==0 or $id_line_manajer==NULL){
               $next=$urutan+2;

               

               $nextrules=$this->Pengajuan_model->nextrule($id_jenis_request,$next);
                    foreach($nextrules as $nexts){
                          $namagroups=$nexts->nama_group;
                          $id_groupss=$nexts->id_groups;
                          }
              $cek_penerimaa_n=$this->Pengajuan_model->select_penerima($id_groupss);
                   foreach ($cek_penerimaa_n as $cemn) {
                          $id_penerima=$cemn->user_id;
                          $email_penerima[]=$cemn->email;
                          /*
                          $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                          */
                         }
              }
              
        }
         $jumlah_penerima=count($id_penerima);


        if($jumlah_penerima==0){
            $ket="Selesai";
        }
         if($jumlah_penerima > 0 and $status_approval==1){
         $this->Pengajuan_model->insert_history_pengajuan_new($id_pengajuan,'',$id_penerima,$next_urutan,'0',$id_groupss);

         }



       /*

       update history pengajuan new




         

        //insert data dan kirim email ke penerima
        /*
        $this->Pengajuan_model->insert_alokasi($id_gedung,$id_divisi, $nama_alokasi);
        $last_alokasi = $this->db->insert_id();
        */
  

   
    $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
/*
           $this->kirim_email_pembuat($email_pembuat,$last_insert_id,$total_belanja,$foto_name);
       
        // kirim email ke pembuat untuk konfirmasi  status persetujuan 
         /*
         $this->kirim_email_pembuat($email_pembuat, $last_insert_id,$total_belanja);
         */
       
         
         echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Permintaan berhasil ditambahkan dengan nomor 
              ' .$no_pengajuan.' 
            </b></div>');
         $this->cart->destroy();
         $this->session->unset_userdata('users');
         redirect('daftar-permintaan');


      }
 


        function kirim_email_penerima($email,$last_insert_id,$total_belanja,$foto_name=""){


$count_email=count($email);
        

$id_peng=$last_insert_id;
$your_file="Cepatlakoo-Dokumentasi.pdf";
         $this->load->helper('path');
$path = set_realpath('./files/pengajuan');
        $tot=number_format($total_belanja);
        $ID = $this->ion_auth->user()->row()->id;
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($last_insert_id);
        /*
    $history_terakhir=$this->Pengajuan_model->history_terakhir($last_insert_id);
        foreach($history_terakhir as $his){
            $urutan_sekarang=$his->urutan;
            $grup_sekarang=$his->name;
        }

         $data['urutan']=$urutan_sekarang;
       $data['grup_sekarang']=$grup_sekarang;
       */
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);

        $data['email']=$email;
        $data['id_pengirim']=$ID;
        $data['id_pengajuan']=$id_peng;

         foreach($permintaan_ajuan as $per){
             $data['no_pengajuan']=$per->no_pengajuan;
             $data['id_pengajuan']=$per->id_pengajuan;
             $data['first_name']=$per->first_name;
             $data['last_name']=$per->last_name;
             $data['nama_divisi']=$per->nama_divisi;
             $data['nama_jabatan']=$per->nama_jabatan;
             $data['tanggal_pengajuan']=$per->tanggal_pengajuan;
             $data['tanggal_required']=$per->tanggal_required;
             $data['jenis_request']=$per->jenis_request;
             $data['keterangan']=$per->keterangan;
             $data['last_status']=$per->last_status;
             $data['id_user_approval']=$per->id_user_approval;
             $data['status_user']=$per->status_user;
             $data['id_jenis_request']=$per->id_jenis_request;
             $data['ket']=$per->ket;
            $data['lampiran']=$per->lampiran;
            $data['tujuan']=$per->tujuan;
            $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['grand_total']=$per->grand_total;
             $nomor_pengajuan=$per->no_pengajuan;

             $tgl_pengajuan=$per->tanggal_pengajuan;
              $id_pengajuan=$per->id_pengajuan;
         }

    $data['vendor']=$this->Pengajuan_model->select_vendor($id_pengajuan);
    
               $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($id_pengajuan);                    
     $data['asu']='ase';
     $this->load->library('email');
     $data['pengajuan']=$this->Pengajuan_model->select_pengajuan_by_no($id_pengajuan);

$i=0;
while ($i <= $count_email)
{
  $email_asli=$email[$i];
  $data['email_asli']=$email_asli;
  $message = $this->load->view('email_baru/konfirmasi_email2',$data, TRUE);
  $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
    $this->email->to($email_asli);
   $this->email->subject('Pengajuan Permintaan Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
    /*
     $this->email->attach('http://localhost/approval_id/files/pengajuan/IMG_9840.jpg');
     */
     if($foto_name){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }
     
     $this->email->send();
    
  $i=$i+1;
}

 
      
  

     
     

  }



    // function yang digunakan untuk menambahkan permintaan barang dihalaman user
     
     function add_barang_db(){

        $mst_barang        = $this->input->post('id_barang');
        $barang_db         = explode("^",$mst_barang);
        $id_barang         = $barang_db[0];
        $nama_kategori     = $barang_db[1];
        $nama_barang       = $barang_db[2];
        $id_user           = $this->ion_auth->user()->row()->id;




        $tanggal_daftar    = date('Y-m-d');
        $jumlah_barang     = $this->input->post('jumlah_barang');
        $deskripsi_produk  = $this->input->post('deskripsi_produk');
        $cek_kategori=$this->user_pengajuan_model->cek_pic_kategori($nama_kategori);
       
        foreach($cek_kategori as $rows){
          $id_kategori=$rows->id_kategori;
        }
    
        $satuan              = $this->input->post('satuan') ;
        $tanggal_dibutuhkan  = $this->input->post('tanggal_dibutuhkan');
        $tanggal_requi       = date("Y-m-d", strtotime($tanggal_dibutuhkan) );
        $deskripsi           = $this->input->post('deskripsi');

        $this->user_pengajuan_model->insert_detail_barang_pengajuan($id_kategori,$nama_kategori,$id_barang,$nama_barang,$jumlah_barang,$satuan,$tanggal_requi,$deskripsi,$id_user,$tanggal_daftar,$deskripsi_produk);

        $last_insert_id = $this->db->insert_id();
        echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Berhasil ditambah! 
            </b></div>');

        //kirim email notif
        $cek_pic_kategori=$this->user_pengajuan_model->cek_pic_kategori($nama_kategori);

        foreach($cek_pic_kategori as $row){
          $id_pic[]=$row->id;
          $email_pic[] =$row->email;
          $firstname_pic =$row->first_name;
          $lastname_pic  =$row->last_name;
        }
        /*
        $this->kirim_email_pic($id_pic,$email_pic,$id_user,$last_insert_id,$firstname_pic,$lastname_pic);
        */
        redirect('tambah-permintaan-barang-non-dagang');
      
    }


     // function kirim email pemberitahuan ke PIC kalau ada  yang mengajukan permintaan

      function kirim_email_pic($id_pic,$email,$id_user,$last_insert_id,$firstname_pic,$lastname_pic){
        
        $get_users=$this->user_pengajuan_model->get_users($id_user);
          foreach($get_users as $us){
            $first_name=$us->first_name;
            $last_name =$us->last_name;
          }
        $count_email=count($email);
        $id_barang=$last_insert_id;
        $this->load->library('email');
       
        $data['first_name_pic']=$firstname_pic;
        $data['last_name_pic'] =$lastname_pic;
        $data['first_name']=$first_name;
        $data['last_name'] =$last_name;

        $i=0;
        while ($i <= $count_email)
        {
        $email_asli=$email[$i];
        $data['email_asli']=$email_asli;
        $message = $this->load->view('email_permintaan/notif_pic',$data, TRUE);
        $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
        $this->email->to($email_asli);
        $this->email->subject('Pengajuan Permintaan Produk Non Dagang - Baru (#'.$first_name.') - ('.$last_name.')');
        $this->email->message($message); 
        $this->email->send();
        $i=$i+1;
        }
    }

    
    // funcition untuk menampilkan daftar permintaan barang saya

     public function daftar_permintaan_barang()
    {
        if (!$this->ion_auth->logged_in()){ redirect('login');}
        $data['title']="Daftar Permintaan Saya";
        $id_user                         = $this->ion_auth->user()->row()->id;
        $data['daftar_permintaan_barang']= $this->user_pengajuan_model->tampil_daftar_permintaan_barang($id_user);
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidebar');
        $this->load->view('user/daftar_permintaan_barang',$data);
        $this->load->view('layouts/footer');
    }

///////////////////////////////////////////////////////// PIC

    public function pic_daftar_barang()
    {

        $group = array('pic','purchasing');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}

        $id_user                         = $this->ion_auth->user()->row()->id;
        if($id_user=='82' or $id_user=='130'){
        $data['pic_daftar_barang']=$this->user_pengajuan_model->pic_daftar_barang_purchasing($id_user);
        }else{
        $data['pic_daftar_barang']=$this->user_pengajuan_model->pic_daftar_barang($id_user);
        }
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidebar');
        $this->load->view('pic/pic_daftar_barang',$data);
        $this->load->view('layouts/footer');
    }


    public function buat_pr()
    {

        $ID = $this->ion_auth->user()->row()->id;
        $group = array('pic','purchasing');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}

        $id_user          = $this->ion_auth->user()->row()->id;
        $data['gedung']   = $this->Pengajuan_model->select_master_gedung();
        $data['vendor']   = $this->Pengajuan_model->select_master_vendor();
        $data['kodeunik'] = $this->user_pengajuan_model->cek_divisi_user($ID);
        $data['get_barang_detail'] = $this->user_pengajuan_model->pic_daftar_barang_belum($id_user);
        $detail                    = $this->user_pengajuan_model->pic_daftar_barang_belum($id_user);
        foreach ($detail as $dem){
            $kategori=$dem->pic_kategori;
        }
        $data['barang']=$this->user_pengajuan_model->select_master_barang($kategori);
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidebar');
        $this->load->view('pic/buat_pr',$data);
        $this->load->view('layouts/footer');
    }

      public function autocomplete_pr()
    {
        $id_barang=$_GET['id_barang'];
        $tampil_barang_id=$this->Purchase_model->tampil_barang_id($id_barang);
       


        echo json_encode($tampil_barang_id);
    }


    // function tambah barang baru pada saat PIC membuat purchase request

      function add_barang_baru(){

       
        $id_barang               = $this->input->post('barang');
        $metode_pembayaran    = $this->input->post('metode_pembayaran');
        $deskripsi_produk    = $this->input->post('deskripsi_produk');

        

        $id_pengajuan         = $this->input->post('id_pengajuan');

       
        $qty                   = $this->input->post('qty');
        $satuan                = $this->input->post('satuan');
        $harga                 = $this->input->post('harga');

        

        $id_divisi            = $this->input->post('id_divisi');
        $tharga=$qty * $harga;
        /*
    
        $this->user_pengajuan_model->update_barang_detail($id_detail,$id_barang,$qty,$satuan,$harga,$id_vendor,$metode_pembayaran,$id_pengajuan,$nama_barang,$id_divisi,$tharga);
           echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Barang berhasil ditambah! 
            </b></div>');
            */



        $this->Purchase_model->tambah_detail_pengajuan($id_pengajuan,$qty,$satuan,$harga,$tharga,$id_barang);
        redirect('tambah-detail-purchase-request/'.$id_pengajuan);
      
    }
    

    // membatalkan barang yang diajukan di halaman user

    public function batalkan_barang(){

      $id_detail           = $this->input->get('id_detail');
      $status              = $this->input->get('status');

      $this->user_pengajuan_model->batalkan_barang($id_detail,$status);
      if($status==0){
      echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Berhasil dikirimkan! 
            </b></div>');
      }elseif($status==1){
        echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Berhasil dibatalkan! 
            </b></div>');
      }
      redirect('daftar-permintaan-barang-non-dagang');
    }


     public function detail_barang_pic()
    {
        $id_detail= $this->input->post('ids');
        $data['id_detail']=$id_detail;
        $data['detail_barang']=$this->user_pengajuan_model->get_detail_barang($id_detail);
        $data['riwayat']=$this->toko_model->riwayat_produk($id_detail);
        $this->load->view('pic/detail_barang_pic',$data);
        
    }
    

    // function aksi buat purchase request - PIC

    function aksi_buat_pr(){

        $ID                            = $this->ion_auth->user()->row()->id;
        $no_pengajuan                  = $this->input->post('no_pengajuan');
        $tanggal_ajuan                 = $this->input->post('tanggal_pengajuan');
        $tanggal_pengajuan             = date("Y-m-d", strtotime($tanggal_ajuan));
        $tanggal_required              = $this->input->post('tanggal_required');
        $tanggal_dibutuhkan            = date("Y-m-d", strtotime($tanggal_required));
        $id_jenis_request              = $this->input->post('id_jenis_request');

        $foto = $_FILES['foto']['name'];
        $foto_name = str_replace(" ", "_", $foto);
        $config['upload_path'] = './files/pengajuan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|csv';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $id_gedung                  = $this->input->post('id_gedung');
        $keterangan                 = $this->input->post('keterangan');
        $this->user_pengajuan_model->insert_permintaan($no_pengajuan,$tanggal_pengajuan,$tanggal_dibutuhkan,$id_jenis_request,$foto_name,$id_gedung,$keterangan,$ID);
         $last_insert_id = $this->user_pengajuan_model->cek_id_pengajuan_terakhir();
             foreach($last_insert_id as $su){
              $id_terakhir=$su->id_pengajuan;
          }
        redirect('tambah-detail-purchase-request/'.$id_terakhir);

    }

   function tambah_detail_pengajuan($id_pengajuan){
        
        $group = array('pic','purchasing','members');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}


        $id_user                         = $this->ion_auth->user()->row()->id;
        $data['gedung']=$this->Pengajuan_model->select_master_gedung();
        $data['vendor']=$this->Pengajuan_model->select_master_vendor();
        $data['kodeunik'] = $this->Pengajuan_model->code_otomatis();
        $data['get_barang_detail']=$this->user_pengajuan_model->pic_daftar_barang_belum($id_user);
        $detail =$this->user_pengajuan_model->pic_daftar_barang_belum($id_user);
        foreach ($detail as $dem){
            $kategori=$dem->pic_kategori;
        }
       
/*
        $data['tax'] = json_decode($this->guzzle_get('https://api.jurnal.id/core/api/v1/taxes/','?apikey=4c547f08b182cc2435b563659e4f5f76'));
*/


        $data['pajak']=$this->Master_model->select_pajak();
         


        $data['id_pengajuan']=$id_pengajuan;
        $data['barang']=$this->user_pengajuan_model->select_master_barang();
        $data['pengajuan']=$this->user_pengajuan_model->tampil_pengajuan($id_pengajuan);
        $pengajuan=$this->user_pengajuan_model->tampil_pengajuan($id_pengajuan);
        foreach($pengajuan as $tos){
          $data['id_jenis_request']=$tos->id_jenis_request;
          $data['draft']=$tos->draft;
          $data['ppn']=$tos->ppn;
          $data['grand_total']=$tos->grand_total;
        }
        $data['bank']=$this->Pengajuan_model->select_master_bank();
        $data['detail_pr']=$this->user_pengajuan_model->tampil_detail_pr($id_pengajuan);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('pic/tambah_detail_barang',$data);
        $this->load->view('layouts/footer');
   }


    function list_pr(){
    	
        $group = array('pic','purchasing');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}

        $data['gedung']=$this->Pengajuan_model->select_master_gedung();
        $data['vendor']=$this->Pengajuan_model->select_master_vendor();
        $id_user        = $this->ion_auth->user()->row()->id;
        $data['list_pr']=$this->user_pengajuan_model->list_pr($id_user);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('pic/daftar_pr',$data);
        $this->load->view('layouts/footer');
   }

   function ubah_form_pengajuan(){
        $tanggal_requi          = $this->input->post('tanggal_dibutuhkan');
        $tanggal_dibutuhkan            = date("Y-m-d", strtotime($tanggal_requi));
        $id_lokasi                   = $this->input->post('id_lokasi');
        $keterangan                  = $this->input->post('keterangan');
        $id_pengajuan                = $this->input->post('id_pengajuan');
        $this->user_pengajuan_model->ubah_form_pengajuan($tanggal_dibutuhkan,$id_lokasi,$keterangan,$id_pengajuan);
        redirect('User_pengajuan/list_pr');

   }


   function hapus_barang_pr(){
     $id_detail          = $this->input->get('id_detail');
     $id_pengajuan       = $this->input->get('id_pengajuan');
     $this->user_pengajuan_model->hapus_barang_detail($id_detail);
     redirect('User_pengajuan/tambah_detail_pengajuan/'.$id_pengajuan);

   }

   function kirim_purchase_request(){

     
     $ID=$this->ion_auth->user()->row()->id;
     $cek_divisi=$this->user_pengajuan_model->get_users_id($ID);

     foreach($cek_divisi as $ce){
       $nama_divisi=$ce->nama_divisi;
     }

     $data['id_pengirim']         = $ID;
     $totall                      = $this->input->post('totall');
     $jumlahtotal                 = $this->input->post('jumlahtotal');
     $id_jenis_request            = $this->input->post('id_jenis_request');
     $id_pengajuan                = $this->input->post('id_pengajuan');
     $pajak                       = $this->input->post('tipe_pajak');
     $draft='0';
     $total_awal                  = $this->input->post('total_awal'); 
     $total_pajak                 = $this->input->post('total_pajakk');
    

     $pengajuan=$this->user_pengajuan_model->tampil_pengajuan($id_pengajuan);

     foreach($pengajuan as $col){
      $foto_name=$col->lampiran;
     }



    $var_pajak  = explode("^",$pajak);
    $id_tax     = $var_pajak[0];
    $nama_tax   = $var_pajak[1];
    $ppn   = $var_pajak[2];
     // selesai
     
     $grupsekarang="21";
     $cekrule=$this->Pengajuan_model->cekrule($id_jenis_request,$grupsekarang);


        foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }



    /////////////////////////////// next penerimaa

     $next_urutan=$urutan+1;
     $nextrule=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
        foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groupss=$next->id_groups;
        }


        
      if($namagroup=="manager"){

        // cek manajernya ada apa engga
        // kalau ada
        $cek_manager=$this->Pengajuan_model->user_by_id($ID);
        foreach($cek_manager as $cem){
            $id_manager=$cem->id_line_manajer;
        }


        

              // jika ada id manager
              if($id_manager){
                  $urutan_selanjutnya=$next_urutan;
                  $cek_email_penerima=$this->Pengajuan_model->select_manajer($id_manager);
                       foreach ($cek_email_penerima as $c):
                          $id_penerima[]=$c->id;
                          $email_penerima[]=$c->email;
                       endforeach;
              }elseif($id_manager==0 or $id_manager==NULL or $id_manager='NULL'){
              
                 $urutan_selanjutnya=$urutan+2;
                 $rule_selanjutnya=$this->Pengajuan_model->nextrule($id_jenis_request,$urutan_selanjutnya);
                 foreach($rule_selanjutnya as $rul){
                   $namagroups=$rul->nama_group;
                   $id_groupss=$rul->id_groups;
               }

               $cek_penerimaa_n=$this->Pengajuan_model->select_penerima($id_groupss);
                   foreach ($cek_penerimaa_n as $cemn) {
                          $id_penerima=$cemn->user_id;
                          $email_penerima[]=$cemn->email;
                          $id_penerima_user[]=$cemn->user_id;
                  }

             }
      }
     




      $this->user_pengajuan_model->update_draft($id_pengajuan,$ppn,$subtotal,$draft,$nama_tax,$id_tax,$total_pajak,$total_awal);
      $this->Pengajuan_model->insert_history_pengajuan_new($id_pengajuan,'','',$urutan_selanjutnya,'',$id_groupss);
      $this->kirim_email_user($email_penerima,$id_penerima, $id_pengajuan,$total_keseluruhan,$foto_name);
      $this->kirim_wa_user($email_penerima,$id_penerima,$id_pengajuan,$total_keseluruhan,$foto_name);


    

      $kirim=$this->Pengajuan_model->detail_barang_per_id($id_pengajuan);

      foreach($kirim as $kir){
           $id_detail[]=$kir->id_detail;
           $email_pembuat[]=$kir->email;
           $first_name[]=$kir->first_name;
      }
      

      $this->kirim_email_pengirim($email_pembuat,$id_detail,$first_name);

      redirect('user_pengajuan/list_pr');
      //////////////////////// ===================================  /////////////////////////

   }


   function kirim_notifikasi_user(){



   }


   function kirim_email_pengirim($email,$id_detail,$first_name){
      
       $count_email=count($email);


       $i=0;
        while ($i <= $count_email)
        {
          $email_asli=$email[$i];
          $id_detail_barang=$id_detail[$i];
         

          $first_name_pengirim=$first_name[$i];
          $data['first_name_pengirim']=$first_name_pengirim;

          $detail=$this->User_pengajuan_model->cek_detail_pengajuan($id_detail_barang);
          $data['detail']=$this->User_pengajuan_model->cek_detail_pengajuan($id_detail_barang);
          foreach($detail as $row){
                    $nama_barang=$row->nama_bar;
          }
          $data['nama_barang']=$nama_barang;
          $data['email_asli']=$email_asli;
          $message = $this->load->view('email_permintaan/notif_pengirim',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email_asli);
          $this->email->subject('Status Konfirmasi Permintaan Purchase Request - Baru (#'.$first_name_pengirim.')-(#'.$nama_barang.')');
          $this->email->message($message);
          if($lampiran_aja){
            $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$lampiran_aja);
          }
        $this->email->send();
        $i=$i+1;
        }
    }


   function kirim_wa_user($email,$id_penerima,$last_insert_id,$total_belanja,$foto_name=""){
      
        $count_email=count($email);
        $id_peng=$last_insert_id;
        $tot=number_format($total_belanja);
        $ID = $this->ion_auth->user()->row()->id;
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $pengajuan=$this->user_pengajuan_model->tampil_pengajuan($last_insert_id);
         foreach($pengajuan as $col){
          $foto_name=$col->lampiran;
          $nomor_pengajuan=$col->no_pengajuan;
          $tgl_pengajuan=$col->tanggal_pengajuan;
        }

     
      $data['vendor']=$this->Pengajuan_model->select_vendor($id_peng);
      $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($id_peng);
      $history=$this->user_pengajuan_model->cek_history_terakhir_pr($last_insert_id);
      foreach($history as $fo){
        $data['groupid']=$fo->groupid;
        $data['status_history']=$fo->status;

        $groupid=$fo->groupid;
      }
      foreach($permintaan_ajuan as $per){
            $data['no_pengajuan']=$per->no_pengajuan;
            $data['id_pengajuan']=$per->id_pengajuan;
            $data['first_name']=$per->first_name;
            $data['last_name']=$per->last_name;
            $data['nama_divisi']=$per->nama_divisi;
            $data['nama_jabatan']=$per->nama_jabatan;
            $data['tanggal_pengajuan']=$per->tanggal_pengajuan;
            $data['tanggal_required']=$per->tanggal_required;
            $data['jenis_request']=$per->jenis_request;
            $data['keterangan']=$per->keterangan;
            $data['last_status']=$per->last_status;
            $data['id_user_approval']=$per->id_user_approval;
            $data['status_user']=$per->status_user;
            $data['id_jenis_request']=$per->id_jenis_request;
            $data['ket']=$per->ket;
            $data['lampiran']=$per->lampiran;
            $data['tujuan']=$per->tujuan;
            $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['grand_total']=$per->grand_total;
            $data['id_pengirim']=$per->id_user;
            $data['id_divisi']=$per->id_divisi;
            $data['tipe_pajak']=$per->tipe_pajak;
            $data['nama_gedung']=$per->nama_gedung;
            $nomor_pengajuan=$per->no_pengajuan;
            $tgl_pengajuan=$per->tanggal_pengajuan;
            $id_pengajuan=$per->id_pengajuan;
            $lampiran_aja=$per->lampiran;
            $first_name=$per->first_name;
            $last_name=$per->last_name;
      }

       $data['pengajuan']=$this->Pengajuan_model->select_pengajuan_by_no($id_peng);
       $data['history']=$this->Pengajuan_model->history_pengajuan($id_peng);

           $key='e48201034420a5726679dc3e5bb45e4d57c7d124e3ca68b6';
           $url='http://116.203.92.59/api/send_message';
       $i=0;
        while ($i <= $count_email)
        {
 
          $email_asli=$email[$i];

          $cek_telepon_email=$this->User_pengajuan_model->cek_no_telepon($email_asli);
          $on='uncg';

          /*

          Purchase_request/keputusan_telepon?id_po=<?php echo $id_permintaan.'-'.$groupid.'-'.$phone;
          */
          $base_url=base_url();

          $url_link=base_url().'Purchase_request/keputusan_telepon?id_po='.$id_pengajuan.'-'.$groupid.'-'.$cek_telepon_email;
          $data = array(
            "phone_no"=> $cek_telepon_email,
            "key"   =>$key,
            "message" =>''.$first_name.' '.$last_name.' meminta konfirmasi permintaan barang non dagang dengan nomor'.$nomor_pengajuan.' Cek disini '.$url_link
          );
          $data_string = json_encode($data);

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_VERBOSE, 0);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
          curl_setopt($ch, CURLOPT_TIMEOUT, 360);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($data_string))
          );
          echo $res=curl_exec($ch);
          curl_close($ch);

            $i=$i+1;
        }
    }



      function kirim_email_user($email,$id_penerima,$last_insert_id,$total_belanja,$foto_name=""){
      
        $count_email=count($email);
        $id_peng=$last_insert_id;
        $tot=number_format($total_belanja);
        $ID = $this->ion_auth->user()->row()->id;
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $pengajuan=$this->user_pengajuan_model->tampil_pengajuan($last_insert_id);
         foreach($pengajuan as $col){
          $foto_name=$col->lampiran;
          $nomor_pengajuan=$col->no_pengajuan;
          $tgl_pengajuan=$col->tanggal_pengajuan;
        }

     
      $data['vendor']=$this->Pengajuan_model->select_vendor($id_peng);
      $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($id_peng);
      $history=$this->user_pengajuan_model->cek_history_terakhir_pr($last_insert_id);
      foreach($history as $fo){
        $data['groupid']=$fo->groupid;
        $data['status_history']=$fo->status;
      }
      foreach($permintaan_ajuan as $per){
            $data['no_pengajuan']=$per->no_pengajuan;
            $data['id_pengajuan']=$per->id_pengajuan;
            $data['first_name']=$per->first_name;
            $data['last_name']=$per->last_name;
            $data['nama_divisi']=$per->nama_divisi;
            $data['nama_jabatan']=$per->nama_jabatan;
            $data['tanggal_pengajuan']=$per->tanggal_pengajuan;
            $data['tanggal_required']=$per->tanggal_required;
            $data['jenis_request']=$per->jenis_request;
            $data['keterangan']=$per->keterangan;
            $data['last_status']=$per->last_status;
            $data['id_user_approval']=$per->id_user_approval;
            $data['status_user']=$per->status_user;
            $data['id_jenis_request']=$per->id_jenis_request;
            $data['ket']=$per->ket;
            $data['lampiran']=$per->lampiran;
            $data['tujuan']=$per->tujuan;
            $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['grand_total']=$per->grand_total;
            $data['id_pengirim']=$per->id_user;
            $data['id_divisi']=$per->id_divisi;
            $data['tipe_pajak']=$per->tipe_pajak;
            $data['nama_gedung']=$per->nama_gedung;
            $nomor_pengajuan=$per->no_pengajuan;
            $tgl_pengajuan=$per->tanggal_pengajuan;
            $id_pengajuan=$per->id_pengajuan;
            $lampiran_aja=$per->lampiran;
      }

       $data['pengajuan']=$this->Pengajuan_model->select_pengajuan_by_no($id_peng);
       $data['history']=$this->Pengajuan_model->history_pengajuan($id_peng);
       $i=0;
        while ($i <= $count_email)
        {
          $email_asli=$email[$i];
          $data['email_asli']=$email_asli;
          $message = $this->load->view('email_baru/konfirmasi_email2',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email_asli);
          $this->email->subject('Konfirmasi Permintaan Purchase Request - Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
          $this->email->message($message);
          if($lampiran_aja){
            $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$lampiran_aja);
          }
        $this->email->send();
        $i=$i+1;
        }
    }
  
  

public function guzzle_gets($url,$uri){
    $client = new GuzzleHttp\Client(['base_uri' => $url]);
    $response = $client->request('GET',$url);
    return $response->getBody()->getContents();
}

/////////////////////////////-----///////////////////////

public function guzzle_get($url,$uri){
    $client = new GuzzleHttp\Client(['base_uri' => $url]);
    $response = $client->request('GET',$uri);
    return $response->getBody()->getContents();
}


public function guzzle(){
   $data['data'] = json_decode($this->guzzle_get('http://httpbin.org','json'));
    $this->load->view('welcome_message',$data);
}



     public function list_pr_terima()
    {
       
        $group = array('purchasing');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}
        $ID_s = $this->ion_auth->user()->row()->id;
        $users_groups = $this->ion_auth_model->get_users_groups($ID_s)->result();
            $groups_array = array();
            foreach ($users_groups as $group)
            {
                $groups_array[$group->id] = $group->name;
                $groupname=$group->name;
                $groupid=$group->id;
            }
       
          
            if($ID_s=="82"){
              $groupids="16";
            }else{
              $groupids=$groupid;
            }

           $grup=array('manager');
          if ($this->ion_auth->in_group($group)){ 
           $data['list_pr']=$this->Pengajuan_model->select_daftar_persetujuan($groupids,$ID_s);
          }else{
            $data['list_pr']=$this->Pengajuan_model->select_daftar_persetujuan($groupids);
            


          }
       

        

$grup=array('manager');
          if ($this->ion_auth->in_group($group)){ 
        $daftar=$this->Pengajuan_model->select_daftar_persetujuan($groupids,$ID_s);
        }else{
$daftar=$this->Pengajuan_model->select_daftar_persetujuan($groupids);
        }
        foreach($daftar as $da){

            $data['email_pengirim']       =$da->email;
            $data['id_pengirim']          =$da->id;
            $data['id_pengajuan']         =$da->id_pengajuan;
            $data['id_jenis_request']     =$da->id_jenis_request;
            $data['urutan_pengajuan']     =$da->urutan;
            $data['urutan_groups']        =$da->id_groups;
            $data['id_history']           =$da->id_his;
            $data['id_user']            =$da->id_user;
            $data['id_penerima']        =$da->id_penerima;

        }
    
    $daterange=$this->input->get('daterange');
    $data['count_persetujuan']=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
    $data['count_permintaan']=$this->Home_model->count_per_bel_selesai($ID,$daterange);
    $data['count_total']=$data['count_persetujuan']+$data['count_permintaan'];
    $this->load->view('layouts/header');
    $this->load->view('layouts/sidebar');
    $this->load->view('user/list_pr_terima',$data);
    $this->load->view('layouts/footer');
    }

     
     

     function buat_po(){
      

      $group = array('purchasing');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}
      /*
      $this->load->view('layouts/sidebar');
      */
      
    
      $data['code_otomatis']=$this->User_pengajuan_model->code_otomatis_po();
      $data['supplier']=$this->Master_model->select_supplier();
      $data['syarat_pembayaran']=$this->Master_model->select_mst_pembayaran();
      $data['product_po']=$this->user_pengajuan_model->get_product_po();
      $data['gudang']=$this->Master_model->select_gudang();
      $data['barang']  =$this->user_pengajuan_model->get_barang_non_dagang();
      $this->load->view('layouts/header');
      $this->load->view('user/form_tambah_po_1',$data);

      $select_table_sementara=$this->user_pengajuan_model->select_table_sementara();
       
      foreach($select_table_sementara as $se){
        $id_detail[]=$se->id_detail_pengajuan;
      }
      

      $data['product2']=$this->user_pengajuan_model->get_product_po2($id_detail);
    
      /*
      $this->load->view('layouts/footer');
      */

     }

   public function autocomplete_supplier()
    {
      

        $id_supplier=$_GET['id_supplier'];

       

        $barang_detail=$this->user_pengajuan_model->ambil_supplier_detail($id_supplier);
        echo json_encode($barang_detail);

    }

    public function autocomplete_terms()
    {
        $terms=$_GET['terms'];

        $barang_detail=$this->user_pengajuan_model->ambil_terms_detail($terms);
        echo json_encode($barang_detail);
        /*
        $terms = $this->guzzle_get('https://api.jurnal.id/core/api/v1/terms/'.$terms,'?apikey=4c547f08b182cc2435b563659e4f5f76');
        echo $terms;
        */
    }

     public function autocomplete_product()
    {
        $id_product=$_GET['id_product'];
        

        $terms = $this->guzzle_get('https://api.jurnal.id/core/api/v1/products/'.$id_product,'?apikey=4c547f08b182cc2435b563659e4f5f76');
        echo $terms;
    }

       public function autocomplete_barang()
    {
        $id_barang=$_GET['id_barang'];

        $tanggal  = explode("|",$id_barang);
        $barang   = $tanggal[0];
        $kategori = $tanggal[1];

        $barang_detail=$this->user_pengajuan_model->ambil_barang_detail($barang);

        /*
        $terms = $this->guzzle_get('https://api.jurnal.id/core/api/v1/products/'.$id_product,'?apikey=4c547f08b182cc2435b563659e4f5f76');
        */
        echo json_encode($barang_detail);
    }


   public function simpan_po(){
    
    $id_po=$this->input->post('id_po');
    

    $supplier      = $this->input->post('id_supplier');
    $var_supplier  = explode("^",$supplier);
    $id_supplier   = $var_supplier[0];
    $nama_supplier = $var_supplier[1];


    $syaratPembayaran     = $this->input->post('syaratPembayaran');
    $var_syaratPembayaran = explode("^",$syaratPembayaran);
    $id_syarat_pembayaran = $var_syaratPembayaran[0];
    $nama_syarat_pembayaran = $var_syaratPembayaran[1];


    $gudang        = $this->input->post('id_gudang');
    $var_gudang    = explode("^",$gudang);
    $id_gudang     = $var_gudang[0];
    $nama_gudang   = $var_gudang[1];

    
    $email_supplier   =$this->input->post('email_supplier');
    $alamatSupplier   =$this->input->post('alamatSupplier');
    $alamatPengiriman =$this->input->post('alamatPengiriman');
    $tglTransaksi     =$this->input->post('tglTransaksi');
    $tglJatuhTempo    =$this->input->post('tglJatuhTempo');
   
    $tglPengiriman    =$this->input->post('tglPengiriman');
    $kirimMelalui     =$this->input->post('kirimMelalui');
    $noPelacakan      =$this->input->post('noPelacakan');
    $noTransaksi      =$this->input->post('noTransaksi');
    $noReferensi      =$this->input->post('noReferensi');
    $tag              =$this->input->post('tag');
    

    if($id_po){


   $this->user_pengajuan_model->update_purchase_order($id_supplier,$email_supplier,$alamatSupplier,$alamatPengiriman,$tglTransaksi,$tglJatuhTempo,$id_syarat_pembayaran,$tglPengiriman,$kirimMelalui,$noPelacakan,$noTransaksi,$noReferensi,$tag,$id_gudang,$nama_supplier,$nama_gudang,$nama_syarat_pembayaran,$id_po);
   

   $last_insert_id=$id_po;

    }else{
    $this->user_pengajuan_model->insert_purchase_order($id_supplier,$email_supplier,$alamatSupplier,$alamatPengiriman,$tglTransaksi,$tglJatuhTempo,$id_syarat_pembayaran,$tglPengiriman,$kirimMelalui,$noPelacakan,$noTransaksi,$noReferensi,$tag,$id_gudang,$nama_supplier,$nama_gudang,$nama_syarat_pembayaran);
    $last_insert_id = $this->user_pengajuan_model->select_id_terakhir();
    }
     redirect('User_pengajuan/detail_po/'.$last_insert_id);

   }


   public function detail_po($id){


    $group = array('purchasing');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}
   
    $data['barang_po']=$this->user_pengajuan_model->get_detail_po($id);

    $data['pajak']=$this->Master_model->select_pajak();

    $data['akun_pembayaran']=$this->Master_model->select_akun_pembayaran();

    
    $data['product_po']=$this->user_pengajuan_model->get_product_po();
    $data['id_purchase_order']=$id;
    
    $data['product_po']=$this->user_pengajuan_model->get_product_po();
    $data['barang']  =$this->user_pengajuan_model->get_barang_non_dagang();

    $datas=$this->user_pengajuan_model->select_purchase_order_byid($id);
    foreach($datas as $om){
      $data['pesan']=$om->pesan;
      $data['memo']=$om->memo;
      $data['diskon_all']=$om->diskon_all;
      $data['total_bayar']=$om->total_bayar;
      $data['id_akun_pembayaran']=$om->id_akun_pembayaran;
      $data['uang_muka']=$om->uang_muka;
      $data['sisa_tagihan']=$om->sisa_tagihan;
    }

    $this->load->view('layouts/header');
    $this->load->view('user/form_tambah_po_2',$data);

   }


   public function tambah_barang_po(){

    $id_detail           =$this->input->post('id_detail');
    $barang              =$this->input->post('barang');

    

    $deskripsi           =$this->input->post('deskripsi');
    $kuantitas           =$this->input->post('kuantitas');
    $satuan              =$this->input->post('satuan');
    $hargasatuan         =$this->input->post('hargasatuan');
    $diskon              =$this->input->post('diskon');
    $pajak               =$this->input->post('tax');

    $var_pajak  = explode("^",$pajak);
    $id_tax     = $var_pajak[0];
    $nama_tax   = $var_pajak[1];
    $rate_tax   = $var_pajak[2];
    $status_pemotongan   = $var_pajak[3];


    // split rate tax
    /*
    $arr = str_split($rate_tax);
    $parameter_tax=$arr[0];
    $var_angka  = explode($parameter_tax,$rate_tax);
    $angka_tax=$var_angka[1];
    */

    $tharga_po  = $hargasatuan * $kuantitas;
    $tharga_po_diskon=($diskon *100)*$tharga_po;
    $jumlah_tax=($rate_tax/100) * $tharga_po_diskon;
  

    if($status_pemotongan=="1"){
          $subtotal=$tharga_po - $jumlah_tax;
    }else{
          $subtotal=$tharga_po + $jumlah_tax; 
    }

    $id_purchase_order   =$this->input->post('id_purchase_order');
    $this->user_pengajuan_model->ubah_detail_pengajuan($id_detail,$id_purchase_order);
    $this->user_pengajuan_model->insert_detail_purchase_order($id_detail,$barang,$deskripsi,$kuantitas,$satuan,$hargasatuan,$diskon,$id_tax,$id_purchase_order,$nama_tax,$tharga_po,$rate_tax,$jumlah_tax,$subtotal);
     redirect('User_pengajuan/detail_po/'.$id_purchase_order);

   }


   public function list_purchase_order(){
    $group = array('purchasing');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}
    $ID_s = $this->ion_auth->user()->row()->id;
    $data['list_po']=$this->user_pengajuan_model->list_purchase_order($ID_s);
    $this->load->view('layouts/header');
    $this->load->view('layouts/sidebar');
    $this->load->view('user/list_purchase_order',$data);
    $this->load->view('layouts/footer');

   }


   public function kirim_purchase_order(){

    $pesan               =$this->input->post('pesan');
    $memo                =$this->input->post('memo');
    $id_purchase_order   =$this->input->post('id_purchase_order');
    $disc_all            =$this->input->post('disc_all');
    $subtotal            =$this->input->post('subtotal');
    $total_aja           =$this->input->post('total_aja');
    $akun                =$this->input->post('account');
    $var_akun            =explode("^",$akun);
    $id_account          =$var_akun[0];
    $number_account      =$var_akun[1];
    $nama_account        =$var_akun[2];
    $uang_muka           =$this->input->post('uang_muka');
    $sisa_tagihan        =$this->input->post('sisa_tagihan');
    $id_jenis_request    ='1';
    $grupsekarang="16";

      $cekrule=$this->Pengajuan_model->cekrule($id_jenis_request,$grupsekarang);
        foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }


     
            
        // penerima selanjutnya
        
    
        $next_penerima=$urutan+1; 
        $nextpenerima=$this->Pengajuan_model->nextrule($id_jenis_request,$next_penerima);

        $jumlah_penerima=count($nextpenerima);
        $status=$status_approval;
       // grup penerima
       foreach($nextpenerima as $nextpe){
              $groupname=$nextpe->nama_group;
              $groupid=$nextpe->id_groups;
        }


        // jika grupname bukanmanager

        if($groupname !='manager'){

            $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($groupid);
            foreach($select_penerima_baru as $pem){
             $nex_penerima=$pem->id;
             $nex_email[]=$pem->email;
            }

          


        }else{
        // jika bukan
          $select_line_manajer=$this->Pengajuan_model->user_by_id($id_pengirim);
          foreach($select_line_manajer as $sel){
          $nex_penerima=$sel->id_line_manajer;
          $nex_email=$sel->email;
          }
        }

    
    $total_belanja_po=$this->User_pengajuan_model->total_belanja_po($id_purchase_order);
    

    
    




    /*
    foreach($total_belanja_po as $row){
      $tharga_po +=$row->tharga_po;
    }
    */
    $tanggal=date('Y-m-d');
    $this->user_pengajuan_model->insert_history_pengajuan_po($tanggal,$nex_penerima,$next_penerima,$groupid,$id_purchase_order);
    
    $this->user_pengajuan_model->ubah_purchase_order($id_purchase_order,$pesan,$memo,$disc_all,$total_aja,$id_account,$number_account,$nama_account,$uang_muka,$sisa_tagihan);

$detail_po=$this->User_pengajuan_model->select_purchase_order_byid($id_purchase_order);


    foreach($detail_po as $po){
      $total_belanja=$po->total_bayar;
    }
    


    $this->kirim_email_purchase_order($nex_email,$nex_penerima, $id_purchase_order,$total_belanja);

     redirect('User_pengajuan/list_purchase_order');

   }




   function kirim_email_purchase_order($email,$id_penerima,$last_insert_id,$total_belanja,$foto_name=""){
    


        $data['id_penerima']=$id_penerima;
        $data['id_purchase_order']=$last_insert_id;
        $data['pengajuan']=$this->user_pengajuan_model->select_purchase_order_byid_join($last_insert_id);
        $pengajuan=$this->user_pengajuan_model->select_purchase_order_byid($last_insert_id);
         foreach($pengajuan as $po){
          $nomor_pengajuan=$po->no_po;
         }
        $data['permintaan']=$this->user_pengajuan_model->get_detail_po($last_insert_id);
        $count_email=count($email);
        $tot=number_format($total_belanja);
        
       $i=0;
        while ($i <= $count_email)
        {
          $email_asli=$email[$i];
          $data['email_asli']=$email_asli;
          $message = $this->load->view('email_baru/konfirmasi_po',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email_asli);
          $this->email->subject('Konfirmasi Persetujuan Purchase Order - Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')');
          $this->email->message($message);
          if($foto_name){
            $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
          }
        $this->email->send();
        $i=$i+1;
        }
    }
  


   function export_purchase_order(){

    
      include APPPATH.'third_party/PHPExcel/PHPExcel1.php';
    
    // Panggil class PHPExcel nya
    $csv = new PHPExcel();

    // Settingan awal fil excel
    $csv->getProperties()->setCreator('PT Aarti Jaya')
                 ->setLastModifiedBy('PT Aarti Jaya')
                 ->setTitle("PT Aarti Jaya")
                 ->setSubject("PT Aarti Jaya")
                 ->setDescription("PT Aarti Jaya")
                 ->setKeywords("PT Aarti Jaya");

    // Buat header tabel nya pada baris ke 1
    $csv->setActiveSheetIndex(0)->setCellValue('A1', "*Vendor"); // Set kolom A1 dengan tulisan "NO"
    $csv->setActiveSheetIndex(0)->setCellValue('B1', "Email");
    $csv->setActiveSheetIndex(0)->setCellValue('C1', "BillingAddress");
    $csv->setActiveSheetIndex(0)->setCellValue('D1', "ShippingAddress");
    $csv->setActiveSheetIndex(0)->setCellValue('E1', "*OrderDate");
    $csv->setActiveSheetIndex(0)->setCellValue('F1', "*DueDate");
    $csv->setActiveSheetIndex(0)->setCellValue('G1', "ShippingDate");
    $csv->setActiveSheetIndex(0)->setCellValue('H1', "ShipVia");
    $csv->setActiveSheetIndex(0)->setCellValue('I1', "TrackingNo");
    $csv->setActiveSheetIndex(0)->setCellValue('J1', "VendorRefNo");
    $csv->setActiveSheetIndex(0)->setCellValue('K1', "*OrderNumber");
    $csv->setActiveSheetIndex(0)->setCellValue('L1', "Message");
    $csv->setActiveSheetIndex(0)->setCellValue('M1', "Memo");
    $csv->setActiveSheetIndex(0)->setCellValue('N1', "*ProductName");
    $csv->setActiveSheetIndex(0)->setCellValue('O1', "Description");
    $csv->setActiveSheetIndex(0)->setCellValue('P1', "*Quantity");
    $csv->setActiveSheetIndex(0)->setCellValue('Q1', "Unit");
    $csv->setActiveSheetIndex(0)->setCellValue('R1', "*UnitPrice");
    $csv->setActiveSheetIndex(0)->setCellValue('S1', "ProductDiscountRate(%)");
    $csv->setActiveSheetIndex(0)->setCellValue('T1', "OrderDiscountRate(%)");
    $csv->setActiveSheetIndex(0)->setCellValue('U1', "TaxName");
    $csv->setActiveSheetIndex(0)->setCellValue('V1', "TaxRate(%)");
    $csv->setActiveSheetIndex(0)->setCellValue('W1', "ShippingFee");
    $csv->setActiveSheetIndex(0)->setCellValue('X1', "#paid?(yes/no)");
    $csv->setActiveSheetIndex(0)->setCellValue('Y1', "#PaymentMethod");
    $csv->setActiveSheetIndex(0)->setCellValue('Z1', "#PaidFromAccountCode");
    $csv->setActiveSheetIndex(0)->setCellValue('AA1', "Tags (use ; to separate tags)");
    $csv->setActiveSheetIndex(0)->setCellValue('AB1', "WarehouseName");
    
    
     $id_po              =$this->input->get('id_po');
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->User_pengajuan_model->get_export_po($id_po);

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa

      if($data->sisa_tagihan==0){
        $sisa="yes";
      }elseif($data->sisa_tagihan > 0){
        $sisa="no";
      }
      $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->nama_supplier);
      $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->email);
      $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->alamat_supplier);
      $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->alamat_pengiriman);
      $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tgl_transaksi);
      $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tgl_jatuh_tempo);
      $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tgl_pengiriman);
      $csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->kirim_melalui);
      $csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->no_pelacakan);
      $csv->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->no_referensi);
      $csv->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->no_po);
      $csv->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->pesan);
      $csv->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->memo);
      $csv->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->nama_barang);
      $csv->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->deskripsi);
      $csv->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->qty);
      $csv->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->unit);
      $csv->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->harga_po);
      $csv->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->diskon);
      $csv->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->diskon_all);
      $csv->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->nama_tax);
      $csv->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->rate_tax);
      $csv->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->biaya_pengiriman);
      $csv->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $sisa);
      $csv->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->nama_akun_pembayaran);
      $csv->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->nomor_akun_pembayaran);
      $csv->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->tag);
      $csv->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->nama_gudang);
     
      
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set orientasi kertas jadi LANDSCAPE
    $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $csv->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
    $csv->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="PurchaseOrderTemplateTWU.csv"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = new PHPExcel_Writer_CSV($csv);
    $write->save('php://output');


   }

/*
    function sinkron(){
      
      $this->load->view('layouts/header');
      
      $total=10;
      $products = json_decode($this->guzzle_get('https://api.jurnal.id/core/api/v1/products','?apikey=4c547f08b182cc2435b563659e4f5f76&page_size='.$total));

      foreach($products->products as $ow){
        $id[]=$ow->id;
      }

     var_dump($id);
     die;

    }
*/


    function hapus_barang_po_detail(){
     
    $id_detail_po       =$this->input->get('id_detail_po');
    $id_detail_pengajuan=$this->input->get('id_detail_pengajuan');
    $id_po=$this->input->get('id_po');
    $this->user_pengajuan_model->hapus_detail_po($id_detail_po);
    $this->user_pengajuan_model->update_detail_po_pengajuan($id_detail_pengajuan);
    redirect('User_pengajuan/detail_po/'.$id_po);

    }


    function daftar_persetujuan_purchase_order(){
      $group = array('general manager');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}
      $ID     = $this->ion_auth->user()->row()->id;
       $users_groups = $this->ion_auth_model->get_users_groups($ID)->result();
           $groups_array = array();
            foreach ($users_groups as $group)
            {
                $groups_array[$group->id] = $group->name;
                $groupname=$group->name;
                $groupid=$group->id;
            }
       
      $data['purchase_order']=$this->user_pengajuan_model->select_purchase_order_id($groupid);
      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $this->load->view('user/daftar_persetujuan_purchase_order',$data);
      $this->load->view('layouts/footer');
    }


    function simpan_keputusan_po(){
     $ID     = $this->ion_auth->user()->row()->id;
     $tanggal=date('Y-m-d');
     $email_pengirim   = $this->input->post('email_pengirim');
     $id_pengirim      = $this->input->post('id_pengirim');
     $id_jenis_request = $this->input->post('id_jenis_request');
     $urutan = $this->input->post('urutan');
    
     
        $foto = $_FILES['foto']['name'];
        if($foto){
        $foto_name = str_replace(" ", "_", $foto);
        $config['upload_path'] = './files/po/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|csv';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
      }


     $status_approval = $this->input->post('status_approval');
     $id_pengajuan = $this->input->post('id_pengajuan');


     $id_history   = $this->input->post('id_history');
     $next_urutan=$urutan+1;

       $nextrule=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
       $jumlah_penerima=count($nextrule);
       foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groups=$next->id_groups;
        }
            
       


         $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($id_groups);
            foreach($select_penerima_baru as $pem){
             $nex_penerima=$pem->id;
             $nex_email[]=$pem->email;
            }

       ////

      $total_belanja_po=$this->user_pengajuan_model->cek_total_belanja_po($id_pengajuan);
      foreach($total_belanja_po as $ows){
        $total_belanja=$ows->total_bayar;
      }


     

      
        if($jumlah_penerima==0){
            $ket="Selesai";
        }

         

        $this->user_pengajuan_model->update_riwayat_persetujuan($status_approval,$id_history,$ID,$tanggal);
         if($jumlah_penerima > 0 and $status_approval==1){
             $this->user_pengajuan_model->insert_history_pengajuan_po($tanggal,$nex_penerima,$next_urutan,$id_groups,$id_pengajuan,$ket);
              $this->kirim_email_purchase_order($nex_email,$nex_penerima, $id_pengajuan,$total_belanja);
         }elseif($jumlah_penerima==0 and $status_approval==1){
              $select_finance=$this->user_pengajuan_model->select_finance();
              foreach($select_finance as $row){
                $email_finance[]=$row->email;
              }
              $this->kirim_email_purchase_order_finance($email_finance,$id_pengajuan,$total_belanja);
         }

       
        $this->kirim_email_pembuat_po($email_pengirim,$id_pengajuan,$total_belanja);
        redirect('User_pengajuan/daftar_persetujuan_purchase_order','Refresh');


    }

    function kirim_email_pembuat_po($email,$id_pengajuan,$total_belanja){
          
        $data['id_purchase_order']=$id_pengajuan;
        $data['pengajuan']=$this->user_pengajuan_model->select_purchase_order_byid_join($id_pengajuan);
        $pengajuan=$this->user_pengajuan_model->select_purchase_order_byid($id_pengajuan);
        foreach($pengajuan as $po){
          $nomor_pengajuan=$po->no_po;
        }
        $data['permintaan']=$this->user_pengajuan_model->get_detail_po($id_pengajuan);
        $count_email=count($email);
        $tot=number_format($total_belanja);
      
          $message = $this->load->view('email_baru/konfirmasi_po_pembuat',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email);
          $this->email->subject('Status Konfirmasi Persetujuan Purchase Order - Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')');
          $this->email->message($message);
          if($foto_name){
            $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
          }
        $this->email->send();
        
    }

    function edit_po(){
       $id_purchase=$this->input->get('id_purchase');
       $data['id_po']=$id_purchase;
       $purchase=$this->user_pengajuan_model->select_purchase_order_byid($id_purchase);

      $data['supplier'] = json_decode($this->guzzle_get('https://api.jurnal.id/core/api/v1/vendors','?apikey=4c547f08b182cc2435b563659e4f5f76'));
      $data['terms'] = json_decode($this->guzzle_get('https://api.jurnal.id/core/api/v1/terms','?apikey=4c547f08b182cc2435b563659e4f5f76'));

      $data['warehouse'] = json_decode($this->guzzle_get('https://api.jurnal.id/core/api/v1/warehouses/','?apikey=4c547f08b182cc2435b563659e4f5f76'));
    
      $data['tax'] = json_decode($this->guzzle_get('https://api.jurnal.id/core/api/v1/taxes/','?apikey=4c547f08b182cc2435b563659e4f5f76'));

       foreach($purchase as $pur){
        $data['id_supplier']=$pur->id_supplier;
        $data['email']=$pur->email;
        $data['alamat_supplier']=$pur->alamat_supplier;
        $data['tgl_transaksi']=$pur->tgl_transaksi;
        $data['tgl_jatuh_tempo']=$pur->tgl_jatuh_tempo;
        $data['syarat_pembayaran']=$pur->syarat_pembayaran;
        $data['tgl_pengiriman']=$pur->tgl_pengiriman;
        $data['kirim_melalui']=$pur->kirim_melalui;
        $data['no_pelacakan']=$pur->no_pelacakan;
        $data['no_po']=$pur->no_po;
        $data['no_referensi']=$pur->no_referensi;
        $data['tag']=$pur->tag;
        $data['id_gudang']=$pur->id_gudang;

       }
       $this->load->view('layouts/header');
       $this->load->view('user/form_edit_po_1',$data);
       

    }


   function simpan_keputusan_po_email(){

     $status_approval=$this->input->get('status_approval');
     $email=$this->input->get('email');
     $ID=$this->user_pengajuan_model->cek_users_id($email);
      $cek_users_group_email = $this->User_pengajuan_model->cek_group_users($email);
        

          foreach($cek_users_group_email as $row){
               $group_approv=$row->group_id;
          }
     $id_pengajuan=$this->input->get('id_pengajuan');
     $id_jenis_request=$this->input->get('id_jenis_request');

     $cek_terakhirr=$this->Pengajuan_model->cek_status_terakhir($id_pengajuan);
        foreach($cek_terakhirr as $cc){
            $urutan=$cc->urutan;
        }

 $cek_terakhir=$this->user_pengajuan_model->cek_history_terakhir_po($id_pengajuan);
        foreach($cek_terakhir as $c){
            $id_history=$c->id_history;
        }


     $tampil_satu_history=$this->User_pengajuan_model->tampil_satu_history($id_pengajuan,$group_approv);
    
     foreach($tampil_satu_history as $ro){
          $status=$ro->status;
          $id_user_approval=$ro->id_user_approval;
     }
        
        if($status !=0 and $id_user_approval !=0){
            redirect('Login_User/gagal');

      }else{

       // yg acc
       $next_urutan=$urutan+1;
       $nextrule=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
       $jumlah_penerima=count($nextrule);
       foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groups=$next->id_groups;
        }


   


        if($groupname !='manager'){

            $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($id_groups);
            

            foreach($select_penerima_baru as $pem){
             $nex_penerima=$pem->id;
             $nex_email[]=$pem->email;
            }

          
            


        }else{
        // jika bukan
          $select_line_manajer=$this->Pengajuan_model->user_by_id($id_pengirim);
          foreach($select_line_manajer as $sel){
          $nex_penerima=$sel->id_line_manajer;
          $nex_email=$sel->email;
          }
        }



       

      $total_belanja_po=$this->user_pengajuan_model->cek_total_belanja_po($id_pengajuan);
      foreach($total_belanja_po as $ows){
        $total_belanja=$ows->total_bayar;
         $email_pengirim=$ows->email;
      }


     

      
        if($jumlah_penerima==0){
            $ket="Selesai";
        }

         
       $tanggal=date('Y-m-d');
        $this->user_pengajuan_model->update_riwayat_persetujuan($status_approval,$id_history,$ID,$tanggal);
         if($jumlah_penerima > 0 and $status_approval==1){
             $this->user_pengajuan_model->insert_history_pengajuan_po($tanggal,$nex_penerima,$next_urutan,$id_groups,$id_pengajuan,$ket);

          $this->kirim_email_purchase_order($nex_email,$nex_penerima, $id_pengajuan,$total_belanja);
         }elseif($jumlah_penerima==0 and $status_approval==1){
              $select_finance=$this->user_pengajuan_model->select_finance();
              foreach($select_finance as $row){
                $email_finance[]=$row->email;
              }
              $this->kirim_email_purchase_order_finance($email_finance,$id_pengajuan,$total_belanja);
         }

          $this->kirim_email_pembuat_po($email_pengirim,$id_pengajuan,$total_belanja);
          
          redirect('Login_User/berhasil');
           
        }
   }



     function tampil_satu_purchase_order(){

      $id_po= $this->input->post('ids');
      $data['permintaan_ajuan']=$this->User_pengajuan_model->select_purchase_order_byid_join($id_po);
      $detail_po=$this->User_pengajuan_model->select_purchase_order_byid_join($id_po);
      foreach($detail_po as $des){
         $data['no_permintaan']=$des->no_po;
      }

      $data['permintaan']=$this->User_pengajuan_model->get_detail_po($id_po);
      $data['history']=$this->User_pengajuan_model->cek_history_terakhir_po($id_po);
      $this->load->view('purchase_order/detail_purchase_order',$data);
     }




   function sinkron_produk(){
     
     
    $product = json_decode($this->guzzle_get('https://api.jurnal.id/core/api/v1/products/','?apikey=4c547f08b182cc2435b563659e4f5f76'));
    
    /* foreach($product->products as $row){
      
      $id_barang = $row->total_count;
      
    }
    
    echo $id_barang; */
    
    /* echo $product->total_count; */
    
    $a = $product->total_count;
    
    $b=3;
    
    $product2 = json_decode($this->guzzle_get('https://api.jurnal.id/core/api/v1/products/','?apikey=4c547f08b182cc2435b563659e4f5f76&page_size='.$b));
    
    foreach($product2->products as $row){
      
      $id_barang[] = $row->id;
      
    }
    
    var_dump($id_barang);
   }





   function hapus_detailpengajuan(){
       $id_detail=$this->input->get('id_detail');
       $this->user_pengajuan_model->hapus_barang_detail_pengajuan($id_detail);
       redirect('tambah-permintaan-barang-non-dagang');
   }


   function simpan_produk_pr(){

    $ID                      = $this->ion_auth->user()->row()->id;
    $id_detail               =$this->input->post('id_detail');
    $qty                     =$this->input->post('qty');
    $tanggal_dibutuhkan      =$this->input->post('tanggal_dibutuhkan');
    $deskripsi               =$this->input->post('deskripsi');
    $deskripsi_produk        =$this->input->post('deskripsi_produk');


    $kode_unik=rand();
    
     $line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
     foreach($line_manajer as $row){
         $id_line_manajer=$row->id_line_manajer;
         $id_divisi      =$row->id_divisi;
         $status_rule    =$row->status_rule;
         $first_name     =$row->first_name;
     }
    
    // Jika dia user kopo
    if($status_rule==0){

      $draft=0;
      $updateArray = array();

      for($x = 0; $x < sizeof($id_detail); $x++){
      $id_detail_barang=$id_detail[$x];



      $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail_barang);

       foreach($cek_detail_barang as $ce){
            $id_user=$ce->id_user;
            $kategori[]=$ce->id_kategori_barang;
            $id_kategori=$ce->id_kategori_barang;
       }

        $cek_pic_kategori=$this->user_pengajuan_model->cek_pic_kategori_id($id_kategori);
        foreach($cek_pic_kategori as $row){
          $id_pic[]=$row->id;
          $email_pic[] =$row->email;
          $firstname_pic =$row->first_name;
          $lastname_pic  =$row->last_name;
          $pic_id=$row->id;
        }

     }



      $tampil_daftar_kategori=$this->toko_model->tampil_daftar_kategori('82');
      foreach($tampil_daftar_kategori as $ros){
           $id_kategori_barangs[]=$ros->id_kategori_barang;
      }

      
       $TampungArray = array_diff($kategori,$id_kategori_barangs);

      if (in_array('82', $id_pic)){

       $id_pengirim=$id_user;
       $code_otomatis=$this->user_pengajuan_model->cek_divisi_user($id_pengirim);
       $tanggal_pengajuan=date('Y-m-d');
       $tanggal_dibutuhkan=date('Y-m-d');
       $id_jenis_request="1";
       $id_gedung=$this->user_pengajuan_model->cek_id_gedung($id_pengirim);

       /*
       var_dump($kategori);
       echo "<br>";
       var_dump($TampungArray);
       die;
       */
      $this->user_pengajuan_model->insert_permintaan($code_otomatis,$tanggal_pengajuan,$tanggal_dibutuhkan,$id_jenis_request,$foto_name,$id_gedung,$keterangan,$id_pengirim,'0');

      $last_insert_id=$this->user_pengajuan_model->cek_id_pengajuan_terakhir();
           foreach($last_insert_id as $do){
             $id_terakhir = $do->id_pengajuan;
           }


        }else{

           for($x = 0; $x < sizeof($id_detail); $x++){
              $insertPurchaseRequestt[] = array(
              'id_detail'        =>$id_detail[$x],
              'id_pengajuan'     =>'0',
              'draft       '     =>'0',
              'groupid       '     =>'14'
            );
           }

           $this->db->update_batch('detail_pengajuan' , $insertPurchaseRequestt , 'id_detail' );
       }

      $insertPurchaseRequest = array();
      for($x = 0; $x < sizeof($id_detail); $x++){
        $id_detail_barang=$id_detail[$x];
        $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail_barang);

        foreach($cek_detail_barang as $ro){
           $kategori_id=$ro->id_kategori_barang;
        }

      if (in_array($kategori_id, $TampungArray)) {
      $insertPurchaseRequest_d[] = array(
        'id_detail'        =>$id_detail[$x],
        'id_pengajuan'     =>'0',
        'draft       '     =>'0',
        'groupid       '     =>'14'
      );

        $this->db->update_batch('detail_pengajuan' , $insertPurchaseRequest_d , 'id_detail' );
     
       } else {
      $insertPurchaseRequest[] = array(
        'id_detail'        =>$id_detail[$x],
        'id_pengajuan'     =>$id_terakhir,
        'draft       '     =>'0',
        'groupid       '     =>'14'
      );
      $this->db->update_batch('detail_pengajuan' , $insertPurchaseRequest , 'id_detail' );
      
      }
    }
      
      if($id_terakhir){

        $cek_level_user=$this->User_pengajuan_model->cek_line_manajer($id_pengirim);
        foreach($cek_level_user as $row){
          $id_manajer=$row->id_line_manajer;

        }

       
         /*
        if($id_manajer !=0){
           $id_groupss="15";
           $urutan_selanjutnya="3";

            $line_manajer=$this->User_pengajuan_model->cek_line_manajer($id_manajer);
            foreach($line_manajer as $rok){
              $email_array[]=$rok->email;
            }


        }elseif($id_manajer==0){
            $id_groupss="16";
            $urutan_selanjutnya="6";
            /*
            $get_general_manager=$this->User_pengajuan_model->cek_general_manager('14');
            foreach($get_general_manager as $ge){
              $email_array[]=$ge->email;
            }
            */
           /*
        }
        */


            $id_groupss="16";
            $urutan_selanjutnya="6";
       $this->Pengajuan_model->insert_history_pengajuan_new($id_terakhir,'','',$urutan_selanjutnya,'',$id_groupss,'');
       $this->kirim_email_penerima($email_array,$id_terakhir,'0');



       }   
    // Ttapi jika dia user toko
    }elseif($status_rule==1){

            if($id_line_manajer==0){
                $draft=5;
            }elseif($id_line_manajer !=0){
                $draft=4;
            }

    
     

    // user toko
     if($draft=="4"){
        $groupid="15";
        $urutan="2";
     }elseif($draft=="5"){
        $groupid="23";
        $urutan="3";
     }

     $updateArray = array();

      for($x = 0; $x < sizeof($id_detail); $x++){
      $id_detail_barang=$id_detail[$x];
      $updateArray[] = array(
        'id_detail' =>$id_detail[$x],
        'qty' =>$qty[$x],
        'tanggal_dibutuhkan' =>$tanggal_dibutuhkan[$x],
        'keterangan' =>$deskripsi[$x],
        'deskripsi_produk' =>$deskripsi_produk[$x],
        'draft'       => $draft,
        'kode_unik'       => $kode_unik,
        'groupid'       => $groupid
    );
       
    $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail_barang);

       foreach($cek_detail_barang as $ce){
            $id_user=$ce->id_user;
            $kategori[]=$ce->id_kategori_barang;
            $id_kategori=$ce->id_kategori_barang;

       }

       $cek_pic_kategori=$this->user_pengajuan_model->cek_pic_kategori_id($id_kategori);
        foreach($cek_pic_kategori as $row){
          $id_pic[]=$row->id;
          $email_pic[] =$row->email;
          $firstname_pic =$row->first_name;
          $lastname_pic  =$row->last_name;
        }
         

         /*
       if($status_rule==0){

          $this->kirim_email_pic($id_pic,$email_pic,$id_user,$id_detail_barang,$firstname_pic,$lastname_pic);
       }
       */


     }
    $this->db->update_batch('detail_pengajuan' , $updateArray , 'id_detail' );

  }
    
   




    if($status_rule !=0){
          $this->kirim_email_kacab($ID,$kode_unik,$groupid,$urutan,$draft);
          $this->kirim_notifikasi_kacab($ID,$kode_unik,$groupid,$urutan,$draft);

     }

    redirect('daftar-permintaan-barang-non-dagang');

   }


     function kirim_notifikasi_kacab($ID,$kode_unik,$groupid,$urutan,$draft,$id_kacab_regional=""){


     //cek

      

      $ID=$ID;
      $kode_unik=$kode_unik;
      $groupid=$groupid;
      $urutan=$urutan;
      $draft=$draft;
      $id_kacab_regional=$id_kacab_regional;


    $data['urutan']=$urutan;
    $data['groupid']=$groupid;
    $data['kode_unik']=$kode_unik;
    $data['draft']=$draft;

    
        if($groupid=="15"){
         
         $line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
            foreach($line_manajer as $row){
                  $id_line_manajer=$row->id_line_manajer;
                  $id_divisi      =$row->id_divisi;
                  $status_rule    =$row->status_rule;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
           }
    
          if($id_kacab_regional==0){
               $id_atasan=$id_line_manajer;
          }else{
               $id_atasan=$id_kacab_regional;
          }

        }elseif($groupid="23"){

           $line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
            foreach($line_manajer as $row){
                  $id_regional=$row->id_kacab_regional;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
                 
           }
           $id_atasan=$id_regional;
        }

          $data['ID']=$ID;

          $data['id_line_manajer']=$id_atasan;
          $data['first_name'] = $first_name;
          $data['nama_divisi'] = $nama_divisi;
          $detail_manajer=$this->user_pengajuan_model->cek_line_manajer($id_atasan);
            foreach($detail_manajer as $row){
                $email               =$row->email;
                $no_telepon          =$row->phone;
            }



          $data['produk']=$this->user_pengajuan_model->tampil_produk_kepala_cabang($id_atasan,$kode_unik,$draft);
          /*
          $message = $this->load->view('email_baru/konfirmasi_kacab',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email);
          $this->email->subject('Konfirmasi Persetujuan Produk Non Dagang - Baru');
          $this->email->message($message);
          $this->email->send();
          */


           $key='e48201034420a5726679dc3e5bb45e4d57c7d124e3ca68b6';
           $url='http://116.203.92.59/api/send_message';
         
          $on='uncg';
          $url_link='http://demo.aartijaya.com/Toko/konfirmasi_wa?id='.$ID.'&kode_unik='.$kode_unik.'&groupid='.$groupid.'&urutan='.$urutan.'&draft='.$draft.'&id_kacab_regional='.$id_kacab_regional;
          $data = array(
            "phone_no"=> '62895350164351',
            "key"   =>$key,
            "message" =>'Admin '.$nama_divisi.' meminta konfirmasi permintaan barang non dagang. Cek disini '.$url_link
          );
          $data_string = json_encode($data);

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_VERBOSE, 0);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
          curl_setopt($ch, CURLOPT_TIMEOUT, 360);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($data_string))
          );
          echo $res=curl_exec($ch);
          curl_close($ch);
          


          /*
          $key='e48201034420a5726679dc3e5bb45e4d57c7d124e3ca68b6';
$url='http://116.203.92.59/api/send_message';
$data = array(
  "phone_no"=> '62895350164351',
  "key"   =>$key,
  "message" =>'DEMO AKUN WOOWA. tes woowa api v5.0 mohon di abaikan'
);
$data_string = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 360);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($data_string))
);
echo $res=curl_exec($ch);
curl_close($ch);
*/
   }


   function kirim_email_kacab($ID,$kode_unik,$groupid,$urutan,$draft,$id_kacab_regional=""){

    $data['urutan']=$urutan;
    $data['groupid']=$groupid;
    $data['kode_unik']=$kode_unik;
    $data['draft']=$draft;

    
        if($groupid=="15"){
         
         $line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
            foreach($line_manajer as $row){
                  $id_line_manajer=$row->id_line_manajer;
                  $id_divisi      =$row->id_divisi;
                  $status_rule    =$row->status_rule;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
           }
    
          if($id_kacab_regional==0){
               $id_atasan=$id_line_manajer;
          }else{
               $id_atasan=$id_kacab_regional;
          }

        }elseif($groupid="23"){

           $line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
            foreach($line_manajer as $row){
                  $id_regional=$row->id_kacab_regional;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
                 
           }
           $id_atasan=$id_regional;
        }

          $data['ID']=$ID;

          $data['id_line_manajer']=$id_atasan;
          $data['first_name'] = $first_name;
          $data['nama_divisi'] = $nama_divisi;
          $detail_manajer=$this->user_pengajuan_model->cek_line_manajer($id_atasan);
            foreach($detail_manajer as $row){
                $email          =$row->email;
            }


          $data['produk']=$this->user_pengajuan_model->tampil_produk_kepala_cabang($id_atasan,$kode_unik,$draft);
          $message = $this->load->view('email_baru/konfirmasi_kacab',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email);
          $this->email->subject('Konfirmasi Persetujuan Produk Non Dagang - Baru');
          $this->email->message($message);
          $this->email->send();

   }


   function kirim_email_purchase_order_finance($email,$last_insert_id,$total_belanja,$foto_name=""){
    


        $data['id_penerima']=$id_penerima;
        $data['id_purchase_order']=$last_insert_id;
        $data['pengajuan']=$this->user_pengajuan_model->select_purchase_order_byid_join($last_insert_id);
        $pengajuan=$this->user_pengajuan_model->select_purchase_order_byid($last_insert_id);
         foreach($pengajuan as $po){
          $nomor_pengajuan=$po->no_po;
         }
        $data['permintaan']=$this->user_pengajuan_model->get_detail_po($last_insert_id);
        $count_email=count($email);
        $tot=number_format($total_belanja);
        
       $i=0;
        while ($i <= $count_email)
        {
          $email_asli=$email[$i];
          $data['email_asli']=$email_asli;
          $message = $this->load->view('email_baru/konfirmasi_po_finance',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email_asli);
          $this->email->subject('Konfirmasi Persetujuan Purchase Order - Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')');
          $this->email->message($message);
          if($foto_name){
            $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
          }
        $this->email->send();
        $i=$i+1;
        }
    }



 
    function daftar_purchase_order_selesai(){
    $group = array('general manager','purchasing','finance');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}
      $data['purchase_order']=$this->User_pengajuan_model->tampil_daftar_purchase_order_selesai();
     


      $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
      $this->load->view('purchase_order/daftar_purchase_order_selesai',$data);
      $this->load->view('layouts/footer');
    }

/*

    function upload_produk(){

    include APPPATH.'third_party/XlsxToCsv.php';
    $filess = $_FILES['file']['name'];
    $converter = new \XlsxToCsv\XlsxToCsv($filess);
    $tmpPath = $converter->convert();
   var_dump($tmpPath);
   die;
   

    $format = pathinfo($filess, PATHINFO_EXTENSION);
     

    if($format=="csv" or $format=="xls" or $format=="xlsx"){
    $fileName = time().$_FILES['file']['name'];

        //$config['upload_path'] = './file_excel/'; //buat folder dengan nama assets di root folder
        $config['upload_path'] = FCPATH.'files/';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['overwrite'] = true;
        $config['max_size'] = 0;
        
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(!$this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        $inputFileName = $this->upload->data('full_path');
       
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
              die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
                 $this->db->empty_table('mst_barang');
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                //$tglUpdate = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][1]));
              
                
                /*
                $jamMasuk = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][3], 'hh:mm');
                //$jamKeluar = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][5], 'hh:mm:ss');
                $pecahJamMasuk = explode(":",$jamMasuk);
                $pecahJamKeluar = explode(":",$jamKeluar);
                */
                
                /*
                $kode_produk = $rowData[0][0];
                if($kode_produk){
                  $kode_produk = $rowData[0][0]; 
                }else{
                   $kode_produk=0;
                }
                $nama = $rowData[0][1];
                $qty  = $rowData[0][2];
                $unit  = $rowData[0][3];
                $harga_beli  = $rowData[0][4];
                $harga_jual  = $rowData[0][5];
                $nama_pajak_beli  = $rowData[0][6];
                $nama_pajak_jual  = $rowData[0][7];
                

                //Sesuaikan sama nama kolom tabel di database                                
                 $data = array(
                    "kode_produk"=> $kode_produk,
                    "nama_barang"=> $nama,
                    "qty"=> $qty,
                    "unit"=> $unit,
                    "harga_beli"=> $harga_beli,
                    "harga_jual"=> $harga_jual,
                    "nama_pajak_beli"=> $nama_pajak_beli,
                    "nama_pajak_jual"=> $nama_pajak_jual,
                    "kategori_produk"=> $kategori_produk

                );

                //sesuaikan nama dengan nama tabel
            
                $insert = $this->db->insert("mst_barang",$data);
                delete_files($media['file_path']);
               //delete_files($config['file_path'],TRUE);            
        }

        }else{
            echo $this->session->set_flashdata('messages','<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button> Please upload file format CSV or XLS or XLSX </div>');
        }

        redirect('daftar-permintaan-barang-non-dagang');
    }
  */


    public function saveimport()
    {
                    if(isset($_FILES["file"]["name"]))
                        {
                            $path = $_FILES["file"]["tmp_name"];
                            $object = PHPExcel_IOFactory::load($path);
                            foreach($object->getWorksheetIterator() as $worksheet)
                            {
                                $highestRow = $worksheet->getHighestRow();
                                $highestColumn = $worksheet->getHighestColumn();
                                for($row=2; $row<=$highestRow; $row++)
                                {   
                                    $kode_produk = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                    $nama_barang = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                    $qty         = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                   
                                    $var_qty = explode(".",$qty);
                                    $qty_integer    = $var_qty[0];
                                    $koma_qty = $var_qty[1];

                                    $unit        = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                    $harga_beli  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                                    

                                    

                                    $harga_jual  = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                    $nama_pajak_beli  = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                                    $nama_pajak_jual  = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                                    $kategori_produk  = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                                   
                                    


                                    $cek_sku=$this->User_pengajuan_model->cek_sku($kode_produk);
                                    $jumlah_sku=count($cek_sku);
                                    
                                    if($jumlah_sku==0){
                                    $data[] = array(
                                        'kode_produk'        =>    $kode_produk,
                                        'nama_barang'        =>    $nama_barang,
                                        'qty'        =>    $qty_integer,
                                        'unit'        =>    $unit,
                                        'harga_beli'        =>    $harga_beli,
                                        'harga_jual'        =>    $harga_jual,
                                        'nama_pajak_beli'        =>    $nama_pajak_beli,
                                        'nama_pajak_jual'        =>    $nama_pajak_jual,
                                         'kategori_produk'        =>    $kategori_produk

                                    );
                                  }

                                }

                            }
                            
                            
                            $this->User_pengajuan_model->insertimport($data);
                            
                            
                        }     


                        redirect ('tambah-permintaan-barang-non-dagang');           
    
    }


    function detail_status_produk(){
      $ids=$this->input->post('ids');


      $no_pengajuan=$this->input->post('no_pengajuan');
      $status=$this->input->post('status');

     

      $data['status']=$status;
      $data['no_pengajuan']=$no_pengajuan;

      if($status=="belum"){

            

           $data['detail_barang']=$this->Pengajuan_model->detail_barang_per_id($ids,$status);

          

      }elseif($status=="sudah"){
            $data['detail_barang']=$this->User_pengajuan_model->detail_barang_per_id_po($ids,$status);
      }

      $this->load->view('user/status_produk',$data);
    }



    public function cari_purchase_order(){

      $pilih_tanggal=$this->input->get('pilih_tanggal');
      

      $select       =$this->input->get('select');
      $search       =$this->input->get('search');

      $data['pilih_tanggal']=$pilih_tanggal;
      $data['search']       =$search;
      $data['select']       =$select;

      $data['purchase_order']=$this->User_pengajuan_model->tampil_daftar_purchase_order_selesai_search($pilih_tanggal,$select,$search);
      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $this->load->view('purchase_order/daftar_purchase_order_selesai',$data);
      $this->load->view('layouts/footer');
      


    }



    function export_purchase_order_selesai(){
    $pilih_tanggal=$this->input->get('pilih_tanggal');
    $select       =$this->input->get('select');
    $search       =$this->input->get('search');



    if($pilih_tanggal){
       $purchase_order=$this->User_pengajuan_model->tampil_daftar_purchase_order_selesai_search($pilih_tanggal,$select,$search);
    }else{
       $purchase_order=$this->User_pengajuan_model->tampil_daftar_purchase_order_selesai();
    }

      include APPPATH.'third_party/PHPExcel/PHPExcel1.php';
    
    // Panggil class PHPExcel nya
    $csv = new PHPExcel();

    // Settingan awal fil excel
    $csv->getProperties()->setCreator('PT Aarti Jaya')
                 ->setLastModifiedBy('PT Aarti Jaya')
                 ->setTitle("PT Aarti Jaya")
                 ->setSubject("PT Aarti Jaya")
                 ->setDescription("PT Aarti Jaya")
                 ->setKeywords("PT Aarti Jaya");

    // Buat header tabel nya pada baris ke 1
    $csv->setActiveSheetIndex(0)->setCellValue('A1', "No");
    $csv->setActiveSheetIndex(0)->setCellValue('B1', "No Purchase Order"); // Set kolom A1 dengan tulisan "NO"
    $csv->setActiveSheetIndex(0)->setCellValue('C1', "PIC");
    $csv->setActiveSheetIndex(0)->setCellValue('D1', "Status");
    $csv->setActiveSheetIndex(0)->setCellValue('E1', "Tgl Transaksi");
    
    
    

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
    
      foreach($purchase_order as $row){

            if($row->status==1){ 

              $status_po="Diterima";

            }elseif($row->status==2){ 

              $status_po="Ditolak";
            }
      $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no++);
      $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row->no_po);
      $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row->first_name);
      $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $status_po);
      $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, date_indo($row->tgl_transaksi));
    
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set orientasi kertas jadi LANDSCAPE
    $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $csv->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
    $csv->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="LaporanPurchaseOrder.csv"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = new PHPExcel_Writer_CSV($csv);
    $write->save('php://output');


   }


/*
    function konfirmasi_cabang(){

      $kode_unik              = $this->input->get('kode_unik');
      $ID                     = $this->input->get('ID');
      $id_line_manajer        = $this->input->get('id_line_manajer');
      $status                 = $this->input->get('status');
      $groupid                = $this->input->get('groupid');
      $urutan                 = $this->input->get('urutan');
      $draft                  = $this->input->get('draft');
      $tanggal_konfirmasi     = date('Y-m-d');


     if($draft=="5" && $status=="5"){
      $status=0;
     }else{
       $status=$status;
     }

    if( $status=="5"){
      $next_urutan=$urutan+1;
    }else{
      $next_urutan=$urutan;
    }

     if($status=="5"){
        $id_groups='23';
      }else{
        $id_groups='15';
      }
/*
        foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groups=$next->id_groups;
        }
        
      */







        /*
      $produk=$this->user_pengajuan_model->tampil_produk_kepala_cabang($id_line_manajer,$kode_unik,$draft);
      $jumlah_produk=count($produk);
      
      

      if($jumlah_produk > 0){ 

      foreach($produk as $pro){
        $id_detail=$pro->id_detail;
        $id_detail_barang[]=$pro->id_detail;
        $kategori[]=$pro->id_kategori_barang;
       // cek bu anita



        $this->user_pengajuan_model->update_detail_pengajuan_cabang($id_detail,$status,$id_groups);



        if($draft==4){
          $idg="15";
        }elseif($draft==5){
          $idg="23";
        }

        $this->toko_model->tambah_riwayat_produk($id_detail,'3',$status,$idg,$id_line_manajer,$tanggal_konfirmasi);



        
        if($status==0){
        $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail);

       foreach($cek_detail_barang as $ce){
            $id_user=$ce->id_user;
            $id_kategori=$ce->id_kategori_barang;

       }
           
 

        $cek_pic_kategori=$this->user_pengajuan_model->cek_pic_kategori_id($id_kategori);
        foreach($cek_pic_kategori as $row){
          $id_pic[]=$row->id;
          $email_pic[] =$row->email;
          $firstname_pic =$row->first_name;
          $lastname_pic  =$row->last_name;
          $pic_id=$row->id;
        }
         $this->kirim_email_pic($id_pic,$email_pic,$id_user,$id_detail_barang,$firstname_pic,$lastname_pic);
       }



      }

     
              $tampil_daftar_kategori=$this->toko_model->tampil_daftar_kategori('82');
              foreach($tampil_daftar_kategori as $ros){
                       $id_kategori_barangs[]=$ros->id_kategori_barang;


              }

              $TampungArray = array_diff($kategori,$id_kategori_barangs);

             


     
        

           $id_pengirim=$id_user;
           $code_otomatis=$this->user_pengajuan_model->cek_divisi_user($id_pengirim);
           $tanggal_pengajuan=date('Y-m-d');
           $tanggal_dibutuhkan=date('Y-m-d');
           $id_jenis_request="1";
           $id_gedung="5";
           $this->user_pengajuan_model->insert_permintaan($code_otomatis,$tanggal_pengajuan,$tanggal_dibutuhkan,$id_jenis_request,$foto_name,$id_gedung,$keterangan,$id_pengirim,'0');

           $last_insert_id=$this->user_pengajuan_model->cek_id_pengajuan_terakhir();
           foreach($last_insert_id as $do){
             $id_terakhir = $do->id_pengajuan;
           }


      $insertPurchaseRequest = array();
      for($x = 0; $x < sizeof($id_detail_barang); $x++){
        $id_detail=$id_detail_barang[$x];
        $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail);

        foreach($cek_detail_barang as $ro){
           $kategori_id=$ro->id_kategori_barang;
        }

       
       if (in_array($kategori_id, $TampungArray)) {
   
     } else {
      $insertPurchaseRequest[] = array(
        'id_detail'        =>$id_detail_barang[$x],
        'id_pengajuan'     =>$id_terakhir,
        'draft       '     =>'0',
        'groupid       '     =>'16'
      );
       
       
      
        $this->db->update_batch('detail_pengajuan' , $insertPurchaseRequest , 'id_detail' );
     
      }

      }


      
    


    if($id_terakhir){
      echo "asu";
      die;

      $id_groupss="14";
      $urutan_selanjutnya="3";
      $this->Pengajuan_model->insert_history_pengajuan_new($id_terakhir,'','',$urutan_selanjutnya,'',$id_groupss);

      $get_general_manager=$this->User_pengajuan_model->cek_general_manager('14');
            foreach($get_general_manager as $ge){
              $email_array[]=$ge->email;
            }
        $this->kirim_email_penerima($email_array,$id_terakhir,'0');
    }

    
     }else{
        redirect('Login_User/gagal');
     }
      
      $cek_line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
      foreach($cek_line_manajer as $row){
         $id_kacab_regional=$row->id_kacab_regional;
      }
      
      

      if($status=="5"){
      $this->kirim_email_kacab($ID,$kode_unik,$id_groups,$next_urutan,$status,$id_kacab_regional);
      }
      redirect('Login_User/berhasil');
      
    }
*/


    function konfirmasi_cabang(){

      $kode_unik              = $this->input->get('kode_unik');
      $ID                     = $this->input->get('ID');
      $id_line_manajer        = $this->input->get('id_line_manajer');
      $statud                = $this->input->get('status');
      
      $groupid                = $this->input->get('groupid');
      
      
      $urutan                 = $this->input->get('urutan');
      
      $draft                  = $this->input->get('draft');

      if($draft=="5"){
          $status=="0";
      }else{
          $status=$statud;
      }
      $tanggal_konfirmasi     = date('Y-m-d');


      /*
      echo $kode_unik;
      echo "<br>";
      echo $ID;
      echo "<br>";
      echo $id_line_manajer;
      echo "<br>";
      echo $status;
      echo "<br>";
      echo $groupid;
      echo "<br>";
      echo $urutan;
      echo "<br>";
      echo $draft;
      die;
*/


      $updateArray = array();
      $produk=$this->user_pengajuan_model->tampil_produk_kepala_cabang($id_line_manajer,$kode_unik,$draft);
      $jumlah_produk=count($produk);
      
      

      if($jumlah_produk > 0){ 

      foreach($produk as $pro){
         $id_detail[]=$pro->id_detail;
        $id_detail_barang=$pro->id_detail;
        $status_konfirmasi=$status;
        $user=$pro->id_user;


        $draft_konfirmasi=$pro->draft;
        if($draft_konfirmasi=="4"){
           $groupid="15";
           $urutan="2";
        }elseif($draft_konfirmasi=="5"){
           $groupid="23";
           $urutan="3";

        }


      $updateArray[] = array(
        'id_detail' =>$pro->id_detail,
        'draft'     =>$status,
        'groupid'   =>$groupid

    );

     
      
    
      $insertArray[] = array(
        'id_pengajuan' =>$pro->id_detail,
        'status_history'     =>3,
        'status'     =>$status,
        'groupid'   =>$groupid,
        'id_user_approval'   =>$id_line_manajer,
        'tanggal'   =>$tanggal_konfirmasi

    );



     if($status_konfirmasi=="5"){
       $datas=array(
            'id'=>$pro->id_detail,
            'name'=>'as',
            'qty'=>'3',
            'price'=>'50000',
            'draft'=>$status,
            'groupid'=>$groupid,
            'id_kacab_regional'=>$id_line_manajer,
             'id_user'=>$user,
            
        );

       }
      

      if($status==0){


      $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail_barang);

       foreach($cek_detail_barang as $ce){
            $id_user=$ce->id_user;
            $id_kategori=$ce->id_kategori_barang;
            $kategori[]=$ce->id_kategori_barang;

       }


        $cek_pic_kategori=$this->user_pengajuan_model->cek_pic_kategori_id($id_kategori);
        foreach($cek_pic_kategori as $row){
          $id_pic[]=$row->id;
          $email_pic[] =$row->email;
          $firstname_pic =$row->first_name;
          $lastname_pic  =$row->last_name;
          $pic_id=$row->id;
        }
        

       }


      }

    $this->db->insert_batch('history_pengajuan', $insertArray);
    $this->db->update_batch('detail_pengajuan' , $updateArray , 'id_detail' );
    $this->cart->insert($datas);
       
    if($status=="5"){


         

          $cek_line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
              foreach($cek_line_manajer as $row){
           $id_kacab_regional=$row->id_kacab_regional;
          }
          $this->kirim_email_kacab($ID,$kode_unik,$groupid,$urutan,$status,$id_kacab_regional);
    }

    if($draft=="5"){
             
      $tampil_daftar_kategori=$this->toko_model->tampil_daftar_kategori('82');
      foreach($tampil_daftar_kategori as $ros){
                $id_kategori_barangs[]=$ros->id_kategori_barang;
              
      }
     
     


       $TampungArray = array_diff($kategori,$id_kategori_barangs);
       $id_pengirim=$id_user;
       $code_otomatis=$this->user_pengajuan_model->cek_divisi_user($id_pengirim);
       $tanggal_pengajuan=date('Y-m-d');
       $tanggal_dibutuhkan=date('Y-m-d');
       $id_jenis_request="1";
       $id_gedung=$this->user_pengajuan_model->cek_id_gedung($id_pengirim);

      $this->user_pengajuan_model->insert_permintaan($code_otomatis,$tanggal_pengajuan,$tanggal_dibutuhkan,$id_jenis_request,$foto_name,$id_gedung,$keterangan,$id_pengirim,'0');

      $last_insert_id=$this->user_pengajuan_model->cek_id_pengajuan_terakhir();

           foreach($last_insert_id as $do){
             $id_terakhir = $do->id_pengajuan;
           }

      $insertPurchaseRequest = array();
        foreach($produk as $prom){
        $id_detail_barang=$prom->id_detail;
        $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail_barang);

        foreach($cek_detail_barang as $ro){
           $kategori_id=$ro->id_kategori_barang;
        }

      if (in_array($kategori_id, $TampungArray)) {
   
       } else {
      $insertPurchaseRequest[] = array(
        'id_detail'        =>$prom->id_detail,
        'id_pengajuan'     =>$id_terakhir,
        'draft       '     =>'0',
        'groupid       '     =>'16'
      );
      $this->db->update_batch('detail_pengajuan' , $insertPurchaseRequest , 'id_detail' );
      
      }

       
      


     }

     if($id_terakhir){
        $id_groupss="16";
        $urutan_selanjutnya="6";
        $this->Pengajuan_model->insert_history_pengajuan_new($id_terakhir,'','',$urutan_selanjutnya,'',$id_groupss);
        $finance=$this->User_pengajuan_model->select_finance();
        foreach($finance as $row){
          $email_finance[]=$row->email;
        }

        $total_belanja=$this->User_pengajuan_model->tampil_detail_pengajuan($id_terakhir,'belum');
        foreach($total_belanja as $tot){
          $tharga_barang +=$tot->tharga;
        }
        $this->kirim_email_finance($email_finance,$id_terakhir,$tharga_barang,'','');
        /*
        $get_general_manager=$this->User_pengajuan_model->cek_general_manager('14');
            foreach($get_general_manager as $ge){
              $email_array[]=$ge->email;
            }
        $this->kirim_email_penerima($email_array,$id_terakhir,'0');
         */


/*
  $this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');
        
        // **********************************Text Message*************************************
        $from = 'rani';
        $to = '62895350164351';
        $message = array(
            'text' => 'test message',
        );
        $response = $this->nexmo->send_message($from, $to, $message);
*/

      }
}


      
      
    }

    redirect('Login_User/berhasil');

}









    public function daftar_permintaan_barang_revisi()
    {
        if (!$this->ion_auth->logged_in()){ redirect('login');}
        $data['title']="Daftar Permintaan Produk Saya Direvisi";
        $id_user                         = $this->ion_auth->user()->row()->id;
        $data['status']="direvisi";
        $data['daftar_permintaan_barang']= $this->user_pengajuan_model->tampil_daftar_permintaan_barang_revisi($id_user);
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidebar');
        $this->load->view('user/daftar_permintaan_barang',$data);
        $this->load->view('layouts/footer');
    }

    public function daftar_permintaan_barang_ditolak()
    {
        if (!$this->ion_auth->logged_in()){ redirect('login');}
        $data['title']="Daftar Permintaan Produk Saya Ditolak";
        $id_user                         = $this->ion_auth->user()->row()->id;
        $data['daftar_permintaan_barang']= $this->user_pengajuan_model->tampil_daftar_permintaan_barang_ditolak($id_user);
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidebar');
        $this->load->view('user/daftar_permintaan_barang',$data);
        $this->load->view('layouts/footer');
    }


    function daftar_purchase_request_selesai(){
    $group = array('general manager','purchasing','finance');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}
      $data['purchase_order']=$this->User_pengajuan_model->tampil_daftar_purchase_request_selesai();
     


      $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
      $this->load->view('purchase_order/daftar_purchase_request_selesai',$data);
      $this->load->view('layouts/footer');
    }


     public function cari_purchase_request(){

      $pilih_tanggal=$this->input->get('pilih_tanggal');
      

      $select       =$this->input->get('select');
      $search       =$this->input->get('search');

      $data['pilih_tanggal']=$pilih_tanggal;
      $data['search']       =$search;
      $data['select']       =$select;

      $data['purchase_order']=$this->User_pengajuan_model->tampil_daftar_purchase_request_selesai_search($pilih_tanggal,$select,$search);
      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $this->load->view('purchase_order/daftar_purchase_request_selesai',$data);
      $this->load->view('layouts/footer');
      


    }


    function export_purchase_request_selesai(){
    $pilih_tanggal=$this->input->get('pilih_tanggal');
    $select       =$this->input->get('select');
    $search       =$this->input->get('search');



    if($pilih_tanggal){
       $purchase_order=$this->User_pengajuan_model->tampil_daftar_purchase_request_selesai_search($pilih_tanggal,$select,$search);
    }else{
       $purchase_order=$this->User_pengajuan_model->tampil_daftar_purchase_request_selesai();
    }

      include APPPATH.'third_party/PHPExcel/PHPExcel1.php';
    
    // Panggil class PHPExcel nya
    $csv = new PHPExcel();

    // Settingan awal fil excel
    $csv->getProperties()->setCreator('PT Aarti Jaya')
                 ->setLastModifiedBy('PT Aarti Jaya')
                 ->setTitle("PT Aarti Jaya")
                 ->setSubject("PT Aarti Jaya")
                 ->setDescription("PT Aarti Jaya")
                 ->setKeywords("PT Aarti Jaya");

    // Buat header tabel nya pada baris ke 1
    $csv->setActiveSheetIndex(0)->setCellValue('A1', "No");
    $csv->setActiveSheetIndex(0)->setCellValue('B1', "No Purchase Request"); // Set kolom A1 dengan tulisan "NO"
    $csv->setActiveSheetIndex(0)->setCellValue('C1', "PIC");
    $csv->setActiveSheetIndex(0)->setCellValue('D1', "Status");
    $csv->setActiveSheetIndex(0)->setCellValue('E1', "Tgl Pengajuan");
    
    
    

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
    
      foreach($purchase_order as $row){

            if($row->status==1){ 

              $status_po="Diterima";

            }elseif($row->status==2){ 

              $status_po="Ditolak";
            }
      $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no++);
      $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row->no_pengajuan);
      $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row->first_name);
      $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $status_po);
      $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, date_indo($row->tanggal_pengajuan));
    
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set orientasi kertas jadi LANDSCAPE
    $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $csv->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
    $csv->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="LaporanPurchaseRequestSelesai.csv"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = new PHPExcel_Writer_CSV($csv);
    $write->save('php://output');


   }



    function kirim_email_kacab2($id_user,$id_details){
    /*
   $line_manajer=$this->user_pengajuan_model->cek_line_manajer($id_user);
            foreach($line_manajer as $row){
                  $id_line_manajer=$row->id_line_manajer;
                  $id_divisi      =$row->id_divisi;
                  $status_rule    =$row->status_rule;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
           }
    
   $data['first_name']=$first_name;
   $data['nama_divisi']=$nama_divisi;
   */


    
   


   $data['detail_produk']=$id_details;
   $data['product']=$this->cart->contents();
    foreach($this->cart->contents() as $on){
          $id_detail=$on['id'];
          $draft=$on['draft'];
          $id_kacab_regional=$on['id_kacab_regional'];
           $id_user=$on['id_user'];
    }

     

    $detail_produk=$this->toko_model->daftar_detail_produk($id_details);
    

    foreach($detail_produk as $de){
      $data['kode_unik']=$de->kode_unik;
      $data['ID']=$de->id_user;
      $data['draft']=$de->draft;
    }

    
    if($draft=="4"){
      $data['urutan']="2";
      $data['$groupid']="15";
    }elseif($draft=="5"){
      $data['urutan']="3";
      $data['$groupid']="23";
    }
    $data['status']=$draft;



    $group_manager = array('manager');
    if ($this->ion_auth->in_group($group_manager)){
         $cek_kacab_regional=$this->toko_model->cek_kacab_regional($id_kacab_regional);
         foreach($cek_kacab_regional as $row){
            $id_regional=$row->id_kacab_regional;
            $nama_divisi=$row->nama_divisi;
         }
    } 
    $data['id_line_manajer']=$id_regional;
    $data['nama_divisi']=$nama_divisi;
    $detail_manajer=$this->user_pengajuan_model->cek_line_manajer($id_regional);
            foreach($detail_manajer as $row){
                $email          =$row->email;
     }




    $data['produk']=$this->toko_model->daftar_produk_email_toko($id_details,$draft,$id_kacab_regional);

    $message = $this->load->view('email_baru/konfirmasi_kacab',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email);
          $this->email->subject('Konfirmasi Persetujuan Produk Non Dagang - Baru');
          $this->email->message($message);
          $this->email->send();
          $this->cart->destroy();
  }


    function kirim_email_finance($email,$last_insert_id,$total_belanja,$foto_name="",$lampiran=""){
       


        $count_email=count($email);
        $tot=number_format($total_belanja);
        $ID = $this->ion_auth->user()->row()->id;
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($last_insert_id);
        $history_terakhir=$this->Pengajuan_model->history_terakhir($last_insert_id);
        foreach($history_terakhir as $his){
            $urutan=$his->urutan;
            $grup_sekarang=$his->name;
        }
       $data['grup_sekarang']=$grup_sekarang;
        $data['urutan']=$urutan;
    
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $data['email']=$email;
         $history=$this->user_pengajuan_model->cek_history_terakhir_pr($last_insert_id);
      foreach($history as $fo){
        $data['groupid']=$fo->groupid;
        $data['status_history']=$fo->status;
      }


     
 

        $data['id_pengajuan']=$last_insert_id;

         foreach($permintaan_ajuan as $per){
             $data['no_pengajuan']=$per->no_pengajuan;
             $data['id_pengajuan']=$per->id_pengajuan;
             $data['first_name']=$per->first_name;
             $data['last_name']=$per->last_name;
             $data['nama_divisi']=$per->nama_divisi;
             $data['nama_jabatan']=$per->nama_jabatan;
             $data['tanggal_pengajuan']=$per->tanggal_pengajuan;
             $data['tanggal_required']=$per->tanggal_required;
             $data['jenis_request']=$per->jenis_request;
             $data['keterangan']=$per->keterangan;
             $data['last_status']=$per->last_status;
             $data['id_pengirim']=$per->id_user;
             $data['id_user_approval']=$per->id_user_approval;
             $data['status_user']=$per->status_user;
             $data['id_jenis_request']=$per->id_jenis_request;
             $data['ket']=$per->keterangan;
             $data['lampiran']=$per->lampiran;
             $data['tujuan']=$per->tujuan;
             $data['nama_gedung']=$per->nama_gedung;
               $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['grand_total']=$per->grand_total;
             $nomor_pengajuan=$per->no_pengajuan;
  $id_pengajuan=$per->id_pengajuan;
             $tgl_pengajuan=$per->tanggal_pengajuan;
         }

    $data['vendor']=$this->Pengajuan_model->select_vendor($id_pengajuan);

 $data['history']=$this->Pengajuan_model->history_pengajuan($id_pengajuan);

     $data['asu']='ase';
     $this->load->library('email');
     $data['pengajuan']=$this->Pengajuan_model->select_pengajuan_by_no($last_insert_id);
     /*
     $message = $this->load->view('email_baru/konfirmasi_email2',$data, TRUE);
     $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
     $this->email->to($email); 
     $this->email->subject('Pengajuan Permintaan Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
     if($foto_name or $lampiran){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }

     $this->email->send();
     */
     $i=0;
while ($i <= $count_email)
{
  $email_asli=$email[$i];

  $data['email_asli']=$email_asli;
  $message = $this->load->view('email_baru/konfirmasi_finance',$data, TRUE);
  $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
    $this->email->to($email[$i]);
   $this->email->subject('Pengajuan Permintaan Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
    /*
     $this->email->attach('http://localhost/approval_id/files/pengajuan/IMG_9840.jpg');
     */
     if($foto_name){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }
     
     $this->email->send();
    
  $i=$i+1;
}
     

  }




}
