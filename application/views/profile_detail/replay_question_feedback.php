
            <div class="post-container">
                <h4> Detail Pertanyaan</h4>    
                <div class="table-responsive-lg">
                  <br>

                <table class="table table-striped table-hover table-bordered">
                    <?php foreach($feed_back_detail as $det):?>
                        <tr>
                            <td><strong>Tanggal dibuat</strong></td>
                            <td><?php echo date_indo($det->date_feed_back); ?></td>
                        </tr>
                        <tr>
                          <td><strong>User yang dinilai</strong></td>
                          <td><?php echo $det->first_name; ?> <?php echo $det->last_name; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Pertanyaan</strong></td>
                          <td><?php echo $det->question;?></td>
                        </tr>
                      <?php endforeach; ?>
                   
                </table>

                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th width="5%" style="text-align: center;">No</th>
                      
                      <th width="20%">Dari</th>
                      <th style="text-align: center;">Status</th>
                      <th width="20%">Tanggal</th>
                      <th width="38%">Saran</th>
                    
                    </tr>
                  </thead>

                        
                    <tbody>
                      <?php 
                      $no=1;
                      foreach($feed_back_penerima as $pem):?>
                      <tr>
                          <td align="center"><?php echo $no++; ?></td>
                          
                          <td><?php echo $pem->first_name; ?> <?php echo $pem->last_name; ?></td>
                           <td align="center">
                            <?php if($pem->status==0){ ?>
                               <button class="btn btn-sm btn-warning">Belum diisi</button>
                            <?php }else{ ?>
                                <button class="btn btn-sm btn-success">Sudah</button>
                            <?php } ?>
                          </td>
                          <td>
                              <?php
                                   if($pem->status==0){
                                    echo "-";
                                   }else{
                               ?>
                              <?php echo date_indo($pem->date); ?>
                             <?php } ?>
                          </td>
                          <td>
                            <?php
                                   if($pem->status==0){
                                    echo "-";
                                   }else{
                               ?>
                               <strong>Kelebihan :</strong> <br>
                              <?php
                              echo $pem->kelebihan;
                              echo "<br><br>";
                              echo "<strong>Kekurangan :</strong><br>";
                              echo $pem->kekurangan;

                               ?>
                             <?php } ?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                      
                    </tbody>
                </table>
                </div>
                
              </div>
            



<script>
     $(document).on( "click", '.button_vendor',function(e) {
        var id = $(this).data('id');
        var nama_vendor = $(this).data('nama_vendor');
        var no_rekening_vendor = $(this).data('no_rekening_vendor');
        var alamat_vendor = $(this).data('alamat_vendor');
        var nama_bank = $(this).data('nama_bank');


        $(".id").val(id);
        $(".nama_vendor").val(nama_vendor);
        $(".no_rekening_vendor").val(no_rekening_vendor);
        $(".alamat_vendor").val(alamat_vendor);
        $(".nama_bank").val(nama_bank);
    });
</script>