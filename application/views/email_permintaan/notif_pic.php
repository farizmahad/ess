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
                    <h4>Dear <?php echo $first_name_pic; ?> <?php echo $last_name_pic; ?></h4>
                    
                    <h4 class="text-info"><strong><?php echo $first_name; ?> <?php echo $last_name; ?>  </strong>telah mengirim permintaan produk non dagang</h4>
                    <p>Silakan klik <a href="<?php echo base_url(); ?>User_pengajuan/pic_daftar_barang">disini</a> untuk melakukan pengecekan</p>
                    
                </div>
            </div>
        </section>
    </main>
</body>
</html>