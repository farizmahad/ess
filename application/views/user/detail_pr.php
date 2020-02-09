<div class="col-md-9">
   <div class="line"></div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i> Data user</h4>
                  <p>
                       <table class="table table-striped" width="100%">
                          <?php foreach($detail_pr as $item){ ?>
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
                          
                        <?php } ?>
                        </table>
                  </p>
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i> Data permintaan </h4>
                  <p>
                       <table class="table table-striped" width="100%">
                          <?php foreach($detail_pr as $ite){ ?>
                          <tr>
                            <td><b>Tanggal Permintaan</b></td>
                            <td><b>:</b></td>
                            <td><?php echo date_indo($item->tanggal_pengajuan); ?> </td>
                          </tr>
                          <tr>
                            <td><b>Jenis Permintaan</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $ite->jenis_request; ?> </td>
                          </tr>
                        <?php } ?>
                      </table>
                  </p>
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i> Data detail permintaan </h4>
                  <p>
                      <table class="table table-striped" width="100%">
                        <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th>Produk</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $no=1;
                         foreach ($detail_barang_pr as $pr):?>
                        <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td><?php echo $pr->nama_barang; ?></td>
                            <td align="center"><?php echo $pr->qty; ?></td>
                            <td><?php echo $pr->satuan; ?></td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                      </table>
                  </p>
            </div>
    		</div>
    	</div>
    </div>

    

