<div class="col-md-9">
               <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> Ubah Detail Permintaan</h4>
        <div class="line"></div>
            <div class="post-content">
                <div class="post-container">
                     <div class="row">
                    <form action="<?php echo base_url() ?>Pengajuan/do_insert_detail_pengajuan" method="POST">
                    <div class="form-group col-xs-3">
                        <label for="firstname"> Nama Barang</label>
                         <input type="HIDDEN" id="id_pengajuan" name="id_pengajuan"  placeholder="Nama Barang" class="form-control" required value="<?php echo $id_pengajuan; ?>">
                     <input type="text" id="nama_barang" name="nama_barang"  placeholder="Nama Barang" class="form-control" required>
                      </div>
                      <div class="form-group col-xs-2">
                        <label for="lastname" class="">Jumlah</label>
                         <input type="number" id="qty" name="qty" value="" placeholder="Jumlah" class="form-control" required>
                      </div>
                        <div class="form-group col-xs-2">
                        <label for="firstname"> Harga Satuan</label>
                       <input type="number" id="harga" name="harga" value="" placeholder="Harga Satuan" class="form-control" required>
                      </div>
                      <div class="form-group col-xs-3">
                        <label for="lastname" class="">Keterangan</label>
                        <input type="text" id="keterangan" name="keterangan" value="" placeholder="Keterangan" class="form-control">
                      </div>
                        <div class="form-group col-xs-2">
                            <label for="lastname" class=""><font color="#ffffff">####</font></label>
                             <input type="hidden"  name="addproduk" value="1" >
                            <button type="submit" class="btn btn-success"> TAMBAH </button>
                      </div>
                    </form>
                </div>
                  <div class="line"></div>
                  <div class="table-responsive-lg">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;"> No. </th>
                                <th scope="col"> Nama Barang </th>
                                <th scope="col" style="text-align: center;"> Jumlah </th>
                                <th scope="col"> Harga Satuan </th>
                                <th scope="col"> Subtotal </th>
                                <th scope="col" style="text-align: center;"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no=1;
                          $jumlah_subtotal=0;
                          foreach($detail_pengajuan as $pe):
                          $jumlah_subtotal +=$pe->tharga;
                           ?>
                            <tr>
                              <td style="text-align: center;"><?php echo $no++; ?></td>
                              <td><?php echo $pe->nama_barang; ?></td>
                              <td style="text-align: center;"><?php echo $pe->qty; ?></td>
                              <td>Rp. <?php echo number_format($pe->harga); ?></td>
                              <td>Rp. <?php echo number_format($pe->tharga); ?></td>
                              <td> 
                                    <center>
                                        <form method="GET" action="<?php echo base_url(); ?>Pengajuan/hapus_detail_permintaan">
<input type="hidden" name="id_pengajuan" value="<?php echo $pe->id_pengajuan; ?>">
                     <input type="hidden" placeholder="Enter email" class="form-control" name="no_pengajuan" value="<?php echo $pe->no_pengajuan; ?>" readonly></div>
              <input type="hidden" placeholder="Enter email" class="form-control" name="tanggal_pengajuan" value="<?php echo $pe->tanggal_pengajuan; ?>">
              <input type="hidden" placeholder="Enter email" class="form-control" name="id_jenis_request" value="1">
            </div>
             <input type="hidden" placeholder="Pilih Tanggal" class="form-control" name="tanggal_required" value="<?php echo $pe->tanggal_required; ?>" required></div>
            </div>
              <input type="hidden" placeholder="Pilih Tanggal" class="form-control" name="keterangan" value="<?php echo $pe->keterangan; ?>" required>
<input type="hidden" placeholder="Pilih Tanggal" class="form-control" name="id_detail" value="<?php echo $pe->id_detail; ?>" required>
            </div>
            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </center>
                                </td> 
                            </tr>
                          <?php endforeach; ?>
                            <tr>
                                <td colspan="4" align="center"> <b> Total </b></td>
                                <td> <b>Rp.<?php echo number_format($jumlah_subtotal); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group col-xs-10">
                            <a href="<?php echo base_url(); ?>Pengajuan/edit_pengajuan/<?php echo $id_pengajuan; ?>"><button type="button" class="btn btn-success">Kembali</button></a>
                            <a href="<?php echo base_url(); ?>daftar-permintaan">
                            <button type="button" class="btn btn-success">Selesai</button></a>
                             

                             <?php 
                                $cek_status_terakhir=$this->Pengajuan_model->cek_status_terakhir($id_pengajuan);

                                foreach($cek_status_terakhir as $cem){
                                  $status_terakhir=$cem->status;
                                }

                                if($status_terakhir ==3){
                             ?>

                            <a href="<?php echo base_url(); ?>Pengajuan/ajukan_kembali?id_pengajuan=<?php echo $id_pengajuan; ?>">
                            <button type="button" class="btn btn-success">Ajukan kembali</button></a>
                          <?php } ?>


                      </div>
                    </div>
              </div>
            </div>
            </div>
          </div>    
    		</div>
    	</div>