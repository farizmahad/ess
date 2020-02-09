        <div class="col-md-7">
              <div class="edit-profile-container">
                <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-7">
                <h2>Tambah Group</h2>
            </div>
        </div>

            <div class="edit-block">
                  <?php echo $this->session->flashdata('message');?>
                  <br>
                  <?php echo form_open("auth/create_group");?>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Nama</label>
                        <input type="text" class="form-control" name="group_name" placeholder="Nama">
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="firstname"> Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi">
                      </div>
                         <button class="btn btn-info" type="submit">Simpan</button>
                    </div>  
                 <?php echo form_close();?>
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


        








        
        