<!DOCTYPE html>
<html>

<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark" style="background-color:rgb(255,255,255);">
            <div class="container">
                <div class="block-heading"><img class="img-fluid" src="http://portal.aartijaya.com/assets/images/aarti_jaya_pt_2.jpg"width="285px">
                    <h4><?php echo $first_name_pengirim; ?> | <?php echo $nama_barang; ?></h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Deskripsi</th>
                                <th>Kuantitas</th>
                                <th>Tanggal dibutuhkan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                        foreach($detail as $row):
                        $no_pengajuan=$row->no_pengajuan;
                            ?>
                        <tr>
                            <td>
                                <?php echo $row->nama_bar; ?>
                            </td>
                            <td>
                                <?php echo $row->deskripsi_produk; ?>
                            </td>
                            <td>
                                <?php echo $row->qty_jumlah; ?>
                            </td>
                            </td>
                                <?php echo date_indo($row->tanggal_dibutuhkan); ?>
                            </td>
                              </td>
                                <?php echo $row->keterangan; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
                    <h4 class="text-info"><strong>Produk tersebut sudah dibuat Purchase Request dengan nomor <?php echo $no_pengajuan; ?></h4>
                    <p>Silakan klik <a href="<?php echo base_url(); ?>daftar-permintaan-barang-non-dagang">disini</a> untuk melakukan pengecekan</p>
                    
                </div>
            </div>
        </section>
    </main>
</body>
</html>