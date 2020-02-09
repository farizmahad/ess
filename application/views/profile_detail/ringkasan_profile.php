
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
								<li class="active"><i class="icon ion-ios-information-outline"></i><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Ringkasan Profile</a></li>
								<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Profile Singkat</a></li>
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
					<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
					</div>
					<div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-6">
								<div class="about-profile">
									<div class="about-content-block">
									 <div class="row">
										<div class="col-lg-5 col-md-5">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
											</div>
											<?php 
											 $manajer_id=$ker->id_line_manajer;

											if($manajer_id==0){ ?>
												<h5 class="grey"><b>Divisi</b></h5>
												<p align="center"><a href="<?php echo base_url(); ?>organisasi/<?php echo $ker->id; ?>" target="_blank"><?php echo $ker->nama_divisi; ?></a></p>
												<?php
											}else if($manajer_id !='0' or $manajer_id !=NULL or $manajer_id !='NULL' or $manajer_id !=0) {?>
											
											<div class="col-lg-9 col-md-8 col-sm-9 col-xs-8">
												<h5 class="grey"><b>Supervisor</b></h5>
												<p><a href="<?php echo base_url(); ?>ringkasan-profile/<?php echo $ker->id_line_manajer; ?>" target="_blank"><?php echo $ker->nama_divisi; ?> 
													  <?php 
													  $id_manajer=$ker->id_line_manajer;
													  $manajer=$this->Profile_detail_model->get_users($id_manajer); 
													  foreach($manajer as $jer){
														echo "("; echo $jer->first_name; echo $jer->last_name; echo ")";
													  }
													  ?>

								
												</a></p>
											</div>
										  <?php }?>
										</div>
										
										<?php if($ker->id_line_manajer !=0 or $ker->id_line_manajer !=NULL or $ker->id_line_manajer !='NULL') {?>

										<?php 
										$id_manajer=$ker->id_line_manajer;
										$manajer=$this->Profile_detail_model->get_users($id_manajer); 
											foreach($manajer as $jer){
											//echo "("; echo $jer->first_name; echo $jer->last_name; echo ")";
											$foto_manajer=$jer->foto;
											$jabatan_manajer=$jer->nama_jabatan;
											$first_name_manajer=$jer->first_name;
											$last_name_manajer=$jer->last_name;

											}
										?>
										<div class="col-lg-6 col-md-6">
											<?php if($foto_manajer){?>
											<div class="col-lg-3 col-md-4 col-sm-3 col-xs-4">
												<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $foto_manajer; ?>" alt="user" class="profile-photo" />	
											</div>
											<?php } ?>
											
											<div class="col-lg-9 col-md-6 col-sm-9 col-xs-8">
												<h5 class="grey"><b><?php echo $jabatan_manajer; ?></b></h5>
												<a href="<?php echo $ker->id_line_manajer; ?>" target="_blank"> <?php echo $first_name_manajer;  ?> <?php echo $last_name_manajer; ?></a>
											</div>
										</div>
										
									  <?php } ?>
									 </div>
									<br/>
									<div class="row">
										<div class="col-lg-7 col-md-5">
											<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
											</div>
											<div class="col-lg-10 col-md-7 col-sm-9 col-xs-8">
												<h5 class="grey"><b>Perusahaan</b></h5>
												<?php echo $ker->company; ?> 
											</div>
										</div>
									 </div>
								  </div>
								  </div>
							</div>
							
							<div class="col-lg-4 col-md-4 col-sm-6">
								<div class="about-profile">
									<div class="about-content-block">
									 <div class="row">
										<div class="col-md-12">
											<h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Testimoni</h4>
											<p align="center"> Tambah </p>  
										</div>
									 </div>
									 <br/>
									 </div>
								  </div>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-8">
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
													<tr>
													  <th scope="row">ID Pegawai</th>
													  <td><?php echo $ker->ID_pegawai; ?></td>
													</tr>
													<tr>
													  <th scope="row">Organisasi</th>
													  <td>
														
														 <?php if($ker->id_line_manajer==0){ ?>
															 PT. Aartijaya (Wida Budiman) 
														  <?php  }else{   ?>
															  PT. Aartijaya (Wida Budiman) >> 
															  <?php echo $ker->nama_divisi; ?>
															  <?php 
															  $id_manajer=$ker->id_line_manajer;
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
													  <td><?php echo $ker->nama_jabatan; ?></td>
													</tr>
													  <tr>
													  <th scope="row">Business Title</th>
													  <td><?php echo $ker->nama_jabatan; ?></td>
													</tr>
													  <tr>
													  <th scope="row">Job Profile</th>
													  <td><?php echo $ker->nama_jabatan; ?></td>
													</tr>
													  <tr>
													  <th scope="row">Status Pegawai</th>
													  <td><?php echo $ker->status_pegawai; ?></td>
													</tr>
												 <!--
													  <tr>
													  <th scope="row">Management Level</th>
													  <td>5 Individual Contributor </td>
													</tr>
													  <tr>
													  <th scope="row">Time Type</th>
													  <td>Full Time</td>
													</tr>
													-->
													
													  <tr>
													  <th scope="row">FTE</th>
													  <td><?php echo $ker->fte; ?>%</td>
													</tr>
													  <tr>
													  <th scope="row">Lokasi</th>
													  <td><i class="ion-ios-location-outline icon-in-title"></i>&nbsp; &nbsp;

														<?php echo $ker->alamat; ?></td>
													</tr>
													  <tr>
													  <th scope="row">Bekerja Sejak</th>
													  <td><?php echo date_indo($ker->tanggal_masuk); ?></td>
													</tr>
													  <tr>
													  <th scope="row">Original Hire Date</th>
													  <td><?php echo date_indo($ker->tanggal_masuk); ?></td>
													</tr>
													  <tr>
													  <th scope="row">Continous Service Date</th>
													  <td><?php echo date_indo($ker->tanggal_layanan); ?></td>
													</tr>
													<!--
													  <tr>
													  <th scope="row">Length of Services</th>
													  <td>6 year(s), 3 month(s), 2 day(s)</td>
													</tr>
												  -->
													  <tr>
													  <th scope="row">Lama Bekerja</th>
													  <td>
													  <?php
														   $tanggal_masuk=new DateTime($ker->tanggal_masuk);
														   $hari_ini=date('Y-m-d');
														   $bulan_ini=date('m');
														   $today=new DateTime($hari_ini);
														   $interval = $tanggal_masuk->diff($today);
														   $selisih=$interval->days;
															
															//menghitung tahun

														   $tahun = floor($selisih/365);
														   $sisa_tahun= $selisih % 365;

														   //menghitung bulan

														   $bulan = floor($sisa_tahun/12);


														   // meghiutng hari


														   if($bulan_ini=="04" or $bulan_ini=="06" or $bulan_ini=="09" or $bulan_ini=="1"){
														   $sisa_hari= $sisa_tahun % 30;
														   }elseif($bulan_ini=="01" or $bulan_ini=="03" or $bulan_ini=="05"or $bulan_ini=="07"  or $bulan_ini=="08" or $bulan_ini=="10"  or $bulan_ini=="12"){
															  $sisa_hari= $sisa_tahun % 31;

														   }elseif($bulan_ini=="02"){
																
														   $tahun_sekarang = date ("Y");
														   $kabisat = $tahun_sekarang % 4;
														   if($kabisat==0){
																$sisa_hari= $sisa_tahun % 29;
														   }else{
																$sisa_hari= $sisa_tahun % 28;
														   }
			  
														   }
														   $hari = floor($sisa_hari/1);
														   
														  
														   echo $tahun; echo " "; echo "tahun";  echo " "; echo $bulan;echo " "; echo "bulan"; echo " "; echo $hari; echo "  "; echo "hari";
													  ?>

														  
														   </td>
													</tr>
													<!--
													  <tr>
													  <th scope="row">Time in Job Profile</th>
													  <td>1 year(s), 3 month(s), 26 day(s)</td>
													</tr>
												  -->
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
												<div id="map" class="map">
													<div class="embed-responsive embed-responsive-4by3">
													  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31683.28285890332!2d107.57791549999999!3d-6.9608241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8d3752810e3%3A0xefd20a12efd63ddc!2sAarti+Jaya.+PT!5e0!3m2!1sid!2sid!4v1561021803033!5m2!1sid!2sid" frameborder="0" style="border:0" allowfullscreen></iframe>
													</div>
												</div>
											  </div>
											</div>
											<br><br><br><br><br><br>    <br><br><br>   <br><br><br>     
											<div class="about-content-block">
											  <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Website</h4>
												  <p><a href="http://www.bursasajadah.com"> <?php echo $ker->website; ?> </a></p>

											</div>
										</div>
									 </div>
									 <br/>
									 </div>
								  </div>
							</div>
							
							<div class="col-md-4">
								<div class="about-profile">
									<div class="about-content-block">
									 <div class="row">
										<div class="col-md-12">
											<div class="about-content-block">
												 <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Saran</h4>
												  
												  
												  <?php 

												  $jumlah_feedback=count($feedback);

												  if($jumlah_feedback > 0) {
												  foreach($feedback as $feed):?>
												  <div class="row">
													<div class="col-md-12">
														<div class="col-md-2">
															<?php if($feed->foto){ ?>
															<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $feed->foto; ?>" alt="user" class="profile-photo" />
														  <?php } ?>
														</div>

														<div class="col-md-10">
															<h5 class="grey"><b><?php echo $feed->first_name; ?> <?php echo $feed->last_name; ?></b> | <?php echo date_indo($feed->date); ?></h5>
															<p align="justify"> 

																 <?php echo $feed->question; ?>
															</p>
															<p>
															  <strong>Kelebihan :</strong><br>
															  <?php echo $feed->kelebihan; ?>
															</p>
															 <p>
															  <strong>Kekurangan :</strong><br>
															  <?php echo $feed->kekurangan; ?>
															</p>

													   

														   <a href="<?php echo base_url(); ?>feedback/<?php echo $id_penerima; ?>"> <p align="center"> Selengkapnya... </p></a>
														</div>
													</div>

												  <?php endforeach; ?>
												<?php }else{ ?>
												  <div class="row">
													<div class="col-md-12">
													  <center>
														  Belum ada Saran !
														</center>
													</div>
												  </div>

												<?php } ?>
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

