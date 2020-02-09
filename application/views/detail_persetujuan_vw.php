<div class="post-content">
            <div class="post-container">
                <h4> Purchase Request No. <?php echo $no_permintaan; ?></h4>    
                <div class="table-responsive-lg">
                <p class="text-muted">Riwayat Konfirmasi <i>Purchase Request</i></p>    
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
                            $group_id=$an->groupid;
                            if($an->groupid=="16"){
 
                              echo "Proses Purchase Order"; 
                            }elseif(($an->groupid=="15") or ($an->groupid=="14")  or ($an->groupid=="23")){
                              if($an->status==0){
                                echo "Menunggu Persetujuan";
                              }elseif($an->status==1){
                                echo "Diterima";
                              }elseif($an->status==2){
                                echo "Ditolak";
                              }elseif($an->status==3){
                                echo "Direvisi";
                              }
                            }
                            ?>

                               &nbsp;
                            <?php
                            $groupss=$this->user_pengajuan_model->get_groups_id($group_id);
                             foreach($groupss as $gr){
                                 echo $gr->name;
                             }
                            ?>


                            <!--
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

                                  -->
                          </td>
                          <td>
                          <?php
                               $id_setuju=$an->id_user_approval;
                               
                                  $cek_setuju=$this->Pengajuan_model->user_by_id($id_setuju);   
                               
                            
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
                <p class="text-muted">Detail Purchase Request</p>    
                <table class="table table-striped table-hover table-bordered">

                    <?php foreach($permintaan_ajuan as $item): ?>
                    <tbody>
                        <tr>
                            <td scope="row"> Nama PIC</td>
                            <td scope="row"> <?php echo $item->first_name; echo " ";echo $item->last_name; ?> </td>
                        </tr>
                        <tr>
                            <td scope="row"> Divisi </td>
                            <td scope="row"> <?php echo $item->nama_divisi; ?> </td>
                        </tr>
                        <tr>
                            <td scope="row"> Jabatan </td>
                            <td scope="row"> <?php echo $item->nama_jabatan; ?></td>
                        </tr>
                        <tr>
                            <td scope="row"> Tanggal Permintaan </td>
                            <td scope="row"> <?php echo date_indo($item->tanggal_pengajuan); ?> </td>
                        </tr>
                        <tr>
                            <td scope="row"> Tanggal Pemenuhan Terakhir </td>
                            <td scope="row"> <?php echo date_indo($item->tanggal_required); ?></td>
                        </tr>
                        <tr>
                            <td scope="row"> Jenis Permintaan </td>
                            <td scope="row"> <?php echo $item->jenis_request; ?></td>
                        </tr>
                         <tr>
                            <td scope="row"> Alokasi </td>
                            <td scope="row"> <?php echo $item->nama_gedung; ?></td>
                        </tr>
                        <tr>
                            <td scope="row"> Keterangan </td>
                            <td scope="row"><?php echo $item->keterangan; ?></td>
                        </tr>
                        <!--
                        <tr>
                            <td scope="row"> Status Terakhir </td>
                            <td scope="row"> 
                              <?php if($item->draft==1){ ?>
                                    <i>Purchase Request</i> belum dikirim
                              <?php }elseif($item->draft==0){ ?>
                            <?php
                            $status_terakhir=$item->status;
                            if($status_terakhir==0){
                                  echo "Menunggu Persetujuan";
                            }elseif($status_terakhir==1){
                              echo "Disetujui";
                            }elseif($status_terakhir==2){
                              echo "Ditolak";
                            }elseif($status_terakhir==3){
                              echo "Dikembalikan dengan revisi";
                            }   
                             ?>
                              <?php } ?>
                            </td>
                        </tr>
                      -->
                        <?php $tambahan_ppn=$item->ppn;?>
                         <?php if($item->lampiran){ ?>
                         <tr>
                            <td scope="row"> Lampiran </td>
                            <td scope="row">
                              <a href="<?php echo base_url(); ?>Pengajuan/lakukan_download/<?php echo $item->id_pengajuan; ?>">
                                Unduh
                              </a>     
                            </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  <?php endforeach ; ?>
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
                        <tr>
                            <th scope="col" style="text-align: center;"> No. </th>
                            <th scope="col"> Produk  </th>
                            <th scope="col"> Deskripsi  </th>
                            <th scope="col"> Kuantitas       </th>
                              <th scope="col"> Satuan       </th>
                            <th scope="col"> Harga  </th>
                            <th scope="col"> Subtotal     </th>
                            <!--
                            <th scope="col"> Supplier    </th>
                            <th scope="col"> Penerima     </th>
                            <th scope="col"> Pembayaran   </th>
                          -->
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
                             <td><?php echo $det->unit; ?></td>
                             <td><?php echo number_format($det->harga); ?></td>
                             <td><?php echo number_format($det->tharga); ?></td>
                           </tr>
                             <!--
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
                      <tr>

                      -->
                    <tr>
                         <td colspan="3" align="center">
                             <b>Total</b>
                         </td>
                         <td align="center">
                              <?php echo $jumlah_qty; ?>
                         </td>
                         <td></td>
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
 
                 <?php }else{ ?>
                           <tr>
                              <td colspan="9" align="center"> Tidak ada barang! </td>
                           </tr>
                 <?php } ?>
               
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="VendorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Supplier
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Masterer/simpan_jabatan">
                   

                      <div class="form-group">
                        <label>Supplier</label>
                       
                        <input type="text" class="form-control nama_vendor" name="nama_jabatan" placeholder="Nama Jabatan" readonly="">
                       
                    </div>

                     <div class="form-group">
                        <label>No. Rekening</label>
                       
                        <input type="text" class="form-control no_rekening_vendor" name="nama_jabatan" placeholder="No Rekening" readonly="">
                       
                    </div>

                     <div class="form-group">
                        <label>Bank</label>
                       
                        <input type="text" class="form-control nama_bank" name="nama_jabatan" placeholder="Bank" readonly="">
                       
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                       
                          <textarea class="form-control alamat_vendor" readonly=""></textarea>
                       
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                
            </div>
            </form>
        </div>
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