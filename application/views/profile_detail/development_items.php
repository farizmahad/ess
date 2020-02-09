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
                        <!--<li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Compensation</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Career</a></li>-->
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
					<li><a href="<?php echo site_url('development-items/'.$pek->id);?>" class="active">Poin Pengembangan</a></li>


					<?php if($id_login==$id_data){?>
					<li><a href="<?php echo site_url('tujuan-individu-tutup/'.$pek->id);?>">Capaian Individu (Selesai)</a></li>

					<li><a href="<?php echo site_url('penerima-poin-pengembangan/'.$pek->id);?>">Poin Pengembangan (diterima)</a></li>
					<?php } ?>
                  <!--
                  <li><a href="">Development Plans</a></li>
                  <li><a href="timeline-about-overview-employee-history.html">Performances Review</a></li>
                  <li><a href="timeline-friends.html">More</a></li>
                
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
								<li><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>">Kompetensi</a></li>
								<li class="active"><a href="<?php echo site_url('development-items/'.$pek->id);?>"><strong>Poin Pengembangan</strong></a></li>
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
								<li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>" class="active">Capaian Individu</a></li>
								<li><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>">Kompetensi</a></li>
								<li class="active"><a href="<?php echo site_url('development-items/'.$pek->id);?>"><strong>Poin Pengembangan</strong></a></li>
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
				
              <div>
                <?php if($id_login==$id_data) { ?>
				<button class="btn btn-success tambah_button" data-toggle="modal" data-target="#VendorModall"                          
					data-id_user="<?php echo $id_login; ?>"
					data-id_line_manajer="<?php echo $id_line_manajer; ?>"
					>Tambah Poin Pengembangan
				</button>
				<br>
			  </div>
			  
			  <br>
				<?php } ?>

              <?php 

              $count_development=count($development);
              if($count_development > 0) {
              foreach($development as $dev):?>
                  <div class="people-nearby">
              <div class="nearby-user">
             
                <div class="row">
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="#" class="profile-link">Poin Pengembangan *</a></h5>
                    <p><?php echo $dev->development_items; ?></p>
                  </div>
                  <?php if($id_login==$id_data) { ?>
                  <div class="col-md-3 col-sm-3">
                  <button class="btn-primary btn-block dev_button" data-toggle="modal" data-target="#EditModal"
                            data-id="<?php echo $dev->development_id; ?>"
                            data-id_user="<?php echo $dev->id_user; ?>"
                            data-development_items="<?php echo $dev->development_items; ?>"
                            data-additional_information="<?php echo $dev->additional_information; ?>"
                            data-parent="<?php echo $dev->parent; ?>"
                            data-status="<?php echo $dev->status; ?>"
                            data-status_penerima="<?php echo $dev->status_penerima; ?>"
                            data-id_line_manajer="<?php echo $dev->id_line_manajer; ?>"
                            data-id_detail="<?php echo $dev->id_detail; ?>"
                            >Ubah</button>
                  </div>
                <?php } ?>
                </div>
              </div>
                
              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="#" class="profile-link">Informasi Tambahan</a></h5>
                    <p><?php echo $dev->additional_information; ?></p>
                  </div>
                </div>
              </div>
                
              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="#" class="profile-link">Capaian Individu terkait</a></h5>
                    <p>
                   
                      <?php echo $dev->goal; ?>
                    </p>
                  </div>
                </div>
              </div>
             
              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="#" class="profile-link">Status * </a></h5>
                    <p>
                    <?php 
                      if($dev->status_penerima==1){
                        echo "Sedang dalam Proses";
                      }elseif($dev->status_penerima==2){
                        echo "Pending";
                      }elseif($dev->status_penerima==3){
                        echo "Selesai";
                      }
                    ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
<?php endforeach; ?>
			<div>
			  <h4 align="center">
			  <a target="_blank" href="<?php echo base_url(); ?>poin-pengembangan-selengkapnya/<?php echo $id_user; ?>">Selengkapnya</a>
			</h4>
			</div>
			<div align="center">
			  <?php
			   if($link){
				echo  $link; 
				}
			   ?> 
			</div>

			<?php }else{ ?>
			<div class="nearby-user">
				<div class="row">
				  <div class="col-md-10 col-sm-10">
					<h5 align="center">Tidak ada data!</h5>
					<p></p>
				  </div>
				</div>
			</div>
              <br><br><br><br><br><br><br><br><br><br><br><br><br>
              <br><br><br><br>
              <br><br><br><br>
<?php } ?>
              
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
             Poin Pengembangan
            </div>
            <div class="modal-body">
                <form id="myform" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>Profile_Detail/save_development" enctype="multipart/form-data">
                  <div class="form-group">
                        <label>Poin Pengembangan</label>
                       <textarea name="development_items" cols="10" rows="3" class="form-control development_items" id="development_items" placeholder="Isi Poin Pengembangan"></textarea> 
                  </div>

                   <div class="form-group">
                        <label>Informasi Tambahan</label>
                         <textarea name="additional_information" cols="10" rows="3" class="form-control additional_information" placeholder="Informasi Tambahan" id="additional_information"></textarea>
                  </div>
                  <div class="form-group">
                        <label>Capaian Individu Terkait</label>
                        <select class="form-control parent" name="parent" id="parent">
                               <option value="">Pilih</option>
                               <?php foreach($goal as $all):?>
                                 <option value="<?php echo $all->id_goal ?>"><?php echo $all->goal; ?></option>
                               <?php endforeach;?>
                        </select>
                       
                  </div>
 
                  <input type="hidden" name="development_id" class="form-control id">
                  <input type="hidden" name="id_user" class="form-control id_user">
                  <input type="hidden" name="id_line_manajer" class="form-control id_line_manajer">
                   
            </div>
            <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-info"> Simpan </button>

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
             Poin Pengembangan
            </div>
            <div class="modal-body">
                <form id="myform_n" onSubmit="return validasi_n()" method="post" action="<?php echo base_url();?>Profile_Detail/save_development" enctype="multipart/form-data">
                  <div class="form-group">
                        <label>Poin Pengembangan</label>
                       <textarea name="development_items" cols="10" rows="3" class="form-control development_items" id="development_items" placeholder="Isi Poin Pengembangan"></textarea> 
                  </div>

                   <div class="form-group">
                        <label>Informasi Tambahan</label>
                         <textarea name="additional_information" cols="10" rows="3" class="form-control additional_information" placeholder="Informasi Tambahan" id="additional_information"></textarea>
                  </div>
                  <div class="form-group">
                        <label>Capaian Individu Terkait</label>
                        <select class="form-control parent" name="parent" id="parent">
                               <option value="">Pilih</option>
                               <?php foreach($goal as $all):?>
                                 <option value="<?php echo $all->id_goal ?>"><?php echo $all->goal; ?></option>
                               <?php endforeach;?>
                        </select>
                       
                  </div>

                   <div class="form-group">
                        <label>Status</label>
                        <select class="form-control status_penerima" name="status_penerima" id="status_penerima">
                                   <option value="">Pilih Status</option>
                                   <option value="1">Sedang dalam proses</option>
                                   <option value="2">Pending</option>
                                   <option value="3">Selesai</option>
                        </select> 
                       
                  </div>
 
                  <input type="hidden" name="development_id" class="form-control id">
                  <input type="hidden" name="id_user" class="form-control id_user">
                  <input type="hidden" name="id_line_manajer" class="form-control id_line_manajer">
                      <input type="hidden" name="id_detail" class="form-control id_detail">
            </div>
            <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-info"> Simpan </button>

                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                
            </div>
            </form>
        </div>
    </div>
</div>

<script>

     $(document).on( "click", '.dev_button',function(e) {
        var id                = $(this).data('id');
        var id_user           = $(this).data('id_user');
        var development_items      = $(this).data('development_items');
        var additional_information          = $(this).data('additional_information');
        var parent   = $(this).data('parent');
        var status   = $(this).data('status');
        var status_penerima   = $(this).data('status_penerima');
        var id_line_manajer   = $(this).data('id_line_manajer');
        var id_detail   = $(this).data('id_detail');




        $(".id").val(id);
        $(".id_user").val(id_user);
        $(".development_items").val(development_items);
        $(".additional_information").val(additional_information);
        $(".parent").val(parent);
        $(".status").val(status);
        $(".status_penerima").val(status_penerima);
        $(".id_line_manajer").val(id_line_manajer);
        $(".id_detail").val(id_detail);

    });



$(document).on( "click", '.tambah_button',function(e) {
        
        var id_user           = $(this).data('id_user');
        var id_line_manajer   = $(this).data('id_line_manajer');
        
        $(".id_user").val(id_user);
        $(".id_line_manajer").val(id_line_manajer);

        

    });
</script>
<script>


  
      function validasi()
    {

        var development_items=document.forms["myform"]["development_items"].value;

//        validasi question tidak boleh kosong (required)

        if (development_items==null || development_items=="")
          {
           swal({
                title: "Peringatan!",
                text: "Poin Pengembangan tidak boleh kosong!"
            });
          return false;
          };



          var parent=document.forms["myform"]["parent"].value;

//        validasi question tidak boleh kosong (required)

        if (parent==null || parent=="")
          {
           swal({
                title: "Peringatan!",
                text: "Capaian Individu Terkait tidak boleh kosong!"
            });
          return false;
          };


          

          
//        validasi question harus mempunyai panjang karakter minimal 5
    
       
     }
</script>
<script>
  
      function validasi_n()
    {

        var development_items=document.forms["myform_n"]["development_items"].value;

//        validasi question tidak boleh kosong (required)

        if (development_items==null || development_items=="")
          {
           swal({
                title: "Peringatan!",
                text: "Poin Pengembangan tidak boleh kosong!"
            });
          return false;
          };



          var parent=document.forms["myform_n"]["parent"].value;

//        validasi question tidak boleh kosong (required)

        if (parent==null || parent=="")
          {
           swal({
                title: "Peringatan!",
                text: "Capaian Individu Terkait tidak boleh kosong!"
            });
          return false;
          };

        var status_penerima=document.forms["myform_n"]["status_penerima"].value;

//        validasi question tidak boleh kosong (required)

        if (status_penerima==null || status_penerima=="")
          {
           swal({
                title: "Peringatan!",
                text: "Status tidak boleh kosong!"
            });
          return false;
          };

          

          
//        validasi question harus mempunyai panjang karakter minimal 5
    
       
     }
</script>
   
    
   