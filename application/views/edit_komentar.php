<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>News Feed | Check what your friends are doing</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link href="css/emoji.css" rel="stylesheet">
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	
	<!-- Begin emoji-picker Stylesheets -->
    <link href="<?php echo base_url(); ?>assets/plugins/css/emoji/emoji.css" rel="stylesheet">
    <!-- End emoji-picker Stylesheets -->

    <link href="<?php echo base_url(); ?>assets/plugins/css/dropzone/basic.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/css/dropzone/dropzone.css" rel="stylesheet">
  </head>
  <body>

<div class="gasu">
	<?php foreach($news as $ge):?>

<textarea name="news_update" class="form-control" id="news_update" rows="6"><?php echo $ge->news; ?>
</textarea>
<input type="hidden" name="id_news" id="id_news" value="<?php echo $ge->id_news; ?>">
<div>
	<br>
<button class="btn btn-sm btn-success" type="submit" id="btn_update">Simpan</button>


&nbsp;&nbsp;<button class="btn btn-sm btn-success sembunyi">Tutup</button>
</div>

<?php endforeach;?>
</div>

 <!-- Begin emoji-picker JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/js/emoji/config.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/js/emoji/util.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/js/emoji/jquery.emojiarea.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/js/emoji/emoji-picker.js"></script>
    <!-- End emoji-picker JavaScript -->
    
    <script src="<?php echo base_url(); ?>assets/plugins/js/dropzone/dropzone.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/js/codemirror/codemirror.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/js/codemirror/mode/xml/xml.js"></script>
<script>
  $(document).ready(function(){
  
  //Ketika elemen class sembunyi di klik maka elemen class gambar sembunyi
        $('.sembunyi').click(function(){
   //Sembunyikan elemen class gambar
   $('.gasu').hide('1000');        
        });
 });
 </script>
 <script>
     
      $('#btn_update').on('click',function(){

            var news_update = $('#news_update').val();
            var id_news = $('#id_news').val();
            
            

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Dashboard/update_news')?>",
                dataType : "JSON",
                data : {news_update:news_update , id_news:id_news},
               success: function(data) {
                 
                 $('.gambar'+id_news).load("<?php echo base_url() ?>Dashboard/edit_komentar/"+id_news);
                 window.location.reload();
               
            }
            });
            return false;
        });
 </script>

