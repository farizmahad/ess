
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Tambah User</h2>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                           
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">

                                     <form  action="create_user" method="post" enctype="multipart/form-data">   
                                        <fieldset class="form-horizontal">
                                        
                                            
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama Depan</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="first_name" placeholder="Nama Depan" required oninvalid="this.setCustomValidity('Nama Depan tidak boleh kosong')" oninput="setCustomValidity('')"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama Belakang</label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control" name="last_name" placeholder="Nama Belakang" required oninvalid="this.setCustomValidity('Nama Belakang tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                                </div>



                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Divisi</label>
                                                <div class="col-sm-10">
                                                  <select class="form-control" name="id_divisi" required oninvalid="this.setCustomValidity('Divisi tidak boleh kosong')" oninput="setCustomValidity('')">
                                                      <option>Pilih Divisi</option>
                                                      <?php foreach($divisi as $div): ?>
                                                      <option value="<?php echo $div->id_divisi; ?>"><?php echo $div->nama_divisi; ?></option>
                                                      <?php endforeach; ?>

                                                  </select>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="id_jabatan" required  oninvalid="this.setCustomValidity('Jabatan tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option>Pilih Jabatan</option>
                                                        <?php foreach($jabatan as $jab): ?>
                                                            <option value="<?php echo $jab->id_jabatan; ?>"><?php echo $jab->nama_jabatan; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                            </div>

                                              <div class="form-group">
                                                <label class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                   <input type="email" class="form-control" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">No Telepon</label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control" name="phone" placeholder="No Telepon" required oninvalid="this.setCustomValidity('No Telepon tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                            </div> 

                                           

                                             <div class="form-group">
                                                <label class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                  <input type="password" class="form-control" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-sm-2 control-label">Konfirmasi Password</label>
                                                <div class="col-sm-10">
                                                  <input type="password" class="form-control" name="password_confirm" placeholder="Konfirmasi Password" required oninvalid="this.setCustomValidity('Konfirmasi  Password tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                            </div>
                                             
                                          
                                            
                                              <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                   <input type="hidden" name="kode" value="">
                                                   <input type="submit" name="submit" value="Simpan" class="btn btn-info" id="submit">
                                                </div>
                                              </div>
                                             
                                        </fieldset>
                                      <?php echo form_close();?>

                                    </div>
                                </div>
                            </div>
             

        </div>  
</div>
    </div>
</div>






