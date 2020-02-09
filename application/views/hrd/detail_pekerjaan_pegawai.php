<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> Daftar Pegawai</h4>
      <!--
      <a target="_blank" href="<?php echo base_url(); ?>HRD/tampil_tambah_pegawai" class="btn btn-sm btn-warning">
                                        Tambah
                                    </a>
                                -->
        <div class="line"></div>
        <?php echo $this->session->flashdata('message');?>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                          <th width='5%'>No</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            
                            <th style="text-align: center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php 
                        $no=1;
                        foreach($users as $us):?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $us->first_name; ?> <?php echo $us->last_name; ?></td>
                                <td><?php echo $us->nama_divisi; ?></td>
                                <td><?php echo $us->nama_jabatan; ?></td>
                                <td><?php echo $us->email; ?></td>
                               
                                <td align="center"> 
                                    <a target="_blank" href="<?php echo base_url(); ?>HRD/tampil_ubah_pegawai/<?php echo $us->id; ?>" class="btn btn-sm btn-warning">
                                        Ubah
                                    </a>
                                    <a target="_blank" href="<?php echo base_url(); ?>HRD/detail/<?php echo $us->id; ?>" class="btn btn-sm btn-danger">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                </div>              
              </div>
              <div class="tampildata">
            </div>
          </div>
          </div>    
    	</div>
       </div>
    </div>


   

    <!-- Footer
    ================================================= -->
   <script>
 function validasi()
    {

        var id_divisi=document.forms["myforma"]["id_divisi"].value;

//        validasi question tidak boleh kosong (required)

        if (id_divisi==null || id_divisi=="")
          {
           swal({
                title: "Peringatan!",
                text: "Divisi tidak boleh kosong!"
            });
          return false;
          };

//        validasi question harus mempunyai panjang karakter minimal 5

        


        var id_jabatan=document.forms["myforma"]["id_jabatan"].value;

//        validasi id user tidak boleh kosong (required)
        if (id_jabatan==null || id_jabatan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Jabatan tidak boleh kosong!"
            });
          return false;
          };


        var alasan=document.forms["myforma"]["alasan"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (alasan==null || alasan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Alasan tidak boleh kosong!"
            });
          return false;
          };



          var type=document.forms["myforma"]["type"].value;
        
//        validasi id penerima tidak boleh kosong (required)
        if (type==null || type=="")
          {
           swal({
                title: "Peringatan!",
                text: "Type tidak boleh kosong!"
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


function reply_click_feed(clicked_id)
            {
                var id=clicked_id;                
                $('.tampildata').load("<?php echo base_url() ?>HRD/replay/"+id);
            }
      

</script>
