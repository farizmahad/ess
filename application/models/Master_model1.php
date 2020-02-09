<?php
Class Master_model extends CI_Model
{


//=============================================================================================================== select

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
//============================================================================================================ insert

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
	
	function insert_barang_detail($id_barang,$nama,$spesifikasi,$keterangan,$harga_barang,$tanggal_input){

        $this->db->set('nama',$nama);
        $this->db->set('spesifikasi',$spesifikasi);
        $this->db->set('keterangan',$keterangan);
        $this->db->set('harga_barang',$harga_barang);
        $this->db->set('tanggal_input',$tanggal_input);
        $this->db->set('id_barang',$id_barang);
        $this->db->insert('barang_detail');
    }
//============================================================================================================================= update

    function update_jenis_request($id_jenis_request,$jenis_request)
    {
            $this->jenis_request =  $jenis_request;
            $this->db->update('jenis_request', $this, array('id_jenis_request' => $id_jenis_request));
    }

    function update_divisi($id_divisi,$nama_divisi)
    {
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
//===================================================== count

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

    function count_supplier(){

        $this->db->select('*');
        $this->db->from('supplier');
        return $this->db->count_all_results();
    }

    //=============================================================================================delete

    function delete_jenis_request($id_jenis_request)
    {
        $this->db->where('id_jenis_request', $id_jenis_request);
        $this->db->delete('jenis_request');
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
}