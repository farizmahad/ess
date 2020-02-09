<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> History Pegawai <?php foreach($users as $um){
                     echo $um->first_name;
                     echo $um->last_name;

      }?></h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">

                <div>
                    <h4>History Pekerjaan Pegawai</h4>
                </div>
                <div>
                    <br><br>
                    <button type="button" class="btn btn-success btn-sm tambah_button" 
                                data-toggle="modal" data-target="#myyModal"
                                data-id="<?php echo $id_user; ?>">
                                Tambah
                                </button>
                    <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>HRD/detail/<?php echo $id_user; ?>">
                        Refresh
                    </a>

                              

                </div>
                <table class="table table-striped table-hover" id="example2">
     <thead>
       
            <th style="width: 5%;">No</th>
            <th>Tanggal</th>
            <th>Type</th>
            <th>Alasan</th>
            <th>Posisi Baru</th>
            <th>Aksi</th>
       
     </thead>
   <tbody>
    <?php 
    $no=1;
    $count=count($history_job_profile);
    if($count > 0){
    foreach($history_job_profile as $pro):?>
    <tr>
         <td align="center"><?php echo $no++; ?></td>
         <td><?php echo date_indo($pro->date_update); ?></td>
         <td><?php echo $pro->type; ?></td>
         <td>
<a href="#myModalBerat1" data-toggle="modal" data-id="<?php echo $pro->id_history_job; ?>" 
                        data-tambahan="advantages"

                          class="detail_button">
                        <?php

                        $sub_alasan=substr($pro->reason,0,10);
                        echo $sub_alasan;
                        ?> .. <b>selengkapnya</b>
                          </a>
                      </td>
         <td><?php echo $pro->nama_divisi; ?> >> <?php echo $pro->nama_jabatan; ?></td>
         <td>
             <button type="button" class="btn btn-success btn-sm ubah_button" 
                                data-toggle="modal" data-target="#myyModal"
                                data-id_history_job="<?php echo $pro->id_history_job; ?>"
                                data-id_user="<?php echo $pro->id_user; ?>"
                                data-date_update="<?php echo $pro->date_update; ?>"
                                data-type="<?php echo $pro->type; ?>"
                                data-reason="<?php echo $pro->reason; ?>"
                                data-id_jabatan="<?php echo $pro->id_jabatan; ?>"
                                data-id_divisi="<?php echo $pro->id_divisi; ?>"
                                >
                                Ubah
                                </button>
            <a class="btn btn-success btn-sm confirm_delete" type="button" href="<?php echo base_url();?>HRD/hapus_history?id=<?php echo $pro->id_history_job; ?>&id_user=<?php echo $pro->id_user; ?>"> Hapus
    
           </a>
         </td>
    </tr>
  <?php endforeach; ?>
    <?php }else{ ?>

         <td colspan="5" align="center">Tidak ada data!</td>
    <?php } ?>


   </tbody>
  </table>

                </div>

                  
                </div>

              
              </div>
              <div>
                    <h4>History Gaji Pegawai</h4>
                </div>
                <div>
                    <br><br>
                    <button type="button" class="btn btn-success btn-sm tambah_button" 
                                data-toggle="modal" data-target="#myModal"
                                data-id="<?php echo $id_user; ?>">
                                Tambah
                                </button>
                    <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>HRD/detail/<?php echo $id_user; ?>">
                        Refresh
                    </a>

                              

                </div>
                <table class="table table-striped table-hover" id="example2">
     <thead>
       
            <th style="width: 5%;">No</th>
            <th>Tanggal</th>
            <th>Gaji Pokok</th>
            <th>Persen</th>
            <th>Primary Compensation</th>
             <th>Jabatan</th>
             <th>Reason</th>
            <th>Aksi</th>
       
     </thead>
   <tbody>
    <?php 
    $no=1;
    $count_compensation=count($compensation);
    if($compensation > 0){
    foreach($compensation as $com):?>
    <tr>
         <td align="center"><?php echo $no++; ?></td>
         <td><?php echo date_indo($com->date_update); ?></td>
         <td><?php echo $com->currency;echo " "; echo number_format($com->base_pay); ?></td>
         <td><?php echo $com->persent_change; ?> %</td>
         <td><?php echo $com->currency;echo " ";echo number_format($com->primary_compensation); ?></td>
         <td>
             <?php echo $com->nama_jabatan; ?>
         </td>
         <td>
           <a href="#myModalBerat2" data-toggle="modal" data-id="<?php echo $com->id_history_com; ?>" 
                        data-tambahan="advantages"

                          class="reason_button">
                        <?php

                        $sub_alasann=substr($com->reason,0,10);
                        echo $sub_alasann;
                        ?> .. 
                          </a>
         </td>
      
         <td>
             <button type="button" class="btn btn-success btn-sm ubah_compensation_button" 
                                data-toggle="modal" data-target="#myModal"
                                data-id_history_com="<?php echo $com->id_history_com; ?>"
                                data-date_update="<?php echo $com->date_update; ?>"
                                data-reason="<?php echo $com->reason; ?>"
                                data-base_pay="<?php echo $com->base_pay; ?>"
                                data-persent_change="<?php echo $com->persent_change; ?>"
                                data-primary_compensation="<?php echo $com->primary_compensation; ?>"
                                data-currency="<?php echo $com->currency; ?>"
                                data-id_user="<?php echo $com->id_user; ?>"
                                data-id_jabatan="<?php echo $com->id_jabatan; ?>"
                                >
                                Ubah
                                </button>
            <a class="btn btn-success btn-sm confirm_delete2" type="button" href="<?php echo base_url();?>HRD/hapus_compensation?id=<?php echo $com->id_history_com; ?>&id_user=<?php echo $com->id_user; ?>"> Hapus
    
           </a>
         </td>
    </tr>
  <?php endforeach; ?>
    <?php }else{ ?>

         <td colspan="5" align="center">Tidak ada data!</td>
    <?php } ?>


   </tbody>
  </table>

                </div>

                  
                </div>
                    
            
                    
           
          </div>

         
          </div>    
    		</div>
    	</div>
    </div>








   <div class="modal fade" id="myyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">History Pekerjaan Pegawai</h4>
            </div>
            <div class="modal-body">
                <form id="myforma" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>HRD/simpan_history_pekerjaan">



                   <div class="form-group" id="data_1">
                            <label for="firstname"> Tanggal</label>
                           <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control date_update" placeholder="Pilih Tanggal" name="tanggal">
                                </div>
                        </div>

                  <div class="form-group">
                        <label>Posisi Baru</label>
                        <div>
<select class="form-control id_divisi" name="id_divisi" id="fg">
                          <option value="">Pilih Divisi</option>
                          <?php foreach($divisi as $di): ?>
                           <option value="<?php echo $di->id_divisi; ?>"><?php echo $di->nama_divisi; ?></option>
                          <?php endforeach; ?>
                        </select>

                        </div>
                        <br>
                        <div>
                        <select class="form-control id_jabatan" name="id_jabatan" id="id_jabatan">
                          <option value="">Pilih Jabatan</option>
                          <?php foreach($jabatan as $am): ?>
                           <option value="<?php echo $am->id_jabatan; ?>"><?php echo $am->nama_jabatan; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control type" name="type" placeholder="Type" id="type"
                        >
                         <input type="hidden" class="form-control id_user" name="id_user" placeholder="Nama Aturan">
                         <input type="hidden" class="form-control id_history_job" name="id_history_job" placeholder="Nama Aturan">
                    </div>
          
          <div class="form-group">
                        <label>Alasan</label>
                         <textarea class="form-control reason" cols="10" rows="5" name="reason" Placeholder="Alasan" id="alasan"></textarea>
                    </div>
             </div>
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>


   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">History Gaji Pegawai</h4>
            </div>
            <div class="modal-body">
                <form id="myform_m" onSubmit="return validasi_m()" method="post" action="<?php echo base_url();?>HRD/simpan_kompensasi_pekerjaan">

                   <div class="form-group" id="data_2">
                            <label for="firstname"> Tanggal</label>
                           <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control date_update" placeholder="Pilih Tanggal" name="tanggal" id="tanggal">
                                </div>
                        </div>


                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control id_jabatan" name="id_jabatan" id="id_jabatan">
                                 <option value="">Pilih Jabatan</option>
                                 <?php foreach($jabatan as $jab):?>
                                 <option value="<?php echo $jab->id_jabatan ?>"><?php echo $jab->nama_jabatan; ?></option>
                             <?php endforeach; ?>
                            </select>
                            
                        </div>

                  <div class="form-group">
                        <label>Gaji Pokok</label>
                        <div>
                               <input type="text" name="base_pay" class="form-control base_pay" placeholder="Gaji Pokok (Hanya Angka)" id="base_pay" onkeypress="return wajibAngka(event)">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label>Primary Compensation</label>
                        <input type="text" class="form-control primary_compensation" name="primary_compensation" placeholder="Primary Compensation (Hanya Angka)" id="primary_compensation" onkeypress="return wajibAngka(event)">

                         <input type="hidden" class="form-control id_user" name="id_user" placeholder="Nama Aturan">
                         <input type="hidden" class="form-control id_history_com" name="id_history_com" placeholder="Nama Aturan">
                    </div>
          
          <div class="form-group">
                        <label>Alasan</label>
                         <textarea class="form-control reason" cols="10" rows="5" name="reason" Placeholder="Alasan" id="alasan"></textarea>
                    </div>
             </div>
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalBerat1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="addBookDialogBerat">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail</h4>
      </div>

      <form method='post' action='<?php echo base_url();?>order/save_berat'>
      <div class="modal-body">
       <div id="result">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

             
      </div>
       </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModalBerat2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="addBookDialogBerat">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail</h4>
      </div>

      <form method='post' action='<?php echo base_url();?>order/save_berat'>
      <div class="modal-body">
       <div id="result2">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

             
      </div>
       </form>
    </div>
  </div>
</div>
    <!-- Footer
    ================================================= -->
   <script>
 function validasi()
    {

        var fg=document.forms["myforma"]["fg"].value;

//        validasi question tidak boleh kosong (required)

        if (fg==null || fg=="")
          {
           swal({
                title: "Peringatan!",
                text: "Divisi tidak boleh kosong!"
            });
          return false;
          };



        var id_jabatan=document.forms["myforma"]["id_jabatan"].value;

//        validasi question tidak boleh kosong (required)

        if (id_jabatan==null || id_jabatan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Jabatan tidak boleh kosong!"
            });
          return false;
          };



        var type=document.forms["myforma"]["type"].value;

//        validasi question tidak boleh kosong (required)

        if (type==null || type=="")
          {
           swal({
                title: "Peringatan!",
                text: "Type tidak boleh kosong!"
            });
          return false;
          };

          var alasan=document.forms["myforma"]["alasan"].value;

//        validasi question tidak boleh kosong (required)

        if (alasan ==null || alasan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Alasan tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        
     }
</script>
    
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


    $( ".target" ).change(function() {
        val = this.value;

        $.ajax({
            type: "get",
            url: "<?php echo base_url() ?>Masterer/aturan?val="+val,
            data:{},
            success: function(msg){
                window.location = "<?php echo base_url() ?>Masterer/aturan?val="+val;
            }
        })
    })



 $(document).ready(function(){
        $('.confirm_delete2').on('click', function(){
            var delete_url = $(this).attr('href');
            swal({
                title: "Hapus ?",
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

    $(document).ready(function(){
        $('.confirm_delete').on('click', function(){
            var delete_url = $(this).attr('href');
            swal({
                title: "Hapus ?",
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

    $(document).on( "click", '.edit_button',function(e) {
        var id_aturan = $(this).data('id_aturan');
        var nama_aturan = $(this).data('nama_aturan');
        var batas_atas = $(this).data('batas_atas');
        var batas_bawah = $(this).data('batas_bawah');


        $(".id_aturan").val(id_aturan);
        $(".nama_aturan").val(nama_aturan);
        $(".batas_atas").val(batas_atas);
        $(".batas_bawah").val(batas_bawah);

    });


    $('.chosen-select').chosen({width: "100%"});
    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });


function reply_click_feed(clicked_id)
            {
                var id=clicked_id;                
                $('.tampildata').load("<?php echo base_url() ?>HRD/replay/"+id);
            }
      

</script>

<script>
   $(document).on( "click", '.tambah_button',function(e) {
        var id_user = $(this).data('id');
        


        $(".id_user").val(id_user);
    });


     $(document).on( "click", '.ubah_button',function(e) {
        var id_history_job = $(this).data('id_history_job');
        var id_user        = $(this).data('id_user');
        var date_update    = $(this).data('date_update');
        var type           = $(this).data('type');
        var reason         = $(this).data('reason');
        var id_jabatan     = $(this).data('id_jabatan');
        var id_divisi      = $(this).data('id_divisi');


        $(".id_history_job").val(id_history_job);
        $(".id_user").val(id_user);
        $(".date_update").val(date_update);
        $(".type").val(type);
        $(".reason").val(reason);
        $(".id_jabatan").val(id_jabatan);
        $(".id_divisi").val(id_divisi);
    });

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
  </script>
<script>
  $(document).on("click", ".detail_button", function () {
        var myId = $(this).data('id');
        var tambahan = $(this).data('tambahan');


        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>/HRD/result',
            data: { ids: myId,tambahan:tambahan},
            success: function(response) {
                $('#result').html(response);
            }
        });
    });  




   $(document).on("click", ".reason_button", function () {
        var myId = $(this).data('id');
        var tambahan = $(this).data('tambahan');


        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>HRD/result_button',
            data: { ids: myId,tambahan:tambahan},
            success: function(response) {
                $('#result2').html(response);
            }
        });
    });  
</script>
<script>
    function validasi_m()
    {

        var tanggal=document.forms["myform_m"]["tanggal"].value;

//        validasi question tidak boleh kosong (required)

        if (tanggal==null || tanggal=="")
          {
           swal({
                title: "Peringatan!",
                text: "Tanggal tidak boleh kosong!"
            });
          return false;
          };



        var id_jabatan_m=document.forms["myform_m"]["id_jabatan"].value;

//        validasi question tidak boleh kosong (required)

        if (id_jabatan_m==null || id_jabatan_m=="")
          {
           swal({
                title: "Peringatan!",
                text: "Jabatan tidak boleh kosong!"
            });
          return false;
          };



        var base_pay=document.forms["myform_m"]["base_pay"].value;

//        validasi question tidak boleh kosong (required)

        if (base_pay==null || base_pay=="")
          {
           swal({
                title: "Peringatan!",
                text: "Gaji Pokok tidak boleh kosong!"
            });
          return false;
          };

          var primary_compensation=document.forms["myform_m"]["primary_compensation"].value;

//        validasi question tidak boleh kosong (required)

        if (primary_compensation ==null || primary_compensation=="")
          {
           swal({
                title: "Peringatan!",
                text: "Primary Compensation tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

         var alasan=document.forms["myform_m"]["alasan"].value;

//        validasi question tidak boleh kosong (required)

        if (alasan ==null || alasan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Alasan tidak boleh kosong!"
            });
          return false;
          };

//        valida


        
     }
</script>
<script type="text/javascript">
 function wajibAngka(evt) {
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 }
</script>
<script>
  $(document).on( "click", '.ubah_compensation_button',function(e) {

        var id_history_com = $(this).data('id_history_com');
        var date_update    = $(this).data('date_update');

        var reason         = $(this).data('reason');
        var base_pay       = $(this).data('base_pay');
        var persent_change     = $(this).data('persent_change');
        var primary_compensation    = $(this).data('primary_compensation');
        var currency      = $(this).data('currency');
        var id_user      = $(this).data('id_user');
        var id_jabatan      = $(this).data('id_jabatan');

        $(".id_history_com").val(id_history_com);
        $(".date_update").val(date_update);
        $(".reason").val(reason);
        $(".base_pay").val(base_pay);
        $(".persent_change").val(persent_change);
        $(".primary_compensation").val(primary_compensation);
        $(".currency").val(currency);
         $(".id_user").val(id_user);
        $(".id_jabatan").val(id_jabatan);
    });


</script>