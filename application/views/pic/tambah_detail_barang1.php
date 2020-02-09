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
two = document.autoSumForm.ppn.value; 
tre=(two/100)*one;
document.autoSumForm.jumlahtotal.value = (one * 1) + (tre * 1);}
function stopCalc(){
clearInterval(interval);}
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
                            <td><strong>Tanggal Dibutuhkan</strong></td>
                            <td><?php echo date_indo($som->tanggal_required); ?></td>
                        </tr>
                         <tr>
                            <td><strong>Keterangan</strong></td>
                            <td><?php echo $som->keterangan; ?></td>
                        </tr>
                      </tbody>
                </table>
              <?php endforeach; ?>

              <hr>

          <?php if($draft==1){?>     
              <table class="table table-striped table-hover">
                         <thead>
                        <tr>
                            <th scope="col"> Pembuat </th>
                            <th scope="col"> Nama Barang </th>
                            <th scope="col"> Qty </th>
                            <th scope="col"> Satuan </th>
                            <th scope="col"> Harga  </th>
                            <th scope="col"> Vendor</th>
                            <th scope="col"> Metode </th>
                        </tr>
                    </thead>
                    <tbody>
                      <form id="myform" onsubmit="return validasi()" method="post" action="<?php echo base_url(); ?>user_pengajuan/add_barang_baru">
                      <tr>

                        <td>
                          <select class="form-control" name="id_detail" onchange="return autofill();" id="id_barang">
                                  <option value="">Pembuat</option>
                                  <?php foreach($get_barang_detail as $bar):?>
                                      <option value="<?php echo $bar->id_detail; ?>"> <?php echo $bar->first_name; ?> <?php echo $bar->last_name; ?></b></option>
                                   <?php
                                      $first=$bar->first_name;
                                      $last =$bar->last_name;
                                      $id_divisi=$bar->id_divisi;
                                   ?>
                                  <?php endforeach; ?>
                               </select>
                        </td>
                        <td> <select class="form-control" name="barang" id="barang">
                                  <option value=""> Pilih Barang </option>
                                  <?php foreach($barang as $row):?>
                                      <option value="<?php echo $row->id_barang; ?>"><?php echo $row->nama_barang; ?></option>
                                  <?php endforeach; ?></td>
                        <td>
                           <input type="hidden" name="id_divisi" class="form-control" placeholder="divisi" id="id_divisi"  value="<?php echo $id_divisi; ?>"> 
                           <input type="text" name="qty" class="form-control" placeholder="Qty" id="qty"  value="">  
                        </td>
                         <input type="hidden" name="id_pengajuan" class="form-control" placeholder="Qty" id="id_pengajuan"  value="<?php echo $id_pengajuan; ?>">  
                        <td>
                             <input type="text" name="satuan" class="form-control" placeholder="Satuan" id="satuan" readonly="">
                        </td>
                        <td>
                          
                        <input type="text" name="harga" class="form-control" placeholder="Harga" id="harga">
                             </td>
                           <td>
                             <select class="form-control" name="id_vendor" id="id_vendor">
                                 <option value="">Vendor</option>

                                 <?php foreach($vendor as $ven): ?>
                                        <option value="<?php echo $ven->id_vendor; ?>">
                                            <?php echo $ven->nama_vendor; ?>
                                        </option>
                                 <?php endforeach; ?>
                             </select>
                           </td>
                            <?php
                                 $pembuat=$first.' '.$last;
                            ?>
                            
                            <td>
                               <select class="form-control" name="metode_pembayaran" id="metode_pembayaran">
                                   <option value="">Pilih</option>
                                   <option value="1">Tunai</option>
                                   <option value="2">Transfer</option>
                               </select>
                            </td>
                      </tr>

                      <tr>
                        <td colspan="2"><button type="submit" class="btn btn-sm btn-success">Tambah</button></td>
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
                            
                            <th scope="col"> Nama Barang </th>
                            <th scope="col"> Qty </th>
                            <th scope="col"> Satuan </th>
                            <th scope="col"> Harga  </th>
                            <th scope="col"> Vendor</th>
                            <th scope="col"> User Tujuan</th>
                            <th scope="col"> Metode </th>
                            <th scope="col"> Subtotal </th>
                            <?php if($draft==1){?>
                            <th scope="col"> Aksi </th>
                          <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($detail_pr as $col):?>
                      <tr>
                        <td><?php echo $col->nama_barang; ?></td>
                        <td><?php echo $col->qty; ?></td>
                        <td><?php echo $col->satuan; ?></td>
                        <td><?php echo number_format($col->harga); ?></td>
                        <td><?php echo $col->nama_vendor; ?></td>
                        <td><?php echo $col->first_name; ?> <?php echo $col->last_name; ?></td>
                        <td>
                          <?php if($col->metode_pembayaran==1){
                            echo "Tunai";
                          }else{
                            echo "Transfer";
                          }
                          ?>
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
                    
                      
                      <td colspan="7" align="center"><strong>Total</strong></td>
                      <td><?php echo number_format($subtotal); ?></td>
                      <td></td>
                    </tr>
                    <input type="hidden" name="totall" value="<?php echo $subtotal; ?>" onFocus="startCalc();" onBlur="stopCalc();">
                    <?php if($draft==1){?>
                    <tr>
                       <td colspan="7" align="center">
                                <b>PPN</b>
                            </td>
                            <td align="left" colspan="2">
                              <input type="text" name="ppn" onFocus="startCalc();" onBlur="stopCalc();" style="width:70px;border: none;height: 30px;"> %

                            </td>
                            <input type="hidden" name="id_jenis_request" value="<?php echo $id_jenis_request; ?>">

                            <input type="hidden" name="id_pengajuan" value="<?php echo $id_pengajuan; ?>">
                    </tr>
                    
                    <tr>
                            <td colspan="7" align="center">
                                <b>Total Keseluruhan</b>
                            </td>
                            <td>



                              <input type="text" name="jumlahtotal" class="form-control" placeholder="Total Keseluruhan" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
                            </td>
                       

                        </tr>
                      <?php }elseif($draft==0){ ?>


                        <?php if($ppn !=0){?>
                           <tr>
                             <td colspan="7" align="center">
                                <b>PPN</b>
                             </td>
                             <td align="left" colspan="2">
                                <?php echo $ppn; ?> %
                            </td> 
                           </tr>
                           <tr>
                            <td colspan="7" align="center">
                                <b>Total Keseluruhan</b>
                            </td>
                            <td>
                              <?php echo number_format($grand_total); ?>
                            </td>
    
                        </tr>
                        <?php } ?>

                      <?php } ?>
                      

                     </tbody>
                   
                  </table>

                      <hr width="100%">
                      <div class="form-group col-xs-12" align="center">
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
    function autofill(){
        var id_barang =document.getElementById('id_barang').value;
        

        $.ajax({
                       url:"<?php echo base_url();?>User_pengajuan/autocomplete_pr",
                       data:'&id_barang='+id_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);  
          
      $.each(hasil, function(key,val){ 
                           document.getElementById('id_barang').value=val.id_detail;
                           document.getElementById('barang').value=val.id_bar;
                           document.getElementById('qty').value=val.qty_jumlah;
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

          var id_vendor=document.forms["myform"]["id_vendor"].value;
        if (id_vendor==null || id_vendor=="")
          {
           swal({
                title: "Peringatan!",
                text: "Vendor tidak boleh kosong!"
            });
          return false;
          };

          var metode_pembayaran=document.forms["myform"]["metode_pembayaran"].value;
        if (metode_pembayaran==null || metode_pembayaran=="")
          {
           swal({
                title: "Peringatan!",
                text: "Metode pembayaran tidak boleh kosong!"
            });
          return false;
          };
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

</script>


 