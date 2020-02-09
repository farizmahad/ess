<div id="page-contents">
      <div class="container-fluid">
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
              <a href="<?php echo base_url(); ?>dashboard" class="text-white"><i class="ion ion-android-person-add"></i> <?php echo count($per_bel_selesai); ?> permintaan belum selesai</a>
            </div>
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="<?php echo base_url(); ?>beranda">Halaman Utama</a></div></li>
              <?php 
$group_gmm = array('general manager','finance','manager','purchasing','members','staff','HRD');
                if ($this->ion_auth->in_group($group_gmm)){ ?>

              <li><i class="icon ion-ios-people"></i><div><a href="<?php echo base_url(); ?>tambah-permintaan">Tambah Permintaan</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>daftar-permintaan">Daftar Permintaan</a></div></li>

<?php } ?>







<?php

$group_gm = array('general manager','finance','manager','purchasing','HRD');
                if ($this->ion_auth->in_group($group_gm)){ ?>
 <li><i class="icon ion-ios-people"></i><div><a href="<?php echo base_url(); ?>daftar-persetujuan">Daftar Persetujuan </a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>history-persetujuan">History Persetujuan</a></div></li>
<?php } ?>

<?php

$group_nota = array('finance','purchasing');
                if ($this->ion_auth->in_group($group_nota)){ ?>
 <li><i class="icon ion-ios-people"></i><div><a href="<?php echo base_url(); ?>daftar-nota">Daftar Nota </a></div></li>
             
<?php } ?>


               <?php
                $group_master = array('admin');
                if ($this->ion_auth->in_group($group_master)){ ?>

                  <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>Masterer/mst_jenis_request">Jenis Request</a></div></li>
                    <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>Masterer/divisi">Divisi</a></div></li>
                    <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>Masterer/jabatan">Jabatan</a></div></li>
                    <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>Masterer/aturan">Aturan Request</a></div></li>

                    <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url();?>user">Manage User</a></div></li>

                    

                <?php } ?>

                 <?php
                $group_hrd = array('HRD');
                if ($this->ion_auth->in_group($group_hrd)){ ?>

                  <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>hrd-detail-pekerjaan">History  Pegawai</a></div></li>
                  
  
                    

                <?php } ?>


                

          
            </ul>
            <?php endforeach; ?>

            <?php 

               $daftar_pengajuan=$this->Pengajuan_model->select_pengajuan_id($ID);
            ?>
            <div class="suggestions" id="sticky-sidebar">
                <h5 class="grey"><b>

                  <?php if(count($daftar_pengajuan) > 0){?>
                Status Permintaan Anda
                <?php } ?></b></h5>

              <?php foreach($daftar_pengajuan as $daf):?>
              <div class="follow-user">
                <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $daf->foto; ?>" alt="" class="profile-photo-sm pull-left" />
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
                                 <?php }elseif($last_status==3){ ?>

                                             Dikembalikan dengan revisi
                                 <?php } ?>

                                  <?php 
                                                $next=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);

                                                foreach($next as $ne){



                                                                 echo $ne->nama_group;
                                                               }
                                                                 
                                                    ?>
                                               <?php
                                               /*
                                                 $cek_users=$this->Pengajuan_model->user_by_id($user_penerima);
                                                 


                                                 foreach($cek_users as $us){

                                                    echo $us->first_name; echo " "; echo $us->last_name;
                                                 }
                                                 */

                                              ?>


                               <?php     

                                  ?>
                                  
                      
                  </a>
                </div>
              </div>
            <?php endforeach; ?>


              
              </div>
          
          </div>