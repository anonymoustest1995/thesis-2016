
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php foreach ($count as $x) : ?>
      <h1>
        Users Lists
      </h1>
      <span>Numbers of All Users: <?php echo $x->number_of_users; ?></span>
    <?php endforeach; ?>
        
    </section>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add User</h4>
          </div>
          <div class="modal-body">
                <form id="create-user-form" method="post">
                    <div class="form-group">
                        <label for="user_username">Username</label>
                            <input type="text" name="user_username" class="form-control" id="user_username" placeholder="Username"/>
                            <span style="color: red;" id="err_user_username"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_email">Email</label>
                            <input type="text" name="user_email" class="form-control" id="user_email" placeholder="myemail@gmail.com"/>
                            <span style="color: red;" id="err_user_email"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_lastname">Lastname</label>
                            <input type="text" name="user_lastname" class="form-control" id="user_lastname" placeholder="Lastname"
                            required 
                            pattern="^([ \u00c0-\u01ffa-zA-Z'\-])+$" 
                            data-validation-pattern-message="Must be a valid firstname!" />
                            <span style="color: red;" id="err_user_lastname"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_firstname">Firstname</label>
                            <input type="text" name="user_firstname" class="form-control" id="user_firstname" placeholder="Firstname"
                            required 
                            pattern="^([ \u00c0-\u01ffa-zA-Z'\-])+$" 
                            data-validation-pattern-message="Must be a valid firstname!" />
                            <span style="color: red;" id="err_user_firstname"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_middlename">Middlename</label>
                            <input type="text" name="user_middlename" class="form-control" id="user_middlename" placeholder="Middlename"/>
                            <span style="color: red;" id="err_user_middlename"></span>
                    </div>


                    <div class="form-group">
                        <label for="user_gender">Gender</label>
                            <select class="form-control"  id="user_gender" name="user_gender">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="user_position">Position</label>
                            <select class="form-control"  id="user_position" name="user_position">
                            <?php foreach ($userposition as $p) : ?>
                                <option value="<?php echo $p->position_id; ?>"><?php echo $p->position_description; ?></option>
                            <?php endforeach; ?> 
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="user_password">Password</label>
                            <div class="inner-addon left-addon">
                                <input type="password" name="user_password" class="form-control" id="user_password" placeholder="*******" 
                                pattern="^[a-zA-Z0-9]*$" data-validation-pattern-message="Password must only contain letters and numbers."/>
                            </div>
                            <span style="color: red;" id="err_user_password"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_confirm_password">Confirm Password</label>
                            <div class="inner-addon left-addon">
                                <input type="password" name="user_confirm_password" class="form-control" id="user_confirm_password" placeholder="*******"/>
                            </div>
                            <span style="color: red;" id="err_user_confirm_password"></span>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="save-user-info">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="reload()">Close</button>
                    </div>
                </form>                  
            </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
          <div class="box">
            <div class="box-header">
                <a href="#" data-toggle="modal" data-target="#addUserModal" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp; Add User</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Username</th>
                      <th>Lastname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Position</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $person) : ?>
                        <tr>
                        <input type="hidden" name="user_id" value="<?php echo $person->user_id; ?>">
                            <td><?php echo $person->user_username;?></td>
                            <td><?php echo $person->user_lastname;?></td>
                            <td><?php echo $person->user_firstname;?></td>
                            <td><?php echo $person->user_middlename;?></td>
                            <td><?php echo $person->position_description;?></td>
                            <td><?php echo $person->user_gender;?></td>
                            <td><?php echo $person->user_email; ?></td>
                            <td><a href="<?php echo base_url() . "Users/delete_user/" . $person->user_id; ?>" onClick="return doconfirm()" class="link fa fa-trash-o" title="Delete"></a>
                                &nbsp;&nbsp;
                                <a href="<?php echo base_url() . "Users/update_user_info/" . $person->user_id; ?>"  data-toggle="modal" data-target="#updateUserModal" title="Update" class="link fa fa-pencil-square-o"></a>
                               </td>
                        </tr>
                    <?php endforeach; ?> 
                </tbody>
                <tfoot>
                <tr>
                      <th>User ID</th>
                      <th>Username</th>
                      <th>Lastname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Update User Modal -->
    <div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update User</h4>
          </div>
          <div class="modal-body">
                <form id="create-user-update-form" method="post">
                    <div class="form-group">
                    <?php foreach ($records as $xy) : ?>
                        <label for="user_username">Username</label>
                        <?php echo $xy->user_username; ?>
                           <!--  <input type="text" name="user_username" class="form-control" placeholder="Username" value=""/> -->
                           <?php endforeach; ?> 
                    </div>
                    <div class="form-group">
                        <label for="user_email">Email</label>
                            <input type="text" name="user_email" class="form-control" id="user_email" placeholder="myemail@gmail.com"/>
                            <span style="color: red;" id="err_user_email"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_lastname">Lastname</label>
                            <input type="text" name="user_lastname" class="form-control" id="user_lastname" placeholder="Lastname"
                            required 
                            pattern="^([ \u00c0-\u01ffa-zA-Z'\-])+$" 
                            data-validation-pattern-message="Must be a valid firstname!" />
                            <span style="color: red;" id="err_user_lastname"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_firstname">Firstname</label>
                            <input type="text" name="user_firstname" class="form-control" id="user_firstname" placeholder="Firstname"
                            required 
                            pattern="^([ \u00c0-\u01ffa-zA-Z'\-])+$" 
                            data-validation-pattern-message="Must be a valid firstname!" />
                            <span style="color: red;" id="err_user_firstname"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_middlename">Middlename</label>
                            <input type="text" name="user_middlename" class="form-control" id="user_middlename" placeholder="Middlename"/>
                            <span style="color: red;" id="err_user_middlename"></span>
                    </div>


                    <div class="form-group">
                        <label for="user_gender">Gender</label>
                            <select class="form-control"  id="user_gender" name="user_gender">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="user_position">Position</label>
                            <select class="form-control"  id="user_position" name="user_position">
                            <?php foreach ($userposition as $p) : ?>
                                <option value="<?php echo $p->position_description; ?>"><?php echo $p->position_description; ?></option>
                            <?php endforeach; ?> 
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="user_password">Password</label>
                            <div class="inner-addon left-addon">
                                <input type="password" name="user_password" class="form-control" id="user_password" placeholder="*******" 
                                pattern="^[a-zA-Z0-9]*$" data-validation-pattern-message="Password must only contain letters and numbers."/>
                            </div>
                            <span style="color: red;" id="err_user_password"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_confirm_password">Confirm Password</label>
                            <div class="inner-addon left-addon">
                                <input type="password" name="user_confirm_password" class="form-control" id="user_confirm_password" placeholder="*******"/>
                            </div>
                            <span style="color: red;" id="err_user_confirm_password"></span>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="save-user-update-info">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="reload()">Close</button>
                    </div>
                </form>
          
            </div>
        </div>
      </div>
    </div>

<script src="<?php echo base_url('assets/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>


<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
</script>




















































