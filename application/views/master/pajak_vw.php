<div class="col-lg-9">
      <h5 class="grey"> <strong> Daftar Lainnya </strong> </h5>
      <h4 class="grey"><i class="fa fa-list"></i> <strong> Pajak </strong> </h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
			  <div class="post-container">
              <div class="table-responsive-lg">
                
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Buat Pajak Baru Satu </button>
                <!--
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModalgroup"><i class="fa fa-plus"></i> Buat Pajak Baru Group</button>
            -->
            </div>
                <!--
				<a href="<?php echo base_url(); ?>masterer/supplier"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
				-->
                <!--
                <a href="<?php echo base_url(); ?>masterer/supplier"><button type="button" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-upload"></i> Eksport Excel</button></a>
                <a href="<?php echo base_url(); ?>masterer/supplier"><button type="button" class="btn btn-sm btn-warning" data-toggle="modal"><i class="fa fa-download"></i> Import Excel</button></a>
            -->
			   
			   <br>
                <table class="table table-striped table-hover">
                    <thead>
                          <th width='5%' style="text-align:center;background:#AFEEEE;">No</th>
                            <th style="background:#AFEEEE">Nama</th>
                            <th style="background:#AFEEEE">Persentase Efektif</th>
                            <th style="background:#AFEEEE">Status Pajak</th>
                            <th style="background:#AFEEEE;text-align: center;">Aksi</th>
                    </thead>
                    <tbody>
						
						<?php
							$jumlah=count($pajak);?>

							<?php if($jumlah > 0) { ?>
								<?php
								$no=$this->uri->segment('3') + 1;
								foreach($pajak as $kat):?>
									<tr>
										<td align="center"><?php echo $no++; ?></td>
										<td><?php echo $kat->nama; ?></td>
										<td>
                                        <?php if($kat->status_pemotongan=="1")
                                        {
                                                  echo "-";
                                        }
                                        ?>


                                            <?php echo $kat->persentase_efektif; ?></td>
                                            <td>

                                             
                                                <?php if($kat->status=="1"){
                                                    echo "Satu";
                                                }elseif($kat->status=="2"){
                                                    echo "Group";
                                                }
                                                ?>
                                            </td>
										
										<td align="center">
											<button type="button" class="btn btn-success btn-sm edit_button"
													data-toggle="modal" data-target="#EditModal"
													data-id_pajak="<?php echo $kat->id_pajak; ?>"
													data-nama="<?php echo $kat->nama;?>"
													data-persentase_efektif="<?php echo $kat->persentase_efektif;?>"
													data-status_pemotongan="<?php echo $kat->status_pemotongan;?>"
											> <i class="fa fa-pencil" aria-hidden="true"></i>
												Ubah
											</button>


											<a href="#" data-url="<?php echo site_url('masterer/hapus_supplier/'.$kat->id_supplier);?>" class="btn btn-sm btn-danger btn-sm confirm_delete"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </a>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php }else{ ?>
										<td colspan="4" align="center">Tidak ada data!</td>
						<?php } ?>
                        </tbody>
                        

                </table>

                </div>
                </div>
              </div>
              <div id="result">
            </div>
          </div>
          </div>    
    		</div>
    	</div>
    </div>


   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Buat Pajak Baru</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_pajak" id="myform" onSubmit="return validasi()">
                    <!--
                    <div class="form-group">
                        <label>Pajak</label>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Satu">
						  <label class="form-check-label" for="inlineRadio1">Satu</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Grup">
						  <label class="form-check-label" for="inlineRadio2">Grup</label>
						</div>
					</div>
                -->
					<input type="hidden" name="status" value="1">
					<div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_pajak" placeholder="Nama Pajak" id="nama_pajak">
                    </div>
					
					<div class="form-group">
                        <label>Persentase Efektif</label>
                        <input type="number" class="form-control" name="persentase_efektif" placeholder="Persentase Efektif" id="persentase_efektif">
                    </div>
					
					<div class="form-group">
                        <label>Pemotongan</label>
                        <div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  name="cek_pemotongan">
						  <label class="form-check-label" for="inlineCheckbox1">Ya</label>
						</div>		
					</div>
					 <!--
					<div class="form-group">
                        <label>Akun Pajak Penjualan</label>
                        <select class="form-control form-control-sm" name="akun_pajak_penjualan">
						  <option>Small select</option>
						</select>	
					</div>
					
					<div class="form-group">
                        <label>Akun Pajak Pembelian</label>
                        <select class="form-control form-control-sm" name="akun_pajak_pembelian">
						  <option>Small select</option>
						</select>	
					</div>
                -->
            </div>
			
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>



  <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Pajak</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_pajak" id="myformedit" onSubmit="return validasiedit()">
                    <!--
                    <div class="form-group">
                        <label>Pajak</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Satu">
                          <label class="form-check-label" for="inlineRadio1">Satu</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Grup">
                          <label class="form-check-label" for="inlineRadio2">Grup</label>
                        </div>
                    </div>
                -->
                   
                    <input type="hidden" name="id_pajak" class="id_pajak">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama_pajak" placeholder="Nama Pajak" id="nama_pajak">
                    </div>
                    
                    <div class="form-group">
                        <label>Persentase Efektif</label>
                        <input type="number" class="form-control persentase_efektif" name="persentase_efektif" placeholder="Persentase Efektif" id="persentase_efektif">
                    </div>
                    <!--
                    <div class="form-group">
                        <label>Pemotongan</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input status_pemotongan" type="checkbox" id="inlineCheckbox1"  name="cek_pemotongan">
                          <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                        </div>      
                    </div>
                -->
                     <!--
                    <div class="form-group">
                        <label>Akun Pajak Penjualan</label>
                        <select class="form-control form-control-sm" name="akun_pajak_penjualan">
                          <option>Small select</option>
                        </select>   
                    </div>
                    
                    <div class="form-group">
                        <label>Akun Pajak Pembelian</label>
                        <select class="form-control form-control-sm" name="akun_pajak_pembelian">
                          <option>Small select</option>
                        </select>   
                    </div>
                -->
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>


 <div class="modal fade" id="myModalgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Buat Pajak Baru</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_pajak" id="myform" onSubmit="return validasi()">
                    <!--
                    <div class="form-group">
                        <label>Pajak</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Satu">
                          <label class="form-check-label" for="inlineRadio1">Satu</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Grup">
                          <label class="form-check-label" for="inlineRadio2">Grup</label>
                        </div>
                    </div>
                -->
                    <input type="hidden" name="status" value="1">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_pajak" placeholder="Nama Pajak" id="nama_pajak">
                    </div>
                    
                    <div class="form-group">
                        <label>Terdiri dari</label>
                        <select class="form-control chosen">
                            <?php foreach($pajak as $row):?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    
                    
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!--
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Pajak</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_supplier">
                    <div class="form-group">
                        <label>Pajak</label>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Satu">
						  <label class="form-check-label" for="inlineRadio1">Satu</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Grup">
						  <label class="form-check-label" for="inlineRadio2">Grup</label>
						</div>
					</div>
					
					<div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_pajak" placeholder="Nama Pajak" required oninvalid="this.setCustomValidity('Nama Pajak')" oninput="setCustomValidity('')">
                    </div>
					
					<div class="form-group">
                        <label>Persentase Efektif</label>
                        <input type="number" class="form-control" name="persentase_efektif" placeholder="Persentase Efektif" required oninvalid="this.setCustomValidity('Persentase Efektif')" oninput="setCustomValidity('')" min="0">
                    </div>
					
					<div class="form-group">
                        <label>Pemotongan</label>
                        <div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="cek_pemotongan">
						  <label class="form-check-label" for="inlineCheckbox1">Ya</label>
						</div>		
					</div>
					
					<div class="form-group">
                        <label>Akun Pajak Penjualan</label>
                        <select class="form-control form-control-sm" name="akun_pajak_penjualan">
						  <option>Small select</option>
						</select>	
					</div>
					
					<div class="form-group">
                        <label>Akun Pajak Pembelian</label>
                        <select class="form-control form-control-sm" name="akun_pajak_pembelian">
						  <option>Small select</option>
						</select>	
					</div>
            </div>
			
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>
-->
    <!-- Footer
    ================================================= -->
   
    
  <script>
$(function () {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "scrollX": true
        
    });
});

    
    $( ".target" ).change(function() {
        val = this.value;

        $.ajax({
            type: "get",
            url: "<?php echo base_url() ?>Masterer/supplier?val="+val,
            data:{},
            success: function(msg){
                window.location = "<?php echo base_url() ?>Masterer/supplier?val="+val;
            }
        })
    })





    $(document).ready(function(){
        $('.confirm_delete').on('click', function(){
            var delete_url = $(this).attr('data-url');
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

    $(document).on( "click", '.edit_button',function(e) {
        var id_gudang = $(this).data('id_gudang');
        var nama_gudang = $(this).data('nama_gudang');
        var alamat = $(this).data('alamat');
        var keterangan = $(this).data('keterangan');


        $(".id_gudang").val(id_gudang);
        $(".nama_gudang").val(nama_gudang);
        $(".alamat").val(alamat);
        $(".keterangan").val(keterangan);

    });


    $('.chosen-select').chosen({width: "100%"});
    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

</script>

 <script>
$(function () {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "scrollX": true
        
    });
});

    
    $( ".target" ).change(function() {
        val = this.value;

        $.ajax({
            type: "get",
            url: "<?php echo base_url() ?>Masterer/supplier?val="+val,
            data:{},
            success: function(msg){
                window.location = "<?php echo base_url() ?>Masterer/supplier?val="+val;
            }
        })
    })





    $(document).ready(function(){
        $('.confirm_delete').on('click', function(){
            var delete_url = $(this).attr('data-url');
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

    $(document).on( "click", '.edit_button',function(e) {
        var id_pajak = $(this).data('id_pajak');
        var nama = $(this).data('nama');
        var persentase_efektif = $(this).data('persentase_efektif');
        var status_pemotongan = $(this).data('status_pemotongan');
       

        $(".id_pajak").val(id_pajak);
        $(".nama").val(nama);
        $(".persentase_efektif").val(persentase_efektif);
        $(".status_pemotongan").val(status_pemotongan);

    });


    $('.chosen-select').chosen({width: "100%"});
    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

</script>

<script>
      
      function validasi()
    {

       
        var nama_pajak=document.forms["myform"]["nama_pajak"].value;
        var persentase_efektif=document.forms["myform"]["persentase_efektif"].value;
        
        
         if (nama_pajak==null || nama_pajak=="")
          {
           swal({
                title: "Peringatan",
                text: "Nama pajak tidak boleh kosong"
            });
          return false;
          };  

          if (kode_gudang==null || kode_gudang=="")
          {
           swal({
                title: "Peringatan",
                text: "Persentase Efektif tidak boleh kosong"
            });
          return false;
          };  

       
     }
    </script>

    <script>
      
      function validasiedit()
    {

        var nama_pajak=document.forms["myformedit"]["nama_pajak"].value;
        var persentase_efektif=document.forms["myformedit"]["persentase_efektif"].value;
        
         if (nama_pajak==null || nama_pajak=="")
          {
           swal({
                title: "Peringatan",
                text: "Nama  tidak boleh kosong"
            });
          return false;
          };  

          if (persentase_efektif==null || persentase_efektif=="")
          {
           swal({
                title: "Peringatan",
                text: "Persentase Efektif tidak boleh kosong"
            });
          return false;
          };  

       
    }
    </script>

<script>
 function validasiFile(){

    var inputFile = document.getElementById('filess');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.csv)$/i;
    if(!ekstensiOk.exec(pathFile)){
        /*
        alert('Silakan upload file yang memiliki ekstensi .csv');
        inputFile.value = '';
        return false;
        */

         swal({
                title: "Peringatan",
                text: "File harus mempunyai format .csv"
            });
          inputFile.value = '';
          return false;
          
    }else{
        //Pratinjau gambar
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('pratinjauGambar').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
}


</script>
 <script>
      
      function validasi_import()
    {


        var filess=document.forms["myform4"]["filess"].value;
        if (filess==null || filess=="")
          {
           swal({
                title: "Peringatan",
                text: "File .csv tidak boleh kosong"
            });
          return false;
          };  
       
     }
    </script>

    <script>
        $('.chosen').chosen();
    </script>