
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>Beranda | Sistem Approval PT. Aartijaya</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
    <link href="<?php echo base_url(); ?>assets/css/emoji.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/css/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/css/datapicker/datepicker3.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
    <link href="<?php echo base_url();?>assets/plugins/css/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/plugins/css/chosen/bootstrap-chosen.css" rel="stylesheet">
  </head>
  <body>
<div>
  <hr>

</div>
<div>
  <h3>History Pekerjaan <?php echo $first_name; ?> <?php echo $last_name; ?></h3>
  <br>

<button type="button" class="btn btn-success btn-sm tambah_button" 
                                data-toggle="modal" data-target="#myyModal"
                                data-id="<?php echo $id_user; ?>"><i class="fa fa-plus"></i>
                                Tambah
                                </button>

                <a href="<?php echo base_url(); ?>masterer/aturan"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
               <br><br>
  <table class="table table-striped table-hover" id="example2">
     <thead>
       
            <th style="width: 5%;">No</th>
            <th>Tanggal</th>
            <th>Type</th>
            <th>Reason</th>
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
         <td><?php echo $pro->reason; ?></td>
         <td>nnan</td>
    </tr>
  <?php endforeach; ?>
    <?php }else{ ?>

         <td colspan="5" align="center">Tidak ada data!</td>
    <?php } ?>


   </tbody>
  </table>
</div>

<div class="modal fade" id="myyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah History Pekerjaan Pegawai</h4>
            </div>
            <div class="modal-body">
                <form id="myforma" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>Masterer/simpan_aturan">

                  <div class="form-group">
                        <label>Posisi Baru</label>
                        <div>
<select class="form-control" name="id_divisi" id="fg">
                          <option value="">Pilih Divisi</option>
                          <?php foreach($divisi as $di): ?>
                           <option value="<?php echo $di->id_divisi; ?>"><?php echo $di->nama_divisi; ?></option>
                          <?php endforeach; ?>
                        </select>

                        </div>
                        <br>
                        <div>
                        <select class="form-control" name="id_jabatan">
                          <option>Pilih Jabatan</option>
                          <?php foreach($jabatan as $am): ?>
                           <option value="<?php echo $am->id_jabatan; ?>"><?php echo $am->nama_jabatan; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" placeholder="Type" id="type"
                        >
                         <input type="text" class="form-control id_user" name="id_user" placeholder="Nama Aturan" id="type">
                    </div>
          
          <div class="form-group">
                        <label>Alasan</label>
                         <textarea class="form-control" cols="10" rows="5" name="reason" Placeholder="Alasan" id="alasan"></textarea>
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



<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Batas Harga</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_aturan">
                    <div class="form-group">
                        <label>Nama Aturan</label>
                        <input type="text" class="form-control nama_aturan" name="nama_aturan" placeholder="Nama Aturan" required oninvalid="this.setCustomValidity('Nama Aturan')" oninput="setCustomValidity('')">
                        <input type="hidden" class="form-control id_aturan" name="id_aturan">
                    </div>
          
          <div class="form-group">
                        <label>Batas Atas</label>
                        <input type="text" class="form-control batas_atas" name="batas_atas" placeholder="Batas Atas" required oninvalid="this.setCustomValidity('Batas Atas')" oninput="setCustomValidity('')">
                    </div>
          
          <div class="form-group">
                        <label>Batas Bawah</label>
                        <input type="text" class="form-control batas_bawah" name="batas_bawah" placeholder="Batas Bawah" required oninvalid="this.setCustomValidity('Batas Bawah')" oninput="setCustomValidity('')">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
   $(document).on( "click", '.tambah_button',function(e) {
        var id_user = $(this).data('id');
        


        $(".id_user").val(id_user);
    });
  </script>

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
        $('.confirm_delete').on('click', function(){
            var delete_url = $(this).attr('data-url');
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
  </script>

