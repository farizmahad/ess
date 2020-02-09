<?php
Class Home_model extends CI_Model
{

// permintaan belum selesai yang akan ditampilkan dihalaman dashboard //
    function per_bel_selesai($ID,$daterange){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$ID);
        $this->db->group_start();
        $this->db->where('last_status',1);
        $this->db->or_where('last_status',0);
        $this->db->group_end();
        $this->db->where('status_user !=',4);
        if($daterange){
            $tanggal = explode(" - ",$daterange);
            $dari = str_replace('/', '-', $tanggal[0]);
            $sampai = str_replace('/', '-', $tanggal[1]);

            $this->db->where("DATE(tanggal_pengajuan) >=", $dari);
            $this->db->where("DATE(tanggal_pengajuan)<=", $sampai);
        }
        return $this->db->get()->result();
    }

// count permintaan yang belum selesai di halaman dashboard	
	function count_per_bel_selesai($ID, $daterange=""){
		
		$this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$ID);
        $this->db->group_start();
        $this->db->where('last_status',1);
        $this->db->or_where('last_status',0);
        $this->db->group_end();
        $this->db->where('status_user !=',4);
        if($daterange){
            $tanggal = explode(" - ",$daterange);
            $dari = str_replace('/', '-', $tanggal[0]);
            $sampai = str_replace('/', '-', $tanggal[1]);

            $this->db->where("DATE(tanggal_pengajuan) >=", $dari);
            $this->db->where("DATE(tanggal_pengajuan)<=", $sampai);
        }
        return $this->db->get()->num_rows();
	}
	
// permintaan orang lain yang akan ditujukan kepada dirinya

    function per_assign($ID){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','users.id = pengajuan.id_user');
        $this->db->where('users.id_line_manajer',$ID);
        $this->db->where('pengajuan.last_status','1');
        return $this->db->get()->result();
    }
// count pengajuan	
	function count_per_assign($ID){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','users.id = pengajuan.id_user');
        $this->db->where('users.id_line_manajer',$ID);
        $this->db->where('pengajuan.last_status','1');
        return $this->db->get()->num_rows();
    }
	
// permintaan orang lain yang akan ditujukan kepada dirinya

    function get_users($ID){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$ID);
        return $this->db->get()->result();
    }
/*
    function get_news(){
        $this->db->select('*');
        $this->db->from('news_dashboard');
        $this->db->join('users','users.id = news_dashboard.id_user');
        
        $this->db->limit('5');
        
        $this->db->order_by('date_posted','DESC');
        return $this->db->get()->result();
    }
*/

    function get_news($dari,$sampai){
        $this->db->select('*');
        $this->db->from('news_dashboard');
        $this->db->join('users','users.id = news_dashboard.id_user');
        
        $this->db->where('DATE(date_posted) >=', $dari);
        $this->db->where('DATE(date_posted) <=', $sampai);
        
        $this->db->order_by('date_posted','DESC');
        return $this->db->get()->result();
    }
    function get_news_ter($id){
        $this->db->select('*');
        $this->db->from('news_dashboard');
        $this->db->join('users','users.id = news_dashboard.id_user');
       $this->db->where_not_in('news_dashboard.id_news', $id);
     $this->db->limit('40');
        
        return $this->db->get()->result();
    }


     function get_news_id($id){
        $this->db->select('*');
        $this->db->from('news_dashboard');
       $this->db->where('id_news', $id);
            
        return $this->db->get()->result();
    }


      function select_tabel_sementara($ID,$jml_karakter){
        $this->db->select('*');
        $this->db->from('tbl_sementara');
        $this->db->where('SUBSTR(random_code,-'.$jml_karakter.')',$ID);
        return $this->db->get()->result();
    }


   function insert_news_detail($fileName,$random){
   
    $this->db->set('file',$fileName);
    $this->db->set('random_code',$random);
    $this->db->insert('tbl_sementara');
  }

  function insert_news($news,$ID,$date_posted){
    $this->db->set('news',$news);
    $this->db->set('id_user',$ID);
    $this->db->set('date_posted',$date_posted);
    $this->db->insert('news_dashboard');
  }


   function insert_detail_news($last_insert_id,$filenya,$filenya1){
   
    $this->db->set('id_news',$last_insert_id);
    $this->db->set('file',$filenya);
    $this->db->set('url',$filenya1);
    $this->db->insert('news_dashboard_detail');
  }


  function truncate($ID,$jml_karakter){

    $this->db->from('tbl_sementara'); 
    $this->db->where('SUBSTR(random_code,-'.$jml_karakter.')',$ID);
    $this->db->delete(); 
  }

    function get_komentar_news($id_news,$limit=""){
        $this->db->select('*');
        $this->db->from('news_komentar');
        $this->db->join('users','users.id = news_komentar.id_user_komentar');
        $this->db->where('id_news',$id_news);
        if($limit){
        $this->db->limit('3');
         }
        $this->db->order_by('date_komentar','DESC');
        return $this->db->get()->result();
    }


     function get_image_news($id_news){
        $this->db->select('*');
        $this->db->from('news_dashboard_detail');
        $this->db->where('id_news',$id_news);
        return $this->db->get()->result();
    }
 function insert_komentar($ID,$id_news,$replay,$date_komentar){
   
    $this->db->set('id_news',$id_news);
    $this->db->set('komentar',$replay);
    $this->db->set('date_komentar',$date_komentar);
    $this->db->set('id_user_komentar',$ID);
    $this->db->insert('news_komentar');
  }


   function search_users($title){

        $this->db->group_start();
        $this->db->like('first_name', $title , 'both');
        
        $this->db->group_end();
        $this->db->order_by('id', 'ASC');
        $this->db->limit(5);
        return $this->db->get('users')->result();
    }

 function insert_like($ids,$id_login){
   
    $this->db->set('id_news',$ids);
    $this->db->set('id_user',$id_login);
    
    $this->db->insert('news_like');
  }

 
    function select_like($id_news){
        $this->db->select('id_user');
        $this->db->from('news_like');
        $this->db->where('id_news',$id_news);
        return $this->db->get()->result();
    }

    function delete_like($ids,$id_login){

    $this->db->where('id_news', $ids);
     $this->db->where('id_user', $id_login);
    $this->db->delete('news_like');
  }

function search_user($search){
  $this->db->select('*');
     $this->db->from('users');
     $this->db->join('divisi','users.id_divisi = divisi.id_divisi');
        $this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
        $this->db->join('gedung','divisi.id_gedung = gedung.id_gedung');

     $this->db->group_start();
     $this->db->like('first_name', $search);
     $this->db->or_like('last_name', $search);
     $this->db->group_end();

     return $this->db->get()->result();
 }


 function get_users_all(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('divisi','users.id_divisi = divisi.id_divisi');
        $this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
        $this->db->join('gedung','divisi.id_gedung = gedung.id_gedung');
        $this->db->limit('6');
        $this->db->order_by('users.id','random');
        return $this->db->get()->result();
    }


   function cek_like($id_news,$id_login){
        $this->db->select('*');
        $this->db->from('news_like');
        $this->db->where('id_news',$id_news);
        $this->db->where('id_user',$id_login);
        return $this->db->get()->result();
    }


    function get_news_user($ID){
        $this->db->select('*');
        $this->db->from('news_dashboard');
        $this->db->join('users','users.id = news_dashboard.id_user');
        $this->db->join('news_komentar','news_dashboard.id_news = news_komentar.id_news');
        $this->db->where('news_dashboard.id_user', $ID);
          $this->db->where('news_komentar.id_user_komentar !=', $ID);
        return $this->db->get()->result();
    }

    function get_news_user_2($ID){
        $this->db->select('*');
        $this->db->from('news_komentar');
        $this->db->join('news_dashboard','news_dashboard.id_news = news_komentar.id_news');
        $this->db->join('users','news_komentar.id_user_komentar = users.id');
        $this->db->where('news_dashboard.id_user', $ID);
          $this->db->where('news_komentar.id_user_komentar !=', $ID);
            $this->db->where('news_komentar.status_notif', '0');
        return $this->db->get()->result();
    }
     

      function get_news_user_2_like($ID){
        $this->db->select('*');
        $this->db->from('news_like');
        $this->db->join('news_dashboard','news_like.id_news = news_dashboard.id_news');
        $this->db->join('users','news_like.id_user = users.id');
        $this->db->where('news_dashboard.id_user', $ID);
          $this->db->where('news_like.id_user !=', $ID);
            $this->db->where('news_like.status_notif', '0');
        return $this->db->get()->result();
    }

      function get_news_by_id($id_news){
        $this->db->select('*');
        $this->db->from('news_dashboard');
        $this->db->join('users','users.id = news_dashboard.id_user');
        $this->db->where('id_news', $id_news);
        return $this->db->get()->result();
    }


    function update_klik_komentar($id_news_komentar)
  {

    $this->status_notif =  '1';
    $this->db->update('news_komentar', $this, array('id_news_komentar' => $id_news_komentar)); 
  }

   function update_klik_like($id_news_like)
  {

    $this->status_notif =  '1';
    $this->db->update('news_like', $this, array('id_news_like' => $id_news_like)); 
  }

  function update_news(){
        $news_update=$this->input->post('news_update');
        $id_news=$this->input->post('id_news');
        
 
        $this->db->set('news', $news_update);
        $this->db->where('id_news', $id_news);
        $result=$this->db->update('news_dashboard');
        return $result;
    }

     function delete_news(){
       
        $id_news=$this->input->post('id_news');    
        $this->db->where('id_news', $id_news);
        $result=$this->db->delete('news_dashboard');
        return $result;
    }

    function update_komentar_news(){
        $id_news_komentar=$this->input->post('id_news_komentar');
        $komentar=$this->input->post('komentar');
        $id_newss=$this->input->post('id_newss');
        
 
        $this->db->set('komentar', $komentar);
        $this->db->where('id_news_komentar', $id_news_komentar);
        $result=$this->db->update('news_komentar');
        return $result;
    }


    function delete_komentar_news(){
       
        $id_news_komentar=$this->input->post('id_news_komentar');    
        $this->db->where('id_news_komentar', $id_news_komentar);
        $result=$this->db->delete('news_komentar');
        return $result;
    }
 



}