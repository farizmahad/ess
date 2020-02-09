
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
                        <li><i class="icon ion-ios-information-outline"></i><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Summary</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Overview</a></li>
                       
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="">Performance</a></li>
                        <li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('feedback/'.$pek->id);?>">Feedback</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Personal</a></li>
                 
                      </ul>

                </div>
            </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="<?php echo site_url('feedback/'.$pek->id);?>" class="active">Saran yang Diterima</a></li>
                  <!--
                  <li><a href="timeline-about.html">Management Chain</a></li>
                  <li><a href="timeline-album.html">Organizations</a></li>
                  <li><a href="timeline-friends.html">Timeline</a></li>
                -->
                 
                  <!--
                  <li><a href="timeline-friends.html">Manager History</a></li>
                  <li><a href="timeline-friends.html">Worker History</a></li>
                -->
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
                  <h4><b>Saran yang Diterima</b></h4>  
                <table class="table table-bordered" id="example2" width="100%">
                  <thead>
                    <tr>
                     
                      <th width="20%">Tanggal</th>
                      <th width="20%">Dari</th>
                      <th width="38%">Pertanyaan</th>
                      <th width="22%">Saran</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $count_feedback=count($feedback);

                    if($count_feedback > 0) {
                    foreach($feedback as $feed):
                     $id_penerima=$feed->id_penerima;
                    ?>
                    <tr>
                     
                      <td><?php echo date_indo($feed->tanggal_kirim); ?></td>
                      <td>
                        <?php echo $feed->first_name; ?> <?php echo " "; ?> <?php echo $feed->last_name; ?>
                      </td>
                      <td>
                        <a href="#myModalBerat1" data-toggle="modal" data-id="<?php echo $feed->id_feedback; ?>" 
                        data-tambahan="question"

                          class="edit_button">
                        <?php
                        $sub_kalimat = substr($feed->question,0,18);
                        echo $sub_kalimat; ?> .. <b>selengkapnya</b>
                      </a>
                      </td>
                      <td>  
                       <a href="#myModalBerat1" data-toggle="modal" data-id="<?php echo $feed->id_feedback; ?>" 
                        data-tambahan="advantages"

                          class="edit_button">
                        <?php

                        $sub_kelebihan=substr($feed->kelebihan,0,18);

                        echo "+" ;echo $sub_kelebihan; ?><br/>
                            <?php
                            $sub_kekurangan=substr($feed->kekurangan,0,18);
                            echo " -"; echo $sub_kekurangan; ?> .. <b>selengkapnya</b>
                          </a>
                      </td>    
                    </tr>

                    <?php endforeach; ?>
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
                       </table>
                   <?php } ?>
                  </tbody>
                </table>
              <div class="clearfix"></div>
             

             <button class="btn btn-secondary dev_button" data-toggle="modal" data-target="#VendorModall"
              data-id_penerima="<?php echo $id_penerima_user; ?>"
                            >Kirim Saran</button>
              
             
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
             Kirim Saran
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
                        <label>Pertanyaan</label>
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
                        <label>Kelebihan</label>
                      <textarea id="editor1" rows="5" cols="10" name='kelebihan' required=""></textarea> 
                       
                  </div>
  <div class="form-group">
                    <label>Kekurangan</label>
                      <textarea id="editor2" rows="5" cols="10" name='kekurangan' required=""></textarea>
                  </div>
                  <input type="hidden" name="id_penerima" class="form-control id_penerima">
                  
                   
            </div>
            <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-info"> Kirim </button>

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
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>

             
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
        "scrollX": false
    });
});



       $(document).on( "click", '.dev_button',function(e) {
        var id_penerima              = $(this).data('id_penerima');
        $(".id_penerima").val(id_penerima);
    });
    </script>
    <script>
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
</script>
<script>

  $(document).on("click", ".edit_button", function () {
        var myId = $(this).data('id');
        var tambahan = $(this).data('tambahan');

       
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>/Profile_Detail/result',
            data: { ids: myId,tambahan:tambahan},
            success: function(response) {
                $('#result').html(response);
            }
        });
    });  




</script>
   