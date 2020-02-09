<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Konfirmasi Produk</title>

		<!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/fav.png"/>
	</head>
  <body>

    
    <!-- Page Title Section
    ================================================= -->
    <div class="page-title-section faq">
      <div class="container">
        <div class="headline">
          <h1 class="title">Konfirmasi Pengajuan</h1>
            <h4 align="center"> </h4> <br/>  
        </div>
      </div>
    </div><!-- .page-header faq -->

    <div id="page-contents">
      <div class="container ">

        <!-- FAQ Menu
        ================================================= -->
        <!--<ul class="nav nav-tabs faq-cat-list">
          <li class="active"><a href="#faq_cat_1" data-toggle="tab"><i class="icon ion-ios-checkmark"></i><strong> Diterima </strong></a></li>
          <li><a href="#faq_cat_2" data-toggle="tab"><i class="icon ion-android-create"></i>Direvisi</a></li>
          <li><a href="#faq_cat_3" data-toggle="tab"><i class="icon ion-close-circled"></i>Ditolak</a></li>
        </ul>--><!-- .faq-cat-list -->
      
        <div class="row">
            <div class="col-sm-2">
            </div>
        	<div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                    <h3 align="center"> Detail Permintaan</h3> <br/>
                        
                    <div class="table-responsive-md">
                      <table class="table table-hover">
                          <thead>

                          </thead>
                          <tbody>
                            <tr>
                                <td scope="row"> <strong>Nama </strong></td>
                                <td scope="row"> <?php echo $first_name;?></td>
                            </tr>
                            <tr>
                                <td scope="row"> <strong>Divisi </strong></td>
                                <td scope="row"> <?php echo $nama_divisi; ?></td>
                            </tr>
                            
                          </tbody>
                        </table>
                    </div>
                    </div>
                    
                    <div class="col-sm-12">
                    
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
          
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
                <h3 align="center"> Barang </h3> <br/>
                    <div class="table-responsive-md">

                       <form method="POST" action="<?php echo base_url(); ?>toko/simpan_konfirmasi_toko">
                      <table class="table table-hover">
                          <thead>
                            <th scope="col" style="text-align: center;"> No. </th>
                            <th scope="col"> Produk </th>
                            <th scope="col"> Deskripsi       </th>
                            <th scope="col"> Kuantitas </th>
                            <th scope="col"> Tanggal Permintaan     </th>
                            <th scope="col"> Tanggal Dibutuhkan       </th>
                            <th scope="col"> PIC     </th>
                            <th scope="col"> Aksi   </th>                  
                            <th scope="col" class="text-center"> Pilih   </th>                  
                          </thead>
                          

                           <tbody>
                        <?php 
                        $count_daftar=count($daftar_permintaan_barang);
                        $no=1;
                        foreach($daftar_permintaan_barang as $row):?>
                        <tr>
                          <td>
                            <?php echo $no++; ?>
                          </td>
                           <td>
                           <a class="produk_button" data-id="<?php echo $row->id_detail;?>" style="cursor: pointer;"><?php echo $row->nama_barang; ?></a>
                         </td>
                           <td><?php echo $row->deskripsi_produk; ?></td>
                           <td><?php echo $row->qty; ?> <?php echo $row->satuan; ?></td>
                           <td><?php echo $row->tanggal_daftar; ?></td>
                           <td><?php echo $row->tanggal_dibutuhkan; ?></td>
                           <td>
                             <?php echo $row->first_name; ?> <?php echo $row->last_name; ?>
                           </td>
                         <?php if($row->id_pengajuan==0) { ?>
                         <td>
                           <?php
                                if($row->draft==4){ ?>
                                      <select class="form-control" name="status[]"> 
                                          <option value="5">Diterima</option>
                                          <option value="6">Ditolak</option>
                                          <option value="7">Direvisi</option>
                                      </select>
                                <?php  }elseif($row->draft==5){
                            ?>
                                       <select class="form-control" name="status[]"> 
                                        <?php if($row->draft=="4"){?>
                                          <option value="5">Diterima</option>
                                        <?php }elseif($row->draft=="5"){ ?>
                                           <option value="0">Diterima</option>
                                        <?php } ?>
                                          <option value="6">Ditolak</option>
                                          <option value="7">Direvisi</option>
                                      </select>
                           <?php }elseif($row->draft==0){ ?>
                                       <button class="btn btn-sm btn-warning">Proses Purchase Request</button>
                           <?php }elseif($row->draft==6){ ?>
                                        <button class="btn btn-sm btn-danger">Ditolak
                                         <?php
                                                    if($row->groupid=="15"){
                                                      echo "Kacab";
                                                    }elseif($row->groupid=="23"){
                                                      echo "Kepala Regional";
                                                    }
                                          ?>
                                        </button>
                           <?php } ?>
                        </td>
                       <?php } ?>
                        <td>
                          <input type="checkbox" name="id_detail[]" class='chk' value="<?php echo $row->id_detail; ?>">
                          <input type="hidden" name="draft[]"  value="<?php echo $row->draft; ?>">
                           <input type="hidden" name="id_user[]"  value="<?php echo $row->id_user; ?>">
                        </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if($count_daftar >0) {?>
                <div align="left">
                             <button type="submit" class="btn btn-success" id="edit_data-btn"> Selesai </button>
                </div>
              <?php } ?>
                        </table>
                    </div>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
      </form>
          <?php/*
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                 
                <div class="table-responsive-lg">
                <h3 align="center"> History Pengajuan </h3> <br/>  
                
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;width:5%;"> No. </th>
                            <th scope="col"> Status </th>
                            <th scope="col"> Oleh </th>
                            <th scope="col"> Catatan </th>
                            <!--<?php
                             foreach($history as $aso){
                                 $user_lampiran=$aso->lampiran;
                             } ?>-->
                            <th scope="col"> Lampiran </th>
                            <th scope="col"> Tanggal Persetujuan </th>
                        </tr>
                    </thead>
                    <tbody>
                      <!--<?php
                           $no=1;
                           $count_history=count($history);
                           if($count_history > 0){
                           foreach($history as $an): ?>-->
                        <tr>
                          <td style="text-align: center;"><!--<?php echo $no++; ?>--></td>
                          <td>
                            <!--<?php
                            $status_terakhir=$an->status;
                            if($status_terakhir==0){
                                  echo "Menunggu Persetujuan";
                            }elseif($status_terakhir==1){
                              echo "Disetujui";
                            }elseif($status_terakhir==2){
                              echo "Ditolak";
                            }elseif($status_terakhir==3){
                              echo "Dikembalikan dengan revisi";
                            }
                            $user_penerima=$an->id_penerima;
                            $lampiran_history=$an->lampiran_history;
                            $urutan=$an->urutan;
                            $next_urutan=$urutan+1;
                            $last_status=$an->status;
                            $next=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
                                    ?>
                                    <?php
                                   foreach($next as $ne){ 
                                          echo $ne->nama_group;
                                    }
                                    ?>-->
                          </td>
                          <td>
                          <!--<?php
                               $id_setuju=$an->id_user_approval;
                               if($id_setuju==0){
                                  $cek_setuju=$this->Pengajuan_model->user_by_id($user_penerima);    
                               }else{
                                  $cek_setuju=$this->Pengajuan_model->user_by_id($id_setuju);   
                               }
                            
                              foreach($cek_setuju as $se){
                               echo $se->first_name;
                               echo " ";
                               echo $se->last_name;
                              }
                          ?>-->
                          </td>
                          <td>
                            <!--<?php echo $an->catatan; ?>-->
                          </td>
                          <td>
                            <!--<?php if($lampiran_history){?>-->
                            <a href="<?php echo base_url(); ?>Pengajuan/lakukan_download_history/<?php echo $an->id_history; ?>">
                                Unduh
                              </a>
                            <!--<?php } ?>-->
                          </td>
                          <td>
                            <!--<?php if($an->tanggal !=0000-00-00){
                             echo date_indo($an->tanggal); 
                           }?>-->
                          </td> 
                        </tr>
                      <!--<?php endforeach; ?>
                    <?php }else{ ?>-->
                             <td colspan="6" align="center">Tidak ada riwayat pengajuan! Permintaan belum dikirim!</td>
                    <!--<?php } ?>-->
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-sm-2">
            </div>

            */
            ?>
                
        </div>
      </div>
    </div>

   
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <!-- Scripts
    ================================================= -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    
  </body>
</html>
