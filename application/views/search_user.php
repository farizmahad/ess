<div id="page-contents">
	<div class="container-fluid">
		<div class="row">
			<!-- Newsfeed Common Side Bar Left
	  ================================================= -->
			<div class="col-md-6 col-sm-12 col-xs-12">
			<!-- Post Create Box
			================================================= -->
				<!-- Friend List
				================================================= -->
				<div class="friend-list">
					<div class="row">
						<?php if(count($search)){ ?>
						<h4>
						 &nbsp;&nbsp;&nbsp; Ditemukan <?php echo count($search); ?> hasil
						</h4>
						<?php } ?>
						
						<?php if (count($search) > 0){
							foreach($search as $se):?>
								<div class="col-md-12 col-sm-6 col-xs-6">
								  <div class="friend-card">
									<br/>
									<br/>
									<!--<img src="<?php echo base_url(); ?>files/foto_user/back.png" alt="profile-cover" class="img-responsive cover" />-->
									<div class="card-info">
									  <?php if($se->foto){?>
									  <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $se->foto; ?>" alt="user" class="profile-photo-lg" />
									  <?php } ?>
									  <div class="friend-info">
										<h5><a href="<?php echo base_url(); ?>/ringkasan-profile/<?php echo $se->id; ?>" class="profile-link"><?php echo $se->first_name;  ?> <?php echo $se->last_name; ?></a></h5>
										<p><?php echo $se->nama_jabatan; ?></p>
									  </div>
									</div>
								  </div>
								</div>
							<?php endforeach;?>
						<?php }else{ ?>
						<div>
							<br><br>
							 <h4 align="center"> Pencarian anda tidak ditemukan! </h4>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>

			<!-- Newsfeed Common Side Bar Right
	  ================================================= -->
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="suggestions" id="sticky-sidebar">
				  <h4 class="grey">Lihat juga lainnya</h4>
					<?php foreach($user_search as $row):?>
					<div class="follow-user">
					<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $row->foto; ?>" alt="" class="profile-photo-sm pull-left" />
						<div>
						  <h5><a href="<?php echo base_url(); ?>/ringkasan-profile/<?php echo $row->id; ?>" target="_blank"><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></a></h5>
						  <a href="<?php echo base_url(); ?>/ringkasan-profile/<?php echo $row->id; ?>" target="_blank" class="text-green">Lihat Profile</a>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>