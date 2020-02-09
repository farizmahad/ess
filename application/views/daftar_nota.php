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
      <h4 class="grey"><i class="fa fa-list"></i> Daftar Nota</h4>
        <div class="line"></div>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
                            <th scope="col"> Nomor</th>
                            <th scope="col"> Tanggal Pengajuan </th>
                            <th scope="col"> Nota </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                       $no=1;
                      foreach($daftar_nota as $an):?>
                        <tr>
                            <td> <?php echo $an->no_pengajuan; ?></td>
                            <td> <?php echo date_indo($an->tanggal_pengajuan); ?> </td>
                            <td> 
                                <a href="<?php echo base_url(); ?>Pengajuan/lakukan_download_nota/<?php echo $an->id_pengajuan; ?>">
                                Unduh
                              </a>

                             </td>
                            

                           
                            
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                </table>

                </div>

                  
                </div>

              
              </div>
              <div id="result">
            </div>
                    
            
                    
           
          
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
         <form method="post" action="<?php echo base_url();?>Pengajuan/simpan_keputusan" enctype="multipart/form-data">

          <?php
               $an=$this->Pengajuan_model->cek_user($id_pengajuan);
               foreach($an as $a){
                $user_idd=$a->id_user;
                $email_idd=$a->email;
               }


           ?>
                            <div class="form-group">
                                <label>Catatan</label>
                               <textarea class="form-control" name="catatan" cols="110"></textarea>
                               <input type="hidden" value="<?php echo $email_idd; ?>" name="email_pengirim">
                               <input type="hidden" value="<?php echo $user_idd; ?>" name="id_pengirim">

                                <input type="hidden" value="<?php echo $id_jenis_request; ?>" name="id_jenis_request">

                                <input type="hidden" value="<?php echo $urutan_pengajuan; ?>" name="urutan">

                                  <input type="hidden" value="<?php echo $urutan_groups; ?>" name="urutan_groups">

                                  


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
                                <input type="hidden" class="form-control id_pengajuan" name="id_pengajuan" placeholder="Nama Kategori Barang" value="<?php echo $id_pengajuan; ?>" >

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
   
    <!-- Footer
    ================================================= -->
   
    
  
    <script>

        $(document).on("click", ".edit_button", function () {
        var myId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: 'http://portal.aartijaya.com/Pengajuan/detaill',
            data: { ids: myId},
            success: function(response) {
                $('#result').html(response);
            }
        });
    });  

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


   document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
    };        
  </script>