<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>About Me | Learn Detail About Me</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
  </head>
  <body>

  <?php foreach($detail_pekerjaan as $pek):?>
    <div class="container-fluid">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover"> <!-- Edited -->

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
				<div class="col-md-3">
					<div class="profile-info">
					  <?php if($pek->foto){?>
					  <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pek->foto; ?>" alt="" class="img-responsive profile-photo" />
					<?php } ?>
					  <h3><?php echo $pek->first_name; ?> <?php echo $pek->last_name; ?></h3>
					  <p class="text-muted"><?php echo $pek->nama_jabatan; ?></p>

						  <!--Edit Profile Menu-->
						  <ul class="edit-menu">
							<li><i class="icon ion-ios-information-outline"></i><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Ringkasan Profile</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Profile Singkat</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('organisasi/'.$pek->id);?>">Struktur Organisasi</a></li>
						   
							<li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Kinerja</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Informasi Pribadi</a></li>
					 
						  </ul>

					</div>
				</div>
				<!--
				<div class="col-md-9">
					<ul class="list-inline profile-menu">
						<li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Capaian Individu</a></li>
						<li><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>">Kompetensi</a></li>
						<li><a href="<?php echo site_url('development-items/'.$pek->id);?>">Poin Pengembangan</a></li>
						<li><a href="<?php echo site_url('tujuan-individu-tutup/'.$pek->id);?>">Capaian Individu (Selesai)</a></li>
						<li><a href="<?php echo site_url('penerima-poin-pengembangan/'.$pek->id);?>" class="active">Poin Pengembangan (diterima)</a></li>
					</ul>
				</div>
				-->
            </div>
          </div>
		<?php endforeach; ?>
		<?php foreach($detail_pekerjaan as $pek) :?>
		  <div class="navbar-mobile hidden-lg hidden-md">
			<div class="profile-info">
			  <?php echo $pek->foto; ?>
			  <?php if($pek->foto){ ?>
			  <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pek->foto; ?>" alt="" class="img-responsive profile-photo" />
			<?php } ?>
			  <h4><?php echo $pek->first_name; ?> <?php echo $pek->last_name; ?></h4>
			  <p class="text-muted">Programmer</p>
			</div>
			<div class="mobile-menu">
			  <ul class="list-inline">
				<li><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Summary</a></li>
				<li><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Overview</a></li>
				<li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Performance</a></li>
				<li><a href="edit-profile-work-edu.html">Feedback</a></li>
			  </ul>
			</div>
		  </div>
		</div>
		<?php endforeach; ?>




        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-default hidden-sm hidden-xs">
						  <div class="container-fluid">
							<!--<div class="navbar-header">
							  <a class="navbar-brand" href="#">WebSiteName</a>
							</div>
							-->
							<ul class="nav navbar-nav">
								<!--<li class="active"><a href="#">Home</a></li>-->
								<li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>" class="active">Capaian Individu</a></li>
								<li><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>">Kompetensi</a></li>
								<li><a href="<?php echo site_url('development-items/'.$pek->id);?>">Poin Pengembangan</a></li>
								<!--
								<?php if($id_login==$id_data){ ?>
								<?php } ?>
								-->
								<li><a href="<?php echo site_url('tujuan-individu-tutup/'.$pek->id);?>">Capaian Individu (Selesai)</a></li>
								<!--
								<?php if($id_login==$id_data){ ?>
								<?php } ?>
								-->
								<li class="active"><a href="<?php echo site_url('penerima-poin-pengembangan/'.$pek->id);?>"><strong>Poin Pengembangan (diterima)</strong></a></li>
							</ul>
						  </div>
						</nav>
						
						<nav class="navbar navbar-default hidden-lg hidden-md">
						  <div class="container-fluid">
							<!--<div class="navbar-header">
							  <a class="navbar-brand" href="#">WebSiteName</a>
							</div>
							-->
							<ul class="nav navbar-nav">
								<!--<li class="active"><a href="#">Home</a></li>-->
								<li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>" class="active">Capaian Individu</a></li>
								<li><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>">Kompetensi</a></li>
								<li><a href="<?php echo site_url('development-items/'.$pek->id);?>">Poin Pengembangan</a></li>
								<?php if($id_login==$id_data){ ?>
								<li><a href="<?php echo site_url('tujuan-individu-tutup/'.$pek->id);?>">Capaian Individu (Selesai)</a></li>
								<?php } ?>
								<?php if($id_login==$id_data){ ?>
								<li class="active"><a href="<?php echo site_url('penerima-poin-pengembangan/'.$pek->id);?>"><strong>Poin Pengembangan (diterima)</strong></a></li>
								<?php } ?>
							</ul>
							
						  </div>
						</nav>
					</div>
				</div>
              <div class="row">
                  <h4><b>Poin Pengembangan diterima</b></h4><br>
                  <?php
                  /*

                   <button class="btn btn-secondary send_button" data-toggle="modal" data-target="#SendModal"
              data-id_login="<?php echo $id_login; ?>"
                            >Send Question</button>
                            */
                            ?>
                <table class="table table-striped table-hover table-bordered" id="example2" width="100%">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="15%">Tanggal dibuat</th>
                      <th width="20%">Dibuat oleh</th>
                      <th width="20%">Poin Pengembangan</th>
                      <th width="20%">Informasi Tambahan</th>

                      
                      <th style="text-align: center;">Capaian</th>
                      <th style="text-align: center;">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    $count_feedback=count($development);

                    if($count_feedback > 0) {
                    foreach($development as $feed):
                    ?>
                    <tr>
                      <td align="center"><?php echo $no++; ?></td>
                      <td><?php echo date_indo($feed->tanggal); ?></td>
                      <td><?php echo $feed->first_name; ?> <?php echo $feed->last_name; ?></td>
                      <td>
                        <a href="#myModalBerat1" data-toggle="modal" data-id="<?php echo $feed->development_id; ?>" 
                        data-tambahan="poin"

                          class="edit_button">
                        <?php
                        $sub_kalimatt = substr($feed->development_items,0,10);
                        echo $sub_kalimatt; ?> .. <b>selengkapnya</b>
                      </a>
                      </td>
                      <td>
                        <a href="#myModalBerat1" data-toggle="modal" data-id="<?php echo $feed->development_id; ?>" 
                        data-tambahan="tambahan"

                          class="edit_button">
                        <?php
                        $sub_kalimattt = substr($feed->additional_information,0,10);
                        echo $sub_kalimattt; ?> .. <b>selengkapnya</b>
                      </a>
                      </td>
                      
                      <td align="center">
                           <a href="#myModalBerat1" data-toggle="modal" data-id="<?php echo $feed->development_id; ?>" 
                        data-tambahan="goal"

                          class="edit_button">
                        <?php
                        $sub_kalimattt_goal = substr($feed->goal,0,10);
                        echo $sub_kalimattt_goal; ?> .. <b>selengkapnya</b>
                      </a>
                      </td>
                      <td>

                        <?php if($feed->status_penerima==0){ ?>
                        <button class="btn btn-sm btn-warning saran_button" data-toggle="modal" data-target="#SaranModal"
              data-id_login="<?php echo $feed->id_penerima; ?>"
              data-id_development="<?php echo $feed->development_id; ?>"
              data-id_detail="<?php echo $feed->id_detail; ?>"
                            >Menunggu Persetujuan</button>
                          <?php }elseif($feed->status_penerima==1){ ?>
                                    <button class="btn btn-sm btn-success">Sedang dalam proses</button>
                          <?php }elseif($feed->status_penerima==2){ ?>
                                    <button class="btn btn-sm btn-success">Pending</button>
                          <?php }elseif($feed->status_penerima==3){ ?>
                                    <button class="btn btn-sm btn-success">Selesai</button>
                          <?php } ?>
                      </td>

                    </tr>

                    <?php endforeach; ?>


			<table>
			  <tr>
				<hr>
				<div class="tampildata">
				</div>
			</tr>
			</table>
                    <table border="0">
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         
                       </table>


                   <?php }else{ ?>
                       <tr>
                         <td colspan="7" align="center">Tidak ada data!</td>
                       </tr>
                       <table border="0">
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                         <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                       </table>
                   <?php } ?>
                  </tbody>
                </table>


            
              
             
              </div>
            </div>
           
          </div>
          
        </div>
      </div>
    </div>
	<br><br><br><br><br><br><br>

     <div class="modal fade" id="SaranModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         Persetujuan
            </div>
            <div class="modal-body">
                <form id="myform" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>Profile_Detail/save_approv_poin_pengembangan" enctype="multipart/form-data">
                  
                        <?php
                        $tanggal=date('Y-m-d');
                         ?>
                      

                          <input type="hidden" name="id_login" readonly="" class="form-control id_login">
                           <input type="hidden" name="id_development" readonly="" class="form-control id_development">

                            <input type="hidden" name="id_detail" readonly="" class="form-control id_detail">


                   <div class="form-group">
                        <label>Persetujuan</label>
                       <select class="form-control" name="persetujuan" id="persetujuan">
                        <option value="">Pilih Persetujuan</option>
                           <option value="1">Diterima
                           </option>
                           <option value="7">Ditolak</option>
                       </select>
                  </div>

                     <div class="form-group">
                        <label>Catatan</label>
                        <textarea class="form-control" name="catatan" cols="10" rows="3" placeholder="Catatan"></textarea>
                  </div>
                  
                  
                    
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info"> Simpan </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                
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



<script>
$('#SendModal').on('shown.bs.modal', function () {
  $('.chosen', this).chosen();
});


$('#SendModal').on('shown.bs.modal', function () {
  $('.chosen-select', this).chosen();
});

    $(function () {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "scrollX": false
    });
});



       $(document).on( "click", '.dev_button',function(e) {
        var id_penerima              = $(this).data('id_penerima');
        $(".id_penerima").val(id_penerima);
    });
    
    /*
     $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });

      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });

*/
       $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor3');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });


  $(document).on("click", ".edit_button", function () {
        var myId = $(this).data('id');
        var tambahan = $(this).data('tambahan');
          
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>Profile_Detail/result_penerima',
            data: { ids: myId,tambahan:tambahan},
            success: function(response) {
                $('#result').html(response);
            }
        });
    });  



 $(document).on( "click", '.send_button',function(e) {

        var id_login               = $(this).data('id_login');

        $(".id_login").val(id_login);
    });



// lihat baris 5
function validasi()
    {

        var editor1=document.forms["myform"]["editor1"].value;

//        validasi question tidak boleh kosong (required)

        if (editor1==null || editor1=="")
          {
           swal({
                title: "Peringatan!",
                text: "Kolom kelebihan tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        var editor2=document.forms["myform"]["editor2"].value;

//        validasi id user tidak boleh kosong (required)
        if (editor2==null || editor2=="")
          {
           swal({
                title: "Peringatan!",
                text: "Kolom kekurangan tidak boleh kosong!"
            });
          return false;
          };

       
     }


 function reply_click_feed(clicked_id)
            {
                var id=clicked_id;                
                $('.tampildata').load("<?php echo base_url() ?>Feedback_Manager/replay_question/"+id);
            }


$(document).on( "click", '.saran_button',function(e) {

        var id_login               = $(this).data('id_login');
        var id_development         = $(this).data('id_development');
        var id_detail              = $(this).data('id_detail');
        

        $(".id_login").val(id_login);
        $(".id_development").val(id_development);
        $(".id_detail").val(id_detail);
        
    });

</script>
<script>
  
   function validasi()
    {

        var persetujuan=document.forms["myform"]["persetujuan"].value;

//        validasi question tidak boleh kosong (required)

        if (persetujuan==null || persetujuan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Persetujuan tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5
        
     }
</script>
