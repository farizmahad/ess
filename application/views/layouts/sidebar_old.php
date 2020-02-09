<div id="page-contents">
      <div class="container">
        <div class="row">
         
         <?php
         $ID = $this->ion_auth->user()->row()->id;
         $user_login=$this->Home_model->get_users($ID);
         $per_bel_selesai=$this->Home_model->per_bel_selesai($ID,$daterange);
         foreach ($user_login as $log):
         ?>    
          <div class="col-md-3 static">
            <div class="profile-card">
              <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $log->foto; ?>" alt="user" class="profile-photo" />
              <h5><a href="<?php echo base_url(); ?>ubah-kata-sandi" class="text-white"><?php echo $log->first_name; echo " "; echo $log->last_name; ?></a></h5>
              <!--<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>-->
              <a href="<?php echo base_url(); ?>dashboard" class="text-white"><i class="ion ion-android-person-add"></i> <?php echo count($per_bel_selesai); ?> permintaan belum selesai</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
             <li><i class="icon ion-ios-paper"></i><div><a href="<?php echo base_url(); ?>dashboard">Halaman Utama </a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="<?php echo base_url(); ?>tambah-permintaan">Tambah Permintaan</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>daftar-permintaan">Daftar Permintaan</a></div></li>


<?php

$group_gm = array('general manager','admin','finance','manager','purchasing');
                if ($this->ion_auth->in_group($group_gm)){ ?>
 <li><i class="icon ion-ios-people"></i><div><a href="<?php echo base_url(); ?>daftar-persetujuan">Daftar Persetujuan </a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>history-persetujuan">History Persetujuan</a></div></li>


                <?php } ?>

              <!--
              <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">Kotak Masuk</a></div></li>
              <!--<li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Images</a></div></li>
              <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li>-->
            </ul><!--news-feed links ends-->
            <?php endforeach; ?>
            <?php 
               $daftar_pengajuan=$this->Pengajuan_model->select_pengajuan_id($ID);
               $jumlah_daftar=count($daftar_pengajuan);

            ?>
            

            <div class="suggestions" id="sticky-sidebar">
              <?php if($jumlah_daftar > 0){ ?>
                <h5 class="grey"><b>Status Permintaan Anda</b> </h5>
              <?php } ?>

              <?php foreach($daftar_pengajuan as $daf):?>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><?php echo $daf->no_pengajuan; ?></h5>
                  <a href="#" class="text-green">
                    
                    <?php
                                   $id_permintaan=$daf->id_pengajuan;
                                   $id_jenis_request=$daf->id_jenis_request;
                                   $status_terakhir=$this->Pengajuan_model->cek_status_terakhir($id_permintaan);
                                   foreach($status_terakhir as $ter){
                                        $user_penerima=$ter->id_penerima;
                                        $urutan=$ter->urutan;
                                        $next_urutan=$urutan+1;

                                        $last_status=$ter->status;
                                        $keterangan=$ter->ket;

                                    $next=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
                                     
                                   } ?>  
                                   
                                   <?php if($last_status==0 and $keterangan ==NULL){ ?>

                                        <strong>Menunggu Persetujuan</strong>

                                  <?php  }elseif($last_status==1 and $keterangan=='Selesai'){
                                   ?>
                                      <strong> Selesai</strong>

                                 <?php }elseif($last_status==2){ ?>

                                             Ditolak
                                 <?php } ?>
                                              <?php
                                              foreach($next as $ne){
                                              echo $ne->nama_group;
                                              }

                                              ?>


                               <?php     

                                  ?>
                                  
                  </a>
                </div>
              </div>
              <?php endforeach; ?>
              </div>
            
          </div>

