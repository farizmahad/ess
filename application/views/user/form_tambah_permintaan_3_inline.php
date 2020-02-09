<link href="<?php echo base_url(); ?>assets/select/css/select2.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/select/css/select2.min.css" rel="stylesheet" />


<?php
      $ID                 = $this->ion_auth->user()->row()->id;
      $first_name         = $this->ion_auth->user()->row()->first_name;
      $last_name          = $this->ion_auth->user()->row()->last_name;
?>
<div id="page-contents">
    	<div class="container-fluid">
    		<div class="row">
			  <div class="col-md-3 static">
			  </div>
    			<div class="col-md-9">
        <h4 class="grey"><i class="icon ion-plus"></i> Tambah Permintaan Produk Non Dagang</h4>
          <div class="line"></div>

            <div class="post-content">
              <div class="post-container">
		<?php
		 $group_hrd = array('purchasing');
			if ($this->ion_auth->in_group($group_hrd)){ ?>
		
			 
			<form id="myform" method="POST" action="<?php echo base_url(); ?>User_pengajuan/saveimport" enctype="multipart/form-data">
				<div id="rowForm">
					<div class="row">
						<div class="form-group col-xs-12 col-lg-2">
							<label for="firstname"> Lampirkan File </label>
						</div>
						
						<div class="form-group col-xs-12 col-lg-3">
							<input type="file" name="file" class="form-control" id="file" required accept=".xls, .xlsx" />
						</div>
						
						<div class="form-group col-xs-12 col-lg-2">
							<input type="submit" class="btn btn-sm btn-warning" value="Import" name="import">
						</div>
					</div>
				</div>
			</form>
			<?php } ?>

                
                  <form id="myform" onSubmit="return validasi()" method="POST" action="<?php echo base_url(); ?>User_pengajuan/add_barang_db">
                    <div id="rowForm">
                        <div class="row">
                            <!--
							<div class="form-group col-xs-6 col-lg-12">
                                <button type="button" class="btn btn-danger" name="tambah_baris" id="tambah_baris"> TAMBAH BARIS </button>
                            </div>
                            -->
                            <div class="form-group col-xs-12 col-lg-2">
                                <label for="firstname"> Produk</label>
                                <select class="form-control" name="id_barang" onchange="return autofill();" id="id_barang">
                                  <option value="">Pilih Produk</option>
                                  <?php foreach($barang as $row):?>
                                     <option value="<?php echo $row->id_barang; ?>^<?php echo $row->kategori_produk; ?>^<?php echo $row->nama_barang; ?>">
                                  <?php echo $row->nama_barang; ?></option>
                                  <?php endforeach; ?>  
                               </select>
                            </div>
							
							<div class="form-group col-xs-12 col-lg-2">
                                <label for="firstname"> Deskripsi</label>
								<input class="form-control" type="text"  title="Masukan Deskripsi Barang" placeholder="Berupa Warna / ukuran" name="deskripsi_produk">
                            </div>
							
                            <div class="form-group col-xs-12 col-lg-2">
                                <label for="firstname"> Kuantitas</label>
								<input class="form-control" type="number"  title="Enter first name" placeholder="Kuantitas" id="jumlah_barang" name="jumlah_barang" min="1" max="500">
                            </div>

                            <div class="form-group col-xs-6 col-lg-1">
                                <label for="Satuan"> Satuan </label>
                                <input type="text" class="form-control" name="satuan" readonly="" id="satuan" placeholder="Satuan">
                            </div>

                            <div class="form-group col-xs-6 col-lg-2" id="data_1">
                                <label for="firstname"> Tanggal Dibutuhkan</label>
                           <input type="date" class="form-control" placeholder="Pilih Tanggal" name="tanggal_dibutuhkan" id="tanggal_required">
                          
                            </div>

                            <div class="form-group col-xs-12 col-lg-3">
                                <label for="Keterangan" class="">Keterangan</label>
                                <textarea placeholder="Keterangan" class="form-control" name="deskripsi" id="deskripsi" rows="2"> </textarea>
                            </div>
                        </div>
                    </div>
                      <input type="hidden" class="form-control" placeholder="Pilih Tanggal" name="id_user"  value="<?php echo $ID; ?>">
					
					<div class="row">
						<div class="form-group col-xs-6 col-lg-12">
							<button type="submit" class="btn btn-success"> Tambah </button>
						</div>
					</div>
					
					</form>


                <form method="POST" action="<?php echo base_url(); ?>User_pengajuan/simpan_produk_pr">
                 <?php   
                  $count_detail=count($detail_sementara);?>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <div class="table-responsive-lg">      
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                         <th> Produk</th>
                                         <th> Deskripsi Produk</th>
                                         <th> Kuantitas</th>
                                         <th> Satuan</th>
                                         <th> Tgl dibutuhkan</th>
                                         <th> Keterangan</th>
                                         <th scope="col" style="text-align: center;"> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if($count_detail > 0){
                                foreach($detail_sementara as $ra):
                                  ?>
                                    <tr>
                                        <td><?php echo $ra->nama_barang; ?></td>
                                        <td>
                                          <input type="text" name="deskripsi_produk[]" value="<?php echo $ra->deskripsi_produk; ?>" class="form-control">
                                        </td>
                                        <td><input type="number" class="form-control" name="qty[]" value="<?php echo $ra->qty; ?>">
                                          <input type="hidden" class="form-control" name="id_detail[]" value="<?php echo $ra->id_detail; ?>">
                                        </td>

                                        <td><?php echo $ra->satuan; ?></td>
                                        <td><input type="date" class="form-control" name="tanggal_dibutuhkan[]" value="<?php echo $ra->tanggal_dibutuhkan; ?>">
                                        </td>
                                        <td><input type="text" name="deskripsi[]" value="<?php echo $ra->keterangan; ?>" class="form-control">
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>User_pengajuan/hapus_detailpengajuan?id_detail=<?php echo $ra->id_detail; ?>" class="btn btn-sm btn-warning btn-sm confirm_delete">Hapus</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                              <?php }else{ ?>
                                  <tr>
                                    <td align="center" colspan="6">Belum ada produk</td>
                                  </tr>

                              <?php } ?>
                                </tbody>
                            </table>
                          </div>
                          <?php
                           if($count_detail > 0){ ?>
						            <div align="right">
							               <button type="submit" class="btn btn-success"> Selesai </button>
						            </div>
                      <?php } ?>
                      </div>
                </div>
                </form>
              </div>
            </div>
          </div>

          </div>    
    		</div>
    	</div>


   <script src="<?php echo base_url(); ?>assets/select/js/select2.full.js"></script>
<script src="<?php echo base_url(); ?>assets/select/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/select/js/select2.js"></script>
<script src="<?php echo base_url(); ?>assets/select/js/select2.min.js"></script>

    
    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            
            $('#tambah_baris').click(function(){
                i++;
                $('#rowForm').append('<div class="row" id="row'+i+'"><div class="form-group col-xs-12 col-lg-3"><label for="firstname"> Nama Produk</label><select class="form-control chosen" name="id_barang" onchange="return autofill();" id="id_barang"><option value="">Pilih Produk</option><?php foreach($barang as $row): $nama_produk=$row->nama_barang;?><option value="<?php echo $row->id_barang; ?>^<?php echo $row->kategori_produk; ?>^<?php echo $row->nama_produk; ?>"><?php echo($row->nama_barang); ?></option><?php endforeach; ?></select></div><div class="form-group col-xs-6 col-lg-1"><label for="Qty"> Qty </label><input id="Qty" class="form-control input-group-lg" type="number" name="qty" title="Enter first name" placeholder="Qty" /></div><div class="form-group col-xs-6 col-lg-1"><label for="Satuan"> Satuan </label><input id="satuan" class="form-control input-group-lg" type="text" name="satuan" title="Enter first name" placeholder="Satuan" /></div><div class="form-group col-xs-6 col-lg-2"><label for="firstname"> Tanggal Dibutuhkan</label><input id="firstname" class="form-control input-group-lg" type="date" name="date" title="Enter first name"  /></div><div class="form-group col-xs-12 col-lg-3"><label for="Keterangan" class="">Keterangan</label><textarea placeholder="Keterangan" class="form-control" id="Keterangan" rows="1"> </textarea> </div> <div class="form-group col-xs-12 col-lg-1"> <label for="#">###</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"> Hapus </button></div></div>');
            });

            $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
            });
        });
    </script>
    <script>
    
     function validasi()
    {

        var item=document.forms["myform"]["id_barang"].value;
//        validasi question tidak boleh kosong (required)

        if (item==null || item=="")
          {
           swal({
                title: "Peringatan!",
                text: "Pilih dahulu barang!"
            });
          return false;
          };

         
        var tanggal_required=document.forms["myform"]["tanggal_required"].value;

//        validasi question tidak boleh kosong (required)

        if (tanggal_required==null || tanggal_required=="")
          {
           swal({
                title: "Peringatan!",
                text: "Tanggal dibutuhkan harus diisi!"
            });
          return false;
          };

       var jumlah_barang=document.forms["myform"]["jumlah_barang"].value;

//        validasi question tidak boleh kosong (required)

        if (jumlah_barang==null || jumlah_barang=="")
          {
           swal({
                title: "Peringatan!",
                text: "Jumlah barang harus diisi!"
            });
          return false;
          }else{

            if(jumlah_barang > 1000){
         swal({
                title: "Peringatan!",
                text: "Jumlah barang maksimal harus 1000!"
            });
          return false;
            }else{

                if(jumlah_barang <0 || jumlah_barang==0){
                    swal({
                title: "Peringatan!",
                text: "Jumlah barang minimal harus 1!"
            });
          return false;
                }
            }
          


          };

     var deskripsi=document.forms["myform"]["deskripsi"].value;

//        validasi question tidak boleh kosong (required)

        if (deskripsi==null || deskripsi=="")
          {
           swal({
                title: "Peringatan!",
                text: "Keterangan harus diisi!"
            });
          return false;
          };


     
       var satuan=document.forms["myform"]["satuan"].value;

//        validasi question tidak boleh kosong (required)

        if (satuan==null || satuan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Satuan harus diisi!"
            });
          return false;
          };
         
       
       
     }

    // function terisi otomatis saat memilih barang

       function autofill(){
        var id_barang =document.getElementById('id_barang').value;
        $.ajax({
                       url:"<?php echo base_url();?>User_pengajuan/autocomplete_barang",
                       data:'&id_barang='+id_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);    
                        $.each(hasil, function(key,val){   
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

 $('.chosen').chosen();


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
<script>
  $("#id_barang").select2({
    minimumInputLength: 1
});
</script>

  