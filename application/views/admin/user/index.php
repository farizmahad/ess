

<div class="col-lg-9">
      <h4 class="grey"><i class="fa fa-list"></i> Pengaturan Pengguna </h4>
        <div class="line"></div>
        <br><br><a href="<?php echo base_url(); ?>user"><button type="button" class="btn btn-info" data-toggle="modal"><i class="fa fa-refresh"></i> Refresh</button></a>&nbsp;&nbsp
                   <a href="<?php echo base_url(); ?>Profile/create_user"><button type="button" class="btn btn-info" data-toggle="modal"><i class="fa fa-plus"></i> Tambah User</button></a>&nbsp;&nbsp
                   <a href="<?php echo base_url(); ?>user/create_group"><button type="button" class="btn btn-white" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Group</button></a>&nbsp;&nbsp
                   <br><br>
            <div class="post-content">
            <div class="post-container">
              <div class="table-responsive-lg">
                <table class="table table-striped table-hover" id="example2">
                    <thead>
                        <tr>
            <th width="5%" style="text-align:center;">No</th>
            <th> First Name</th>
            <th> Last Name</th>
            <th> Email </th>
            <th> Groups </th>
                         <th width="30%" style="text-align:center;"> Aksi</th>
          </tr>
                    </thead>
                    <tbody>
                     <?php 
          $no=1;
          foreach($users as $user): 
          ?>
          <tr>
             <td align="center" width="5%"><?php echo $no++; ?></td>
             <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
             <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>   
             <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
             <td ><?php foreach ($user->groups as $group):?>
                  <?php echo anchor("Auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br>
                <?php endforeach?>
                </td>
             
            <td width="30%" align="center">  

            <?php echo anchor("profile/edit_user/".$user->id, '<button class="btn btn-sm btn-success"> Ubah </button>') ;?>
            <a href="#" data-url="<?php echo site_url('Auth/delete_user/'.$user->id);?>" class="btn btn-sm btn-info btn-sm confirm_delete">Hapus</a>

            </td>
        </tr>

    <?php endforeach;?>
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


    
 <script type="text/javascript">
$(document).ready(function(){
  $('.confirm_delete').on('click', function(){
    
    var delete_url = $(this).attr('data-url');

    swal({
      title: "Hapus ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Hapus !",
      cancelButtonText: "Batalkan",
      closeOnConfirm: false     
    }, function(){
     
      window.location.href = delete_url;
    });

    return false;
  });
});

 	
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


