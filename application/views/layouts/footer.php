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
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
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

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
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
   