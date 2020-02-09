    <?php
      $ID                 = $this->ion_auth->user()->row()->id;
      $first_name         = $this->ion_auth->user()->row()->first_name;
      $last_name          = $this->ion_auth->user()->row()->last_name;
    ?>
    <div id="page-contents">
    	<div class="container">
    		<div class="row">			
          <div class="col-md-3 static">
          </div>
    			<div class="col-md-9">
          <h4 class="grey"><i class="icon ion-plus"></i> Tambah Permintaan Produk Non Dagang</h4>
          <div class="line"></div>


       <form id="myform" onSubmit="return validasi()" method="POST" action="<?php echo base_url(); ?>User_pengajuan/add_barang_db">

        <?php echo $this->session->flashdata('message');?>
        <!--
        <div class="row">
          <div class="col-md-12">
            <a href="<?php echo base_url(); ?>User_pengajuan/sinkron_produk" class="btn btn-success"> Sinkron Produk</a>
          </div>
        </div>
      -->
            <div class="post-content">
              <div class="post-container">
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group col-xs-5">
                      <label for="firstname">Produk</label>
                        <select class="form-control chosen" name="id_barang" onchange="return autofill();" id="id_barang">
                          <option value="">Pilih Produk</option>
                          <?php foreach($barang as $row):?>
                             <option value="<?php echo $row->id_barang; ?>^<?php echo $row->kategori_produk; ?>^<?php echo $row->nama_barang; ?>">
                              <?php echo $row->nama_barang; ?></option>
                              <?php endforeach; ?>  
                        </select>
                    </div>
                    
                    <div class="form-group col-xs-3">
                        <label for="firstname"> Qty</label>
                        <input class="form-control input-group-lg" type="number"  title="Enter first name" placeholder="Kuantitas" id="jumlah_barang" name="jumlah_barang">
                    </div>

                    <div class="form-group col-xs-4">
                        <label for="firstname">Satuan</label>
                        <input type="text" class="form-control" name="satuan" readonly="" id="satuan" placeholder="Satuan">
                    </div>
                   
                    <div class="form-group col-xs-5" id="data_1">
                            <label for="firstname"> Tanggal Dibutuhkan</label>
                           <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar" style="background-color: white;"></i></span><input type="text" class="form-control" placeholder="Pilih Tanggal" name="tanggal_dibutuhkan" id="tanggal_required">
                            </div>
                    </div>

                         
                    <div class="form-group col-xs-12">
                        <label for="textarea"> Keterangan </label>
                        <textarea placeholder="Tulis spesifikasi produk (jika tahu), jika tidak boleh tulis kegunaan produk tersebut untuk apa..." class="form-control" rows="5" name="deskripsi" id="deskripsi"></textarea>
                    </div>

                     <input type="hidden" class="form-control" placeholder="Pilih Tanggal" name="id_user"  value="<?php echo $ID; ?>">
                    <div class="form-group col-xs-6">
                        <button type="submit" class="btn btn-danger"> Tambah </button>
                    </div>
                </div>
                </div>
            </form>
              </div>
            </div>
          </div>
          </div>    
    		</div>
    	</div>
    </div>
  </body>
</html>


  <script>
     function validasi()
    {

        var item=document.forms["myform"]["id_barang"].value;
//        validasi question tidak boleh kosong (required)

        if (item==null || item=="")
          {
           swal({
                title: "Peringatan!",
                text: "Pilih dahulu barang!"
            });
          return false;
          };

         
        var tanggal_required=document.forms["myform"]["tanggal_required"].value;

//        validasi question tidak boleh kosong (required)

        if (tanggal_required==null || tanggal_required=="")
          {
           swal({
                title: "Peringatan!",
                text: "Tanggal dibutuhkan harus diisi!"
            });
          return false;
          };

       var jumlah_barang=document.forms["myform"]["jumlah_barang"].value;

//        validasi question tidak boleh kosong (required)

        if (jumlah_barang==null || jumlah_barang=="")
          {
           swal({
                title: "Peringatan!",
                text: "Jumlah barang harus diisi!"
            });
          return false;
          }else{

            if(jumlah_barang > 1000){
         swal({
                title: "Peringatan!",
                text: "Jumlah barang maksimal harus 1000!"
            });
          return false;
            }else{

                if(jumlah_barang <0 || jumlah_barang==0){
                    swal({
                title: "Peringatan!",
                text: "Jumlah barang minimal harus 1!"
            });
          return false;
                }
            }
          


          };

     var deskripsi=document.forms["myform"]["deskripsi"].value;

//        validasi question tidak boleh kosong (required)

        if (deskripsi==null || deskripsi=="")
          {
           swal({
                title: "Peringatan!",
                text: "Keterangan harus diisi!"
            });
          return false;
          };


     
       var satuan=document.forms["myform"]["satuan"].value;

//        validasi question tidak boleh kosong (required)

        if (satuan==null || satuan=="")
          {
           swal({
                title: "Peringatan!",
                text: "Satuan harus diisi!"
            });
          return false;
          };
         
       
       
     }

    // function terisi otomatis saat memilih barang

       function autofill(){
        var id_barang =document.getElementById('id_barang').value;
        $.ajax({
                       url:"<?php echo base_url();?>User_pengajuan/autocomplete_barang",
                       data:'&id_barang='+id_barang,
                       success:function(data){
                           var hasil = JSON.parse(data);    
                        $.each(hasil, function(key,val){   
                        document.getElementById('satuan').value=val.unit;     
          
                 });
       }
                   });
                  
    }

    $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
    });

 $('.chosen').chosen();
</script>
