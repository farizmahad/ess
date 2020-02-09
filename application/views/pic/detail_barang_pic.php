<div class="post-content">
            <div class="post-container">
                <h4>Detail</h4>     
                <div class="table-responsive-lg">
                <?php foreach($detail_barang as $row):?>
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                      <td>Pembuat</td>
                      <td>
                        <?php echo $row->first_name; ?>  <?php echo $row->last_name; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Divisi</td>
                      <td>
                       <?php echo $row->nama_divisi; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Tanggal Permintaan</td>
                      <td>
                       <?php echo date_indo($row->tanggal_daftar); ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Tanggal Dibutuhkan</td>
                      <td>
                       <?php echo date_indo($row->tanggal_dibutuhkan); ?>
                      </td>
                    </tr>
                     <tr>
                      <td>Produk</td>
                      <td>
                        <?php echo $row->nama_barang; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Kuantitas</td>
                      <td>
                        <?php echo $row->qty_detail; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Satuan</td>
                      <td>
                        <?php echo $row->satuan; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td>
                        <?php echo $row->keterangan; ?>
                      </td>
                    </tr>
                </table>
                <?php endforeach; ?>
                </div>

              </div>
            </div>
            <?php $count_riwayat=count($riwayat);
             if($count_riwayat >0) {
            ?>


             <h4>Riwayat Konfirmasi Produk</h4> 
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
              <?php } ?>


                    
            
