<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>News Feed | Check what your friends are doing</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	
	<!-- Begin emoji-picker Stylesheets -->
    <link href="<?php echo base_url(); ?>assets/plugins/css/emoji/emoji.css" rel="stylesheet">
    <!-- End emoji-picker Stylesheets -->

    <link href="<?php echo base_url(); ?>assets/plugins/css/dropzone/basic.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/css/dropzone/dropzone.css" rel="stylesheet">

    
      <style type="text/css">
	  
		.thumb2{ 
			  width: 30%;
			  height: auto;
			  padding-right: 2px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}

		@media (min-width: 576px) {
		  .thumb2{ 
			  width: 50%;
			  height: auto;
			  padding-right: 0px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}
		}

		@media (min-width: 768px) {
		  .thumb2{ 
			  width: 50%;
			  height: auto;
			  padding-right: 5px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}
		}
		
		@media (min-width: 992px) {
		  .thumb2{ 
			  width: 50%;
			  height: auto;
			  padding-right: 5px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}
		}
		
		@media (min-width: 1200px) {
		  .thumb2{ 
			  width: 200px;
			  height: auto;
			  padding-right: 5px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}
		}
	  
		.thumb{ 
			  width: 100%;
			  height: auto;
			  padding-right: 0px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}

		@media (min-width: 576px) {
		  .thumb{ 
			  width: 100%;
			  height: auto;
			  padding-right: 0px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}
		}

		@media (min-width: 768px) {
		  .thumb{ 
			  width: 100%;
			  height: auto;
			  padding-right: 5px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}
		}
		
		@media (min-width: 992px) {
		  .thumb{ 
			  width: 100%;
			  height: auto;
			  padding-right: 5px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}
		}
		
		@media (min-width: 1200px) {
		  .thumb{ 
			  width: 100%;
			  padding-right: 5px;
			  padding-bottom: 5px;
			  margin-bottom: 10px;
			}
		}
		
		
		#blah {
		  border: 2px solid;
		  display: block;
		  background-color: white;
		  border-radius: 5px;
		}

		.image-upload > input
		{
			display: none;
		}

		.image-upload img
		{
			width: 80px;
			cursor: pointer;
		}


    </style>
  </head>
  <body>
          <div class="col-md-9">

            <!-- Post Create Box
            ================================================= -->
            <div class="create-post">
				
				<div class="row">
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
						<?php $get_users=$this->Home_model->get_users($id_login);?>

						<?php foreach($get_users as $ge){ ?>
							<?php if($ge->foto) { ?>
								<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $ge->foto; ?>" alt="" class="profile-photo-md" />
							<?php } ?>
						<?php } ?>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
						<div class="row">
              <!--
							<form id="myform" onSubmit="return validasi()" method="POST" action="<?php echo base_url();?>Dashboard/insert_news" enctype="multipart/form-data">
              -->
              
						   <form method="post" id="upload_form" enctype="multipart/form-data"> 
								<div class="col-xl-10 col-lg-10 col-md-11 col-sm-11 col-xs-9">
									<p class="lead emoji-picker-container">
									<textarea name="news" cols="100" rows="5" class="form-control textarea-control update_news" placeholder="Apa yang ada dalam benakmu?" data-emojiable="true" id="update_status"></textarea>
									
									</p>
								
								</div>
							
								<div class="col-xl-2 col-lg-2 col-md-1 col-sm-1 col-xs-2">
									<div class="tools">
									  <ul class="publishing-tools list-inline">
										<li>
											<div>
												<div class="image-upload">
													<label for="image_file">
													  <i class="ion-images"></i>
													</label>
													<input type="file" id="image_file" multiple="multiple" class="upload_button metode" name="news_aja">
														  
														  <!--<div id="uploadPreview"></div>-->
												</div>
											</div>
										</li>
									  </ul>
				   
									  <button class="btn btn-primary pull-left" type="submit">Bagikan</button>
									</div>
								</div>
							</form>
						
							
						</div>
						<!--<form id="myform" onSubmit="return validasi()" method="POST" action="<//?php echo base_url();?>Dashboard/insert_news">
							<p class="lead emoji-picker-container">
							<textarea name="news" cols="100" rows="5" class="form-control textarea-control" placeholder="Apa yang ada dalam benakmu?" data-emojiable="true" id="update_status"></textarea>
							</p>
							<button class="btn btn-primary pull-left" type="submit">Bagikan</button>
						</form>-->
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div id="uploadPreview">
							
						</div>
					</div>
				</div>
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
       if($jumlah_news >0) {
       foreach($news as $ne):?>
        <?php
              $id_berita[]=$ne->id_news;
         ?>

                 
            <div class="post-content">
				<div class="row justify-content-center align-items-center">
					<?php
						$news_id=$ne->id_news;
						$image=$this->Home_model->get_image_news($news_id);
						$count_image=count($image);
						foreach($image as $ima):   
					?>
					<?php if($count_image==1){ ?>
					<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
					<?php }elseif($count_image==2){ ?>
					<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<?php }elseif($count_image==3){ ?>
                     <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
					<?php } ?>
						<img src="<?php echo base_url(); ?>uploads/<?php echo $ima->file; ?>" class="thumb">
					</div>
					<?php endforeach;?>
				</div>
            	<!--<table>
            		<tr>
					<?php
						$news_id=$ne->id_news;
						$image=$this->Home_model->get_image_news($news_id);
						foreach($image as $ima):   
					?>
				    <!--<img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />
						<td class="col-xl-6 col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<img src="<?php echo base_url(); ?>uploads/<?php echo $ima->file; ?>" class="img-fluid thumb">
						</td>
					<?php endforeach;?>
					</tr>
				</table>-->
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
                 
                    $cek_like=$this->Home_model->cek_like($id_news,$id_login);
                      $select_like=$this->Home_model->select_like($id_news);
                      ?>
                  

                   

                  <div class="reaction">
                <?php
                       $count_cek_like=count($cek_like);
                 ?>
                    <?php
                   if ($count_cek_like > 0) { ?>
                       <a class="btn text-green like_button" data-id="<?php echo $ne->id_news; ?>" data-id_login="<?php echo $id_login; ?>" data-status="1"><i class="icon ion-thumbsup"></i> <?php echo count($select_like); ?></a>

                    <?php  }else{ ?>
                    <a class="btn text-blue like_button" data-id="<?php echo $ne->id_news; ?>" data-id_login="<?php echo $id_login; ?>" data-status="0"><i class="icon ion-thumbsup"></i> <?php echo count($select_like); ?></a>
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

					<?php if($id_login==$ne->id_user){?>
					<div class="tools">
						  <ul class="publishing-tools list-inline">


						 	<li>
						 		<a data-toggle="tab"  id="<?php echo $ne->id_news; ?>" class="client-link" onClick="reply_click_edit(this.id)" style="cursor: pointer;">
								<i class="ion-compose"></i></a></li>
							<li><a data-toggle="tab" data-id_news="<?php echo $ne->id_news; ?>" id="btn_delete"><i class="ion-ios-trash" style="cursor: pointer;"></i></a></li>
						  </ul>
					</div>
        <?php } ?>

                  </div>
                  <div class="gambar<?php echo $ne->id_news; ?>">
                           
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
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

          
					<?php if($id_login==$ge->id_user_komentar){?>

          <div class="tools">
					  <ul class="publishing-tools list-inline">
						<li><a data-toggle="modal" data-target="#KomentarModal" class="data_komentar" data-id_news_komentar="<?php echo $ge->id_news_komentar; ?>" data-komentar="<?php echo $ge->komentar; ?>" data-id_news="<?php echo $ge->id_news; ?>" style="cursor: pointer;"><i class="ion-compose"></i></a></li>
						<li>
                 <li><a data-toggle="tab" data-id_news="<?php echo $ne->id_news; ?>" 
                 data-id_news_komentar="<?php echo $ge->id_news_komentar; ?>"

                  id="btn_delete_komentar"><i class="ion-ios-trash" style="cursor: pointer;"></i></a></li>
					  </ul>
					</div>
        <?php } ?>

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
              <?php }else{ ?>
                        <div align="center">  

                                    <h2> Belum ada kabar berita!</h2>
                                   </div>
              <?php } ?>
            
           </div>
          </div>
        </div>
      </div>
    </div>



   <div class="modal fade" id="KomentarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Komentar</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label>Komentar</label>
            <textarea name="komentar" class="form-control komentar" rows="6" id="komentar"></textarea>
            
          </div>
           <input class="form-control id_news_komentar" type="hidden" name="id_news_komentar" id="id_news_komentar">
           <input class="form-control id_news" type="hidden" name="id_news" id="id_newss">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-default" value="Simpan" id="update_komentar">
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
    
	<script type="text/javascript">



</script>

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
            url: '<?php echo base_url(); ?>Dashboard/news_like',
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
            url: '<?php echo base_url(); ?>Dashboard/news_like',
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


function reply_click_edit(clicked_id)
            {
                var id=clicked_id; 

                $('.gambar'+id).load("<?php echo base_url() ?>Dashboard/edit_komentar/"+id);
            }

</script>
<script>

$(document).ready(function(){
        $('#btn_delete').on('click', function(){
            
            var id_news= $(this).data('id_news');
           
            swal({
                title: "Hapus ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Hapus !",
                cancelButtonText: "Batalkan",
                closeOnConfirm: false
            }, function(){
                $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Dashboard/delete_news')?>",
                dataType : "JSON",
                data : {id_news:id_news},
               success: function(data) {
                 
                 $('.gambar'+id_news).load("<?php echo base_url() ?>Dashboard/edit_komentar/"+id_news);
                 window.location.reload();
               
            }
            });


            });

           
        });


    });
  </script>
  <script>
$(document).on("click", ".data_komentar", function () {
        var komentar = $(this).data('komentar');
        var id_news_komentar = $(this).data('id_news_komentar');
        var id_news = $(this).data('id_news');

    $(".komentar").val(komentar);
    $(".id_news_komentar").val(id_news_komentar);
    $(".id_news").val(id_news);  
    }); 




      $('#update_komentar').on('click',function(){

            var id_news_komentar = $('#id_news_komentar').val();
            var komentar = $('#komentar').val();
            var id_newss = $('#id_newss').val();
            
            
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Dashboard/update_komentar_news')?>",
                dataType : "JSON",
                data : {id_news_komentar:id_news_komentar , komentar:komentar,id_newss:id_newss},
               success: function(data) {
                 
                 $('.gambar'+id_newss).load("<?php echo base_url() ?>Dashboard/edit_komentar/"+id_newss);
                 window.location.reload();
               
            }
            });
            return false;
        });




$(document).ready(function(){
        $('#btn_delete_komentar').on('click', function(){
            
            var id_news= $(this).data('id_news');
            var id_news_komentar= $(this).data('id_news_komentar');

           
            swal({
                title: "Hapus Komentar ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Hapus !",
                cancelButtonText: "Batalkan",
                closeOnConfirm: false
            }, function(){
                $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Dashboard/delete_komentar_news')?>",
                dataType : "JSON",
                data : {id_news:id_news,id_news_komentar:id_news_komentar},
               success: function(data) {
                 
                 $('.gambar'+id_news).load("<?php echo base_url() ?>Dashboard/edit_komentar/"+id_news);
                 window.location.reload();
               
            }
            });


            });

           
        });


    });
 </script>

<script>
  $(document).ready(function(){

$('.metode').on('change', function() {
   
var F = this.files;

   if (F && F[0]) {

    for (var i = 0; i < F.length; i++) {
      readImage(F[i]);
    }
}


})
});


  function readImage(file) {
  var reader = new FileReader();
  var image  = new Image();
 
  reader.readAsDataURL(file);  
  reader.onload = function(_file) {
    image.src = _file.target.result; // url.createObjectURL(file);
    image.onload = function() {
      var w = this.width,
          h = this.height,
          t = file.type, // ext only: // file.type.split('/')[1],
          n = file.name,
          s = ~~(file.size/10000) +'KB';
      $('#uploadPreview').append('<img src="' + this.src + '" class="thumb2">');
    };
 
    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
    };      
  };
 
}
</script>
<script>
  
$(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  
 var update_news= $('.update_news').val();

           e.preventDefault();  
           if($('#update_status').val() == '')  
           {  
                alert("Isi news tidak boleh kosong");  
           }  
           else 
           {  
              var form_data = new FormData();
              var F = document.getElementById('image_file').files;
              

              var ins = document.getElementById('image_file').files.length;
            
     
              for (var x = 0; x < ins; x++) {

                  form_data.append("files[]", document.getElementById('image_file').files[x]);
              }
form_data.append("update_news",update_news);
               
                $.ajax({  
                     url:"<?php echo base_url(); ?>Ajax/multipleImageStore",   
                     method:"POST",  
                    data:form_data, 
                    
                    
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     dataType: "json",
                     success:function(res)  
                     {  
                          window.location.reload();
                        console.log(res.success);
                        if(res.success == true){
                         $('#image_file').val('');
                         $('#uploadPreview').html('');   
                         $('#msg').html(res.msg);   
                         $('#divMsg').show();   
                        }
                        else if(res.success == false){
                          $('#msg').html(res.msg); 
                          $('#divMsg').show(); 
                        }
                        setTimeout(function(){
                         $('#msg').html('');
                         $('#divMsg').hide(); 
                        }, 3000);
                     }  
                });  
           }  
      });  
 }); 

</script>



    
