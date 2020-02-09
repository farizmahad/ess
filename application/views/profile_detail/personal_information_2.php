<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>Informasi Pribadi | ESS PT. Aartijaya</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
  </head>
  <body>

  <?php foreach($detail_pekerjaan as $pek):?>
    <div class="container-fluid">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover"> <!-- Edited -->

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
				<div class="col-md-3">
					<div class="profile-info">
						<?php if($pek->foto){?>
						<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pek->foto; ?>" alt="" class="img-responsive profile-photo" />
						<?php } ?>
						<h3><?php echo $pek->first_name; ?> <?php echo $pek->last_name; ?></h3>
						<p class="text-muted"><?php echo $pek->nama_jabatan; ?></p>

						<!--Edit Profile Menu-->
						<ul class="edit-menu">
							<li><i class="icon ion-ios-information-outline"></i><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Ringkasan Profile</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Profile Singkat</a></li>
							<!--<li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Compensation</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Career</a></li>-->
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('organisasi/'.$pek->id);?>">Struktur Organisasi</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Kinerja</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
							<li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Informasi Pribadi</a></li>
						</ul>
					</div>
				</div>
				<!--
				<div class="col-md-9">
					<ul class="list-inline profile-menu">
					  <li><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>" class="active">Informasi Pribadi</a></li>
					</ul>
				</div>
				-->
            </div>
          </div>
			<?php endforeach; ?>
			<?php foreach($detail_pekerjaan as $pek) :?>
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <!--<//?php echo $pek->foto; ?>-->
              <?php if($pek->foto){ ?>
              <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pek->foto; ?>" alt="" class="img-responsive profile-photo" />
            <?php } ?>
              <h4><?php echo $pek->first_name; ?> <?php echo $pek->last_name; ?></h4>
              <p class="text-warning"><?php echo $pek->nama_jabatan; ?></p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Ringkasan Profile</a></li>
				<li><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Profile Singkat</a></li>
				<li><a href="<?php echo site_url('organisasi/'.$pek->id);?>">Struktur Organisasi</a></li>
				<li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Kinerja</a></li>
				<li><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
				<li><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Informasi Pribadi</a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php endforeach; ?>



       <div id="page-contents">
          <div class="row">
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-9 col-md-9">
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-default">
						  <div class="container-fluid">
							<!--<div class="navbar-header">
							  <a class="navbar-brand" href="#">WebSiteName</a>
							</div>
							-->
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>" class="active"><strong>Informasi Pribadi</strong></a></li>
							</ul>
						  </div>
						</nav>
					</div>
				</div>
				
              <div  class="row">
                  
				<?php foreach($users as $us):?>

         <?php /*
					<button class="btn btn-primary dev_button" data-toggle="modal" data-target="#myModalBerat"
					data-id="<?php echo $us->id; ?>"
					data-jenis_kelamin="<?php echo $us->jenis_kelamin; ?>"
					data-tanggal_lahir="<?php echo $us->tanggal_lahir; ?>"
					data-negara_lahir="<?php echo $us->negara_lahir; ?>"
					data-id_provinsi_lahir="<?php echo $us->id_provinsi_lahir; ?>"
					data-id_kota_lahir="<?php echo $us->id_kota_lahir; ?>"
					data-status_pernikahan="<?php echo $us->status_pernikahan; ?>"
					data-agama="<?php echo $us->agama; ?>"
					data-status_kewarganegaraan="<?php echo $us->status_kewarganegaraan; ?>"
					>Edit</button>
            */
          ?>
                  <h4><b>Informasi Pribadi</b></h4>  
                <table class="table">
                  <thead>
                    
                  </thead>
                  <tbody>
                    <tr>
                         <th scope="row">Email</th>
                      <td><?php echo $us->email; ?></td>
                    </tr>
                     <tr>
                         <th scope="row">No Telepon</th>
                      <td><?php echo $us->phone; ?></td>
                    </tr>
                     <tr>
                         <th scope="row">Divisi</th>
                      <td><?php echo $us->nama_divisi; ?></td>
                    </tr>
                     <tr>
                         <th scope="row">Jabatan</th>
                      <td><?php echo $us->nama_jabatan; ?></td>
                    </tr>
                      <th scope="row">Jenis Kelamin</th>
                      <td>
                         
                        <?php
                        if($us->jenis_kelamin==1){
                        echo "Laki laki";
                      }elseif($us->jenis_kelamin==0){
                      echo "Perempuan";
                    }
                    ?>
                      </td>
                    </tr>


                    <tr>
                      <th scope="row">Tanggal Lahir</th>
                      <td><?php echo date_indo($us->tanggal_lahir); ?></td>
                    </tr>
                    <!--<tr>
                      <th scope="row">Age</th>
                      <td> <//?php
                                                   $tanggal_lahir=new DateTime($us->tanggal_lahir);
                                                   $hari_ini=date('Y-m-d');
                                                   $bulan_ini=date('m');
                                                   $today=new DateTime($hari_ini);
                                                   $interval = $tanggal_lahir->diff($today);
                                                   $selisih=$interval->days;
                                                    
                                                    //menghitung tahun

                                                   $tahun = floor($selisih/365);
                                                   $sisa_tahun= $selisih % 365;

                                                   //menghitung bulan

                                                   $bulan = floor($sisa_tahun/12);


                                                   // meghiutng hari


                                                   if($bulan_ini=="04" or $bulan_ini=="06" or $bulan_ini=="09" or $bulan_ini=="1"){
                                                   $sisa_hari= $sisa_tahun % 30;
                                                   }elseif($bulan_ini=="01" or $bulan_ini=="03" or $bulan_ini=="05"or $bulan_ini=="07"  or $bulan_ini=="08" or $bulan_ini=="10"  or $bulan_ini=="12"){
                                                      $sisa_hari= $sisa_tahun % 31;

                                                   }elseif($bulan_ini=="02"){
                                                        
                                                   $tahun_sekarang = date ("Y");
                                                   $kabisat = $tahun_sekarang % 4;
                                                   if($kabisat==0){
                                                        $sisa_hari= $sisa_tahun % 29;
                                                   }else{
                                                        $sisa_hari= $sisa_tahun % 28;
                                                   }
      
                                                   }
                                                   $hari = floor($sisa_hari/1);
                                                   
                                                  
                                                   echo $tahun; echo " "; echo "tahun";  echo " "; echo $bulan;echo " "; echo "bulan"; echo " "; echo $hari; echo "  "; echo "hari";
                                              ?>



                     </td>
                    </tr>-->
                    <!--<tr>
                      <th scope="row">Country of Birth</th>
                      <td><//?php echo $us->negara_lahir; ?></td>
                    </tr>-->
                    <!--<tr>
                      <th scope="row">Region of Birth</th>
                      <td>
                        <//?php 
                        $id_provinsi_lahir=$us->id_provinsi_lahir;
                        $id_kota_lahir=$us->id_kota_lahir;

                        $get_provinsi_id=$this->Profile_detail_model->get_provinsi_id($id_provinsi_lahir);
                        ?>

                        <//?php foreach($get_provinsi_id as $prov):?>
                            <//?php echo $prov->nama; ?>

                        <//?php endforeach; ?>
                      </td>
                    </tr>-->
                    <tr>
                      <th scope="row">Kota Lahir</th>
                      <td>
                        <?php
                          $get_kota_id=$this->Profile_detail_model->get_kota_id($id_kota_lahir);
                        ?>

                        <?php foreach($get_kota_id as $kot):?>
                            <?php echo $kot->nama; ?>

                        <?php endforeach; ?>

                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Status Perkawinan</th>
                      <td><?php echo $us->status_pernikahan; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Agama</th>
                      <td><?php echo $us->agama; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Kewarganegaraan</th>
                      <td><?php echo $us->status_kewarganegaraan; ?></td>
                    </tr>
                    <table border="0"></table>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                     <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                     <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                     <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                     <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                     <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                     <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                  </tbody>
                </table>  
                <br><br><br><br> <br><br><br><br>
            
            </div>
            
          </div>
        <?php endforeach; ?>  
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="myModalBerat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="addBookDialogBerat">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Informasi Personal</h4>
      </div>
      <form method='post' action='<?php echo base_url();?>Profile_detail/save_personal'>
      <div class="modal-body">
       
			<div class="form-group">
				<label>Gender</label>
				<select class="form-control jenis_kelamin" name="jenis_kelamin">
					   <option value="">Pilih Jenis Kelamin</option>
					   <option value="1">Wanita</option>
					   <option value="2">Pria</option>
				</select>
			</div>

            <div class="form-group col-xs-12" id="data_1">
				<label>Tanggal Lahir</label> 
				<div class="input-group date">
				  <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span>
				  <input type="text" class="form-control tanggal_lahir" placeholder="Pilih Tanggal" name="tanggal_lahir">
				</div>
            </div>

             <!--<div class="form-group">
                        <label>Country of Birth</label>
                       <input type="text" name="negara_lahir" class="form-control negara_lahir">
                       
              </div>

 <div class="form-group">
  <label>Region of Birth</label>
               <select name="id_provinsi_lahir" id="provinsi" class="form-control id_provinsi_lahir">
                    <option value="">Select Region</option>
                    <//?php foreach($provinsi as $prov):?>
                      <option value="<//?php  echo $prov->id; ?>">
                        <//?php echo $prov->nama; ?>
                      </option>


                    <//?php endforeach;?>                                
                </select>

              </div>-->


				<div class="form-group">                                
					<label>Kota Lahir</label>
					<select name="id_kota_lahir" id="kota" class="form-control kota id_kota_lahir">
					 <option value="">Kota Lahir</option>
					 <?php foreach($kota as $kot):?>

					   <option value="<?php echo $kot->id; ?>">
						 <?php echo $kot->nama; ?>
					   </option>
					  <?php endforeach;?>
					</select>
				</div>
                                                     
      
				<div class="form-group">
					<label>Status Perkawinan</label>
					<select class="form-control status_pernikahan" name="status_pernikahan">
						<option value="">Pilih Status Perkawinan</option>
						<option value="1">Belum Kawin</option>
						<option value="2">Kawin</option>
						<option value="3">Duda</option>
						<option value="4">Janda</option>
						<option value="5">Cerai</option>
					</select>
				</div>

				<div class="form-group">
					<label>Agama</label>
					<select class="form-control agama" name="agama">
						<option value="">Pilh Agama</option>
						<option value="1">Islam</option>
						<option value="2">Kristen Katholik</option>
						<option value="3">Kristen Protestan</option>
						<option value="5">Buddha</option>
						<option value="6">Hindu</option>
					</select>
				</div>


                <div class="form-group">
					<label>Kewarganegaraan</label>
					<input type="text" name="status_kewarganegaraan" class="form-control status_kewarganegaraan">
					<input type="hidden" name="id" class="form-control id">
				</div>
                                                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        
        <input type="submit" name='submit' value='Save changes' class="btn btn-primary">
      </div>
       </form>
    </div>
  </div>
</div>

</body>
<script>
$(document).on( "click", '.dev_button',function(e) {
        var id              		= $(this).data('id');
        var jenis_kelamin           = $(this).data('jenis_kelamin');
        var tanggal_lahir           = $(this).data('tanggal_lahir');
        var negara_lahir            = $(this).data('negara_lahir');
        var id_provinsi_lahir       = $(this).data('id_provinsi_lahir');
        var id_kota_lahir           = $(this).data('id_kota_lahir');
        var status_pernikahan       = $(this).data('status_pernikahan');
        var agama                   = $(this).data('agama');
        var status_kewarganegaraan  = $(this).data('status_kewarganegaraan');



        $(".id").val(id);
        $(".jenis_kelamin").val(jenis_kelamin);
        $(".tanggal_lahir").val(tanggal_lahir);
        $(".negara_lahir").val(negara_lahir);
        $(".id_provinsi_lahir").val(id_provinsi_lahir);
        $(".id_kota_lahir").val(id_kota_lahir);
        $(".status_pernikahan").val(status_pernikahan);
        $(".agama").val(agama);
        $(".status_kewarganegaraan").val(status_kewarganegaraan);


    });
</script>
<script>
  $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

  </script>

  <script>
$(document).ready(function(){
        $("#provinsi").change(function (){
            var url = "<?php echo site_url('Profile_detail/add_ajax_kab');?>/"+$(this).val();
            $('#kota').load(url);
            return false;
        })      
});

  </script>