
<?php foreach($profile as $pro) : ?>
<div class="col-md-7">
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Informasi Akun </h4>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                 
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Nama Lengkap</label>
                          <p class = "text-success"> <?php echo $pro->first_name; echo $pro->last_name; ?></p>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="firstname"> Nama Depan</label>
                        <p class = "text-success"> <?php echo $pro->first_name; ?> </p>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname" class="">Nama Belakang</label>
                        <p class = "text-success"> <?php echo $pro->last_name; ?></p>
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Email</label>
                          <p class = "text-success"> <?php echo $pro->email; ?> </p>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="firstname"> Divisi</label>
                        <p class = "text-success"> <?php echo $pro->nama_divisi; ?></p>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname" class="">Jabatan</label>
                        <p class = "text-success"> <?php echo $pro->nama_jabatan; ?> </p>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname" class="">Foto Profil</label><br/>
                        <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pro->foto; ?>" class="img-responsive" style="object-fit:contain; width: 125px;"alt="Responsive image">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                           <a href="<?php echo base_url(); ?>ubah-kata-sandi"><button class="btn btn-primary">Ubah</button></a>
                        </div>
                    </div>
               
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


   