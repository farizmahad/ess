
<h4 align="center">PT Aarti Jaya</h4>
<hr size="12px">
<h4>History Permintaan</h4>



<table border="1" width="100%">
    <thead>
    <tr>
        <th width='5%'>No</th>
        <th width="20%" <?php /*style="background:#AFEEEE;text-align:center;"*/?>>Tanggal Disetujui</th>
        <th width="20&" <?php /*style="background:#AFEEEE;text-align:center;"*/?>>Status</th>
        <th width="20&" <?php /*style="background:#AFEEEE;text-align:center;"*/?>>Status ACC</th>
        <th width="20%" <?php /*style="background:#AFEEEE;text-align:center;"*/?>>Oleh</th>
        <th width="35%"<?php /*style="background:#AFEEEE;text-align:center;"*/?>>Catatan</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    foreach($history_pengajuan as $his) :?>
        <tr>
            <td align="center"><?php echo $no++; ?></td>
            <td align="center"><?php echo date('d F Y', strtotime($his->tanggal)); ?></td>
            <td>
                <?php if($his->status==0 and $his->id_user_approval==0  and $his->ket=='Manajer'){ ?>
                    <button type="button" class="btn btn-sm btn-primary"><b>Menunggu Persetujuan Manajer</b></button>
                <?php  }elseif($his->status==2 and $his->id_user_approval !=0  and $his->ket=='Manajer'){
                    $as=$his->id_user_approval;


                    ?>
                    <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Manajer</b></button>
                <?php   }elseif($his->status==3 and $his->id_user_approval !=0  and $his->ket=='Manajer'){?>
                    <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Manajer</b></button>
                <?php   }elseif($his->status==1 and $his->id_user_approval !=0  and ($his->ket=='Manajer' or $his->ket=='GM')){ ?>
                    <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan Finance</b></button>
                <?php  }elseif($his->status==2 and $his->id_user_approval !=0  and $his->ket=='Finance'){ ?>
                    <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Finance</b></button>

                <?php }elseif($his->status==3 and $his->id_user_approval !=0  and $his->ket=='Finance'){ ?>
                    <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Finance</b></button>
                <?php }elseif($his->status==1 and $his->id_user_approval !=0  and $his->ket=='Finance'){?>
                    <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan Purchasing</b></button>

                <?php }elseif($his->status==2 and $his->id_user_approval !=0 and $his->ket=='Purchasing'){ ?>
                    <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Purchasing</b></button>
                <?php }elseif($his->status==3 and $his->id_user_approval !=0  and $his->ket=='Purchasing'){ ?>

                    <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Purchasing</b></button>
                <?php }elseif($his->status==1 and $his->id_user_approval !=0 and $his->ket=='Purchasing'){?>

                    <button type="button" class="btn btn-sm btn-danger"><b>Permintaan Disetujui</b></button>
                <?php }elseif($his->status==1 and $his->id_user_approval !=0  and $his->ket=='Manajer') {?>
                    <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan GM</b></button>
                <?php }elseif($his->status==2 and $his->id_user_approval !=0  and $his->ket=='GM'){ ?>

                    <button type="button" class="btn btn-sm btn-primary"><b>Ditolak GM</b></button>
                <?php }elseif($his->status==3 and $his->id_user_approval !=0  and $his->ket=='GM'){ ?>
                    <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi GM</b></button>

                <?php } ?>

            </td>
            <td>
                <?php if($his->status==1){

                    echo "Disetujui";
                }elseif($his->status==2){

                    echo "Ditolak";
                }elseif($his->status==3){
                    echo "Dikembalikan dengan revisi";
                }?>
            </td>
            <td>
                <?php $nama_approv=$this->Pengajuan_model->select_nama($his->id_user_approval);?>
                <?php

                foreach($nama_approv as $ap){
                    echo $ap->first_name; echo $ap->last_name;
                }?>



            </td>
            <td align="center"><?php echo $his->catatan; ?></td>

        </tr>
    <?php endforeach;?>

    </tbody>

</table>

<h4>Detail Permintaan</h4>
<?php
foreach($detail_permintaan as $det):?>
<table border="1" width="100%">
   <tr>
       <td>Nama Pegawai</td>
       <td><?php echo $det->first_name; ?> <?php echo $det->last_name; ?></td>
   </tr>
    <tr>
        <td>Divisi</td>
        <td><?php echo $det->nama_divisi; ?></td>
    </tr>

    <tr>
        <td>Jabatan</td>
        <td><?php echo $det->nama_jabatan; ?></td>
    </tr>
    <tr>
        <td>Tanggal Permintaan</td>
        <td><?php echo date('d F Y', strtotime($det->tanggal_pengajuan)); ?></td>
    </tr>

    <tr>
        <td>Tanggal Dibutuhkan</td>
        <td><?php echo date('d F Y', strtotime($det->tanggal_required)); ?></td>
    </tr>


    <tr>
        <td>Jenis Permintaan</td>
        <td><?php echo date('d F Y', strtotime($det->jenis_request)); ?></td>
    </tr>


    <tr>
        <td>Keterangan</td>
        <td><?php echo $det->keterangan; ?></td>
    </tr>


    <tr>
        <td>Status Terakhir</td>
        <td>


            <?php if($det->last_status==0 and $det->id_user_approval==0 and $det->status_user==0 and $det->ket=='Manajer'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Menunggu Persetujuan Manajer</b></button>
            <?php  }elseif($det->last_status==2 and $det->id_user_approval !=0 and $det->status_user==0 and $det->ket=='Manajer'){
                $as=$det->id_user_approval;


                ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Manajer</b></button>
            <?php   }elseif($det->last_status==3 and $det->id_user_approval !=0 and $det->status_user==0 and $det->ket=='Manajer'){?>
                <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Manajer</b></button>
            <?php   }elseif($det->last_status==1 and $det->id_user_approval !=0 and $det->status_user==1 and ($det->ket=='Manajer' or $det->ket=='GM')){ ?>
                <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan Finance</b></button>
            <?php  }elseif($det->last_status==2 and $det->id_user_approval !=0 and $det->status_user==0 and $det->ket=='Finance'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Finance</b></button>

            <?php }elseif($det->last_status==3 and $det->id_user_approval !=0 and $det->status_user==0 and $det->ket=='Finance'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Finance</b></button>
            <?php }elseif($det->last_status==1 and $det->id_user_approval !=0 and $det->status_user==2 and $det->ket=='Finance'){?>
                <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan Purchasing</b></button>

            <?php }elseif($det->last_status==2 and $det->id_user_approval !=0 and $det->status_user==0 and $det->ket=='Purchasing'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Purchasing</b></button>
            <?php }elseif($det->last_status==3 and $det->id_user_approval !=0 and $det->status_user==0 and $det->ket=='Purchasing'){ ?>

                <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Purchasing</b></button>
            <?php }elseif($det->last_status==1 and $det->id_user_approval !=0 and $det->status_user==4 and $det->ket=='Purchasing'){?>

                <button type="button" class="btn btn-sm btn-danger"><b>Permintaan Disetujui</b></button>
            <?php }elseif($det->last_status==1 and $det->id_user_approval !=0 and $det->status_user==3 and $det->ket=='Manajer') {?>
                <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan GM</b></button>
            <?php }elseif($det->last_status==2 and $det->id_user_approval !=0 and $det->status_user==0 and $det->ket=='GM'){ ?>

                <button type="button" class="btn btn-sm btn-primary"><b>Ditolak GM</b></button>
            <?php }elseif($det->last_status==3 and $det->id_user_approval !=0 and $det->status_user==0 and $det->ket=='GM'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi GM</b></button>

            <?php } ?>

        </td>
    </tr>

</table>
<?php endforeach;?>
<h4>Detail Permintaan</h4>

<table border="1" width="100%">
    <thead>

       <tr>
           <th>No</th>
           <th>Nama Barang</th>
           <th>Jumlah</th>
           <th>Harga Satuan</th>
           <th>Subtotal</th>
           <th>Keterangan</th>
       </tr>
    </thead>
    <tbody>
    <?php
    $nom=1;
    $jumlah_qty=0;
    $jumlah_harga=0;
    $jumlah_tharga=0;
    foreach($detail_barang as $bar):

        $jumlah_qty +=$bar->qty;
        $jumlah_harga +=$bar->harga;
        $jumlah_tharga +=$bar->tharga;

        ?>
    <tr>
        <td align="center"><?php echo $nom++; ?></td>
        <td><?php echo $bar->nama_barang; ?></td>
        <td align="center"><?php echo $bar->qty; ?></td>
        <td><?php echo number_format($bar->harga); ?></td>
        <td><?php echo number_format($bar->tharga); ?></td>
        <td><?php echo $bar->keterangan; ?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
    <tr>
    <td colspan="2" align="center">

        <b>Total</b>
    </td>
    <td align="center">
        <?php echo $jumlah_qty; ?>
    </td>
    <td><?php echo number_format($jumlah_harga); ?></td>
    <td colspan="2"><?php echo number_format($jumlah_tharga); ?></td>
    </tr>
</table>

