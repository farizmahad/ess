<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> Data Jabatan</h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">

                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
                <a href="<?php echo base_url(); ?>masterer/jabatan"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
               <br><br>
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                          <th width='5%' style="text-align:center;background:#AFEEEE;">No</th>
                            <th style="background:#AFEEEE">Nama Jabatan</th>
                            <th style="text-align:center;background:#AFEEEE" width="30%">Aksi</th>
                    </thead>
                    <tbody>
                    <?php
              $jumlah=count($jabatan);

              ?>

              <?php if($jumlah > 0) { ?>
                        <?php
                        $no=$this->uri->segment('3') + 1;
                        foreach($jabatan as $kat):?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $kat->nama_jabatan; ?></td>
                                <td align="center">
                                    <button type="button" class="btn btn-success btn-sm edit_button"
                                            data-toggle="modal" data-target="#EditModal"
                                            data-id_jabatan="<?php echo $kat->id_jabatan; ?>"
                                            data-nama_jabatan="<?php echo $kat->nama_jabatan;?>"
                                    >
                                        Ubah
                                    </button>


                                    <a href="#" data-url="<?php echo site_url('masterer/hapus_jabatan/'.$kat->id_jabatan);?>" class="btn btn-sm btn-info btn-sm confirm_delete"> Hapus</a>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Jabatan</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_jabatan">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" class="form-control" name="nama_jabatan" placeholder="Nama Jabatan" required oninvalid="this.setCustomValidity('Nama Jabatan')" oninput="setCustomValidity('')">
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
                <h4 class="modal-title" id="myModalLabel">Edit Jabatan</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_jabatan">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" class="form-control nama_jabatan" name="nama_jabatan" placeholder="Nama Jabatan" required oninvalid="this.setCustomValidity('Nama Jabatan')" oninput="setCustomValidity('')">
                        <input type="hidden" class="form-control id_jabatan" name="id_jabatan">
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
            url: "<?php echo base_url() ?>Masterer/jabatan?val="+val,
            data:{},
            success: function(msg){
                window.location = "<?php echo base_url() ?>Masterer/jabatan?val="+val;
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
        var id_jabatan = $(this).data('id_jabatan');
        var nama_jabatan = $(this).data('nama_jabatan');


        $(".id_jabatan").val(id_jabatan);
        $(".nama_jabatan").val(nama_jabatan);

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
