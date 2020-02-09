<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> Divisi</h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">

                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
                <a href="<?php echo base_url(); ?>masterer/divisi"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
               <br><br>
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
                            <th width='5%' style="text-align:center;background:#AFEEEE;">No</th>
                            <th style="background:#AFEEEE">Nama Divisi</th>
                            <th style="text-align:center;background:#AFEEEE" width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
              $jumlah=count($divisi);

              ?>

              <?php if($jumlah > 0) { ?>
                        <?php
                        $no=$this->uri->segment('3') + 1;
                        foreach($divisi as $kat):?>
                            <tr>
                                <td align="center" width="5%"><?php echo $no++; ?></td>
                                <td><?php echo $kat->nama_divisi; ?></td>
                                <td align="center" width="30%">
                                    <button type="button" class="btn btn-success btn-sm edit_button"
                                            data-toggle="modal" data-target="#EditModal"
                                            data-id_divisi="<?php echo $kat->id_divisi; ?>"
                                            data-nama_divisi="<?php echo $kat->nama_divisi;?>"
                                    ><i class="fa fa-pencil"></i>
                                        Ubah
                                    </button>


                                    <a href="#" data-url="<?php echo site_url('masterer/hapus_divisi/'.$kat->id_divisi);?>" class="btn btn-sm btn-info btn-sm confirm_delete"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
            <?php }else{ ?>
              <td colspan="4" align="center">Tidak ada data!</td>
              <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="7" align="center">
                <?php
                  if($link){
                  echo $link;
                  }
                ?>
                            </td>
                        </tr>
                      </tfoot>

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
                <h4 class="modal-title" id="myModalLabel">Tambah Divisi</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_divisi">
                    <div class="form-group">
                        <label>Nama Divisi</label>
                        <input type="text" class="form-control" name="nama_divisi" placeholder="Nama Divisi" required oninvalid="this.setCustomValidity('Nama Divisi')" oninput="setCustomValidity('')">
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
                <h4 class="modal-title" id="myModalLabel">Edit Divisi</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_divisi">
                    <div class="form-group">
                        <label>Nama Divisi</label>
                        <input type="text" class="form-control nama_divisi" name="nama_divisi" placeholder="Nama Divisi" required oninvalid="this.setCustomValidity('Nama Divisi')" oninput="setCustomValidity('')">
                        <input type="hidden" class="form-control id_divisi" name="id_divisi">
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
        var id_divisi = $(this).data('id_divisi');
        var nama_divisi = $(this).data('nama_divisi');


        $(".id_divisi").val(id_divisi);
        $(".nama_divisi").val(nama_divisi);

    });


  </script>