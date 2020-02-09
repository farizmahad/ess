<div class="col-lg-9">
      <h5 class="grey"> <strong> Daftar Lainnya </strong> </h5>
      <h4 class="grey"><i class="fa fa-list"></i> <strong> Daftar Gudang </strong> </h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
			  <div class="post-container">
              <div class="table-responsive-lg">

                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Buat Gudang Baru </button>
                <!--
				<a href="<?php echo base_url(); ?>masterer/supplier"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
				-->
                <a href="<?php echo base_url(); ?>masterer/export_gudang"><button type="button" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-upload"></i> Eksport CSV</button></a>
                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModalimport"><i class="fa fa-download"></i> Import CSV</button>
			   <br>
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                          <th width='5%' style="text-align:center;background:#AFEEEE;">No</th>
                            <th style="background:#AFEEEE">Nama Gudang</th>
                            <th style="background:#AFEEEE">Kode</th>
                            <th style="background:#AFEEEE">Alamat</th>
                            <th style="background:#AFEEEE">Keterangan</th>
                            <th style="text-align:center;background:#AFEEEE" width="30%">Aksi</th>
                    </thead>
                    <tbody>
                        <!--
						
						<tr>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> 
								<a href="<?php echo base_url(); ?>masterer/lihat_gudang" class="btn btn-sm btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i> </a>
							</td>
						</tr>
                    -->
						<?php
							$jumlah=count($gudang);?>

							<?php if($jumlah > 0) { ?>
								<?php
								$no=$this->uri->segment('3') + 1;
								foreach($gudang as $kat):?>
									<tr>
										<td align="center"><?php echo $no++; ?></td>
										<td><?php echo $kat->nama; ?></td>
										<td><?php echo $kat->kode; ?></td>
										<td><?php echo $kat->alamat; ?></td>
                                        <td><?php echo $kat->keterangan; ?></td>
										<td align="center">
											<button type="button" class="btn btn-success btn-sm edit_button"
													data-toggle="modal" data-target="#EditModal"
													data-id_gudang="<?php echo $kat->id; ?>"
													data-nama_gudang="<?php echo $kat->nama;?>"
                                                    data-kode_gudang="<?php echo $kat->kode;?>"
													data-alamat="<?php echo $kat->alamat;?>"
													data-keterangan="<?php echo $kat->keterangan;?>"
											> <i class="fa fa-pencil" aria-hidden="true"></i>
												Ubah
											</button>


											<a href="#" data-url="<?php echo site_url('masterer/hapus_gudang/'.$kat->id);?>" class="btn btn-sm btn-danger btn-sm confirm_delete"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </a>
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
                <h4 class="modal-title" id="myModalLabel">Buat Gudang Baru</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_gudang" id="myform" onSubmit="return validasi()">
                    <div class="form-group">
                        <label>* Nama</label>
                        <input type="text" class="form-control" name="nama_gudang" placeholder="Nama Gudang" id="nama_gudang">
                    </div>
					
					<div class="form-group">
                        <label>Kode Gudang</label>
                        <input type="text" class="form-control" name="kode_gudang" placeholder="Kode Gudang" id="kode_gudang">
                    </div>
					
					<div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" name="alamat">
                    </div>
					
					<div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" name="keterangan">
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
                <h4 class="modal-title" id="myModalLabel">Edit Gudang</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_gudang" id="myformedit" onSubmit="return validasiedit()">
                    <div class="form-group">
                        <label>* Nama</label>
                        <input type="text" class="form-control nama_gudang" name="nama_gudang" placeholder="Nama Gudang" id="nama_gudang">
                        <input type="hidden" class="form-control id_gudang" name="id_gudang">
                    </div>
					
					<div class="form-group">
                        <label>Kode Gudang</label>
                        <input type="text" class="form-control kode_gudang" name="kode_gudang" placeholder="Kode Gudang" id="kode_gudang">
                        
                    </div>
					
					<div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat" id="alamat">
                       
                    </div>
					
					<div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control keterangan" name="keterangan" placeholder="Keterangan">
                        
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


<div class="modal fade" id="myModalimport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Gudang  CSV</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/import_gudang" enctype="multipart/form-data" id="myform4" onSubmit="return validasi_import()">
                   
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
        var kode_gudang = $(this).data('kode_gudang');


        $(".id_gudang").val(id_gudang);
        $(".nama_gudang").val(nama_gudang);
        $(".alamat").val(alamat);
        $(".keterangan").val(keterangan);
        $(".kode_gudang").val(kode_gudang);

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

       
        var nama_gudang=document.forms["myform"]["nama_gudang"].value;
        var kode_gudang=document.forms["myform"]["kode_gudang"].value;
        var alamat=document.forms["myform"]["alamat"].value;
        var keterangan=document.forms["myform"]["keterangan"].value;
        
         if (nama_gudang==null || nama_gudang=="")
          {
           swal({
                title: "Peringatan",
                text: "Nama gudang tidak boleh kosong"
            });
          return false;
          };  

          if (kode_gudang==null || kode_gudang=="")
          {
           swal({
                title: "Peringatan",
                text: "Kode gudang tidak boleh kosong"
            });
          return false;
          };  

       
     }
    </script>

    <script>
      
      function validasiedit()
    {

          var nama_gudang=document.forms["myformedit"]["nama_gudang"].value;
        var kode_gudang=document.forms["myformedit"]["kode_gudang"].value;
        var alamat=document.forms["myformedit"]["alamat"].value;
        var keterangan=document.forms["myformedit"]["keterangan"].value;
        
         if (nama_gudang==null || nama_gudang=="")
          {
           swal({
                title: "Peringatan",
                text: "Nama gudang tidak boleh kosong"
            });
          return false;
          };  

          if (kode_gudang==null || kode_gudang=="")
          {
           swal({
                title: "Peringatan",
                text: "Kode gudang tidak boleh kosong"
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



