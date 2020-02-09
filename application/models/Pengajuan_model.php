<?php
Class Pengajuan_model extends CI_Model
{


//=============================================================================================================== select


    //========================================= lokasi

    function select_master_barang(){
        $this->db->select('*');
        $this->db->from('barang_detail');
        return $this->db->get()->result();
    }


     function select_master_gedung(){
        $this->db->select('*');
        $this->db->from('gedung');
        return $this->db->get()->result();
    }

    function select_jenis_request(){
        $this->db->select('*');
        $this->db->from('jenis_request');
        return $this->db->get()->result();
    }
    function user_by_id($id_user){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('divisi','users.id_divisi = divisi.id_divisi');
        $this->db->join('jabatan','users.id_jabatan = jabatan.id_jabatan');
        $this->db->where('users.id',$id_user);
        return $this->db->get()->result();
    }
	
    function get_harga($id){
        $this->db->select('harga');
        $this->db->from('barang_detail');
        $this->db->where('id_barang_detail',$id);
        return $this->db->get();
    }


    function select_pengajuan_id_pengajuan($id_pengajuan){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }

    function insert_pengajuan($ID,$tanggal_pengajuan,$tanggal_required,$id_jenis_request,$keterangan,$no_pengajuan,$ket){

        $this->db->set('id_user', $ID);
        $this->db->set('tanggal_pengajuan', $tanggal_pengajuan);
        $this->db->set('tanggal_required', $tanggal_required);
        $this->db->set('id_jenis_request', $id_jenis_request);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('no_pengajuan', $no_pengajuan);
        $this->db->set('last_status', 0);
        $this->db->set('ket',$ket);
        $this->db->insert('pengajuan');

    }

    function insert_pengajuan_manager_gm($ID,$tanggal_pengajuan,$tanggal_required,$id_jenis_request,$keterangan,$no_pengajuan,$ket){

        $this->db->set('id_user', $ID);
        $this->db->set('tanggal_pengajuan', $tanggal_pengajuan);
        $this->db->set('tanggal_required', $tanggal_required);
        $this->db->set('id_jenis_request', $id_jenis_request);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('id_user_approval', $ID);
        $this->db->set('no_pengajuan', $no_pengajuan);
        $this->db->set('last_status', 1);
        $this->db->set('status_user', 3);
        $this->db->set('ket','Manajer');
        $this->db->insert('pengajuan');

    }

    function insert_pengajuan_manager_finance($ID,$tanggal_pengajuan,$tanggal_required,$id_jenis_request,$keterangan,$no_pengajuan,$ket){

        $this->db->set('id_user', $ID);
        $this->db->set('tanggal_pengajuan', $tanggal_pengajuan);
        $this->db->set('tanggal_required', $tanggal_required);
        $this->db->set('id_jenis_request', $id_jenis_request);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('id_user_approval', $ID);
        $this->db->set('no_pengajuan', $no_pengajuan);
        $this->db->set('last_status', 1);
        $this->db->set('status_user', 1);
        $this->db->set('ket','Manajer');
        $this->db->insert('pengajuan');

    }

   


    /*
    function select_pengajuan_id($ID,$daterange="",$status=""){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$ID);
        $this->db->order_by('tanggal_pengajuan','DESC');
        if($daterange and !$status){
            $tanggal = explode(" - ",$daterange);
            $dari = str_replace('/', '-', $tanggal[0]);
            $sampai = str_replace('/', '-', $tanggal[1]);

            $this->db->where("DATE(tanggal_pengajuan) >=", $dari);
            $this->db->where("DATE(tanggal_pengajuan)<=", $sampai);
        }elseif(!$daterange and $status){
            $this->db->where("last_status", $status);
        }elseif($daterange and $status){
            $tanggal = explode(" - ",$daterange);
            $dari = str_replace('/', '-', $tanggal[0]);
            $sampai = str_replace('/', '-', $tanggal[1]);

            $this->db->where("DATE(tanggal_pengajuan) >=", $dari);
            $this->db->where("DATE(tanggal_pengajuan)<=", $sampai);
            $this->db->where("last_status", $status);
        }
        return $this->db->get()->result();
    }
*/
    function get_kode($user_id,$awal,$akhir){

        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('jenis_request','pengajuan.id_jenis_request = jenis_request.id_jenis_request');
        $this->db->join('detail_pengajuan','pengajuan.id_pengajuan = detail_pengajuan.id_pengajuan');
        $this->db->where('pengajuan.id_pengajuan',$user_id);
        $this->db->group_by('detail_pengajuan.id_pengajuan');

        return $this->db->get();

    }


   

    function code_otomatis(){
        $ID = $this->ion_auth->user()->row()->id;
        $bulansekarang=date('m');
        $bulan=$this->getRomawi($bulansekarang);
        $tahun=date('Y');
        $this->db->select('LEFT(pengajuan.no_pengajuan,4) as kode,divisi.nama_divisi',false);
        $this->db->join('users','pengajuan.id_user = users.id');
        $this->db->join('divisi','divisi.id_divisi = users.id_divisi');
        $this->db->order_by('id_pengajuan', 'desc');
        $this->db->limit(1);
        $this->db->group_start();
        $this->db->where('pengajuan.no_pengajuan !=0');
        $this->db->where('users.id',$ID);
        $this->db->or_where('pengajuan.no_pengajuan !=','NULL');
        $this->db->or_where('pengajuan.no_pengajuan !=',null);
        $this->db->or_where('pengajuan.no_pengajuan !=','');
        $this->db->group_end();
        $query = $this->db->get('pengajuan');
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
            $nama_divisi=$data->nama_divisi;
        }else{

        $this->db->select('divisi.nama_divisi',false);
        $this->db->join('divisi','divisi.id_divisi = users.id_divisi');
        $this->db->where('users.id', $ID);
        $hasil = $this->db->get('users');
        $row = $hasil->row();
            $kode = 1;
            $nama_divisi=$row->nama_divisi;
            


        }
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = $kodemax."/PR-".$nama_divisi."/".$bulan."/".$tahun;
        return $kodejadi;

    }

  function getRomawi($bln){
                switch ($bln){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
}
    function detail_barang_per_id($id_pengajuan,$status=""){
        $this->db->select('*,detail_pengajuan.qty as qty_barang');
        $this->db->from('detail_pengajuan');
        /*
        $this->db->join('vendor','detail_pengajuan.id_vendor = vendor.id_vendor');
        
        */
        $this->db->join('mst_barang','detail_pengajuan.id_barang = mst_barang.id_barang');
 
        /*
        $this->db->join('divisi','divisi.id_divisi = users.id_divisi');
        */
        
        $this->db->where('id_pengajuan',$id_pengajuan);
        if($status=="belum"){
            $this->db->where('no_po','0');
        }elseif($status=="sudah"){
            $this->db->where('no_po !=','0');
        }
        return $this->db->get()->result();
    }

function insert_history_persetujuan($last_insert_id,$tanggal_pengajuan,$ket,$urutan){

    $this->db->set('id_pengajuan', $last_insert_id);
    $this->db->set('status', 0);
    $this->db->set('catatan', "");
    $this->db->set('tanggal',$tanggal_pengajuan);
    $this->db->set('ket',$ket);
    $this->db->set('urutan',$urutan);
    $this->db->insert('history_pengajuan');

}

    

    function select_nama($ID){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$ID);

        return $this->db->get()->result();
    }


    function total_pengajuan($ID){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$ID);
        return $this->db->get()->num_rows();
        }


    


    function pengajuan_terakhir($id_pengajuan){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->limit(1);
        $this->db->order_by('id_history','DESC');
        return $this->db->get()->result();
    }

    function select_line_manager($id_divisi){

        $this->db->select('*,users.id as id_users');
        $this->db->from('users');
        $this->db->join('users_groups','users.id = users_groups.user_id');
        $this->db->where('id_divisi',$id_divisi);
        $this->db->where('group_id','15');
        /*
        $this->db->join('users_groups','users.id = users_group.user_id');


        $this->db->where('group_id','15');
        */
        return $this->db->get()->result();
    }


    function select_pengajuan_by_no($id_pengajuan){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','users.id = pengajuan.id_user');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }

    function insert_history_email($last_insert_id,$ID,$id_manajer,$email_manajer,$isi_email,$tanggal,$subjek){
        $this->db->set('id_pengajuan', $last_insert_id);
        $this->db->set('id_pengirim', $ID);
        $this->db->set('id_penerima',$id_manajer);
        $this->db->set('isi_email',$isi_email);
        $this->db->set('tanggal',$tanggal);
        $this->db->set('subjek',$subjek);
        $this->db->insert('email');
    }


    function update_detail_pengajuan_id_pengajuan($id_detail, $id_pengajuan, $nama_barang, $qty, $harga, $tharga){

        $this->db->set('qty', $qty);
        $this->db->set('harga', $harga);
        $this->db->set('tharga', $tharga);
        $this->db->set('nama_barang', $nama_barang);
        $this->db->where('id_detail', $id_detail);
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('detail_pengajuan');
    }

    function select_limit_detail_pengajuan_id_pengajuan($id_pengajuan){
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('pengajuan','detail_pengajuan.id_pengajuan = pengajuan.id_pengajuan');
        $this->db->where('detail_pengajuan.id_pengajuan',$id_pengajuan);
        $this->db->limit(1);
        return $this->db->get()->result();
    }
    function select_sum_detail_pengajuan_id_pengajuan($id_pengajuan){
        $this->db->select_sum('tharga');
        $this->db->from('detail_pengajuan');
        $this->db->join('pengajuan','detail_pengajuan.id_pengajuan = pengajuan.id_pengajuan');
        $this->db->where('detail_pengajuan.id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();

    }


/*
        function update_pengajuan_id_pengajuan($id_pengajuan, $tanggal_required, $id_jenis_request, $keterangan)
        {

            $this->db->set('tanggal_required', $tanggal_required);
            $this->db->set('id_jenis_request', $id_jenis_request);
            $this->db->set('keterangan', $keterangan);
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->update('pengajuan');
        }
        */
        function update_pengajuan_id_pengajuan($id_pengajuan, $tanggal_required, $id_jenis_request, $keterangan,$id_gedung,$metode_pembayaran,$tanggal_jatuh_tempo="")
        {

            $this->db->set('tanggal_required', $tanggal_required);
            $this->db->set('id_jenis_request', $id_jenis_request);
            $this->db->set('keterangan', $keterangan);
            $this->db->set('id_gedung', $id_gedung);
            $this->db->set('metode_pembayaran', $metode_pembayaran);
            $this->db->set('tanggal_jatuh_tempo', $tanggal_jatuh_tempo);
          

            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->update('pengajuan');
        }
/*
        function select_detail_pengajuan_id_pengajuan($id_pengajuan)
        {
            $this->db->select('*');
            $this->db->from('detail_pengajuan');
            $this->db->join('pengajuan', 'detail_pengajuan.id_pengajuan = pengajuan.id_pengajuan');
            $this->db->where('detail_pengajuan.id_pengajuan', $id_pengajuan);
            return $this->db->get()->result();
        }

*/

         function select_detail_pengajuan_id_pengajuan($id_pengajuan)
        {
            $this->db->select('*');
            $this->db->from('detail_pengajuan');
            $this->db->join('pengajuan', 'detail_pengajuan.id_pengajuan = pengajuan.id_pengajuan');
            $this->db->join('users', 'users.id = pengajuan.id_user');
            $this->db->join('divisi', 'divisi.id_divisi = users.id_divisi');
            $this->db->join('vendor', 'detail_pengajuan.id_vendor = vendor.id_vendor');
            $this->db->where('detail_pengajuan.id_pengajuan', $id_pengajuan);
            return $this->db->get()->result();
        }
        function select_id_pengajuan_join($id_pengajuan)
        {

            $this->db->select('*');
            $this->db->from('pengajuan');
            $this->db->join('jenis_request', 'pengajuan.id_jenis_request = jenis_request.id_jenis_request');
            $this->db->where('pengajuan.id_pengajuan', $id_pengajuan);

            return $this->db->get()->result();
        }

/*
        function insert_detail_pengajuan_id_pengajuan($id_pengajuan, $nama_barang, $qty, $harga, $tharga)
        {

            $this->db->set('qty', $qty);
            $this->db->set('harga', $harga);
            $this->db->set('tharga', $tharga);
            $this->db->set('nama_barang', $nama_barang);
            $this->db->set('id_pengajuan', $id_pengajuan);
            $this->db->insert('detail_pengajuan');
        }
*/
        function insert_detail_pengajuan_id_pengajuan($id_pengajuan, $nama_barang, $qty, $harga, $tharga,$id_divisi,$nama_alokasi,$id_vendor)
        {

            $this->db->set('qty', $qty);
            $this->db->set('harga', $harga);
            $this->db->set('tharga', $tharga);
            $this->db->set('nama_barang', $nama_barang);
            $this->db->set('id_pengajuan', $id_pengajuan);
            $this->db->set('id_divisi',$id_divisi);
            $this->db->set('nama_users',$nama_alokasi);
            $this->db->set('id_vendor',$id_vendor);

            $this->db->insert('detail_pengajuan');
        }

    function cek_email($ID){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$ID);
        return $this->db->get()->result();
    }


  

    function insert_history_pengajuan($last_insert_id, $tanggal_pengajuan, $ket)
    {
        $this->db->set('id_pengajuan',$last_insert_id);
        $this->db->set('status',1);
        $this->db->set('tanggal',$tanggal_pengajuan);
        $this->db->set('ket','Manager');
        $this->db->insert('history_pengajuan');
    }



    function select_pengajuan_status_depan($ID,$status_depan){


        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$ID);
        $this->db->order_by('tanggal_pengajuan','DESC');


        if($status_depan){
            $this->db->where('status_user !=',$status_depan);
        }
        return $this->db->get()->result();
    }
	
	function count_select_pengajuan_status_depan($ID,$status_depan){


        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$ID);
        $this->db->order_by('tanggal_pengajuan','DESC');


        if($status_depan){
            $this->db->where('status_user !=',$status_depan);
        }
        return $this->db->get()->result();
    }
	
    function hapus_detail_permintaan($id_detail){

    $this->db->where('id_detail',$id_detail);
    $this->db->delete('detail_pengajuan');
  }


  // Select Rule

  function select_rule($id_jenis_request){

        $this->db->select('*');
        $this->db->from('detail_rule');
        $this->db->join('rule','rule.id_rule = detail_rule.id_rule','left');
        $this->db->where('rule.id_jenis_request',$id_jenis_request);
        $this->db->order_by('urutan','ASC');
        return $this->db->get()->result();
  }


 function select_aturan($id_jenis_request){

        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->where('id_jenis_request',$id_jenis_request);
        return $this->db->get()->result();
  }



   function select_manajer($ID){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$ID);
        return $this->db->get()->result();
    }

// Cek ------------------ new ---------------------------------------------------------
 function cek_status_terakhir($id_pengajuan){

        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->order_by('id_history','DESC');
        
        $this->db->limit('1');
        
        return $this->db->get()->result();
    }

 function cek_users($ID){

        $this->db->select('*,users_groups.group_id as id_groups');
        $this->db->from('users');
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->join('groups', 'users_groups.group_id = groups.id');
        $this->db->where('users.id',$ID);

        return $this->db->get()->result();
    }


    function cekrule($id_jenis_request,$group){

        $this->db->select('urutan');
        $this->db->from('detail_rule');
        $this->db->join('rule','rule.id_rule = detail_rule.id_rule','left');
        $this->db->where('rule.id_jenis_request',$id_jenis_request);
        $this->db->where_in('detail_rule.id_groups',$group);
        $this->db->order_by('urutan','ASC');

        return $this->db->get()->result();
    }


    function next_penerima($id_groups){

        $this->db->select('user_id,users.email');
        $this->db->from('users_groups');
        $this->db->join('users','users.id = users_groups.user_id','left');
        $this->db->where('group_id',$id_groups);
        return $this->db->get()->result();
    }

    function nextrule($id_jenis_request,$urutan){

        $this->db->select('detail_rule.urutan,groups.name as nama_group,groups.id as id_groups');
        $this->db->from('detail_rule');
        $this->db->join('rule','rule.id_rule = detail_rule.id_rule');
        $this->db->join('groups','detail_rule.id_groups = groups.id');
        $this->db->where('rule.id_jenis_request',$id_jenis_request);
        $this->db->where('detail_rule.urutan',$urutan);
        return $this->db->get()->result();
    }


    function select_penerima($id_groups){

        $this->db->select('*');
        $this->db->from('users_groups');
        $this->db->join('users','users.id= users_groups.user_id');
        $this->db->where_in('group_id',$id_groups);
         $this->db->order_by('users_groups.id','ASC');
        return $this->db->get()->result();
    }


    function select_daftar_persetujuan($groupid,$id=""){

        $this->db->select('pengajuan.id_pengajuan,pengajuan.no_pengajuan,pengajuan.tanggal_pengajuan,pengajuan.tanggal_required,pengajuan.id_jenis_request,pengajuan.keterangan,pengajuan.tujuan,history_pengajuan.id_history as id_his,history_pengajuan.status,history_pengajuan.id_user_approval,history_pengajuan.tanggal,history_pengajuan.ket,history_pengajuan.id_penerima,history_pengajuan.urutan,pengajuan.id_user');

        $this->db->from('history_pengajuan');
        $this->db->join('pengajuan','pengajuan.id_pengajuan= history_pengajuan.id_pengajuan');

        $this->db->join('users','users.id = pengajuan.id_user');

       

    /*

        $this->db->where('users_groups.group_id',$groupid);
        */

        $this->db->where('history_pengajuan.groupid',$groupid);
        if($groupid=="15"){
                $this->db->where('users.id_line_manajer',$id);
        }elseif($groupid=="23"){
                 $this->db->join('divisi','divisi.id_divisi = users.id_divisi');
                 $this->db->where('divisi.id_kacab_regional',$id);
                
        }
        $this->db->where('history_pengajuan.id_user_approval','0');
        $this->db->where('history_pengajuan.status','0');
         
        $this->db->group_by('history_pengajuan.id_pengajuan');
        $this->db->order_by('id_pengajuan','DESC');
        return $this->db->get()->result();
    }
    
	function count_select_daftar_persetujuan($ID){

        $this->db->select('pengajuan.id_pengajuan,pengajuan.no_pengajuan,pengajuan.tanggal_pengajuan,pengajuan.tanggal_required,pengajuan.id_jenis_request,pengajuan.keterangan,pengajuan.tujuan,history_pengajuan.id_history as id_his,history_pengajuan.status,history_pengajuan.id_user_approval,history_pengajuan.tanggal,history_pengajuan.ket,history_pengajuan.id_penerima,history_pengajuan.urutan,detail_rule.id_groups');


        $this->db->from('history_pengajuan');
        $this->db->join('pengajuan','pengajuan.id_pengajuan= history_pengajuan.id_pengajuan');
        $this->db->join('users','users.id= pengajuan.id_user');

        $this->db->join('detail_rule','detail_rule.urutan= history_pengajuan.urutan');

        $this->db->where('id_penerima',$ID);
        $this->db->where('history_pengajuan.id_user_approval','0');
        $this->db->group_by('history_pengajuan.id_pengajuan');
        return $this->db->get()->num_rows();
    }

    function insert_pengajuan_new($ID,$tanggal_pengajuan,$tanggal_required,$id_jenis_request,$keterangan,$no_pengajuan,$foto,$tujuan,$urutan,$metode_pembayaran,$ppn,$jumlahtotal,$tanggal_jatuh_tempo,$id_gedung){

        $this->db->set('id_user', $ID);
        $this->db->set('tanggal_pengajuan', $tanggal_pengajuan);
        $this->db->set('tanggal_required', $tanggal_required);
        $this->db->set('id_jenis_request', $id_jenis_request);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('no_pengajuan', $no_pengajuan);
        $this->db->set('lampiran', $foto);
        $this->db->set('tujuan', $tujuan);
        $this->db->set('last_status', 0);
        /*
        $this->db->set('id_alokasi', $last_alokasi);
        */
        $this->db->set('metode_pembayaran', $metode_pembayaran);
        $this->db->set('ket',$ket);
        $this->db->set('urutan',$urutan);
        $this->db->set('ppn',$ppn);
        $this->db->set('grand_total',$jumlahtotal);
         $this->db->set('tanggal_jatuh_tempo',$tanggal_jatuh_tempo);
         $this->db->set('id_gedung',$id_gedung);
        $this->db->insert('pengajuan');

    }

    function insert_history_pengajuan_new($last_insert_id,$tanggal_pengajuan,$id_penerima,$urutan,$status_approval="",$id_groups,$status_history="")
    {
        $this->db->set('id_pengajuan',$last_insert_id);
        if($status_approval){
            $this->db->set('status',$status_approval);
        }else{
              $this->db->set('status',0);
        }

        if($status_history){
             $this->db->set('status_history',$status_history);
        }
        $this->db->set('groupid',$id_groups);
        $this->db->set('tanggal',$tanggal_pengajuan);
        $this->db->set('id_penerima',$id_penerima);
        $this->db->set('urutan',$urutan);
        
        $this->db->insert('history_pengajuan');
    }

     function select_pengajuan_id($ID,$daterange="",$status="",$id_p=""){


        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','pengajuan.id_user= users.id');
        $this->db->where('id_user',$ID);
        $this->db->order_by('tanggal_pengajuan','DESC');

        if($daterange and !$status and !$id_p){
            $tanggal = explode(" - ",$daterange);
            $dari = str_replace('/', '-', $tanggal[0]);
            $sampai = str_replace('/', '-', $tanggal[1]);

            $this->db->where("DATE(tanggal_pengajuan) >=", $dari);
            $this->db->where("DATE(tanggal_pengajuan)<=", $sampai);


        }elseif(!$daterange and !$status and $id_p){
            $this->db->where('id_pengajuan',$id_p);

        }
        return $this->db->get()->result();
    }
	
	function count_select_pengajuan_id($ID,$daterange="",$status="",$id_p=""){


        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$ID);
        $this->db->order_by('tanggal_pengajuan','DESC');

        if($daterange and !$status and !$id_p){
            $tanggal = explode(" - ",$daterange);
            $dari = str_replace('/', '-', $tanggal[0]);
            $sampai = str_replace('/', '-', $tanggal[1]);

            $this->db->where("DATE(tanggal_pengajuan) >=", $dari);
            $this->db->where("DATE(tanggal_pengajuan)<=", $sampai);


        }elseif(!$daterange and !$status and $id_p){
            $this->db->where('id_pengajuan',$id_p);

        }
        return $this->db->get()->num_rows();
    }
	
     function cek_group($id_jenis_request,$urutan){

        $this->db->select('detail_rule.id_groups,groups.name');
        $this->db->from('detail_rule');
        $this->db->join('rule','rule.id_rule = detail_rule.id_rule','left');
        $this->db->join('groups','groups.id = detail_rule.id_groups','left');
        $this->db->where('rule.id_jenis_request',$id_jenis_request);
         $this->db->where('detail_rule.urutan',$urutan);
        $this->db->order_by('urutan','ASC');
        return $this->db->get()->result();
    }

     function history_pengajuan($id_pengajuan,$limit=""){
        $this->db->select('history_pengajuan.id_history,history_pengajuan.id_pengajuan,history_pengajuan.status,history_pengajuan.catatan,history_pengajuan.id_user_approval,history_pengajuan.tanggal,history_pengajuan.ket,history_pengajuan.id_penerima,history_pengajuan.urutan,pengajuan.id_jenis_request,history_pengajuan.lampiran as lampiran_history,history_pengajuan.groupid');
        
        $this->db->from('history_pengajuan');
        
        $this->db->join('pengajuan','pengajuan.id_pengajuan = history_pengajuan.id_pengajuan');
        
        $this->db->where('history_pengajuan.id_pengajuan',$id_pengajuan);
        $this->db->where('history_pengajuan.status_history','0');
        if($limit){
            $this->db->order_by('urutan','DESC');
            $this->db->limit($limit);
        }
        return $this->db->get()->result();
    }


   function select_pengajuan_detail($on){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','pengajuan.id_user = users.id');
        $this->db->join('divisi','users.id_divisi = divisi.id_divisi');
        $this->db->join('jabatan','jabatan.id_jabatan = users.id_jabatan');
        $this->db->join('jenis_request','jenis_request.id_jenis_request = pengajuan.id_jenis_request');
        $this->db->join('gedung','gedung.id_gedung = pengajuan.id_gedung');
        $this->db->where('id_pengajuan',$on);
        return $this->db->get()->result();
    }


    function update_history_pengajuan_new($status_approval,$id_history,$tanggal_persetujuan,$id_penerima,$ket="",$foto_name="",$id_groups="",$catatan){

        $this->db->set('status', $status_approval);
        $this->db->set('tanggal', $tanggal_persetujuan);
        $this->db->set('id_user_approval', $id_penerima);
        $this->db->set('lampiran', $foto_name);
        $this->db->set('catatan', $catatan);

        /*
        $this->db->set('groupid', $id_groups);
*/

        if($ket){
            $this->db->set('ket', $ket);
        }
        $this->db->where('id_history', $id_history);

        $this->db->update('history_pengajuan');
    }

    function update_pengajuan_new($next_urutan,$id_pengajuan,$status_approval,$id_penerima){

        if($status_approval==3){
            $this->db->set('draft', '1');
        }
        $this->db->set('urutan', $next_urutan);
        $this->db->set('last_status', $status_approval);
        $this->db->set('id_user_approval', $id_penerima);
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan');
    }


    function select_sum_belanja($id_pengajuan){
        $this->db->select_sum('tharga');
        $this->db->from('detail_pengajuan');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }

     function select_email_pengirim($id_pengirim){
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('id',$id_pengirim);
        return $this->db->get()->result();
    }

     function history_persetujuan($groupid,$IDM=""){
/*
         $this->db->select('*');
         */
         
        $this->db->select('history_pengajuan.id_history,history_pengajuan.id_pengajuan,history_pengajuan.status,history_pengajuan.catatan,history_pengajuan.id_user_approval,history_pengajuan.tanggal as tanggal_persetujuan,history_pengajuan.ket,history_pengajuan.id_penerima,history_pengajuan.urutan,pengajuan.no_pengajuan,users.first_name,users.last_name,pengajuan.tanggal_pengajuan,pengajuan.tanggal_required,jenis_request.jenis_request,pengajuan.id_jenis_request');

        $this->db->from('history_pengajuan');
        
       $this->db->join('pengajuan','pengajuan.id_pengajuan = history_pengajuan.id_pengajuan');
       $this->db->join('users','users.id = pengajuan.id_user');
       $this->db->join('jenis_request','jenis_request.id_jenis_request = pengajuan.id_jenis_request');
       
        $this->db->where('history_pengajuan.id_user_approval',$groupid);
        
        if($IDM){
            $this->db->where('users.id_line_manajer',$IDM);
        }
     
        $this->db->order_by('id_history');
        return $this->db->get()->result();
    }

     function cek_user($id_pengajuan){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','users.id= pengajuan.id_user');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }


    function select_penerima_baru($groupid){
        $this->db->select('*');
        $this->db->from('users_groups');
        $this->db->join('users','users.id= users_groups.user_id');
        $this->db->where('group_id',$groupid);
        return $this->db->get()->result();
    }


    function cek_jumlah_group_users($ID){

        $this->db->select('*,users_groups.group_id as id_groups');
        $this->db->from('users');
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->join('groups', 'users_groups.group_id = groups.id');
        $this->db->where('users.id',$ID);

        return $this->db->get()->num_rows();
    }


     function cek_groups($ID){

        $this->db->select('*,users_groups.group_id as id_groups');
        $this->db->from('users');
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->join('groups', 'users_groups.group_id = groups.id');
        $this->db->where('users.id',$ID);
        return $this->db->get()->result();
    }

     function cek_group_users($ID){

        $this->db->select('group_id');
        $this->db->from('users_groups');
        $this->db->where('user_id',$ID);

        return $this->db->get()->result();
    }

    function total_belanja($id_pengajuan){
        $this->db->select_sum('tharga');
        $this->db->from('detail_pengajuan');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }

     function select_pengajuan($id_pengajuan){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }

    function cek_user_email($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);


        return $this->db->get()->result();
    }
	
	// Ahmad //
	
	function count_per_bel_selesai($ID, $daterange){
		
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
	
	function count_per_assign($ID){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','users.id = pengajuan.id_user');
        $this->db->where('users.id_line_manajer',$ID);
        $this->db->where('pengajuan.last_status','1');
        return $this->db->get()->num_rows();
    }

    function cek_nama_file($id_permintaan){
        $this->db->select('lampiran,nota');
        $this->db->from('pengajuan');
        $this->db->where('id_pengajuan',$id_permintaan);
        return $this->db->get()->result();
    }


    function select_divisi_gedung($id_gedung){

    $this->db->select('*');
    $this->db->from('divisi');
    $this->db->where('id_gedung', $id_gedung);
    return $this->db->get();

   }

   function select_master_vendor(){

    $this->db->select('*');
    $this->db->from('vendor');
    return $this->db->get()->result();

   }

   function insert_alokasi($id_gedung,$id_divisi, $nama_alokasi){

        
        $this->db->set('id_gedung', $id_gedung);
        $this->db->set('id_divisi', $id_divisi);
        $this->db->set('nama_users', $nama_alokasi);
        $this->db->insert('alokasi');

    }


   function insert_vendor($nama_vendor,$no_telepon_vendor,$no_rekening_vendor,$alamat_vendor,$id_bank){

        $this->db->set('nama_vendor', $nama_vendor);
        $this->db->set('no_telepon_vendor', $no_telepon_vendor);
        $this->db->set('no_rekening_vendor', $no_rekening_vendor);
        $this->db->set('alamat_vendor', $alamat_vendor);
        $this->db->set('id_bank', $id_bank);
        $this->db->insert('vendor');

    }


      function select_alokasi($id_alokasi){
        $this->db->select('*');
        $this->db->from('alokasi');
          $this->db->join('gedung', 'alokasi.id_gedung = gedung.id_gedung');
        $this->db->join('divisi', 'divisi.id_divisi = alokasi.id_divisi');
        $this->db->where('id_alokasi',$id_alokasi);
        return $this->db->get()->result();
    }

      function select_master_bank(){
        $this->db->select('*');
        $this->db->from('bank');
        return $this->db->get()->result();
    }


    function select_master_divisi(){
        $this->db->select('*');
        $this->db->from('divisi');
        return $this->db->get()->result();
    }


     function cek_bank($vendor){
        $this->db->select('*');
        $this->db->from('vendor');
         $this->db->join('bank', 'vendor.id_bank = bank.id_bank');
         $this->db->where('id_vendor',$vendor);
        return $this->db->get()->result();
    }

      function select_vendor($id_pengajuan){
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
         $this->db->join('vendor', 'vendor.id_vendor = detail_pengajuan.id_vendor');
        
         $this->db->where('id_pengajuan',$id_pengajuan);
          $this->db->group_by('vendor.id_vendor');
        return $this->db->get()->result();
    }

     function cek_nama_file_history($id_permintaan){
        $this->db->select('lampiran');
        $this->db->from('history_pengajuan');
        $this->db->where('id_history',$id_permintaan);
        return $this->db->get()->result();
    }


     function select_ppn($id_permintaan){
        $this->db->select('ppn,grand_total,total_awal,total_pajak');
        $this->db->from('pengajuan');
        $this->db->where('id_pengajuan',$id_permintaan);
        return $this->db->get()->result();
    }


    function update_nota($id_pengajuan,$foto_name){

        $this->db->set('nota', $foto_name);
       
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan');
    }


     function select_grup($id){
        $ad=array('16');
        $this->db->select('users_groups.user_id,users_groups.group_id,users.email');

        $this->db->from('users_groups');
          $this->db->join('users', 'users_groups.user_id = users.id');
        $this->db->where_in('group_id',$id);
        return $this->db->get()->result();
    }


    function history_terakhir($id_pengajuan){

         $this->db->select('*');

        $this->db->from('history_pengajuan');
          $this->db->join('detail_rule', 'detail_rule.urutan = history_pengajuan.urutan');
          $this->db->join('groups', 'detail_rule.id_groups = groups.id');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }


     function select_pengajuan_nota(){


        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','pengajuan.id_user= users.id');
        $this->db->where('pengajuan.nota !=',NULL);
        $this->db->order_by('tanggal_pengajuan','DESC');
        return $this->db->get()->result();
    }


      function select_id_terakhir(){

        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->order_by('id_pengajuan','DESC');
        $this->db->limit('1');
        return $this->db->get()->result();
    }


    function cek_grup($email){

        $this->db->select('*');
        $this->db->from('users_groups');
        $this->db->join('users','users_groups.user_id= users.id');
         $this->db->where_in('email',$email);
         $this->db->group_by('users_groups.group_id');
        return $this->db->get()->result();
    }

     function cek_nama_grup($id){

        $this->db->select('*');
        $this->db->from('groups');
       
         $this->db->where('id',$id);
        return $this->db->get()->result();
    }


   function select_history($id_pengajuan,$urutan){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        
        
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->where('urutan',$urutan);
        return $this->db->get()->result();
    }



}