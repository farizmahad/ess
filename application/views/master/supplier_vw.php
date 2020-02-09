<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> Data Supplier</h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">

               <div class="table-responsive-lg">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Supplier </button>
                <!--
                <a href="<?php echo base_url(); ?>masterer/supplier"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
                -->
                
                <a href="<?php echo base_url(); ?>masterer/export_supplier"><button type="button" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-upload"></i> Eksport CSV</button></a>
            

            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModalimport"><i class="fa fa-download"></i> Tambah Supplier CSV</button>
<!--
                <a href="<?php echo base_url(); ?>masterer/supplier"><button type="button" class="btn btn-sm btn-warning" data-toggle="modal"><i class="fa fa-download"></i> Import Excel</button></a>
               <br>
           -->
                
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                          <th width='5%' style="text-align:center;background:#AFEEEE;">No</th>
                            <th style="background:#AFEEEE">Nama Supplier</th>
                            <th style="background:#AFEEEE">Alamat Supplier</th>
                            <th style="background:#AFEEEE">Email Supplier</th>
                            <th style="text-align:center;background:#AFEEEE" width="30%">Aksi</th>
                    </thead>
                    <tbody>
                    <?php
              $jumlah=count($supplier);

              ?>

              <?php if($jumlah > 0) { ?>
                        <?php
                        $no=$this->uri->segment('3') + 1;
                        foreach($supplier as $kat):?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $kat->nama_supplier; ?></td>
                                <td><?php echo $kat->alamat_supplier; ?></td>
                                <td><?php echo $kat->email; ?></td>
                                <td align="center">
                                    <button type="button" class="btn btn-success btn-sm edit_button"
                                            data-toggle="modal" data-target="#EditModal"
                                            data-id_supplier="<?php echo $kat->id_supplier; ?>"
                                            data-nama_supplier="<?php echo $kat->nama_supplier;?>"
                                            data-alamat_supplier="<?php echo $kat->alamat_supplier;?>"
                                            data-email="<?php echo $kat->email;?>"
                                    >
                                        Ubah
                                    </button>


                                    <a href="#" data-url="<?php echo site_url('masterer/hapus_supplier/'.$kat->id_supplier);?>" class="btn btn-sm btn-info btn-sm confirm_delete"> Hapus </a>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Supplier</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_supplier"
                      enctype="multipart/form-data"
                    >
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" name="nama_supplier" placeholder="Nama Supplier" required oninvalid="this.setCustomValidity('Nama Supplier')" oninput="setCustomValidity('')">
                    </div>
					
					<div class="form-group">
                        <label>Alamat Supplier</label>
                        <input type="text" class="form-control" name="alamat_supplier" placeholder="Alamat Supplier" required oninvalid="this.setCustomValidity('Alamat Supplier')" oninput="setCustomValidity('')">
                    </div>
					
					<div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email')" oninput="setCustomValidity('')">
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



  <div class="modal fade" id="myModalimport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Supplier by CSV</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/import_supplier" enctype="multipart/form-data" id="myform" onSubmit="return validasi()">
                   
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

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Supplier</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_supplier" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control nama_supplier" name="nama_supplier" placeholder="Nama Supplier" required oninvalid="this.setCustomValidity('Nama Supplier')" oninput="setCustomValidity('')">
                        <input type="hidden" class="form-control id_supplier" name="id_supplier">
                    </div>
					
					<div class="form-group">
                        <label>Alamat Supplier</label>
                        <input type="text" class="form-control alamat_supplier" name="alamat_supplier" placeholder="Alamat Supplier" required oninvalid="this.setCustomValidity('Alamat Supplier')" oninput="setCustomValidity('')">
                        
                    </div>
					
					<div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email')" oninput="setCustomValidity('')">
                       
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
        var id_supplier = $(this).data('id_supplier');
        var nama_supplier = $(this).data('nama_supplier');
        var alamat_supplier = $(this).data('alamat_supplier');
        var email = $(this).data('email');


        $(".id_supplier").val(id_supplier);
        $(".nama_supplier").val(nama_supplier);
        $(".alamat_supplier").val(alamat_supplier);
        $(".email").val(email);

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
      
      function validasi()
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
