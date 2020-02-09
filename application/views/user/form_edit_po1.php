<!DOCTYPE html>
<html lang="en">
	<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Beranda | Sistem Approval PT. Aartijaya</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/ionicons.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="js/jquery-3.1.1.min.js" />
        <link href="css/emoji.css" rel="stylesheet">
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	</head>
  <body>


    <div id="page-contents">
    	<div class="container-fluid">
    		<div class="row">

         
    			<div class="col-md-12">

            <!-- Post Content
            ================================================= -->
            <h3> Transaksi Pembelian </h3>
            <div class="post-content">
              <!--<img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />-->
                
                <div class="post-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-xs-3">
                            <label for="lastname">Supplier</label>
                            <select class="form-control chosen" onchange="return autofill();" id="id_supplier">
                                <option value=""> Pilih Kontak </option>
                                 <?php foreach($supplier->vendors as $an):?>
                                <option value="<?php echo $an->id; ?>"><?php echo $an->display_name; ?></option>
                              <?php endforeach; ?>
                            </select>
                              <!--<input id="lastname" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name" value="Doe" />-->
                         </div>

                        <div class="form-group col-xs-3">
                            <label for="firstname"> Email</label>
                            <input id="email" class="form-control input-group-lg" type="text" name="firstname" title="Enter first name" placeholder="Nama Barang" value="John" />
                        </div>

                        <div class="form-group col-xs-6">
                            <h2 align="right"> <strong>Total Rp. 0,00</strong></h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="form-group col-xs-3">
                            <label for="textarea"> Alamat Supplier </label>
                            <textarea placeholder="Deskripsi" class="form-control" id="address" rows="5"> </textarea>
                        </div>
                        
                        <div class="form-group col-xs-3">
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="firstname"> Tgl Transaksi</label>
                                    <input id="firstname" class="form-control input-group-lg" type="date" name="firstname" title="Enter first name" placeholder="Tanggal Dibutuhkan" value="John" />
                                </div>
                                
                                <div class="form-group col-xs-12">
                                    <label for="firstname"> Tgl Jatuh Tempo</label>
                                    <input id="firstname" class="form-control input-group-lg" type="date" name="firstname" title="Enter first name" placeholder="Tanggal Dibutuhkan" value="John" />
                                </div>
                                
                                <div class="form-group col-xs-12">
                                    <label for="lastname">Syarat Pembayaran</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected> Pilih Kontak </option>
                                        <option value="ATK"> Custom </option>
                                        <option value=""> Cash on Delivery </option>
                                        <option> Net 60 </option>
                                        <option> Net 30 </option>
                                        <option> Net 15 </option>
                                    </select>
                                      <!--<input id="lastname" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name" value="Doe" />-->
                                 </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-xs-3">
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="textarea"> No. Transaksi </label>
                                    <input id="noTransaksi" class="form-control input-group-lg" type="text" name="noTransaksi" title="Nomor Transaksi" placeholder="[Auto]"/>
                                </div>
                                
                                <div class="form-group col-xs-12">
                                    <label for="textarea"> No. Referensi Supplier </label>
                                    <input id="noReferensi" class="form-control input-group-lg" type="text" name="noReferensi" title="Nomor Referensi" />
                                </div>
                            </div>    
                        </div>
                        
                        <div class="form-group col-xs-3">
                            <label for="textarea"> Tag </label>
                            <input id="tag" class="form-control input-group-lg" type="text" name="tag" title="Tag" />
                        </div>
                    </div>
                </div>
                    
                    <div class="row">
                        <div class="custom-control custom-switch text-right">
                            <label class="custom-control-label" for="switch1"> <strong> Harga Termasuk Pajak </strong></label>
                            &nbsp; &nbsp;
                            <input type="checkbox" class="custom-control-input" id="switch1">
                        </div>
                       
                        <div class="table-responsive-lg">      
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col"> Produk </th>
                                        <th scope="col"> Deskripsi </th>
                                        <th scope="col"> Qty </th>
                                        <th scope="col"> Satuan </th>
                                        <th scope="col"> Harga Satuan </th>
                                        <th scope="col"> Pajak </th>
                                        <th scope="col"> Jumlah </th>
                                        <th scope="col">  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"> 
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option selected> Pilih Kontak </option>
                                                <option value="ATK"> Custom </option>
                                                <option value=""> Cash on Delivery </option>
                                                <option> Net 60 </option>
                                                <option> Net 30 </option>
                                                <option> Net 15 </option>
                                            </select> 
                                        </th>
                                        
                                        <th> 
                                            <textarea placeholder="Deskripsi" class="form-control" id="textarea" rows="1"> </textarea>
                                        </th>
                                        <th> 
                                            <input id="kuantitas" class="form-control input-group-lg" type="text" name="kuantitas" title="Kuantitas" />
                                        </th>
                                        <th>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option selected> Pilih Kontak </option>
                                                <option value="ATK"> Custom </option>
                                                <option value=""> Cash on Delivery </option>
                                                <option> Net 60 </option>
                                                <option> Net 30 </option>
                                                <option> Net 15 </option>
                                            </select>
                                        </th>
                                        <th> 
                                            <input id="hargaSatuan" class="form-control input-group-lg" type="text" name="hargaSatuan" title="Harga Satuan" />
                                        </th>
                                        
                                        <th>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option selected> Pilih Pajak </option>
                                                <option value="ATK"> PPN </option>
                                                <option value=""> Pajak Sarana Withholding </option>
                                            </select>
                                        </th>
                                        
                                        <th> 
                                            <input id="hargaSatuan" class="form-control input-group-lg" type="text" name="hargaSatuan" title="Harga Satuan" />
                                        </th>
                                        <th> <a href=""> - </a> </th>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row"> 
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option selected> Pilih Kontak </option>
                                                <option value="ATK"> Custom </option>
                                                <option value=""> Cash on Delivery </option>
                                                <option> Net 60 </option>
                                                <option> Net 30 </option>
                                                <option> Net 15 </option>
                                            </select> 
                                        </th>
                                        
                                        <th> 
                                            <textarea placeholder="Deskripsi" class="form-control" id="textarea" rows="1"> </textarea>
                                        </th>
                                        <th> 
                                            <input id="kuantitas" class="form-control input-group-lg" type="text" name="kuantitas" title="Kuantitas" />
                                        </th>
                                        <th>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option selected> Pilih Kontak </option>
                                                <option value="ATK"> Custom </option>
                                                <option value=""> Cash on Delivery </option>
                                                <option> Net 60 </option>
                                                <option> Net 30 </option>
                                                <option> Net 15 </option>
                                            </select>
                                        </th>
                                        <th> 
                                            <input id="hargaSatuan" class="form-control input-group-lg" type="text" name="hargaSatuan" title="Harga Satuan" />
                                        </th>
                                        
                                        <th>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option selected> Pilih Pajak </option>
                                                <option value="ATK"> PPN </option>
                                                <option value=""> Pajak Sarana Withholding </option>
                                            </select>
                                        </th>
                                        
                                        <th> 
                                            <input id="hargaSatuan" class="form-control input-group-lg" type="text" name="hargaSatuan" title="Harga Satuan" />
                                        </th>
                                        <th> <a href=""> - </a> </th>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                      </div>
                    
                      <div class="row">
                            <div class="form-group col-xs-2">
                                <button type="button" class="btn btn-primary">
                                  <span class="fa fa-plus"></span> Tambah 
                                </button>
                            </div>
                        </div>
                        
                     <div class="row">
                         <div class="col-md-3">
                             <div class="form-group col-xs-12">
                                <label for="textarea"> Pesan </label>
                                <textarea placeholder="Deskripsi" class="form-control" id="textarea" rows="5"> </textarea>
                             </div>

                             <div class="form-group col-xs-12">
                                <label for="textarea"> Alamat Supplier </label>
                                <textarea placeholder="Deskripsi" class="form-control" id="textarea" rows="5"> </textarea>
                            </div>

                             <div class="form-group col-xs-12">
                                 <label for="textarea"> <span class="fa fa-paperclip"> </span> Lampiran </label>
                                 <input id="lampiran" class="form-control input-group-lg" type="file" name="lampiran" title="Lampiran" multiple/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            
                        </div>
                         <div class="col-md-2">
                            <div class="form-group col-xs-12 text-right">
                                <label>  </label>
                            </div>
                            
                            <div class="form-group col-xs-12 text-right">
                                <label>  </label>
                            </div>
                            
                            <div class="form-group col-xs-12 align-right inline">
                                 <button id="show" onclick="document.getElementById('potongan').style.display='block';document.getElementById('tom').style.display='block'">Masukan Jumlah Potongan</button>
                                
                                 <select class="form-control pull-right" id="potongan" style="display: none">
                                    <option selected> Pilih Pajak </option>
                                    <option value="ATK"> PPN </option>
                                    <option value=""> Pajak Sarana Withholding </option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-2">
                            <div class="form-group col-xs-12">
                                <label> Sub Total </label>
                             </div>

                             <div class="form-group col-xs-12">
                                <label> Total </label>
                            </div>

                             <div class="form-group col-xs-12">
                                    
                                    <input type="text" class="form-control" name="lampiran" id="tom" title="Lampiran" style="display: none" placeholder="0.00">
                                    <button value="%">%</button>
                                    <button value="Rp.">Rp.</button>
                                   
                                </div>

                             <div class="form-group col-xs-12">
                                <label for="textarea"> <h3> Sisa Tagihan</h3> </label>
                            </div>
                        </div>
                         <div class="col-md-2 text-right">
                             <div class="form-group col-xs-12 text-right">
                                <label for="textarea"> Rp. 0.00 </label>
                             </div>

                             <div class="form-group col-xs-12 text-right">
                                <label for="textarea"> Rp. 0.00 </label>
                             </div>

                             <div class="form-group col-xs-12 text-right">
                                <label for="textarea"> Rp. 0.00 </label>
                             </div>

                             <div class="form-group col-xs-12 text-right">
                                 <label for="textarea"> <h3> Rp. 0.00 </h3> </label>
                             </div>
                        </div>
                     </div>
                    
                    <div class="row">
                        <div class="col-md-11">
                             <div class="form-group col-xs-12 text-right">
                                <button type="button" class="btn btn-danger">
                                  <span class="fa fa-close"></span> Batal 
                                </button>
                                 
                                <div class="btn-group dropup">
                                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Buat Pembelian
                                  </button>
                                  <div class="dropdown-menu">
                                    <ul>
                                      <li><a href="timeline.html">Buat Pembelian</a></li>
                                      <li><a href="timeline-about.html">Buat & Baru</a></li>
                                    </ul>
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

    
    <script>
        $(document).ready(function(){
          /*$("#hide").click(function(){
            $("p").hide();
          });*/
          $("#show").click(function(){
            $("#show").hide();
          });
        });

         $('.chosen').chosen();
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


    
  </script>
  </body>
</html>
