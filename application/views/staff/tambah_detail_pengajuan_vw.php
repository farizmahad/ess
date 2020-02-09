<div class="col-md-9">
               <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> Ubah Detail Permintaan</h4>
        <div class="line"></div>
            <div class="post-content">
                <div class="post-container">
                     <div class="row">
                      &nbsp;&nbsp;&nbsp;&nbsp;<?php echo validation_errors(); ?>
                    <form action="<?php echo base_url() ?>Pengajuan/do_insert_detail_pengajuan" method="POST">
                   
                       <div class="form-group col-xs-2">
                      <label for="firstname"> Nama Barang</label>
                          
                          <input type="text" id="nama_barang" name="nama_barang"  placeholder="Nama Barang" class="form-control">
                </div>
                <div class="form-group col-xs-1">
                      <label for="lastname" class="">Qty</label>
                         <input type="number" id="qty" name="qty" value="" placeholder="Qty" class="form-control" min="1" oninvalid="this.setCustomValidity('Qty minimal masukkan 1')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group col-xs-1">
                     <label for="firstname"> Harga </label>
                         <input type="text" id="harga" name="harga" value="" placeholder="Harga" class="form-control">
                </div>
                


                <div class="form-group col-xs-2">
                        <label for="lastname">Divisi tujuan</label>
                            <select class="form-control" name="id_divisi" id="id_divisi">
                            <option value="">Pilih Divisi</option>
                            <?php
                              foreach($divisi as $div): ?>
                                 <option value="<?php echo $div->id_divisi;?>|<?php echo $div->nama_divisi; ?>">
                                    <?php echo $div->nama_divisi; ?>
                                 </option>
                              <?php  endforeach; ?>
                            </select>
                      </div>


                      <div class="form-group col-xs-2">
                     <label for="firstname">Users Tujuan </label>
                         <input type="text"  name="nama_alokasi" placeholder="Tujuan" class="form-control">
                </div>

                      
                <div class="form-group col-xs-2">
                      <label for="lastname" class="">Vendor</label>
                        <select class="form-control" id="item" name="id_vendor">
                          <option value="">Pilih Vendor</option>
                          <?php foreach($vendor as $ven):?>
                              <option value="<?php echo $ven->id_vendor; ?>"> <?php echo $ven->nama_vendor; ?>
                              </option>
                          <?php endforeach; ?>
                        </select>

                <input type="checkbox" name="member"  id="member" onclick="EnableDisableTextBox(this)" class="3step"> Tambah Vendor Baru &nbsp;&nbsp;&nbsp;
                                                                             
                </div>

              <div name="div_nama_vendor" div_nama_vendor="true">
                <div class="form-group col-xs-3">
                      <label for="firstname"> Nama Vendor</label>
                          
                          <input type="text" id="nama_vendor" name="nama_vendor"  placeholder="Nama Vendor" class="form-control">
                          <input type="hidden" name="id_pengajuan" value="<?php echo $id_pengajuan; ?>">
                </div>
                
                <div class="form-group col-xs-2">
                     <label for="firstname"> No Rekening </label>
                         <input type="text"  name="no_rekening_vendor" value="" placeholder="No Rekening" class="form-control">
                </div>


                <div class="form-group col-xs-2">
                      <label for="lastname" class="">Bank </label>
                        <select class="form-control" name="id_bank">
                          <option>Pilih Bank</option>

                          <?php foreach($bank as $ba):?>
                                 <option value="<?php echo $ba->id_bank; ?>">
                                   <?php echo $ba->nama_bank; ?>
                                 </option>

                          <?php endforeach; ?>
                        </select>
                </div>
                <div class="form-group col-xs-3">
                      <label for="lastname" class="">Alamat</label>
                      <textarea class="form-control" name="alamat_vendor"></textarea>                                           
                </div>
                </div name="div_tutup_nama_vendor" div_tutup_nama_vendor="true">

                <div class="form-group col-xs-2">
                      <label for="lastname" class=""><font style="color:transparent;">####</font></label>
                      <br>
                        <button type="submit" class="btn btn-info"> Tambah </button>
                        <input type="hidden"  name="addproduk" value="1" >
                </div>
                    </form>
                </div>
                  <div class="line"></div>
                  <div class="table-responsive-lg">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;"> No. </th>
                                <th scope="col"> Nama Barang </th>
                                <th scope="col" style="text-align: center;"> Jumlah </th>
                                <th scope="col"> Harga Satuan </th>
                                <th scope="col"> Tujuan </th>
                                <th scope="col"> Vendor </th>
                                <th scope="col"> Subtotal </th>
                                <th scope="col" style="text-align: center;"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no=1;
                          $jumlah_subtotal=0;
                          foreach($detail_pengajuan as $pe):
                          $jumlah_subtotal +=$pe->tharga;
                           ?>
                            <tr>
                              <td style="text-align: center;"><?php echo $no++; ?></td>
                              <td><?php echo $pe->nama_barang; ?></td>
                              <td style="text-align: center;"><?php echo $pe->qty; ?></td>
                              <td>Rp. <?php echo number_format($pe->harga); ?></td>
                              <td><?php echo $pe->nama_divisi; ?> | <?php echo $pe->nama_users; ?></td>
                              <td><?php echo $pe->nama_vendor; ?></td>
                              <td>Rp. <?php echo number_format($pe->tharga); ?></td>
                              <td> 
                                    <center>
                                      <a href="<?php echo base_url(); ?>Pengajuan/hapus_detail_permintaan/<?php echo $pe->id_detail; ?>/<?php echo $pe->id_pengajuan; ?>" type="button" class="btn btn-sm btn-danger">Hapus</a>
                                    </center>
                                </td> 
                            </tr>
                          <?php endforeach; ?>
                            <tr>
                                <td colspan="4" align="center"> <b> Total </b></td>
                                <td> <b>Rp.<?php echo number_format($jumlah_subtotal); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group col-xs-10">
                  
                            <a href="<?php echo site_url('Pengajuan/edit_pengajuan/'.$id_pengajuan);?>"><button type="button" class="btn btn-success">Kembali</button></a>
                            
                            <!--
                            <a href="<?php echo base_url(); ?>daftar-permintaan">
                            <button type="button" class="btn btn-success">Selesai</button></a>
                             -->

                             <?php 
                                $cek_status_terakhir=$this->Pengajuan_model->cek_status_terakhir($id_pengajuan);

                                foreach($cek_status_terakhir as $cem){
                                  $status_terakhir=$cem->status;
                                }

                                if($status_terakhir ==3){
                             ?>

                            <a href="<?php echo base_url(); ?>Pengajuan/ajukan_kembali?id_pengajuan=<?php echo $id_pengajuan; ?>">
                            <button type="button" class="btn btn-success">Ajukan kembali</button></a>
                          <?php } ?>


                      </div>
                    </div>
              </div>
            </div>
            </div>
          </div>    
    		</div>
    	</div>

<script>
    
    $('#item').chosen();


    $("#member").change(function() {
    $("#item").prop("readonly", $(this).is(":checked"));      
    $('#item').prop('disabled',false).trigger("chosen:updated",!$(this).is(":checked"));
    });
     $("#member").change(function() {
     var is_checked = $(this).is(":checked");
     if(is_checked) {
     $('#item').val("").trigger("chosen:updated",$(this).is(":checked"));
     $('#item').prop('disabled', true).trigger("chosen:updated",$(this).is(":checked"));
         
     }
    
});


$(function () {
    $('.3step').change(function () {
        $("label[label_nama='true']").toggle(this.checked);
        $("label[ubah='true']").toggle(this.checked);
        $("input[nama_non='true']").toggle(this.checked);
        $("div[div_nama_vendor='true']").toggle(this.checked);
        $("div[div_tutup_nama_vendor='true']").toggle(this.checked);
    }).change();
});
</script>
