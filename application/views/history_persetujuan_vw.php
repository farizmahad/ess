
    			<div class="col-lg-9">
            <h4 class="grey"><i class="fa fa-list"></i> Daftar History Persetujuan</h4>
        <div class="line"></div>
                    
            <div class="post-content">
              <!--<img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />-->
            <div class="post-container">
                
              <div class="row">
                
                <div class="table-responsive-lg">    
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
                            <th scope="col"> No. </th>
                            <th scope="col"> No. Permintaan </th>
                            <th scope="col"> Nama Pegawai </th>
                            <th scope="col"> Tanggal Permintaan </th>
                            <th scope="col"> Tanggal Dibutuhkan </th>
                            <th scope="col"> Jenis </th>
                            <th scope="col"> Status </th>
                            <th scope="col"> Detail </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=1;
                      foreach($persetujuan as $pe):?>
                        <tr>
                            <td scope="row" align="center"> <?php echo $no++; ?> </td>
                            <td> <?php echo $pe->no_pengajuan; ?> </td>
                            <td> <?php echo $pe->first_name; ?> <?php echo $pe->last_name; ?></td>
                            <td> <?php echo date_indo($pe->tanggal_pengajuan); ?></td>
                            <td> <?php echo date_indo($pe->tanggal_required); ?></td>
                            <td> <?php 

                                 if($pe->id_jenis_request==1 or $pe->id_jenis_request==3){
                                  echo "Barang";
                                 }else{
                            echo $pe->jenis_request; }?></td>
                            <td> 
                              <?php if($pe->status==1){
                                        echo "Disetujui";
                              }elseif($pe->status==2){
                                echo "Ditolak";
                              }elseif($pe->status==3){
                                echo "Dikembalikan dengan revisi";
                              }
                              ?>
                            </td>
                            <td> 
                              <button type="button" class="btn btn-sm btn-success edit_button" data-id="<?php echo $pe->id_pengajuan; ?>">Detail</button> 
                            </td>
                            
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                </table>
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

     $(document).on("click", ".edit_button", function () {
        var myId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>Pengajuan/detaill',
            data: { ids: myId},
            success: function(response) {
                $('#result').html(response);
            }
        });
    });  
</script> 
 
    


    

    <!-- Footer
    ================================================= -->
   