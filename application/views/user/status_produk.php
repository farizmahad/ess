<div class="post-content">
            <div class="post-container">
                <h4> Purchase Request No. <?php echo $no_pengajuan; ?></h4>    
                <div class="table-responsive-lg">
                <p class="text-muted">Produk</p>  
                <?php if($status=="belum") { ?>  
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                             <th scope="col" style="text-align: center;"> No. </th>
                            <th scope="col"> Produk  </th>
                            <th scope="col"> Deskripsi  </th>
                            <th scope="col"> Kuantitas       </th>
                            <th scope="col"> Harga  </th>
                            <th scope="col"> Subtotal Produk    </th>
                            <th scope="col"> Supplier</th>
                            <th scope="col"> User Penerima </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                         $jumlah_detail_barang=count($detail_barang);
                         if($jumlah_detail_barang >0){
                         $nom=1;
                           $jumlah_qty=0;
                           $jumlah_harga=0;
                           $jumlah_tharga=0;
                         foreach($detail_barang as $det) :
                            $jumlah_qty +=$det->qty_barang;
                            $jumlah_harga +=$det->harga;
                            $jumlah_tharga +=$det->tharga;  
                        ?>
                        <tr>
                             <td style="text-align: center;"><?php echo $nom++; ?></td>
                             <td><?php echo $det->nama_barang; ?></td>
                             <td><?php echo $det->deskripsi_produk; ?></td>
                             <td align="center"><?php echo $det->qty_barang; ?></td>
                             <td><?php echo number_format($det->harga); ?></td>
                             <td><?php echo number_format($det->tharga); ?></td>
                             <td> 
                              <?php
                                $vendor=$det->id_vendor;
                                $cek_bank=$this->Pengajuan_model->cek_bank($vendor);
                                foreach($cek_bank as $bak){
                                $nama_bank=$bak->nama_bank;
                               }
                              ?>
                                          <a href="#"  data-toggle="modal" data-target="#VendorModal"
                                             data-nama_vendor="<?php echo  $det->nama_vendor; ?>" 
                                             data-no_rekening_vendor="<?php echo  $det->no_rekening_vendor; ?>"
                                             data-alamat_vendor="<?php echo  $det->alamat_vendor; ?>"
                                             data-nama_bank="<?php echo  $nama_bank; ?>" class="button_vendor">
                                             <?php echo $det->nama_vendor; ?></a>
                            </td>
                             <td>  <?php echo $det->first_name;?> <?php echo $det->last_name; ?> | <?php echo $det->nama_divisi; ?></td>
                             <td>
                                <?php
                                   if($det->metode_pembayaran==1){?>
                                       Tunai
                                   <?php }elseif($de->metode_pembayaran==2){ ?>
                                       Transfer
                                <?php } ?>
                            </td>
                        </tr>
                      <?php endforeach;?> 
                      <!--
                      <tr>
                         <td colspan="3" align="center">
                             <b>Total</b>
                         </td>
                         <td align="center">
                              <?php echo $jumlah_qty; ?>
                         </td>
                         <td><?php echo number_format($jumlah_harga); ?></td>
                         <td colspan="5"><?php echo number_format($jumlah_tharga); ?></td>
                     </tr>
                    <?php  
                  
                    if($tambahan_ppn) { ?>
                      <tr>
                         <td colspan="3" align="center">
                             <b><?php echo $item->tipe_pajak; ?></b>
                         </td>
                         <td align="center">
                         </td>
                         <td><?php echo $tambahan_ppn; ?> %</td>
                         <td colspan="5">
                            <?php
                                 $pajak=($tambahan_ppn/100)*$jumlah_tharga;
                                 $jumlah_pajak=$jumlah_tharga+$pajak;
                                 
                            ?>
                            <?php echo number_format($pajak); ?> 
                          </td>
                     </tr>
                     <tr>
                         <td colspan="3" align="center">
                             <b>Total Keseluruhan</b>
                         </td>
                         <td align="center">
                         </td>
                         <td></td>
                         <td colspan="5">
                          <?php echo number_format($jumlah_pajak); ?></td>
                     </tr>
                   <?php } ?>
                 -->
 
                 <?php }else{ ?>
                           <tr>
                              <td colspan="9" align="center"> Tidak ada barang! </td>
                           </tr>
                 <?php } ?>
                    </tbody>
                </table>
              <?php }else{ ?>
<table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            
                            <th>No. Purchase Order</th>
                            <th scope="col"> Produk  </th>
                            <th scope="col"> Deskripsi  </th>
                            <th scope="col"> Kuantitas       </th>
                            <th scope="col"> Satuan       </th>
                            <th scope="col"> Harga </th>
                            <th scope="col"> Diskon </th>
                            <th scope="col"> Pajak </th>
                            <th scope="col"> Subt. Pajak    </th>
                            <th scope="col"> Subt. Produk </th>
                            <th scope="col"> Subtotal </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                              $total_tharga=0;
                              $besaran_diskon=0;

                              $count_detail_barang=count($detail_barang);

                              if($count_detail_barang>0) {
                               ?>
                              
                              <?php foreach($detail_barang as $po):
                              $total_tharga +=$po->subtotal;
                              $besaran_diskon +=($po->diskon/100)*$po->tharga_po;
                              $total_diskon_all=$total_tharga-$besaran_diskon;
                              ?>
                              <tr>
                              <td>
                                <button class="btn btn-sm btn-warning"> <?php echo $po->no_po; ?></button>
                               </td>
                              <td><?php echo $po->nama_barang; ?></td>
                              <td><?php echo $po->deskripsi_po; ?></td>
                              <td><?php echo $po->qty_po; ?></td>
                              <td><?php echo $po->unit; ?></td>
                              <td><?php echo number_format($po->harga_po); ?></td>
                              <td><?php echo $po->diskon; ?></td>
                              <td><?php echo $po->nama_tax; ?></td>
                              <td><?php echo number_format($po->jumlah_pajak); ?></td>
                              <td><?php echo number_format($po->tharga_po); ?></td>
                              <td><?php echo number_format($po->subtotal); ?></td>
                             
                              </tr>
                            <?php endforeach; ?>
                          <?php }else{ ?>
                      <tr>

                           <td colspan="11" align="center">Belum ada produk yang dijadikan Purchase Order</td>
                      </tr>
                      <?php } ?>
                         
                    </tbody>
                </table>


              <?php } ?>
                </div>
                
              </div>
            </div>
            

