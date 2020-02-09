<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> <strong> Master Produk</strong> </h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
			  <div class="post-container">
				
              <div class="table-responsive-lg">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Buat Produk Baru </button>
                <!--
				<a href="<?php echo base_url(); ?>masterer/supplier"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
				-->
                <a href="<?php echo base_url(); ?>Masterer/export_produk"><button type="button" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-upload"></i> Eksport CSV</button></a>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModalimport"><i class="fa fa-download"></i> Buat Produk Baru CSV</button>
			   <br>
                <table class="table table-striped table-hover" id="example2">
                    <thead>
						<th width='5%' style="text-align:center;background:#AFEEEE;">No</th>
						<th style="background:#AFEEEE">Kode </th>
						<th style="background:#AFEEEE">Nama </th>
						<th style="background:#AFEEEE">Kuantitas</th>
						<th style="background:#AFEEEE">Satuan</th>
						<th style="background:#AFEEEE">Harga Beli</th>
						<th style="background:#AFEEEE">Harga Jual</th>
                         <!--
						<th style="background:#AFEEEE">Nama Pajak Beli</th>
						<th style="background:#AFEEEE">Nama Pajak Jual</th>
                    -->
						<th style="background:#AFEEEE">Kategori Produk</th>
                        <!--
						<th style="background:#AFEEEE">Nama Produk</th>
                    -->
						<th style="text-align:center;background:#AFEEEE">Aksi</th>
                    </thead>
                    <tbody>
						<?php
                         $no=1;
                         foreach($produk as $row):?>
						<tr>
							<td align="center"><?php echo $no++; ?></td>
							<td><?php echo $row->kode_produk; ?></td>
							<td><?php echo $row->nama_barang; ?></td>
							<td><?php echo $row->qty; ?></td>
							<td><?php echo $row->unit; ?></td>
							<td><?php echo $row->harga_beli; ?></td>
							<td><?php echo $row->harga_jual; ?></td>
                            <!--
							<td><?php echo $row->nama_pajak_beli; ?></td>
							<td><?php echo $row->nama_pajak_jual; ?></td>
                        -->
							<td><?php echo $row->kategori_produk; ?></td>
							
							<td> 
                                <!--
								<a href="<?php echo base_url(); ?>masterer/lihat_gudang" class="btn btn-sm btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i> </a>
                            -->
								<button type="button" class="btn btn-info btn-sm edit_button" data-toggle="modal" data-target="#EditModal" 
                                data-id_barang="<?php echo $row->id_barang; ?>"
                                data-kode_produk="<?php echo $row->kode_produk; ?>"
                                data-nama_barang="<?php echo $row->nama_barang; ?>"
                                data-qty="<?php echo $row->qty; ?>"
                                data-unit="<?php echo $row->unit; ?>"
                                data-harga_beli="<?php echo $row->harga_beli; ?>"
                                data-harga_jual="<?php echo $row->harga_jual; ?>"
                                data-kategori_produk="<?php echo $row->kategori_produk; ?>"
                                > Ubah</button>
								<a href="<?php echo base_url(); ?>masterer/hapus_produk/<?php echo $row->id_barang; ?>" class="btn btn-sm btn-danger btn-sm confirm_delete">Hapus </a>
							</td>
						</tr>
                    <?php endforeach; ?>
						
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
                <h4 class="modal-title" id="myModalLabel">Buat Produk Baru</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_produk" id="myform" onSubmit="return validasi()">
                    <div class="form-group col-lg-12">
                        <label>Kode</label>
                        <input type="text" class="form-control" name="kode_produk" placeholder="Kode" id="kode_produk">
                    </div>
					
					<div class="form-group col-lg-12">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama" id="nama_barang">
                    </div>
					
					<div class="form-group col-lg-6">
                        <label>Kuantitas</label>
                        <input type="number" class="form-control" name="qty" placeholder="Kuantitas" id="qty">
                    </div>
					
					<div class="form-group col-lg-6">
                        <label>Satuan</label>
                        <input type="text" class="form-control" name="unit" placeholder="Satuan" id="unit">
                    </div>
					
					<div class="form-group col-lg-6">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" placeholder="Harga Beli" id="harga_beli">
                    </div>
					
					<div class="form-group col-lg-6">
                        <label>Harga Jual</label>
                        <input type="text" class="form-control" name="harga_jual" placeholder="Harga Jual" id="harga_jual">
                    </div>
					<!--
					<div class="form-group col-lg-6">
                        <label>Nama Pajak Beli</label>
                        <input type="text" class="form-control" name="nama_pajak_beli" placeholder="Nama Pajak Beli" required oninvalid="this.setCustomValidity('Nama Pajak Beli')" oninput="setCustomValidity('')">
                    </div>
					
					<div class="form-group col-lg-6">
                        <label>Nama Pajak Jual</label>
                        <input type="text" class="form-control" name="nama_pajak_jual" placeholder="Nama Pajak Jual" required oninvalid="this.setCustomValidity('Nama Pajak Jual')" oninput="setCustomValidity('')">
                    </div>
                -->
					
					<div class="form-group col-lg-12">
                        <label>Kategori Produk</label>
                        <select class="form-control" name="kategori_produk" id="kategori_produk">
                            <?php foreach($kategori_produk as $dow): ?>
                            <option value="<?php echo $dow->nama_kategori; ?>">
                                   <?php echo $dow->nama_kategori; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
					<!--
					<div class="form-group col-lg-12">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required oninvalid="this.setCustomValidity('Nama Produk')" oninput="setCustomValidity('')">
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
                <h4 class="modal-title" id="myModalLabel">Buat Produk Baru</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_produk" id="myform" onSubmit="return validasi2()">
                    <div class="form-group col-lg-12">
                        <label>Kode</label>
                        <input type="hidden" name="id_barang" class="id_barang">
                        <input type="text" class="form-control kode_produk" name="kode_produk" placeholder="Kode" id="kode_produk">
                    </div>
                    
                    <div class="form-group col-lg-12">
                        <label>Nama</label>
                        <input type="text" class="form-control nama_barang" name="nama_barang" placeholder="Nama" id="nama_barang">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Kuantitas</label>
                        <input type="number" class="form-control qty" name="qty" placeholder="Kuantitas" id="qty">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Satuan</label>
                        <input type="text" class="form-control unit" name="unit" placeholder="Satuan" id="unit">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control harga_beli" name="harga_beli" placeholder="Harga Beli" id="harga_beli">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Harga Jual</label>
                        <input type="text" class="form-control harga_jual" name="harga_jual" placeholder="Harga Jual" id="harga_jual">
                    </div>
                    <!--
                    <div class="form-group col-lg-6">
                        <label>Nama Pajak Beli</label>
                        <input type="text" class="form-control" name="nama_pajak_beli" placeholder="Nama Pajak Beli" required oninvalid="this.setCustomValidity('Nama Pajak Beli')" oninput="setCustomValidity('')">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Nama Pajak Jual</label>
                        <input type="text" class="form-control" name="nama_pajak_jual" placeholder="Nama Pajak Jual" required oninvalid="this.setCustomValidity('Nama Pajak Jual')" oninput="setCustomValidity('')">
                    </div>
                -->
                    
                    <div class="form-group col-lg-12">
                        <label>Kategori Produk</label>
                        <select class="form-control kategori_produk" name="kategori_produk" id="kategori_produk">
                            <?php foreach($kategori_produk as $dow): ?>
                            <option value="<?php echo $dow->nama_kategori; ?>">
                                   <?php echo $dow->nama_kategori; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-lg-12">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required oninvalid="this.setCustomValidity('Nama Produk')" oninput="setCustomValidity('')">
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


<div class="modal fade" id="myModalimport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Produk  CSV</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/import_produk" enctype="multipart/form-data" id="myform" onSubmit="return validasi_import()">
                   
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
      
      function validasi()
    {

        var kode_produk=document.forms["myform"]["kode_produk"].value;
        var nama_barang=document.forms["myform"]["nama_barang"].value;
        var qty=document.forms["myform"]["qty"].value;
        var unit=document.forms["myform"]["unit"].value;
        var harga_beli=document.forms["myform"]["harga_beli"].value;
        var harga_jual=document.forms["myform"]["harga_jual"].value;
        var kategori_produk=document.forms["myform"]["kategori_produk"].value;

       


        if (kode_produk==null || kode_produk=="")
          {
           swal({
                title: "Peringatan",
                text: "Kode tidak boleh kosong"
            });
          return false;
          };  


         if (nama==null || nama=="")
          {
           swal({
                title: "Peringatan",
                text: "Nama tidak boleh kosong"
            });
          return false;
          };  

          if (qty==null || qty=="")
          {
           swal({
                title: "Peringatan",
                text: "Kuantitas tidak boleh kosong"
            });
          return false;
          };  

          if (unit==null || unit=="")
          {
           swal({
                title: "Peringatan",
                text: "Satuan tidak boleh kosong"
            });
          return false;
          };  

           if (harga_beli==null || harga_beli=="")
          {
           swal({
                title: "Peringatan",
                text: "Harga beli tidak boleh kosong"
            });
          return false;
          };  

           if (harga_jual==null || harga_jual=="")
          {
           swal({
                title: "Peringatan",
                text: "Harga jual tidak boleh kosong"
            });
          return false;
          }; 

            if (kategori_produk==null || kategori_produk=="")
          {
           swal({
                title: "Peringatan",
                text: "Kategori tidak boleh kosong"
            });
          return false;
          };   
       
     }
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

    $(document).on( "click", '.edit_button',function(e) {
        var id_barang       = $(this).data('id_barang');
        var kode_produk     = $(this).data('kode_produk');
        var nama_barang     = $(this).data('nama_barang');
        var qty             = $(this).data('qty');
        var unit            = $(this).data('unit');
        var harga_beli      = $(this).data('harga_beli');
        var harga_jual      = $(this).data('harga_jual');
        var kategori_produk = $(this).data('kategori_produk');


        $(".id_barang").val(id_barang);
        $(".kode_produk").val(kode_produk);
        $(".nama_barang").val(nama_barang);
        $(".qty").val(qty);
        $(".unit").val(unit);
        $(".harga_beli").val(harga_beli);
        $(".harga_jual").val(harga_jual);
        $(".kategori_produk").val(kategori_produk);

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
      
      function validasi2()
    {

       
        var nama_barang=document.forms["myform2"]["nama_barang"].value;
        var qty=document.forms["myform2"]["qty"].value;
        var unit=document.forms["myform2"]["unit"].value;
        var harga_beli=document.forms["myform2"]["harga_beli"].value;
        var harga_jual=document.forms["myform2"]["harga_jual"].value;
        var kategori_produk=document.forms["myform2"]["kategori_produk"].value;

       


        


         if (nama==null || nama=="")
          {
           swal({
                title: "Peringatan",
                text: "Nama tidak boleh kosong"
            });
          return false;
          };  

          if (qty==null || qty=="")
          {
           swal({
                title: "Peringatan",
                text: "Kuantitas tidak boleh kosong"
            });
          return false;
          };  

          if (unit==null || unit=="")
          {
           swal({
                title: "Peringatan",
                text: "Satuan tidak boleh kosong"
            });
          return false;
          };  

           if (harga_beli==null || harga_beli=="")
          {
           swal({
                title: "Peringatan",
                text: "Harga beli tidak boleh kosong"
            });
          return false;
          };  

           if (harga_jual==null || harga_jual=="")
          {
           swal({
                title: "Peringatan",
                text: "Harga jual tidak boleh kosong"
            });
          return false;
          }; 

            if (kategori_produk==null || kategori_produk=="")
          {
           swal({
                title: "Peringatan",
                text: "Kategori tidak boleh kosong"
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

        var filess=document.forms["myform"]["filess"].value;
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


