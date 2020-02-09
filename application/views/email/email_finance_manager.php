
                                                                </tr>

                                                            </table>

                                                            <tr>
                                                                <td align="center">
                                                                    <br>
                                                                    Artinya, permintaan <?php echo $no_pengajuan; ?> sudah disetujui Manajer, dan dalam tahap menunggu persetujuan Finance.

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


                                                        <?php }elseif($last_status==2 and $id_user_approval !=0 and $status_user==3 and $ket=='GM'){ ?>



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
                                                        <tr>

                                                            <td align="center">

                                                                <br><br>
                                                                <table border="0" width="80%" align="center">
                                                                     <tr>
                                                                         <td colspan="3"><b>Identitas Permintaan</b></td>
                                                                     </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <br>




                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <td>Nama Pegawai</td>
                                                                        <td>:</td>
                                                                        <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Divisi</td>
                                                                        <td>:</td>
                                                                        <td><?php echo $nama_divisi; ?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Divisi</td>
                                                                        <td>:</td>
                                                                        <td><?php echo $nama_jabatan; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal Permintaan</td>
                                                                        <td>:</td>
                                                                        <td><?php echo  date('d F Y', strtotime($tanggal_pengajuan)); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal Dibutuhkan</td>
                                                                        <td>:</td>
                                                                        <td><?php echo  date('d F Y', strtotime($tanggal_required)); ?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Jenis Permintaan</td>
                                                                        <td>:</td>
                                                                        <td><?php echo  $jenis_request; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Keterangan</td>
                                                                        <td>:</td>
                                                                        <td><?php echo  $keterangan; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Status Terakhir</td>
                                                                        <td>:</td>
                                                                        <td>
                                                                            <?php if($last_status==0 and $id_user_approval==0 and $status_user==0 and $ket=='Manajer'){ ?>



                                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td align="left" style="border-radius: 3px;" bgcolor="	#008000">
                                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">MENUNGGU PERSETUJUAN MANAJER</a>
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


                                                                            <?php   }elseif($last_status==3 and $id_user_approval !=0 and $status_user==0 and $ket=='Manajer'){?>


                                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td align="left" style="border-radius: 3px;" bgcolor="	#008000">
                                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">DIKEMBALIKAN DENGAN REVISI MANAJER</a>
                                                                                        </td>
                                                                                    </tr>

                                                                                </table>

                                                                            <?php   }elseif($last_status==1 and $id_user_approval !=0 and $status_user==1 and ($ket=='Manajer' or $ket=='GM')){ ?>

                                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td align="left" style="border-radius: 3px;" bgcolor="#87CEFA">
                                                                                            <a class="button raised"   style="font-size: 14px; line-height: 14px; font-weight: 500; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 10px 25px; border: 0px solid #234688; display: inline-block;">MENUNGGU PERSETUJUAN FINANCE</a>
                                                                                        </td>
                                                                                    </tr>

                                                                                </table>




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
                                                                </table>



                                                        </tr>





                                                        <tr>

                                                            <td align="center">
                                                                <br><br>
                                                                <table border="1" width="90%">
                                                                    <thead>
                                                                    <tr>
                                                                        <td><b>Permintaan</b></td>
                                                                        <td><b>Jumlah Barang</b></td>
                                                                        <td><b>Harga Barang</b></td>
                                                                        <td><b>Subtotal</b></td>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                    $tot_qty=0;
                                                                    $tot_tharga=0;
                                                                    foreach($permintaan as $min):
                                                                    $tot_qty +=$min->qty;
                                                                    $tot_tharga +=$min->tharga;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $min->nama_barang; ?></td>
                                                                        <td align="center"><?php echo $min->qty; ?></td>
                                                                        <td><?php echo number_format($min->harga); ?></td>
                                                                        <td><?php echo number_format($min->tharga); ?></td>
                                                                    </tr>
                                                                    </tbody>
                                                                    <?php endforeach; ?>
                                                                    <tr>
                                                                        <td><b>Total</b></td>
                                                                        <td align="center">
                                                                            <?php echo $tot_qty; ?>

                                                                        </td>
                                                                        <td>
                                                                            <?php echo number_format($tot_tharga); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><b>Tanggal dibutuhkan</b></td>
                                                                        <td align="center" colspan="2">
                                                                            <?php echo date('d F Y', strtotime($tanggal_required)); ?>


                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align='center'>
                                                                <br>
                                                                <table>
                                                                    <tr>
                                                                        <td align='center' bgcolor='#1A54BA' style='background:#69C374; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>
                                                                            <div class="contentEditableContainer contentTextEditable">
                                                                                <div class="contentEditable">
                                                                                    <a href='<?php echo base_url(); ?>Finance/approve_pengajuan_email?status_approval=1&email=<?php echo $email; ?>&id_pengajuan=<?php echo $id_pengajuan; ?>&id_pengirim=<?php echo $id_pengirim; ?>' class='link2' style='color:#ffffff;'>Disetujui</a>

                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td align='center' bgcolor='#DC143C' style='background:#69C374; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>
                                                                            <div class="contentEditableContainer contentTextEditable">
                                                                                <div class="contentEditable">
                                                                                    <a href='<?php echo base_url(); ?>Finance/approve_pengajuan_email?status_approval=2&email=<?php echo $email; ?>&id_pengajuan=<?php echo $id_pengajuan; ?>&id_pengirim=<?php echo $id_pengirim; ?>' class='link2' style='color:#ffffff;'>Ditolak</a>

                                                                                </div>
                                                                            </div>
                                                                        </td>

                                                                        <td align='center' bgcolor='#B8860B' style='background:#69C374; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>
                                                                            <div class="contentEditableContainer contentTextEditable">
                                                                                <div class="contentEditable">
                                                                                    <a href='<?php echo base_url(); ?>Finance/approve_pengajuan_email?status_approval=3&email=<?php echo $email; ?>&id_pengajuan=<?php echo $id_pengajuan; ?>&id_pengirim=<?php echo $id_pengirim; ?>' class='link2' style='color:#ffffff;'>Dikembalikan dengan revisi</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                        <!-- END BODY COPY -->
                                                        <!-- BUTTON -->

                                                        <tr>
                                                            <td align="left" style="padding: 18px 18px 18px 18px; mso-alt-padding: 18px 18px 18px 18px!important;">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>
                                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td align="left" style="border-radius: 3px;" bgcolor="#234688">

                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!-- END BUTTON -->
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>





                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    <?php endforeach;?>
    <!-- END CARD 2 -->

    <!-- START CARD 3 -->

    <!-- END CARD 3 -->


    <!-- START COLUMNS -->

    <!-- END COLUMNS -->

    <!-- SPACER -->
    <!--[if gte mso 9]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
            <td align="center" valign="top" width="600" height="18">
    <![endif]-->
    <tr><td height="18px"></td></tr>
    <!--[if gte mso 9]>
    </td>
    </tr>
    </table>
    <![endif]-->
    <!-- END SPACER -->

    <!-- FOOTER -->
    <tr>
        <td width="100%" valign="top" align="center" class="padding-container">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="wrapper">
                <tr>
                    <td width="100%" valign="top" align="center">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="wrapper" bgcolor="#eeeeee">
                            <tr>
                                <td align="center">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                        <tr>
                                            <!-- SOCIAL -->
                                            <td align="center" width="300" style="padding-top: 0px!important; padding-bottom: 18px!important; mso-padding-alt: 0px 0px 18px 0px;">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td align="right" valign="top" class="social">
                                                            <a href="https://www.facebook.com/BursaSajadah/?ref=br_rs"
                                                               target="_blank">
                                                                <img src="http://paulgoddarddesign.com/emails/images/material-design/fb-icon.png"
                                                                     height="24" alt="Facebook" border="0" style="display:block; max-width: 24px">
                                                            </a>
                                                        </td>
                                                        <td width="20"></td>
                                                        <td align="right" valign="top" class="social">
                                                            <a href="https://twitter.com/bursasajadah"
                                                               target="_blank">
                                                                <img src="http://paulgoddarddesign.com/emails/images/material-design/twitter-icon.png"
                                                                     height="24" alt="Twitter" border="0" style="display:block; max-width: 24px">
                                                            </a>
                                                        </td>
                                                        <td width="20"></td>
                                                        <td align="right" valign="top" class="social">
                                                            <a href="https://www.instagram.com/bursa.sajadah/?hl=id"
                                                               target="_blank">
                                                                <img src="http://paulgoddarddesign.com/emails/images/material-design/instagram-icon.png"
                                                                     height="24" alt="Instagram" border="0" style="display:block; max-width: 24px">
                                                            </a>
                                                        </td>
                                                        <td width="20"></td>
                                                        <td align="right" valign="top" class="social">
                                                            <a href="https://www.youtube.com/channel/UCog5ZfFuBcjp3upLWgFX_bA"
                                                               target="_blank">
                                                                <img src="http://paulgoddarddesign.com/emails/images/material-design/youtube-icon.png"
                                                                     height="24" alt="Youtube" border="0" style="display:block; max-width: 24px">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <!-- END SOCIAL -->
                                        </tr>
                                        <tr>
                                            <td class="td-padding" align="center" style="font-family: 'Roboto Mono', monospace; color: #212121!important; font-size: 16px; line-height: 24px; padding-top: 0px; padding-left: 0px!important; padding-right: 0px!important; padding-bottom: 0px!important; mso-line-height-rule: exactly; mso-padding-alt: 0px 0px 0px 0px;">
                                                &copy; 2019 PT Aarti Jaya
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- FOOTER -->

    <!-- SPACER -->
    <!--[if gte mso 9]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
            <td align="center" valign="top" width="600" height="36">
    <![endif]-->
    <tr><td height="36px"></td></tr>
    <!--[if gte mso 9]>
    </td>
    </tr>
    </table>
    <![endif]-->
    <!-- END SPACER -->

</table>
<!-- END EMAIL -->
<div style="display:none; white-space:nowrap; font:15px courier; line-height:0;">
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
</div>
</body>
</html>
