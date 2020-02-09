
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
                        <li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Kinerja</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
                         <li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Informasi Pribadi</a></li>
                 
                 
                      </ul>

                </div>
            </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
                <?php
                
                $group_gm = array('manager');
                if ($this->ion_auth->in_group($group_gm)){ ?>
                   <li><a href="<?php echo site_url('kirim-pertanyaan/'.$pek->id);?>" class="active">History Pertanyaan</a></li>
                <?php } ?>

                <?php if($id_login==$id_penerima_user) { ?>
                    <li><a href="<?php echo site_url('pertanyaan-terima/'.$pek->id);?>">Riwayat Kirim Saran</a></li>

                  <?php } ?>

                 

                <?php/* } */?>
                </ul>
               
              </div>
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
              <div  class="row">
                  <h4><b>History Pertanyaan Feedback yang dibuat</b></h4><br>

                   <button class="btn btn-secondary send_button" data-toggle="modal" data-target="#SendModal"
              data-id_login="<?php echo $id_login; ?>"
                            >Beri pertanyaan</button>
                <table class="table table-striped table-hover table-bordered" id="example2" width="100%">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="20%">Tanggal dibuat</th>
                      <th width="25%">User yang dinilai</th>
                      <th width="35%">Pertanyaan</th>
                      
                      <th style="text-align: center;">Aksi</th>
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
                      <td>
                        <?php echo $feed->first_name; ?> <?php echo " "; ?> <?php echo $feed->last_name; ?>
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
                          <a data-toggle="tab"  id="<?php echo $feed->id_feed_back; ?>" class="client-link" onClick="reply_click_feed(this.id)" style="cursor: pointer;">Detail</a>
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
                         <td colspan="5" align="center">Tidak ada data!</td>
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


     <div class="modal fade" id="VendorModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Send feedback
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Profile_Detail/save_feedback" enctype="multipart/form-data">
                  <div class="form-group">
                        <label>Date</label>
                        <?php
                        $tanggal=date('Y-m-d');
                         ?>
                        <input type="text" name="date" value="<?php echo $tanggal; ?>" readonly="" class="form-control">

                         <input type="hidden" name="id_pengirim" value="<?php echo $id_login; ?>" readonly="" class="form-control">
                  </div>

                   <div class="form-group">
                        <label>Question</label>
                        <select class="form-control" name="question" required="">
                             <option value="">Select Question</option>
                             <?php foreach($question as $que):?>
                            <option value="<?php echo $que->id_question; ?>">
                                 <?php echo $que->question; ?>
                            </option>

                             <?php endforeach; ?>
                        </select>
                  </div>
                  <div class="form-group">
                        <label>Advantages</label>
                      <textarea id="editor1" rows="5" cols="10" name='kelebihan' required=""></textarea> 
                       
                  </div>
  <div class="form-group">
                    <label>Deficiency</label>
                      <textarea id="editor2" rows="5" cols="10" name='kekurangan' required=""></textarea>
                  </div>
                  <input type="hidden" name="id_penerima" class="form-control id_penerima">   
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info"> Send </button>
                <button type="button" class="btn  btn-default" data-dismiss="modal"></button>
                
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



 <div class="modal fade" id="SendModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Beri Pertanyaan
            </div>
            <div class="modal-body">
                <form id="myform" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>Feedback_Manager/save_feedback_question" enctype="multipart/form-data">
                        <input type="hidden" name="date" value="<?php echo $tanggal; ?>" readonly="" class="form-control">
                         <input type="hidden" name="id_pembuat" value="<?php echo $id_login; ?>" readonly="" class="form-control">
                   <div class="form-group">
                        <label>Pertanyaan</label>
                        <textarea class="form-control" name="question" id="editor4" rows="5" cols="10"></textarea>
                  </div>
                  <div class="form-group">
                        <label>User yang dinilai</label>
                        <select data-placeholder="Pilih User" class="form-control chosen" name="id_user" id="id_user">
                          <option value="">Pilih User</option>
                            <?php foreach($users_aktif as $ak):?>
                              <option value="<?php echo $ak->id; ?>">
                                    <?php echo $ak->first_name; ?> <?php echo $ak->last_name; ?>
                              </option>
                            <?php endforeach; ?>
                        </select>
                  </div>
                   <div class="form-group">
                    <label>User penilai</label>
                        <select data-placeholder="Pilih User" class="chosen-select" multiple tabindex="4" name="id_penerima[]" id="id_penerima">
                            <option value="">Pilih User</option>
                            <?php foreach($users_aktif as $aku):?>
                              <option value="<?php echo $aku->id; ?>">
                                    <?php echo $aku->first_name; ?> <?php echo $aku->last_name; ?>
                              </option>
                            <?php endforeach; ?>                           
                         </select><br>
                  </div>
                  <input type="hidden" name="id_login" class="form-control id_login">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info"> Simpan </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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

        $(".id_login").val(id_login);
    });



// lihat baris 5
function validasi()
    {

        var editor3=document.forms["myform"]["editor4"].value;

//        validasi question tidak boleh kosong (required)

        if (editor3==null || editor3=="")
          {
           swal({
                title: "Peringatan!",
                text: "Pertanyaan tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        var id_user=document.forms["myform"]["id_user"].value;

//        validasi id user tidak boleh kosong (required)
        if (id_user==null || id_user=="")
          {
           swal({
                title: "Peringatan!",
                text: "Pilih User untuk dinilai!"
            });
          return false;
          };


        var id_penerima=document.forms["myform"]["id_penerima"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (id_penerima==null || id_penerima=="")
          {
           swal({
                title: "Peringatan!",
                text: "Pilih User yang akan mendapatkan question!"
            });
          return false;
          };
       
     }


 function reply_click_feed(clicked_id)
            {
                var id=clicked_id;                
                $('.tampildata').load("<?php echo base_url() ?>Feedback_Manager/replay_question/"+id);
            }
</script>
