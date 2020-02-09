<?php
 $ID = $this->ion_auth->user()->row()->id;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>Beranda | Sistem Approval PT. Aartijaya</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
    <link href="<?php echo base_url(); ?>assets/css/emoji.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/css/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/css/datapicker/datepicker3.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
    <link href="<?php echo base_url();?>assets/plugins/css/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/plugins/css/chosen/bootstrap-chosen.css" rel="stylesheet">



<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/js/dataTables/datatables.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/js/datapicker/bootstrap-datepicker.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/plugins/js/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/js/chosen/chosen.jquery.js"></script>

<?php

   $count_news=count($get_news);
   $cu=$count_news-3;
?>

<?php foreach($get_news as $ge):
                $id_news=$ge->id_news;
 ?>
                  <div class="post-comment">
                    <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $ge->foto; ?>" alt="" class="profile-photo-sm" />
                    <p><a href="timeline.html" class="profile-link"><?php echo $ge->first_name; ?> <?php echo $ge->last_name; ?></a> <?php echo $ge->komentar; ?> </p>
                  </div>
                  <?php endforeach;?>
                  <div class="post-comment">
                   
                    <?php
                    $ID = $this->ion_auth->user()->row()->id;
                    ?>
                    <?php 
                            $ambil_user=$this->Home_model->get_users($ID);
                    ?>
                    <?php foreach($ambil_user as $am){
                            $profile_picture=$am->foto;
                  } 
                  ?>
                    <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $profile_picture; ?>" alt="" class="profile-photo-sm" />
                    <input type="text" 
                    data-id_news="<?php echo $id_news; ?>" 
                    data-id_user="<?php echo $id_user; ?>" 
                    class="form-control" placeholder="Post a comment" onChange="reply_submit(this,this.value)">
                  </div>


     <script>

     	
     	function reply_submit(obj,val) {
      var id_news = obj.getAttribute('data-id_news');
      var id_user = obj.getAttribute('data-id_user');
      var replay=val;
      
        $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>Dashboard/replay_submit",
           data:{id_news,replay,id_user},
          success: function(data){
                 $('.tampilaja').load("<?php echo base_url() ?>Dashboard/replay_komentar/"+id_news);
           }
        })
  
}
     </script>