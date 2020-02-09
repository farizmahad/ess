<div class="col-lg-9">
 <h4 class="grey"><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i> Daftar <i>Purchase Request</i></h4>
        <div class="line"></div>
          <a href="<?php echo base_url(); ?>buat-purchase-request" type="button" class="btn btn-sm btn-danger">Buat <i>Purchase Request</i></a>          
         <?php echo $this->session->flashdata('message');?>
          <div class="line"></div>
            <div class="post-content">
                <div class="post-container">
              <div class="table-responsive-lg">
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;"> No</th>
                            <th>No <i>Purchase Request</i></th>
                            <th scope="col"> Tanggal dibuat</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=1;
                      foreach($list_pr as $pr):?>
                      <tr>
                        <td align="center"><?php echo $no++; ?></td>
                        <td><a href="<?php echo base_url(); ?>tambah-detail-purchase-request/<?php echo $pr->id_pengajuan; ?>" target="_blank"><?php echo $pr->no_pengajuan; ?></a></td>
                        <td><?php echo date_indo($pr->tanggal_pengajuan); ?></td>
                        <td>
                          <?php if($pr->draft==0){ ?>
                            <button class="btn btn-sm btn-danger">Sudah dikirim</button>
                          <?php }elseif($pr->draft==1){ ?>
                            <button class="btn btn-sm btn-success">Belum dikirim</button>
                          <?php } ?>
                        </td>
                        <td>
                           <?php
                                   $id_permintaan=$pr->id_pengajuan;
                                   $id_jenis_request=$daf->id_jenis_request;
                                   $status_terakhir=$this->user_pengajuan_model->cek_history_terakhir_pr($id_permintaan);
                                   foreach($status_terakhir as $ter){
                                    
                                    $groupid=$ter->groupid;
                                    $status_history=$ter->status;   
                                   } ?>  

                                   <?php
                                     $group_id=$groupid;
                            if($group_id=="16"){
                              echo "Proses Purchase Order"; 
                            }elseif(($group_id=="15") or ($group_id=="14") or ($groupid=="23")){
                              if($status_history==0){
                                echo "Menunggu Persetujuan";
                              }elseif($status_history==1){
                                echo "Diterima";
                              }elseif($status_history==2){
                                echo "Ditolak";
                              }elseif($status_history==3){
                                echo "Direvisi";
                              }
                            }
                            ?>

                               &nbsp;
                            <?php
                            $groupss=$this->user_pengajuan_model->get_groups_id($group_id);
                             foreach($groupss as $gr){
                                 echo $gr->name;
                             }

                                   ?>
                        </td>
                        <td align="center">
                          <?php if($pr->draft==0){ ?>
                            <button type="button" class="btn btn-success btn-sm sudah_button">Ubah</button>
                          <?php }elseif($pr->draft==1){ ?>
                                 <button type="button" class="btn btn-success btn-sm ubah_button" 
                                            data-toggle="modal" data-target="#EditModal"
                                            data-id_pengajuan="<?php echo $pr->id_pengajuan; ?>"
                                            data-no_pengajuan="<?php echo $pr->no_pengajuan;?>"
                                            data-tanggal_required="<?php echo $pr->tanggal_required;?>"
                                            data-id_gedung="<?php echo $pr->id_gedung;?>"
                                            data-keterangan="<?php echo $pr->keterangan;?>">Ubah
                                        </button>  
                          <?php } ?>
                          <button type="button" class="btn btn-sm btn-warning detail_button" data-id="<?php echo $pr->id_pengajuan; ?>">Detail</button>
                           <?php
                            $id_pr=$pr->id_pengajuan;  
                            $cek_history_terakhir_pr=$this->user_pengajuan_model->cek_history_terakhir_pr($id_pr); 

                            foreach($cek_history_terakhir_pr as $row){
                                   $group=$row->groupid;

                            }

                            $cek_user_groups=$this->user_pengajuan_model->cek_users_group($group);
                            foreach($cek_user_groups as $gr){
                                $id_user=$gr->user_id;
                                $email_group=$gr->email;
                                $phone=$gr->phone;
                            }


                            $var_email  = explode("@",$email_group);
                            $domain   = $var_email[1];



                            if($domain=="bursasajadah.com"){
                                $link_wa="http://bursasajadah.com/webmail/";
                            }elseif($domain=="aartijaya.com"){
                                $link_wa="https://mail.google.com/mail/u/0/#inbox";
                            }elseif($domain=="gmail.com"){
                                $link_wa="https://mail.google.com/mail/u/0/#inbox";
                            }


                            $group_pic = array('pic');
                            if($group=="14" and $this->ion_auth->in_group($group_pic)){ ?>
                              <!--
                                       <a href="https://wa.me/<?php echo $phone; ?>?text=Anda%20mempunyai%20permintaan%20purchase%20request baru%20Klik%20link ini%20<?php echo $link_wa; ?>%20atau%20melalui%20http://portal.aartijaya.com/daftar-persetujuan%20" class="btn btn-sm btn-success" target="blank">Kirim Link</a>
                                     -->

                                     <!--
 <a href="https://api.whatsapp.com/send?phone=<?php echo $phone; ?>&text=Anda%20mempunyai%20permintaan%20purchase%20request baru%20Klik%20link ini%20<?php echo $link_wa; ?>" title="klik untuk menghubungi kami secara otomatis" class="btn btn-sm btn-success" target="_blank">Kirim Link</a>
-->

<!--
<a href="https://api.whatsapp.com/send?phone=<?php echo $phone; ?>&text=Anda%20mempunyai%20permintaan%20purchase%20request baru%20Klik%20link ini%20<?php echo base_url(); ?>Purchase_order/keputusan_wa?id_po=1"  class="btn btn-sm btn-success" target="_blank">Kirim Link</a>
-->


<!--
<a href="https://wa.me/<?php echo $phone; ?>?text=Anda%20mempunyai%20permintaan%20purchase%20order baru%20Klik%20link ini%20<?php echo base_url(); ?>Purchase_request/keputusan_telepon?id_po=<?php echo $id_permintaan.'-'.$groupid.'-'.$phone; ?>%20" class="btn btn-sm btn-success" target="blank">Kirim Link</a>
-->


                           <?php   } ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
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
        <h4 class="modal-title" id="myModalLabel">Ubah Purchase Request</h4>
      </div>
      <div class="modal-body">
        <form id="myform" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>user_pengajuan/ubah_form_pengajuan">
           <div class="form-group">
            <label>No. <i>Purchase Request</i></label>
         <input type="text"name="no_pengajuan" class="form-control no_pengajuan" disabled="">
          </div>
          <div class="form-group" id="data_1">
            <label>Tanggal dibutuhkan</label>
            <div class="input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control tanggal_required" name="tanggal_dibutuhkan" id="tanggal_dibutuhkan" placeholder="Tanggal dibutuhkan">
            </div>
          </div>
        <div class="form-group">
            <label>Lokasi</label>
            <select class="form-control id_gedung" name="id_lokasi" id="id_lokasi">
                <option value="">Pilih Lokasi</option>
                <?php foreach($gedung as $gen): ?>
                <option value="<?php echo $gen->id_gedung ?>"><?php echo $gen->nama_gedung; ?></option>

                <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control keterangan" name="keterangan" placeholder="Keterangan"></textarea>
          </div>
           <input class="form-control id_pengajuan" type="hidden" name="id_pengajuan">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-success" value="Simpan">
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
            url: '<?php echo base_url(); ?>User_pengajuan/detail_barang_pic',
            data: { ids: myId},
            success: function(response) {
                $('#result').html(response);
            }
        });
    }); 
</script>
<script>
 $(document).ready(function(){
          $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

          $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
    });




 function validasi()
    {

        var tanggal_dibutuhkan=document.forms["myform"]["tanggal_dibutuhkan"].value;
        if (tanggal_dibutuhkan==null || tanggal_dibutuhkan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Tanggal dibutuhkan tidak boleh kosong!"
            });
          return false;
          };
        var id_lokasi=document.forms["myform"]["id_lokasi"].value;
        if (id_lokasi==null || id_lokasi=="")
          {
           swal({
                title: "Peringatan!",
                text: "Lokasi tidak boleh kosong!"
            });
          return false;
          };


        var selesai=document.forms["myform"]["selesai"].value;
        if (selesai==null || selesai=="")
          {
           swal({
                title: "Peringatan!",
                text: "Tanggal selesai tidak boleh kosong!"
            });
          return false;
          };  
     }



$(document).on( "click", '.ubah_button',function(e) {
    var id_pengajuan   = $(this).data('id_pengajuan');
    var no_pengajuan   = $(this).data('no_pengajuan');
    var tanggal_required      = $(this).data('tanggal_required');
    var id_gedung    = $(this).data('id_gedung');
    var keterangan   = $(this).data('keterangan');

    $(".id_pengajuan").val(id_pengajuan);
    $(".no_pengajuan").val(no_pengajuan);
    $(".tanggal_required").val(tanggal_required);
    $(".id_gedung").val(id_gedung);
    $(".keterangan").val(keterangan);
    });


  $(document).on( "click", '.sudah_button',function(e) {
          swal({
                title: "Peringatan!",
                text: "Permintaan sudah dikirim dan tidak dapat diubah"
            });
          return false;
    });


 $(document).on("click", ".detail_button", function () {
        var myId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>Pengajuan/detaill',
            data: { ids: myId},
            success: function(response) {
                $('#result').html(response);
            }
        });
    }); 
</script>