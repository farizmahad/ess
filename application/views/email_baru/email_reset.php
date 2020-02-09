<!DOCTYPE html>
<html>

<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark" style="background-color:rgb(255,255,255);">
            <div class="container">
                <div class="block-heading"><img class="img-fluid" src="http://approval.bursasajadah.id/assets/images/aarti_jaya_pt_2.jpg"width="285px">
                    <h4 class="text-info"><strong>Anda Telah Melakukan Permintaan Reset Password</strong></h4>
                    <p><strong>Silakan klik link di bawah ini&nbsp;</strong><br><strong>untuk melakukan reset password</strong></p>
                    <p><a href="<?php echo base_url(); ?>Login_User/reset_password/<?php echo $qstring; ?>/<?php echo $id; ?>">Reset Password</a></p>
                </div>
            </div>
        </section>
    </main>
	
	
    <!--<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>-->
</body>

</html>