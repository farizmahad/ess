

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
											<li align="center"><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>" class="active"><strong>Detil Pekerjaan</strong></a></li>
											<li align="center" class="active"><a href="<?php echo site_url('history-pegawai/'.$pek->id);?>"><strong>History Pegawai</strong></a></li>
											
										</ul>
									</div>
								</nav>
							</div>
						</div>
              <!-- About
              ================================================= -->
              <div class="about-profile">
                
                  <div class="about-content-block">
                 <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Riwayat Pekerjaan </h4> 
                  <table class="table table-bordered" id="example2">
                    <thead>
                        <tr>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Jenis</th>
                          <th scope="col">Alasan</th>
                          <th scope="col">Pekerjaan</th>
                          <th scope="col">Manager</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $jumlah_row=count($history_job_profile);
                      if($jumlah_row > 0) {
                      foreach($history_job_profile as $hisjob):?>
                        <tr>
                          <td> <?php echo date_indo($hisjob->date_update); ?></td>
                          <td> <?php echo $hisjob->type; ?></td>
                          <td> <?php echo $hisjob->reason; ?></td> 
                          <td> <?php echo $hisjob->nama_jabatan; ?></td>
                          <td>
                            <?php $manajer= $hisjob->id_line_manajer; 
                           
                               if($manajer==0 or $manajer =='NULL' or $manajer==NULL){
                                  echo ' - ';
                               }else{

                                  $id_manajer=$hisjob->id_line_manajer;
                                  $manajer=$this->Profile_detail_model->get_users($id_manajer); 
                                  foreach($manajer as $jer){
                                     echo "("; echo $jer->first_name; echo $jer->last_name; echo ")";
                                  }
                          
                               }
                            ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php }else{ ?>

                     <tr>
                          <td colspan="6" align="center">
                          Tidak ada data! 
                          </td>
                        </tr>
                    <?php } ?>
                        
                    </tbody>
                    </table>
                  </div>
                  
			  <div class="about-content-block">
                  <h3 class="grey"><i></i>Riwayat Kompensasi</h3>
                 <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Perubahan Gaji Pokok (3 tahun terakhir) </h4> 
                  <table class="table table-bordered" id="example3">
                    <thead>
                        <tr>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Alasan</th>
                          <th scope="col">Gaji</th>
                          <th scope="col">perubahan (%)</th>
                          <th scope="col">Kompensasi Pokok</th>
                          <th scope="col">Mata Uang</th>
                          <th scope="col">Pekerjaan</th>
                          <th scope="col">Manager</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $jumlah_row_compen=count($history_compensation);
                      if($jumlah_row_compen > 0) {

                      foreach($history_compensation as $hiscom):?>
                        <tr>
                          <td><?php echo date_indo($hiscom->date_update); ?></td>
                          <td> <?php echo $hiscom->reason; ?></td>
                          <td> <?php echo number_format($hiscom->base_pay); ?></td>
                          <td> <?php echo $hiscom->persent_change; ?> %</td>
                           <td> <?php echo $hiscom->persent_change; ?> %</td>
                           <td> <?php echo number_format($hiscom->primary_compensation); ?> </td>
                           <td> <?php echo $hiscom->nama_jabatan; ?> </td>
                           <td>
                              <?php $manajer= $hiscom->id_line_manajer; 
                           
                               if($manajer==0 or $manajer =='NULL' or $manajer==NULL){
                                  echo ' - ';
                               }else{

                                  $id_manajer=$hisjob->id_line_manajer;
                                  $manajer=$this->Profile_detail_model->get_users($id_manajer); 
                                  foreach($manajer as $jer){
                                     echo "("; echo $jer->first_name; echo $jer->last_name; echo ")";
                                  }
                          
                               }
                            ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php }else{ ?>

                        <tr>
                          <td colspan="8" align="center">
                          Tidak ada data! 
                          </td>
                        </tr>
                    <?php } ?>
                       
                    </tbody>
                    </table>
                  </div>
              </div>
			  <br><br><br><br><br><br><br><br><br>
				<br><br><br>
            </div>
          
          </div>
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
        "scrollX": true
    });
});

  $(function () {
    $('#example3').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "scrollX": true
    });
});
</script>