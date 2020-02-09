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
                                                        <td align="bodycopy2">
                                                            Status Permintaan anda saat ini adalah
                                                            <br>


                                                            <?php if($last_status==0 and $id_user_approval==0 and $status_user==0 and $ket=='Manajer'){ ?>



                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="	#008000">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">MENUNGGU PERSETUJUAN MANAJER</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <br>
                                                                            Artinya, saat ini permintaan anda sedang dalam tahap menunggu persetujuan manajer.
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            <?php  }elseif($last_status==2 and $id_user_approval !=0 and $status_user==0 and $ket=='Manajer'){
                                                                $as=$id_user_approval;


                                                                ?>

                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="	#008000">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">DITOLAK MANAJER</a>
                                                                        </td>
                                                                    </tr>

                                                                </table>

                                                    <tr>
                                                        <td align="center">
                                                            <br>
                                                            Artinya, permintaan anda tidak disetujui oleh manager.
                                                            Silakan mengajukan permintaan baru!
                                                        </td>
                                                    </tr>
                                                            <?php   }elseif($last_status==3 and $id_user_approval !=0 and $status_user==0 and $ket=='Manajer'){?>


                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="	#008000">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">DIKEMBALIKAN DENGAN REVISI MANAJER</a>
                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                                <tr>
                                                                    <td align="center">
                                                                        <br>
                                                                        Artinya permintaan anda tidak dikembalikan oleh manager.
                                                                        Anda boleh mengubah permintaan anda dengan permintaan yang sama sesuai dengan catatan yang dimasukkan manajer.
                                                                    </td>
                                                                </tr>
                                                            <?php   }elseif($last_status==1 and $id_user_approval !=0 and $status_user==1 and ($ket=='Manajer' or $ket=='GM')){ ?>

                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#87CEFA">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">MENUNGGU PERSETUJUAN FINANCE</a>
                                                                        </td>
                                                                    </tr>

                                                                </table>

                                                    <tr>
                                                        <td align="center">
                                                            <br>
                                                            Artinya, permintaan anda sudah disetujui Manajer, dan dalam tahap menunggu persetujuan Finance.
                                                            Mohon menunggu!
                                                        </td>
                                                    </tr>


                                                            <?php  }elseif($last_status==2 and $id_user_approval !=0 and $status_user==0 and $ket=='Finance'){ ?>

                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#008000">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">DITOLAK FINANCE</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>



                                                            <?php }elseif($last_status==3 and $id_user_approval !=0 and $status_user==0 and $ket=='Finance'){ ?>

                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#008000">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">DIKEMBALIKAN DENGAN REVSI FINANCE</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>



                                                            <?php }elseif($last_status==1 and $id_user_approval !=0 and $status_user==2 and $ket=='Finance'){?>

                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#87CEFA">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">MENUNGGU PERSETUJUAN PURCHASING</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            <?php }elseif($last_status==2 and $id_user_approval !=0 and $status_user==0 and $ket=='Purchasing'){ ?>



                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#008000">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">DITOLAK PURCHASING</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            <?php }elseif($last_status==3 and $id_user_approval !=0 and $status_user==0 and $ket=='Purchasing'){ ?>

                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#008000">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">DIKEMBALIKAN DENGAN REVISI PURCHASING</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            <?php }elseif($last_status==1 and $id_user_approval !=0 and $status_user==4 and $ket=='Purchasing'){?>
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#B22222">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">PERMINTAAN DISETUJUI</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>



                                                            <?php }elseif($last_status==1 and $id_user_approval !=0 and $status_user==3 and $ket=='Manajer') {?>


                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#87CEFA">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 0px; padding: 10px 25px; border: 0px solid #87CEFA; display: inline-block;">MENUNGGU PERSETUJUAN GM</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            <?php }elseif($last_status==2 and $id_user_approval !=0 and $status_user==0 and $ket=='GM'){ ?>



                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#008000">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">DITOLAK GM</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            <?php }elseif($last_status==3 and $id_user_approval !=0 and $status_user==0 and $ket=='GM'){ ?>

                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#008000">
                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">DIKEMBALIKAN DENGAN REVISI GM</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            <?php } ?>
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
                                    
                                    <tr>
                                        <td style="padding: 20px 0 30px 0;"> 
                                            <table width="100%" border="1" align="center">
                                                <thead align="center">
                                                    <tr>
                                                        <!--<td> <strong>No.</strong></td>-->
                                                        <td> <strong>Permintaan</strong></td>
                                                        <td> <strong>Qty</strong></td>
                                                        <td> <strong>Harga Satuan</strong></td>
                                                        <td> <strong>Subtotal</strong></td>
                                                        <!--<td> <strong>Keterangan</strong></td>-->
                                                    </tr>
                                                </thead>
                                                <tbody align="center">
													<?php
														$tot_qty=0;
														$tot_tharga=0;
														foreach($permintaan as $min):
															$tot_qty +=$min->qty;
															$tot_tharga +=$min->tharga;
													?>
                                                    <tr>
                                                        <!--<td> <strong> 1 </strong></td>-->
                                                        <td> <strong> <?php echo $min->nama_barang; ?> </strong></td>
                                                        <td> <strong> <?php echo $min->qty; ?> </strong></td>
                                                        <td> <strong> <?php echo number_format($min->harga); ?> </strong></td>
                                                        <td> <strong> <?php echo number_format($min->tharga); ?> </strong></td>
                                                        <!--<td> <strong> LUNAS </strong></td>-->
                                                    </tr>
													<?php endforeach; ?>
                                                    <tr>
                                                        <td> <strong> &nbsp; </strong></td>
                                                        <td> <strong> Total </strong></td>
                                                        <td> <strong> <?php echo $tot_qty; ?> </strong></td>
                                                        <td> <strong> <?php echo number_format($tot_tharga); ?> </strong></td>
                                                        <!--<td> <strong> - </strong></td>
                                                        <td> <strong> - </strong></td>-->
                                                    </tr>
													<tr>
														<td colspan="2"><b>Tanggal dibutuhkan</b></td>
														<td align="center" colspan="2">
															<?php echo date('d F Y', strtotime($tanggal_required)); ?>
														</td>
													</tr>
                                                </tbody>
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
    </body>
    
    <!--<body style="margin:0; padding: 0;">
        <table align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
         
            <tr>
                <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                    <table border="1" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td> <h3 align="center"> PR-0003 | Rani Pebrianti </h3> </td>
                        </tr>
                        <tr>
                            <td> <h5 align="center"> Rani Pebrianti telah mengirimkan permintaan persetujuan kepada Anda <br/> pada tanggal 07 Maret 2019 </h5> </td>
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
                            <td>  
                                <table border="1" cellpadding="0" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <td width="260" valign="top"> Column 1</td>
                                            <td style="font-size: 0; line-height: 0;" width="20"> &nbsp;</td>
                                            <td width="260" valign="top"> Column 2</td>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td width="260" valign="top"> Column 1</td>
                                        <td style="font-size: 0; line-height: 0;" width="20"> &nbsp;</td>
                                        <td width="260" valign="top"> Column 2</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ee4c50"> Row 3</td>
            </tr>
        </table>
    </body>-->
</html>