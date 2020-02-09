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
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
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
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Kinerja</a></li>
                        <li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
                         <li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Informasi Pribadi</a></li>
                 
                      </ul>

                </div>
            </div>
			<!--
			<div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>

                <?php
                /*
                $group_gm = array('manager');
                if ($this->ion_auth->in_group($group_gm)){ ?>
                   <li><a href="<?php echo site_url('pertanyaan');?>">Pertanyaan</a></li>
                <?php } */?>

               <?php 
               $group_gm = array('manager');
                if ($this->ion_auth->in_group($group_gm)){ ?>
                <li><a href="<?php echo site_url('kirim-pertanyaan/'.$pek->id);?>">History Pertanyaan</a></li>
              <?php } ?>

				<?php if($id_login==$id_penerima_user) { ?>
                 <li><a href="<?php echo site_url('pertanyaan-terima/'.$pek->id);?>" class="active">Riwayat Kirim Saran</a></li>
               <?php } ?>

                </ul>
               
              </div>-->
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
                <li><a href="<?php echo base_url(); ?>ringkasan-profile">Summary</a></li>
                <li><a href="edit-profile-work-edu.html">Overview</a></li>
                <li><a href="edit-profile-work-edu.html">Performance</a></li>
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
								<li><a href="<?php echo site_url('feedback/'.$pek->id);?>"><strong>Saran</strong></a></li>
								<?php
								/*
								$group_gm = array('manager');
								if ($this->ion_auth->in_group($group_gm)){ ?>
								<li><a href="<?php echo site_url('pertanyaan');?>">Pertanyaan</a></li>
								<?php } */?>

								<?php 
								$group_gm = array('manager');
								if ($this->ion_auth->in_group($group_gm)){ ?>
								<li class="active"><a href="<?php echo site_url('kirim-pertanyaan/'.$pek->id);?>"><strong>History Pertanyaan</strong></a></li>
								<?php } ?>

								<?php if($id_login==$id_penerima_user) { ?>
								<li class="active"><a href="<?php echo site_url('pertanyaan-terima/'.$pek->id);?>" class="active"><strong>Riwayat Kirim Saran</strong></a></li>
								<?php } ?>
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
								<li><a href="<?php echo site_url('feedback/'.$pek->id);?>"><strong>Saran</strong></a></li>
								<?php
								/*
								$group_gm = array('manager');
								if ($this->ion_auth->in_group($group_gm)){ ?>
								<li><a href="<?php echo site_url('pertanyaan');?>">Pertanyaan</a></li>
								<?php } */?>

								<?php 
								$group_gm = array('manager');
								if ($this->ion_auth->in_group($group_gm)){ ?>
								<li class="active"><a href="<?php echo site_url('kirim-pertanyaan/'.$pek->id);?>"><strong>History Pertanyaan</strong></a></li>
								<?php } ?>

								<?php if($id_login==$id_penerima_user) { ?>
								<li class="active"><a href="<?php echo site_url('pertanyaan-terima/'.$pek->id);?>" class="active"><strong>Riwayat Kirim Saran</strong></a></li>
								<?php } ?>
							</ul>
							
						  </div>
						</nav>
					</div>
				</div>
				
              <div  class="row">
                  <h4><b>Riwayat Kirim Saran</b></h4><br>

                  <button class="btn btn-success send_button" data-toggle="modal" data-target="#SenddModal"
              data-id_login="<?php echo $id_login; ?>"
                            >Kirim Saran</button>
                            <br>
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
                      <th width="20%">User yang dinilai</th>
                         <th>Dibagikan kepada</th>
                      <th width="20%">Pertanyaan</th>

                      
                      <th style="text-align: center;">Aksi</th>
                      <th style="text-align: center;">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    $count_feedback=count($question_feed_back);

                    if($count_feedback > 0) {
                    foreach($question_feed_back as $feed):
                    ?>
                    <tr>
                      <td align="center"><?php echo $no++; ?></td>
                      <td><?php echo date_indo($feed->date_feed_back); ?></td>
                      <td><?php echo $feed->first_name; ?> <?php echo $feed->last_name; ?></td>
                      <td>
                        <?php
                              $id_user_dinilai=$feed->id_user;
                              $user_nilai=$this->Profile_detail_model->get_users($id_user_dinilai);
                              foreach($user_nilai as $nil){

                                echo $nil->first_name; echo " "; echo $nil->last_name;
                              }
                        ?>
                      </td>
                      <td>
                          <?php if($feed->status_privasi==0){
                            echo "Publik";
                          }elseif($feed->status_privasi==1){
                            echo "Share Personal";

                          }elseif($feed->status_privasi==2){
                            echo "Manager/Atasan";
                          }
                          ?>

                      </td>
                      <td>
                        <a href="#myModalBerat1" data-toggle="modal" data-id="<?php echo $feed->id_feed_back; ?>" 
                        data-tambahan="question"

                          class="edit_button">
                        <?php
                        $sub_kalimat = substr($feed->question,0,10);
                        echo $sub_kalimat; ?> .. <b>selengkapnya</b>
                      </a>
                      </td>
                      
                      <td align="center">
                          <a data-toggle="tab"  id="<?php echo $feed->id_feed_back; ?>" class="btn btn-sm btn-danger client-link" onClick="reply_click_feed(this.id)" style="cursor: pointer;" >Detail</a>
                      </td>
                      <td>
                        <?php if($feed->status==0){ ?>
                        <button class="btn btn-sm btn-warning saran_button" data-toggle="modal" data-target="#SaranModal"
              data-id_login="<?php echo $id_login; ?>"
              data-question="<?php echo $feed->question; ?>"
              data-id_feed_back="<?php echo $feed->id_feed_back; ?>"
              data-id_detail_feed_back="<?php echo $feed->id_detail_feed_back; ?>"
                            >Belum diisi</button>
                          <?php }else{ ?>
                                    <button class="btn btn-sm btn-success">Sudah</button>
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
             Beri Saran
            </div>
            <div class="modal-body">
                <form id="myform" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>Profile_Detail/update_feed_back" enctype="multipart/form-data">
                  
                        <?php
                        $tanggal=date('Y-m-d');
                         ?>
                        <input type="hidden" name="date" value="<?php echo $tanggal; ?>" readonly="" class="form-control">

                         <input type="hidden" name="id_pengirim" value="<?php echo $id_login; ?>" readonly="" class="form-control">

                          <input type="hidden" name="id_feed_back" readonly="" class="form-control id_feed_back">
                 
                  <input type="hidden" name="id_detail_feed_back" readonly="" class="form-control id_detail_feed_back">

                   <div class="form-group">
                        <label>Pertanyaan</label>
                        <textarea class="form-control question" disabled=""></textarea>
                  </div>
                  <div class="form-group">
                        <label>Kelebihan</label>
                      <textarea id="editor1" rows="3" cols="10" name='kelebihan'  class="form-control"></textarea> 
                       
                  </div>
  <div class="form-group">
                    <label>Kekurangan</label>
                      <textarea id="editor2" rows="3" cols="10" name='kekurangan'  class="form-control"></textarea>
                  </div>

                     <div class="form-group">
                    <label>Dibagikan kepada</label>
                       <select class="form-control" name="status_privasi" id="status_privasi">
                          <option value="">Pilih</option>
                          <option value="0">Publik</option>
                          <option value="1">Share Personal</option>
                          <option value="2">Manager (Atasan)</option>
                       </select>
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

<div class="modal fade" id="SenddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Beri Saran
            </div>
            <div class="modal-body">
                <form id="myform_s" onSubmit="return validasi_s()" method="post" action="<?php echo base_url();?>Profile_Detail/kirim_saran" enctype="multipart/form-data">
                  
                        <?php
                        $tanggal=date('Y-m-d');
                         ?>
                        <input type="hidden" name="id_pembuat" class="form-control id_pembuat">

                      <input type="hidden" name="date_feed_back" value="<?php echo $tanggal; ?>">


                    <div class="form-group">
                        <label>Kepada</label>
                        <select class="form-control chosenn" name="id_user" id="id_user">
                        <option value="">Pilih User</option>
                        <?php foreach($users_aktif as $ak):?>
                         <option value="<?php echo $ak->id; ?>"><?php echo $ak->first_name; ?> <?php echo $ak->last_name; ?></option>

                        <?php endforeach; ?>
                      </select>
                  </div>
                   <div class="form-group">
                        <label>Perihal</label>
                        <textarea class="form-control" name="question"></textarea>
                  </div>
                  <div class="form-group">
                        <label>Kelebihan</label>
                      <textarea id="kelebihan" rows="3" cols="10" name='kelebihan'  class="form-control"></textarea> 
                       
                  </div>
  <div class="form-group">
                    <label>Kekurangan</label>
                      <textarea id="kekurangan" rows="3" cols="10" name='kekurangan'  class="form-control"></textarea>
                  </div>
                    

                    <div class="form-group">
                    <label>Dibagikan kepada</label>
                       <select class="form-control" name="status_privasi" id="status_privasi">
                          <option value="">Pilih</option>
                          <option value="0">Publik</option>
                          <option value="1">Share Personal</option>
                          <option value="2">Manager (Atasan)</option>
                       </select>
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
            url: '<?php echo base_url(); ?>/Feedback_Manager/result',
            data: { ids: myId,tambahan:tambahan},
            success: function(response) {
                $('#result').html(response);
            }
        });
    });  



 $(document).on( "click", '.send_button',function(e) {

        var id_login               = $(this).data('id_login');

        $(".id_pembuat").val(id_login);
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
        var question               = $(this).data('question');
        var id_feed_back           = $(this).data('id_feed_back');
        var id_detail_feed_back    = $(this).data('id_detail_feed_back');

        $(".id_login").val(id_login);
        $(".question").val(question);
        $(".id_feed_back").val(id_feed_back);
        $(".id_detail_feed_back").val(id_detail_feed_back);
    });


$('#SenddModal').on('shown.bs.modal', function () {
  $('.chosenn', this).chosen();
});


function validasi_s()
    {

        var id_user=document.forms["myform_s"]["id_user"].value;

//        validasi question tidak boleh kosong (required)

        if (id_user==null || id_user=="")
          {
           swal({
                title: "Peringatan!",
                text: "User yang dinilai tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        
      var kelebihan=document.forms["myform_s"]["kelebihan"].value;

//        validasi question tidak boleh kosong (required)

        if (kelebihan==null || kelebihan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Kelebihan tidak boleh kosong!"
            });
          return false;
          };

      var kekurangan=document.forms["myform_s"]["kekurangan"].value;

//        validasi question tidak boleh kosong (required)

        if (kekurangan==null || kekurangan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Kekurangan tidak boleh kosong!"
            });
          return false;
          };


      var status_privasi=document.forms["myform_s"]["status_privasi"].value;

//        validasi question tidak boleh kosong (required)

        if (status_privasi==null || status_privasi=="")
          {
           swal({
                title: "Peringatan!",
                text: "Dibagikan kepada tidak boleh kosong!"
            });
          return false;
          };



       
     }

</script>
