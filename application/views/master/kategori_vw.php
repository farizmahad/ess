<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i>Kategori</h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">

                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
                <a href="<?php echo base_url(); ?>masterer/mst_jenis_request"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
               <br><br>
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
                            <th width='20%' style="text-align:center;background:#AFEEEE;">No</th>
                            <th style="background:#AFEEEE">Kategori</th>
                            <th style="background:#AFEEEE">PIC</th>
                            <th style="background:#AFEEEE;text-align:center;" width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                       $no=1;
                       foreach($kategori as $row):
                        ?>

                        <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td><?php echo $row->nama_kategori; ?></td>
                            <td><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></td>
                            <td align="center">
                                <button type="button" class="btn btn-success btn-sm edit_button"
                                            data-toggle="modal" data-target="#EditModal"
                                            data-id_kategori="<?php echo $row->id_kategori; ?>"
                                            data-id_user="<?php echo $row->id_user;?>"
                                            data-nama_kategori="<?php echo $row->nama_kategori;?>"
                                    >
                                        Ubah
                                    </button>
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


    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Jenis Request</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
        <form method="post" action="<?php echo base_url();?>Masterer/simpan_jenis_request">
                            <div class="form-group">
                                <label>Jenis Request</label>
                                 
                        <input type="text" class="form-control" name="jenis_request" placeholder="Jenis Request" required oninvalid="this.setCustomValidity('Jenis Request')" oninput="setCustomValidity('')">

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                        <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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
                <h4 class="modal-title" id="myModalLabel">Edit Jenis Request</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_jenis_request">
                    <div class="form-group">
                        <label>Jenis Request</label>
                        <input type="text" class="form-control jenis_request" name="jenis_request" placeholder="Jenis Request" required oninvalid="this.setCustomValidity('Jenis Request')" oninput="setCustomValidity('')">
                        <input type="hidden" class="form-control id_jenis_request" name="id_jenis_request">
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


  $(document).on( "click", '.edit_button',function(e) {
        var id_jenis_request = $(this).data('id_jenis_request');
        var jenis_request = $(this).data('jenis_request');


        $(".id_jenis_request").val(id_jenis_request);
        $(".jenis_request").val(jenis_request);

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

  </script>