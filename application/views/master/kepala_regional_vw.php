<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> Pengaturan Kepala Regional</h4>
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">

               
                <a href="<?php echo base_url(); ?>masterer/kepala_regional"><button type="button" class="btn btn-sm btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>
               <br><br>
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                          <th width='5%' style="text-align:center;background:#AFEEEE;">No</th>
                            <th style="background:#AFEEEE">Toko</th>
                            <th style="background:#AFEEEE">Kepala Regional</th>
                            <th style="background:#AFEEEE">Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                         $no=1;
                         foreach($divisi as $us):?>
                        <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td><?php echo $us->nama_divisi; ?></td>
                            <td>
                                <!--
                               <select class="form-control targett" name="id_kacab_regional"> 
                                   
                                   <?php foreach($kepala_regional as $row):?>
                                      <option <?php if($us->id_kacab_regional==$row->id_user){ ?> selected <?php } ?> value="<?php echo $row->id_user; ?>|<?php echo $row->id_divisi; ?>"><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></option>
                                   <?php endforeach; ?>
                               </select>
                           -->
                           <?php echo $us->first_name; ?>    <?php echo $us->last_name; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm edit_button"
                                            data-toggle="modal" data-target="#EditModal"
                                            data-id_divisi="<?php echo $us->id_divisi_baru; ?>"
                                            data-nama_divisi="<?php echo $us->nama_divisi;?>"
                                            data-id_kacab_regional="<?php echo $us->id_kacab_regional;?>"
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
              
                    
            
                    
           
          </div>

         
             </div>    
    		</div>
    	</div>
    </div>



<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Kepala Cabang Regional</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_divisi">
                    <div class="form-group">
                        <label>Toko</label>
                        <input type="text" class="form-control nama_divisi" name="nama_divisi" placeholder="Nama Divisi" required oninvalid="this.setCustomValidity('Toko')" oninput="setCustomValidity('')" readonly="">
                        <input type="hidden" class="form-control id_divisi" name="id_divisi">
                    </div>
                    <div class="form-group">
                        <label>Kepala Regional</label>
                        <select class="form-control id_kacab_regional" name="id_kacab_regional"  required oninvalid="this.setCustomValidity('Kepala Regional')" oninput="setCustomValidity('')">
                            <?php foreach($kepala_regional as $row):?>
                            <option value="<?php echo $row->id_user; ?>"><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></option>
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
        var id_divisi = $(this).data('id_divisi');
        var nama_divisi = $(this).data('nama_divisi');
        var id_kacab_regional = $(this).data('id_kacab_regional');
       
       

        $(".id_divisi").val(id_divisi);
        $(".nama_divisi").val(nama_divisi);
        $(".id_kacab_regional").val(id_kacab_regional);
        

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
 
 $( ".targett" ).change(function() {
      val = this.value;
      
      var res = val.split("|");
      var id_user=res[0];
      var id_divisi=res[1];

      

   $.ajax({
   type: "get",
   url: "<?php echo base_url() ?>Masterer/update_kepala_regional="+id_user"&id_divisi="+$id_divisi,
   data:{},
   success: function(msg){
       window.location = "<?php echo base_url() ?>Masterer/kepala_regional";
   }
})
})

</script>