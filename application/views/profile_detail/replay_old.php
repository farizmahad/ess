      <div class="col-md-7">
              <h4> <b>View Goal</b> </h4>
              <?php foreach($goal as $go):?>
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
                      </tbody>
                    </table>
                  <?php endforeach; ?>
                </div>
                <div class="clearfix"></div>
              </div>
             