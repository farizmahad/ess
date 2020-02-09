  
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
                <div class="edit-block">
                  <?php echo $this->session->flashdata('message');?>
                  <br>
                <?php echo form_open(current_url());?> 
                                           
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Nama Depan</label>
                        <input type="text" class="form-control" name="group_name"  placeholder="Nama" value="<?php echo $group->name;?>" readonly>
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Nama Belakang</label>
                         <input type="text" class="form-control" name="group_description" placeholder="Deskripsi" value="<?php echo $group->description;?>">
<input type="hidden" name="kode" value="">

                      </div>
                    </div>
                    

                    </div>

                   
                    <button class="btn btn-primary" type="submit">Simpan</button>
                 
</div>
 <?php echo form_close();?>

                </div>
              </div>
            </div>
            <div class="col-md-2 static">
            </div>
          </div>
        </div>
    





      