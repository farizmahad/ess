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
                        <!--<li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Compensation</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Career</a></li>-->
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
                  <li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>" >Capaian Individu</a></li>
                  <li><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>" class="active">Kompetensi</a></li>
                  <li><a href="<?php echo site_url('development-items/'.$pek->id);?>">Poin Pengembangan</a></li>
                  <?php if($id_login==$id_data){ ?>
                  <li><a href="<?php echo site_url('tujuan-individu-tutup/'.$pek->id);?>">Capaian Individu (Selesai)</a></li>
                <?php } ?>
                <?php if($id_login==$id_data){ ?>
                   <li><a href="<?php echo site_url('penerima-poin-pengembangan/'.$pek->id);?>">Poin Pengembangan (diterima)</a></li>
                 <?php } ?>
                 
                </ul>
              </div>
			  -->
            </div>
          </div>
          <?php endforeach; ?>
   <?php foreach($detail_pekerjaan as $pek) :?>
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <!--<?php echo $pek->foto; ?>-->
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
                <li><a href="edit-profile-work-edu.html">Performa</a></li>
                <li><a href="edit-profile-work-edu.html">Feedback</a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php endforeach; ?>


        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8">
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
								<li class="active"><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>"><strong>Kompetensi</strong></a></li>
								<li><a href="<?php echo site_url('development-items/'.$pek->id);?>">Poin Pengembangan</a></li>
								<?php if($id_login==$id_data){ ?>
								<li><a href="<?php echo site_url('tujuan-individu-tutup/'.$pek->id);?>">Capaian Individu (Selesai)</a></li>
								<?php } ?>
								<?php if($id_login==$id_data){ ?>
								<li><a href="<?php echo site_url('penerima-poin-pengembangan/'.$pek->id);?>">Poin Pengembangan (diterima)</a></li>
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
								<!--<li class="active"><a href="#">Home</a></li>-->
								<li class="active"><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>" class="active"><strong>Capaian Individu</strong></a></li>
								<li><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>">Kompetensi</a></li>
								<li><a href="<?php echo site_url('development-items/'.$pek->id);?>">Poin Pengembangan</a></li>
								<?php if($id_login==$id_data){ ?>
								<li><a href="<?php echo site_url('tujuan-individu-tutup/'.$pek->id);?>">Capaian Individu (Selesai)</a></li>
								<?php } ?>
								<?php if($id_login==$id_data){ ?>
								<li><a href="<?php echo site_url('penerima-poin-pengembangan/'.$pek->id);?>">Poin Pengembangan (diterima)</a></li>
								<?php } ?>
							</ul>
							
						  </div>
						</nav>
					</div>
				</div>
              <!-- About
              ================================================= -->
              <div class="about-profile">
                  <div class="about-content-block">
                      <h4 class="grey">Kompetensi (<?php echo count($competencies); ?> buah)</h4> 
                  <table class="table table-bordered" id="example2">
                      <thead>
                        <tr>
                          <th scope="col">Kompetensi</th>
                          <th scope="col">Kategori</th>
                          <th scope="col">Peringkat yang Telah Dicapai</th>
                          <th scope="col"></th>

                           <?php /*foreach($competencies as $cos){

                              $id_line_manajer=$cos->id_line_manajer;
                           }
                           */
                           ?>

                          <?php /*if($id_line_manajer == $id_login) */ ?>

                          <?php if($id_login==$id_data){ ?>
                          <th scope="col">Aksi</th>
                        <?php } ?>
                        <?php/* } */?>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         $count_competencies=count($competencies);
                         if($count_competencies > 0) {
                         foreach($competencies as $com):
                           $uu=$com->user_id;
                           $id_line_manajer=$com->id_line_manajer;
                                           
                          ?>
                        <tr>
                          <td><?php echo $com->competencies; ?></td>
                          <td><?php echo $com->category; ?></td>
                          <td><?php echo "Level"; echo " ";echo $com->assessed_rating; ?></td>
                          <td>-</td>
                          <?php /*if($id_line_manajer==$id_login) { */?>

                            <?php if($id_login==$id_data){?>
                          <td><button class="btn btn-success nota_button" data-toggle="modal" data-target="#VendorModall"
                            data-id="<?php echo $com->id_competencies; ?>"
                            data-id_user="<?php echo $com->id_user; ?>"
                            data-competencies="<?php echo $com->competencies; ?>"
                            data-category="<?php echo $com->category; ?>"
                            data-assessed_rating="<?php echo $com->assessed_rating; ?>"
                            >Ubah</button></td>
                        <?php /*} */?>
                      <?php } ?>
                        </tr>
                        <?php endforeach; ?>

                      <?php }else{ ?>
                           <tr>
                             <td colspan="6" align="center">Tidak ada data!</td>
                           </tr>

                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                      <?php/* if($id_line_manajer==$id_login) { */?>
                  <div class="about-content-block">
                    <table class="table">
                      <tbody>
                     <?php if($id_login==$id_data){?>
                        <tr>
                          <td><button class="btn btn-success add_button" data-toggle="modal" data-target="#MyModal" data-id_user="<?php echo $id_login; ?>">Tambah</button></td>

                          
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                   <?php/* }*/ ?>
              </div>
            </div>
        
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>

<div class="modal fade" id="VendorModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Ubah Kompetensi
            </div>
            <div class="modal-body">
                <form  id="myform_m" onSubmit="return validasi_m()" method="post" action="<?php echo base_url();?>Profile_Detail/save_competencies" enctype="multipart/form-data">
                  <div class="form-group">
                        <label>Kompetensi</label>
                       <textarea name="competencies" cols="10" rows="3" class="form-control competencies" id="competencies"></textarea> 
                  </div>

                   <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control category" name="category" placeholder="Category" id="category">
                  </div>
                  <div class="form-group">
                        <label>Peringkat yang Telah Dicapai</label>
                       <select class="form-control assessed_rating" name="assessed_rating" id="assessed_rating">
                          <option value="">Pilih</option>
                          <option value="1">Level 1</option>
                          <option value="2">Level 2</option>
                          <option value="3">Level 3</option>
                           <option value="4">Level 4</option>
                          <option value="5">Level 5</option>
                        </select> 
                  </div>

                    <input type="hidden" class="form-control id" name="id_competencies" placeholder="Nama Jabatan">
                    <input type="hidden" class="form-control id_user" name="id_user" placeholder="Nama Jabatan">
                   
            </div>
            <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-info"> Edit </button>

                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                
            </div>
            </form>
        </div>
    </div>
</div>

    
   
<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Tambah Kompetensi
            </div>
            <div class="modal-body">
                <form id="myform" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>Profile_Detail/save_competencies" enctype="multipart/form-data">
                  <div class="form-group">
                        <label>Kompetensi</label>
                       <textarea name="competencies" cols="10" rows="3" class="form-control" id="competencies"></textarea> 
                  </div>

                   <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" name="category" placeholder="Kategori" id="category">
                  </div>
                  <div class="form-group">
                        <label>Peringkat yang Telah Dicapai</label>
                        <select class="form-control" name="assessed_rating" id="assessed_rating">
                          <option value="">Pilih</option>
                          <option value="1">Level 1</option>
                          <option value="2">Level 2</option>
                          <option value="3">Level 3</option>
                           <option value="4">Level 4</option>
                          <option value="5">Level 5</option>
                        </select>
                       
                  </div>

                    <input type="hidden" class="form-control id_user" name="id_user" placeholder="Nama Jabatan">
                   
            </div>
            <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-info"> Tambah </button>

                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                
            </div>
            </form>
        </div>
    </div>
</div>

    <!-- Scripts
    ================================================= -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
    
  </body>
</html>
<script>
  $(document).on( "click", '.nota_button',function(e) {
        var id                = $(this).data('id');
        var id_user           = $(this).data('id_user');
        var competencies      = $(this).data('competencies');
        var category          = $(this).data('category');
        var assessed_rating   = $(this).data('assessed_rating');

        $(".id").val(id);
        $(".id_user").val(id_user);
        $(".competencies").val(competencies);
        $(".category").val(category);
        $(".assessed_rating").val(assessed_rating);
    });



   $(document).on( "click", '.add_button',function(e) {
       
        var id_user           = $(this).data('id_user');
        $(".id_user").val(id_user);
        
    });



  function validasi()
    {

        var competencies=document.forms["myform"]["competencies"].value;

//        validasi question tidak boleh kosong (required)

        if (competencies==null || competencies=="")
          {
           swal({
                title: "Peringatan!",
                text: "Kompetensi tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        var category=document.forms["myform"]["category"].value;

//        validasi id user tidak boleh kosong (required)
        if (category==null || category=="")
          {
           swal({
                title: "Peringatan!",
                text: "Kategori tidak boleh kosong!"
            });
          return false;
          };


        var assessed_rating=document.forms["myform"]["assessed_rating"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (assessed_rating==null || assessed_rating=="")
          {
           swal({
                title: "Peringatan!",
                text: "Peringkat yang dicapai  tidak boleh kosong!"
            });
          return false;
          };



         
       
       
       
     }



     function validasi_m()
    {

        var competencies=document.forms["myform_m"]["competencies"].value;

//        validasi question tidak boleh kosong (required)

        if (competencies==null || competencies=="")
          {
           swal({
                title: "Peringatan!",
                text: "Kompetensi tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        var category=document.forms["myform_m"]["category"].value;

//        validasi id user tidak boleh kosong (required)
        if (category==null || category=="")
          {
           swal({
                title: "Peringatan!",
                text: "Kategori tidak boleh kosong!"
            });
          return false;
          };


        var assessed_rating=document.forms["myform_m"]["assessed_rating"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (assessed_rating==null || assessed_rating=="")
          {
           swal({
                title: "Peringatan!",
                text: "Peringkat yang dicapai  tidak boleh kosong!"
            });
          return false;
          };



         
       
       
       
     }







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
</script>


