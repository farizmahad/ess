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
<div class="col-md-7">
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Register User </h4>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <?php echo $this->session->flashdata('message');?>
                  <br>
                  <form method="post" action="<?php echo base_url();?>profile/register" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Nama Depan</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="first_name" id="first_name" title="Enter first name" placeholder="Nama Depan">
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Nama Belakang</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="last_name" id="last_name" title="Enter first name" placeholder="Nama Belakang">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="perusahaan">Divisi</label>
                       <select class="form-control" name="id_divisi">
                              <option value=""> Pilih Divisi</option>
                              <?php foreach($divisi as $div):?>
                              <option value="<?php echo $div->id_divisi; ?>">
                                <?php echo $div->nama_divisi; ?>
                              </option>
                               
                              <?php endforeach; ?>
                       </select>
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="perusahaan">Jabatan</label>
                        <select class="form-control" name="id_jabatan">
                              <option value=""> Pilih Jabatan</option>
                              <?php foreach($jabatan as $jab):?>
                              <option value="<?php echo $jab->id_jabatan; ?>">
                                <?php echo $jab->nama_jabatan; ?>
                              </option>
                               
                              <?php endforeach; ?>
                       </select>
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="email">No. Telepon</label>
                        <input id="email" class="form-control input-group-lg" type="number" name="phone" id="phone" title="Masukan No. Telepon" placeholder="No. Telepon">
                      </div>

                       <div class="form-group col-xs-12">
                        <label for="email">Email</label>
                        <input id="email" class="form-control input-group-lg" type="email" name="email" id="email" title="Masukan No. Telepon" placeholder="Email">
                      </div>
                       <div class="form-group col-xs-12">
                        <label for="email">Atasan Langsung</label>
                        <select class="form-control" name="id_line_manajer">
                              <option value=""> Pilih Atasan Langsung</option>
                              <option value="0">Tidak ada atasan langsung</option>
                              <?php foreach($atasan_langsung as $ata): ?>

                                    <option value="<?php echo $ata->id; ?>"><?php echo $ata->first_name; ?> <?php echo $ata->last_name; ?> | <?php echo $ata->nama_divisi; ?></option>
                                <?php endforeach; ?>
                              
                       </select>
                      </div>

                      <div class="form-group col-xs-12">
                        <label for="email">Foto</label> 
                         <input id="uploadFile" placeholder="Pilih File..." readonly style="padding:2px;border-radius: 5px;border: 1px solid white;">
                               <div class="fileUpload btn btn-info">
                               <span>Upload</span>
                             <input id="uploadBtn" type="file" class="upload" name="foto">
                           </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="city"> Password </label>
                        <input id="password" class="form-control input-group-lg" type="password" name="password" title="Masukan Password" placeholder="Isi hanya untuk ganti password">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="city"> Konfirmasi Password </label>
                       <input type="password" placeholder="Password (sekali lagi)" name="passconf" class="form-control">
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
  

    <script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
    };
    </script>

