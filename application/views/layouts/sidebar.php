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
<?php if($log->foto){?>
              <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $log->foto; ?>" alt="user" class="profile-photo" />
<?php } ?>
              <h5><a href="<?php echo base_url(); ?>ubah-kata-sandi" class="text-white"><?php echo $log->first_name; echo " "; echo $log->last_name; ?></a></h5>
              <i class="ion ion-android-person-add"></i> <?php echo count($per_bel_selesai); ?> permintaan belum selesai
            </div>
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="<?php echo base_url(); ?>beranda">Halaman Utama</a></div></li>
<!--
              <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>daftar-permintaan-barang-non-dagang">Daftar Permintaan Saya</a></div></li>
            -->


		<?php
		$group_gm = array('manager','general manager','kepala regional');
        if ($this->ion_auth->in_group($group_gm)){ ?>
 			<li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>daftar-persetujuan">Daftar Konfirmasi Purchase Request </a></div></li>
            <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>history-persetujuan">Riwayat Konfirmasi Purchase Request</a></div></li>
		<?php } ?>

   <?php 
    $group_gm = array('general manager');
        if ($this->ion_auth->in_group($group_gm)){ ?>
      <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>User_pengajuan/daftar_persetujuan_purchase_order">Daftar Konfirmasi Purchase Order </a></div></li>
  
    <?php } ?>


    <?php 
    /*
    $group_toko= array('toko');
        if ($this->ion_auth->in_group($group_toko)){ ?>
      <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>Toko/daftar_konfirmasi_produk">Daftar Konfirmasi Produk</a></div></li>
    <?php }*/ ?>


    <?php 
    /*
		$group_gm = array('pic','purchasing');
						if ($this->ion_auth->in_group($group_gm) || ($this->ion_auth->in_group($group_gm)) and $ID  !='82'){ ?>
						  <!--
		 <li><i class="icon ion-ios-people"></i><div><a href="<?php echo base_url(); ?>daftar-persetujuan-pr">Daftar Pengajuan Purchase Request </a></div></li>
		-->

		<li><i class="icon ion-ios-pricetag" style="color:#FFE80C;"></i><div><a href="<?php echo base_url(); ?>pic-daftar-barang">Daftar Permintaan Non Dagang </a></div></li>
*/
    ?>

<?php

    $group_gmm = array('members');
            if ($this->ion_auth->in_group($group_gmm)){ ?>
		<li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>daftar-purchase-request">Daftar Purchase Request</a></div></li>
  <?php } ?>
	

     
      
		<?php

		$group_gmm = array('purchasing');
						if ($this->ion_auth->in_group($group_gmm)){ ?>
		
		<li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>User_pengajuan/list_pr_terima">Daftar Permintaan Purchase Order</a></div></li>
		
		<li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>User_pengajuan/list_purchase_order">Unduh CSV Purchase Order</a></div></li>
		<?php } ?>



		<?php

		$group_nota = array('non');
						if ($this->ion_auth->in_group($group_nota)){ ?>
		 <li><i class="icon ion-ios-filing" style="color:#e41032;"></i><div><a href="<?php echo base_url(); ?>daftar-nota">Daftar Nota </a></div></li>
					 
		<?php } ?>
<?php
      $group_gm = array('general manager','purchasing','finance');
      if ($this->ion_auth->in_group($group_gm)){ ?>
      <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>User_pengajuan/daftar_purchase_order_selesai">Laporan Purchase Order Selesai </a></div></li>
      <!--
       <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>User_pengajuan/daftar_purchase_request_selesai">Laporan Purchase Request Selesai </a></div></li>
     -->
  
    <?php } ?>


               <?php
                $group_master = array('admin');
                if ($this->ion_auth->in_group($group_master)){ ?>
<!--
                  <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>Masterer/mst_jenis_request">Jenis Request</a></div></li>
                -->
                    <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>Masterer/supplier">Supplier</a></div></li>
                    <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>Masterer/divisi">Divisi</a></div></li>
                    <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>Masterer/jabatan">Jabatan</a></div></li>
                     <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>Masterer/kategori">Kategori</a></div></li>
                    
<li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>Masterer/master_barang">Produk</a></div></li>
<li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>Masterer/daftar_lainnya">Daftar Lainnya</a></div></li>
                    <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>Masterer/kepala_regional">Pengaturan Kepala Regional</a></div></li>
                    <!--
                    <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo base_url(); ?>Masterer/aturan">Aturan Request</a></div></li>
                  -->

                    <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url();?>user">Pengaturan Pengguna</a></div></li>

                    

                <?php } ?>

                 <?php
                $group_hrd = array('HRD');
                if ($this->ion_auth->in_group($group_hrd)){ ?>

                  <li><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i><div><a href="<?php echo base_url(); ?>hrd-detail-pekerjaan">Daftar Pegawai</a></div></li>
                  
  
                    

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
                  <!--
                  <a href="<?php echo base_url(); ?>tambah-detail-purchase-request/<?php echo $daf->id_pengajuan; ?>" class="text-green">
                  -->
                    
                    <?php
                                   $id_permintaan=$daf->id_pengajuan;
                                   $id_jenis_request=$daf->id_jenis_request;
                                   $status_terakhir=$this->user_pengajuan_model->cek_history_terakhir_pr($id_permintaan);
                                   foreach($status_terakhir as $ter){
                                    
                                    $groupid=$ter->groupid;
                                    $status_history=$ter->status;   
                                   } ?>  

                                   <?php
                                     $group_id=$groupid;
                            if($group_id=="16"){
                              echo "Proses Purchase Order"; 
                            }elseif(($group_id=="15") or ($group_id=="14")){
                              if($status_history==0){
                                echo "Menunggu Persetujuan";
                              }elseif($status_history==1){
                                echo "Diterima";
                              }elseif($status_history==2){
                                echo "Ditolak";
                              }elseif($status_history==3){
                                echo "Direvisi";
                              }
                            }
                            ?>

                               &nbsp;
                            <?php
                            $groupss=$this->user_pengajuan_model->get_groups_id($group_id);
                             foreach($groupss as $gr){
                                 echo $gr->name;
                             }

                                   ?>
                                   
                                  
                       <!--
                  </a>
                -->
                </div>
              </div>
            <?php endforeach; ?>


              
              </div>
          
          </div>