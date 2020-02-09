<div class="col-md-9">
   <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> 

   Detail No. Permintaan <?php echo $no_permintaan; ?></h4>
        <div class="line"></div>
        <!--
             <label>Filter berdasarkan :</label>
                    <form method="get" action="<?php echo base_url();?>halaman-utama">
                                  <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                      <input class="form-control" type="text" name="daterange" placeholder="Tanggal Permintaan">
                                    <span class="input-group-btn">
                                  <button type="submit" class="btn btn-sm btn-info"> <i class="fa fa-search"></i></button>
                    </span></div>
                                    </form>
                                    <br>
                                  -->
          
            <!-- Post Content
            ================================================= -->
            



<div class="about-profile">
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>History Permintaan</h4>
                  <p>
                    <table class="table table-striped" width="100%">
                        <thead>
                           <tr>
                             <th style="text-align: center;">No</th>
                             <th>Status Sekarang</th>
                             <th>Persetujuan</th>
                             <th>Oleh</th>
                             <th>Catatan</th>
                             <th>Tanggal Persetujuan</th>
                           </tr>
                        </thead>
                        <tbody>
                          <?php
                           $no=1;
                           foreach($history as $ad): ?>
                          <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td>

        jjh
                          
                            </td>
                            <td>
                              <?php if($ad->status==0 and $ad->ket=='Manajer'){ ?>
                                     Menunggu Persetujuan Manajer
                            <?php  }elseif($ad->status==1){ ?>
                                Diterima
                             <?php }elseif($ad->status==2){ ?>
                                       Ditolak
                             <?php }elseif($ad->status==3){ ?>
                                     Dikembalikan dengan revisi
                             <?php } ?>
                            </td>

                            <td>
                             <?php 
                              $nama_approv=$this->Pengajuan_model->select_nama($ad->id_user_approval);
                            foreach($nama_approv as $ap){
                                echo $ap->first_name; echo " ";echo $ap->last_name;
                            }
                            ?>
                            </td>
                            <td>
                              <?php echo $ad->catatan; ?>
                            </td>
                            <td><?php echo date_indo($ad->tanggal); ?></td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                  </p>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Detail Permintaan</h4>
                  <p>

                        <table class="table table-striped" width="100%">
                           <?php $permintaan=$this->Pengajuan_model->select_pengajuan_detail($on);



        foreach($permintaan_ajuan as $item){ ?>
                          <tr>
                            <td><b>Nama Pegawai</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $item->first_name; ?> <?php echo $item->last_name; ?></td>
                          </tr>

                          <tr>
                            <td><b>Divisi</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $item->nama_divisi; ?> </td>
                          </tr>

                           <tr>
                            <td><b>Jabatan</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $item->nama_jabatan; ?> </td>
                          </tr>
                          <tr>
                            <td><b>Tanggal Permintaan</b></td>
                            <td><b>:</b></td>
                            <td><?php echo date_indo($item->tanggal_pengajuan); ?> </td>
                          </tr>

                          <tr>
                            <td><b>Tanggal Dibutuhkan</b></td>
                            <td><b>:</b></td>
                            <td><?php echo date_indo($item->tanggal_required); ?> </td>
                          </tr>

                          <tr>
                            <td><b>Jenis Permintaan</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $item->jenis_request; ?> </td>
                          </tr>

                             <tr>
                            <td><b>Keterangan</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $item->keterangan; ?> </td>
                          </tr>


                             <tr>
                            <td><b>Status Terakhir</b></td>
                            <td><b>:</b></td>
                            <td>
<?php if($item->last_status==0 and $item->id_user_approval==0 and $item->status_user==0 and $item->ket=='Manajer'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Menunggu Persetujuan Manajer</b></button>
            <?php  }elseif($item->last_status==2 and $item->id_user_approval !=0 and $item->status_user==0 and $item->ket=='Manajer'){
                $as=$item->id_user_approval;


                ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Manajer</b></button>
            <?php   }elseif($item->last_status==3 and $item->id_user_approval !=0 and $item->status_user==0 and $item->ket=='Manajer'){?>
                <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Manajer</b></button>
            <?php   }elseif($item->last_status==1 and $item->id_user_approval !=0 and $item->status_user==1 and ($item->ket=='Manajer' or $item->ket=='GM')){ ?>
                <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan Finance</b></button>
            <?php  }elseif($item->last_status==2 and $item->id_user_approval !=0 and $item->status_user==0 and $item->ket=='Finance'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Finance</b></button>

            <?php }elseif($item->last_status==3 and $item->id_user_approval !=0 and $item->status_user==0 and $item->ket=='Finance'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Finance</b></button>
            <?php }elseif($item->last_status==1 and $item->id_user_approval !=0 and $item->status_user==2 and $item->ket=='Finance'){?>
                <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan Purchasing</b></button>

            <?php }elseif($item->last_status==2 and $item->id_user_approval !=0 and $item->status_user==0 and $item->ket=='Purchasing'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Ditolak Purchasing</b></button>
            <?php }elseif($item->last_status==3 and $item->id_user_approval !=0 and $item->status_user==0 and $item->ket=='Purchasing'){ ?>

                <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi Purchasing</b></button>
            <?php }elseif($item->last_status==1 and $item->id_user_approval !=0 and $item->status_user==4 and $item->ket=='Purchasing'){?>

                <button type="button" class="btn btn-sm btn-danger"><b>Permintaan Disetujui</b></button>
            <?php }elseif($item->last_status==1 and $item->id_user_approval !=0 and $item->status_user==3 and $item->ket=='Manajer') {?>
                <button type="button" class="btn btn-sm btn-info"><b>Menunggu Persetujuan GM</b></button>
            <?php }elseif($item->last_status==2 and $item->id_user_approval !=0 and $item->status_user==3 and $item->ket=='GM'){ ?>

                <button type="button" class="btn btn-sm btn-primary"><b>Ditolak GM</b></button>
            <?php }elseif($item->last_status==3 and $item->id_user_approval !=0 and $item->status_user==0 and $item->ket=='GM'){ ?>
                <button type="button" class="btn btn-sm btn-primary"><b>Dikembalikan dengan revisi GM</b></button>

            <?php } ?>
                             </td>
                          </tr>

                        <?php } ?>
                        </table>

                  </p>
                  <p>
                      <table class="table table-striped" width="100%">
                        <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Harga Satuan</th>
                          <th>Subtotal</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $nom=1;
                $jumlah_qty=0;
                $jumlah_harga=0;
                $jumlah_tharga=0;
                foreach($detail_barang as $det) :
                    $jumlah_qty +=$det->qty;
                    $jumlah_harga +=$det->harga;
                    $jumlah_tharga +=$det->tharga;


                    ?>
                    <tr>
                        <td align="center"><?php echo $nom++; ?></td>
                        <td><?php echo $det->nama_barang; ?></td>
                        <td align="center"><?php echo $det->qty; ?></td>
                        <td><?php echo number_format($det->harga); ?></td>
                        <td><?php echo number_format($det->tharga); ?></td>
                        <td><?php echo $det->keterangan; ?></td>
                    </tr>
                  <?php endforeach;?>

                     <tr>
                         <td colspan="2" align="center">

                             <b>Total</b>
                         </td>
                         <td align="center">
                              <?php echo $jumlah_qty; ?>
                         </td>
                         <td><?php echo number_format($jumlah_harga); ?></td>
                         <td colspan="2"><?php echo number_format($jumlah_tharga); ?></td>
                     </tr>
                      </tbody>
                      </table>
                    
                  </p>
                  <!--
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                </div>

              -->
              <!--
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Location</h4>
                  <p>228 Park Eve, New York</p>
                  <div class="google-maps">
                    <div id="map" class="map"></div>
                  </div>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-heart-outline icon-in-title"></i>Interests</h4>
                  <ul class="interests list-inline">
                    <li><span class="int-icons" title="Bycycle riding"><i class="icon ion-android-bicycle"></i></span></li>
                    <li><span class="int-icons" title="Photography"><i class="icon ion-ios-camera"></i></span></li>
                    <li><span class="int-icons" title="Shopping"><i class="icon ion-android-cart"></i></span></li>
                    <li><span class="int-icons" title="Traveling"><i class="icon ion-android-plane"></i></span></li>
                    <li><span class="int-icons" title="Eating"><i class="icon ion-android-restaurant"></i></span></li>
                  </ul>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-chatbubble-outline icon-in-title"></i>Language</h4>
                    <ul>
                      <li><a href="">Russian</a></li>
                      <li><a href="">English</a></li>
                    </ul>
                </div>
              </div>
            -->
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
    </script>

