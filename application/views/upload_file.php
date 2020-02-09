<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Aartijaya | Unggah File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/approval_konfirmasi.css">

	<!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
	
	<!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>

</head>

<body>
    <div class="bg-aja-upload">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-8 col-md-6 col-lg-6 col-xl-6">
                    <div class="div-wadah">
                        <div class="div-icon"><i class="fa fa-upload" style="color:rgb(0,117,255);"></i></div>
                        <div class="div-content">
                            <h2 class="text-center text-primary">Unggah File Purchase Order</h2>
                            <p class="lead text-center" id="p-content"><br>Silakan untuk mengunggah file kesini.<br></p>
                            <form method="POST" action="<?php echo base_url(); ?>Login_User/upload_file" enctype="multipart/form-data">
                                <div class="form-group" id="form-group">
									<input type="file" class="input-type-file" name="foto" required oninvalid="this.setCustomValidity('File tidak boleh kosong')" oninput="setCustomValidity('')">
									<input type="hidden" name="id_pengajuan" value="<?php echo $id_pengajuan; ?>">
									<input type="hidden" name="status_approval" value="<?php echo $status_approval; ?>">
									
									<input type="hidden" name="email" value="<?php echo $email; ?>">
									<input type="hidden" name="id_history" value="<?php echo $id_history; ?>">
									
									<input type="hidden" name="urutan" value="<?php echo $urutan; ?>">
									
									<input type="hidden" name="id_pengirim" value="<?php echo $id_pengirim; ?>">
									<input type="hidden" name="id_jenis_request" value="<?php echo $id_jenis_request; ?>">
									
								</div>
								<div class="div-btn">
									<button class="btn btn-primary" type="submit">Unggah<br></button>
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<script type="text/javascript">
		document.getElementById("uploadBtn").onchange = function () {
		document.getElementById("uploadFile").value = this.value;
		};
	</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</body>

</html>