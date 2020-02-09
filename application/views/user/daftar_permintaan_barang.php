<div class="col-lg-9">
 <h4 class="grey"><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i> <?php echo $title; ?></h4>
        <div class="line"></div>
          <a href="<?php echo base_url(); ?>tambah-permintaan-barang-non-dagang" type="button" class="btn btn-sm btn-success">Buat Permintaan</a>
           <?php
           $ID                      = $this->ion_auth->user()->row()->id;
           $cek_divisi=$this->user_pengajuan_model->cek_line_manajer($ID);
           foreach($cek_divisi as $ce){
              $nama_divisi=$ce->nama_divisi;
           }

            $var_divisi            =explode(" ",$nama_divisi);
            $divisi1          =$var_divisi[0];
            $divisi2          =$var_divisi[1];

            
             if($divisi1=="Bursa") {
           ?>
           <a href="<?php echo base_url(); ?>daftar-permintaan-barang-non-dagang-revisi" type="button" class="btn btn-sm btn-success">Daftar Produk Revisi</a>
           <a href="<?php echo base_url(); ?>daftar-permintaan-barang-non-dagang-ditolak" type="button" class="btn btn-sm btn-success">Daftar Produk Ditolak</a>
         <?php } ?>
         
          <div class="line"></div>
            <div class="post-content">
                <div class="post-container">
              <div class="table-responsive-lg">
                 <?php echo $this->session->flashdata('message');?>

                <?php if($status=="direvisi") { ?>
                    <form method="POST" action="<?php echo base_url(); ?>User_pengajuan/simpan_produk_pr">
                 <?php   
                  $count_detail=count($detail_sementara);?>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <div class="table-responsive-lg">      
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                         <th> Direvisi oleh</th>
                                         <th> Produk</th>
                                         <th> Deskripsi Produk</th>
                                         <th> Kuantitas</th>
                                         <th> Satuan</th>
                                         <th> Tgl dibutuhkan</th>
                                         <th> Keterangan</th>
                                         <th> Pilih</th>
                                         <th scope="col" style="text-align: center;"> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $count_daftar_permintaan_barang=count($daftar_permintaan_barang);
                                if($count_daftar_permintaan_barang > 0){
                                foreach($daftar_permintaan_barang as $ra):
                                  ?>
                                <tr>
                                        <td><?php echo $ra->first_name; ?></td>
                                   <?php if($divisi1=="Bursa") { ?>
                           <td><a class="produk_button" data-id="<?php echo $ra->id_detail;?>" style="cursor: pointer;"><?php echo $ra->nama_barang; ?></a></td>

                         <?php }else{ ?>
                           <td><?php echo $ra->nama_barang; ?></td>
                         <?php } ?>
                                        <td>
                                          <input type="text" name="deskripsi_produk[]" value="<?php echo $ra->deskripsi_produk; ?>" class="form-control">
                                        </td>
                                        <td><input type="number" class="form-control" name="qty[]" value="<?php echo $ra->qty; ?>">
                                          <!--
                                          <input type="hidden" class="form-control" name="id_detail[]" value="<?php echo $ra->id_detail; ?>">
                                        -->
                                        </td>

                                        <td><?php echo $ra->satuan; ?></td>
                                        <td><input type="date" class="form-control" name="tanggal_dibutuhkan[]" value="<?php echo $ra->tanggal_dibutuhkan; ?>">
                                        </td>
                                        <td><input type="text" name="deskripsi[]" value="<?php echo $ra->keterangan; ?>" class="form-control">
                                        </td>
                                        <td>
                                          <input type="checkbox" name="id_detail[]" class='chk' value="<?php echo $ra->id_detail; ?>">
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>User_pengajuan/hapus_detailpengajuan?id_detail=<?php echo $ra->id_detail; ?>" class="btn btn-sm btn-warning btn-sm confirm_delete">Hapus</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                              <?php }else{ ?>
                                  <tr>
                                    <td align="center" colspan="6">Belum ada produk</td>
                                  </tr>

                              <?php } ?>
                                </tbody>
                            </table>
                          </div>
                          <?php
                           if($count_daftar_permintaan_barang > 0){ ?>
                        <div align="right">
                             <button type="submit" class="btn btn-success" id="edit_data-btn"> Selesai </button>
                        </div>
                      <?php } ?>
                      </div>
                </div>
                </form>

                <?php }else{?>
                <table class="table table-striped table-hover table table-responsive-lg" id="example2">
                    <thead>
                        <tr>
                            <!--
                            <th style="width: 50%"> Kategori</th>
                          -->
                            <th> Produk</th>
                            <th> Deskripsi</th>
                            <th> Kuantitas</th>
                            <th> Tgl Permintaan</th>
                            <th> Tgl dibutuhkan</th>
                            <th >Purchase Request</th>
                            <th >Purchase Order</th>
                            <th >PIC</th>
                            <th  style="text-align: center;"> Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no=1;
                        foreach($daftar_permintaan_barang as $row):?>
                        <tr>
                           <!--
                           <td><?php echo $row->nama_kategori; ?></td>
                         -->
                         <?php if($divisi1=="Bursa") { ?>
                           <td><a class="produk_button" data-id="<?php echo $row->id_detail;?>" style="cursor: pointer;"><?php echo $row->nama_barang; ?></a></td>

                         <?php }else{ ?>
                           <td><?php echo $row->nama_barang; ?></td>
                         <?php } ?>
                            <td><?php echo $row->deskripsi_produk; ?></td>
                           <td><?php echo $row->qty; ?> <?php echo $row->satuan; ?></td>
                           <td><?php echo date_indo($row->tanggal_daftar); ?></td>
                           <td><?php echo date_indo($row->tanggal_dibutuhkan); ?></td>
                           
                           <td>
                               <?php if($row->id_pengajuan==0){ ?>
                                <button class="btn btn-sm btn-danger">Belum</i></button>
                               <?php }else{ ?>
                                      <?php $id_detail=$row->id_detail; 
                                      $cek_no_pengajuan=$this->user_pengajuan_model->cek_no_pengajuan($id_detail);
                                ?>
                                <?php foreach($cek_no_pengajuan as $on):?>
                                 <button type="button" class="btn btn-warning btn-sm detail_button" 
                                            data-toggle="modal" data-target="#EditModal"
                                            data-tanggal_pengajuan="<?php echo date_indo($on->tanggal_pengajuan); ?>"
                                            data-tanggal_required="<?php echo date_indo($on->tanggal_required);?>"
                                            data-no_pengajuan="<?php echo $on->no_pengajuan;?>"
                                            data-nama_gedung="<?php echo $on->nama_gedung;?>"
                                            data-keterangan="<?php echo $on->keterangan;?>">Sudah
                                  </button>
                                  <?php endforeach; ?>  

                                
                               <?php } ?>
                               
                           </td>
                         
                         
                           <td>
                            <?php
                            if($on->no_po==0){ ?>
                                 <button class="btn btn-sm btn-danger">Belum</button>
                            <?php }else{?>
                                 <button class="btn btn-sm btn-warning">Sudah</button>
                            <?php } ?>
                              
                           </td>
                           <td>
                             <?php echo $row->first_name; ?> <?php echo $row->last_name; ?>
                           </td>
                           <!--
                           <td>
                            <?php if($row->id_pengajuan==0){ ?>
                               <?php if($row->draft==0){ ?>
                                   <a href="<?php echo base_url(); ?>user_pengajuan/batalkan_barang?id_detail=<?php echo $row->id_detail; ?>&status=1" class="btn btn-sm btn-info btn-sm confirm_batal">Batalkan</i></a>
                               <?php }elseif($row->draft==1){ ?>
                                   <a href="<?php echo base_url(); ?>user_pengajuan/batalkan_barang?id_detail=<?php echo $row->id_detail; ?>&status=0" class="btn btn-sm btn-warning btn-sm confirm_kirim">Kirim Permintaan</i></a>
                               <?php } ?>
                              <?php }else{ ?>
                                          
                              <?php } ?>
                           </td>
                         -->
                         <?php if($row->id_pengajuan==0) { ?>
                         <td>
                           <?php
                                if($row->draft==4){ ?>
                                       <button class="btn btn-sm btn-warning"> Menunggu Persetujuan Kacab</button>
                                <?php  }elseif($row->draft==5){
                            ?>
                                       <button class="btn btn-sm btn-warning"> Menunggu Persetujuan Kepala Regional</button>
                           <?php }elseif($row->draft==0){ ?>
                                       <button class="btn btn-sm btn-warning"> Proses Purchase Request</button>
                           <?php }elseif($row->draft==6){ ?>
                                        <button class="btn btn-sm btn-danger">Ditolak
                                         <?php
                                                    if($row->groupid=="15"){
                                                      echo "Kacab";
                                                    }elseif($row->groupid=="23"){
                                                      echo "Kepala Regional";
                                                    }
                                          ?>
                                        </button>
                           <?php } ?>
                        </td>
                       <?php } ?>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
              <?php } ?>
                </div>  
              </div>
              <div id="result"></div>
            </div>
          </div>
          </div>    
    	</div>
      </div>
      <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail <i>Purchase Request</i></h4>
      </div>
      <div class="modal-body">
        
         <div class="form-group" id="data_1">
            <label>No. Purchase <i>Request</i></label>
                <input type="text" class="form-control no_pengajuan" placeholder="No Pengajuan" readonly="">
          </div>

          <div class="form-group" id="data_1">
            <label>Tanggal Pengajuan</label>
            
                <input type="text" class="form-control tanggal_pengajuan" placeholder="Tanggal Pengajuan" readonly="">
            
          </div>

        <div class="form-group" id="data_2">
            <label>Tanggal Dibutuhkan</label>
              <input type="text" class="form-control tanggal_required" placeholder="Tanggal Dibutuhkan" readonly="">
          
      </div>
         <div class="form-group" id="data_1">
            <label>Lokasi</label>
                <input type="text" class="form-control nama_gedung" placeholder="Tanggal Pengajuan" readonly="">
          </div>
             <div class="form-group" id="data_1">
            <label>Keterangan</label>
                <textarea class="form-control keterangan" readonly=""></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      
      </div>
     
    </div>
  </div>
</div>
<script>
  $(function () {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "scrollX": true
    });
});
       

$(document).ready(function(){
  $('.confirm_batal').on('click', function(){
    
    var delete_url = $(this).attr('href');

    swal({
      title: "Batalkan ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya !",
      cancelButtonText: "Tidak",
      closeOnConfirm: false     
    }, function(){
     
      window.location.href = delete_url;
    });

    return false;
  });
});

$(document).ready(function(){
  $('.confirm_kirim').on('click', function(){
    
    var delete_url = $(this).attr('href');

    swal({
      title: "Kirimkan ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya !",
      cancelButtonText: "Tidak",
      closeOnConfirm: false     
    }, function(){
     
      window.location.href = delete_url;
    });

    return false;
  });
});


$(document).on( "click", '.detail_button',function(e) {
    var tanggal_pengajuan  = $(this).data('tanggal_pengajuan');
    var tanggal_required = $(this).data('tanggal_required');
    var no_pengajuan = $(this).data('no_pengajuan');
    var nama_gedung = $(this).data('nama_gedung');
    var keterangan = $(this).data('keterangan');

    $(".tanggal_pengajuan").val(tanggal_pengajuan);
    $(".tanggal_required").val(tanggal_required);
    $(".no_pengajuan").val(no_pengajuan);
     $(".nama_gedung").val(nama_gedung);
     $(".keterangan").val(keterangan);
    
    });


$('#edit_data-btn').on("click",function(e){
  id_array= new Array();
       i=0;
       $("input.chk:checked").each(function(){
           id_array[i] = $(this).val();
           i++;

       })
       if(id_array.length<1){
        swal({
                title: "Peringatan!",
                text: "Pilih data yang diubah terlebih dahulu!"
            });
          return false;
      
       
   }
});// end button edit




$(document).on("click", ".produk_button", function () {
        var myId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>Toko/riwayat_produk',
            data: { ids: myId},
            success: function(response) {
                $('#result').html(response);
            }
        });
    }); 
</script>


