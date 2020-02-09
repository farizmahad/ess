<div class="col-lg-9">
      <h5 class="grey"> <strong> Daftar Lainnya </strong> </h5>
      <h4 class="grey"><i class="fa fa-list"></i> <strong> Syarat Pembayaran </strong> </h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">

                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Buat Syarat Pembayaran</button>
                <!--
				<a href="<?php echo base_url(); ?>masterer/supplier"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
				-->
                <a href="<?php echo base_url(); ?>masterer/export_syarat_pembayaran"><button type="button" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-upload"></i> Eksport CSV</button></a>
              


                 <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModalimport"><i class="fa fa-download"></i> Import CSV</button>
			   <br>
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                          <th width='5%' style="text-align:center;background:#AFEEEE;">No</th>
                            <th style="background:#AFEEEE">Nama</th>
                            <th style="background:#AFEEEE">Jangka Waktu</th>
                            <th style="text-align:center;background:#AFEEEE" width="30%">Aksi</th>
                    </thead>
                    <tbody>
						<?php
							$jumlah=count($syarat_pembayaran);?>

							<?php if($jumlah > 0) { ?>
								<?php
								$no=$this->uri->segment('3') + 1;
								foreach($syarat_pembayaran as $kat):?>
									<tr>
										<td align="center"><?php echo $no++; ?></td>
										<td><?php echo $kat->nama_syarat_pembayaran; ?></td>
										<td><?php echo $kat->jangka_waktu; ?> hari</td>
										
										<td align="center">
											<button type="button" class="btn btn-success btn-sm edit_button"
													data-toggle="modal" data-target="#EditModal"
													data-id_syarat_pembayaran="<?php echo $kat->id; ?>"
													data-nama_syarat_pembayaran="<?php echo $kat->nama_syarat_pembayaran;?>"
													data-jangka_waktu="<?php echo $kat->jangka_waktu;?>"
													
											> <i class="fa fa-pencil" aria-hidden="true"></i>
												Ubah
											</button>


											<a href="#" data-url="<?php echo site_url('masterer/hapus_syarat_pembayaran/'.$kat->id);?>" class="btn btn-sm btn-danger btn-sm confirm_delete"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </a>
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
                <h4 class="modal-title" id="myModalLabel">Buat Syarat Pembayaran</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_syarat_pembayaran" id="myform" onSubmit="return validasi()">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_syarat_pembayaran" placeholder="Nama Syarat Pembuatan" id="nama_syarat_pembayaran" >
                    </div>
					
					<div class="form-group">
                        <label>Jangka Waktu</label>
                        <input type="text" class="form-control" name="jangka_waktu" placeholder="Jangka Waktu" id="jangka_waktu">
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



<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Syarat Pembayaran</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_syarat_pembayaran"  id="myformedit" onSubmit="return validasiedit()">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama_syarat_pembayaran" name="nama_syarat_pembayaran" placeholder="Nama Syarat Pembuatan">

                        <input type="hidden" class="form-control id_syarat_pembayaran" name="id_syarat_pembayaran">
                    </div>
					
					<div class="form-group">
                        <label>Jangka Waktu</label>
                        <input type="text" class="form-control jangka_waktu" name="jangka_waktu" placeholder="Jangka Waktu">
                        
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Perbaharui&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>
    <!-- Footer
    ================================================= -->
   

<div class="modal fade" id="myModalimport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Syarat Pembayaran  CSV</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/import_syarat_pembayaran" enctype="multipart/form-data" id="myform4" onSubmit="return validasi_import()">
                   
                    <div class="form-group">
                        <label>Pilih File</label>
                        <input type="file" name="file" class="form-control" id="filess" onchange="validasiFile()">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Import&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>


    
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
        var id_syarat_pembayaran = $(this).data('id_syarat_pembayaran');
        var nama_syarat_pembayaran = $(this).data('nama_syarat_pembayaran');
        var jangka_waktu = $(this).data('jangka_waktu');


        $(".id_syarat_pembayaran").val(id_syarat_pembayaran);
        $(".nama_syarat_pembayaran").val(nama_syarat_pembayaran);
        $(".jangka_waktu").val(jangka_waktu);

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

       
        var nama_syarat_pembayaran=document.forms["myform"]["nama_syarat_pembayaran"].value;
        var jangka_waktu=document.forms["myform"]["jangka_waktu"].value;
        
         if (nama_syarat_pembayaran==null || nama_syarat_pembayaran=="")
          {
           swal({
                title: "Peringatan",
                text: "Nama syarat pembayaran tidak boleh kosong"
            });
          return false;
          };  

          if (jangka_waktu==null || jangka_waktu=="")
          {
           swal({
                title: "Peringatan",
                text: "Jangka Waktu tidak boleh kosong"
            });
          return false;
          };  

       
     }
    </script>

    <script>
      
      function validasiedit()
    {

       
        var nama_syarat_pembayaran=document.forms["myformedit"]["nama_syarat_pembayaran"].value;
        var jangka_waktu=document.forms["myformedit"]["jangka_waktu"].value;
        
         if (nama_syarat_pembayaran==null || nama_syarat_pembayaran=="")
          {
           swal({
                title: "Peringatan",
                text: "Nama syarat pembayaran tidak boleh kosong"
            });
          return false;
          };  

          if (jangka_waktu==null || jangka_waktu=="")
          {
           swal({
                title: "Peringatan",
                text: "Jangka Waktu tidak boleh kosong"
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


