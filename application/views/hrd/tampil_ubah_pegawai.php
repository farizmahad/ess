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
       <div class="col-md-9">
          <h4 class="grey"><i class="icon ion-plus"></i><?php echo $tanda; ?> Pegawai </h4>
            <div class="line"></div>
              <div class="post-content">
                <div class="post-container">
                          <?php $today=date('Y-m-d');
                            $today1=date('d-m-Y');
                          ?>
               <form id="myform_tambah" onsubmit="return validasi_tambah()" method="POST" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>HRD/aksi_pegawai">
                    <div class = "col-md-12">
                      <div class="form-group col-xs-6">
                        <label for="firstname"> ID Pegawai</label>
                        <input type="text" placeholder="ID Pegawai" class="form-control" name="id_pegawai" <?php if($id_pegawai){?>
                            value="<?php echo $id_pegawai; ?>"
                        <?php } ?>>  
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="firstname">Nama</label>
                        <input type="text" placeholder="Nama" class="form-control" name="nama_pegawai" <?php if($nama){?>
                            value="<?php echo $nama; ?>"
                        <?php } ?>>  
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="firstname">Email</label>
                        <input type="text" placeholder="Email" class="form-control" name="email" <?php if($email){?>
                            value="<?php echo $email; ?>"
                        <?php } ?>>  
                      </div>
                      
                      <div class="form-group col-xs-6">
                        <label for="firstname">Divisi</label>
                        <select class="form-control chosen" name="id_divisi" id="id_divisi">
                           <option value="">Pilih Divisi</option>
                           <?php foreach($divisi as $div):?>
                                 <option  
                                 <?php if($id_divisi==$div->id_divisi){ ?> selected
                                 <?php } ?> value="<?php echo $div->id_divisi; ?>"><?php echo $div->nama_divisi; ?></option>
                           <?php endforeach; ?>
                        </select>  
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="firstname">Posisi</label>
                        <select class="form-control chosen" name="id_jabatan" id="id_jabatan">
                           <option value="">Pilih Posisi</option>
                           <?php foreach($jabatan as $row):?>
                                 <option  
                                 <?php if($id_jabatan==$row->id_jabatan){ ?> selected
                                 <?php } ?> value="<?php echo $row->id_jabatan; ?>"><?php echo $row->nama_jabatan; ?></option>
                           <?php endforeach; ?>
                        </select>  
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="firstname">Provinsi Lahir</label>
                        <select class="form-control" name="id_provinsi_lahir" id="id_provinsi_lahir">
                           <option value="">Pilih Provinsi</option>
                           <?php foreach($provinsi as $row):?>
                                 <option  
                                 <?php if($id_provinsi_lahir==$row->id){ ?> selected
                                 <?php } ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                           <?php endforeach; ?>
                        </select>  
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="firstname">Kota/Kabupaten Lahir</label>
                        <select class="form-control" name="id_kota_lahir" id="id_kota_lahir">
                           <option value="">Pilih Kota</option>
                           <?php foreach($kota as $row):?>
                                 <option  
                                 <?php if($id_kota_lahir==$row->id){ ?> selected
                                 <?php } ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                           <?php endforeach; ?>
                        </select>  
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="firstname">Status Pernikahan</label>
                        <select class="form-control chosen" name="status_pernikahan" id="status_pernikahan">
                           <option value="">Pilih Status Pernikahan</option>
                           <option value="Lajang" <?php if($status_pernikahan=="Lajang"){ echo "selected";} ?>>Lajang</option>
                            <option value="Menikah" <?php if($status_pernikahan=="Menikah"){ echo "selected";} ?>>Menikah</option>
                            <option value="Duda" <?php if($status_pernikahan=="Duda"){ echo "selected";} ?>>Duda</option>
                            <option value="Janda" <?php if($status_pernikahan=="Janda"){ echo "selected";} ?>>Janda</option>
                        </select>  
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="firstname">Agama</label>
                        <select class="form-control chosen" name="agama" id="agama">
                           <option value="">Pilih Agama</option>
                           <option value="Islam" <?php if($agama=="Islam"){ echo "selected";} ?>>Islam</option>
                            <option value="Katolik" <?php if($agama=="Katolik"){ echo "selected";} ?>>Katolik</option>
                            <option value="Protestan" <?php if($agama=="Protestan"){ echo "selected";} ?>>Protestan</option>
                            <option value="Hindu" <?php if($agama=="Hindu"){ echo "selected";} ?>>Hindu</option>
                            <option value="Budha" <?php if($agama=="Budha"){ echo "selected";} ?>>Budha</option>
                             <option value="Lainnya" <?php if($agama=="Lainnya"){ echo "selected";} ?>>Lainnya</option>
                        </select>  
                      </div>
                      
                       <div class="form-group col-xs-6">
                        <label for="firstname">Status Kewarganegaraan</label>
                        <input type="text" name="status_kewarganegaraan" class="form-control" placeholder="Status Kewarganegaraan">
                      </div>

                       <div class="form-group col-xs-6">
                        <label for="firstname">Jenis Kelamin</label>
                        <select class="form-control chosen" name="jenis_kelamin" id="jenis_kelamin">
                           <option value="">Pilih Jenis Kelamin</option>
                           <option value="1" <?php if($jenis_kelamin==1){ ?>  selected  <?php } ?>>Laki-laki</option>
                           <option value="2" <?php if($jenis_kelamin==2){ ?>  selected  <?php } ?>>Perempuan</option>
                        </select>  
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="firstname">Perusahaan</label>
                        <input type="text" placeholder="Perusahaan" class="form-control" name="perusahaan" <?php if($company){?>
                            value="<?php echo $company; ?>"
                        <?php }else{ ?>  value="PT Aarti Jaya" <?php } ?>>  
                      </div>
                       <div class="form-group col-xs-6">
                        <label for="firstname">Telepon</label>
                        <input type="number" placeholder="Perusahaan" class="form-control" name="telepon" <?php if($phone){?>
                            value="<?php echo $phone; ?>"
                        <?php }else{ ?>  value="0" <?php } ?>>  
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="firstname">Manager/Supervisor (Jika ada)</label>
                           <select class="form-control chosen" name="atasan_langsung" id="atasan_langsung">
                           <option value="">Pilih Manager Supervisor</option>
                           <?php foreach($atasan_langsung as $col): ?>
                                <option value="<?php echo $col->id; ?>"
                                  <?php if($id_line_manajer==$col->id){
                                      echo "selected";

                                  } ?>
                                  ><?php echo $col->first_name; ?> <?php echo $col->last_name; ?></option>
                           <?php endforeach; ?>
                        </select>  
                      </div>
                         <div class="form-group col-xs-6">
                        <label for="firstname">Status Pegawai</label>
                        <select class="form-control chosen" name="status_pegawai" id="status_pegawai">
                           <option value="">Pilih Status Pegawai </option>
                           <option value="Kontrak" <?php if($status_pegawai=='Kontrak'){ ?>  selected  <?php } ?>>Kontrak</option>
                           <option value="Tetap"   <?php if($status_pegawai=='Tetap'){ ?>  selected  <?php } ?>>Tetap</option>
                        </select>  
                      </div>

                       <div class="form-group col-xs-6">
                        <label for="firstname">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" <?php if($tanggal_masuk){ ?>
                              value="<?php echo $tanggal_masuk; ?>"
                        <?php } ?>>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="firstname">FTE <i>(Full Time Equivalent)</i></label>
                        <input type="number" name="fte" id="fte" class="form-control" <?php if($fte){ ?>
                              value="<?php echo $fte; ?>"
                        <?php } ?> placeholder="Full Time Equivalent">
                      </div>
<input type="hidden" name="id" value="<?php echo $id; ?>">
                     
                         
                       <hr width="100%">
                        <div class="form-group col-xs-12"d>
                            <button type="submit" class="btn btn-danger"> Simpan </button>
                      </div>
                 
                    </div>
                  </form>
             
                </div>
               
              </div>
            </div>

            
          </div>    
    		</div>
    	</div>
    </div>



  </div>
</tr>
</tfoot>
</tbody>
</table>
<!--

</div>
</div>
</div>
-->

<script type="text/javascript">
    $('.chosen').chosen();


  function validasi_tambah()
    {

        var id_pegawai=document.forms["myform_tambah"]["id_pegawai"].value;

        if (id_pegawai==null || id_pegawai=="")
          {
           swal({
                title: "Peringatan!",
                text: "ID Pegawai tidak boleh kosong!"
            });
          return false;
          };


          var id_divisi=document.forms["myform_tambah"]["id_divisi"].value;

        if (id_divisi==null || id_divisi=="")
          {
           swal({
                title: "Peringatan!",
                text: "Divisi tidak boleh kosong!"
            });
          return false;
          };

           var id_jabata=document.forms["myform_tambah"]["id_jabatan"].value;

        if (id_jabatan==null || id_jabatan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Posisi tidak boleh kosong!"
            });
          return false;
          };


     }

</script>
  
  

