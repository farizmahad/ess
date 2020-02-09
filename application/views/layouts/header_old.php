<?php
 $ID = $this->ion_auth->user()->row()->id;
?>
<!DOCTYPE html>
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

    <header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard"><img src="<?php echo base_url(); ?>assets/images/aarti_jaya_pt_3.png" alt="logo" / width="85" height="35"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <?php 
            if ($this->ion_auth->logged_in()){ ?>
              <li class="dropdown">
              <a href="<?php echo base_url(); ?>beranda">Halaman Utama</a>
              </li>
              <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Permintaan <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu newsfeed-home">
                  <li><a href="<?php echo base_url(); ?>tambah-permintaan">Permintaan Barang Non Dagang</a></li>
                  <!--
                  <li><a href="newsfeed-people-nearby.html">Permintaan Karyawan Baru</a></li>
                  <li><a href="<?php echo base_url(); ?>training">Permintaan Pelatihan Karyawan</a></li>
                  -->
                </ul>



              </li>
              <li class="dropdown"><a href="https://trainingaartijaya.bursasajadah.id/forma" target="_blank">Training</a></li>
               <li class="dropdown"><a href="https://bursasajadah.com:2096" target="_blank">Webmail</a></li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notifikasi 

          <?php
     $count_persetujuan=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
     $count_permintaan=$this->Home_model->count_per_bel_selesai($ID);
    
    $count_total=$count_persetujuan+$count_permintaan;
          ?>
            
					<?php if($count_total){?>
						<span class="badge badge-light"> 
							<?php echo $count_total; ?> 
						</span>
					<?php }else{}?>
					<span><img src="images/down-arrow.png" alt="" /></span>
				</a>
				<ul class="dropdown-menu page-list">
				  <li>
					<a href="<?php echo base_url(); ?>daftar-permintaan">Daftar Permintaan 
						<?php if($count_permintaan){?>
						<span class="badge badge-light"> 
							<?php echo $count_permintaan; ?> 
						</span>
						<?php }else{}?>
					</a>
				  </li>
				  <li>
					<a href="<?php echo base_url(); ?>daftar-persetujuan">Daftar Persetujuan
						<?php if($count_persetujuan){?>
						<span class="badge badge-light"> 
							<?php echo $count_persetujuan; ?> 
						</span>
						<?php }else{}?>
					</a>
				   </li>
				</ul>
			</li>
			
			<li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                   <li><a href="<?php echo base_url(); ?>lihat-akun">Lihat Akun</a></li>
                  <li><a href="<?php echo base_url(); ?>ubah-kata-sandi">Pengaturan Akun</a></li>
                  <li><a href="<?php echo base_url(); ?>struktur-organisasi">Struktur organisasi</a></li>
                  <li><a href="<?php echo base_url(); ?>logout">Keluar</a></li>

                </ul>
              </li>
            <?php }else{ ?>

<li class="dropdown"><a href="<?php echo base_url(); ?>login">login</a></li>
            <?php } ?>
             			

            </ul>
            <form class="navbar-form navbar-right hidden-sm" method="GET" action="<?php echo base_url(); ?>Dashboard/search_user">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Cari..." size="25" name="search">
                
              </div>
            </form>
            <br>
          </div>
        </div>
      </nav>
    </header>

    


 

    <!--Header End-->
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>



    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/js/dataTables/datatables.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/js/datapicker/bootstrap-datepicker.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/plugins/js/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/js/chosen/chosen.jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 