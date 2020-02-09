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
					<div class="col-md-4">
						<div class="profile-info">
							<?php if($pek->foto){?>
								<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pek->foto; ?>" class="img-responsive profile-photo" />
							<?php } ?>
							<h3><?php echo $pek->first_name; ?> <?php echo $pek->last_name; ?></h3>
							<p class="text-muted"><?php echo $pek->nama_jabatan; ?></p>
							  <!--Edit Profile Menu-->
							  <ul class="edit-menu">
								<li><i class="icon ion-ios-information-outline"></i><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Ringkasan Profile</a></li>
								<li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Profile Singkat</a></li>
								<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('organisasi/'.$pek->id);?>">Struktur Organisasi</a></li>
								<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Kinerja</a></li>
								<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
								<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Informasi Pribadi</a></li>
						 
							  </ul>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

			<?php foreach($detail_pekerjaan as $pek) :?>
			<div class="navbar-mobile hidden-lg hidden-md">
				<div class="profile-info">
				  <!--<//?php echo $pek->foto; ?>-->
					<?php if($pek->foto){ ?>
					<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pek->foto; ?>" alt="" class="img-responsive profile-photo" />
					<?php } ?>
					<h4><?php echo $pek->first_name; ?> <?php echo $pek->last_name; ?></h4>
					<p class="text-warning"><?php echo $pek->nama_jabatan; ?></p>
				</div>
				<div class="mobile-menu">
					<ul class="list-inline">
						<li><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Ringkasan Profile</a></li>
						<li><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Profile Singkat</a></li>
						<li><a href="<?php echo site_url('organisasi/'.$pek->id);?>">Struktur Organisasi</a></li>
						<li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Kinerja</a></li>
						<li><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
						<li><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Informasi Pribadi</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>



		<?php foreach($detail_pekerjaan as $ker):?>
		<div id="page-contents">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<nav class="navbar navbar-default">
									<div class="container-fluid">
										<!--<div class="navbar-header">
										  <a class="navbar-brand" href="#">WebSiteName</a>
										</div>
										-->
										<ul class="nav navbar-nav">
											<!--<li class="active"><a href="#">Home</a></li>-->
											<li align="center"class="active"><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>" class="active"><strong>Detil Pekerjaan</strong></a></li>
											<li align="center"><a href="<?php echo site_url('history-pegawai/'.$pek->id);?>">History Pegawai</a></li>
											
										</ul>
									</div>
								</nav>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="about-profile">
									<div class="about-content-block">
									 <div class="row">
										<div class="col-md-12">
											<div class="about-content-block">
												 <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Informasi Pegawai</h4>
												  <table class="table">
													  <thead>
													  </thead>
													  <tbody>
														<?php if($pek->ID_pegawai) { ?>
														<tr>
														  <th scope="row">Employee ID</th>
														  <td><?php echo $pek->ID_pegawai; ?></td>
														</tr>
													  <?php } ?>
														<tr>
														  <th scope="row">Organisasi</th>
														  <td>

														  <?php if($pek->id_line_manajer==0){ ?>
															 PT. Aartijaya (Wida Budiman) 
														  <?php  }else{   ?>
															  PT. Aartijaya (Wida Budiman) >> 
															  <?php echo $pek->nama_divisi; ?>
															  <?php 
															  $id_manajer=$pek->id_line_manajer;
															  $manajer=$this->Profile_detail_model->get_users($id_manajer); 
															  foreach($manajer as $jer){
																echo "("; echo $jer->first_name; echo $jer->last_name; echo ")";
															  }
															  ?>
															  
														  <?php } ?>
														  </td>
														</tr>
														  <tr>
														  <th scope="row">Posisi</th>
														  <td><?php echo $pek->nama_jabatan; ?></td>
														</tr>
														  <tr>
														  <th scope="row">Business Title</th>
														  <td><?php echo $pek->nama_jabatan; ?></td>
														</tr>
														  <tr>
														  <th scope="row">Status Kepegawaian</th>
														  <td>Kontrak</td>
														</tr>
														  <tr>
														  <th scope="row">FTE</th>
														  <td>
															<?php echo $pek->fte; ?>
														  </td>
														</tr>
														  <tr>
														  <th scope="row">Lokasi</th>
														  <td><i class="ion-ios-location-outline icon-in-title"></i>&nbsp; &nbsp; <?php echo  $pek->nama_gedung; ?></td>
														</tr>
														  <tr>
														  <th scope="row">Mulai Bekerja</th>
														  <td><?php echo date_indo($pek->tanggal_masuk); ?></td>
														</tr>
														  <tr>
														  <th scope="row">Original Hire Date</th>
														  <td><?php echo date_indo($pek->tanggal_masuk); ?></td>
														</tr>
														  <tr>
														  <th scope="row">Lama Bekerja</th>
														  <td><?php echo date_indo($pek->tanggal_layanan); ?></td>
														</tr>
													  </tbody>
													</table>
												</div>
												
											<div class="about-content-block">
											 <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Kontak</h4>
												<table class="table">
												  <thead>
												  
												  </thead>
												  <tbody>
													<tr>
													  <th scope="row">No. Telepon</th>
													  <td><?php echo $ker->phone; ?></td>
													</tr>
													<tr>
													  <th scope="row">Email</th>
													  <td><?php echo $ker->email; ?></td>
													</tr>
												  </tbody>
												</table>
											</div>
											
											<div class="about-content-block">
											  <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Alamat Kantor</h4>
											  <p><?php echo $ker->alamat; ?></p>
											  <div class="google-maps">
												<div id="map" class="map"></div>
											  </div>
											</div>  
										</div>
									 </div>
									 <br/>
									 </div>
								  </div>
							</div>
							
						  </div>
						</div>
					</div>
		</div>
        </div>
    </div>
  <?php endforeach; ?>
</html>
