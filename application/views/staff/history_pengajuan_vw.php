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
 <h4 class="grey"><i class="fa fa-list"></i> Daftar Permintaan</h4>
        <div class="line"></div>
         <?php echo $this->session->flashdata('message');?>
          <div class="line"></div>
            <div class="post-content">
                <div class="post-container">
              <div class="table-responsive-lg">
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
                            <th scope="col"> No. Permintaan </th>
                            <th scope="col"> Tgl Permintaan </th>
                            <!--
                            <th scope="col"> Tanggal Dibutuhkan </th>
                          -->
                            <th scope="col"> Status Sekarang </th>
                            <!--
                            <th>User Penerima</th>
                          -->
                            <th scope="col" style="text-align: center;"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $jumlah=count($history);
                        if($jumlah > 0) { 
                        $no=$this->uri->segment('3') + 1;
                        foreach($history as $ad): 
                           $id_jenis_request=$ad->id_jenis_request;
                          ?>
                           <tr>
                              <td><?php echo $ad->no_pengajuan; ?></td>
                              <td width="12%"><?php echo date_indo($ad->tanggal_pengajuan); ?></td>
                              <!--
                              <td width="12%"><?php echo date_indo($ad->tanggal_required); ?></td>
                            -->
                              <td>
                                <?php
                                   $id_permintaan=$ad->id_pengajuan;
                                   $status_terakhir=$this->Pengajuan_model->cek_status_terakhir($id_permintaan);
                                   foreach($status_terakhir as $ter){
                                        $user_penerima=$ter->id_penerima;
                                        $urutan=$ter->urutan;
                                        $next_urutan=$urutan+1;

                                        $last_status=$ter->status;
                                          $keterangan=$ter->ket;
                                         
                                   
                                     
                                   } ?>  




                                     <?php if($last_status==0 and $keterangan ==NULL){ ?>

                                        <strong>Menunggu Persetujuan</strong>

                                  <?php  }elseif($last_status==1 and $keterangan=='Selesai'){
                                   ?>
                                      <strong> Selesai</strong>

                                 <?php }elseif($last_status==2){ ?>
                                    <strong>Ditolak</strong>

                                 <?php }elseif($last_status==3){ ?>

                                     <strong>Dikembalikan dengan revisi</strong>
                                <?php } ?>
                                    <?php 
                                                $next=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);

                                                foreach($next as $ne){



                                                                 echo $ne->nama_group;
                                                               }
                                                                 
                                                    ?>
                                  
                                              <?php
                                              /*
                                                 $cek_users=$this->Pengajuan_model->user_by_id($user_penerima);
                                                 


                                                 foreach($cek_users as $us){ ?>

                                                    

                                                   <a href="#"  data-toggle="modal" data-target="#EditModal"
                                            data-id="<?php echo $us->id; ?>" data-first_name="<?php echo  $us->first_name; ?>" 
                                             data-nama_divisi="<?php echo  $us->nama_divisi; ?>"
                                             data-nama_jabatan="<?php echo  $us->nama_jabatan; ?>"

                                            class="editt_button">
                                                    <?php echo  $us->first_name; echo " "; echo $us->last_name; ?>
                                                  </a>
                                            <?php     } ?>

                                            


                              */
                                            ?>
                                  
                      


                              </td>
                              
                              
                                    <td align="center">
                                        <button type="button" class="btn btn-sm btn-success edit_button" data-id="<?php echo $ad->id_pengajuan; ?>">Detail</button> 
                                        <?php if($last_status==3){ ?>

                                    
                             <a href="<?php echo site_url('Pengajuan/edit_pengajuan/'.$ad->id_pengajuan);?>" class="btn btn-sm btn-danger"><b>Ubah</b></a>

                                   
                                   <?php     }else{?>
                                                      <button type="button" class="btn btn-sm btn-danger">Ubah
                                                      </button>
                                        <?php } ?>

                                         <a href="<?php echo site_url('cetak-pengajuan/'.$ad->id_pengajuan);?>" target="_blank" class="btn btn-sm btn-warning btn-sm confirm_delete"> <b>Cetak</b></a>

                                         <?php

                                                if($keterangan=="Selesai" and $ad->nota==NULL){ ?>

                                                  <button type="button" data-toggle="modal" data-target="#VendorModall" class="btn btn-sm btn-danger nota_button" data-id="<?php echo $ad->id_pengajuan; ?>"
                                                  data-id_user="<?php echo $ad->id_user; ?>"

                                                    >Input Nota</button> 
                                                
                                          <?php       }
                                         ?>  

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php }else{ ?>
                            <td colspan="6" align="center">Tidak ada data !</td>
                        <?php } ?>
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
    </div>


 <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                

                <input type="text" class="form-control first_name" name="nama_jabatan" readonly="">
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_jabatan">
                    <div class="form-group">
                        <label>Divisi</label>
                        
                        <input type="text" class="form-control nama_divisi" name="nama_jabatan" placeholder="Nama Jabatan">
                       
                    </div>

                      <div class="form-group">
                        <label>Jabatan</label>
                       
                        <input type="text" class="form-control nama_jabatan" name="nama_jabatan" placeholder="Nama Jabatan">
                       
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                
            </div>
            </form>
        </div>
    </div>
</div>
 
    
   
 <div class="modal fade" id="VendorModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Upload Nota
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Pengajuan/simpan_nota" enctype="multipart/form-data">
                   
 <div class="form-group">
                           <label for="firstname"> Lampiran</label>
                              <br>
                              <input id="uploadFile" placeholder="Pilih File..." readonly style="padding:2px;border-radius: 5px;border: 1px solid white;">
                               <div class="fileUpload btn btn-info">
                               <span>Upload</span>
                             <input id="uploadBtn" type="file" class="upload" name="foto">
                             </div>
<input type="hidden" name="id_pengajuan" class="form-control id_pengajuan">
<input type="hidden" name="id_user" class="form-control id_user">
                        </div>
                      
                   
            </div>
            <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-info"> Kirim Nota </button>

                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                
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
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "scrollX": true
    });
});

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



       
</script> 
<script>
     $(document).on( "click", '.editt_button',function(e) {
        var id = $(this).data('id');
        var first_name = $(this).data('first_name');
        var nama_divisi = $(this).data('nama_divisi');
        var nama_jabatan = $(this).data('nama_jabatan');


        $(".id").val(id);
        $(".first_name").val(first_name);
        $(".nama_divisi").val(nama_divisi);
        $(".nama_jabatan").val(nama_jabatan);

    });
</script>
<script>
$(document).on( "click", '.nota_button',function(e) {
        var id = $(this).data('id');
        var id_user = $(this).data('id_user');
        


        $(".id_pengajuan").val(id);
        $(".id_user").val(id_user);
    });
</script>

 <script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
    };
</script>
