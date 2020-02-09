
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
one = document.autoSumForm.totall.value;
tipe_pajak = document.autoSumForm.tipe_pajak.value; 



var myarr = tipe_pajak.split("^");
var id_tax= myarr[0];
var nama_tax= myarr[1];
var rate_tax= myarr[2];

var res = rate_tax.substring(0,1);
var cari_angka=rate_tax.split(res);

var persen=cari_angka[1];
var number=/^[0-9]+$/;

if(res.match(number)){
    var jumlah_tax=(rate_tax/100) *one;
}else{
    var jumlah_tax=(persen/100) *one;
};

var one_number=Number(one);
var jml_tax=formatNumber(jumlah_tax);

document.autoSumForm.total_pajak.value =jml_tax;
document.autoSumForm.total_pajakk.value =jumlah_tax;
if(res.match(number)){
  
  var jumlah=formatNumber(one_number+jumlah_tax);
  document.autoSumForm.jumlahtotall.value =jumlah;
  document.autoSumForm.jumlahtotal.value =one_number+jumlah_tax;

}else{
  var jumlah_2=formatNumber(one_number-jumlah_tax);
  document.autoSumForm.jumlahtotall.value =jumlah_2;
   document.autoSumForm.jumlahtotal.value =one_number-jumlah_tax;
};
}
function stopCalc(){
clearInterval(interval);}


function formatNumber (num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}


function kosong(value){
one = document.autoSumForm.totall.value;
var one_number=Number(one);
var one_number_rupiah=formatNumber(one_number);
 var st = $("#tax").val();
 if(st ="Select"){
  $("#total_pajak").val("0"); 
  $("#jumlahtotal").val(one_number); 
  $("#jumlahtotall").val(one_number_rupiah);
 }

}
</script>
       <div class="col-md-9">
           <h4 class="grey"><i class="icon ion-plus"></i> Tambah <i>Purchase Request</i> Barang Non Dagang</h4>
            <div class="line"></div>
             <div class="post-content">
              <div class="post-container">  
              <?php foreach($pengajuan as $som):?>
                  <table class="table table-striped table-hover" id="example2">
                      <tbody>
                        <tr>
                            <td><strong>No. <i>Purchase Request</i></strong></td>
                            <td><?php echo $som->no_pengajuan; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Permintaan</strong></td>
                            <td><?php echo date_indo($som->tanggal_pengajuan); ?></td>
                        </tr>
                           <tr>
                            <td><strong>Tanggal Pemenuhan Terakhir</strong></td>
                            <td><?php echo date_indo($som->tanggal_required); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td><?php echo $som->keterangan; ?></td>
                            <?php $tambahan_ppn=$som->ppn; ?>
                        </tr>
                      </tbody>
                </table>
             <?php endforeach; ?>

              <hr>
            <?php if($draft==1){?>     
            <table class="table table-striped table-hover">
                   <thead>
                        <tr>
                           
                            <th scope="col" width="20%"> Produk </th>
                            <th scope="col" width="10%"> Deskripsi </th>
                            <th scope="col" width="10%"> Kuantitas </th>
                            <th scope="col" width="10%"> Satuan </th>
                            <th scope="col" width="10%"> Harga  </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      <form id="myform" onsubmit="return validasi()" method="post" action="<?php echo base_url(); ?>user_pengajuan/add_barang_baru">
                      <tr>
                       
                        <td> <select class="form-control chosen" name="barang" id="barang" onchange="return autofill();">
                                  <option value="">Pilih Produk </option>
                                  <?php foreach($barang as $row):?>
                                      <option value="<?php echo $row->id_barang; ?>"><?php echo $row->nama_barang; ?></option>

                                  <?php endforeach; ?>
                              </select>

                        </td>
                        <!--
<input type="hidden" name="id_master_barang" id="id_master_barang" class="id_master_barang">
-->
                        <td>
                        <input type="text" name="deskripsi_produk" class="form-control" placeholder="Deskripsi Produk" id="deskripsi_produk">
                        </td>      
                        <td>
                           <input type="hidden" name="id_divisi" class="form-control" placeholder="divisi" id="id_divisi"  value="<?php echo $id_divisi; ?>"> 
                           <input type="text" name="qty" class="form-control" placeholder="Kuantitas" id="qty"  value="">  
                        </td>
                         <input type="hidden" name="id_pengajuan" class="form-control" placeholder="Qty" id="id_pengajuan"  value="<?php echo $id_pengajuan; ?>">  
                        <td>
                          <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan Barang" readonly="">
                        </td>
                        <td>
                        <input type="text" name="harga" class="form-control" placeholder="Harga" id="harga">
                        </td>
                        <!--
                           <td>
                            
                             <select class="form-control chosen" name="id_vendor" id="id_vendor">
                                 <option value="">Supplier</option>

                                 <?php foreach($vendor as $ven): ?>
                                        <option value="<?php echo $ven->id_vendor; ?>">
                                            <?php echo $ven->nama_vendor; ?>
                                        </option>
                                 <?php endforeach; ?>
                             </select>
                             <!--
                             <input type="checkbox" name="member"  id="member" onclick="EnableDisableTextBox(this)" class="3step"> Tambah Supplier
                           -->
                           
                           <!--
                           <select class="form-control chosen" onchange="return autofill();" id="id_supplier" name="id_supplier">
                   <?php foreach($supplier->vendors as $an):?>
                    <option value="<?php echo $an->id; ?>^<?php echo $an->display_name; ?>">
                       <?php echo $an->display_name; ?>
                    </option>
                   <?php endforeach; ?>
                  </select>
                -->
                <!--
                           </td>
                            <?php
                                 $pembuat=$first.' '.$last;
                            ?>
                            <td>
                               <select class="form-control" name="metode_pembayaran" id="metode_pembayaran">
                                   <option value="">Pilih</option>
                                   <option value="1">Tunai</option>
                                   <option value="2">Transfer</option>
                                   <option value="3">Kontrabon</option>
                               </select>
                            </td>
                          -->
                      </tr>

                      <!--
                      <tr name="div_nama_vendor" div_nama_vendor="true">
                            <th scope="col" width="15%" colspan="2"> Supplier </th>
                            <th scope="col" width="20%"> No Rekening </th>
                            <th scope="col" width="10%" colspan="2"> Bank </th>
                            <th scope="col" width="10%" colspan="2"> Alamat </th>
                            
                      </tr name="thead_supplier" thead_supplier="true">
                      <tr name="tbody_supplier" tbody_supplier="true">
                         <td colspan="2"> <input type="text" id="nama_vendor" name="nama_vendor"  placeholder="Nama Supplier" class="form-control"></td>
                         <td><input type="text"  name="no_rekening_vendor" value="" placeholder="No Rekening" class="form-control"></td>
                         <td colspan="2">
                           <select class="form-control" name="id_bank">
                          <option>Pilih Bank</option>

                          <?php foreach($bank as $ba):?>
                                 <option value="<?php echo $ba->id_bank; ?>">
                                   <?php echo $ba->nama_bank; ?>
                                 </option>

                          <?php endforeach; ?>
                        </select>
                         </td>
                         <td colspan="5"><textarea class="form-control" name="alamat_vendor" placeholder="Alamat Supplier"></textarea></td>
                      </tr name="div_tutup_nama_vendor" div_tutup_nama_vendor="true">
                    -->
                      <tr>
                        <td colspan="2"><button type="submit" class="btn btn-sm btn-danger">Tambah</button></td>
                      </tr>

                     </tbody>
                  </table>
                </form>
      <br>
      <?php } ?>

        <form name="autoSumForm" method="POST" action="<?php echo base_url(); ?>user_pengajuan/kirim_purchase_request">     
                  <?php if(count($detail_pr) >0){?>
                     <table class="table table-striped table-hover">
                         <thead>
                           <tr>
                            <th scope="col"> Produk </th>
                            <th scope="col"> Deskripsi </th>
                            <th scope="col"> Kuantitas</th>
                            <th scope="col"> Satuan </th>
                            <th scope="col"> Harga  </th>
                            
                            <th scope="col"> Subtotal </th>
                            <?php if($draft==1){?>
                            <th scope="col" style="text-align: center;"> Aksi </th>
                          <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($detail_pr as $col):?>
                      <tr>
                        <td><?php echo $col->nama_barang; ?></td>
                        <td><?php echo $col->deskripsi_produk; ?></td>
                        <td><?php echo $col->qty_mst; ?></td>
                        <td><?php echo $col->satuan; ?></td>
                        <td><?php echo number_format($col->harga); ?></td>
                      
                        </td>
                        <td>
                          <?php echo number_format($col->tharga); ?>
                        </td>
                        <?php if($draft==1){?>
                        <td>
                           <a href="<?php echo base_url(); ?>user_pengajuan/hapus_barang_pr?id_detail=<?php echo $col->id_detail; ?>&id_pengajuan=<?php echo $col->id_pengajuan; ?>" class="btn btn-sm btn-info btn-sm confirm_delete">Hapus</a>
                        </td>
                      <?php } ?>
                      </tr>
                      <?php
                         $subtotal +=$col->tharga;
                      ?>
                    
                      <tr><?php endforeach; ?>
                      <td colspan="5" align="center"><strong>Total</strong></td>
                      <td><?php echo number_format($subtotal); ?>
                        <input type="hidden" name="total_awal" value="<?php echo $subtotal; ?>">
                      </td>
                      <td></td>
                    </tr>
                    <input type="hidden" name="totall" value="<?php echo $subtotal; ?>" onFocus="startCalc();" onBlur="stopCalc();">

                      <input type="hidden" name="id_jenis_request" value="<?php echo $id_jenis_request; ?>">
                      <input type="hidden" name="id_pengajuan" value="<?php echo $id_pengajuan; ?>">



                    <?php if($draft==1){?>
                      <!--
                    <tr>
                       <td colspan="5" align="center">
                          &nbsp;&nbsp;
                          <strong>Pajak</strong>
                            </td>
                            <td align="left" colspan="2">
                              <!--
                              <input type="text" name="ppn" onFocus="startCalc();" onBlur="stopCalc();" style="width:70px;border: none;height: 30px;" <?php if($tambahan_ppn){ ?>
                                value="<?php echo $tambahan_ppn; ?>"
                             <?php } ?>> %
                              -->

                              <!--

                             <select id="tax" name="tipe_pajak" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" onchange="kosong(this)">
                                    <option value="Select">Pilih Pajak</option>
                                    <?php foreach($tax->company_taxes as $com):?>

                                     <option value="<?php echo $com->id; ?>^<?php echo $com->name; ?>^<?php echo $com->rate; ?>"><?php echo $com->name; ?></option>
                                     <?php endforeach; ?>
                                  </select>
                            </td>
                          
                    </tr>

                    <tr>
                       <td colspan="5" align="center">
                          &nbsp;&nbsp;
                          <strong>Total Pajak</strong>
                            </td>
                            <td align="left" colspan="2">
                              <!--
                              <input type="text" name="ppn" onFocus="startCalc();" onBlur="stopCalc();" style="width:70px;border: none;height: 30px;" <?php if($tambahan_ppn){ ?>
                                value="<?php echo $tambahan_ppn; ?>"
                             <?php } ?>> %
                              -->


<!--
                            <input type="text" name="total_pajak" onchange='tryNumberFormat(this.form.thirdBox);' readonly class="form-control" id="total_pajak" placeholder="Total Pajak">

                             <input type="hidden" name="total_pajakk" onchange='tryNumberFormat(this.form.thirdBox);' readonly class="form-control" >
                          
                    </tr>
                    <tr>
                            <td colspan="5" align="center">
                                <b>Total Keseluruhan</b>
                            </td>
                            <td>
                              <input type="text" name="jumlahtotall" class="form-control" placeholder="Total Keseluruhan" onchange='tryNumberFormat(this.form.thirdBox);' readonly id="jumlahtotall">

                              <input type="hidden" name="jumlahtotal" class="form-control" placeholder="Total Keseluruhan" onchange='tryNumberFormat(this.form.thirdBox);' readonly id="jumlahtotal">
                            </td>
                        </tr>
                      <?php }elseif($draft==0){ ?>
                        <?php if($ppn !=0){?>
                           <tr>
                             <td colspan="5" align="center">
                                <b>PPN</b>
                             </td>
                             <td align="left" colspan="2">
                                <?php echo $ppn; ?> %
                            </td> 
                           </tr>
                           <tr>
                            <td colspan="5" align="center">
                                <b>Total Keseluruhan</b>
                            </td>
                            <td>
                              <?php echo number_format($grand_total); ?>
                            </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                    -->
                     </tbody>
                  </table>


                      <hr width="100%">
                      <div class="form-group col-xs-12" align="right">
                             <?php if($draft==1){?>
                             <button type="submit" class="btn btn-danger">Kirim</button>
                             <?php }elseif($draft==0){ ?>
                              <button type="button" class="btn btn-success">Sudah dikirim</button>
                             <?php } ?>

                            
                      </div>     
                          </form>     
             <?php } ?>
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

    </script>


     <script type="text/javascript">
      /*
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
                           document.getElementById('qty').value=val.qty_jumlah;
                           document.getElementById('satuan').value=val.unit;
                           document.getElementById('harga').value=val.harga_jual;
                           document.getElementById('deskripsi_produk').value=val.deskripsi_produk;
                           
                               
          
        });
      }
                   });
                  
    }
*/
 function autofill(){
        var id_barang =document.getElementById('barang').value;

/*
        var res = barang.split("^");
        var id_barang = res[0];
        var nama_barang = res[1];
        */

        $.ajax({
                       url:"<?php echo base_url();?>User_pengajuan/autocomplete_pr",
                       data:'&id_barang='+id_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);  
          
      $.each(hasil, function(key,val){ 
        
                          
                           document.getElementById('barang').value=val.id_barang;
                           /*
                           document.getElementById('id_master_barang').value=val.id_barang;
                           */
                           /*
                           document.getElementById('qty').value=val.qty;
                           */
                           document.getElementById('satuan').value=val.unit;
                           document.getElementById('harga').value=val.harga_jual;
                           
                           
                               
          
        });
      }
                   });
                  
    }



       function validasi()
    {

        var id_barang=document.forms["myform"]["id_barang"].value;
        if (id_barang==null || id_barang=="")
          {
           swal({
                title: "Peringatan!",
                text: "Pilih dulu user pembuat!"
            });
          return false;
          };

        var barang=document.forms["myform"]["barang"].value;
        if (barang==null || barang=="")
          {
           swal({
                title: "Peringatan!",
                text: "Barang tidak boleh kosong!"
            });
          return false;
          };


        var qty=document.forms["myform"]["qty"].value;
        if (qty==null || qty=="")
          {
           swal({
                title: "Peringatan!",
                text: "Jumlah barang tidak boleh kosong!"
            });
          return false;
          }; 

        var satuan=document.forms["myform"]["satuan"].value;
        if (satuan==null || satuan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Satuan barang tidak boleh kosong!"
            });
          return false;
          };  

        var harga=document.forms["myform"]["harga"].value;
        if (harga==null || harga=="")
          {
           swal({
                title: "Peringatan!",
                text: "Harga barang tidak boleh kosong!"
            });
          return false;
          };
          /*

          var id_vendor=document.forms["myform"]["id_vendor"].value;
        if (id_vendor==null || id_vendor=="")
          {
           swal({
                title: "Peringatan!",
                text: "Supplier tidak boleh kosong!"
            });
          return false;
          };
          */
/*
          var metode_pembayaran=document.forms["myform"]["metode_pembayaran"].value;
        if (metode_pembayaran==null || metode_pembayaran=="")
          {
           swal({
                title: "Peringatan!",
                text: "Metode pembayaran tidak boleh kosong!"
            });
          return false;
          };
          */
     }


$(document).ready(function(){
  $('.confirm_delete').on('click', function(){
    
    var delete_url = $(this).attr('href');

    swal({
      title: "Hapus ?",
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


 function confirm_selesai()
    {

    
    var delete_url = $(this).attr('href');

    swal({
      title: "Yakin selesai ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya !",
      cancelButtonText: "Batalkan",
      closeOnConfirm: false     
    }, function(){
     
      window.location.href = delete_url;
    });

    return false;
  
};


$('.chosen').chosen();


$(function () {
    $('.3step').change(function () {
        $("tr[div_nama_vendor='true']").toggle(this.checked);
        $("tr[div_tutup_nama_vendor='true']").toggle(this.checked);
        $("tr[thead_supplier='true']").toggle(this.checked);
        $("tr[tbody_supplier='true']").toggle(this.checked);
    }).change();
});


$("#member").change(function() {
    $("#id_vendor").prop("readonly", $(this).is(":checked"));      
    $('#id_vendor').prop('disabled',false).trigger("chosen:updated",!$(this).is(":checked"));
    });
     $("#member").change(function() {
     var is_checked = $(this).is(":checked");
     if(is_checked) {
     $('#id_vendor').val("").trigger("chosen:updated",$(this).is(":checked"));
     $('#id_vendor').prop('disabled', true).trigger("chosen:updated",$(this).is(":checked"));
         
     }
    
});


</script>


 