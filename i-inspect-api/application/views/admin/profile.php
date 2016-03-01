
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">

<div class="col-lg-12 col-sm-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="../assets/bower_components/AdminLTE/dist/img/avatar04.png">
        </div>
        <div class="useravatar">
            <img alt="" src="../assets/bower_components/AdminLTE/dist/img/avatar04.png">
        </div>
        <div class="card-info"> <span class="card-title">
        <?php echo $this->session->userdata('user_lastname'); ?>, <?php echo $this->session->userdata('user_firstname'); ?> <?php echo $this->session->userdata('user_middlename'); ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="fa fa-user" aria-hidden="true"></span>
                <div class="hidden-xs">BASIC INFOMATION</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span  class="fa fa-envelope" aria-hidden="true"></span>
                <div class="hidden-xs">Email</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                <div class="hidden-xs">Edit Account</div>
            </button>
        </div>
    </div>

    <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <div class="form-group">
            <label class="input-label">Username</label>
            <span class="form-control"><?php echo $this->session->userdata('user_username'); ?></span>
          </div>
          <div class="form-group">
          <label class="input-label">Gender</label>
           <span class="form-control"><?php echo $this->session->userdata('user_gender'); ?></span>
          </div>
          <div class="form-group">
          <label class="input-label">Position</label>
           <span class="form-control"><?php echo $this->session->userdata('user_position'); ?></span>
          </div>
        </h3>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3>
            <div class="form-group">
              <label class="input-label">Email</label>
              <span class="form-control"><?php echo $this->session->userdata('user_email'); ?></span>
            </div>
           </h3>
        </div>
        <div class="tab-pane fade in" id="tab3">
          <h3>Edit Account</h3>
        </div>
      </div>
    </div>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
