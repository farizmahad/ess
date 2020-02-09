         <div class="col-md-7">
              <h4> <b>Detail Capaian Individu</b> </h4>
              <?php foreach($goal as $go):?>
                <?php $id_goall=$go->id_goal; ?>
                <?php $id_line_manajer=$go->id_line_manajer; ?>
                <?php
                    $id_pembuat=$go->id_user;
                 ?>
                  <table class="table">
                      <thead>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Capaian Individu</th>
                          <td><?php echo $go->goal; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Keterangan</th>
                          <td><?php echo $go->description; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Kategori</th>
                          <td><?php echo $go->category_goal; ?></td>
                        </tr>
                          <tr>
                          <th scope="row">Status</th>
                          <td><?php
                               if($go->status_selesai==0){
                                echo "<strong>Sedang dalam proses</strong>";
                               }elseif($go->status_selesai==1){
                                echo "<strong>Pending</strong>";
                               }elseif($go->status_selesai==2){
                                echo "<strong>Selesai</strong>";
                               }
                              ?>
                             
                            </td>
                        </tr>
                        <tr>
                          <th scope="row">Supports</th>
                          <td><?php echo $go->support; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Beban</th>
                          <td><?php echo $go->weight; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Jatuh Tempo</th>
                          <td><?php echo date_indo($go->due_date); ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Tinjauan Terkait</th>
                          <td><?php echo $go->reviews; ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
					
					<table class="table">
                      <thead>
                      </thead>
                      <tbody>
                        <tr>
                            <td><h3>Diskusi</h3></td>
                        </tr>
                      </tbody>
                    </table>

					<div class="post-content">
						<div class="post-container">
						
						<div class="post-detail">
						  <div class="user-info">
							
			
						  </div>
						  <div class="reaction">
							
						  </div>
						 
						  <div class="post-text">
							
						  </div>
						  
 
              <?php foreach($goal_discussion as $go):?>
						  <div class="post-comment">
							<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $go->foto; ?>" alt="" class="profile-photo-sm" />
							<p><a href="timeline.html" class="profile-link"><?php echo $go->first_name; ?> <?php echo $go->last_name; ?> </a>

                <br>

                                <?php 
                                $tanggal_discussion=$go->date_discussion;
                                
                                 $array1=explode(" ",$tanggal_discussion);
                                 $date=$array1[0];
                                 $time=$array1[1];

                                echo date_indo($date); echo " ";echo $time;?>
                <br>

              <?php echo $go->discussion; ?> </p>
						  </div>

            <?php endforeach; ?>
						  
						  <div class="post-comment">
							<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $foto_login; ?>" alt="" class="profile-photo-sm" />
							<input type="text" class="form-control" data-id_goal="<?php echo $id_goall; ?>"
                            data-id_user="<?php echo $id_login; ?>" onChange="reply_submit(this,this.value)"
                            placeholder="Tinggalkan komentar">
						  </div>
						</div>
						</div>
					</div>

                     <!--<table class="table">
                      <thead>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row" colspan="2">Discussion</th>
                          
                        </tr>
                        <//?php
                          foreach($goal_discussion as $dis):
                         ?>
                        <tr>
                          <td>
                            <//?php echo $dis->discussion; ?>
                          </td>
                          <td>
                            <//?php echo $dis->first_name; ?> <//?php echo $dis->last_name; ?>
                          </td>
                        </tr>
                      <//?php endforeach; ?>
                       <//?php if($id_line_manajer==$id_login or $id_login==$id_pembuat) { ?>
                        <tr>
                          <td>
                           <input type="text" class="form-control" data-id_goal="<//?php echo $id_goall;; ?>"
                            data-id_user="<//?php echo $id_login; ?>" onChange="reply_submit(this,this.value)"
                            placeholder="Kirim komentar di sini">
                            
                           
                          </td>
                        </tr>
                      <//?php } ?>

                      </tbody>
                    </table>-->

              
            
            </div>
          </div>
 
                </div>
                
              </div>



              <script>
function reply_submit(obj,val) {
      var id_goal = obj.getAttribute('data-id_goal');
      var id_user = obj.getAttribute('id_user');
      var replay=val;

        $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>Profile_Detail/replay_submit",
           data:{id_goal,replay,id_user},
          success: function(data){
             $('.tampildata').load("<?php echo base_url() ?>Profile_Detail/replay/"+id_goal);
           }
        })
  
}

</script>