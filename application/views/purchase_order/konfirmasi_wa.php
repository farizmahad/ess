<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Konfirmasi Purchase Order</title>

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

    
    <!-- Page Title Section
    ================================================= -->
    <div class="page-title-section faq">
      <div class="container">
        <div class="headline">
          <h1 class="title">Konfirmasi Pengajuan <i>Purchase Order</i></h1>
            <h4 align="center"> <i>Purchase Order</i> No. <?php echo $no_permintaan; ?></h4> <br/>  
        </div>
      </div>
    </div><!-- .page-header faq -->

    <div id="page-contents">
      <div class="container ">

        <!-- FAQ Menu
        ================================================= -->
        <ul class="nav nav-tabs faq-cat-list">
          <li class="active"><a href="<?php echo base_url() ?>Purchase_order/simpan_keputusan_wa?id_po=<?php echo $id_po; ?>&status_approval=1&groupid=<?php echo $groupid; ?>&no_telepon=<?php echo $no_wa; ?>&id_jenis_request=<?php echo $id_jenis_request; ?>"><i class="icon ion-ios-checkmark"></i><strong> Diterima </strong></a></li>
          <li><a href="<?php echo base_url() ?>Purchase_order/simpan_keputusan_wa?id_po=<?php echo $id_po; ?>&status_approval=3&groupid=<?php echo $groupid; ?>&no_telepon=<?php echo $no_wa; ?>&id_jenis_request=<?php echo $id_jenis_request; ?>"><i class="icon ion-android-create"></i>Direvisi</a></li>
          <li><a href="<?php echo base_url() ?>Purchase_order/simpan_keputusan_wa?id_po=<?php echo $id_po; ?>&status_approval=2&groupid=<?php echo $groupid; ?>&no_telepon=<?php echo $no_wa; ?>&id_jenis_request=<?php echo $id_jenis_request; ?>"><i class="icon ion-close-circled"></i>Ditolak</a></li>
        </ul><!-- .faq-cat-list -->
      
        <div class="row">
            <div class="col-sm-2">
            </div>
        	<div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                    <h3 align="center"> Detail <i>Purchase Order</i></h3> <br/>
                        
                    <div class="table-responsive-md">
                      <?php foreach($detail_po as $item):?>
                      <table class="table table-hover">
                          <thead>

                          </thead>
                          <tbody>
                            <tr>
                                <td scope="row"> <strong>Nama PIC</strong></td>
                                <td scope="row"> <?php echo $item->first_name; echo " ";echo $item->last_name; ?> </td>
                            </tr>
                            <tr>
                                <td scope="row"> <strong>Divisi </strong></td>
                                <td scope="row"> <?php echo $item->nama_divisi; ?> </td>
                            </tr>
                            <tr>
                                <td scope="row"> <strong>Jabatan </strong></td>
                                <td scope="row"> <?php echo $item->nama_jabatan; ?></td>
                            </tr>
                            <tr>
                                <td scope="row"> <strong>Tanggal Transaksi </strong></td>
                                <td scope="row"> <?php echo date_indo($item->tgl_transaksi); ?> </td>
                            </tr>
                            <tr>
                                <td scope="row"> <strong>Tanggal Jatuh Tempo </strong></td>
                                <td scope="row"> <?php echo date_indo($item->tgl_jatuh_tempo); ?></td>
                            </tr>
                            <tr>
                                <td scope="row"> <strong>Jenis Permintaan </strong></td>
                                <td scope="row"> Non Dagang</td>
                            </tr>
                            <tr>
                                <td scope="row"> <strong>Supplier </strong></td>
                                <td scope="row"><?php echo $item->nama_supplier; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>Email </strong></td>
                                <td scope="row"><?php echo $item->email; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>Tanggal Pengiriman </strong></td>
                                <td scope="row"><?php echo $item->tgl_pengiriman; ?></td>
                            </tr>
                              <tr>
                                <td scope="row"> <strong>No. Pelacakan </strong></td>
                                <td scope="row"><?php echo $item->no_pelacakan; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>No. Referensi Vendor </strong></td>
                                <td scope="row"><?php echo $item->no_referensi; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>Tag </strong></td>
                                <td scope="row"><?php echo $item->tag; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>Nama syarat pembayaran </strong></td>
                                <td scope="row"><?php echo $item->nama_syarat_pembayaran; ?></td>
                            </tr>
                            <tr>
                                <td scope="row"> <strong>Nama Gudang </strong></td>
                                <td scope="row"><?php echo $item->nama_gudang; ?></td>
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
                <h3 align="center"> Produk </h3> <br/>
                    <div class="table-responsive-md">
                      <table class="table table-hover">
                          <thead>
                             <!--<td> <strong>No.</strong></td>-->
                                                        <td> <strong>Produk</strong></td>
                                                        <td> <strong>Deskripsi</strong></td>
                                                        <td> <strong>Kuantitas </strong></td>
                                                        <td> <strong>Satuan</strong></td>
                                                        <td> <strong>Harga Satuan</strong></td>
                                                        <td> <strong>Diskon</strong></td>
                                                        <td> <strong>Pajak</strong></td>
                                                        <td> <strong>Subtotal Produk</strong></td>     
                                                        <td> <strong>Subtotal Pajak</strong></td>   
                                                        <td> <strong>Subtotal </strong></td>      
                          </thead>
                          <tbody>

                                                   <?php 
                                                   $diskon_baris=0;
                                                   $an=0;
                                                   $pen=0;
                                                   foreach($permintaan as $pro):?>
                                                <tr>
                                                    <td>
                                                        <?php echo $pro->nama_barang; ?>
                                                    </td>
                                                     <td>
                                                        <?php echo $pro->deskripsi; ?>
                                                    </td>
                                                     <td>
                                                        <?php echo $pro->qty_po; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $pro->unit; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($pro->harga_po); ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                             $diskon_baris += $pro->diskon/100 * $pro->tharga_po;
                                                        ?>
                                                        <?php echo $pro->diskon; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $pro->nama_tax; ?>
                                                    </td>
                                                     <td>
                                                        
                                                        <?php echo number_format($pro->tharga_po); ?>
                                                    </td>
                                                    <td>
                                                        
                                                        <?php echo number_format($pro->jumlah_pajak); ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                             $an +=$pro->subtotal;
                                                        ?>
                                                        <?php echo number_format($pro->subtotal); ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                                <tr>
                                                    <td colspan="9">Subtotal</td>
                                                    <td><?php echo number_format($an); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">Diskon Per baris</td>
                                                    <td><?php echo $diskon_baris; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">Diskon</td>
                                                    <td><?php echo $item->diskon_all; ?> %</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">Total</td>
                                                    <td><?php echo number_format($item->total_bayar); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">Uang Muka</td>
                                                    <td><?php echo number_format($item->uang_muka); ?></td>
                                                </tr>
<tr>
                                                    <td colspan="9">Sisa Tagihan</td>
                                                    <td><?php echo number_format($item->sisa_tagihan); ?></td>
                                                </tr>
                            
                          </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
          
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
                            <?php
                             foreach($history as $aso){
                                 $user_lampiran=$aso->lampiran;
                             } ?>
                            <th scope="col"> Lampiran </th>
                            <th scope="col"> Tanggal Persetujuan </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                       $lampiran_history="";
                           $no=1;
                           $count_history=count($history);
                           if($count_history > 0){
                           foreach($history as $an): ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $no++; ?></td>
                          <td>
                            <?php
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
                                    ?>
                          </td>
                          <td>
                          <?php
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
                          ?>
                          </td>
                          <td>
                            <?php echo $an->catatan; ?>
                          </td>
                          <td>
                            <?php if($lampiran_history){?>
                            <a href="<?php echo base_url(); ?>Pengajuan/lakukan_download_history/<?php echo $an->id_history; ?>">
                                Unduh
                              </a>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if($an->tanggal !=0000-00-00){
                             echo date_indo($an->tanggal); 
                           }?>
                          </td> 
                        </tr>
                      <?php endforeach; ?>
                    <?php }else{ ?>
                             <td colspan="6" align="center">Tidak ada riwayat pengajuan! Permintaan belum dikirim!</td>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-sm-2">
            </div>
            
                
        </div>
      </div>
    </div>

     <?php endforeach; ?>
    <!--preloader-->
   

    <!-- Scripts
    ================================================= -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    
  </body>
</html>
