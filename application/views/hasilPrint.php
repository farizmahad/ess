<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Surat Tugas Setwan</title>
		
        <style>
			/*
			table, td, th {
			  border: 1px solid black;
			  text-align: center;
			}
			*/
			
			.table1.td1{
				border: 0px solid black;
				text-align: center;
			}
			
			.td2 {
				text-align: center;
			}
			
			.table2{
				width: 100%;
				font-size: 10px;
			}

			.riwayat{
				width: 100%;
				font-size: 10px;
			}

			.pic{
				width: 100%;
				font-size: 10px;
			}
			
			.table3{
				border-collapse: collapse;
				width: 100%;
				font-size: 10px;
			}
			
			.hr1{
				height: 4px;
				color: black;
			}
			
			table {
			  border-collapse: collapse;
			  width: 100%;
			}

			th {
			  height: 50px;
			}
        </style>
    </head>
 
    <body>
    	
		<table class="table1 td1">
		  <tr>
			<td>
				<!--<img src="http://news.bursasajadah.com/wp-content/uploads/2019/01/Logo-Cimahi.png" align="center" width="50px">
				--></td>
			<td class="table1 td1">
				<h3>FORM PERMINTAAN PEMBELIAN</h3>
				<!--
				<p style="font-size: 12px;">Jl. Dra. Hj. Djulaeha Karmita No. 5 Kota Cimahi Telp. / Fax. (022) 6633315 - 6641809<br></p>
			-->
			</td>
		  </tr>
		  
		  <tr>
			<td class="table1 td1"colspan="4"> <hr class="hr1"> </td>
		  </tr>
		</table>
		<?php foreach($permintaan_ajuan as $item):?>
		<h4 align="center"><strong><span style="text-decoration: bold;">Form Permintaan Pembelian&nbsp;</span></strong><br><strong>Nomor: <?php echo $item->no_pengajuan; ?></strong><br></h4>
		<p style="font-size: 14px; text-align:center;"></p>
		
		
		<table class="pic">
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


		</table>
		<br/>
		
		
		<?php endforeach;?>
		<table>
			<tr>
				<td> Produk </td>
			</tr>
		</table>
		
		<table class="table2" border="1">
		  <tr>
                            <th style="text-align: center;"> No. </th>
                            <th> Produk  </th>
                            <th> Deskripsi  </th>
                            <th> Kuantitas       </th>
                              <th> Satuan       </th>
                            <th> Harga  </th>
                            <th> Subtotal     </th>
                            <th> Supplier    </th>
                            <th> Penerima     </th>
                            <th> Pembayaran   </th>
                        </tr>


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
                             <td align="center"><?php echo $det->qty_barang; ?></td>
                             <td><?php echo $det->unit; ?></td>
                             <td><?php echo number_format($det->harga); ?></td>
                             <td><?php echo number_format($det->tharga); ?></td>
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
                        </tr>
                      <?php endforeach;?> 
                      <tr>
                         <td colspan="3" align="center">
                             <b>Total</b>
                         </td>
                         <td align="center">
                              <?php echo $jumlah_qty; ?>
                         </td>
                         <td></td>
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
                              <td colspan="10" align="center"> Tidak ada barang! </td>
                           </tr>
                 <?php } ?>
                  
		   
		  
		</table>
		<br/> <br/>
		<table border="1" class="riwayat">
			 <tr>
                            <th scope="col" style="text-align: center;width:5%;"> No. </th>
                            <th scope="col"> Status </th>
                            <th scope="col"> Oleh </th>
                            <th scope="col"> Catatan </th>

                            <th scope="col"> Tanggal Persetujuan </th>
                        </tr>

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
                            }elseif(($an->groupid=="15") or ($an->groupid=="14") ){
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
                            <?php if($an->tanggal !=0000-00-00){
                             echo date_indo($an->tanggal); 
                           }?>
                          </td> 
                        </tr>
                      <?php endforeach; ?>
                    <?php }else{ ?>
                             <td colspan="6" align="center">Tidak ada riwayat pengajuan! Permintaan belum dikirim!</td>
                    <?php } ?>
			
		</table>
		<br/>
		
		
	
    </body>

</html>