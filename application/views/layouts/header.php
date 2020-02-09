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
     <link href="<?php echo base_url();?>assets/plugins/css/chosen/bootstrap-chosen.css" rel="stylesheet">

     <link href="<?php echo base_url();?>assets/plugins/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
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
            <a class="navbar-brand" href="<?php echo base_url(); ?>beranda"><img src="<?php echo base_url(); ?>assets/images/aarti_jaya_pt_3.png" alt="logo" / width="85" height="35"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu hidden-xs">
              <?php 
            if ($this->ion_auth->logged_in()){ ?>
              <li class="dropdown">
              <a href="<?php echo base_url(); ?>beranda"><i class="icon ion-ios-home"></i></a>
              </li>
              <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-clipboard"></i><span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                   <li><a href="<?php echo base_url(); ?>tambah-permintaan">Daftar Permintaan Barang Non Dagang</a></li>
                </ul>
             </li>
              <li class="dropdown"><a href="http://trainingaartijaya.bursasajadah.id/forma/" target="_blank"><i class="icon ion-battery-charging"></i></a></li>
              <li class="dropdown"><a href="https://bursasajadah.com:2096" target="_blank"><i class="icon ion-ios-paperplane"></i></a></li>-->
              <li class="dropdown">

                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-android-mail"></i><!--Notifikasi--> 
                  <?php 
          $ID     = $this->ion_auth->user()->row()->id;
           $users_groups = $this->ion_auth_model->get_users_groups($ID)->result();
           $groups_array = array();
            foreach ($users_groups as $group)
            {
                $groups_array[$group->id] = $group->name;
                $groupname=$group->name;
                $groupid=$group->id;
            }
            $purchase_order=$this->user_pengajuan_model->select_purchase_order_id_belum($groupid);
            $count_purchase_order=count($purchase_order);
            ?>

					<?php

						$count_persetujuan=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
						$count_p=$this->User_pengajuan_model->pic_daftar_barang_belum($ID);
            $count_permintaan=count($count_p);

						$count_total=$count_persetujuan+$count_permintaan+$count_purchase_order;
					?>
				
					<?php if($count_total){?>
						<span class="badge badge-light"> 
							<?php echo $count_total; ?> 
						</span>
					<?php }else{}?>
					<span></span>
				</a>
				<ul class="dropdown-menu page-list">
          <?php
        $group_gm = array('pic');
        if ($this->ion_auth->in_group($group_gm)){ ?>
					<li>
						<a href="<?php echo base_url(); ?>User_pengajuan/pic_daftar_barang">Daftar Permintaan Produk Non Dagang
							<?php if($count_permintaan){?>
								<span class="badge badge-light"> 
									<?php echo $count_permintaan; ?> 
								</span>
							<?php }else{}?>
						</a>
					</li>
        <?php } ?>
        <?php 
        $group_gm = array('purchasing');
        if ($this->ion_auth->in_group($group_gm)){ ?>
					<li>
						<a href="<?php echo base_url(); ?>User_pengajuan/list_pr_terima">Daftar Permintaan <i>Purchase Request</i> Non Dagang
							<?php if($count_persetujuan){?>
								<span class="badge badge-light"> 
									<?php echo $count_persetujuan; ?> 
								</span>
							<?php }else{}?>
						</a>
					</li>
       <?php } ?>
          <?php

        $group_gm = array('general manager','finance','purchasing');
        if ($this->ion_auth->in_group($group_gm)){ ?>
          
          <li>
            <a href="<?php echo base_url(); ?>User_pengajuan/daftar_persetujuan_purchase_order">Daftar Konfirmasi <i>Purchase Order</i> Non Dagang
              <?php if($count_purchase_order){?>
                <span class="badge badge-light"> 
                  <?php echo $count_purchase_order; ?> 
                </span>
              <?php }else{}?>
            </a>
          </li>
         <?php } ?>

				</ul>
              </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-android-globe"></i><!--Notifikasi--> 
         

         <?php 
				$tes=$this->Home_model->get_news_user_2($ID);
				$tes_like=$this->Home_model->get_news_user_2_like($ID);
				$count_like=count($tes_like);

                $count_tes=count($tes);
                $count_total=$count_tes+$count_like;
                if($count_total > 0){?>
            <span class="badge badge-light"> 
              <?php echo $count_total; ?> 
            </span>
          <?php }else{}?>
          <span></span>
				</a>
        <?php if($count_total >0) { ?>
				<ul class="dropdown-menu page-list">
				  <div class="table-responsive-xl">
				  <table class="table" style="background-color: white;">
					  <!--<thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">First</th>
						  <th scope="col">Last</th>
						  <th scope="col">Handle</th>
						</tr>
					  </thead>-->
					  <tbody>
            <?php
                
                foreach($tes as $te):
            ?>
						<tr>
						  <th scope="row"><img src="<?php echo base_url(); ?>files/foto_user/<?php echo $te->foto; ?>" alt="" class="profile-photo-md" /></th>
						  <td>
                
							<a href="<?php echo base_url();?>komentar-news?id_news=<?php echo $te->id_news; ?>&status=0&id_news_komentar=<?php echo $te->id_news_komentar; ?>" style="color:black;" ><?php echo $te->first_name; ?> <?php echo $te->last_name; ?> Mengomentari Postingan Anda
							</a>
						  </th>
						</tr>
          <?php endforeach; ?>
<?php
                
            foreach($tes_like as $like):
            ?>
            <tr>
              <th scope="row"><img src="<?php echo base_url(); ?>files/foto_user/<?php echo $like->foto; ?>" alt="" class="profile-photo-md" /></th>
              <td>
                
              <a href="<?php echo base_url();?>komentar-news?id_news=<?php echo $like->id_news; ?>>&status=1&id_news_komentar=<?php echo $like->id_news_like; ?>"

              <?php echo base_url(); ?>komentar-news/<?php echo $like->id_news; ?>" style="color:black;" ><?php echo $like->first_name; ?> <?php echo $like->last_name; ?> Menyukai Postingan Anda
              </a>
			  </td>
            </tr>
          <?php endforeach; ?>

					  </tbody>
					</table>
					</div>
				</ul>
      <?php }else{ ?>
		<ul class="dropdown-menu page-list">
				  <div class="table-responsive-xl">
				  <table class="table" style="background-color: white;">
					  <!--<thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">First</th>
						  <th scope="col">Last</th>
						  <th scope="col">Handle</th>
						</tr>
					  </thead>-->
					  <tbody>
						<tr>
							<td> <p align="center"> <strong>Belum ada notifikasi.</strong></p></td>
						</tr>
					  </tbody>
					</table>
					</div>
				</ul>
	  <?php }?>
			</li>
			
			<li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-android-person"></i><!--Akun--> <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                   <li><a href="<?php echo base_url(); ?>ringkasan-profile/<?php echo $ID; ?>">Lihat Akun</a></li>
                  <li><a href="<?php echo base_url(); ?>ubah-kata-sandi">Pengaturan Akun</a></li>
                  <li><a href="<?php echo base_url(); ?>struktur-organisasi">Struktur organisasi</a></li>
                  <li><a href="<?php echo base_url(); ?>logout">Keluar</a></li>

                </ul>
             </li>
            <?php }else{ ?>

<li class="dropdown"><a href="<?php echo base_url(); ?>login">login</a></li>
            <?php } ?>
             			

            </ul>
			
			<ul class="nav navbar-nav navbar-right main-menu hidden-lg hidden-md hidden-sm">
              <?php 
            if ($this->ion_auth->logged_in()){ ?>
              <li class="dropdown">
              <a href="<?php echo base_url(); ?>beranda"><!--<i class="icon ion-ios-home"></i>--> Home </a>
              </li>
              <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-clipboard"></i><span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                   <li><a href="<?php echo base_url(); ?>tambah-permintaan">Daftar Permintaan Barang Non Dagang</a></li>
                </ul>
             </li>
              <li class="dropdown"><a href="http://trainingaartijaya.bursasajadah.id/forma/" target="_blank"><i class="icon ion-battery-charging"></i></a></li>
              <li class="dropdown"><a href="https://bursasajadah.com:2096" target="_blank"><i class="icon ion-ios-paperplane"></i></a></li>-->
              <li class="dropdown">

                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!--<i class="icon ion-android-mail"></i>--> Kotak Masuk<!--Notifikasi--> 
                  <?php 
          $ID     = $this->ion_auth->user()->row()->id;
           $users_groups = $this->ion_auth_model->get_users_groups($ID)->result();
           $groups_array = array();
            foreach ($users_groups as $group)
            {
                $groups_array[$group->id] = $group->name;
                $groupname=$group->name;
                $groupid=$group->id;
            }
            $purchase_order=$this->user_pengajuan_model->select_purchase_order_id_belum($groupid);
            $count_purchase_order=count($purchase_order);
            ?>

					<?php

						$count_persetujuan=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
						$count_p=$this->User_pengajuan_model->pic_daftar_barang_belum($ID);
            $count_permintaan=count($count_p);

						$count_total=$count_persetujuan+$count_permintaan+$count_purchase_order;
					?>
				
					<?php if($count_total){?>
						<span class="badge badge-light"> 
							<?php echo $count_total; ?> 
						</span>
					<?php }else{}?>
					<span></span>
				</a>
				<ul class="dropdown-menu page-list">
          <?php
        $group_gm = array('pic');
        if ($this->ion_auth->in_group($group_gm)){ ?>
					<li>
						<a href="<?php echo base_url(); ?>User_pengajuan/pic_daftar_barang">Daftar Permintaan Produk Non Dagang
							<?php if($count_permintaan){?>
								<span class="badge badge-light"> 
									<?php echo $count_permintaan; ?> 
								</span>
							<?php }else{}?>
						</a>
					</li>
        <?php } ?>
        <?php 
        $group_gm = array('purchasing');
        if ($this->ion_auth->in_group($group_gm)){ ?>
					<li>
						<a href="<?php echo base_url(); ?>User_pengajuan/list_pr_terima">Daftar Permintaan <i>Purchase Request</i> Non Dagang
							<?php if($count_persetujuan){?>
								<span class="badge badge-light"> 
									<?php echo $count_persetujuan; ?> 
								</span>
							<?php }else{}?>
						</a>
					</li>
       <?php } ?>
          <?php

        $group_gm = array('general manager','finance','purchasing');
        if ($this->ion_auth->in_group($group_gm)){ ?>
          
          <li>
            <a href="<?php echo base_url(); ?>User_pengajuan/daftar_persetujuan_purchase_order">Daftar Konfirmasi <i>Purchase Order</i> Non Dagang
              <?php if($count_purchase_order){?>
                <span class="badge badge-light"> 
                  <?php echo $count_purchase_order; ?> 
                </span>
              <?php }else{}?>
            </a>
          </li>
         <?php } ?>

				</ul>
              </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!--<i class="icon ion-android-globe"></i>--> Notifikasi<!--Notifikasi--> 
         

         <?php 
				$tes=$this->Home_model->get_news_user_2($ID);
				$tes_like=$this->Home_model->get_news_user_2_like($ID);
				$count_like=count($tes_like);

                $count_tes=count($tes);
                $count_total=$count_tes+$count_like;
                if($count_total > 0){?>
            <span class="badge badge-light"> 
              <?php echo $count_total; ?> 
            </span>
          <?php }else{}?>
          <span></span>
				</a>
        <?php if($count_total >0) { ?>
				<ul class="dropdown-menu page-list">
				  <div class="table-responsive-xl">
				  <table class="table" style="background-color: white;">
					  <!--<thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">First</th>
						  <th scope="col">Last</th>
						  <th scope="col">Handle</th>
						</tr>
					  </thead>-->
					  <tbody>
            <?php
                
                foreach($tes as $te):
            ?>
						<tr>
						  <th scope="row"><img src="<?php echo base_url(); ?>files/foto_user/<?php echo $te->foto; ?>" alt="" class="profile-photo-md" /></th>
						  <td>
                
							<a href="<?php echo base_url();?>komentar-news?id_news=<?php echo $te->id_news; ?>&status=0&id_news_komentar=<?php echo $te->id_news_komentar; ?>" style="color:black;" ><?php echo $te->first_name; ?> <?php echo $te->last_name; ?> Mengomentari Postingan Anda
							</a>
						  </th>
						</tr>
          <?php endforeach; ?>
<?php
                
            foreach($tes_like as $like):
            ?>
            <tr>
              <th scope="row"><img src="<?php echo base_url(); ?>files/foto_user/<?php echo $like->foto; ?>" alt="" class="profile-photo-md" /></th>
              <td>
                
              <a href="<?php echo base_url();?>komentar-news?id_news=<?php echo $like->id_news; ?>>&status=1&id_news_komentar=<?php echo $like->id_news_like; ?>"

              <?php echo base_url(); ?>komentar-news/<?php echo $like->id_news; ?>" style="color:black;" ><?php echo $like->first_name; ?> <?php echo $like->last_name; ?> Menyukai Postingan Anda
              </a>
			  </td>
            </tr>
          <?php endforeach; ?>

					  </tbody>
					</table>
					</div>
				</ul>
      <?php }else{ ?>
		<ul class="dropdown-menu page-list">
				  <div class="table-responsive-xl">
				  <table class="table" style="background-color: white;">
					  <!--<thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">First</th>
						  <th scope="col">Last</th>
						  <th scope="col">Handle</th>
						</tr>
					  </thead>-->
					  <tbody>
						<tr>
							<td> <p align="center"> <strong>Belum ada notifikasi.</strong></p></td>
						</tr>
					  </tbody>
					</table>
					</div>
				</ul>
	  <?php }?>
			</li>
			
			<li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!--<i class="icon ion-android-person"></i>--> Akun <!--Akun--> <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                   <li><a href="<?php echo base_url(); ?>ringkasan-profile/<?php echo $ID; ?>">Lihat Akun</a></li>
                  <li><a href="<?php echo base_url(); ?>ubah-kata-sandi">Pengaturan Akun</a></li>
                  <li><a href="<?php echo base_url(); ?>struktur-organisasi">Struktur organisasi</a></li>
                  <li><a href="<?php echo base_url(); ?>logout">Keluar</a></li>

                </ul>
             </li>
            <?php }else{ ?>

<li class="dropdown"><a href="<?php echo base_url(); ?>login">login</a></li>
            <?php } ?>
             			

            </ul>
			
             <form class="navbar-form navbar-left hidden-sm" method="GET" action="<?php echo base_url(); ?>Dashboard/search_user">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Cari..." size="25" name="search" style="font-weight:bold;">
                
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
  
  
  