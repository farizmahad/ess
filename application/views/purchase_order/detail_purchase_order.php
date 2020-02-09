<div class="post-content">
            <div class="post-container">
                <h4> <i>Purchase Order</i> No. <?php echo $no_permintaan; ?></h4>    
                <div class="table-responsive-lg">
                <p class="text-muted">Riwayat Persetujuan</p>    
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;width:5%;"> No. </th>
                            <th scope="col"> Status </th>
                            <th scope="col"> Oleh </th>
                            <th scope="col"> Catatan </th>
                            <?php
                             foreach($history as $aso){
                                 $user_lampiran=$aso->lampiran;
                             } ?>
                            <th scope="col"> Lampiran </th>
                            <th scope="col"> Tanggal Persetujuan </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                           $no=1;
                           $count_history=count($history);
                           if($count_history > 0){
                           foreach($history as $an): ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $no++; ?></td>
                          <td>
                            <?php
                            $status_terakhir=$an->status;
                            if($status_terakhir==0){
                                  echo "Menunggu Persetujuan";
                            }elseif($status_terakhir==1){
                              echo "Disetujui";
                            }elseif($status_terakhir==2){
                              echo "Ditolak";
                            }elseif($status_terakhir==3){
                              echo "Dikembalikan dengan revisi";
                            }
                            $user_penerima=$an->id_penerima;
                            $lampiran_history=$an->lampiran_history;
                            $urutan=$an->urutan;
                            $next_urutan=$urutan+1;
                            $last_status=$an->status;
                            $next=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
                                    ?>
                                    <?php
                                   foreach($next as $ne){ 
                                          echo $ne->nama_group;
                                    }
                                    ?>
                          </td>
                          <td>
                          <?php
                               $id_setuju=$an->id_user_approval;
                               if($id_setuju==0){
                                  $cek_setuju=$this->Pengajuan_model->user_by_id($user_penerima);    
                               }else{
                                  $cek_setuju=$this->Pengajuan_model->user_by_id($id_setuju);   
                               }
                            
                              foreach($cek_setuju as $se){
                               echo $se->first_name;
                               echo " ";
                               echo $se->last_name;
                              }
                          ?>
                          </td>
                          <td>
                            <?php echo $an->catatan; ?>
                          </td>
                          <td>
                            <?php if($lampiran_history){?>
                            <a href="<?php echo base_url(); ?>Pengajuan/lakukan_download_history/<?php echo $an->id_history; ?>">
                                Unduh
                              </a>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if($an->tanggal !=0000-00-00){
                             echo date_indo($an->tanggal); 
                           }?>
                          </td> 
                        </tr>
                      <?php endforeach; ?>
                    <?php }else{ ?>
                             <td colspan="6" align="center">Tidak ada riwayat pengajuan! Permintaan belum dikirim!</td>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
                
              </div>
            </div>
            

      <div class="post-content">  
            <div class="post-container">   
                <div class="table-responsive-lg">
                <p class="text-muted">Detail <i>Purchase Order</i></p>    
                <table class="table table-striped table-hover table-bordered">

                    <?php foreach($permintaan_ajuan as $item): ?>
                    <tbody>
                        <tr>
                            <td scope="row"><strong>Nama PIC</strong></td>
                            <td scope="row"> <?php echo $item->first_name; echo " ";echo $item->last_name; ?> </td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Divisi </strong></td>
                            <td scope="row"> <?php echo $item->nama_divisi; ?> </td>
                        </tr>
                        <tr>
                            <td scope="row"><strong> Jabatan</strong> </td>
                            <td scope="row"> <?php echo $item->nama_jabatan; ?></td>
                        </tr>
                        <tr>
                            <td scope="row"> <strong>Tanggal Transaksi </strong></td>
                            <td scope="row"> <?php echo date_indo($item->tgl_transaksi); ?> </td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Tanggal Jatuh Tempo</strong> </td>
                            <td scope="row"> <?php echo date_indo($item->tgl_jatuh_tempo); ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Jenis Permintaan</strong> </td>
                            <td scope="row"> Non Dagang</td>
                        </tr>
                       <tr>
                                <td scope="row"> <strong>Supplier </strong></td>
                                <td scope="row"><?php echo $item->nama_supplier; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>Email </strong></td>
                                <td scope="row"><?php echo $item->email; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>Tanggal Pengiriman </strong></td>
                                <td scope="row"><?php echo $item->tgl_pengiriman; ?></td>
                            </tr>
                              <tr>
                                <td scope="row"> <strong>No. Pelacakan </strong></td>
                                <td scope="row"><?php echo $item->no_pelacakan; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>No. Referensi Vendor </strong></td>
                                <td scope="row"><?php echo $item->no_referensi; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>Tag </strong></td>
                                <td scope="row"><?php echo $item->tag; ?></td>
                            </tr>
                             <tr>
                                <td scope="row"> <strong>Nama syarat pembayaran </strong></td>
                                <td scope="row"><?php echo $item->nama_syarat_pembayaran; ?></td>
                            </tr>
                            <tr>
                                <td scope="row"> <strong>Nama Gudang </strong></td>
                                <td scope="row"><?php echo $item->nama_gudang; ?></td>
                            </tr> 
                    </tbody>
                 
                </table>
                </div>
              </div>
            </div>
        
          <div class="post-content">  
            <div class="post-container">     
                <div class="table-responsive-lg">  
                <p class="text-muted">Produk</p>   
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                             <!--<td> <strong>No.</strong></td>-->
                                                        <td> <strong>Produk</strong></td>
                                                        <td> <strong>Deskripsi</strong></td>
                                                        <td> <strong>Kuantitas </strong></td>
                                                        <td> <strong>Satuan</strong></td>
                                                        <td> <strong>Harga Satuan</strong></td>
                                                        <td> <strong>Diskon</strong></td>
                                                        <td> <strong>Pajak</strong></td>
                                                        <td> <strong>Subtotal Produk</strong></td> 
                                                        <td> <strong>Subtotal Pajak</strong></td> 
                                                        <td> <strong>Subtotal </strong></td>            
                          </thead>
                          <tbody>

                                                   <?php 
                                                   $diskon_baris=0;
                                                   $an=0;
                                                   $pen=0;
                                                   foreach($permintaan as $pro):?>
                                                <tr>
                                                    <td>
                                                        <?php echo $pro->nama_barang; ?>
                                                    </td>
                                                     <td>
                                                        <?php echo $pro->deskripsi; ?>
                                                    </td>
                                                     <td>
                                                        <?php echo $pro->qty_po; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $pro->unit; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($pro->harga_po); ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                             $diskon_baris += $pro->diskon/100 * $pro->tharga_po;
                                                        ?>
                                                        <?php echo $pro->diskon; ?> %
                                                    </td>
                                                    <td>
                                                        <?php echo $pro->nama_tax; ?>
                                                    </td>
                                                     <td>
                                                        <?php
                                                             $an +=$pro->subtotal;
                                                        ?>
                                                        <?php echo number_format($pro->tharga_po); ?>
                                                    </td>
                                                    <td>
                                                       
                                                        <?php echo number_format($pro->jumlah_pajak); ?>
                                                    </td>
                                                    <td>
                                                       
                                                        <?php echo number_format($pro->subtotal); ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                                <tr>
                                                    <td colspan="9" align="center">Subtotal</td>
                                                    <td><?php echo number_format($an); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9" align="center">Diskon Per baris</td>
                                                    <td><?php echo number_format($diskon_baris); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9" align="center">Diskon</td>
                                                    <td><?php echo $item->diskon_all; ?> %</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9" align="center">Total</td>
                                                    <td><?php echo number_format($item->total_bayar); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9" align="center">Uang Muka</td>
                                                    <td><?php echo number_format($item->uang_muka); ?></td>
                                                </tr>
<tr>
                                                    <td colspan="9" align="center">Sisa Tagihan</td>
                                                    <td><?php echo number_format($item->sisa_tagihan); ?></td>
                                                </tr>
                            
                          </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>

 <?php endforeach ; ?>
          


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