<?php
Class User_pengajuan_model extends CI_Model
{

   function get_kategori(){
        $this->db->select('*');
        $this->db->from('mst_kategori');
        return $this->db->get()->result();
    }

     function get_barang(){
        $this->db->select('*');
        $this->db->from('mst_barang');
        return $this->db->get()->result();
    }

     function barang($val){
        $this->db->select('*');
        $this->db->from('mst_barang');
        $this->db->where('id_kategori_barang',$val);
        return $this->db->get();
    }

    function insert_sementara_barang_pengajuan_pr($id_barang,$jumlah_barang,$tanggal_dibutuhkan,$deskripsi,$kode_unik){

        $this->db->set('id_barang', $id_barang);
        $this->db->set('jumlah_barang', $jumlah_barang);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('kode_unik', $kode_unik);
        $this->db->set('tanggal_dibutuhkan', $tanggal_dibutuhkan);
        $this->db->insert('tbl_sementara_pr');
    }
    /*

    function get_barang_detail($ID){
        $this->db->select('*');
        $this->db->from('tbl_sementara_pr');
        $this->db->where("(SUBSTRING(kode_unik, 12, 2) = '$ID')");
        $this->db->join('mst_barang','mst_barang.id_barang=tbl_sementara_pr.id_barang');
        return $this->db->get()->result();
    }*/
 
     function insert_pengajuan($id_kategori,$id_user_pengajuan,$tanggal_pengajuan,$id_jenis_request){

        $this->db->set('id_kategori_barang', $id_kategori);
        $this->db->set('id_user', $id_user_pengajuan);
        $this->db->set('tanggal_pengajuan', $tanggal_pengajuan);
        $this->db->set('id_jenis_request', $id_jenis_request);
        $this->db->insert('pengajuan');
    }

    function insert_detail_pengajuan($last_insert_id,$nama_barang,$jumlah_barang,$deskripsi,$tanggal_dibutuhkan){
        $this->db->set('id_pengajuan', $last_insert_id);
        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('qty', $jumlah_barang);
        $this->db->set('keterangan', $deskripsi);
        $this->db->set('tanggal_dibutuhkan', $tanggal_dibutuhkan);
        $this->db->insert('detail_pengajuan');
    }

       function tambah_riwayat_pengajuan($last_insert_id,$id_pic){
        $this->db->set('id_pengajuan', $last_insert_id);
        $this->db->set('id_penerima', $id_pic);
        $this->db->set('urutan', '1');
        $this->db->set('groupid', '21');
        $this->db->insert('history_pengajuan');
    }



    //checkk

     function cek_id_penerima($id_kategori){
        $this->db->select('*');
        $this->db->from('pic');
        $this->db->join('users','pic.id_user = users.id','left');
        $this->db->where('id_kategori_barang',$id_kategori);
        return $this->db->get()->result();
    }


    function select_daftar_persetujuan_pr($groupid,$id=""){

        $this->db->select('pengajuan.id_pengajuan,pengajuan.no_pengajuan,pengajuan.tanggal_pengajuan,pengajuan.tanggal_required,pengajuan.id_jenis_request,pengajuan.keterangan,pengajuan.tujuan,history_pengajuan.id_history as id_his,history_pengajuan.status,history_pengajuan.id_user_approval,history_pengajuan.tanggal,history_pengajuan.ket,history_pengajuan.id_penerima,history_pengajuan.urutan,pengajuan.id_user,users.first_name,users.last_name');


        $this->db->from('history_pengajuan');
        $this->db->join('pengajuan','pengajuan.id_pengajuan= history_pengajuan.id_pengajuan');

        $this->db->join('users','users.id = pengajuan.id_user');

       

    /*

        $this->db->where('users_groups.group_id',$groupid);
        */

 $this->db->where('history_pengajuan.groupid',$groupid);
 if($id){
    $this->db->where('users.id_line_manajer',$id);
 }
        
         
         
        $this->db->group_by('history_pengajuan.id_pengajuan');
        return $this->db->get()->result();
    }
    

       function get_detail_pengajuan($id_pengajuan){
        
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('mst_barang','mst_barang.id_barang= detail_pengajuan.id_barang');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }

        function get_detail_pr($id_pengajuan){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','users.id= pengajuan.id_user');
        $this->db->join('divisi','users.id_divisi= divisi.id_divisi');
        $this->db->join('jabatan','users.id_jabatan= jabatan.id_jabatan');
        $this->db->join('mst_kategori','mst_kategori.id_kategori= pengajuan.id_kategori_barang');
        $this->db->join('jenis_request','jenis_request.id_jenis_request= pengajuan.id_jenis_request');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }


    function update_pengajuan($id_pengajuan,$status_approval,$ID){

        $this->db->set('last_status', $status_approval);
        $this->db->set('id_user_approval', $ID);
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan');
    }

     function update_riwayat_persetujuan($status_approval,$id_history,$ID,$tanggal){

        $this->db->set('status', $status_approval);
        $this->db->set('tanggal', $tanggal);
        $this->db->set('id_user_approval', $ID);
        $this->db->set('lampiran', $foto_name);
        $this->db->where('id_history', $id_history);
        $this->db->update('history_pengajuan');
    }


    function hapus_detail_barang($id){
        $this->db->where('id_detail',$id);
        $this->db->delete('detail_pengajuan');
    }


     function update_pengajuan_new($no_pengajuan,$id_pengajuan,$tanggal_requi,$id_gedung,$metode_pembayaran,$id_bank,$tanggal_jatuh_tempo,$keterangan,$tujuan,$foto_name){

        $this->db->set('no_pengajuan', $no_pengajuan);
        $this->db->set('tanggal_required', $tanggal_requi);
        $this->db->set('id_gedung', $id_gedung);
        $this->db->set('metode_pembayaran', $metode_pembayaran);
        $this->db->set('tanggal_jatuh_tempo', $tanggal_jatuh_tempo);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('tujuan', $tujuan);
        $this->db->set('lampiran', $lampiran);
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan');
    }


        function cek_line_manajer($id){
        $this->db->select('users.id_line_manajer,users.id_divisi,divisi.status_rule,users.first_name,users.email,divisi.nama_divisi,divisi.id_kacab_regional,users.phone');
        $this->db->from('users');
        $this->db->join('divisi','users.id_divisi= divisi.id_divisi');
        $this->db->where('users.id',$id);
        return $this->db->get()->result();
    }


     function cek_no_telepon($email_asli){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email_asli);
        $query= $this->db->get()->result();
        foreach($query as $to){

            $no_telepon=$to->phone;
        }

        return $no_telepon;
    }


//-=================================== baru ===============================================

     function insert_detail_barang_pengajuan($id_kategori,$nama_kategori,$id_barang,$nama_barang,$jumlah_barang,$satuan,$tanggal_requi,$deskripsi,$id_user,$tanggal_daftar,$deskripsi_produk){

        $this->db->set('id_kategori_barang', $id_kategori);
        $this->db->set('nama_kategori', $nama_kategori);
        $this->db->set('id_barang', $id_barang);
        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('qty', $jumlah_barang);
        $this->db->set('satuan', $satuan);
        $this->db->set('tanggal_dibutuhkan', $tanggal_requi);
        $this->db->set('keterangan', $deskripsi);
        $this->db->set('id_user', $id_user);
        $this->db->set('tanggal_daftar', $tanggal_daftar);
        $this->db->set('draft', '3');
        $this->db->set('deskripsi_produk', $deskripsi_produk);
        $this->db->insert('detail_pengajuan');
    }

      function tampil_daftar_permintaan_barang($id_user){
        $this->db->select('mst_barang.nama_barang,mst_kategori.nama_kategori,detail_pengajuan.qty,detail_pengajuan.satuan,detail_pengajuan.tanggal_dibutuhkan,detail_pengajuan.id_pengajuan,detail_pengajuan.id_detail,detail_pengajuan.id_pengajuan,detail_pengajuan.draft,users.first_name,users.last_name,detail_pengajuan.tanggal_daftar,detail_pengajuan.deskripsi_produk,detail_pengajuan.groupid');
        $this->db->from('detail_pengajuan');
        $this->db->join('mst_kategori','mst_kategori.id_kategori = detail_pengajuan.id_kategori_barang');
        $this->db->join('pic','detail_pengajuan.id_kategori_barang = pic.id_kategori_barang');
        $this->db->join('users','pic.id_user = users.id');
        $this->db->join('mst_barang','mst_barang.id_barang = detail_pengajuan.id_barang');
        $this->db->where('detail_pengajuan.id_user',$id_user);
        $this->db->group_start();
        $this->db->where('detail_pengajuan.draft','0');
        $this->db->or_where('detail_pengajuan.draft','1');
        $this->db->or_where('detail_pengajuan.draft','4');
        $this->db->or_where('detail_pengajuan.draft','5');
        $this->db->group_end();
        $this->db->order_by('id_detail','DESC');
        return $this->db->get()->result();
    }

     function tampil_daftar_permintaan_barang_revisi($id_user){
        $this->db->select('mst_barang.nama_barang,mst_kategori.nama_kategori,detail_pengajuan.qty,detail_pengajuan.satuan,detail_pengajuan.tanggal_dibutuhkan,detail_pengajuan.id_pengajuan,detail_pengajuan.id_detail,detail_pengajuan.id_pengajuan,detail_pengajuan.draft,users.first_name,users.last_name,detail_pengajuan.tanggal_daftar,detail_pengajuan.deskripsi_produk,detail_pengajuan.groupid');
        $this->db->from('detail_pengajuan');
        $this->db->join('mst_kategori','mst_kategori.id_kategori = detail_pengajuan.id_kategori_barang');
        $this->db->join('history_pengajuan','detail_pengajuan.id_detail = history_pengajuan.id_pengajuan');
        $this->db->join('users','history_pengajuan.id_user_approval = users.id');
        $this->db->join('mst_barang','mst_barang.id_barang = detail_pengajuan.id_barang');
        $this->db->where('detail_pengajuan.id_user',$id_user);
        $this->db->where('history_pengajuan.status_history','3');
        $this->db->group_start();
        
        
        $this->db->or_where('detail_pengajuan.draft','7');
        
        $this->db->group_end();
        $this->db->order_by('id_detail','DESC');
        return $this->db->get()->result();
    }

     function tampil_daftar_permintaan_barang_ditolak($id_user){
        $this->db->select('mst_barang.nama_barang,mst_kategori.nama_kategori,detail_pengajuan.qty,detail_pengajuan.satuan,detail_pengajuan.tanggal_dibutuhkan,detail_pengajuan.id_pengajuan,detail_pengajuan.id_detail,detail_pengajuan.id_pengajuan,detail_pengajuan.draft,users.first_name,users.last_name,detail_pengajuan.tanggal_daftar,detail_pengajuan.deskripsi_produk,detail_pengajuan.groupid');
        $this->db->from('detail_pengajuan');
        $this->db->join('mst_kategori','mst_kategori.id_kategori = detail_pengajuan.id_kategori_barang');
        $this->db->join('pic','detail_pengajuan.id_kategori_barang = pic.id_kategori_barang');
        $this->db->join('users','pic.id_user = users.id');
        $this->db->join('mst_barang','mst_barang.id_barang = detail_pengajuan.id_barang');
        $this->db->where('detail_pengajuan.id_user',$id_user);
        $this->db->group_start();   
        $this->db->where('detail_pengajuan.draft','6');
        $this->db->group_end();
        $this->db->order_by('id_detail','DESC');
        return $this->db->get()->result();
    }

     function pic_daftar_barang($id_user){
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('pic','detail_pengajuan.id_kategori_barang = pic.id_kategori_barang');
        $this->db->join('users','detail_pengajuan.id_user = users.id');
        $this->db->where('pic.id_user',$id_user);
        $this->db->where('detail_pengajuan.draft','0');
        $this->db->order_by('id_detail','DESC');
       return $this->db->get()->result();
    }

    function pic_daftar_barang_purchasing($id_user){
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('pic','detail_pengajuan.id_kategori_barang = pic.id_kategori_barang');
        $this->db->join('users','detail_pengajuan.id_user = users.id');

       
        $this->db->group_start();
        $this->db->where('pic.id_user',$id_user);
        $this->db->or_where('detail_pengajuan.id_user',$id_user);
        $this->db->group_end();
        $this->db->where('detail_pengajuan.draft','0');
        $this->db->order_by('id_detail','DESC');
       return $this->db->get()->result();
    }

     


    function pic_daftar_barang_belum($id_user){
        $this->db->select('*,pic.id_kategori_barang as pic_kategori');
        $this->db->from('detail_pengajuan');
        $this->db->join('pic','detail_pengajuan.id_kategori_barang = pic.id_kategori_barang');
        $this->db->join('users','detail_pengajuan.id_user = users.id');
        $this->db->join('divisi','users.id_divisi = divisi.id_divisi');
        $this->db->where('pic.id_user',$id_user);
        $this->db->where('detail_pengajuan.id_pengajuan','0');
        $this->db->where('detail_pengajuan.draft','0');
       return $this->db->get()->result();
    }

      function cari_detail($id){

       $this->db->select('*,detail_pengajuan.qty as qty_jumlah,mst_barang.nama_barang as nama_bar,mst_barang.id_barang as id_bar');
       $this->db->from('detail_pengajuan');
       $this->db->join('mst_barang','mst_barang.id_barang = detail_pengajuan.id_barang');
       $this->db->where('id_detail',$id);
       $query=$this->db->get();
       return $query;
    }

      function cek_detail_pengajuan($id){

       $this->db->select('*,detail_pengajuan.qty as qty_jumlah,mst_barang.nama_barang as nama_bar,mst_barang.id_barang as id_bar');
       $this->db->from('detail_pengajuan');
       $this->db->join('mst_barang','mst_barang.id_barang = detail_pengajuan.id_barang');
       $this->db->join('pengajuan','pengajuan.id_pengajuan = detail_pengajuan.id_pengajuan');
       $this->db->where('id_detail',$id);
        return $this->db->get()->result();
    }
    
    /*
    function cari_detail($id){
    $query= $this->db->get_where('detail_pengajuan',array('id_detail'=>$id));
        return $query;
    }
    */

    function select_master_barang($kategori=""){
       $this->db->select('*');
       $this->db->from('mst_barang');
       $this->db->join('mst_kategori','mst_barang.kategori_produk=mst_kategori.nama_kategori');
       if($kategori){
       $this->db->where('mst_kategori.id_kategori',$kategori);
       }
       return $this->db->get()->result(); 
    }

    function cek_detail_barang($id){
       $this->db->select('*');
       $this->db->from('mst_barang');
       $this->db->where('id_barang',$id);
       return $this->db->get()->result(); 
    }


     function batalkan_barang($id_detail,$status){

        $this->db->set('draft', $status);
        $this->db->where('id_detail', $id_detail);
        $this->db->update('detail_pengajuan');
    }

     function get_detail_barang($id_detail){
       $this->db->select('*,mst_barang.qty as qty_barang,detail_pengajuan.qty as qty_detail');
       $this->db->from('detail_pengajuan');
       $this->db->join('users','detail_pengajuan.id_user = users.id');
       $this->db->join('divisi','divisi.id_divisi= users.id_divisi');
       $this->db->join('mst_barang','mst_barang.id_barang= detail_pengajuan.id_barang');
       $this->db->where('id_detail',$id_detail);
       return $this->db->get()->result(); 
    }


     function insert_permintaan($no_pengajuan,$tanggal_pengajuan,$tanggal_dibutuhkan,$id_jenis_request,$foto_name,$id_gedung,$keterangan,$ID,$draft=""){

        $this->db->set('no_pengajuan', $no_pengajuan);
        $this->db->set('tanggal_pengajuan', $tanggal_pengajuan);
        $this->db->set('tanggal_required', $tanggal_dibutuhkan);
        $this->db->set('id_jenis_request', $id_jenis_request);
        $this->db->set('lampiran', $foto_name);
        $this->db->set('id_gedung', $id_gedung);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('id_user', $ID);
        if($draft){
          $this->db->set('draft', '0');
        }else{
          $this->db->set('draft', '1');
        }
        $this->db->insert('pengajuan');


     }

     function cek_id_pengajuan_terakhir(){

        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->limit('1');
        $this->db->order_by('id_pengajuan', 'DESC');
        return $this->db->get()->result();
    }

    function tampil_pengajuan($id_pengajuan){

        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }


    function update_barang_detail($id_detail,$id_barang,$qty,$satuan,$harga,$id_vendor,$metode_pembayaran,$id_pengajuan,$nama_barang,$id_divisi,$tharga){

        $this->db->set('id_barang', $id_barang);
        $this->db->set('qty', $qty);
        $this->db->set('satuan', $satuan);
        $this->db->set('harga', $harga);
        $this->db->set('tharga', $tharga);
        $this->db->set('id_vendor', $id_vendor);
        $this->db->set('id_pengajuan', $id_pengajuan);
        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('id_divisi', $id_divisi);
        $this->db->set('metode_pembayaran', $metode_pembayaran);
        $this->db->where('id_detail', $id_detail);
        $this->db->update('detail_pengajuan');
    }

    function tampil_detail_pr($id_pengajuan){

        $this->db->select('*,detail_pengajuan.qty as qty_mst');
        $this->db->from('detail_pengajuan');
        $this->db->join('mst_barang','mst_barang.id_barang= detail_pengajuan.id_barang');
        /*
        $this->db->join('vendor','vendor.id_vendor= detail_pengajuan.id_vendor');
        */
        /*
        $this->db->join('users','users.id= detail_pengajuan.id_user');
        */
        $this->db->where('id_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }

     function list_pr($id_user){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$id_user);
        $this->db->order_by('id_pengajuan','DESC');
        return $this->db->get()->result();
    }

      function ubah_form_pengajuan($tanggal_dibutuhkan,$id_lokasi,$keterangan,$id_pengajuan){

        $this->db->set('tanggal_required', $tanggal_dibutuhkan);
        $this->db->set('id_gedung', $id_lokasi);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan');
    }


      function hapus_barang_detail($id_detail){

        $this->db->set('id_pengajuan', '0');
        $this->db->where('id_detail', $id_detail);
        $this->db->update('detail_pengajuan');
    }


      function update_draft($id_pengajuan,$ppn,$total_keseluruhan,$draft,$tipe_pajak,$id_tax,$total_pajak,$total_awal){

       
        $this->db->set('ppn', $ppn);
        $this->db->set('grand_total', $total_keseluruhan);
        $this->db->set('tipe_pajak', $tipe_pajak);
        $this->db->set('draft',$draft);
        $this->db->set('id_pajak',$id_tax);
        $this->db->set('total_pajak',$total_pajak);
         $this->db->set('total_awal',$total_awal);
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan');
    }


     function cek_pic_kategori($id_kategori){
        $this->db->select('*');
        $this->db->from('pic');
        $this->db->join('users','pic.id_user = users.id');
        $this->db->join('mst_kategori','pic.id_kategori_barang= mst_kategori.id_kategori');
        $this->db->where('mst_kategori.nama_kategori',$id_kategori);
       return $this->db->get()->result();
    }

     function cek_pic_kategori_id($id_kategori){
        $this->db->select('*');
        $this->db->from('pic');
        $this->db->join('users','pic.id_user = users.id');
        $this->db->join('mst_kategori','pic.id_kategori_barang= mst_kategori.id_kategori');
        $this->db->where('mst_kategori.id_kategori',$id_kategori);
       return $this->db->get()->result();
    }

	//dipake juga di API
    function get_users($id_user){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.id',$id_user);
       return $this->db->get()->result();
    }


    function cek_no_pengajuan($id_detail){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('detail_pengajuan','detail_pengajuan.id_pengajuan = pengajuan.id_pengajuan');
        $this->db->join('gedung','pengajuan.id_gedung = gedung.id_gedung');
        $this->db->where('detail_pengajuan.id_detail',$id_detail);
       return $this->db->get()->result();
    }


    function select_finance(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('users_groups','users_groups.user_id = users.id');
        $this->db->join('groups','users_groups.group_id = groups.id');
        $this->db->where('groups.name','finance');
        $this->db->or_where('groups.name','finance');
       return $this->db->get()->result();
    }

     function select_purchasing(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('users_groups','users_groups.user_id = users.id');
        $this->db->join('groups','users_groups.group_id = groups.id');
        $this->db->where('groups.name','purchasing');
        $this->db->or_where('groups.name','Purchasing');
       return $this->db->get()->result();
    }


    


    ///----///
    function ambil_barang_detail($barang){

        $this->db->select('*');
        $this->db->from('mst_barang');
        $this->db->where('id_barang',$barang);
        return $this->db->get()->result();
    }


     function ambil_supplier_detail($id_detail){

        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('id_supplier',$id_detail);
        return $this->db->get()->result();
    }

     function ambil_terms_detail($terms){

        $this->db->select('*');
        $this->db->from('mst_syarat_pembayaran');
        $this->db->where('id',$terms);
        return $this->db->get()->result();
    }


    function get_product_po(){
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('pengajuan','detail_pengajuan.id_pengajuan = pengajuan.id_pengajuan');
        
        $this->db->join('users','users.id = detail_pengajuan.id_user');
        
        $this->db->where('detail_pengajuan.id_pengajuan !=','0');
        $this->db->where('detail_pengajuan.no_po','0');
        /*
        $this->db->where('pengajuan.draft','0');
        */
        
        $this->db->order_by('id_detail','DESC');
       return $this->db->get()->result();
    }

    function get_product_po2($id_detail){
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('pengajuan','detail_pengajuan.id_pengajuan = pengajuan.id_pengajuan');
        $this->db->where('detail_pengajuan.id_pengajuan !=','0');
        $this->db->where_not_in('detail_pengajuan.id_detail',$id_detail);
        $this->db->order_by('id_detail','DESC');
       return $this->db->get()->result();
    }

    function insert_table_sementara($id_barang){

        $this->db->set('id_detail_pengajuan',$id_barang);
        $this->db->insert('tbl_sementara');
    }

      function select_table_sementara(){
        $this->db->select('*');
        $this->db->from('tbl_sementara');
       return $this->db->get()->result();
    }

     function insert_purchase_order($id_supplier,$email_supplier,$alamatSupplier,$alamatPengiriman,$tglTransaksi,$tglJatuhTempo,$syaratPembayaran,$tglPengiriman,$kirimMelalui,$noPelacakan,$noTransaksi,$noReferensi,$tag,$id_gudang,$nama_supplier,$nama_gudang,$nama_syarat_pembayaran){

         $ID= $this->ion_auth->user()->row()->id;
        $this->db->set('id_supplier', $id_supplier);
        $this->db->set('email', $email_supplier);
        $this->db->set('alamat_supplier', $alamat_supplier);
        $this->db->set('alamat_pengiriman', $alamatPengiriman);
        $this->db->set('tgl_transaksi', $tglTransaksi);
        $this->db->set('tgl_jatuh_tempo', $tglJatuhTempo);
        $this->db->set('syarat_pembayaran', $syaratPembayaran);
        $this->db->set('tgl_pengiriman', $tglPengiriman);
        $this->db->set('kirim_melalui', $kirimMelalui);
        $this->db->set('no_po', $noTransaksi);
        $this->db->set('no_referensi', $noReferensi);
        $this->db->set('tag', $tag);
        $this->db->set('id_gudang', $id_gudang);
        $this->db->set('nama_supplier', $nama_supplier);
        $this->db->set('nama_gudang', $nama_gudang);
        $this->db->set('nama_syarat_pembayaran', $nama_syarat_pembayaran);
        $this->db->set('id_pembuat', $ID);
        $this->db->insert('purchase_order');
    }

    function insert_detail_purchase_order($id_detail,$barang,$deskripsi,$kuantitas,$satuan,$hargasatuan,$diskon,$id_tax,$id_purchase_order,$nama_tax,$tharga_po,$rate_tax,$jumlah_tax,$subtotal){

        $this->db->set('id_detail_pengajuan', $id_detail);
        $this->db->set('id_barang', $barang);
        
        $this->db->set('harga_po', $hargasatuan);
        $this->db->set('id_po', $id_purchase_order);
        $this->db->set('diskon', $diskon);
        $this->db->set('tharga_po', $tharga_po);
        $this->db->set('id_tax', $id_tax);
        $this->db->set('nama_tax', $nama_tax);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('qty', $kuantitas);
        $this->db->set('rate_tax', $rate_tax);
        $this->db->set('jumlah_pajak', $jumlah_tax);
        $this->db->set('subtotal', $subtotal);
        $this->db->insert('detail_po');
        
    }

      function ubah_detail_pengajuan($id_detail,$id_purchase_order){

        $this->db->set('no_po', $id_purchase_order);
        $this->db->where('id_detail', $id_detail);
        $this->db->update('detail_pengajuan');
    }

    function update_purchase_order($id_supplier,$email_supplier,$alamatSupplier,$alamatPengiriman,$tglTransaksi,$tglJatuhTempo,$syaratPembayaran,$tglPengiriman,$kirimMelalui,$noPelacakan,$noTransaksi,$noReferensi,$tag,$id_gudang,$nama_supplier,$nama_gudang,$id_po){

         $ID= $this->ion_auth->user()->row()->id;
        $this->db->set('id_supplier', $id_supplier);
        $this->db->set('email', $email_supplier);
        $this->db->set('alamat_supplier', $alamat_supplier);
        $this->db->set('alamat_pengiriman', $alamatPengiriman);
        $this->db->set('tgl_transaksi', $tglTransaksi);
        $this->db->set('tgl_jatuh_tempo', $tglJatuhTempo);
        $this->db->set('syarat_pembayaran', $syaratPembayaran);
        $this->db->set('tgl_pengiriman', $tglPengiriman);
        $this->db->set('kirim_melalui', $kirimMelalui);
        $this->db->set('no_po', $noTransaksi);
        $this->db->set('no_referensi', $noReferensi);
        $this->db->set('tag', $tag);
        $this->db->set('id_gudang', $id_gudang);
        $this->db->set('nama_supplier', $nama_supplier);
        $this->db->set('nama_gudang', $nama_gudang);
         $this->db->set('id_pembuat', $ID);
         $this->db->where('id_po', $id_po);
        $this->db->insert('purchase_order');
    }

    function get_detail_po($id_po){
        $this->db->select('*,detail_po.qty as qty_po');
        $this->db->from('detail_po');
        $this->db->join('mst_barang','mst_barang.id_barang = detail_po.id_barang');
        $this->db->where('id_po',$id_po);
       return $this->db->get()->result();
    }


     function select_id_terakhir(){
        $this->db->select_max('id_po');
        $this->db->from('purchase_order');
        $query=$this->db->get()->result();
        foreach($query as $ol){
            $id_terakhir=$ol->id_po;
        }
        return $id_terakhir;

    }


    function hapus_detail_po($id_detail_po){
         $this->db->where('id_detail_po',$id_detail_po);
         $this->db->delete('detail_po');

    }

     function ubah_purchase_order($id_purchase_order,$pesan,$memo,$harga_diskon,$total,$id_account,$number_account,$name_account,$uang_muka,$sisa_tagihan){

        $ID_s = $this->ion_auth->user()->row()->id;
        $this->db->set('pesan', $pesan);
        $this->db->set('memo', $memo);
        $this->db->set('diskon_all', $harga_diskon);
        $this->db->set('total_bayar', $total);
        $this->db->set('id_akun_pembayaran', $id_account);
        $this->db->set('nomor_akun_pembayaran', $number_account);
        $this->db->set('nama_akun_pembayaran', $name_account);
        $this->db->set('uang_muka', $uang_muka);
        $this->db->set('sisa_tagihan', $sisa_tagihan);
        $this->db->set('id_pembuat', $ID_s);
        $this->db->set('draft', '0');
        $this->db->where('id_po', $id_purchase_order);
        $this->db->update('purchase_order');
    }


     function list_purchase_order($id){
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->where('id_pembuat',$id);
       return $this->db->get()->result();
    }


     function get_export_po($id_po){
        $this->db->select('purchase_order.nama_supplier,purchase_order.email,purchase_order.alamat_supplier,purchase_order.alamat_pengiriman,purchase_order.tgl_transaksi,purchase_order.tgl_jatuh_tempo,purchase_order.tgl_pengiriman,purchase_order.kirim_melalui,purchase_order.no_pelacakan,purchase_order.no_referensi,purchase_order.no_po,purchase_order.pesan,purchase_order.memo,mst_barang.nama_barang,detail_po.qty,mst_barang.unit,detail_po.harga_po,purchase_order.diskon_all,detail_po.diskon,detail_po.nama_tax,detail_po.rate_tax,purchase_order.nama_akun_pembayaran,purchase_order.nomor_akun_pembayaran,purchase_order.tag,purchase_order.nama_gudang,purchase_order.sisa_tagihan');
        $this->db->from('detail_po');
        $this->db->join('purchase_order','detail_po.id_po = purchase_order.id_po');
        $this->db->join('mst_barang','detail_po.id_barang = mst_barang.id_barang');
        $this->db->where('detail_po.id_po',$id_po);
        return $this->db->get()->result();
    }



    ///////////////////////////// dipake ///////////////////////////////
    
    function get_barang_non_dagang(){

        $this->db->select('*');
        $this->db->from('mst_barang');
        $this->db->where('LEFT(kategori_produk,2)=','ND');
        return $this->db->get()->result();
    }


        function cek_status_purchase_order($id_purchase_order){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->where('history_pengajuan.id_pengajuan',$id_purchase_order);
        $this->db->where('status_history','1');
       return $this->db->get()->result();
    }

      function cek_urutan($groupname="",$groupid="",$id_rule=""){
        $this->db->select('*');
        $this->db->from('detail_rule');
        $this->db->where('id_rule',$id_rule);
        $this->db->where('id_groups',$groupid);
       return $this->db->get()->result();
    }

     function insert_history_pengajuan_po($tanggal_sekarang,$nex_penerima,$next_urutan,$id_groups,$id_purchase_order,$ket=""){
        $this->db->set('id_pengajuan', $id_purchase_order);
        $this->db->set('tanggal', $tanggal_sekarang);
        $this->db->set('status','0');
        $this->db->set('id_penerima', $nex_penerima);
        $this->db->set('urutan', $next_urutan);
        $this->db->set('groupid', $id_groups);
        $this->db->set('status_history', '1');
        $this->db->set('ket', $ket);
        $this->db->insert('history_pengajuan');
        
    }



      function select_purchase_order_id($ID){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->join('purchase_order','purchase_order.id_po = history_pengajuan.id_pengajuan');
        $this->db->where('status_history','1');
        $this->db->where('groupid',$ID);
       return $this->db->get()->result();
    }

    function select_purchase_order_id_belum($ID){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->join('purchase_order','purchase_order.id_po = history_pengajuan.id_pengajuan');
        $this->db->where('status_history','1');
        $this->db->where('groupid',$ID);
        $this->db->where('status','0');
        $this->db->where('id_user_approval','0');
       return $this->db->get()->result();
    }


    function cek_user_po($id_pengajuan){
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->join('users','users.id= purchase_order.id_pembuat');
        $this->db->where('id_po',$id_pengajuan);
        return $this->db->get()->result();
    }


   function select_purchase_order_byid($id){
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->where('id_po',$id);
       return $this->db->get()->result();
    } 

      function cek_history_terakhir_po($id_po){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        
        $this->db->where('id_pengajuan',$id_po);
        $this->db->where('status_history','1');
        /*
        $this->db->order_by('id_history','DESC');
        */
      
        return $this->db->get()->result();
    }


     function cek_history_terakhir_pr($id_pr){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        
        $this->db->where('id_pengajuan',$id_pr);
        $this->db->where('status_history','0');
        /*
        $this->db->order_by('id_history','DESC');
        */
      
        return $this->db->get()->result();
    }

    function cari_user_group($id){
        $this->db->select('*');
        $this->db->from('groups');
        $this->db->where('id',$id);
        $query=$this->db->get()->result();
        foreach($query as $dew){
            $nama_groups=$dew->name;
        }
        return $nama_groups;
    } 

    function cari_user_approval($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query=$this->db->get()->result();
        foreach($query as $dew){
            $first_name=$dew->first_name;
            $last_name=$dew->last_name;
            $gabung=$first_name.' '.$last_name;
        }
        return $gabung;
    } 

     function select_purchase_order_byid_join($id){
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->join('users','users.id= purchase_order.id_pembuat');
        $this->db->join('divisi','divisi.id_divisi= users.id_divisi');
        $this->db->join('jabatan','jabatan.id_jabatan= users.id_jabatan');
        $this->db->where('id_po',$id);
       return $this->db->get()->result();
    } 


    function cek_penerima_email($email){
        $this->db->select('*');
        $this->db->from('users');
        
        $this->db->join('users_groups','users_groups.user_id = users.id');
        $this->db->join('detail_rule','detail_rule.id_groups = users_groups.group_id');
        
        $this->db->where('users.email',$email);
       return $this->db->get()->result();
    }


    function cek_group_users($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('users_groups','users.id= users_groups.user_id');
        $this->db->where('email',$email);
       return $this->db->get()->result();
    }


      function total_belanja_po($id_purchase_order){

        $this->db->select('*');
        $this->db->from('detail_po');
        $this->db->where('id_po',$id_purchase_order);
        return $this->db->get()->result();
    }


      function update_detail_po_pengajuan($id_detail_pengajuan){
        $this->db->set('no_po', '0');
        $this->db->where('id_detail', $id_detail_pengajuan);
        $this->db->update('detail_pengajuan');
    }


    function cek_total_belanja_po($id_po){
       $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->join('users','purchase_order.id_pembuat= users.id');
        $this->db->where('id_po',$id_po);
        return $this->db->get()->result();  
    }


    function cek_users_id($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $query=$this->db->get()->result();
        foreach($query as $dew){
            $id=$dew->id;
            
        }
        return $id;
    } 

    function cek_user_konfirmasi($no_telepon){
       $this->db->select('*');
        $this->db->from('users');
        $this->db->where('phone',$no_telepon);
        return $this->db->get()->result();  
    }

     function tampil_satu_history($id_pengajuan,$group_approv){
        
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->where('groupid',$group_approv);
         $this->db->where('status_history','1');
        return $this->db->get()->result();
    }


   function get_detail_sementara($ID){
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->where('id_user',$ID);
        $this->db->where('draft','3');
       return $this->db->get()->result();
    } 


     function hapus_barang_detail_pengajuan($id_detail){

      $this->db->where('id_detail',$id_detail);
      $this->db->delete('detail_pengajuan');
    }

    function get_users_id($ID)
    {
         $this->db->select('*');
        $this->db->from('users');
         $this->db->join('divisi','divisi.id_divisi= users.id_divisi');
        $this->db->where('users.id',$ID);
       return $this->db->get()->result();
    }


      function get_groups_id($id_group)
    {
        $this->db->select('*');
        $this->db->from('groups');
        $this->db->where('id',$id_group);
       return $this->db->get()->result();
    }

     function tampil_satu_history_pr($id_pengajuan,$group_approv){
        
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->where('groupid',$group_approv);
         $this->db->where('status_history','0');
        return $this->db->get()->result();
    }


     function cek_detail_barang_user($id_detail)
    {
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->where('id_detail',$id_detail);
       return $this->db->get()->result();
    }


    function tampil_daftar_purchase_order_selesai(){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
         $this->db->join('purchase_order','history_pengajuan.id_pengajuan= purchase_order.id_po');
          $this->db->join('users','users.id= purchase_order.id_pembuat');
        $this->db->where('status_history','1');
         $this->db->where('history_pengajuan.groupid','14');
          $this->db->group_start();
          $this->db->where('status','1');
          $this->db->or_where('status','2');
          $this->db->group_end();
        return $this->db->get()->result();
    }

    public function insertimport($data)
    {
        $this->db->insert_batch('mst_barang', $data);
        return $this->db->insert_id();
    }


    public function cek_sku($kode_produk){
        $this->db->select('*');
        $this->db->from('mst_barang');
        $this->db->where('kode_produk',$kode_produk);
        return $this->db->get()->result();
    }


    function tampil_detail_pengajuan($id_pengajuan,$status=""){
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->where('detail_pengajuan.id_pengajuan',$id_pengajuan);
        if($status=="belum"){
            $this->db->where('no_po','0');
        }elseif($status=="sudah"){
              $this->db->where('no_po !=','0');
        }
       
       return $this->db->get()->result();
    }


     function detail_barang_per_id_po($id_pengajuan,$status=""){
        $this->db->select('*,detail_pengajuan.qty as qty_barang,detail_po.deskripsi as deskripsi_po,detail_po.qty as qty_po');
        $this->db->from('detail_pengajuan');
        $this->db->join('detail_po','detail_pengajuan.id_detail = detail_po.id_po');
        $this->db->join('purchase_order','purchase_order.id_po = detail_po.id_po');
        $this->db->join('mst_barang','detail_pengajuan.id_barang = mst_barang.id_barang');
        $this->db->join('users','detail_pengajuan.id_user = users.id');
        $this->db->where('detail_po.id_detail_pengajuan',$id_pengajuan);
        return $this->db->get()->result();
    }


      function tampil_daftar_purchase_order_selesai_search($pilih_tanggal,$select,$search){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->join('purchase_order','history_pengajuan.id_pengajuan= purchase_order.id_po');
        $this->db->join('users','users.id= purchase_order.id_pembuat');
        $this->db->where('status_history','1');
        $this->db->where('history_pengajuan.groupid','14');

         if($pilih_tanggal and $select=="pilih" and $search==""){
             $this->db->where('tgl_transaksi',$pilih_tanggal);
         }elseif($pilih_tanggal and $select=="pic" and $search){
             $this->db->where('tgl_transaksi',$pilih_tanggal);
             $this->db->like('users.first_name',$search);
         }elseif($pilih_tanggal and $select=="no_purchase_order" and $search){
             $this->db->where('tgl_transaksi',$pilih_tanggal);
             $this->db->where('purchase_order.no_po',$search);
         }elseif($pilih_tanggal and $select=="produk" and $search){
             $this->db->where('tgl_transaksi',$pilih_tanggal);
             $this->db->join('detail_po','purchase_order.id_po= detail_po.id_po');
             $this->db->join('mst_barang','detail_po.id_barang= mst_barang.id_barang');
             $this->db->like('nama_barang',$search);
         }elseif($pilih_tanggal=="" and $select=="pic" and $search){
              $this->db->like('users.first_name',$search);
         }elseif($pilih_tanggal=="" and $select=="no_purchase_order" and $search){
               $this->db->where('purchase_order.no_po',$search);
         }elseif($pilih_tanggal=="" and $select=="produk" and $search){
              $this->db->join('detail_po','purchase_order.id_po= detail_po.id_po');
             $this->db->join('mst_barang','detail_po.id_barang= mst_barang.id_barang');
             $this->db->like('nama_barang',$search);
         }

          $this->db->group_start();
          $this->db->where('status','1');
          $this->db->or_where('status','2');
          $this->db->group_end();
        return $this->db->get()->result();
    }


    ////// ------ /////
   function tampil_produk_kepala_cabang($id_line_manajer,$kode_unik,$draft){

        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('users','users.id= detail_pengajuan.id_user');
        $this->db->where('draft',$draft);
        $this->db->where('kode_unik',$kode_unik);
        if($draft=="4"){
        $this->db->where('users.id_line_manajer',$id_line_manajer);
        }elseif($draft=="5"){
            $this->db->join('divisi','divisi.id_divisi= users.id_divisi');
            $this->db->where('divisi.id_kacab_regional',$id_line_manajer);
        }
        return $this->db->get()->result();

   }


   //// update -----//

   function update_detail_pengajuan_cabang($id_detail,$status,$id_group){

        $this->db->set('draft', $status);
        $this->db->set('groupid', $id_group);
        $this->db->where('id_detail', $id_detail);
        $this->db->update('detail_pengajuan');
   }


   function tampil_daftar_purchase_request_selesai(){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->join('pengajuan','history_pengajuan.id_pengajuan= pengajuan.id_pengajuan');
        $this->db->join('users','users.id= pengajuan.id_user');
        $this->db->where('status_history','0');
        $this->db->where('history_pengajuan.ket','selesai');
        /*
         $this->db->where('history_pengajuan.groupid','14');
          $this->db->group_start();
          $this->db->where('status','1');
          $this->db->or_where('status','2');
          $this->db->group_end();
          */
        return $this->db->get()->result();
    }



    function tampil_daftar_purchase_request_selesai_search($pilih_tanggal,$select,$search){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->join('pengajuan','history_pengajuan.id_pengajuan= pengajuan.id_pengajuan');
        $this->db->join('users','users.id= pengajuan.id_user');
        $this->db->where('status_history','0');

        $this->db->where('history_pengajuan.ket','Selesai');

         if($pilih_tanggal and $select=="pilih" and $search==""){
             $this->db->where('tanggal_pengajuan',$pilih_tanggal);
         }elseif($pilih_tanggal and $select=="pic" and $search){
             $this->db->where('tanggal_pengajuan',$pilih_tanggal);
             $this->db->like('users.first_name',$search);
         }elseif($pilih_tanggal and $select=="no_purchase_request" and $search){
             $this->db->where('tanggal_pengajuan',$pilih_tanggal);
             $this->db->where('pengajuan.no_pengajuan',$search);
         }elseif($pilih_tanggal and $select=="produk" and $search){
             $this->db->where('tanggal_pengajuan',$pilih_tanggal);
             $this->db->join('detail_pengajuan','pengajuan.id_pengajuan= detail_pengajuan.id_pengajuan');
             $this->db->join('mst_barang','detail_pengajuan.id_barang= mst_barang.id_barang');
             $this->db->like('mst_barang.nama_barang',$search);
         }elseif($pilih_tanggal=="" and $select=="pic" and $search){
              $this->db->like('users.first_name',$search);
         }elseif($pilih_tanggal=="" and $select=="no_purchase_request" and $search){
               $this->db->where('pengajuan.no_pengajuan',$search);
         }elseif($pilih_tanggal=="" and $select=="produk" and $search){
              $this->db->join('detail_pengajuan','pengajuan.id_pengajuan= detail_pengajuan.id_pengajuan');
             $this->db->join('mst_barang','detail_pengajuan.id_barang= mst_barang.id_barang');
             $this->db->like('mst_barang.nama_barang',$search);
         }

          $this->db->group_start();
          $this->db->where('status','1');
          $this->db->or_where('status','2');
          $this->db->group_end();
        return $this->db->get()->result();
    }


 function cek_users_group($id_group){
        $this->db->select('*');
        $this->db->from('users_groups');
         $this->db->join('users','users_groups.user_id= users.id');
        $this->db->where('group_id',$id_group);
        return $this->db->get()->result();
    }


     function insert_supplier($nama_vendor,$no_rekening_vendor,$id_bank,$alamat_vendor){

        $this->db->set('nama_vendor', $nama_vendor);
        $this->db->set('no_rekening_vendor', $no_rekening_vendor);
        $this->db->set('id_bank', $id_bank);
        $this->db->set('alamat_vendor', $alamat_vendor);
        $this->db->insert('vendor');
    }



    function cek_id_vendor_terakhir(){
        $this->db->select('id_vendor');
        $this->db->from('vendor');
        $this->db->order_by('id_vendor','DESC');
        $this->db->limit('1');
        $query=$this->db->get()->result();

        foreach($query as $row){
            $id_supplier=$row->id_vendor;
        }

        return $id_supplier;
    }


    function cek_divisi_user($ID){
        $bulansekarang=date('m');
        $bulan=$this->getRomawi($bulansekarang);
        $tahun=date('Y');
        $this->db->select('LEFT(pengajuan.no_pengajuan,4) as kode,divisi.nama_divisi',false);
        $this->db->from('pengajuan');
        $this->db->join('users','pengajuan.id_user= users.id');
        $this->db->join('divisi','users.id_divisi= divisi.id_divisi');
        
        $this->db->where('users.id',$ID);
        $this->db->group_start();
        $this->db->where('pengajuan.no_pengajuan !=0');
        $this->db->or_where('pengajuan.no_pengajuan !=','NULL');
        $this->db->or_where('pengajuan.no_pengajuan !=',null);
        $this->db->or_where('pengajuan.no_pengajuan !=','');
        $this->db->group_end();
        $this->db->limit('1');
        $this->db->order_by('id_pengajuan','DESC');
        $query=$this->db->get();
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



    function code_otomatis_po(){
        $bulansekarang=date('m');
        $bulan=$this->getRomawi($bulansekarang);
        $tahun=date('Y');
        $this->db->select('SUBSTRING(no_po, 4, 4) as kode', false);
        $this->db->from('purchase_order');
        $this->db->where('MONTH(tgl_transaksi)',$bulansekarang);
        $this->db->where('YEAR(tgl_transaksi)',$tahun);
        $this->db->limit('1');
        $this->db->order_by('id_po','DESC');

        $query=$this->db->get();
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
           
        }else{

        $kode = 1;
            
        }
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = "ND/".$kodemax."/".$bulan."/".$tahun;
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



   function cek_id_gedung($id_pengirim){

     $this->db->select('divisi.id_gedung');
        $this->db->from('users');
        $this->db->join('divisi','users.id_divisi= divisi.id_divisi');
        $this->db->join('gedung','divisi.id_gedung= gedung.id_gedung');
        $this->db->where('users.id',$id_pengirim);
        $query=$this->db->get()->result();

        foreach($query as $row){
            $id_gedungs=$row->id_gedung;
        }

        return $id_gedungs;
   }


   function cek_general_manager($id){

        $this->db->select('*');
        $this->db->from('users_groups');
        $this->db->join('users','users_groups.user_id= users.id');
        $this->db->where('group_id',$id);
        return $this->db->get()->result();

   }



}