
<script><!-- 
function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.kuantitas.value;
alert(one);
two = document.autoSumForm.hargasatuann.value; 
document.autoSumForm.subtotali.value = (one * 1) + (tre * 1);}
function stopCalc(){
clearInterval(interval);}
</script>

<form method="POST" action="<?php echo base_url(); ?>User_pengajuan/simpan_po" id="myform" onsubmit="return validasi()">
     <div id="page-contents">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12">
				<h3> Transaksi Pembelian </h3>
				<div class="post-content">
					<div class="post-container">
					<div class="row">
						<div class="col-md-12">

						  <!-- supplier -->
						  
							<div class="form-group col-xs-3">
								<label for="lastname">* Supplier</label>
									<select class="form-control chosen" onchange="return autofill();" id="id_supplier" name="id_supplier">
									 <?php foreach($supplier->vendors as $an):?>
										<option <?php if($id_supplier==$an->id){ ?>
                      selected
                    <?php } ?> value="<?php echo $an->id; ?>^<?php echo $an->display_name; ?>">
											 <?php echo $an->display_name; ?>
										</option>
									 <?php endforeach; ?>
									</select>
								  <br><br>
								  <!-- tambah supplier-->

								
							 </div>

							 <!-- email -->

							<div class="form-group col-xs-3">
								<label for="email"> Email</label>
								<input id="email" class="form-control input-group-lg" type="text" name="email_supplier" / <?php if($email_supplier){ ?> value="<?php echo $email_supplier; ?>" <?php } ?>>
							</div>

							<!-- info pengiriman -->
							
							<div class="form-group col-xs-3">
								<label for="firstname"> </label>
									<div class="custom-control custom-switch text-left">
									<input type="checkbox" class="custom-control-input" id="infoPengiriman" onclick="myFunction()">
									<label class="custom-control-label" for="switch1"> <strong> Info Pengiriman? </strong></label>
									&nbsp; &nbsp;
								</div>
							</div>
							<!--
							<div class="form-group col-xs-3">
								<h2 align="right"> <strong>Total Rp. 0,00</strong></h2>
							</div>
						-->
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3">

								  <!-- alamat supplier -->

									<div class="form-group col-xs-12">
										<label for="textarea"> Alamat Supplier </label>
										<textarea placeholder="Alamat Supplier" class="form-control" id="textarea" rows="5" name="alamatSupplier"><?php if($alamat_supplier){ ?>
                      <?php echo $alamat_supplier; ?>
                      <?php } ?></textarea>
									</div>

								  <!-- alamat pengiriman -->
									<div class="form-group col-xs-12" id="alamatPengirimanDiv" style="display: none">
										<label for="textarea"> Alamat Pengiriman </label>
										<textarea placeholder="Alamat Pengiriman" class="form-control" id="textarea" rows="5" name="alamatPengiriman"> <?php if($alamat_prngiriman){ ?>
                      <?php echo $alamat_pengiriman; ?>
                      <?php } ?></textarea>
									</div>
								</div>

							   

								
								<div class="col-md-2">
								   <!-- tanggal transaksi -->
									<?php
									   $today=date('Y-m-d');
									?>
									<div class="form-group col-xs-12">
										<label for="Tgl Transaksi">* Tgl Transaksi</label>
										<input id="tglTransaksi" class="form-control input-group-lg" type="date" name="tglTransaksi" placeholder="Tanggal Transaksi"/ value="<?php echo $today; ?>" readonly <?php if($tgl_transaksi){ ?> value="<?php echo $tgl_transaksi; ?>" <?php } ?>>
									</div>
									
									<!-- tanggal jatuh tempo -->
									<div class="form-group col-xs-12">
										<label for="tglJatuhTempo">* Tgl Jatuh Tempo</label>
										<input id="tglJatuhTempo" class="form-control input-group-lg" type="date" name="tglJatuhTempo" <?php if($tgl_jatuh_tempo){ ?> value="<?php echo $tgl_jatuh_tempo; ?>" <?php } ?>>
									</div>
									
									<!-- syarat pembayaran -->



									<div class="form-group col-xs-12">
										<label for="syaratPembayaran">* Syarat Pembayaran</label>
										   <select class="form-control chosen" onchange="return autofill_terms();" id="terms" name="syaratPembayaran"> 
											<?php foreach($terms->terms as $row):?> 
											  <option <?php if($syarat_pembayaran==$row->id){ ?> selected <?php } ?>

                        value="<?php echo $row->id; ?>^<?php echo $row->name; ?>">
													<?php echo $row->name; ?>
											  </option>
											<?php endforeach; ?>
										   </select>    
									</div>
								</div>
								
								<div class="col-md-2">
								  <!--tanggal peniriman -->

									<div class="form-group col-xs-12" id="tglPengirimanDiv" style="display: none">
										<label for="tglPengiriman"> Tgl Pengiriman</label>
										<input id="tglPengiriman" class="form-control input-group-lg" type="date" name="tglPengiriman" <?php if($tgl_pengiriman){ ?> value="<?php echo $tgl_pengiriman; ?>" <?php } ?>>
									</div>
									
									<!-- kirim melalui -->

									<div class="form-group col-xs-12" id="kirimMelaluiDiv" style="display: none">
										<label for="kirimMelalui"> Kirim Melalui</label>
										<input id="kirimMelalui" class="form-control input-group-lg" type="text" name="kirimMelalui" <?php if($kirim_melalui){ ?> value="<?php echo $kirim_melalui; ?>" <?php } ?>>
									</div>
									<!-- no pelacakan -->

									<div class="form-group col-xs-12" id="noPelacakanDiv" style="display: none">
										<label for="noPelacakan">No Pelacakan</label>
										<input id="noPelacakan" class="form-control input-group-lg" type="text" name="noPelacakan" <?php if($no_pelacakan){ ?> value="<?php echo $no_pelacakan; ?>" <?php } ?>>
									 </div>
								</div>
								
								<!-- No transaksi -->

								<div class="col-md-3">
									<div class="form-group col-xs-12">
										<label for="noTransaksi">* No. Transaksi </label> &nbsp; 
										<a href="#" data-toggle="tooltip" data-placement="top" title="Nomor transaksi akan dihitung secara otomatis oleh sistem. Klik di sini untuk mengatur nomor transaksi. Perkiraan Nomor: xx/xx/xxxx/x/xx"><span class="fa fa-cogs"></span></a>
										<input id="noTransaksi" class="form-control input-group-lg" type="text" name="noTransaksi" title="Nomor Transaksi" placeholder="[Auto]"<?php if($no_po){ ?> value="<?php echo $no_po; ?>" <?php } ?>>
									</div>

									<!-- No referensi supplier -->
									
									<div class="form-group col-xs-12">
										<label for="noReferensi"> No. Referensi Supplier </label>
										<input id="noReferensi" class="form-control input-group-lg" type="text" name="noReferensi" title="Nomor Referensi" <?php if($no_referensi){ ?> value="<?php echo $no_referensi; ?>" <?php } ?>>
									</div>
								</div>
								
								<div class="col-md-2">

								  <!-- Tag -->
									<div class="form-group col-xs-12">
										<label for="tag"> Tag </label>
										<input id="tag" class="form-control input-group-lg" type="text" name="tag" title="Tag" <?php if($tag){ ?> value="<?php echo $tag; ?>" <?php } ?>>
									</div>
									<input type="hidden" name="id_po" value="<?php echo $id_po; ?>">
									<!-- Gudang --> 

									<div class="form-group col-xs-12">
										<label for="Gudang">* Gudang</label>
										
											<option value=""> Pilih Gudang </option>
											 <select class="form-control chosen_gudang" id="id_gudang" name="id_gudang"> 
											<?php foreach($warehouse->warehouses as $col):?> 
											  <option <?php if($id_gudang==$col->id){ ?> selected <?php } ?>

                        value="<?php echo $col->id; ?>^<?php echo $col->name; ?>">
													<?php echo $col->name; ?>
											  </option>
											<?php endforeach; ?>
										   </select>  
										</select>
									 </div>
								</div>

							</div>
							<div align="right">
							 <button type="submit" class="btn btn-danger">
									 Selanjutnya
								</button>
							</div>
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</form>
                    
                    <!----------------------------------------------------------------------------->
                    
  <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Supplier</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url();?>master/save_bank">
          <div class="form-group">
            <label>Bank</label>
            <input type="text" class="form-control bank required" name="bank">
          </div>
          <div class="form-group">
            <label>Nomor Rekening</label>
            <input type="text" class="form-control norek required" name="norek">
          </div>
            <div class="form-group">
            <label>Cabang</label>
            <input type="text" class="form-control cabang required" name="cabang">
          </div>
            <div class="form-group">
            <label>Atas Nama</label>
            <input type="text" class="form-control nama required" name="nama">
          </div>
           <input class="form-control bank_id" type="text" name="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Simpan">
      </div>
      </form>
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




     function autofill_terms(){

        var terms =document.getElementById('terms').value;
        $.ajax({
                       url:"<?php echo base_url();?>User_pengajuan/autocomplete_terms",
                       data:'&terms='+terms,
                       success:function(data){
                           var hasil = JSON.parse(data);    
        $.each(hasil, function(key,val){ 
          var tanggal=val.longetivity;
          var hariKedepan = new Date(new Date().getTime()+(tanggal*24*60*60*1000));
          

                           document.getElementById('tglJatuhTempo').value=hariKedepan;
                           
                           
                               
          
        });
      }
                   });
                  
    }


     function autofill_product(){

        var id_product =document.getElementById('id_product').value;

        $.ajax({
                       url:"<?php echo base_url();?>User_pengajuan/autocomplete_product",
                       data:'&id_product='+id_product,
                       success:function(data){
                           var hasil = JSON.parse(data);    
        $.each(hasil, function(key,val){ 
           
         
         
          

                           document.getElementById('hargaSatuan').value=val.last_buy_price_currency_format;
                            document.getElementById('kuantitas').value='1';
                           
                           
                           
                               
          
        });
      }
                   });
                  
    }




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
       
                           document.getElementById('id_detail').disabled=true;
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

        var id_supplier=document.forms["myform"]["id_supplier"].value;
        
//        validasi question tidak boleh kosong (required)

        if (id_supplier==null || id_supplier=="")
          {
           swal({
                title: "Peringatan!",
                text: "Supplier tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        var tglJatuhTempo=document.forms["myform"]["tglJatuhTempo"].value;
        
//        validasi id user tidak boleh kosong (required)
        if (tglJatuhTempo==null || tglJatuhTempo=="")
          {
           swal({
                title: "Peringatan!",
                text:  "Tanggal jatuh tempo tidak boleh kosong!"
            });
          return false;
          };

        var noTransaksi=document.forms["myform"]["noTransaksi"].value;
        
//        validasi id user tidak boleh kosong (required)
        if (noTransaksi==null || noTransaksi=="")
          {
           swal({
                title: "Peringatan!",
                text:  "No transkasi tidak boleh kosong!"
            });
          return false;
          };

          
     }
</script>
  
