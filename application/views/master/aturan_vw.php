<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> Aturan Request</h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">

                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
                <a href="<?php echo base_url(); ?>masterer/aturan"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
               <br><br>
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                          <th width='5%' style="text-align:center;background:#AFEEEE;">No</th>
                            <th style="background:#AFEEEE">Nama Aturan</th>
                            <th style="background:#AFEEEE">Jenis Request</th>
                            <th style="background:#AFEEEE">Batas Atas</th>
                            <th style="background:#AFEEEE">Batas Bawah</th>
                            <th style="background:#AFEEEE">Status</th>
                            <th style="text-align:center;background:#AFEEEE" width="30%">Aksi</th>
                    </thead>
                    <tbody>
                   <?php
              $jumlah=count($aturan);

              ?>

              <?php if($jumlah > 0) { ?>
                        <?php
                        $no=$this->uri->segment('3') + 1;
                        foreach($aturan as $kat):?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $kat->nama_aturan; ?></td>
                                <td>
                                 <?php if($kat->id_jenis_request=='3'){
                                  echo "Barang";
                                 }else{
                                  echo $kat->jenis_request; 
                                }?></td>
                                <td><?php echo $kat->batas_bawah; ?></td>
                                <td><?php echo $kat->batas_atas; ?></td>
                                <td><?php echo $kat->status; ?></td>
                                <td align="center">
                                    <button type="button" class="btn btn-success btn-sm edit_button"
                                            data-toggle="modal" data-target="#EditModal"
                                            data-id_aturan="<?php echo $kat->id_aturan; ?>"
                                            data-nama_aturan="<?php echo $kat->nama_aturan;?>"
                                            data-batas_bawah="<?php echo $kat->batas_bawah;?>"
                                            data-batas_atas="<?php echo $kat->batas_atas;?>"
                                            data-status="<?php echo $kat->status;?>"
                                    ><i class="fa fa-pencil"></i>
                                        Ubah
                                    </button>


                                    <a href="#" data-url="<?php echo site_url('masterer/hapus_aturan/'.$kat->id_aturan);?>" class="btn btn-sm btn-info btn-sm confirm_delete"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Batas Harga</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_aturan">

                  <div class="form-group">
                        <label>Id Jenis Request</label>
                        <select class="form-control" name="id_jenis_request">
                          <option>Pilih Request</option>
                          <?php foreach($ambil_aturan as $am): ?>
                           <option value="<?php echo $am->id_jenis_request; ?>"><?php echo $am->jenis_request; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Aturan</label>
                        <input type="text" class="form-control" name="nama_aturan" placeholder="Nama Aturan" required oninvalid="this.setCustomValidity('Nama Aturan')" oninput="setCustomValidity('')">
                    </div>
          
          <div class="form-group">
                        <label>Batas Atas</label>
                        <input type="text" class="form-control" name="batas_atas" placeholder="Batas Atas" required oninvalid="this.setCustomValidity('Batas Atas')" oninput="setCustomValidity('')">
                    </div>
          
          <div class="form-group">
                        <label>Batas Bawah</label>
                        <input type="text" class="form-control" name="batas_bawah" placeholder="Batas Bawah" required oninvalid="this.setCustomValidity('Batas Bawah')" oninput="setCustomValidity('')">
                        <input type="hidden" class="form-control" name="status" value = "0">
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
                <h4 class="modal-title" id="myModalLabel">Edit Batas Harga</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_aturan">
                    <div class="form-group">
                        <label>Nama Aturan</label>
                        <input type="text" class="form-control nama_aturan" name="nama_aturan" placeholder="Nama Aturan" required oninvalid="this.setCustomValidity('Nama Aturan')" oninput="setCustomValidity('')">
                        <input type="hidden" class="form-control id_aturan" name="id_aturan">
                    </div>
          
          <div class="form-group">
                        <label>Batas Atas</label>
                        <input type="text" class="form-control batas_atas" name="batas_atas" placeholder="Batas Atas" required oninvalid="this.setCustomValidity('Batas Atas')" oninput="setCustomValidity('')">
                    </div>
          
          <div class="form-group">
                        <label>Batas Bawah</label>
                        <input type="text" class="form-control batas_bawah" name="batas_bawah" placeholder="Batas Bawah" required oninvalid="this.setCustomValidity('Batas Bawah')" oninput="setCustomValidity('')">
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
            url: "<?php echo base_url() ?>Masterer/aturan?val="+val,
            data:{},
            success: function(msg){
                window.location = "<?php echo base_url() ?>Masterer/aturan?val="+val;
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
        var id_aturan = $(this).data('id_aturan');
        var nama_aturan = $(this).data('nama_aturan');
        var batas_atas = $(this).data('batas_atas');
        var batas_bawah = $(this).data('batas_bawah');


        $(".id_aturan").val(id_aturan);
        $(".nama_aturan").val(nama_aturan);
        $(".batas_atas").val(batas_atas);
        $(".batas_bawah").val(batas_bawah);

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
