<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title> Tes E-Mail </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
                min-width: 100%!important;
            }
            
            .header{
                padding: 40px 30px 20px 30px;
            }
            
            .content{
                width: 100%;
                max-width: 600px;
                background-color: #ffffff;
            }
            
            .col425{
                width: 425px!important;
            }
            
            .subhead {
                font-size: 15px;
                color: #ffffff;
                font-family: sans-serif;
                letter-spacing: 10px;
            }
            
            .h1 {
                font-size: 33px;
                line-height: 38px;
                font-weight: bold;
            }
            
            .h2, .bodycopy, .bodycopy2{
                color: #153643;
                font-family: sans-serif;
                text-align: center;
            }
            
            .h2{
                padding: 0 0 15px 0;
                font-size: 24px;
                line-height: 28px;
                font-weight: bold;
            }
            
            .innerpadding {
                padding: 30px 30px 30px 30px;
            }
            
            .borderbottom {
                border-bottom: 1px solid #f2eeed;
            }
            
            .bodycopy{
                font-size: 16px;
                line-height: 22px;
            }
            
            .bodycopy2{
                font-size: 14px;
                line-height: 22px;
                font-weight: bold;
				text-align : center;
            }
            
            .buttonDiterima {
                text-align: center; 
                font-size: 18px; 
                font-family: sans-serif; 
                font-weight: bold; 
                padding: 0 30px 0 30px;
                background-color: cornflowerblue;
            }
            
            .buttonDitolak {
                text-align: center; 
                font-size: 18px; 
                font-family: sans-serif; 
                font-weight: bold; 
                padding: 0 30px 0 30px;
                background-color: crimson;
            }
            
            .buttonDirevisi {
                text-align: center; 
                font-size: 18px; 
                font-family: sans-serif; 
                font-weight: bold; 
                padding: 0 30px 0 30px;
                background-color: yellow;
            }
            
            .buttonDirevisi a{
                color: black; 
                text-decoration: none;
            }
            
            a {
                color: white; 
                text-decoration: none;
            }
            
            a:link {
              text-decoration: none;
            }

            a:visited {
              text-decoration: none;
            }

            a:hover {
              text-decoration: none;
            }

            a:active {
              text-decoration: none;
            }
            
            @media only screen and (min-device-width: 601px){
                .content{
                    width: 600px !important;
                }
            }
        </style>
    </head>
    
    <body yahoo bgcolor="#f6f8f1">
        <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <![endif]-->
                                <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td class="header" bgcolor="#c7d8a7">
                                            <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td height="70" style="padding: 0 20px 20px 0;">
                                                        <img class="img-fluid" src="http://bursasajadah.com/assets/logo.png">
                                                    </td>
                                                    <td>
                                                        <!--[if (gte mso 9)|(IE)]>
                                                        <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td>
                                                                <![endif]-->
                                                                    <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">
                                                                        <tr>
                                                                            <td height="70">
                                                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                                    <tr>
                                                                                        <td class="subhead" style="padding: 0 0 0 3px;">
                                                                                            BURSA SAJADAH
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="h1" style="padding: 5px 0 0 0;">
                                                                                            EMPLOYEE SELF SERVICE
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                <!--[if (gte mso 9)|(IE)]>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <![endif]-->
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="innerpadding borderbottom">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="h2" align="center">
                                                        #<?php echo $no_pengajuan; ?> | <?php echo $first_name; ?> <?php echo $last_name; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bodycopy">
                                                        ANDA TELAH MENGIRIMKAN PERMINTAAN DENGAN NOMOR <?php echo $no_pengajuan; ?>
                                                    </td>
                                                </tr>
												<tr>
                                                        <td align="bodycopy2" style="text-align: center;">
                                                            Status Permintaan anda saat ini adalah
                                                          

 
                                                   <br>

                                                   <?php
                                                  $status_terakhir=$this->user_pengajuan_model->cek_history_terakhir_pr($id_pengajuan);
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
                                   


                            
                              
                                  
                                                                   
                                                      
                                                        </td>
                                                    </tr>
                                                <!--<tr>
                                                    <td style="padding: 20px 0 30px 0;"> 
                                                        <table align="center">
                                                            <tbody>
                                                                <tr>
                                                                    <td> <strong> Nama Pegawai </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> Rani Pebrianti </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Divisi </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> IT </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Jabatan </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> Staff   </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Tanggal Permintaan </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> 07 Maret 2019 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Tanggal Dibutuhkan </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> 12 Maret 2019 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Jenis Permintaan </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> Barang </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Status Terakhir </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> Menunggu Persetujuan Manajer </strong></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>-->
                                            </table>





                                        </td>
                                    </tr>




                                   <td style="padding: 20px 0 30px 0;">
                                                        
                                                        <table align="center">
                                                            <tbody>
                                                                
                                                                
                                                                
                                                                <tr>
                                                                    <td> <strong> Tanggal Permintaan </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <?php echo  date('d F Y', strtotime($tanggal_pengajuan)); ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Tanggal Dibutuhkan </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <?php echo  date('d F Y', strtotime($tanggal_required)); ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Jenis Permintaan </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <?php echo  $jenis_request; ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Keterangan </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <?php echo  $ket; ?> </td>
                                                                </tr>
                                                               

                                                                <?php if($lampiran){?>



 <tr>
                                                                    <td> <strong> Lampiran </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> 
                              <a href="<?php echo base_url(); ?>Pengajuan/lakukan_download/<?php echo $id_pengajuan; ?>">
                                Unduh di sini
                              </a>
                                  
                                                                    </strong></td>
                                                                </tr>
                                                            <?php } ?>
                                                             


                                                            </tbody>
                                                        </table>

                                    
                                    <tr>
                                        <td style="padding: 20px 0 30px 0;"> 
                                            <table width="100%" border="1" align="center" style="border-collapse:collapse;">
                                                <thead align="center">
                                                    <tr>
                                                        <!--<td> <strong>No.</strong></td>-->
                                                        <td> <strong>Permintaan</strong></td>
                                                        <td> <strong>Qty</strong></td>
                                                        <td> <strong>Harga </strong></td>
                                                        <td> <strong>Subtotal</strong></td>
                                                        <td> <strong>Vendor</strong></td>
                                                        <td> <strong>Penerima</strong></td>
                                                        <!--<td> <strong>Keterangan</strong></td>-->
                                                    </tr>
                                                </thead>
                                                <tbody align="center">
													<?php
														$tot_qty=0;
														$tot_tharga=0;
														foreach($permintaan as $min):
															$tot_qty +=$min->qty_barang;
															$tot_tharga +=$min->tharga;

													?>
                                                    <tr>
                                                        <!--<td> <strong> 1 </strong></td>-->
                                                        <td>  <?php echo $min->nama_barang; ?> </td>
                                                        <td> <?php echo $min->qty_barang; ?> </td>
                                                        <td> <?php echo number_format($min->harga); ?></td>
                                                       

                                                        <td>  <?php echo number_format($min->tharga); ?> </td>
                                                         <td>
                                                            <?php echo $min->nama_vendor; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $min->nama_users; ?> | <?php echo $min->nama_divisi; ?>
                                                        </td>
                                                        <!--<td> <strong> LUNAS </strong></td>-->
                                                    </tr>
													<?php endforeach; ?>
                                                    <tr>
                                                       
                                                        <td> <strong> Total </strong></td>
                                                        <td colspan="2" align="left">&nbsp;<strong> <?php echo $tot_qty; ?> </strong></td>
                                                        
                                                        <td colspan="3" align="left"> <strong> 
                                                              &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <?php echo number_format($tot_tharga); ?> </strong></td>
                                                
                                                    </tr>
                                                    <?php
                                                         if($ppn){ ?>
                                                        <tr>
                                                       
                                                        <td> <strong> <?php echo $tipe_pajak; ?> </strong></td>
                                                        <td colspan="2"> <strong>  </strong></td>
                                                        
                                                        <td colspan="3" align="left"> <strong> 
                                                                 &nbsp;&nbsp;&nbsp;&nbsp;
                                                               <?php echo number_format($total_pajak); ?>  </strong></td>
                                                
                                                    </tr>
 <tr>
                                                       
                                                        <td> <strong> Total Keseluruhan </strong></td>
                                                        <td colspan="2"> <strong>  </strong></td>
                                                        
                                                        <td colspan="3" align="left"> <strong> 
                          


                                                              &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <?php
                                                               $total_seluruh=$total_awal-$total_pajak;
                                                             ?> 
<?php echo number_format($total_seluruh); ?>
                                                         </strong></td>
                                                
                                                    </tr>


                                                             
                          
                                                        <?php } ?>
                                                     



                                                </tbody>
                                            </table>

                                        </td>



                                    </tr>
                                    
                                        <tr>
                                            <td>
                                        <table width="100%" border="1" align="center" style="border-collapse:collapse;">
                                            <tr>
                                              <th>No</th>
                                              <th>Nama Vendor</th>
                                              <th>No Rekening</th>
                                              <th>Bank</th>
                                              <th>Alamat</th>
                                            </tr>
                                            <tbody>
                                                <?php
                                                $no=1;
                                                 foreach($vendor as $ven):?>
                                                <tr>
                                                    <td align="center"><?php echo $no++; ?></td>
                                                    <td><?php echo $ven->nama_vendor; ?></td>
                                                    <td><?php echo $ven->no_rekening_vendor; ?></td>

                                                     <?php
                          $vendor=$ven->id_vendor;
                          $cek_bank=$this->Pengajuan_model->cek_bank($vendor);
                          foreach($cek_bank as $bak){
                            $nama_bank=$bak->nama_bank;
                          }
                        ?>
                                                    <td><?php echo $nama_bank; ?></td>
                                                    <td><?php echo $ven->alamat_vendor; ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                            </tbody>

                                        </table>
</td>
                                    </tr>
                                </table>
                              
                </td>
            </tr>
        </table>
    </body>
</html>