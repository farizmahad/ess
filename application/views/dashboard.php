<div class="col-md-9">
   <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> Permintaan anda </h4>
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
            <div class="post-content">
              <!--<img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />-->

               
              <div class="post-container">
                <table class="table table-striped table-hover responsive" id="example2">
                    <thead>
                        <tr>
                          <!--
                            <th scope="col"> No. </th>
                          -->
                            <th scope="col"> No. Permintaan </th>
                            <th scope="col"> Tanggal Permintaan </th>
                            <th scope="col"> Tanggal Dibutuhkan </th>
                            <th scope="col"> Status Sekarang </th>
                            <th scope="col"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                            $jum_permin=count($per_bel_selesai);
                            if($jum_permin > 0) {   
                        $no=0;
                         foreach($per_bel_selesai as $ad):
                         $no++;
                          ?>
                        <tr>
                          <!--
                            <th scope="row"> <?php echo $no; ?></th>
                          -->
                            <td> <?php echo $ad->no_pengajuan; ?></td>
                            <td> <?php echo date_indo($ad->tanggal_pengajuan); ?></td>
                            <td> <?php echo date_indo($ad->tanggal_required); ?></td>
                            <td>

                              <?php
                                  $id_jenis_request=$ad->id_jenis_request;
                                    
                                       
                                  ?>
                               <?php
                                   $id_permintaan=$ad->id_pengajuan;
                                   $status_terakhir=$this->Pengajuan_model->cek_status_terakhir($id_permintaan);
                                   foreach($status_terakhir as $ter){
                                        $user_penerima=$ter->id_penerima;
                                        $urutan=$ter->urutan;
                                        $next_urutan=$urutan+1;

                                        $last_status=$ter->status;
                                        $keterangan=$ter->ket;

                                   
                                     
                                   } ?> 
                                   
                                   <?php if($last_status==0 and $keterangan ==NULL){ ?>

                                        <strong>Menunggu Persetujuan</strong>

                                  <?php  }elseif($last_status==1 and $keterangan=='Selesai'){
                                   ?>
                                      <strong> Selesai</strong>

                                 <?php } ?>
                                     <?php 
                                                $next=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);

                                                foreach($next as $ne){



                                                                 echo $ne->nama_group;
                                                               }
                                                                 
                                                    ?>

                                             
                                              <?php
                                              /*
                                              $cek_users=$this->Pengajuan_model->user_by_id($user_penerima);
                                                 


                                                 foreach($cek_users as $us){

                                                    echo $us->first_name; echo " "; echo $us->last_name;
                                                 }
                                                 */

                                              ?>
                                  


                               <?php     

                                  ?>
                              
                                  
                            </td>
                            <td> <a href="<?php echo base_url();?>Pengajuan/history_pengajuan?id_p=<?php echo $ad->id_pengajuan; ?>">Lihat </a> </td>
                        </tr>
                      <?php endforeach; ?>
                        <?php }else{?>

                                    <tr>
                                        <td colspan="6" align="center">Data tidak ada! </td>
                                    </tr>

                                    <?php } ?>
                        
                    </tbody>
                </table>
             
              </div>
            </div>

           


           
            <!-- Post Content
            ================================================= -->
            <!--<div class="post-content">
              <img src="http://placehold.it/1920x1160" alt="" class="img-responsive post-image" />
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">Anna Young</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 4 hour ago</p>
                  </div>
                  <div class="reaction">
                    <a class="btn text-green"><i class="icon ion-thumbsup"></i> 2</a>
                    <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                  </div>
                  <div class="line-divider"></div>
                  <div class="post-text">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                  </div>
                  <div class="line-divider"></div>
                  <div class="post-comment">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                    <p><a href="timeline.html" class="profile-link">Julia </a>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                  </div>
                  <div class="post-comment">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                    <input type="text" class="form-control" placeholder="Post a comment">
                  </div>
                </div>
              </div>
            </div>-->
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

