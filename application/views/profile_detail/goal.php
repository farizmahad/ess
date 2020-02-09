<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>Tujuan Individu | ESS PT. Aartijaya</title>

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
				<div class="col-lg-3 col-md-3">
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
				<!--<div class="col-lg-12 col-md-9">
					<ul class="list-inline profile-menu">
						<li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>" class="active">Capaian Individu</a></li>
						<li><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>">Kompetensi</a></li>
						<li><a href="<?php echo site_url('development-items/'.$pek->id);?>">Poin Pengembangan</a></li>
						<?php if($id_login==$id_data){ ?>
						<li><a href="<?php echo site_url('tujuan-individu-tutup/'.$pek->id);?>">Capaian Individu (Selesai)</a></li>
						<?php } ?>
						<?php if($id_login==$id_data){ ?>
						<li><a href="<?php echo site_url('penerima-poin-pengembangan/'.$pek->id);?>">Poin Pengembangan (diterima)</a></li>
						<?php } ?>
					</ul>
				</div>-->
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
        <?php endforeach; ?>

        <div id="page-contents">
			<div class="container-fluid">
			  <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				</div>
				<div class="col-md-9 col-sm-12 col-xs-12">
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
										<li align="center"class="active"><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>" class="active"><strong>Capaian Individu</strong></a></li>
										<li align="center"><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>">Kompetensi</a></li>
										<li align="center"><a href="<?php echo site_url('development-items/'.$pek->id);?>">Poin Pengembangan</a></li>
										<?php if($id_login==$id_data){ ?>
										<li align="center"><a href="<?php echo site_url('tujuan-individu-tutup/'.$pek->id);?>">Capaian Individu (Selesai)</a></li>
										<?php } ?>
										<?php if($id_login==$id_data){ ?>
										<li align="center"><a href="<?php echo site_url('penerima-poin-pengembangan/'.$pek->id);?>">Poin Pengembangan (Diterima)</a></li>
										<?php } ?>
									</ul>
								</div>
							</nav>
						</div>
					</div>
					
					<br/>
					<div class="chat-room">
					  <div  class="row">
						<div class="col-md-5 col-sm-12 col-xs-12">
						  <ul class="nav nav-tabs contact-list scrollbar-wrapper scrollbar-outer">

							<?php 
							$jumlah_goal=count($goal);
							if($jumlah_goal > 0) { 

							foreach($goal as $go):?>

							<li class="active">
							<?php if($id_login == $id_data){?>
								<div>
									<a class="edit_button" data-toggle="modal" data-target="#VendorModall"
										data-id_login="<?php echo $id_login;?>"
										data-id_goal="<?php echo $go->id_goal;?>"
										data-goal="<?php echo $go->goal;?>"
										data-description="<?php echo $go->description;?>"
										data-id_category_goal="<?php echo $go->id_category_goal;?>"
										data-status="<?php echo $go->status;?>"
										data-support="<?php echo $go->support;?>"
										data-weight="<?php echo $go->weight;?>"
										data-due_date="<?php echo $go->due_date;?>"
										data-reviews="<?php echo $go->reviews;?>"
										> <i class="fa fa-edit"></i> 
									</a>
									&nbsp;&nbsp;

									<a class="status_button" data-toggle="modal" data-target="#StatusModall"
										data-id_login="<?php echo $id_login;?>"
										data-id_goal="<?php echo $go->id_goal;?>"
										data-status_selesai="<?php echo $go->status_selesai;?>"
										data-id_data="<?php echo $id_data;?>"
										> <i class="fa fa-toggle-on"></i> 
									</a>
								</div>
							<?php } ?>

							<a data-toggle="tab"  id="<?php echo $go->id_goal; ?>" class="client-link" onClick="reply_click(this.id)">
							<div class="contact">
							  <div class="msg-preview">
								<h5><?php echo $go->goal; ?></h5>
								<p class="text-muted">
								  <?php
								   if($go->status_selesai==0){
									echo "<strong>Sedang dalam Proses</strong>";
								   }elseif($go->status_selesai==1){
									echo "<strong>Pending</strong>";
								   }elseif($go->status_selesai==2){
									echo "<strong>Selesai</strong>";
								   }
								  ?>
								</p>
							  </div>
							</div>
							</a>
							</li>
						
						  <?php endforeach; ?>
							
						<?php }else{ ?>
								<center>Tidak ada data!</center>
						<?php } ?>
						  
							<li>
								<?php if($id_login == $id_data){?>
									<div align = "right">
										<button class="btn btn-warning tambah_button" data-toggle="modal" data-target="#VendorModall"
										data-id_login="<?php echo $id_login;?>"
										>Tambah</button>
									</div>
								<?php } ?>
							</li>
						  </ul>
						</div>

						<div class="tampildata">

						  <center>
							   Tidak ada data !
						  </center>
						 
				 
						</div>
					 </div>
				<!--<//?php if($id_login == $id_data){?>
				<div class="row">
			  <button class="btn btn-warning tambah_button" data-toggle="modal" data-target="#VendorModall"
								data-id_login="<//?php echo $id_login;?>"
								>Tambah</button>
			  </div>
			<//?php } ?>-->
			

						<br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br>
					</div>
				</div>
			  </div>
			</div>
        </div>
      </div>
	  
	   <footer id="footer">
      <div class="container-fluid">
        <div class="row justify-content-center">
		<?php
         $ID = $this->ion_auth->user()->row()->id;
         $user_login=$this->Home_model->get_users($ID);
         $per_bel_selesai=$this->Home_model->per_bel_selesai($ID,$daterange);
         foreach ($user_login as $log):
         ?>   
          <div class="footer-wrapper">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div align="center">
					<a href=""><img src="<?php echo base_url();?>assets/images/aarti_jaya_pt_3.png" alt="" class="footer-logo" /></a>
					<ul class="list-inline social-icons">
						<li><a href="https://www.facebook.com/BursaSajadah/" target="_blank"><i class="icon ion-social-facebook"></i></a></li>
						<li><a href="https://twitter.com/bursasajadah" target="_blank"><i class="icon ion-social-twitter"></i></a></li>
						<li><a href="https://www.instagram.com/bursa.sajadah/" target="_blank"><i class="icon ion-social-instagram"></i></a></li>
						<li><a href="https://id.pinterest.com/bursasajadah/" target="_blank"><i class="icon ion-social-pinterest"></i></a></li>
						<!--
						<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
						-->
					</ul>
				</div>
              
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <h5>Navigasi</h5>
              <ul class="footer-links">
                <li><a href="<?php echo base_url(); ?>beranda">Halaman Utama</a></li>
                <li><a href="<?php echo base_url(); ?>tambah-permintaan">Daftar Permintaan Saya</a></li>
				
				<?php
					$group_gm = array('manager');
					if ($this->ion_auth->in_group($group_gm)){ ?>
						<li><div><a href="<?php echo base_url(); ?>daftar-persetujuan">Daftar Konfirmasi Purchase Request </a></div></li>
						<li><div><a href="<?php echo base_url(); ?>history-persetujuan">Riwayat Konfirmasi Purchase Request</a></div></li>
				<?php } ?>
				
				<?php 
					$group_gm = array('general manager','finance');
						if ($this->ion_auth->in_group($group_gm)){ ?>
							<li><div><a href="<?php echo base_url(); ?>User_pengajuan/daftar_persetujuan_purchase_order">Daftar Konfirmasi Purchase Order </a></div></li>
			  
				<?php } ?>
		
				<?php

				$group_gm = array('pic','purchasing');
				if ($this->ion_auth->in_group($group_gm)){ ?>
				<!--
				<li><i class="icon ion-ios-people"></i><div><a href="<//?php echo base_url(); ?>daftar-persetujuan-pr">Daftar Pengajuan Purchase Request </a></div></li>
				-->

					<li><div><a href="<?php echo base_url(); ?>pic-daftar-barang">Daftar Permintaan Non Dagang </a></div></li>
					<li><div><a href="<?php echo base_url(); ?>daftar-purchase-request">Daftar Purchase Request</a></div></li>
				<?php } ?>
				
				<?php

					$group_gmm = array('purchasing');
									if ($this->ion_auth->in_group($group_gmm)){ ?>
					
					<li><div><a href="<?php echo base_url(); ?>User_pengajuan/list_pr_terima">Daftar Permintaan Purchase Order</a></div></li>
					
					<li><div><a href="<?php echo base_url(); ?>User_pengajuan/list_purchase_order">Unduh CSV Purchase Order</a></div></li>
				<?php } ?>



				<?php

					$group_nota = array('non');
									if ($this->ion_auth->in_group($group_nota)){ ?>
					 <li><div><a href="<?php echo base_url(); ?>daftar-nota">Daftar Nota </a></div></li>
								 
				<?php } ?>
				
				<?php
                $group_master = array('admin');
                if ($this->ion_auth->in_group($group_master)){ ?>

                  <li><div><a href="<?php echo base_url(); ?>Masterer/mst_jenis_request">Jenis Request</a></div></li>
                    <li><div><a href="<?php echo base_url(); ?>Masterer/divisi">Divisi</a></div></li>
                    <li><div><a href="<?php echo base_url(); ?>Masterer/jabatan">Jabatan</a></div></li>
                    <li><div><a href="<?php echo base_url(); ?>Masterer/aturan">Aturan Request</a></div></li>

                    <li><div><a href="<?php echo base_url();?>user">Manage User</a></div></li>

                    

                <?php } ?>

                 <?php
                $group_hrd = array('HRD');
                if ($this->ion_auth->in_group($group_hrd)){ ?>

                  <li><div><a href="<?php echo base_url(); ?>hrd-detail-pekerjaan">History  Pegawai</a></div></li>
    
                <?php } ?>
                <!--
				<li><a href="http://trainingaartijaya.bursasajadah.id/forma/" target="_blank">Training</a></li>
                <li><a href="https://bursasajadah.com:2096" target="_blank">Webmail</a></li>
				-->
                <!--<li><a href="">Akun</a></li>-->
                <!--<li><a href="">Language settings</a></li>-->
              </ul>
            </div>
            <!--<div class="col-md-2 col-sm-2">
              <h5>For businesses</h5>
              <ul class="footer-links">
                <li><a href="">Business signup</a></li>
                <li><a href="">Business login</a></li>
                <li><a href="">Benefits</a></li>
                <li><a href="">Resources</a></li>
                <li><a href="">Advertise</a></li>
                <li><a href="">Setup</a></li>
              </ul>
            </div>-->
            <!--
            <div class="col-md-3 col-sm-3">
              <h5>Tentang Kami</h5>
              <ul class="footer-links">
                <li><a href="">Tentang Kami</a></li>
                <li><a href="">Hubungi Kami</a></li>
                <!--<li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms</a></li>
                <li><a href="">Help</a></li>-->
                <!--
              </ul>
            </div>
          -->

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div align="left">  
				  <h5>Hubungi Kami</h5>
				  <ul class="contact">
					<!--
					<li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
				  -->
					<li><i class="icon ion-ios-email-outline"></i>support@bursasajadah.com</li>
					<li><i class="icon ion-ios-location-outline"></i>Jl. Kopo Bihbul KM. 6,5 No. 12 Bandung </li>
				  </ul>
				</div>
            </div>
          </div>
		  <?php endforeach; ?>
        </div>
      </div>
      <div class="copyright">
        <p>PT Aarti Jaya © 2019. All rights reserved</p>
      </div>
    </footer>
     <!--preloader-->
   
			 <!--preloader-->
   
    </div>

<div class="modal fade" id="VendorModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Capaian Individu
            </div>
            <div class="modal-body">
                <form id="myform" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>Profile_Detail/save_goal" enctype="multipart/form-data">
					<div class="form-group">
						<label>Capaian Individu</label>
					   <input type="text" name="goal" class="form-control goal" placeholder="Capaian Individu" id="goal">
					</div>

					<div class="form-group">
						<label>Deskripsi</label>
					  <textarea class="form-control description" name="description"  cols="10" rows="2" id="description">
					   
					  </textarea>
					</div>
				  
					<div class="form-group">
					  <label>Kategori</label>
					  <select class="form-control id_category_goal" id="kategori" name="id_category_goal">

								   <option value="">Pilih Kategori</option>
							<?php foreach($category_goal as $cat):?>

								  <option value="<?php echo $cat->id_category_goal; ?>"><?php echo $cat->category_goal; ?></option>
							<?php endforeach; ?>
					  </select>

					</div>

					<div class="form-group">
						<label>Status</label>
						<select class="form-control status" name="status" id="status">
							 <option value="">Pilih Status</option>
							 <option value="0">Sedang dalam proses</option>
							 <option value="1">Pending</option>
							<option value="2">Selesai</option>

						</select>
					</div>

					<div class="form-group">
						<label>Supports </label>
					   <input type="text" name="supports" class="form-control support" placeholder="Supports" id="supports">
					</div>

					<div class="form-group">
						<label>Beban </label>
					   <input type="text" name="weight" class="form-control weight" placeholder="Beban" id="beban">
					</div>

					<div class="form-group" id="data_1">
						<label for="firstname"> Jatuh Tempo</label>
						<div class="input-group date">
							<span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control due_date" placeholder="Pilih Tanggal" name="due_date" id="jatuh_tempo">
						</div>
					</div>
					
					<div class="form-group">
                        <label> Tinjauan Terkait</label>
                      <textarea class="form-control reviews" name="reviews" cols="10" rows="2" id="tinjauan_terkait">
                      </textarea>
					</div>

                    <input type="hidden" class="form-control id_login" name="id_login" placeholder="Nama Jabatan">
                    <input type="hidden" class="form-control id_goal" name="id_goal" placeholder="Nama Jabatan">

			</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn-info"> Simpan </button>
					<button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
				</div>
				</form>
        </div>
    </div>
</div>

<div class="modal fade" id="StatusModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Ubah Status Capaian Individu
            </div>
            <div class="modal-body">
                <form id="myform_m" onSubmit="return validasi_m()" method="post" action="<?php echo base_url();?>Profile_Detail/update_status_goal" enctype="multipart/form-data">
					<div class="form-group">
						<label>Status</label>
						<select class="form-control status_selesai" name="status" id="status_selesai">
							 <option value="">Pilih Status</option>
							 <option value="0">Sedang dalam proses</option>
							 <option value="1">Pending</option>
							<option value="2">Selesai</option>
						</select>
					</div>

				<input type="hidden" class="form-control id_login" name="id_login" placeholder="Nama Jabatan">
				<input type="hidden" class="form-control id_goal" name="id_goal" placeholder="Nama Jabatan">
				<input type="hidden" class="form-control id_data" name="id_data" placeholder="Nama Jabatan">
            </div>
            <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-info"> Simpan </button>

                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                
            </div>
            </form>
        </div>
    </div>
</div>

</body>
	<script>
	  $('#data_1 .input-group.date').datepicker({
				todayBtn: "linked",
				keyboardNavigation: false,
				forceParse: false,
				calendarWeeks: true,
				autoclose: true
			});
	</script>
     <script>
      /*
        function reply_click(clicked_id)
            {
                var id=clicked_id; 

                $('.tampildata').load("http://portal.aartijaya.com/Profile_detail/replay/"+id);
            }
            */

              $(document).on("click", ".edim_button", function () {
        var myId = $(this).data('id');
       
        $.ajax({
            type: 'POST',
            url: 'http://portal.aartijaya.com/Profile_Detail/replay',
            data: { ids: myId},
            success: function(response) {
                $('.tampildata').html(response);
            }
        });
    }); 
    </script>

     
    <script type="text/javascript">
		document.getElementById("uploadBtn").onchange = function () {
		document.getElementById("uploadFile").value = this.value;
		};

	  /*
		$(document).ready(function(){
			$("#id_gedung").change(function (){
				var url = "<?php echo site_url('Pengajuan/add_ajax_divisi');?>/"+$(this).val();
				$('#id_divisi').load(url);
				return false;
			})      
		});
	*/
		$('#item').chosen();


		$("#member").change(function() {
		$("#item").prop("readonly", $(this).is(":checked"));      
		$('#item').prop('disabled',false).trigger("chosen:updated",!$(this).is(":checked"));
		});
		 $("#member").change(function() {
		 var is_checked = $(this).is(":checked");
		 if(is_checked) {
		 $('#item').val("").trigger("chosen:updated",$(this).is(":checked"));
		 $('#item').prop('disabled', true).trigger("chosen:updated",$(this).is(":checked"));
			 
		 }
		
	});



	</script>

	<script>
	 $(document).on( "click", '.tambah_button',function(e) {
			var id_login             = $(this).data('id_login');
		   

			$(".id_login").val(id_login);
		  
		});



	 $(document).on( "click", '.edit_button',function(e) {
			var id_login             = $(this).data('id_login');
			var id_goal              = $(this).data('id_goal');
			var goal                 = $(this).data('goal');
			var description          = $(this).data('description');
			 var id_category_goal          = $(this).data('id_category_goal');
			var status          = $(this).data('status');
			var support          = $(this).data('support');
			var weight          = $(this).data('weight');
			var due_date          = $(this).data('due_date');
			var reviews          = $(this).data('reviews');

			$(".id_login").val(id_login);
			$(".id_goal").val(id_goal);
			$(".goal").val(goal);
			$(".description").val(description);
			$(".id_category_goal").val(id_category_goal);
			  $(".status").val(status);
			  $(".support").val(support);
			  $(".weight").val(weight);
			  $(".due_date").val(due_date);
			   $(".reviews").val(reviews);
		  
		});


	 $(document).on( "click", '.status_button',function(e) {
			var id_login             = $(this).data('id_login');
			var id_goal              = $(this).data('id_goal');
			var status_selesai       = $(this).data('status_selesai');
			var id_data              = $(this).data('id_data');
		   
			$(".id_login").val(id_login);
			$(".id_goal").val(id_goal);
			$(".status_selesai").val(status_selesai);
			$(".id_data").val(id_data);
			
		  
		});

	</script>

	<script>
		function reply_click(clicked_id)
			{
				var id=clicked_id;                
				$('.tampildata').load("<?php echo base_url() ?>Profile_Detail/replay/"+id);
			}
	</script>
    <script>
      
      function validasi()
    {

        var goal=document.forms["myform"]["goal"].value;

//        validasi question tidak boleh kosong (required)

        if (goal==null || goal=="")
          {
           swal({
                title: "Peringatan!",
                text: "Capaian tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        var description=document.forms["myform"]["description"].value;

//        validasi id user tidak boleh kosong (required)
        if (description==null || description=="")
          {
           swal({
                title: "Peringatan!",
                text: "Deskripsi tidak boleh kosong!"
            });
          return false;
          };


        var kategori=document.forms["myform"]["kategori"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (kategori==null || kategori=="")
          {
           swal({
                title: "Peringatan!",
                text: "Kategori tidak boleh kosong!"
            });
          return false;
          };



          var status=document.forms["myform"]["status"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (status==null || status=="")
          {
           swal({
                title: "Peringatan!",
                text: "Status tidak boleh kosong!"
            });
          return false;
          };


          var supports=document.forms["myform"]["supports"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (supports==null || supports=="")
          {
           swal({
                title: "Peringatan!",
                text: "Supports tidak boleh kosong!"
            });
          return false;
          };


           var beban=document.forms["myform"]["beban"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (beban==null || beban=="")
          {
           swal({
                title: "Peringatan!",
                text: "Beban tidak boleh kosong!"
            });
          return false;
          };




           var jatuh_tempo=document.forms["myform"]["jatuh_tempo"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (jatuh_tempo==null || jatuh_tempo=="")
          {
           swal({
                title: "Peringatan!",
                text: "Jatuh tempo tidak boleh kosong!"
            });
          return false;
          };


          var tinjauan_terkait=document.forms["myform"]["tinjauan_terkait"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (tinjauan_terkait==null || tinjauan_terkait=="")
          {
           swal({
                title: "Peringatan!",
                text: "Tinjauan Terkait tidak boleh kosong!"
            });
          return false;
          };
       
       
       
       
     }
    </script>
    <script>
      
		$(document).ready(function(){
			$('.confirm_aktif').on('click', function(){
				var delete_url = $(this).attr('href');
				swal({
				title: "Close ?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Ya !",
				cancelButtonText: "Batalkan",
				closeOnConfirm: false     
				}, function(){
				window.location.href = delete_url;
				});
			return false;
			});
		}); 



        function validasi_m()
    {

        var status_selesai=document.forms["myform_m"]["status_selesai"].value;

//        validasi question tidak boleh kosong (required)

        if (status_selesai==null || status_selesai=="")
          {
           swal({
                title: "Peringatan!",
                text: "Status tidak boleh kosong!"
            });
          return false;
          };
}
    </script>
</html>  