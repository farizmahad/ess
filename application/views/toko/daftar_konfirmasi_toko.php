<div class="col-lg-9">
 <h4 class="grey"><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i> <?php echo $title; ?></h4>
        <div class="line"></div>
          <a href="<?php echo base_url(); ?>Toko/daftar_konfirmasi_produk" type="button" class="btn btn-sm btn-success">Konfirmasi Produk</a>
           <a href="<?php echo base_url(); ?>Toko/riwayat_konfirmasi_produk/diterima" type="button" class="btn btn-sm btn-success">Riwayat Konfirmasi Produk Diterima</a>
           <a href="<?php echo base_url(); ?>Toko/riwayat_konfirmasi_produk/direvisi" type="button" class="btn btn-sm btn-success">Riwayat Konfirmasi Produk Revisi</a>
           <a href="<?php echo base_url(); ?>Toko/riwayat_konfirmasi_produk/ditolak" type="button" class="btn btn-sm btn-success">Riwayat Konfirmasi Produk Ditolak</a>
          <div class="line"></div>
            <div class="post-content">
                <div class="post-container">
              <div class="table-responsive-lg">
                 <?php echo $this->session->flashdata('message');?>

                <form method="POST" action="<?php echo base_url(); ?>toko/simpan_konfirmasi_toko_wa">
                <table class="table table-striped table-hover table table-responsive-lg" id="example2">
                    <thead>
                        <tr>
                            <th> Produk</th>
                            <th> Deskripsi</th>
                            <th> Kuantitas</th>
                            <th> Tgl Permintaan</th>
                            <th> Tgl dibutuhkan</th>
                            <th> PIC</th>
                            <th  style="text-align: center;"> Aksi </th>
                            <th >Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $count_daftar=count($daftar_permintaan_barang);
                        $no=1;
                        foreach($daftar_permintaan_barang as $row):?>
                        <tr>
                           <td>
                           <a class="produk_button" data-id="<?php echo $row->id_detail;?>" style="cursor: pointer;"><?php echo $row->nama_barang; ?></a>
                         </td>
                           <td><?php echo $row->deskripsi_produk; ?></td>
                           <td><?php echo $row->qty; ?> <?php echo $row->satuan; ?></td>
                           <td><?php echo $row->tanggal_daftar; ?></td>
                           <td><?php echo $row->tanggal_dibutuhkan; ?></td>
                           <td>
                             <?php echo $row->first_name; ?> <?php echo $row->last_name; ?>
                           </td>
                         <?php if($row->id_pengajuan==0) { ?>
                         <td>
                           <?php
                                if($row->draft==4){ ?>
                                      <select class="form-control" name="status[]"> 
                                          <option value="5">Diterima</option>
                                          <option value="6">Ditolak</option>
                                          <option value="7">Direvisi</option>
                                      </select>
                                <?php  }elseif($row->draft==5){
                            ?>
                                       <select class="form-control" name="status[]"> 
                                        <?php if($row->draft=="4"){?>
                                          <option value="5">Diterima</option>
                                        <?php }elseif($row->draft=="5"){ ?>
                                           <option value="0">Diterima</option>
                                        <?php } ?>
                                          <option value="6">Ditolak</option>
                                          <option value="7">Direvisi</option>
                                      </select>
                           <?php }elseif($row->draft==0){ ?>
                                       <button class="btn btn-sm btn-warning">Proses Purchase Request</button>
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
                        <td>
                          <input type="checkbox" name="id_detail[]" class='chk' value="<?php echo $row->id_detail; ?>">
                          <input type="hidden" name="draft[]"  value="<?php echo $row->draft; ?>">
                           <input type="hidden" name="id_user[]"  value="<?php echo $row->id_user; ?>">
                        </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if($count_daftar >0) {?>
                <div align="left">
                             <button type="submit" class="btn btn-success" id="edit_data-btn"> Selesai </button>
                </div>
              <?php } ?>
                </div>  
              </div>
              </form>
            </div>
             <div id="result">
             </div>
    
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
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "scrollX": true
    });
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
                text: "Pilih data  terlebih dahulu!"
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


