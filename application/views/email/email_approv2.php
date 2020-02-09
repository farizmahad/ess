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
            
            .h2, .bodycopy {
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
										<?php foreach($pengajuan as $pen):?>
                                        <td class="innerpadding borderbottom">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="h2" align="center">
                                                        #<?php echo $no_pengajuan; ?> | <?php echo $pen->first_name; ?> <?php echo ""; ?>  <?php echo $pen->last_name; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bodycopy">
                                                        <?php echo $pen->first_name; ?> <?php echo ""; ?>  <?php echo $pen->last_name; ?> telah mengirimkan permintaan persetujuan kepada Anda <br/> pada tanggal <?php echo date('d F Y', strtotime($pen->tanggal_pengajuan)); ?>
                                                    </td>
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
                                                                    <td> <?php echo $first_name; ?> <?php echo $last_name; ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Divisi </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <?php echo $nama_divisi; ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <strong> Jabatan </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <?php echo $nama_jabatan; ?>   </td>
                                                                </tr>
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
                                                                    <td> <strong> Status Terakhir </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> : </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong> &nbsp; </strong></td>
                                                                    <td> <strong>  <?php if($last_status==0 and $id_user_approval==0 and $status_user==0 and $ket=='Manajer'){ ?>
                                                                                        <button type="button" class="btn btn-sm btn-primary"><b>Menunggu Persetujuan Manajer</b></button>
                                                                                    <?php  }elseif($last_status==2 and $id_user_approval !=0 and $status_user==0 and $ket=='Manajer'){?>
                                                                                        <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Manajer</b></button>
                                                                                    <?php   }elseif($last_status==3 and $id_user_approval !=0 and $status_user==0 and $ket=='Manajer'){?>
                                                                                        <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Manajer</b></button>
                                                                                    <?php   }elseif($last_status==1 and $id_user_approval !=0 and $status_user==1 and ($ket=='Manajer' or $ket=='GM')){ ?>
                                                                                        <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan Finance</b></button>
                                                                                    <?php  }elseif($last_status==2 and $id_user_approval !=0 and $status_user==0 and $ket=='Finance'){ ?>
                                                                                        <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Finance</b></button>

                                                                                    <?php }elseif($last_status==3 and $id_user_approval !=0 and $status_user==0 and $ket=='Finance'){ ?>
                                                                                        <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Finance</b></button>
                                                                                    <?php }elseif($last_status==1 and $id_user_approval !=0 and $status_user==2 and $ket=='Finance'){?>
                                                                                        <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan Purchasing</b></button>

                                                                                    <?php }elseif($last_status==2 and $id_user_approval !=0 and $status_user==0 and $ket=='Purchasing'){ ?>
                                                                                        <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Purchasing</b></button>
                                                                                    <?php }elseif($last_status==3 and $id_user_approval !=0 and $status_user==0 and $ket=='Purchasing'){ ?>

                                                                                        <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Purchasing</b></button>
                                                                                    <?php }elseif($last_status==1 and $id_user_approval !=0 and $status_user==4 and $ket=='Purchasing'){?>

                                                                                        <button type="button" class="btn btn-sm btn-danger"><b>Permintaan Disetujui</b></button>
                                                                                    <?php }elseif($last_status==1 and $id_user_approval !=0 and $status_user==3 and $ket=='Manajer') {?>
                                                                                        <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan GM</b></button>
                                                                                    <?php }elseif($last_status==2 and $id_user_approval !=0 and $status_user==0 and $ket=='GM'){ ?>

                                                                                        <button type="button" class="btn btn-sm btn-primary"><b>Ditolak GM</b></button>
                                                                                    <?php }elseif($last_status==3 and $id_user_approval !=0 and $status_user==0 and $ket=='GM'){ ?>
                                                                                        <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi GM</b></button>

                                                                                    <?php } ?> </strong></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
										
                                    </tr>
                                    
                                    <tr>
                                        <td style="padding: 20px 0 30px 0;"> 
                                            <table width="100%" border="1" align="center">
                                                <thead align="center">
                                                    <tr>
                                                        <td> <strong>No.</strong></td>
                                                        <td> <strong>Permintaan</strong></td>
                                                        <td> <strong>Qty</strong></td>
                                                        <td> <strong>Harga Satuan</strong></td>
                                                        <td> <strong>Subtotal</strong></td>
                                                        <td> <strong>Keterangan</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody align="center">
												<?php
													 $no=1;
													 foreach($permintaan as $min):?>
                                                    <tr>
                                                        <td> <strong> <?php echo $no++; ?> </strong></td>
                                                        <td> <strong> <?php echo $min->nama_barang; ?> </strong></td>
                                                        <td> <strong> <?php echo $min->qty; ?> </strong></td>
                                                        <td> <strong> <?php echo $min->harga; ?> </strong></td>
                                                        <td> <strong> <?php echo $min->tharga; ?> </strong></td>
                                                        <td> <strong> <?php echo $min->keterangan; ?> </strong></td>
                                                    </tr>
                                                <?php endforeach; ?>   
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="padding: 20px 0 30px 0;"> 
                                            <table width="100%" border="0" align="center">
                                                <tbody align="center">
                                                    <tr>
                                                        <td class="buttonDiterima" height="45"> <a href='<?php echo base_url(); ?>Manager/approve_pengajuan_email?status_approval=1&email=<?php echo $email; ?>&id_pengajuan=<?php echo $id_pengajuan; ?>&id_pengirim=<?php echo $id_pengirim; ?>'><strong> DISETUJUI</strong></a></td>
                                                        <td class="buttonDitolak" height="45"> <a href='<?php echo base_url(); ?>Manager/approve_pengajuan_email?status_approval=2&email=<?php echo $email; ?>&id_pengajuan=<?php echo $id_pengajuan; ?>&id_pengirim=<?php echo $id_pengirim; ?>'><strong> DITOLAK </strong></a></td>
                                                        <td class="buttonDirevisi" height="45"> <a href='<?php echo base_url(); ?>Manager/approve_pengajuan_email?status_approval=3&email=<?php echo $email; ?>&id_pengajuan=<?php echo $id_pengajuan; ?>&id_pengirim=<?php echo $id_pengirim; ?>'><strong> DIREVISI </strong></a></td>
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
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
						<tr>
							<td height='65'>
						</tr>
						<tr>
							<td  style='border-bottom:1px solid #DDDDDD;'></td>
						</tr>
						<tr><td height='25'></td></tr>
						<tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tbody>
									<tr>
										<td valign="top" class="specbundle"><div class="contentEditableContainer contentTextEditable">
												<div class="contentEditable" align='center'>
													<p  style='text-align:left;color:#CCCCCC;font-size:12px;font-weight:normal;line-height:20px;'>
														<span style='font-weight:bold;'>Menunggu Persetujuan Permintaan</span>
														<br>
														[CLIENTS.ADDRESS]
														<br>
														<a target='_blank' href="[FORWARD]">Forward to a friend</a><br>
														<a target="_blank" class='link1' class='color:#382F2E;' href="[UNSUBSCRIBE]">Unsubscribe</a>
														<br>
														<a target='_blank' class='link1' class='color:#382F2E;' href="[SHOWEMAIL]">Show this email in your browser</a>
													</p>
												</div>
											</div></td>
										<td valign="top" width="30" class="specbundle">&nbsp;</td>
										<td valign="top" class="specbundle"><table width="100%" border="0" cellspacing="0" cellpadding="0">

											</table>
										</td>
									</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr><td height='88'></td></tr>
						</tbody>
					</table>
				</td>
            </tr>
        </table>
		<?php endforeach;?>
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