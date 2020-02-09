<div class="col-lg-9">
 <h4 class="grey"><i class="icon ion-ios-bookmarks" style="color:#0000ff;"></i> Daftar Permintaan <i>Purchase Order</i></h4>
        <a href="<?php echo base_url(); ?>User_pengajuan/buat_po" type="button" class="btn btn-sm btn-danger">Buat <i>Purchase Order</i></a>          

         <?php echo $this->session->flashdata('message');?>
          <br/>
          <br/>
            <div class="post-content">
                <div class="post-container">
				  <div class="table-responsive-lg">
					<table class="table table-striped table-hover" id="example2">
						<thead>
							<tr>
								<th scope="col" style="text-align: center;"> No</th>
								<th>No <i>Purchase Request</i></th>
								<th scope="col"> Tanggal dibuat</th>
                <!--
                  <th scope="col" style="text-align: center;"> Jumlah Produk</th>
                -->
                   <th scope="col"> Belum PO</th>
                    <th scope="col"> Sudah PO</th>
								<!--
								<th scope="col">Status</th>
							  -->
								<th scope="col" style="text-align: center;">Aksi</th>
							  
							</tr>
						</thead>
						<tbody>
						  <?php 
						  $no=1;
						  foreach($list_pr as $pr):?>
						  

              <?php
                $status_belum=$this->User_pengajuan_model->tampil_detail_pengajuan($id_pengajuan,'belum');
                $count_status_belum=count($status_belum);
              ?>
              <tr>
							<td align="center" <?php if($count_status_belum > 0){ ?> bgcolor="#DCDCDC" <?php } ?>><?php echo $no++; ?></td>


							<td <?php if($count_status_belum > 0){ ?> bgcolor="#DCDCDC" <?php } ?>><a href="<?php echo base_url(); ?>user_pengajuan/tambah_detail_pengajuan/<?php echo $pr->id_pengajuan; ?>" target="_blank"><?php echo $pr->no_pengajuan; ?></a></td>

							<td <?php if($count_status_belum > 0){ ?> bgcolor="#DCDCDC" <?php } ?>><?php echo date_indo($pr->tanggal_pengajuan); ?></td>
              <!--
              <td align="center" <?php if($count_status_belum > 0){ ?> bgcolor="#DCDCDC" <?php } ?>>
                  <?php
                      $id_pengajuan=$pr->id_pengajuan;
                      $count_detail=$this->User_pengajuan_model->tampil_detail_pengajuan($id_pengajuan);
                      echo count($count_detail);
                  ?> 
              </td>

-->
              <td <?php if($count_status_belum > 0){ ?> bgcolor="#DCDCDC" <?php } ?>>
                <?php
                $count_detail_belum=$this->User_pengajuan_model->tampil_detail_pengajuan($id_pengajuan,'belum');
                ?>
              
              <button class="btn btn-sm btn-success produk_po" data-id="<?php echo $pr->id_pengajuan; ?>" data-no_pengajuan="<?php echo $pr->no_pengajuan; ?>" data-status="belum"><strong><!--<?php echo count($count_detail_belum); ?> --> Lihat</strong></button>

              </td>
              <td <?php if($count_status_belum > 0){ ?> bgcolor="#DCDCDC" <?php } ?>>
                <?php
                $count_detail_sudah=$this->User_pengajuan_model->tampil_detail_pengajuan($id_pengajuan,'sudah');
                ?>
                  <button class="btn btn-sm btn-info produk_po" data-id="<?php echo $pr->id_pengajuan; ?>" data-status="sudah" data-no_pengajuan="<?php echo $pr->no_pengajuan; ?>"><strong><!--<?php echo count($count_detail_sudah); ?>--> Lihat </strong></button>
                
              </td>
							<!--
							<td>
							  <?php if($pr->draft==0){ ?>
								<button class="btn btn-sm btn-danger">Sudah dikirim</button>
							  <?php }elseif($pr->draft==1){ ?>
								<button class="btn btn-sm btn-success">Belum dikirim</button>
							  <?php } ?>
							</td>
						  -->
							<td style="text-align: center;" <?php if($count_status_belum > 0){ ?> bgcolor="#DCDCDC" <?php } ?>>
							  <!--
							  <?php if($pr->draft==0){ ?>
								<button type="button" class="btn btn-success btn-sm sudah_button">Ubah</button>
							  <?php }elseif($pr->draft==1){ ?>
									 <button type="button" class="btn btn-success btn-sm ubah_button" 
												data-toggle="modal" data-target="#EditModal"
												data-id_pengajuan="<?php echo $pr->id_pengajuan; ?>"
												data-no_pengajuan="<?php echo $pr->no_pengajuan;?>"
												data-tanggal_required="<?php echo $pr->tanggal_required;?>"
												data-id_gedung="<?php echo $pr->id_gedung;?>"
												data-keterangan="<?php echo $pr->keterangan;?>">Ubah
											</button>  
							  <?php } ?>
	-->
							  <button type="button" class="btn btn-sm btn-warning detail_button" data-id="<?php echo $pr->id_pengajuan; ?>
                
                ">Detail</button>

                <a href="<?php echo base_url(); ?>Exportpdf/print?id_pengajuan=<?php echo $pr->id_pengajuan; ?>" type="button" class="btn btn-sm btn-success"
                
                >Cetak PDF</a>
              
							
              
							</td>
						  </tr>
						<?php endforeach; ?>
						 
						</tbody>
					</table>
					</div>  
              </div>

				<div id="result">
				</div>
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
        <h4 class="modal-title" id="myModalLabel">Ubah Purchase Request</h4>
      </div>
      <div class="modal-body">
        <form id="myform" onSubmit="return validasi()" method="post" action="<?php echo base_url();?>user_pengajuan/ubah_form_pengajuan">
           <div class="form-group">
            <label>No. <i>Purchase Request</i></label>
         <input type="text"name="no_pengajuan" class="form-control no_pengajuan" disabled="">
          </div>
          <div class="form-group" id="data_1">
            <label>Tanggal dibutuhkan</label>
            <div class="input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control tanggal_required" name="tanggal_dibutuhkan" id="tanggal_dibutuhkan" placeholder="Tanggal dibutuhkan">
            </div>
          </div>
        <div class="form-group">
            <label>Lokasi</label>
            <select class="form-control id_gedung" name="id_lokasi" id="id_lokasi">
                <option value="">Pilih Lokasi</option>
                <?php foreach($gedung as $gen): ?>
                <option value="<?php echo $gen->id_gedung ?>"><?php echo $gen->nama_gedung; ?></option>

                <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control keterangan" name="keterangan" placeholder="Keterangan"></textarea>
          </div>
           <input class="form-control id_pengajuan" type="hidden" name="id_pengajuan">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-success" value="Simpan">
      </div>
      </form>
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
</script>
<script>
 $(document).ready(function(){
          $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

          $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
    });




 function validasi()
    {

        var tanggal_dibutuhkan=document.forms["myform"]["tanggal_dibutuhkan"].value;
        if (tanggal_dibutuhkan==null || tanggal_dibutuhkan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Tanggal dibutuhkan tidak boleh kosong!"
            });
          return false;
          };
        var id_lokasi=document.forms["myform"]["id_lokasi"].value;
        if (id_lokasi==null || id_lokasi=="")
          {
           swal({
                title: "Peringatan!",
                text: "Lokasi tidak boleh kosong!"
            });
          return false;
          };


        var selesai=document.forms["myform"]["selesai"].value;
        if (selesai==null || selesai=="")
          {
           swal({
                title: "Peringatan!",
                text: "Tanggal selesai tidak boleh kosong!"
            });
          return false;
          };  
     }



$(document).on( "click", '.ubah_button',function(e) {
    var id_pengajuan   = $(this).data('id_pengajuan');
    var no_pengajuan   = $(this).data('no_pengajuan');
    var tanggal_required      = $(this).data('tanggal_required');
    var id_gedung    = $(this).data('id_gedung');
    var keterangan   = $(this).data('keterangan');

    $(".id_pengajuan").val(id_pengajuan);
    $(".no_pengajuan").val(no_pengajuan);
    $(".tanggal_required").val(tanggal_required);
    $(".id_gedung").val(id_gedung);
    $(".keterangan").val(keterangan);
    });


  $(document).on( "click", '.sudah_button',function(e) {
          swal({
                title: "Peringatan!",
                text: "Permintaan sudah dikirim dan tidak dapat diubah"
            });
          return false;
    });


 $(document).on("click", ".detail_button", function () {
        var myId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>Pengajuan/detaill',
            data: { ids: myId},
            success: function(response) {
                $('#result').html(response);
            }
        });
    }); 



 $(document).on("click", ".produk_po", function () {
        var myId = $(this).data('id');
        var no_pengajuan = $(this).data('no_pengajuan');
        var status = $(this).data('status');
    


       
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>User_pengajuan/detail_status_produk',
            data: { ids: myId,no_pengajuan:no_pengajuan,status:status},
            success: function(response) {
                $('#result').html(response);
            }
        });
    }); 
</script>