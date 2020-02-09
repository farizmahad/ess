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
                <div class="block-heading"><img class="img-fluid" src="http://approval.bursasajadah.id/assets/images/aarti_jaya_pt_2.jpg"width="285px">
                    <h4 class="text-info"><strong>
                        Dear, <?php echo $first_name; ?> <?php echo $last_name; ?>
                    </h4>
                    <p>
                      Permintaan pengajuan <i>purchase request</i> untuk barang di bawah ini telah
                        <?php if($status_approval==2){ ?>
                                    ditolak
                        <?php }elseif($status_approval==3){ ?>
                                    direvisi
                        <?php }elseif($status_approval==5){ ?>
                                    dijadikan Purchase Request untuk diajukan ke Purchasing
                        <?php } ?>

                        <table>
                        <thead>
                             <tr>
                                <td>No</td>
                                <td>Nama Barang</td> 
                                <td>Qty</td>
                             </tr>
                        </thead>
                            <?php 
                            $no=1;
                            foreach($detail_pengajuan as $den):?>
                               <tr>
                                  <td><?php echo $no++; ?></td> 
                                  <td><?php echo $den->nama_barang; ?></td>
                                  <td><?php echo $den->qty; ?></td>
                               </tr>
                            <?php endforeach; ?>
                        </table>
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>