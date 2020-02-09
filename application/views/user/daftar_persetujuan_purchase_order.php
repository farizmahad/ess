<style type="text/css">
  .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    border:none;
    filter: alpha(opacity=0);
}
</style>
	<div class="col-lg-9">
		<h4 class="grey"><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i> Daftar Konfirmasi Purchase Order</h4>
        <div class="line"></div>
          
          <div class="line"></div>
            <div class="post-content">
              <!--<img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />-->
            <div class="post-container">
              <div class="table-responsive-lg">
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
                            <th scope="col"> Tgl </th>
                            <th scope="col"> Nomor </th>
                            <th scope="col"> Supplier </th>
                            <th scope="col"> Tanggal Dibutuhkan </th>
                            <th scope="col"> Status</th>
                            <th scope="col"> Sisa Tagihan </th>
                            <th scope="col"> Tags </th>
                            <th scope="col"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                         foreach($purchase_order as $ord):?>
                        <tr>
                          <?php $id_po=$ord->id_po; ?>
                            <td scope="row"><?php echo date_indo($ord->tgl_transaksi); ?></td>
                            <td>
                                
                            <button type="button" class="btn btn-sm btn-warning detail_button" data-id="<?php echo $ord->id_po; ?>"><?php echo $ord->no_po; ?></button> 
                            </td>
                            <td> <?php echo $ord->nama_supplier; ?></td>
                            <td> <?php echo $ord->tgl_jatuh_tempo; ?></td>
                            <td> <?php if($ord->sisa_tagihan==0){?>
								<button type="button" class="btn btn-sm btn-success">Paid</button> 
                            <?php }else{ ?>
								<button type="button" class="btn btn-sm btn-danger">Open</button>
                            <?php } ?></td>
                            <td>
                              <?php echo number_format($ord->sisa_tagihan); ?>
                            </td> 
                            <td>
                              <?php echo $ord->tag; ?>
                            </td>
                            <td>
                              <?php $urutun=$ord->urutan-1; ?>
                              <?php if($ord->id_user_approval==0){ ?>
                              <button type="button" class="btn btn-danger btn-sm aksi_purchase" data-toggle="modal" data-target="#myModal"
                              data-id_po="<?php echo $ord->id_po; ?>"
                              data-urutan="<?php echo $ord->urutan; ?>
                              "
                              data-id_history="<?php echo $ord->id_history; ?>
                              "
                              >Aksi</button>
                            <?php }else{ ?>
                            <?php

                               if($ord->status==1){ ?>
                                    Diterima
                               <?php }elseif($ord->status==2){ ?>
                                     Ditolak
                               <?php }elseif($ord->status==3){ ?>
                                      Direvisi
                               <?php } ?>
                            

                           <?php } ?>
                            </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
     
              </div>

            </div>
                 <div id="result"></div>   
            
          </div>    
    		</div>
    	</div>
    </div>

     <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Persetujuan</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
         <form method="post" action="<?php echo base_url();?>User_pengajuan/simpan_keputusan_po" enctype="multipart/form-data">
<?php
               $an=$this->User_pengajuan_model->cek_user_po($id_po);
               foreach($an as $a){
                $user_idd=$a->id_pembuat;
                $email_idd=$a->email;
               }

           ?>
               
          
                            <div class="form-group">
                                <label>Catatan</label>
                               <textarea class="form-control" name="catatan" cols="110"></textarea>
                               <input type="hidden" value="<?php echo $email_idd; ?>" name="email_pengirim">
                               <input type="hidden" value="<?php echo $user_idd; ?>" name="id_pengirim">

                                <input type="hidden" value="1" name="id_jenis_request">

                                <input type="hidden"  name="urutan" class="urutan">

                                  
                                  


                            </div>
  <div class="form-group">
                           <label for="firstname"> Lampiran</label>
                              <br>
                              <input id="uploadFile" placeholder="Pilih File..." readonly style="padding:2px;border-radius: 5px;border: 1px solid white;">
                               <div class="fileUpload btn btn-info">
                               <span>Upload</span>
                             <input id="uploadBtn" type="file" class="upload" name="foto">
                             </div>

                        </div>

                            <div class="form-group">
                                <label>Keputusan</label>
                                <select class="form-control" name="status_approval">
                                    <option value="1"> Disetujui</option>
                                    <option value="2"> Ditolak</option>
                                    <option value="3"> Dikembalikan dengan revisi</option>
                                </select>
                                <input type="hidden" class="form-control id_po" name="id_pengajuan" placeholder="Nama Kategori Barang">
                                <input type="hidden" class="form-control id_history" name="id_history" placeholder="Nama Kategori Barang">

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                        <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    </div>
                    </form>
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
        "scrollX": false
        
    });
});


        $(document).on( "click", '.aksi_purchase',function(e) {
    var id_po = $(this).data('id_po');
    var urutan = $(this).data('urutan');
    var id_history= $(this).data('id_history');
    
    $(".id_po").val(id_po);
    $(".urutan").val(urutan);
     $(".id_history").val(id_history);
  
});





    </script>
    <script>
       $(document).on("click", ".detail_button", function () {
        var myId = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>User_pengajuan/tampil_satu_purchase_order',
            data: { ids: myId},
            success: function(response) {
                $('#result').html(response);
            }
        });
    }); 
    </script>

    <!-- Footer
    ================================================= -->
    
  

