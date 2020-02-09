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

    <link href="<?php echo base_url(); ?>assets/plugins/css/dropzone/basic.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/css/dropzone/dropzone.css" rel="stylesheet">
  </head>
  <body>

   
          <div class="col-md-12">



            <!-- Post Create Box
            ================================================= -->
            

       <?php 
       $jumlah_news=count($news);
       foreach($news as $ne):?>
        <?php
              $id_berita[]=$ne->id_news;
         ?>
            <div class="post-content">
              <?php
                    $news_id=$ne->id_news;
                    $image=$this->Home_model->get_image_news($news_id);
                 foreach($image as $ima):   
               ?>
              <!--<img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />-->
              <?php endforeach;?>
              <div class="post-container">
                <?php if($ne->foto){?>
                <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $ne->foto; ?>" alt="user" class="profile-photo-md pull-left" />
              <?php } ?>
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="<?php echo base_url(); ?>/ringkasan-profile/<?php echo $ne->id; ?>" class="profile-link"><?php echo $ne->first_name; ?> <?php echo $ne->last_name; ?></a> <span class="following"><!--following--></span></h5>
                    <p class="text-muted">Published a photo <?php echo $ne->date_posted; ?></p>
                  </div>
                  <?php
                     $id_news=$ne->id_news;

                     $select_like=$this->Home_model->select_like($news_id);
                     foreach($select_like as $u){
                      $orang_like[]=$u->id_user;
                     }
                      ?>
                  

                   

                  <div class="reaction">

                    <?php
                    if (in_array($id_login, $orang_like)) { ?>
                       <a class="btn text-red like_button" data-id="<?php echo $ne->id_news; ?>" data-id_login="<?php echo $id_login; ?>" data-status="1"><i class="icon ion-thumbsup"></i> <?php echo count($select_like); ?></a>

                    <?php  }else{ ?>
                    <a class="btn text-green like_button" data-id="<?php echo $ne->id_news; ?>" data-id_login="<?php echo $id_login; ?>" data-status="0"><i class="icon ion-thumbsup"></i> <?php echo count($select_like); ?></a>
                    <?php } ?>
                    
                      
                  </div>
                  <div class="line-divider"></div>
                  <div class="post-text">
                    <p>
                  
                    <br>
                    	<?php echo $ne->news; ?>
                      



                    </p>
                  </div>
                  <div class="line-divider"></div>
                  <?php
                  $id_newss=$ne->id_news;
                       $get_news=$this->Home_model->get_komentar_news($id_newss,'3');
                        $get_newss=$this->Home_model->get_komentar_news($id_newss);
                  ?>
                  <?php

   $count_news=count($get_newss);
   
   $cu=$count_news-3;
?>
                  <div class="tampilaja<?php echo $id_newss; ?>">
                    <div>
                      <?php if($count_news > 3){ ?>
                        <a data-toggle="tab"  id="<?php echo $id_newss; ?>" class="client-link" onClick="reply_clickk(this.id)" style="cursor: pointer;">Lihat komentar lain (<?php echo $cu; ?>)</a>
                    <?php   } ?>
                  </div>
                  <?php foreach($get_news as $ge): ?>
                  
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
                    data-id_news="<?php echo $ne->id_news; ?>" 
                    data-id_user="<?php echo $ne->id_user; ?>" 
                    class="form-control" placeholder="Post a comment" onChange="reply_submit(this,this.value)">
                  </div>
                </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
            
           </div>
          </div>
        </div>
      </div>
    </div>


        
    <script src="<?php echo base_url(); ?>assets/plugins/js/dropzone/dropzone.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/js/codemirror/codemirror.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/js/codemirror/mode/xml/xml.js"></script>
    

    




