<?php
Class Master_model extends CI_Model
{


//=============================================================================================================== select
	//================== Jenis Request ===============
	
	function select_aturan($limit="",$start=""){

        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->join('jenis_request','aturan.id_jenis_request=jenis_request.id_jenis_request');
        if($limit){
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }


    function select_aturan_ada($id_jenis_request){

        $this->db->select('*');
        $this->db->from('jenis_request');
        $this->db->where_not_in('id_jenis_request',$id_jenis_request);
        return $this->db->get()->result();
    }
    function select_aturan_request(){

        $this->db->select('id_jenis_request');
        $this->db->from('aturan');
        return $this->db->get()->result();
    }

    function select_mst_pembayaran(){

        $this->db->select('*');
        $this->db->from('mst_syarat_pembayaran');
        return $this->db->get()->result();
    }

   function select_aturan_val($val){

        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->where('id_aturan', $val);
        return $this->db->get()->result();
    }
	
	//================== Jenis Request ===============
	
	function select_jenis_request($limit="",$start=""){

        $this->db->select('*');
        $this->db->from('jenis_request');
        if($limit){
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }

   function select_jenis_request_val($val){

        $this->db->select('*');
        $this->db->from('jenis_request');
        $this->db->where('id_jenis_request', $val);
        return $this->db->get()->result();
    }
	
	
	//================== Divisi ===============
	
	function select_divisi($limit="",$start=""){

        $this->db->select('*');
        $this->db->from('divisi');
         
        if($limit){
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }


    function select_divisi_kacab($limit="",$start=""){

        $this->db->select('*,divisi.id_divisi as id_divisi_baru');
        $this->db->from('divisi');
         $this->db->join('users','users.id=divisi.id_kacab_regional');
        if($limit){
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }

   function select_divisi_val($val){

        $this->db->select('*');
        $this->db->from('divisi');
        $this->db->where('id_divisi', $val);
        return $this->db->get()->result();
    }
	
	//================== Jabatan ===============
	
	function select_jabatan($limit="",$start=""){

        $this->db->select('*');
        $this->db->from('jabatan');
        if($limit){
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }

   function select_jabatan_val($val){

        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->where('id_jabatan', $val);
        return $this->db->get()->result();
    }
    
	function select_barang($limit="",$start=""){

        $this->db->select('b.id_barang, b.nama_barang, b.harga, b.id_jenis_request, j.id_jenis_request, j.jenis_request');
        $this->db->from('barang b');
        $this->db->join('jenis_request j', 'j.id_jenis_request = b.id_jenis_request');
        if($limit){
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }
	
	//========================================= subkategori barang
    function select_barang_detail($id_barang,$limit="",$start=""){

        $this->db->select('*');
        $this->db->from('barang_detail');
        $this->db->where('id_barang',$id_barang);
        if($limit){
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }


    function select_barang_detail_all(){

        $this->db->select('*');
        $this->db->from('barang_detail');
        return $this->db->get()->result();
    }

    function select_barang_detail_val($val){

        $this->db->select('*');
        $this->db->from('barang_detail');
        $this->db->where('id_barang_detail', $val);
        return $this->db->get()->result();
    }
	
	//================== Supplier ===============
	
	function select_supplier($limit="",$start=""){

        $this->db->select('*');
        $this->db->from('supplier');
        if($limit){
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result();
    }

   function select_supplier_val($val){

        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('id_supplier', $val);
        return $this->db->get()->result();
    }
		

    function tampil_kategori(){

        $this->db->select('*');
        $this->db->from('mst_kategori');
        $this->db->join('pic','pic.id_kategori_barang = mst_kategori.id_kategori');
        $this->db->join('users','pic.id_user = users.id');
         $this->db->where('LEFT(nama_kategori,2)=','ND');
        return $this->db->get()->result();
    }

     function select_produk(){

        $this->db->select('*');
        $this->db->from('mst_barang');
        $this->db->join('mst_kategori','mst_kategori.nama_kategori = mst_barang.kategori_produk');
        $this->db->where('LEFT(kategori_produk,2)=','ND');
        return $this->db->get()->result();
    }

    function select_kategori_non_dagang(){

        $this->db->select('*');
        $this->db->from('mst_kategori');
        $this->db->where('LEFT(nama_kategori,2)=','ND');
        return $this->db->get()->result();
    }


    function select_gudang(){

        $this->db->select('*');
        $this->db->from('mst_gudang');
        return $this->db->get()->result();
    }

      function cek_id_terakhir(){

        $this->db->select('*');
        $this->db->from('mst_pajak');
        $this->db->order_by('id','DESC');
        $this->db->limit('1');
         $query=$this->db->get()->result();
         foreach($query as $ros){
            $id_pajak=$ros->id;
         }
         return $id_pajak;
    }
//============================================================================================================ insert
	
	function insert_aturan($nama_aturan,$batas_bawah,$batas_atas,$status,$id_jenis_request){

        $this->db->set('nama_aturan',$nama_aturan);
        $this->db->set('batas_bawah',$batas_bawah);
        $this->db->set('batas_atas',$batas_atas);
        $this->db->set('status',$status);
           $this->db->set('id_jenis_request',$id_jenis_request);
        $this->db->insert('aturan');
    }
	
    function insert_jenis_request($jenis_request){

        $this->db->set('jenis_request',$jenis_request);
        $this->db->insert('jenis_request');
    }
	
	function insert_divisi($nama_divisi){

        $this->db->set('nama_divisi',$nama_divisi);
        $this->db->insert('divisi');
    }
	
	function insert_jabatan($nama_jabatan){

        $this->db->set('nama_jabatan',$nama_jabatan);
        $this->db->insert('jabatan');
    }

    function insert_syarat_pembayaran($nama_syarat_pembayaran,$jangka_waktu){

        $this->db->set('nama_syarat_pembayaran',$nama_syarat_pembayaran);
        $this->db->set('jangka_waktu',$jangka_waktu);
        $this->db->insert('mst_syarat_pembayaran');
    }
	
	function insert_supplier($nama_supplier, $alamat_supplier, $email){

        $this->db->set('nama_supplier',$nama_supplier);
        $this->db->set('alamat_supplier',$alamat_supplier);
        $this->db->set('email',$email);
        $this->db->insert('supplier');
    }
	
	function insert_barang_detail($id_barang,$nama,$spesifikasi,$keterangan,$harga_barang,$tanggal_input){

        $this->db->set('nama',$nama);
        $this->db->set('spesifikasi',$spesifikasi);
        $this->db->set('keterangan',$keterangan);
        $this->db->set('harga_barang',$harga_barang);
        $this->db->set('tanggal_input',$tanggal_input);
        $this->db->set('id_barang',$id_barang);
        $this->db->insert('barang_detail');
    }


    function insert_produk($kode_produk,$nama_barang,$qty,$unit,$harga_beli,$harga_jual,$kategori_produk,$id_barang="",$tanda){

        $this->db->set('kode_produk',$kode_produk);
        $this->db->set('nama_barang',$nama_barang);
        $this->db->set('qty',$qty);
        $this->db->set('unit',$unit);
        $this->db->set('harga_beli',$harga_beli);
        $this->db->set('harga_jual',$harga_jual);
        $this->db->set('kategori_produk',$kategori_produk);
        if($tanda=="tambah"){
           $this->db->insert('mst_barang');
        }elseif($tanda=="ubah"){
          $this->db->where('id_barang',$id_barang);
          $this->db->update('mst_barang');

        }

    }

    function insert_gudang($nama_gudang, $kode_gudang, $alamat,$keterangan){

        $this->db->set('nama',$nama_gudang);
        $this->db->set('kode',$kode_gudang);
        $this->db->set('alamat',$alamat);
        $this->db->set('keterangan',$keterangan);
        $this->db->insert('mst_gudang');
    }


     function insert_pajak($nama_pajak,$persentase_efektif,$cek_pemotongan,$cek_id_terakhir){

        $this->db->set('nama',$nama_pajak);
        $this->db->set('id_mst_pajak',$cek_id_terakhir);
        $this->db->set('persentase_efektif',$persentase_efektif);
        $this->db->set('status_pemotongan',$cek_pemotongan);
        $this->db->insert('mst_pajak_detail');
    }
//============================================================================================================================= update
	
	function update_aturan($id_aturan,$nama_aturan,$batas_bawah,$batas_atas,$status)
    {
            $this->nama_aturan =  $nama_aturan;
            $this->batas_bawah =  $batas_bawah;
            $this->batas_atas =  $batas_atas;
            $this->db->update('aturan', $this, array('id_aturan' => $id_aturan));
    }
	
    function update_jenis_request($id_jenis_request,$jenis_request)
    {
            $this->jenis_request =  $jenis_request;
            $this->db->update('jenis_request', $this, array('id_jenis_request' => $id_jenis_request));
    }

    function update_divisi($id_divisi,$nama_divisi,$id_kacab_regional)
    {
            if($id_kacab_regional){
              $this->id_kacab_regional =  $id_kacab_regional;
            }
            $this->nama_divisi =  $nama_divisi;
            $this->db->update('divisi', $this, array('id_divisi' => $id_divisi));
    }
	
	function update_jabatan($id_jabatan,$nama_jabatan)
    {
            $this->nama_jabatan =  $nama_jabatan;
            $this->db->update('jabatan', $this, array('id_jabatan' => $id_jabatan));
    }
	
	 function update_barang_detail($id_barang,$nama,$spesifikasi,$keterangan,$harga_barang,$tanggal_input,$id_barang_detail)
    {
        $this->id_kategori =  $id_barang;
        $this->nama =  $nama;
        $this->spesifikasi =  $spesifikasi;
        $this->keterangan =  $keterangan;
        $this->harga_barang =  $harga_barang;
        $this->tanggal_input =  $tanggal_input;
        $this->db->update('barang_detail', $this, array('id_barang_detail' => $id_barang_detail));
    }
	
	function update_supplier($id_supplier, $nama_supplier, $alamat_supplier, $email)
    {
            $this->nama_supplier =  $nama_supplier;
            $this->alamat_supplier =  $alamat_supplier;
            $this->email =  $email;
            $this->db->update('supplier', $this, array('id_supplier' => $id_supplier));
    }


    function update_syarat_pembayaran($id_syarat_pembayaran,$nama_syarat_pembayaran,$jangka_waktu)
    {
            $this->nama_syarat_pembayaran =  $nama_syarat_pembayaran;
            $this->jangka_waktu =  $jangka_waktu;
            $this->db->update('mst_syarat_pembayaran', $this, array('id' => $id_syarat_pembayaran));
    }

     function update_gudang($nama_gudang, $kode_gudang, $alamat,$keterangan,$id_gudang)
    {
            $this->nama =  $nama_gudang;
            $this->kode =  $kode_gudang;
            $this->alamat =  $alamat;
            $this->keterangan =  $keterangan;
            $this->db->update('mst_gudang', $this, array('id' => $id_gudang));
    }

    function update_pajak($nama_pajak, $persentase_efektif,$id_pajak)
    {
            $this->nama =  $nama_pajak;
            $this->persentase_efektif =  $persentase_efektif;
            $this->db->update('mst_pajak_detail', $this, array('id_mst_pajak' => $id_pajak));
    }
    

//===================================================== count
	// count aturan
    function count_aturan(){

        $this->db->select('*');
        $this->db->from('aturan');
        return $this->db->get()->num_rows();
    }
	
    // count jenis request
    function count_jenis_request(){

        $this->db->select('*');
        $this->db->from('jenis_request');
        return $this->db->get()->num_rows();
    }
	
	// count divisi
    function count_divisi(){

        $this->db->select('*');
        $this->db->from('divisi');
        return $this->db->get()->num_rows();
    }
	
	// count jabatan
    function count_jabatan(){

        $this->db->select('*');
        $this->db->from('jabatan');
        return $this->db->get()->num_rows();
    }
	
	// count subkategori barang
    function count_barang_detail($id_barang){

        $this->db->select('*');
        $this->db->from('barang_detail');
        $this->db->where('id_barang',$id_barang);
        return $this->db->get()->num_rows();
    }
	
	// count barang
    function count_barang(){

        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->get()->num_rows();
    }
	
	// count kategori barang
    function count_kategori_barang(){

        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get()->num_rows();
    }

    // count lokasi
    function count_lokasi(){

        $this->db->select('*');
        $this->db->from('lokasi');
        return $this->db->count_all_results();
    }

    // count merk
    function count_merk(){

        $this->db->select('*');
        $this->db->from('merk');
        return $this->db->count_all_results();
    }

    // count status barang
    function count_status_barang(){

        $this->db->select('*');
        $this->db->from('status');
        return $this->db->get()->num_rows();
    }

    // count satuan barang
    function count_satuan_barang(){

        $this->db->select('*');
        $this->db->from('satuan');
        return $this->db->get()->num_rows();
    }

    // count subkategori barang
    function count_subkategori_barang($id_kategori){

        $this->db->select('*');
        $this->db->from('sub_kategori');
        $this->db->where('id_kategori',$id_kategori);
        return $this->db->get()->num_rows();
    }
	
	// count supplier
    function count_supplier(){

        $this->db->select('*');
        $this->db->from('supplier');
        return $this->db->count_all_results();
    }

    //=============================================================================================delete
	function hapus_aturan($id_aturan)
    {
        $this->db->where('id_aturan', $id_aturan);
        $this->db->delete('aturan');
    }
	
    function delete_produk($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('mst_barang');
    }

     function delete_syarat_pembayaran($id_syarat)
    {
        $this->db->where('id', $id_syarat);
        $this->db->delete('mst_syarat_pembayaran');
    }


    function delete_jenis_request($id_jenis_request)
    {
        $this->db->where('id_jenis_request', $id_jenis_request);
        $this->db->delete('jenis_request');
    }


    function delete_aturan($id_aturan)
    {
        $this->db->where('id_aturan', $id_aturan);
        $this->db->delete('aturan');
    }


	function delete_divisi($id_divisi)
    {
        $this->db->where('id_divisi', $id_divisi);
        $this->db->delete('divisi');
    }
	
	function delete_jabatan($id_jabatan)
    {
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->delete('jabatan');
    }
	
	function delete_barang_detail($id_barang_detail)
    {
        $this->db->where('id_barang_detail', $id_barang_detail);
        $this->db->delete('barang_detail');
    }
	
	function delete_supplier($id_supplier)
    {
        $this->db->where('id_supplier', $id_supplier);
        $this->db->delete('supplier');
    }

    function delete_gudang($id_gudang)
    {
        $this->db->where('id', $id_gudang);
        $this->db->delete('mst_gudang');
    }

     function select_kepala_regional(){

        $this->db->select('*,users.id as id_user');
        $this->db->from('users');
        $this->db->join('users_groups','users.id= users_groups.user_id');
        $this->db->join('groups','groups.id= users_groups.group_id');
        $this->db->where('groups.name', 'kepala regional');
        return $this->db->get()->result();
    }

    function select_pajak(){

        $this->db->select('*,mst_pajak.id as id_pajak');
        $this->db->from('mst_pajak');
        $this->db->join('mst_pajak_detail','mst_pajak.id= mst_pajak_detail.id_mst_pajak');
        return $this->db->get()->result();
    }

    function select_akun_pembayaran(){

        $this->db->select('*');
        $this->db->from('mst_akun_pembayaran');
        return $this->db->get()->result();
    }


    function input_data($data,$table){
        return $this->db->insert($table,$data);
    }


    
}
