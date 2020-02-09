


      <div class="col-md-7">
              <h4> <b>View Goal</b> </h4>
              <?php foreach($goal as $go):?>
                <?php $id_goall=$go->id_goal; ?>
                <?php $id_line_manajer=$go->id_line_manajer; ?>
                  <table class="table">
                      <thead>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Goal</th>
                          <td><?php echo $go->goal; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Description</th>
                          <td><?php echo $go->description; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Category</th>
                          <td><?php echo $go->category_goal; ?></td>
                        </tr>
                          <tr>
                          <th scope="row">Status</th>
                          <td><?php echo $go->status; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Supports</th>
                          <td><?php echo $go->support; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Weight</th>
                          <td><?php echo $go->weight; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Due Date</th>
                          <td><?php echo date_indo($go->due_date); ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Associated Reviews</th>
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
                          
                        </tr>
                      </tbody>
                    </table>


                     <table class="table">
                      <thead>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row" colspan="2">Discussion</th>
                          
                        </tr>
                        <?php
                          foreach($goal_discussion as $dis):
                         ?>
                        <tr>
                          <td>
                            <?php echo $dis->discussion; ?>
                          </td>
                          <td>
                            <?php echo $dis->first_name; ?> <?php echo $dis->last_name; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                       <?php if($id_line_manajer==$id_login) { ?>
                        <tr>
                          <td>
                           <input type="text" class="form-control" data-id_goal="<?php echo $id_goall;; ?>"
                            data-id_user="<?php echo $id_login; ?>" onChange="reply_submit(this,this.value)"
                            placeholder="Kirim komentar di sini">
                            
                           
                          </td>
                        </tr>
                      <?php } ?>

                      </tbody>
                    </table>

              
            
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
           url: "<?php echo base_url() ?>Profile_detail/replay_submit",
           data:{id_goal,replay,id_user},
          success: function(data){
             $('.tampildata').load("<?php echo base_url() ?>Profile_detail/replay/"+id_goal);
           }
        })
  
}

</script>