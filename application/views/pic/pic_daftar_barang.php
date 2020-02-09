<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
 <h4 class="grey"><i class="icon ion-ios-pricetag" style="color:#FFE80C;"></i> Permintaan Non Dagang</h4>
        <div class="line"></div>
         <?php echo $this->session->flashdata('message');?>
          <div class="line"></div>
            <div class="post-content">
                <div class="post-container">
                  <div class="table-responsive">
                   <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;"> No</th>
                            <th>Pembuat</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col"> Tgl Permintaan </th>
                            <th scope="col"> Tgl Dibutuhkan </th>
                            <th scope="col"> Purchase Request</th>
                            <th scope="col"> Purchase Order</th>
                            <th scope="col" style="text-align: center;"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                       $no=1;
                       foreach($pic_daftar_barang as $pic):?>
                         <tr>
                             <td align="center">
                                <?php echo $no++; ?>
                             </td>  
                             <td>
                                <?php echo $pic->first_name; ?> <?php echo $pic->last_name; ?>
                             </td>
                             <td><?php echo $pic->nama_barang; ?></td>
                             <td><?php echo $pic->deskripsi_produk; ?></td>
                             <td><?php echo $pic->qty; ?> <?php echo $pic->satuan; ?></td>
                             <td>
                               <?php echo date_indo($pic->tanggal_daftar); ?>
                             </td>
                               <td>
                               <?php echo date_indo($pic->tanggal_dibutuhkan); ?>
                             </td>
                             <td>
                               <?php if($pic->id_pengajuan==0){ ?>
                                <button class="btn btn-sm btn-danger">Belum </button>
                               <?php }else{ ?>
                                      <?php $id_detail=$pic->id_detail; 
                                      $cek_no_pengajuan=$this->user_pengajuan_model->cek_no_pengajuan($id_detail);
                                ?>
                                <?php foreach($cek_no_pengajuan as $on):?>
                                 <button type="button" class="btn btn-warning btn-sm detail_button" 
                                            data-toggle="modal" data-target="#EditModal"
                                            data-tanggal_pengajuan="<?php echo date_indo($on->tanggal_pengajuan); ?>"
                                            data-tanggal_required="<?php echo date_indo($on->tanggal_required);?>"
                                            data-no_pengajuan="<?php echo $on->no_pengajuan;?>"
                                            data-nama_gedung="<?php echo $on->nama_gedung;?>"
                                            data-keterangan="<?php echo $on->keterangan;?>"><?php echo $on->no_pengajuan; ?>
                                  </button>

                                  
                                  <?php endforeach; ?>  

                                
                               <?php } ?>
                           </td>
                           <td>
                             <?php 
                                    if($on->no_po==0){ ?>
                                      <button class="btn btn-sm btn-danger">Belum</button>
                                   <?php  }else{ ?>
                                     
                                     <?php 
                                         $id_po=$on->no_po;
                                         $select_purchase_order=$this->user_pengajuan_model->select_purchase_order_byid($id_po);
                                         foreach($select_purchase_order as $sel){ ?>
                                           <button type="button" class="btn btn-sm btn-warning"><?php echo $sel->no_po; ?></button>
                                       <?php  }
                                     ?>
                                   <?php } ?>
                           </td>
                           <td>
                              <button type="button" class="btn btn-sm btn-success edit_button" data-id="<?php echo $pic->id_detail; ?>">Detail</button> 
                           </td>

                         </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
                </div>  
              </div>

            </div>
            <div id="result">
              </div>
          </div>
          </div>    
    		</div>
    	</div>
    </div>


<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail <i>Purchase Request</i></h4>
      </div>
      <div class="modal-body">
        
         <div class="form-group" id="data_1">
            <label>No. Purchase <i>Request</i></label>
            
                <input type="text" class="form-control no_pengajuan" placeholder="No Pengajuan" readonly="">
            
          </div>

          <div class="form-group" id="data_1">
            <label>Tanggal Pengajuan</label>
            
                <input type="text" class="form-control tanggal_pengajuan" placeholder="Tanggal Pengajuan" readonly="">
            
          </div>

        <div class="form-group" id="data_2">
            <label>Tanggal Dibutuhkan</label>
              <input type="text" class="form-control tanggal_required" placeholder="Tanggal Dibutuhkan" readonly="">
          
      </div>
         <div class="form-group" id="data_1">
            <label>Lokasi</label>
                <input type="text" class="form-control nama_gedung" placeholder="Tanggal Pengajuan" readonly="">
          </div>
             <div class="form-group" id="data_1">
            <label>Keterangan</label>
                <textarea class="form-control keterangan" readonly=""></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      
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


   $(document).on("click", ".edit_button", function () {
        var myId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>User_pengajuan/detail_barang_pic',
            data: { ids: myId},
            success: function(response) {
                $('#result').html(response);
            }
        });
    }); 

   $(document).on( "click", '.detail_button',function(e) {
    var tanggal_pengajuan  = $(this).data('tanggal_pengajuan');
    var tanggal_required = $(this).data('tanggal_required');
    var no_pengajuan = $(this).data('no_pengajuan');
    var nama_gedung = $(this).data('nama_gedung');
    var keterangan = $(this).data('keterangan');

    $(".tanggal_pengajuan").val(tanggal_pengajuan);
    $(".tanggal_required").val(tanggal_required);
    $(".no_pengajuan").val(no_pengajuan);
     $(".nama_gedung").val(nama_gedung);
     $(".keterangan").val(keterangan);
    
    });
</script>

