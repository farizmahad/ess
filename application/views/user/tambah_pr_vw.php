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

<script><!-- 

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.qty.value;
alert(one);
two = document.autoSumForm.ppn.value; 
tre=(two/100)*one;
document.autoSumForm.jumlahtotal.value = (one * 1) + (tre * 1);}
function stopCalc(){
clearInterval(interval);}
</script>
<!--
<div id="page-contents">
      <div class="container">
        <div class="row">
        -->
       <div class="col-md-9">
              <h4 class="grey"><i class="icon ion-plus"></i> Tambah Permintaan Barang Non Dagang</h4>
            <div class="line"></div>
            <div class="post-content">
              <div class="post-container">
                <!--
                <div class="row">
                  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo validation_errors(); ?>
                    <form action="<?php echo base_url() ?>Pengajuan/add" method="POST">
                        <?php $nos=1;
                        foreach ($this->cart->contents() as $items){
                            $nor=$items['id']+1;
                        ?>
                    <?php } ?>
                <div class="form-group col-xs-2">
                      <label for="firstname"> Nama Barang</label>
                          <input type="hidden" id="id_barang" name="id_barang" value="<?php if($nor==""){echo "1";}else{ echo $nor; }?>" placeholder="Nama Request" class="form-control">
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
                         <input type="text"  name="nama_alokasi" value="" placeholder="Tujuan" class="form-control">
                </div>

                      
                <div class="form-group col-xs-2">
                      <label for="lastname" class="">Vendor</label>
                        <select class="form-control" id="item" name="id_vendor">
                          <option value="">Pilih Vendor</option>
                          <?php foreach($vendor as $ven):?>
                              <option value="<?php echo $ven->id_vendor; ?>|<?php echo $ven->nama_vendor; ?>"> <?php echo $ven->nama_vendor; ?>
                              </option>
                          <?php endforeach; ?>
                        </select>

                <input type="checkbox" name="member"  id="member" onclick="EnableDisableTextBox(this)" class="3step"> Tambah Vendor Baru &nbsp;&nbsp;&nbsp;
                                                                             
                </div>

              <div name="div_nama_vendor" div_nama_vendor="true">
                <div class="form-group col-xs-3">
                      <label for="firstname"> Nama Vendor</label>
                          
                          <input type="text" id="nama_vendor" name="nama_vendor"  placeholder="Nama Vendor" class="form-control">
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
          -->

          <form id="myform"  method="post" action="<?php echo base_url(); ?>user_pengajuan/update_detail_barang">
                  <div class="row">
                      <div class="form-group col-md-12">
                        <table class="table table-striped table-hover">
                         <thead>
                        <tr>
                            <th scope="col"> No. </th>
                            <th scope="col"> Produk </th>
                            <th scope="col"> Qty </th>
                            <th scope="col"> Satuan </th>
                            <th scope="col"> Harga  </th>
                            <th scope="col"> Supplier </th>
                            <th scope="col"> Subtotal </th>
                            
                            <th scope="col" style="text-align: center;"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                         $jumlah_barang_detail=count($get_detail_pengajuan);
                         $no=1;
                         foreach($get_detail_pengajuan as $get):?>
                           <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $get->nama_barang; ?></td>
                             <td>
                             <input type="text" name="qty[]" class="form-control" placeholder="Qty" id="qty" required value="<?php echo $get->qty; ?>">  
                             </td>
                             <td>
                                <select class="form-control" name="satuan[]" id="satuan">
                                  <option value="">Pilih satuan</option>
                                  <option value="kg" <?php if($get->satuan=="kg"){ ?>
                                        selected
                                  <?php } ?>>Kg</option>
                                  <option value="pcs" <?php if($get->satuan=="pcs"){ ?>
                                        selected
                                  <?php } ?>>Pcs</option>
                                  <option value="liter" <?php if($get->satuan=="liter"){ ?>
                                        selected
                                  <?php } ?>>Liter</option>
                                </select>
                           </td>
                           <td>
                           <input type="hidden" name="id_pengajuan" value="<?php echo $get->id_pengajuan; ?>">
                           <input type="hidden" name="id_detail[]" value="<?php echo $get->id_detail; ?>">
                             <input type="text" name="harga[]" class="form-control" placeholder="Harga" id="harga" required value="<?php echo $get->harga; ?>">
                             </td>
                             
                            <td>
                              <select class="form-control" name="id_vendor[]" id="id_vendor" required>
                              <option value="">Pilih Supplier</option>
                               <?php foreach($vendor as $ven):?>
                                      <option <?php if($get->id_vendor == $ven->id_vendor) { echo "selected"; } ?>

                                      value="<?php echo $ven->id_vendor; ?>"><?php echo $ven->nama_vendor; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </td>
                            <td>
                              <?php
                                  $total_keseluruhan +=$get->tharga;
                              ?>
                               <input type="text" name="subtotal" class="form-control" placeholder="Subtotal" readonly value="<?php echo number_format($get->tharga); ?>">
                            </td>
                            <td align="center">
                              <a href="<?php echo base_url();?>User_pengajuan/hapus_detail_barang?id_detail=<?php echo $get->id_detail ?>&id_pengajuan=<?php echo $get->id_pengajuan; ?>"  style="text-decoration: none;" class="confirm_delete">
                                <B><i class="fa fa-trash"></i></B>
                              </a>
                            </td>
                           </tr>
                      <?php endforeach;?> 
                      <tr>
                        <td colspan="6" align="right">
                            <strong>Total</strong>
                        </td>
                        <td>
                             <strong>
                              Rp. 
                               <?php echo number_format($total_keseluruhan); ?>
                             </strong>
                        </td>
                        <td></td>
                      </tr>  
                      <tr>
                        <td colspan="2"><button type="submit" class="btn btn-sm btn-success">Update Data Barang</td>
                      </tr>
                      </form>
                      </tbody>  
                  </table>

                          
                        
                            
                        
                      </div>
                      
                            <?php $today=date('Y-m-d');
                            $today1=date('d-m-Y');
                            ?>
<form method="POST" action="<?php echo base_url(); ?>user_pengajuan/save_submission" enctype="multipart/form-data">
<?php foreach($get_pengajuan as $go):?>
                    <div class = "col-md-12">
                        <div class="form-group col-xs-6">
                        <label for="firstname"> No. Permintaan</label>
                       <input type="text" placeholder="Enter email" class="form-control" name="no_pengajuan" value="<?php echo $kodeunik; ?>" readonly>

                        <input type="hidden" placeholder="Enter email" class="form-control" name="id_pengajuan" value="<?php echo $go->id_pengajuan; ?>">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname" class="">Tanggal Permintaan</label>
                        <input type="hidden" placeholder="Enter email" class="form-control" name="tanggal_pengajuan" value="<?php echo $today; ?>" readonly>
                                <input type="text" placeholder="Enter email" class="form-control" name="tanggal_pengajuan1" value="<?php echo $today1; ?>" readonly>
                      </div>
                        <div class="form-group col-xs-6" id="data_1">
                            <label for="firstname"> Tanggal Dibutuhkan</label>
                           <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control" placeholder="Pilih Tanggal" name="tanggal_required">
                                </div>
                        </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname">Jenis Permintaan</label>
                           <input id="firstname" class="form-control input-group-lg" type="hidden" name="id_jenis_request" value="1">
                            <input id="firstname" class="form-control input-group-lg" type="text" name="jenis_permintaan2" value="Barang" readonly="">
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
                        <label for="lastname">Lokasi</label>
                            <select class="form-control" name="id_gedung" id="id_gedung">
                            <option value="">Pilih Gedung</option>
                            <?php
                              foreach($gedung as $ged): ?>
                                 <option value="<?php echo $ged->id_gedung;?>">
                                    <?php echo $ged->nama_gedung; ?>
                                 </option>
                              <?php  endforeach; ?>
                            </select>
                      </div>

                        
                        <!--
                      <div class="form-group col-xs-6">
                        <label for="lastname">Tujuan</label>
                            <input id="firstname" class="form-control input-group-lg" type="text" name="tujuan" placeholder="Tujuan">
                      </div>
                    -->

                      <hr width="100%">
                     

                        <div class="form-group col-xs-6">
                            <label for="textarea">Metode Pembayaran </label>
                          <select class="form-control" name="metode_pembayaran">
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="1">Tunai</option>
                            <option value="2">Transfer</option>
                          </select>
                        </div>

                        <div class="form-group col-xs-6" id="data_1">
                            <label for="firstname"> Tanggal Jatuh Tempo Pembayaran</label>
                           <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control" placeholder="Pilih Tanggal" name="tanggal_jatuh_tempo">
                                </div>
                        </div>
                        <hr width="100%">
                          <div class="form-group col-xs-12">
                            <label for="textarea"> Keterangan </label>
                          <textarea class="form-control" placeholder="Keterangan" name="keterangan"></textarea>
                        </div>

                      



                         <?php if($jumlah_barang_detail>0){?>
                        <div class="form-group col-xs-6">
                            <button type="submit" class="btn btn-info"> Kirim Permintaan </button>
                      </div>
                    <?php } ?>
                    </div>
                  </form>
                <?php endforeach;?>
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
    <script>
      $('#data_1 .input-group.date').datepicker({
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

  /*
    $(document).ready(function(){
        $("#id_gedung").change(function (){
            var url = "<?php echo site_url('Pengajuan/add_ajax_divisi');?>/"+$(this).val();
            $('#id_divisi').load(url);
            return false;
        })      
    });
*/
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
<script>
  $(document).ready(function(){
  $('.confirm_delete').on('click', function(){
    
    var delete_url = $(this).attr('href');

    swal({
      title: "Hapus Barang ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Hapus !",
      cancelButtonText: "Batalkan",
      closeOnConfirm: false     
    }, function(){
     
      window.location.href = delete_url;
    });

    return false;
  });
});
</script>

 <script>
      
      function validasi()
    {

        var harga=document.forms["myform"]["harga"].value;

//        validasi question tidak boleh kosong (required)

        if (harga==null || harga=="")
          {
           swal({
                title: "Peringatan!",
                text: "Harga tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        var id_vendor=document.forms["myform"]["id_vendor"].value;

//        validasi id user tidak boleh kosong (required)
        if (id_vendor==null || id_vendor=="")
          {
           swal({
                title: "Peringatan!",
                text: "Supplier tidak boleh kosong!"
            });
          return false;
          };
     }
    </script>

