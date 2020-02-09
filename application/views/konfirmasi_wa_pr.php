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
          <h1 class="title">Konfirmasi Pengajuan <i>Purchase Request</i></h1>
            <h4 align="center"> <i>Purchase Request</i> No. <?php echo $no_pengajuan; ?></h4> <br/>  
        </div>
      </div>
    </div><!-- .page-header faq -->

    <div id="page-contents">
      <div class="container ">

        <!-- FAQ Menu
        ================================================= -->
        <!--
        <ul class="nav nav-tabs faq-cat-list">
          <li class="active"><a href="<?php echo base_url(); ?>Login_User/simpan_keputusan_email?status_approval=1&email=<?php echo $email_asli; ?>&id_pengajuan=<?php echo $id_pengajuan; ?>&id_pengirim=<?php echo $id_pengirim; ?>&id_jenis_request=<?php echo $id_jenis_request; ?>&lampiran=<?php echo $lampiran; ?>&urutan=<?php echo $urutan; ?>&nama_divisi=<?php echo $nama_divisi; ?>' style="cursor: pointer;"><i class="icon ion-ios-checkmark"></i><strong> Diterima </strong></a></li>
        -->

<!--
          <li><a href="<?php echo base_url(); ?>Login_User/simpan_keputusan_email?status_approval=3&email=<?php echo $email_asli; ?>&id_pengajuan=<?php echo $id_pengajuan; ?>&id_pengirim=<?php echo $id_pengirim; ?>&id_jenis_request=<?php echo $id_jenis_request; ?>&urutan=<?php echo $urutan; ?>&nama_divisi=<?php echo $nama_divisi; ?>' style="cursor: pointer;"><i class="icon ion-android-create"></i>Direvisi</a></li>
-->

<!--
          <li><a href="<?php echo base_url(); ?>Login_User/simpan_keputusan_email?status_approval=2&email=<?php echo $email_asli; ?>&id_pengajuan=<?php echo $id_pengajuan; ?>&id_pengirim=<?php echo $id_pengirim; ?>&id_jenis_request=<?php echo $id_jenis_request; ?>&urutan=<?php echo $urutan; ?>&nama_divisi=<?php echo $nama_divisi; ?>' style="cursor: pointer;"><i class="icon ion-close-circled"></i>Ditolak</a></li>
        </ul>

      --><!-- .faq-cat-list -->
      
        <div class="row">
            <div class="col-sm-2">
            </div>
        	<div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                    <h3 align="center"> Detail <i>Purchase Request<br>
<?php 
/*

               echo $email_asli;
               echo "<br>";
               echo $id_pengajuan;

               echo "<br>";
               echo $id_pengirim;
               echo "<br>";
               echo $id_jenis_request;
               echo "<br>";
               echo $urutan;
               echo "<br>";
               echo $nama_divisi;
               */
        ?>


                    </i></h3> <br/>
                        
                    <div class="table-responsive-md">
                      
                      <table class="table table-hover">
                           <?php foreach($permintaan_ajuan as $item): ?>
                    <tbody>
                        <tr>
                            <td scope="row"> Nama PIC</td>
                            <td scope="row"> <?php echo $item->first_name; echo " ";echo $item->last_name; ?> </td>
                        </tr>
                        <tr>
                            <td scope="row"> Divisi </td>
                            <td scope="row"> <?php echo $item->nama_divisi; ?> </td>
                        </tr>
                        <tr>
                            <td scope="row"> Jabatan </td>
                            <td scope="row"> <?php echo $item->nama_jabatan; ?></td>
                        </tr>
                        <tr>
                            <td scope="row"> Tanggal Permintaan </td>
                            <td scope="row"> <?php echo date_indo($item->tanggal_pengajuan); ?> </td>
                        </tr>
                        <tr>
                            <td scope="row"> Tanggal Pemenuhan Terakhir </td>
                            <td scope="row"> <?php echo date_indo($item->tanggal_required); ?></td>
                        </tr>
                        <tr>
                            <td scope="row"> Jenis Permintaan </td>
                            <td scope="row"> <?php echo $item->jenis_request; ?></td>
                        </tr>
                         <tr>
                            <td scope="row"> Alokasi </td>
                            <td scope="row"> <?php echo $item->nama_gedung; ?></td>
                        </tr>
                        <tr>
                            <td scope="row"> Keterangan </td>
                            <td scope="row"><?php echo $item->keterangan; ?></td>
                        </tr>
                        <!--
                        <tr>
                            <td scope="row"> Status Terakhir </td>
                            <td scope="row"> 
                              <?php if($item->draft==1){ ?>
                                    <i>Purchase Request</i> belum dikirim
                              <?php }elseif($item->draft==0){ ?>
                            <?php
                            $status_terakhir=$item->status;
                            if($status_terakhir==0){
                                  echo "Menunggu Persetujuan";
                            }elseif($status_terakhir==1){
                              echo "Disetujui";
                            }elseif($status_terakhir==2){
                              echo "Ditolak";
                            }elseif($status_terakhir==3){
                              echo "Dikembalikan dengan revisi";
                            }   
                             ?>
                              <?php } ?>
                            </td>
                        </tr>
                      -->
                        <?php $tambahan_ppn=$item->ppn;?>
                         <?php if($item->lampiran){ ?>
                         <tr>
                            <td scope="row"> Lampiran </td>
                            <td scope="row">
                              <a href="<?php echo base_url(); ?>Pengajuan/lakukan_download/<?php echo $item->id_pengajuan; ?>">
                                Unduh
                              </a>     
                            </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  <?php endforeach ; ?> 
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
                        <tr>
                            <th scope="col" style="text-align: center;"> No. </th>
                            <th scope="col"> Produk  </th>
                            <th scope="col"> Deskripsi  </th>
                            <th scope="col"> Kuantitas       </th>
                            <th scope="col"> Harga  </th>
                            <th scope="col"> Subtotal     </th>
                            <!--
                            <th scope="col"> Supplier    </th>
                            <th scope="col"> Penerima     </th>
                            <th scope="col"> Pembayaran   </th>
                          -->
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                         $jumlah_detail_barang=count($detail_barang);
                         if($jumlah_detail_barang >0){
                         $nom=1;
                           $jumlah_qty=0;
                           $jumlah_harga=0;
                           $jumlah_tharga=0;
                         foreach($detail_barang as $det) :
                            $jumlah_qty +=$det->qty_barang;
                            $jumlah_harga +=$det->harga;
                            $jumlah_tharga +=$det->tharga;  
                        ?>
                        <tr>
                             <td style="text-align: center;"><?php echo $nom++; ?></td>
                             <td><?php echo $det->nama_barang; ?></td>
                             <td><?php echo $det->deskripsi_produk; ?></td>
                             <td align="center"><?php echo $det->qty_barang; ?>  <?php echo $det->satuan; ?></td>
                             <td><?php echo number_format($det->harga); ?></td>
                             <td><?php echo number_format($det->tharga); ?></td>
                             <!--
                             <td> 
                              <?php
                                $vendor=$det->id_vendor;
                                $cek_bank=$this->Pengajuan_model->cek_bank($vendor);
                                foreach($cek_bank as $bak){
                                $nama_bank=$bak->nama_bank;
                               }
                              ?>
                                          <a href="#"  data-toggle="modal" data-target="#VendorModal"
                                             data-nama_vendor="<?php echo  $det->nama_vendor; ?>" 
                                             data-no_rekening_vendor="<?php echo  $det->no_rekening_vendor; ?>"
                                             data-alamat_vendor="<?php echo  $det->alamat_vendor; ?>"
                                             data-nama_bank="<?php echo  $nama_bank; ?>" class="button_vendor">
                                             <?php echo $det->nama_vendor; ?></a>
                            </td>
                             <td>  <?php echo $det->first_name;?> <?php echo $det->last_name; ?> | <?php echo $det->nama_divisi; ?></td>
                             <td>
                                <?php
                                   if($det->metode_pembayaran==1){?>
                                       Tunai
                                   <?php }elseif($de->metode_pembayaran==2){ ?>
                                       Transfer
                                <?php } ?>
                            </td>
                          -->
                        </tr>
                      <?php endforeach;?> 
                      <tr>
                         <td colspan="3" align="center">
                             <b>Total</b>
                         </td>
                         <td align="center">
                              <?php echo $jumlah_qty; ?>
                         </td>
                         <td><?php echo number_format($jumlah_harga); ?></td>
                         <td colspan="5"><?php echo number_format($jumlah_tharga); ?></td>
                     </tr>
                    <?php  
                  
                    if($tambahan_ppn) { ?>
                      <tr>
                         <td colspan="3" align="center">
                             <b><?php echo $item->tipe_pajak; ?></b>
                         </td>
                         <td align="center">
                         </td>
                         <td><?php echo $tambahan_ppn; ?> %</td>
                         <td colspan="5">
                            <?php
                                 $pajak=($tambahan_ppn/100)*$jumlah_tharga;
                                 $jumlah_pajak=$jumlah_tharga+$pajak;
                                 
                            ?>
                            <?php echo number_format($pajak); ?> 
                          </td>
                     </tr>
                     <tr>
                         <td colspan="3" align="center">
                             <b>Total Keseluruhan</b>
                         </td>
                         <td align="center">
                         </td>
                         <td></td>
                         <td colspan="5">
                          <?php echo number_format($jumlah_pajak); ?></td>
                     </tr>
                   <?php } ?>
 
                 <?php }else{ ?>
                           <tr>
                              <td colspan="9" align="center"> Tidak ada barang! </td>
                           </tr>
                 <?php } ?>
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
                           $no=1;
                           $count_history=count($history);
                           if($count_history > 0){
                           foreach($history as $an): ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $no++; ?></td>
                          <td>
                            <?php 
                            $group_id=$an->groupid;
                            if($an->groupid=="16"){
 
                              echo "Proses Purchase Order"; 
                            }elseif(($an->groupid=="15") or ($an->groupid=="14") or ($an->groupid=="23") ){
                              if($an->status==0){
                                echo "Menunggu Persetujuan";
                              }elseif($an->status==1){
                                echo "Diterima";
                              }elseif($an->status==2){
                                echo "Ditolak";
                              }elseif($an->status==3){
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

                                  -->
                          </td>
                          <td>
                          <?php
                               $id_setuju=$an->id_user_approval;
                               
                                  $cek_setuju=$this->Pengajuan_model->user_by_id($id_setuju);   
                               
                            
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
     



    <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                 
                <div class="table-responsive-lg">
                <h3 align="center"> Keputusan </h3> <br/>  
                <form method="GET" action="<?php echo base_url(); ?>Login_User/simpan_keputusan_email">
                <table class="table table-striped table-hover table-bordered">
                    
                        <tr>
                          <td>Keputusan</td>
                           <td>
                             <select class="form-control" name="status_approval"><option value="1">Disetujui</option>
                              <option value="3">Ditolak</option>

                             </select>
                           </td>
                           <input type="hidden" name="email" value="<?php echo $email_asli; ?>">
                            <input type="hidden" name="id_pengajuan" value="<?php echo $id_pengajuan; ?>">
                            <input type="hidden" name="id_pengirim" value="<?php echo $id_pengirim; ?>">

                             <input type="hidden" name="id_jenis_request" value="<?php echo $id_jenis_request; ?>">
                             <input type="hidden" name="lampiran" value="<?php echo $lampiran; ?>">

                             <input type="hidden" name="urutan" value="<?php echo $urutan; ?>">

                              <input type="hidden" name="nama_divisi" value="<?php echo $nama_divisi; ?>">
                        </tr>
                         <tr>
                           <td>Catatan</td>
                           <td>
                            <textarea class="form-control" name="catatan"></textarea>
                           </td>
                        </tr>
                         <tr>
                           <td colspan="2">
                            <button type="submit" class="btn btn-info"> Kirim</button>
                           </td>
                        </tr>

                   
                   
                </table>
                </div>
              </form>
            </div>
            <div class="col-sm-2">
            </div>
            
                
        </div>
      </div>
    </div>

    
   

    
   

    <!-- Scripts
    ================================================= -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    
  </body>
</html>
