 <div class="col-md-9">
        <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> 
   Ubah No. Permintaan <?php echo $no_permintaan; ?></h4>
        <div class="line"></div>
            <div class="post-content">
              <div class="post-container">
               <?php foreach ($pengajuan as $items):?>
                <form method="GET" action="<?php echo base_url(); ?>Pengajuan/detail_permintaan">
                <div class="row">
                  <input type="hidden" name="id_pengajuan" value="<?php echo $items->id_pengajuan; ?>">
                    <div class="form-group col-xs-12"><label>No Permintaan</label> <input type="text" placeholder="Enter email" class="form-control" name="no_pengajuan" value="<?php echo $items->no_pengajuan; ?>" readonly></div>
            <div class="form-group col-xs-12" id="data_1"><label>Tanggal Permintaan</label> 
            <div class="input-group date">
              <?php $tanggal_permintaan=date("m/d/Y", strtotime($items->tanggal_pengajuan)); ?>
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control" placeholder="Pilih Tanggal" name="tanggal_pengajuan" value="<?php echo $tanggal_permintaan;?>">
                                </div>
              <input type="hidden" placeholder="Enter email" class="form-control" name="id_jenis_request" value="1">
            </div>
            <div class="form-group col-xs-12" id="data_2"><label>Tanggal dibutuhkan</label>
<div class="input-group date">
  <?php
   $tanggal_required=date("m/d/Y", strtotime($items->tanggal_required));
  ?>
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control" placeholder="Pilih Tanggal" name="tanggal_required" value="<?php echo $tanggal_required; ?>">
                                </div>
            </div>
            <div class="form-group col-xs-12"><label>Jenis Permintaan</label>
              <select name="id_jenis_request" class="form-control"disabled>
                <option value="<?php echo $items->id_jenis_requestT; ?>"><?php echo $items->jenis_request; ?></option>
                <?php foreach($jenis_request as $jen):?>
                <option value="<?php echo $jen->id_jenis_request; ?>"><?php echo $jen->jenis_request; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-xs-12"><label>Deskripsi</label>
              <textarea class="form-control" placeholder="Deskripsi" name="keterangan"><?php echo $items->keterangan; ?></textarea>
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