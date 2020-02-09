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
                  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit User </h4>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <?php echo $this->session->flashdata('message');?>
                  <br>
                 <form method="post" action="<?php echo base_url();?>profile/update_user" enctype="multipart/form-data">
                                         <?php echo form_hidden($csrf); ?>     
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Nama Depan</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="first_name" id="first_name" title="Enter first name" placeholder="Nama Depan" value="<?php echo $user->first_name; ?>">
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Nama Belakang</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="last_name" id="last_name" title="Enter first name" placeholder="Nama Belakang" value="<?php echo $user->last_name; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="perusahaan">Divisi</label>
                       <select class="form-control" name="id_divisi">
                              <option value=""> Pilih Divisi</option>
                              <?php foreach($divisi as $div):?>
                              <option <?php if($user->id_divisi == $div->id_divisi){
                                echo "selected";
                              }
                              ?>
                              value="<?php echo $div->id_divisi; ?>">
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
                              <option <?php if($user->id_jabatan==$jab->id_jabatan){

                                echo "selected";
                              }
                                         ?>

                              value="<?php echo $jab->id_jabatan; ?>">
                                <?php echo $jab->nama_jabatan; ?>
                              </option>
                               
                              <?php endforeach; ?>
                       </select>
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="email">No. Telepon</label>
                        <input id="email" class="form-control input-group-lg" type="number" name="phone" id="phone" title="Masukan No. Telepon" placeholder="No. Telepon" value="<?php  echo $user->phone; ?>">
                      </div>

                       <div class="form-group col-xs-12">
                        <label for="email">Email</label>
                        <input id="email" class="form-control input-group-lg" type="email" name="email" id="email" title="Masukan No. Telepon" placeholder="Email" value="<?php echo $user->email; ?>">
                      </div>
                       <div class="form-group col-xs-12">
                        <label for="email">Atasan Langsung</label>
                        <select class="form-control" name="id_line_manajer">
                              <option value=""> Pilih Atasan Langsung</option>
                              <option value="0">Tidak ada atasan langsung</option>
                              <?php foreach($atasan_langsung as $ata): ?>

                                    <option  <?php if($user->id_line_manajer==$ata->id){

                                      echo "selected";
                                    } ?>

                                    value="<?php echo $ata->id; ?>"><?php echo $ata->first_name; ?> <?php echo $ata->last_name; ?></option>
                                <?php endforeach; ?>
                              
                       </select>
                      </div>

                      <div class="form-group col-xs-12">
                        <label for="email">Foto</label>
                        <?php 
                        if($user->foto){ ?>
                        <div class="col-xs-4">
                                 <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $user->foto; ?>" width="150px" height="150px">    
                        </div>
                        <?php  }  ?>
                       <div class="<?php if($user->foto){ ?> col-xs-8 <?php }else{ ?> col-xs-8   <?php } ?>">

                         <input id="uploadFile" placeholder="Pilih File..." readonly style="padding:2px;border-radius: 5px;border: 1px solid white;">
                               <div class="fileUpload btn btn-info">
                               <span>Upload</span>
                             <input id="uploadBtn" type="file" class="upload" name="foto">
                           </div>
                      </div>
                    </div>
                    <?php if ($this->ion_auth->is_admin()): ?>

          <p><h3><?php echo lang('edit_user_groups_heading');?></h3></p>
          <?php foreach ($groups as $group):?>
           <p>   <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>

              </p>
          
              <p><input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>></p>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>
    </p>

    <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
                    
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="city"> Password </label>
                        <input id="password" class="form-control input-group-lg" type="password" name="password" title="Masukan Password" placeholder="Isi hanya untuk ganti password">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="city"> Konfirmasi Password </label>
                       <input type="password" placeholder="Password (sekali lagi)" name="password_confirm" class="form-control">
                      </div>
                    </div>

                   
                    <button class="btn btn-primary" type="submit">Simpan</button>
                 
</div>
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

