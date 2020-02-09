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
      <h4 class="grey"><i class="fa fa-list"></i> Daftar Persetujuan</h4>
        <div class="line"></div>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
                            <th scope="col"> No</th>
                            <th scope="col"> Tanggal Pengajuan </th>
                            <th scope="col"> Nama </th>
                            <th scope="col"> Status Sekarang </th>
                            <th scope="col" style="text-align:center;"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                       $no=1;
                      foreach($daftar_persetujuan as $an):?>
                        <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td> <?php echo date_indo($an->tanggal_pengajuan); ?> </td>
                            <td> <?php echo $an->first_name; ?> <?php echo $an->last_name; ?> </td>
                            <td> 
                            <?php
                              if($an->id_user_approval==0 and $an->status==0){ ?>
                              Menunggu Persetujuan 
                              <?php 
                                 $user_penerima=$id_penerima;
                                 $next_urutan=$urutan_pengajuan+1;

                                               

                                                /* $cek_users=$this->Pengajuan_model->user_by_id($user_penerima);
                                                 


                                                 foreach($cek_users as $us){

                                                    echo $us->first_name; echo " "; echo $us->last_name;
                                                 }
                                                 */
                                                 $next=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);

                                                foreach($next as $ne){



                                                                 echo $ne->nama_group;
                                                               }

                              ?>
                              <?php }elseif($an->id_user_approval !=0 and $an->status==2){ ?>

                               Ditolak




                         <?php     }elseif($an->id_user_approval !=0 and $an->status==3){ ?>  
                                          Dikembalikan dengan revisi

                         <?php }elseif($an->id_user_approval !=0 and $an->status==5){ ?>

                                      Siap untuk dijadikan PR

                         <?php }elseif($an->id_user_approval !=0 and $an->status==1){ ?>

                                          Sudah jadi PR

                      <?php   } ?>   
                            </td>

                            <td> <center><button type="button" class="btn btn-sm btn-success edit_button" data-id="<?php echo $an->id_pengajuan; ?>">Detail</button> 

                              <?php if($an->status==0){?>
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">Aksi</button> 
                            <?php }elseif($an->status==5){ ?>
                               <a href="<?php echo base_url();?>user_pengajuan/jadikan_pr?id=<?php echo $an->id_pengajuan; ?>" class="btn btn-sm btn-danger"> Jadikan PR
                               </a>

                            <?php } ?>
                            </center>
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
         <form method="post" action="<?php echo base_url();?>user_pengajuan/send_keputusan" enctype="multipart/form-data">
                  <div class="form-group">
                          <label>Catatan</label>
                               <textarea class="form-control" name="catatan" cols="110"></textarea>
                  </div>
                  <!--
                  <div class="form-group">
                          <label for="firstname"> Lampiran</label>
                              <br>
                              <input id="uploadFile" placeholder="Pilih File..." readonly style="padding:2px;border-radius: 5px;border: 1px solid white;">
                               <div class="fileUpload btn btn-info">
                               <span>Upload</span>
                             <input id="uploadBtn" type="file" class="upload" name="foto">
                             </div>

                  </div>
                -->
                
                <input type="hidden" value="<?php echo $id_pengajuan; ?>" name="id_pengajuan">

                            <div class="form-group">
                                <label>Keputusan</label>
                                <select class="form-control" name="status_approval">
                                    <option value="5"> Jadikan Purchase Request</option>
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
            url: '<?php echo base_url(); ?>user_pengajuan/detail_pr',
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