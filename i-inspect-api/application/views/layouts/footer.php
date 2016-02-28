    
    

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.2
        </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
    </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
      
      <script>
        function doconfirm()
        {
            job=confirm("Are you sure to delete Record?");
            if(job!=true)
            {
                return false;
            } else{
                alert("Succesfully Deleted !");
            }
        }
        function reload()
        {
            window.location.reload();
        }
       
    </script>

      <!-- jQuery 2.1.4 -->
      <script src="<?php echo base_url('assets/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>


      <!-- Helper Javascript -->
      <script src="<?php echo base_url('assets/js/helper.js'); ?>"></script>

      <!--  Custom Javascript -->
      <script src="<?php echo base_url('assets/js/modules/insert.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/modules/update.js'); ?>"></script>



      <!-- Bootstrap 3.3.5 -->
      <script src="<?php echo base_url('assets/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js'); ?>"></script>
      
      <!-- Slimscroll -->
      <script src="<?php echo base_url('assets/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url('assets/bower_components/AdminLTE/plugins/fastclick/fastclick.js'); ?>"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url('assets/bower_components/AdminLTE/dist/js/app.min.js'); ?>"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo base_url('assets/bower_components/AdminLTE/dist/js/demo.js'); ?>"></script>
      <!-- DataTables -->
      <script src="<?php echo base_url('assets/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>

  </body>
</html>