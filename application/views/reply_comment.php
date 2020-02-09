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

   
          <div class="col-md-9">

            <!-- Post Create Box
            ================================================= -->
            <div class="create-post">
				<!--<div class="row">
					<div class="col-md-8 col-sm-8">
					  <div class="form-group">
						<img src="" alt="" class="profile-photo-md" />
						<form action="<//?php echo base_url();?>Dashboard/add" class="dropzone" id="dropzoneForm" enctype="multipart/form-data">
							<div class="fallback">
								<//?php $nos=1;
									foreach ($this->cart->contents() as $items){
										$nor=$items['id']+1;
									}
								?>
								<input type="hidden" id="id_barang" name="id_barang" value="<?php if($nor==""){echo "1";}else{ echo $nor; }?>" placeholder="Nama Request" class="form-control">
								<input name="foto" type="file" multiple / size="50">
								
							</div>
						</form>
						<div class="fallback">
							<table class="table table-striped">
             
								<tr>
								  <//?php
											  foreach($sementara as $sem):?>
								  <td>
									<img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" width="100" height="100">
								  </td>
									<//?php endforeach; ?>
								</tr>


          
							</table>
						</div>
					  </div>

					</div>
				</div> 
				<div class="row">
					<div class="col-md-12 col-sm-12">
					  <div class="form-group">
						<img src="" alt="" class="profile-photo-md" />
						<div class="tools">
						<ul class="publishing-tools list-inline">
						 
						  
						</ul>
					  

							
							<//?php foreach ($this->cart->contents() as $itemss): ?>
							<//?php echo $itemss['name']; ?><br>
							<//?php endforeach;?>
`							
					  </div>
					  </div>
					</div>
				</div>-->
			</div>


       <?php 
       foreach($news as $nom){
         $id_ber[]=$nom->news;
         

       }
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
                    <p class="text-muted">Diposting tanggal <?php echo $ne->date_posted; ?></p>
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

<?php

                        $pro[]=$ne->id_news;
                        
                        
                   

                      ?>

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

                 <?php

                       $id_ber[]=$ge->id_news;
                       

                 ?>
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
                    class="form-control" placeholder="Tulis Komentar..." onChange="reply_submit(this,this.value)">
                  </div>
                </div>
                </div>
              </div>
            </div>
              <?php endforeach;?>
              <?php if(count($news) > 5) { ?>
              <p class="selengkapnya">
                
<h4 align="center"><a data-toggle="tab" id="1"  class="client-link" onClick="reply_click_news(this.id)" style="cursor: pointer;">Selengkapnya</a></h4>
            </p>
            <?php } ?>
            
           </div>
          </div>
        </div>
      </div>
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
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: '<?php echo base_url();?>assets/emoji/img/',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>
	
<script>

    $("#text_1").keyup(function() {
      $("#text_2").val($("#text_1").val());
        var x = document.getElementById("text_2");
            x.value = x.value.toLowerCase();
      })

    
    $(document).on("change", "input[name='chk1']", function () {
    var checkbox = $(this);
    var checked = checkbox.prop('checked');
    $.ajax({
        url:"<?php echo base_url("produk/updateStock_varian"); ?>",
        type: 'post',
        data: {
            action: 'checkbox-select', 
            id: checkbox.data('contact_avl1'), 
            checked: checked
        },
        success: function(data) {
            //alert(data);
        },
        error: function(data) {
           // alert(data);
            // Revert
            checkbox.attr('checked', !checked);
        }
    });
});

        Dropzone.options.dropzoneForm = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            dictDefaultMessage: "(Upload file atau video)"
        };

        $(document).ready(function(){

            var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
                lineNumbers: true,
                matchBrackets: true
            });

            var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
                lineNumbers: true,
                matchBrackets: true
            });

            var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
                lineNumbers: true,
                matchBrackets: true
            });

       });
    </script>

    <script>
function reply_submit(obj,val) {
      var id_news = obj.getAttribute('data-id_news');
      var id_user = obj.getAttribute('id_user');
      var replay=val;

        $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>Dashboard/replay_submit",
           data:{id_news,replay,id_user},
          success: function(data){
             window.location.reload();
           }
        })
  
}



 function validasi()
    {

        var update_status=document.forms["myform"]["update_status"].value;

//        validasi question tidak boleh kosong (required)

        if (update_status==null || update_status=="")
          {
           swal({
                title: "Peringatan!",
                text: "News tidak boleh kosong!"
            });
          return false;
          };


          if (update_status.length<=5)
          {
          swal({
                title: "Peringatan!",
                text: "Panjang karakter minimal harus 5 !"
            });
          return false;
          };

          if (update_status.length>=200)
          {
          swal({
                title: "Peringatan!",
                text: "Panjang karakter maximal harus 300 !"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        
        

       
       
       
       
     }


  $(document).on("click", ".like_button", function () {
        var myId = $(this).data('id');
        var id_login = $(this).data('id_login');
        var status = $(this).data('status');
      
        $.ajax({
            type: 'POST',
            url: 'http://portal.aartijaya.com/Dashboard/news_like',
            data: { ids: myId,id_login :id_login,status:status},
            success: function(response) {
               window.location.reload();
            }
        });
    }); 



 $(document).on("click", ".komentar_button", function () {
        var myId = $(this).data('id');
        var id_login = $(this).data('id_login');
        var status = $(this).data('status');
      
        $.ajax({
            type: 'POST',
            url: 'http://portal.aartijaya.com/Dashboard/news_like',
            data: { ids: myId,id_login :id_login,status:status},
            success: function(response) {
               
            }
        });
    }); 



function reply_clickk(clicked_id)
            {
                var id=clicked_id;             
                $('.tampilaja'+id).load("<?php echo base_url() ?>Dashboard/replay_komentar/"+id);
            }


function reply_click_news(clicked_id)
            {
                var id=clicked_id;             
                $('.selengkapnya').load("<?php echo base_url() ?>Dashboard/news_selengkapnya/"+id);
            }

</script>

    
