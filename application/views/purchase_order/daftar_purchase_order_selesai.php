
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>



<div class="col-lg-9">
 <h4 class="grey"><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i> Daftar Purchase Order selesai</h4>
        <div class="line"></div>
           <form action="<?php echo base_url(); ?>User_pengajuan/cari_purchase_order" method="get">
                          <div class="form-horizontal">
                            <div class="input-group">
                            
                                           <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                    <input class="form-control" type="date" name="pilih_tanggal" placeholder="Pilih Tanggal Transaksi">
                                                    <!-- <input type="text" name='daterange' class="form-control pull-right" id="reservation" placeholder="Pencarian Berdasarkan Tanggal"> -->
                                                    <span class="input-group-btn">
                                                    </span>
                                          
                              <div class="ddl-select input-group-btn">
                                <select id="ddlsearch" class="selectpicker form-control" data-style="btn-success" name="select">
                                  <option value="pilih">Pilih</option>
                                  <option value="pic">PIC</option>
                                  <option value="no_purchase_order">No Purchase Order</option>
                                 <option value="produk">Produk</option>
                                
                                </select>
                              </div>
                              <input id="txtkey" type="text" class="form-control" placeholder="Isi" aria-describedby="ddlsearch" name="search">
                              <span class="input-group-btn">
                                <button type="submit" id="btn-search" class="btn btn-info" type="button"><i class="fa fa-search fa-fw"></i></button>
                              </span>

                            </div>
                          </div>
                          </form>
                          <br>

                          <a href="<?php echo base_url(); ?>User_pengajuan/export_purchase_order_selesai?pilih_tanggal="<?php echo $pilih_tanggal; ?>&select="<?php echo $select; ?>&search="<?php echo $search; ?>" class="btn btn-sm btn-success">Unduh </a>
                          <div class="line"></div>

            <div class="post-content">
                <div class="post-container">
              <div class="table-responsive-lg">
                 <?php echo $this->session->flashdata('message');?>
                <table class="table table-striped table-hover table table-responsive-lg" id="example2">
                    <thead>
                        <tr>
                            <!--
                            <th style="width: 50%"> Kategori</th>
                          -->
                            <th> No Purchase Order</th>
                            <th> PIC</th>
                            <th> Status </th>
                            <th> Tgl Transaksi</th>
                            <th  style="text-align: center;"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count_po=count($purchase_order);
                      if($count_po > 0){
                        foreach($purchase_order as $pur):?>
                      
                      <tr>
                        <td>
                          <?php echo $pur->no_po; ?>
                        </td>
                        <td>
                          <?php echo $pur->first_name; ?>        <?php echo $pur->last_name; ?>
                        </td>
                        <td>
                          <?php

                                  if($pur->status==1){ ?>

                                      <button type="button" class="btn btn-sm btn-danger">Diterima</button>

                                  <?php }elseif($pur->status==2){ ?>
                                       <button type="button" class="btn btn-sm btn-warning">Ditolak</button>
                                  <?php } ?>
                        </td>
                        <td>
                          <?php echo date_indo($pur->tgl_transaksi); ?>
                        </td>
                        <td align="center">
                           <button type="button" class="btn btn-sm btn-warning detail_button" data-id="<?php echo $pur->id_pengajuan; ?>">Detail</button> 
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php }else{ ?>

                    <tr>
                      <td colspan="5" align="center">Tidak ada data!</td>
                    </tr>
                  <?php } ?>
                      
                    </tbody>
                </table>
                </div>
                <div>
                
            </div>
            <div id="result">  
              </div>
          </div>
          </div>    
    	</div>
      </div>
     <script src="<?php echo base_url();?>assets/plugins/js/fullcalendar/moment.min.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/js/daterangepicker/daterangepicker.js"></script>
<script>
  $(document).on("click", ".detail_button", function () {
        var myId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>User_pengajuan/tampil_satu_purchase_order',
            data: { ids: myId},
            success: function(response) {
                $('#result').html(response);
            }
        });
    }); 
</script>
<script>

$(function() {
    $('input[name="daterange"]').daterangepicker({
       format: 'YYYY/MM/DD'
    });
});
</script>


