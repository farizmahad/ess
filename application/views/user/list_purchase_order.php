

       <div class="col-md-9">
              <h4 class="grey"><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i> Unduh CSV Purchase Order</h4>
            <div class="line"></div>
            <div class="post-content">
              <div class="post-container">
               

          <form id="myform"  method="post" action="<?php echo base_url(); ?>user_pengajuan/update_detail_barang">
                  <div class="row">
                      <div class="form-group col-md-12">
                        <table class="table table-striped table-hover" id="example2">
                         <thead>
                        <tr>
                            
                            <th scope="col"> Tanggal</th>
                            <th scope="col"> Nomor</th>
                            <th scope="col"> Supplier </th>
                            <th scope="col"> Jatuh Tempo </th>
                            <th scope="col"> Status  </th>
                            <th scope="col"> Sisa Tagihan</th>
                            <th scope="col"> Keterangan</th>
                            <th scope="col"> Persetujuan </th>
                            <th scope="col" style="text-align: center;"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php 
                      $no=1;
                      foreach($list_po as $po):
                     ?>
                       <tr>
                      
                        <td>
 <a href="<?php echo base_url(); ?>User_pengajuan/edit_po?id_purchase=<?php echo $po->id_po; ?>" target="_blank">
                          <?php echo date_indo($po->tgl_transaksi); ?></a></td>
                        <td>
                          
                            
                            <button type="button" class="btn btn-sm btn-warning detail_button" data-id="<?php echo $po->id_po; ?>"><?php echo $po->no_po; ?></button> 
                          </td>
                        <td><?php echo $po->nama_supplier; ?></td>
                        <td><?php echo date_indo($po->tgl_jatuh_tempo); ?></td>
                        <td>
                          <?php
                                     if($po->status_tagihan=='0'){
                                      echo "Paid";
                                     }else{
                                      echo "Open";
                                     }

                          ?>
                        </td>
                        <td>
                          <?php echo number_format($po->sisa_tagihan); ?>
                        </td>
                        <td>
                          <?php if($po->draft=="1"){?>
                               <button class="btn btn-sm btn-danger">Belum</button>
                          <?php }else{ ?>
                              <button class="btn btn-sm btn-warning">Sudah</button>
                          <?php } ?>
                        </td>
                        
                        
                        <td>
                          <?php 
                               $id_po=$po->id_po;
                               
                               $cek_history_terakhir_po=$this->user_pengajuan_model->cek_history_terakhir_po($id_po);
                               
                               

                               foreach($cek_history_terakhir_po as $ow){
                                  $status_approval=$ow->status;
                                  $id_user_approval=$ow->id_user_approval;
                                  $groupid=$ow->groupid;
                               }
                          ?>
                          
                          <?php if($status_approval=='0'){ ?>
                                Menunggu Persetujuan
                          <?php }elseif($status_approval=='1'){ ?>
                                 Disetujui
                          <?php }elseif($status_approval=='2'){ ?>
                                 Ditolak
                          <?php }elseif($status_approval=='3'){ ?>
                                Direvisi
                          <?php } ?>
                           <?php
                             if($status_approval==0){
                              $user=$groupid;
                              $cari_user=$this->user_pengajuan_model->cari_user_group($user);
                             }else{
                              $user=$id_user_approval;
                              $cari_user=$this->user_pengajuan_model->cari_user_approval($user);
                             }
                             
                             echo $cari_user;

                           ?>
                        </td>
                       
                            <?php
                            $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($groupid);
            foreach($select_penerima_baru as $pem){
             $nex_penerima=$pem->id;
             $nex_phone=$pem->phone;
            }
                            ?>
                       
                          <td>
                        <a href="<?php echo base_url(); ?>User_pengajuan/export_purchase_order?id_po=<?php echo $po->id_po; ?>" class="btn btn-sm btn-success">Unduh</a>
                        <?php
                            $id_po=$po->id_po;
                            $groupid=$groupid;
                            $nex_phone="62811208753";
                        ?>
                        <a href="https://wa.me/<?php echo $nex_phone; ?>?text=Anda%20mempunyai%20permintaan%20purchase%20order baru%20Klik%20link ini%20<?php echo base_url(); ?>Purchase_order/keputusan_wa?id_po=<?php echo $id_po.'-'.$groupid.'-'.$nex_phone; ?>%20" class="btn btn-sm btn-success" target="blank">Kirim Link</a>

                        
                        <?php if($status_approval==3){?>
                        <a href="<?php echo base_url(); ?>User_pengajuan/edit_po?id_purchase=<?php echo $po->id_po; ?>" target="_blank" class="btn btn-sm btn-danger">Ubah</a>
                        <?php } ?>
                       </td>

                       </tr>

                   <?php endforeach; ?>
                       </tbody>
                  </table>

                          
                            
                        
                      </div>
                      
                          </div>
                        </form>
            
          </div>    
    		</div>
        <div id="result"></div>
    	</div>
    </div>



  </div>
</div>

<!--

</div>
</div>
</div>
-->
    <script>
      $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
    </script>
    <script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
    };

  /*
    $(document).ready(function(){
        $("#id_gedung").change(function (){
            var url = "<?php echo site_url('Pengajuan/add_ajax_divisi');?>/"+$(this).val();
            $('#id_divisi').load(url);
            return false;
        })      
    });
*/
    $('#item').chosen();


    $("#member").change(function() {
    $("#item").prop("readonly", $(this).is(":checked"));      
    $('#item').prop('disabled',false).trigger("chosen:updated",!$(this).is(":checked"));
    });
     $("#member").change(function() {
     var is_checked = $(this).is(":checked");
     if(is_checked) {
     $('#item').val("").trigger("chosen:updated",$(this).is(":checked"));
     $('#item').prop('disabled', true).trigger("chosen:updated",$(this).is(":checked"));
         
     }
    
});


$(function () {
    $('.3step').change(function () {
        $("label[label_nama='true']").toggle(this.checked);
        $("label[ubah='true']").toggle(this.checked);
        $("input[nama_non='true']").toggle(this.checked);
        $("div[div_nama_vendor='true']").toggle(this.checked);
        $("div[div_tutup_nama_vendor='true']").toggle(this.checked);
    }).change();
});
</script>
<script>
  $(document).ready(function(){
  $('.confirm_delete').on('click', function(){
    
    var delete_url = $(this).attr('href');

    swal({
      title: "Hapus Barang ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Hapus !",
      cancelButtonText: "Batalkan",
      closeOnConfirm: false     
    }, function(){
     
      window.location.href = delete_url;
    });

    return false;
  });
});
</script>

 <script>
      
      function validasi()
    {

        var harga=document.forms["myform"]["harga"].value;

//        validasi question tidak boleh kosong (required)

        if (harga==null || harga=="")
          {
           swal({
                title: "Peringatan!",
                text: "Harga tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        var id_vendor=document.forms["myform"]["id_vendor"].value;

//        validasi id user tidak boleh kosong (required)
        if (id_vendor==null || id_vendor=="")
          {
           swal({
                title: "Peringatan!",
                text: "Supplier tidak boleh kosong!"
            });
          return false;
          };
     }

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

