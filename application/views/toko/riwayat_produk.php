<div class="post-content">
            <div class="post-container">
                <h4>Riwayat Konfirmasi Produk</h4>     
                <div class="table-responsive-lg">
                
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                   <tr>
                    <th style="text-align: center;">No</th>
                     <th>Tanggal Konfirmasi</th>
                     <th>Oleh</th>
                     <th>Status</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php 
                  $no=1;
                  $count_riwayat=count($riwayat);
                  if($count_riwayat >0) {
                  foreach($riwayat as $row):?>
                   <tr>
                     <td align="center"><?php echo $no++; ?></td>
                     <td>
                        <?php echo date_indo($row->tanggal); ?>
                     </td>
                     <td><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></td>
                     <td>
                       <?php if($row->status=="5"){
                        echo "Diterima";
                       }elseif($row->status=="0"){
                        echo "Diterima";
                       }elseif($row->status=="6"){
                        echo "Ditolak";
                       }elseif($row->status=="7"){
                        echo "Direvisi";
                       }
                       ?>
                     </td>
                   </tr>
                 <?php endforeach; ?>
               <?php }else{ ?>
                  <tr>
                    <td colspan="4" align="center">Belum ada riwayat konfirmasi</td>
                  </tr>
               <?php } ?>
                 </tbody>

                </table>
                </div>
              </div>
            </div>


                    
            
