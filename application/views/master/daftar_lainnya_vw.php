<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> Data Lainnya </h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
				<div class="post-container">
					<div class="row">
						<div class="col-lg-6">
							<div class="block-title">
							  <h4 class="grey"><a href="<?php echo base_url(); ?>Masterer/syarat_pembayaran">Syarat Pembayaran</a></h4>
							  
							  <p class="text-justify"> 
								Menampilkan daftar syarat pembayaran yang menentukan tanggal jatuh tempo untuk pelanggan
								atau dari supplier. Dari sini Anda dapat membuat syarat pembayaran baru dan mengubah atau menghapusnya.	
							  </p>
							  <div class="line"></div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-6">
							<div class="block-title">
							  <h4 class="grey"><a href="<?php echo base_url(); ?>Masterer/gudang">Daftar Gudang</a></h4>
							  
							  <p class="text-justify"> 
								Daftar Semua Gudang Dalam Perusahaan.	
							  </p>
							  <div class="line"></div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-6">
							<div class="block-title">
							  <h4 class="grey"><a href="<?php echo base_url(); ?>Masterer/pajak">Pajak</a></h4>
							 
							  <p class="text-justify"> 
								Menampilkan tipe-tipe pajak yang Anda pakai untuk penjualan kepada pelanggan atau pembelian dari supplier.	
							  </p>
							  <div class="line"></div>
							</div>
						</div>
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
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_supplier">
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



<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Supplier</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_supplier">
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
