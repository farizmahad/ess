
                    <!----------------------------------------------------------------------------->

 <script><!--

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.disc_all.value;
two = document.autoSumForm.subtotal.value; 
tre=(one/100)*two;
document.autoSumForm.total_diskon_all.value =tre;
four=two-tre;
document.autoSumForm.total_aja.value =four;
uang_muka = document.autoSumForm.uang_muka.value;
sisa_tagihan=four-uang_muka;
 document.autoSumForm.sisa_tagihan.value =sisa_tagihan;
}
function stopCalc(){
clearInterval(interval);}
</script>
				 <form  method="POST" action="<?php echo base_url(); ?>user_pengajuan/tambah_barang_po">
                    <div id="page-contents">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="post-content">
										<div class="post-container">
											<div class="row">
												<div class="custom-control custom-switch text-right">
													<label class="custom-control-label" for="switch1"> <strong> Harga Termasuk Pajak </strong></label>
													&nbsp; &nbsp;
													<input type="checkbox" class="custom-control-input" id="switch1" name="harga_pajak">
												</div>
												<div class="table-responsive-lg">      
													<table class="table table-striped table-hover" id="tabelku">
														<thead>
															<tr>
																<th scope="col">User</th>
																<th scope="col"> Produk </th>
																<th scope="col"> Deskripsi </th>
																<th scope="col"> Kuantitas </th>
																<th scope="col"> Satuan </th>
																<th scope="col"> Harga Satuan </th>
																<th scope="col"> Diskon </th>
																<th scope="col"> Pajak </th>
																<th scope="col">  </th>
															</tr>
														</thead>
														<tbody>
															<tr>       
																<th>
																	<select class="form-control chosen" name="id_detail" onchange="return autofill_q();" id="id_detail">
																			<option value="">Pembuat</option>
																		<?php foreach($product_po as $bar):?>

																			<?php  
																			    $id_pengajuan=$bar->id_pengajuan;
                                                                                $cek_history_terakhir=$this->user_pengajuan_model->cek_history_terakhir_pr($id_pengajuan);
                                                                                foreach ($cek_history_terakhir as $sow){
                                                                                	$group=$sow->groupid;
                                                                                }
                                                                                

                                                                              if($group=="16"){
																			 ?>
																			<option value="<?php echo $bar->id_detail; ?>"><?php echo $bar->no_pengajuan; ?> | <?php echo $bar->first_name; ?> <?php echo $bar->last_name; ?></b></option>
																		<?php } ?>
																	<?php
																			$first=$bar->first_name;
																			$last =$bar->last_name;
																			$id_divisi=$bar->id_divisi;
																	?>
																		   <?php endforeach; ?>
																	   </select>
																</th>
																<th scope="row"> 
																	<select class="form-control" name="barang" id="id_product">
																		<option>Pilih Produk</option>
																		<?php
																			foreach($barang as $so) :
																		 ?>

																				<option value="<?php echo $so->id_barang; ?>">
																					<?php echo $so->nama_barang; ?>
																				</option>
																		 <?php endforeach;  ?>
																	</select> 
																</th>
																
																<th> 
																	<textarea placeholder="Deskripsi" class="form-control" id="textarea" rows="1" name="deskripsi"> </textarea>
																</th>
																<th> 
																	<input id="kuantitas" class="form-control input-group-lg" type="text" name="kuantitas" title="Kuantitas">
																</th>
																<th>
																	<input id="satuan" class="form-control input-group-lg" type="text" name="satuan" title="Satuan" readonly="">

																	<input id="id_purchase_order" class="form-control input-group-lg" type="hidden" name="id_purchase_order" title="Satuan" readonly="" value="<?php echo $id_purchase_order; ?>">
																</th>
																<th> 
																	<input id="hargaSatuan" class="form-control input-group-lg" type="text" name="hargasatuan" title="Harga Satuan" onFocus="startCalc();" onBlur="stopCalc();">
																</th>
																<th>
																	<input id="diskon" class="form-control input-group-lg" type="text" name="diskon" title="Harga Satuan" placeholder="Dalam %">
																</th>
																<th>
																	<select class="form-control chosen" id="tax" name="tax">
																	  <option value="">Pilih Pajak</option>
																	  <!--
																		<?php foreach($pajak as $com):?>

																		 <option value="<?php echo $com->id; ?>^<?php echo $com->nama; ?>^<?php echo $com->persentase_efektif; ?>"><?php echo $com->name; ?></option>
																		 <?php endforeach; ?>
																		-->
																		<?php foreach($pajak as $row):?>
                                                                         <option value="<?php echo $row->id_pajak; ?>^<?php echo $row->nama; ?>^<?php echo $row->persentase_efektif; ?>^<?php echo $row->status_pemotongan; ?>">
                                                                         	<?php echo $row->nama; ?>
                                                                         </option>

																		<?php endforeach; ?>
																	</select>
																</th>
															</tr>
														</tbody>
													</table>
												  </div>
											  </div>
											
											  

											  
											  <div class="row">
												<div class="form-group col-xs-2">
													<input type="submit" class="btn btn-success" value="Tambah Produk">
												</div>
											  </div>
											</form>





											  <form name="autoSumForm" method="POST" action="<?php echo base_url(); ?>user_pengajuan/kirim_purchase_order" enctype="multipart/form-data" id="myform" onsubmit="return validasi()">
											  <div class="row">
												<table class="table table-striped table-hover" id="tabelku">
														<thead>
															<tr>
																<th scope="col"> Produk </th>
																<th scope="col"> Deskripsi </th>
																<th scope="col"> Kuantitas </th>
																<th scope="col"> Satuan </th>
																<th scope="col"> Harga Satuan </th>
																<th scope="col"> Diskon </th>
																<th scope="col"> Pajak </th>
																<th scope="col"> Jumlah Pajak </th>
																<th scope="col"> Subtotal Produk</th>
																<th scope="col"> Subtotal</th>
																<th scope="col" style="text-align: center;"> Aksi</th>
															</tr>
														</thead>
														<tbody>
														  <?php 
															  $total_tharga=0;
															  $besaran_diskon=0;
														   ?>
														  <?php foreach($barang_po as $po):
														  $total_tharga +=$po->subtotal;
														  $besaran_diskon +=($po->diskon/100)*$po->tharga_po;
														  $total_diskon_all=$total_tharga-$besaran_diskon;
															?>
														  <tr>
															<td><?php echo $po->nama_barang; ?></td>
															<td><?php echo $po->deskripsi; ?></td>
															<td><?php echo $po->qty_po; ?></td>
															<td><?php echo $po->unit; ?></td>
															<td><?php echo number_format($po->harga_po); ?></td>
															<td><?php echo $po->diskon; ?></td>
															<td><?php echo $po->nama_tax; ?></td>
															<td><?php echo number_format($po->jumlah_pajak); ?></td>
															<td><?php echo number_format($po->tharga_po); ?></td>
															<td><?php echo number_format($po->subtotal); ?></td>
															<td align="center">
																<a href="<?php echo base_url();?>user_pengajuan/hapus_barang_po_detail?id_detail_po=<?php echo $po->id_detail_po; ?>&id_detail_pengajuan=<?php echo $po->id_detail_pengajuan;?>&id_po=<?php echo $po->id_po; ?>"  class="btn btn-sm btn-success confirm_delete">Hapus</a>
															</td>
														  </tr>
														<?php endforeach; ?>
														</tbody>
													  </table>
												 </div>
												 <div class="row">
													 <div class=" col-xs-12 col-md-6">
														 <div class="form-group col-xs-12 col-md-7">
															<label for="textarea"> Pesan </label>
															<textarea placeholder="Pesan" class="form-control" id="textarea" rows="5" placeholder="Pesan" name="pesan"><?php if($pesan){ ?> 
                                                                  <?php echo $pesan; ?>
																<?php } ?></textarea>
														 </div>

														 <div class="form-group col-xs-12 col-md-7">
															<label for="textarea">Memo </label>
															<textarea placeholder="Memo" class="form-control" id="textarea" rows="5" placeholder="Memo" name="memo"><?php if($memo){ ?> 
                                                                  <?php echo $memo; ?>
																<?php } ?> </textarea>
														</div>

														 
													 </div>
													 <input id="id_purchase_order" class="form-control input-group-lg" type="hidden" name="id_purchase_order" title="Satuan" readonly="" value="<?php echo $id_purchase_order; ?>">

													 <div class="col-xs-12 col-md-6">
														  <div class="row">
															  <div class="col-md-5">
															  </div>
															  <div class = "col-xs-6 col-md-4">
																  <div class = "row">
																	<div class = "col-md-12">
																		<label for="textarea"> Subtotal </label>
																	</div>
																	  
																	<div class = "col-md-12">
																		<label for="textarea"> Diskon Per Baris </label>
																	</div>
																	  
																	<div class = "col-md-12">
																		<label for="textarea"> Diskon </label>

																		<input id="diskon_semua" class="form-control input-group-sm" type="text" name="disc_all" title="Diskon" onFocus="startCalc();" onBlur="stopCalc();" placeholder="Dalam %"
                                                                        value="<?php echo $diskon_all; ?>">
																	</div>
																	  
																	
																	  
																	<div class = "col-md-12">
																		<label for="textarea"> Total </label>
																	</div>
																	
																	<div class = "col-md-12">
																		<label for="textarea"> Akun Pembayaran </label>
																	</div>
																	  
																	<div class = "col-md-12">
																		<label for="textarea"> Uang Muka </label>
																	</div>
																	  
																	<div class = "col-md-12">
																		<h4> Sisa Tagihan </h4>
																	</div>
																  </div>                                     
															  </div>
															  
															  <div class = "col-xs-6 col-md-3 text-right">
																  <div class = "row">
																	<div class = "col-md-12">
																		<label for="textarea">Rp. <?php echo number_format($total_tharga); ?></label>
																	</div>
																	  
																	<div class = "col-md-12">
																		<label for="textarea">Rp. <?php echo number_format($besaran_diskon); ?></label>
																	</div>
                                                                    <?php
                                                                     $total_diskon=($diskon_all/100)*$total_diskon_all;
                                                                    ?>
																	
																	 <input type="hidden" name="subtotal" style="border: 0px;" value="<?php echo $total_diskon_all; ?>" onFocus="startCalc();" onBlur="stopCalc();">

																	<div class = "col-md-12">
																	   <label for="textarea">
																	   	<input type="text" name="total_diskon_all" style="border: 0px;" placeholder="0"  value="<?php echo $total_diskon; ?>">
																	   </label>
																	</div>
																	  
																	
																	  
																	<div class = "col-md-12">
																		<label for="textarea">  </label>
																	</div>
																	  
																	<div class = "col-md-12">
																		<label for="textarea"> 
	                                                                       <input type="text" name="total_aja" style="border: 0px;" placeholder="0" id="total_aja" value="<?php echo $total_bayar;?>">
																		</label>
																	</div>
																	
																	<div class = "col-md-12">
																		<select class="form-control chosen" id="account" name="account">
																			<!--
																		<?php foreach($account->accounts as $or):?>

																		<option 
                                                                        <?php

                                                                              if($id_akun_pembayaran==$or->id){ ?>
                                                                             selected
                                                                        <?php      }
                                                                        ?>

																		value="<?php echo $or->id;?>^<?php echo $or->number; ?>^<?php echo $or->name; ?>"> <?php echo $or->name; ?></option>

																		<?php endforeach; ?>
																			 -->
                                                                         <?php foreach($akun_pembayaran as $row):?>
																			<option value="<?php echo $row->id_akun; ?>^11^<?php echo $row->nama_akun_pembayaran; ?>"><?php echo $row->nama_akun_pembayaran; ?></option>
																		<?php endforeach; ?>
																		</select>
																	</div> 
																	  
																	<div class = "col-md-12">
																		<label for="textarea"> <input

                                                                         
                                                                         value="<?php echo $uang_muka; ?>"
                                                                        
																		 id="uang_muka" class="form-control input-group-sm" type="text" name="uang_muka" placeholder="Uang Muka" onFocus="startCalc();" onBlur="stopCalc();"> </label>
																	</div>
																	  
																	<div class = "col-md-12">
																		<h4><input type="text" name="sisa_tagihan" style="border: 0px;" placeholder="0" value="<?php echo $sisa_tagihan; ?>"> </h4>
																	</div>
																  </div>
															  </div>
														  </div>
													   </div>
												</div>
												
												<div class="row">
													<div class="col-md-11">
														 <div class="form-group col-xs-12 text-right">
														 	<a href="<?php echo base_url(); ?>User_pengajuan/update_po1/<?php echo $id_purchase_order; ?>" type="button" class="btn btn-danger">Kembali</a>
															
															<div class="btn-group dropup">
															  <button type="submit" class="btn btn-success">
																Buat Pembelian
															  </button>
															</form>
															</div>
														</div>
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
            </div>



  
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
      
    <script>
        $(document).ready(function(){
          /*$("#hide").click(function(){
            $("p").hide();
          });*/
          $("#show").click(function(){
            $("#show").hide();
          });
        });
        
        function myFunction(){
            // Ambil nilai checkbox
            var checkBox = document.getElementById("infoPengiriman");
            
            // Ambil Output
            var alamatPengirimanDiv = document.getElementById("alamatPengirimanDiv");
            var tglPengirimanDiv = document.getElementById("tglPengirimanDiv");
            var kirimMelaluiDiv = document.getElementById("kirimMelaluiDiv");
            var noPelacakanDiv = document.getElementById("noPelacakanDiv");
            
            if(checkBox.checked == true){
                alamatPengirimanDiv.style.display = "block";
                tglPengirimanDiv.style.display = "block";
                kirimMelaluiDiv.style.display = "block";
                noPelacakanDiv.style.display = "block";
            }else{
                alamatPengirimanDiv.style.display = "none";
                tglPengirimanDiv.style.display = "none";
                kirimMelaluiDiv.style.display = "none";
                noPelacakanDiv.style.display = "none";
            }
        }

        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <script>
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



    </script>
    <script type="text/javascript">
       function autofill(){
        var id_supplier =document.getElementById('id_supplier').value;
        $.ajax({
                       url:"<?php echo base_url();?>User_pengajuan/autocomplete_supplier",
                       data:'&id_supplier='+id_supplier,
                       success:function(data){
                           var hasil = JSON.parse(data);    
        $.each(hasil, function(key,val){ 
                           document.getElementById('email').value=val.email;
                           document.getElementById('address').value=val.address;
                           
                               
          
        });
      }
                   });
                  
    }



     var tgl_sekarang=new Date();
     var hari_sekarang=tgl_sekarang.getDate();
     var bulan_sekarang=tgl_sekarang.getMonth()+1;
     var tahun_sekarang=tgl_sekarang.getFullYear();

    $('.chosen').chosen();
    $('.chosen_gudang').chosen();



  </script>
  <script type="text/javascript">

    function autofill_q(){
        var id_barang =document.getElementById('id_detail').value;
        $.ajax({
                       url:"<?php echo base_url();?>User_pengajuan/autocomplete_pr",
                       data:'&id_barang='+id_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);  
          
      $.each(hasil, function(key,val){ 
       
                       
                          document.getElementById('id_detail').value=val.id_detail;
                          document.getElementById('id_product').value=val.id_barang;
                          document.getElementById('kuantitas').value=val.qty_jumlah;
                          document.getElementById('satuan').value=val.unit;
                          document.getElementById('hargaSatuan').value=val.harga_jual;
                          document.getElementById('diskon').value='0';
                               
          
        });
      }
                   });
                  
    }
</script>
<script>
   var product2= <?php echo json_encode($product2); ?>;

function tambah_baris()
{
    html='<tr>'
    + '<td><select name="id_detail[]" id="id_detail" class="form-control" placeholder="Pembuat">'+'<option value="">' + product2 +
    '</option></select></td>'
    + '<td><input type="text" name="item[]"" class="form-control"></td>'
    + '<td><input type="text" name="jml[]"" class="form-control"></td>'
    + '</tr>';
    $('#tabelku tbody').append(html);
}




function validasi()
    {

        var diskon=document.forms["myform"]["diskon_semua"].value;
        

        
//        validasi question tidak boleh kosong (required)

        if (diskon==null || diskon=="")
          {
           swal({
                title: "Peringatan!",
                text: "Diskon tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5
          
     }
</script>
  
 