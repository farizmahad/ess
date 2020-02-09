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

<?php
      foreach($profile as $user ):   
?>
      <div class="col-md-7">
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit Informasi Akun </h4>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <?php echo $this->session->flashdata('message');?>
                  <br>
                  <form method="post" action="<?php echo base_url();?>profile/update_akun" enctype="multipart/form-data">

                    
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="firstname"> Nama Depan</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="first_name" id="first_name" title="Enter first name" placeholder="First name" value="<?php echo $user->first_name; ?>" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname" class="">Nama Belakang</label>
                        <input id="lastname" class="form-control input-group-lg" type="text" name="last_name" id="last_name" title="Enter last name" placeholder="Last name" value="<?php echo $user->last_name; ?>" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="perusahaan">Divisi</label>
                        <input id="perusahaan" class="form-control input-group-lg" type="text" name="id_divisi"  id="id_divisi" title="Masukan Nama Perusahaan" placeholder="Nama Divisi" value="<?php echo $user->nama_divisi; ?>" readonly/>
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="perusahaan">Jabatan</label>
                        <input id="perusahaan" class="form-control input-group-lg" type="text" name="id_jabatan" id="id_jabatan" title="Masukan Nama Perusahaan" placeholder="Nama Jabatan" value="<?php echo $user->nama_jabatan; ?>" readonly/>
                      </div>

                      <div class="form-group col-xs-12">
                        <label for="email">Email</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="email" id="email" title="Masukan No. Telepon" placeholder="Email Anda" value="<?php echo $user->email; ?>" />
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="email">No. Telepon</label>
                        <input id="email" class="form-control input-group-lg" type="number" name="phone" id="phone" title="Masukan No. Telepon" placeholder="No. Telepon" value="<?php echo $user->phone; ?>" />
                      </div>

                      <div class="form-group col-xs-12">
                        <label for="email">Foto</label>
                        <?php 
                        if($user->foto){ ?>
                        <div class="col-xs-6">
                                 <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $user->foto; ?>" width="150px" height="150px">    
                        </div>
                        <?php  }  ?>
                       <div class="<?php if($user->foto){ ?> col-xs-6 <?php }else{ ?> col-xs-6   <?php } ?>">
                         
                         <input id="uploadFile" placeholder="Pilih File..." readonly style="padding:2px;border-radius: 5px;border: 1px solid white;">
                               <div class="fileUpload btn btn-info">
                               <span>Upload</span>

                             <input id="uploadBtn" type="file" class="upload" name="foto">
                           </div>
                      </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="city"> Password </label>
                        <input id="password" class="form-control input-group-lg" type="password" name="password" title="Masukan Password" placeholder="Isi hanya untuk ganti password">
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-2 static">
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

    <script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
    };
    </script>

