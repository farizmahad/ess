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

$id_line_manajer = $this->ion_auth->user()->row()->id_line_manajer;


?>
</script>
       <div class="col-md-9">
          <h4 class="grey"><i class="icon ion-plus"></i> Tambah <i>Purchase Request</i> Produk Non Dagang</h4>
            <div class="line"></div>
             <div class="post-content">
              <div class="post-container">
                <?php $today=date('Y-m-d');
                $today1=date('d-m-Y');
                            ?>
               <form id="myform" onsubmit="return validasi()" method="POST" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>User_pengajuan/aksi_buat_pr">
                    <div class = "col-md-12">
                        <div class="form-group col-xs-6">
                        <label for="firstname"> No. Permintaan</label>
                       <input type="text" placeholder="Enter email" class="form-control" name="no_pengajuan" value="<?php echo $kodeunik; ?>" readonly id="no_pengajuan">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname" class="">Tanggal Permintaan</label>
                        <input type="hidden" placeholder="Enter email" class="form-control" name="tanggal_pengajuan" value="<?php echo $today; ?>" readonly>
                                <input type="text" placeholder="Enter email" class="form-control" name="tanggal_pengajuan" value="<?php echo $today1; ?>" readonly>
                      </div>
                        <div class="form-group col-xs-6" id="data_1">
                            <label for="firstname"> Tanggal Pemenuhan terakhir</label>
                           <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control" placeholder="Pilih Tanggal" name="tanggal_required" id="tanggal_dibutuhkan">
                                </div>
                        </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname">Lokasi</label>

        <?php
        $grouptoko = array('toko');
        if ($this->ion_auth->in_group($grouptoko)){ ?>
                <input id="firstname" class="form-control input-group-lg" type="hidden" name="id_jenis_request" value="10">
        <?php }else{ ?>
                <input id="firstname" class="form-control input-group-lg" type="hidden" name="id_jenis_request" value="1">
        <?php } ?>

                           <select class="form-control chosen" name="id_gedung" id="id_gedung">
                            <option value="">Pilih Lokasi</option>
                            <?php
                              foreach($gedung as $ged): ?>
                                 <option value="<?php echo $ged->id_gedung;?>">
                                    <?php echo $ged->nama_gedung; ?>
                                 </option>
                              <?php  endforeach; ?>
                            </select>
                            
                      </div>
                          <div class="form-group col-xs-6">
                           <label for="firstname"> Lampiran</label>
                              <br>
                              <input id="uploadFile" placeholder="Pilih File..." readonly style="padding:2px;border-radius: 5px;border: 1px solid white;">
                               <div class="fileUpload btn btn-info">
                               <span>Upload</span>
                             <input id="uploadBtn" type="file" class="upload" name="foto">
                             </div>
                        </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname">Keterangan</label>
                        <textarea class="form-control" placeholder="Keterangan" name="keterangan"></textarea>
                      </div>
                       <hr width="100%">
                        <div class="form-group col-xs-12" align="right">
                            <button type="submit" class="btn btn-danger"> Selanjutnya </button>
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


 <script type="text/javascript">
    function autofill(){
        var id_barang =document.getElementById('id_barang').value;
        $.ajax({
                       url:"<?php echo base_url();?>User_pengajuan/autocomplete_pr",
                       data:'&id_barang='+id_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);    
      $.each(hasil, function(key,val){ 
        

                           document.getElementById('id_barang').value=val.id_detail;
                           document.getElementById('barang').value=val.id_barang;
                           document.getElementById('qty').value=val.qty;
                           document.getElementById('satuan').value=val.unit;
                          
        });
      }
    });               
  }

      $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
    };
 
    function validasi()
    {

        var tanggal_dibutuhkan=document.forms["myform"]["tanggal_dibutuhkan"].value;


//        validasi tanggal dibutuhkan tidak boleh kosong (required)

        if (tanggal_dibutuhkan==null || tanggal_dibutuhkan=="")
          {
           swal({
                title: "Peringatan!",
                text: " Tanggal dibutuhkan tidak boleh kosong!"
            });
          return false;
          };

//        validasi gedung harus mempunyai panjang karakter minimal 5

        var id_gedung=document.forms["myform"]["id_gedung"].value;

//        validasi id user tidak boleh kosong (required)
        if (id_gedung==null || id_gedung=="")
          {
           swal({
                title: "Peringatan!",
                text: "Lokasi tidak boleh kosong!"
            });
          return false;
          };
     }

$('.chosen').chosen();
</script>
  
  

