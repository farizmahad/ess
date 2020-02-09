<div class="col-md-9">
  <?php
      if(validation_errors()) :
  ?>
    <div class="alert alert-primary" role="alert" style="background-color:#fcbabd">
      <p class="text-danger"><?= validation_errors(); ?></p>
    </div>

  <?php endif; ?>

   <div class="post-content">
     <!--<img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />-->

     <div class="post-container">
        <h3> Form Permintaan Pelatihan</h3>
       <div class="row">
         <form action="" method="post">
           <div class="form-group col-xs-12">
               <label for="peserta"> Peserta yang Diusulkan</label>
               <input id="peserta" class="form-control input-group-lg" type="text" name="peserta" title="Nama Peserta" placeholder="Peserta yang disulkan untuk mengikuti training" value="" />
             </div>
           <div class="form-group col-xs-12">
               <label for="divisi"> Bagian / Divisi </label>
               <select class="form-control" id="$divisi" name="divisi">

                  <?php foreach ($divisi as $div) : ?>
                    <option value="<?php $div->id_divisi ?>"><?= $div->nama_divisi; ?></option>
                  <?php endforeach; ?>
               </select>
             </div>
           <div class="form-group col-xs-12">
               <label for="penyelenggara"> Penyelenggara yang Diusulkan </label>
               <input id="penyelenggara" class="form-control input-group-lg" type="text" name="penyelenggara" title="Nama Penyelenggara" placeholder="vendor training yang menyelenggarakan training tersebut" value="" />
             </div>
           <div class="form-group col-xs-12">
               <label for="tanggal"> Hari / Tanggal Pelaksanaan </label>
               <input id="tanggal" class="form-control input-group-lg" type="date" name="tanggal" title="Tanggal Pelaksanaan" placeholder="hari dan tanggal dilaksanakannya pelatihan" value="" />
             </div>
           <div class="form-group col-xs-12">
               <label for="riwayat"> Riwayat Pelatihan </label>
               <input id="riwayat" class="form-control input-group-lg" type="text" name="riwayat" title="Riwayat Pelatihan" placeholder="riwayat pelatihan apa saja yang pernah diikuti dan diberangkatkan oleh perusahaan" value="" />
             </div>
           <div class="form-group col-xs-12">
               <label for="rekomendasi"> Rekomendasi Usulan </label>
               <input id="rekomendasi" class="form-control input-group-lg" type="text" name="rekomendasi" title="Rekomendasi Usulan" placeholder="alasan terkait merekomendasikan orang tersebut untuk diberikan training" value="" />
             </div>
           <div class="form-group col-xs-12">
               <label for="biaya"> Estimasi Biaya </label>
               <input id="biaya" class="form-control input-group-lg" type="number" name="biaya" title="Total Biaya" placeholder="perkiraan biaya yang akan dikeluarkan saat training" value="" />
             </div>
           <div class="form-group col-xs-12">
               <label for="makan"> Tuition fee </label>
               <input id="makan" class="form-control input-group-lg" type="number" name="makan" title="Biaya Makan" placeholder="Uang Makan" value="" />
             </div>
           <div class="form-group col-xs-12">
               <label for="akomodasi"> Akomodasi </label>
               <input id="akomodasi" class="form-control input-group-lg" type="number" name="akomodasi" title="Biaya Akomodasi" placeholder="biaya untuk penginapan" value="" />
             </div>
           <div class="form-group col-xs-12">
               <label for="transportasi"> Transportasi </label>
               <input id="transportasi" class="form-control input-group-lg" type="number" name="transportasi" title="Biaya Transport" placeholder="biaya untuk transportasi" value="" />
             </div>
           <div class="form-group col-xs-12">
               <label for="total"> Total </label>
               <input id="total" class="form-control input-group-lg" type="number" name="total" title="Biaya Total" placeholder="total biaya keseluruhan" value="" />
             </div>
               <div class="form-group col-xs-12">
                   <div class="btn-group btn-group-justified">
                       <div class="btn-group">
                           <button type="submit" class="btn btn-success"> AJUKAN </button>
                       </div>
                   </div>
             </div>

           </form>
       </div>
       <!--<img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
       <div class="post-detail">
         <div class="user-info">
           <h5><a href="timeline.html" class="profile-link">Alexis Clark</a> <span class="following">following</span></h5>
           <p class="text-muted">Published a photo about 3 mins ago</p>
         </div>
         <div class="reaction">
           <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
           <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
         </div>
         <div class="line-divider"></div>
         <div class="post-text">
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
         </div>
         <div class="line-divider"></div>
         <div class="post-comment">
           <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
           <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
         </div>
         <div class="post-comment">
           <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
           <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
         </div>
         <div class="post-comment">
           <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
           <input type="text" class="form-control" placeholder="Post a comment">
         </div>
       </div>-->
     </div>
   </div>
      <div class="post-container">

      </div>
</div>
          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
        <!--<div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">Who to Follow</h4>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Diana Amber</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Cris Haris</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Brian Walton</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Olivia Steward</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Sophia Page</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
            </div>
          </div>-->
            <!--<div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
                <h5 class="grey"><b>Status Permintaan Anda</b></h5>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Budiman Adi Wibawa</a></h5>
                  <a href="#" class="text-green">Menyetujui Request Anda</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Irwan </a></h5>
                  <a href="#" class="text-green">Menyetujui Request Anda</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Purchasing</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Finance</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              </div>
            </div>-->
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
