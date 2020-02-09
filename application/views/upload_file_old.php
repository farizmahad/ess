
   
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    
    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/css/font-awesome.min.css" />

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>

    <style type="text/css">
  .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    border:none;
    filter: alpha(opacity=0);
}
</style>

  </head>
  <body>

    <!--Header End-->
  
    <!-- 404 Error
    ================================================= -->
    <div class="error-page">
      <div class="error-content">
        <div class="container">
         
          <div class="error-message">
          	<h1 class="error-title">Silakan upload File Purchase Order terlebih dahulu!</h1>
             
          <form method="POST" action="<?php echo base_url(); ?>Login_User/upload_file"
           enctype="multipart/form-data">
             <div class="form-group col-xs-12">
                           <label for="firstname"> Lampiran</label>
                              <br>
                              <input id="uploadFile" placeholder="Pilih File..." readonly style="padding:2px;border-radius: 5px;border: 1px solid white;">
                               <div class="fileUpload btn btn-info">
                               <span>Upload</span>
                             <input id="uploadBtn" type="file" class="upload" name="foto">
                             </div>
                           <input type="hidden" name="id_pengajuan" value="<?php echo $id_pengajuan; ?>">
                           <input type="hidden" name="id_history" value="<?php echo $id_history; ?>">


							<input type="hidden" name="email" value="<?php echo $email; ?>">
							<input type="hidden" name="status_approval" value="<?php echo $status_approval; ?>">
							<input type="hidden" name="id_pengirim" value="<?php echo $id_pengirim; ?>">
							<input type="hidden" name="id_jenis_request" value="<?php echo $id_jenis_request; ?>">

							<input type="hidden" name="urutan" value="<?php echo $urutan; ?>">

                        </div>

					<div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-danger"> Kirim</button>
                    </div>
                    </form>
            
        
        </div>
    	</div>
    </div>
    
    <!-- Footer
    ================================================= -->

      <script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
    };
</script>
    
    <!-- Scripts
    ================================================= -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
  </body>
</html>
