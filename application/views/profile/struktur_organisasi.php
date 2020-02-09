            <div class="col-md-9 col-sm-10">
				<div class="people-nearby">
					<div class="block-title">
					  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> Struktur Organisasi Divisi <?php echo $nama_divisi; ?> PT. Aartijaya Bandung </h4>
					  
					  <div class="line"></div>
					</div>

					<?php foreach($users_divisi as $us): ?>
					<div class="nearby-user">
						<div class="row">
						  <div class="col-md-2 col-sm-2">
							<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $us->foto; ?>" alt="user" class="profile-photo-lg" />
						  </div>
						  <div class="col-md-6 col-sm-6">
							<h5><a href="<?php echo site_url('ringkasan-profile/'.$us->id);?>" class="profile-link"><?php echo $us->first_name; ?> <?php echo $us->last_name; ?></a></h5>
							<p><?php echo $us->nama_jabatan; ?></p>
							<p class="text-muted"></p>
						  </div>
						  <div class="col-md-3 col-sm-3">
							<button class="btn btn-primary pull-right"><?php echo $us->nama_jabatan; ?></button>
						  </div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
          </div>
		  
          </div>
        </div>
      </div>
    </div>
    