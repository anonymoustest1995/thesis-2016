
  <!-- Update User Modal -->
<!--     <div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document"> -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onClick="reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update User</h4>
          </div>
          <div class="modal-body">
                <form id="create-user-update-form" method="post">
                    <div class="form-group">
                    <?php foreach ($records as $xy) : ?>
                        <label>Username</label>
                        <input type="text" name="user_username" class="form-control" value="<?php echo $xy->user_username; ?>" readonly/>

                    </div>
                    <div class="form-group">
                        <label for="user_email">Email</label>
                            <input type="text" name="user_email" class="form-control" id="user_email" placeholder="myemail@gmail.com" value="<?php echo $xy->user_email; ?>" />

                            <span style="color: red;" id="err_user_email"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_lastname">Lastname</label>
                            <input type="text" name="user_lastname" class="form-control" id="user_lastname" placeholder="Lastname"
                            required 
                            pattern="^([ \u00c0-\u01ffa-zA-Z'\-])+$" 
                            data-validation-pattern-message="Must be a valid firstname!" 
                            value="<?php echo $xy->user_lastname; ?>" />
                            <span style="color: red;" id="err_user_lastname"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_firstname">Firstname</label>
                            <input type="text" name="user_firstname" class="form-control" id="user_firstname" placeholder="Firstname"
                            required 
                            pattern="^([ \u00c0-\u01ffa-zA-Z'\-])+$" 
                            data-validation-pattern-message="Must be a valid firstname!"
                            value="<?php echo $xy->user_firstname; ?>" />
                            <span style="color: red;" id="err_user_firstname"></span>
                    </div>

                    <div class="form-group">
                        <label for="user_middlename">Middlename</label>
                            <input type="text" name="user_middlename" class="form-control" id="user_middlename" placeholder="Middlename" value="<?php echo $xy->user_middlename; ?>" />
                            <span style="color: red;" id="err_user_middlename"></span>
                    </div>


                    <div class="form-group">
                        <label for="user_gender">Gender</label>
                            <select class="form-control"  id="user_gender" name="user_gender">
                                <option value="<?php echo $xy->user_gender; ?>" selected><?php echo $xy->user_gender; ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="user_position">Position</label>
                            <select class="form-control"  id="user_position" name="user_position">
                            <option selected><?php echo $xy->user_position_link; ?></option>
                            <?php foreach ($userposition as $p) : ?>
                                <option value="<?php echo $p->position_description; ?>"><?php echo $p->position_description; ?></option>
                            <?php endforeach; ?> 
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="user_password">Password</label>
                            <div class="inner-addon left-addon">
                                <input type="password" name="user_password" class="form-control" id="user_password" placeholder="*******" 
                                pattern="^[a-zA-Z0-9]*$" data-validation-pattern-message="Password must only contain letters and numbers." />
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

                    <?php endforeach; ?>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary"    <button type="button" class="btn btn-primary" id="save-user-update-info">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="reload()">Close</button>
                    </div>
                </form>
          
            </div>
        </div>