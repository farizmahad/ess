 
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
        <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> 
   Ubah No. Permintaan <?php echo $no_permintaan; ?></h4>
        <div class="line"></div>
            <div class="post-content">
              <div class="post-container">
               <?php foreach ($pengajuan as $items):?>
                <form method="POST" action="<?php echo base_url(); ?>Pengajuan/detail_permintaan" enctype="multipart/form-data">
                <div class="row">
                  <input type="hidden" name="id_pengajuan" value="<?php echo $items->id_pengajuan; ?>">
                    <div class="form-group col-xs-12"><label>No Permintaan</label> <input type="text" placeholder="Enter email" class="form-control" name="no_pengajuan" value="<?php echo $items->no_pengajuan; ?>" readonly></div>
            <div class="form-group col-xs-12" id="data_1"><label>Tanggal Permintaan</label> 
            <div class="input-group date">
              <?php $tanggal_permintaan=date("m/d/Y", strtotime($items->tanggal_pengajuan)); ?>
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control" placeholder="Pilih Tanggal" name="tanggal_pengajuan" value="<?php echo $tanggal_permintaan;?>" readonly>
                                </div>
              <input type="hidden" placeholder="Enter email" class="form-control" name="id_jenis_request" value="1">
            </div>
            <div class="form-group col-xs-12" id="data_2"><label>Tanggal dibutuhkan</label>
<div class="input-group date">
  <?php
   $tanggal_required=date("m/d/Y", strtotime($items->tanggal_required));
  ?>
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control" placeholder="Pilih Tanggal" name="tanggal_required" value="<?php echo $tanggal_required; ?>" required
                                     oninvalid="this.setCustomValidity('Tanggal dibutuhkan tidak boleh kosong')" oninput="setCustomValidity('')"
                                    >
                                </div>
            </div>
            <div class="form-group col-xs-12"><label>Jenis Permintaan</label>
              <select name="id_jenis_request" class="form-control"disabled>
               
                <?php foreach($jenis_request as $jen):?>
                <option <?php if($jen->id_jenis_request==$items->id_jenis_request) { echo "selected" ;} ?> value="<?php echo $jen->id_jenis_request; ?>"><?php echo $jen->jenis_request; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-xs-12"><label>Keterangan</label>
              <textarea class="form-control" placeholder="Deskripsi" name="keterangan"><?php echo $items->keterangan; ?></textarea>
            </div>
             <div class="form-group col-xs-12"><label>Pilih Gedung</label>
              <select name="id_gedung" class="form-control" required oninvalid="this.setCustomValidity('Gedung tidak boleh kosong')" oninput="setCustomValidity('')">
                
                <?php foreach($gedung as $ged):?>
                <option  <?php if($ged->id_gedung==$items->id_gedung){ echo "selected";} ?>

                value="<?php echo $ged->id_gedung; ?>"><?php echo $ged->nama_gedung; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
<?php /*
             <div class="form-group col-xs-12">
                        <label for="email">Lampiran</label>
                        <?php 
                        if($ged->lampiran){ ?>
                        <div class="col-xs-4">
                                  <a href="<?php echo base_url(); ?>Pengajuan/lakukan_download/<?php echo $id_pengajuan; ?>">
                                <strong><font color="#000000">Unduh lampiran di sini</font></strong>
                              </a>
                                    
                        </div>
                        <?php  }  ?>
                       <div class="<?php if($ged->lampiran){ ?> col-xs-8 <?php }else{ ?> col-xs-12   <?php } ?>">

                         <input id="uploadFile" placeholder="Pilih File..." readonly style="padding:2px;border-radius: 5px;border: 1px solid white;">
                               <div class="fileUpload btn btn-info">
                               <span>Upload</span>
                             <input id="uploadBtn" type="file" class="upload" name="foto">
                           </div>
                      </div>
                    </div>
                    */
                    ?>
                      <div class="form-group col-xs-12">
                            <label for="textarea">Metode Pembayaran </label>
                          <select class="form-control" name="metode_pembayaran" required required oninvalid="this.setCustomValidity('Metode Pembayaran tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="1" <?php if($items->metode_pembayaran==1) {echo "selected" ;} ?>>Tunai</option>
                            <option value="2" <?php if($items->metode_pembayaran==2) {echo "selected" ;} ?>>Transfer</option>
                          </select>
                        </div>


                    <div class="form-group col-xs-12" id="data_1">
                            <label for="firstname"> Tanggal Jatuh Tempo Pembayaran</label>
                           <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control" placeholder="Pilih Tanggal" name="tanggal_jatuh_tempo" value="<?php echo $items->tanggal_jatuh_tempo;?>">
                                </div>
                        </div>

                    
                        <div class="form-group col-xs-2">
                            <button type="submit" class="btn btn-success"> Selanjutnya</button>
                      </div>

                </div>
              <?php endforeach; ?>
              </form>

               </div>
             </div>
           </div>
         </div>
       </div>
     </div>

      <script>
      $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });


      $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
    </script>

    <script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
    };
  </script>