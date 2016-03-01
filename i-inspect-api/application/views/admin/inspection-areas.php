
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Inspection Areas  <small>CONTROL PANEL</small>
      </h1>
    </section>

    <!-- Add Inspection type Modal -->
    <div class="modal fade" id="addInspectionTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Inspection Area</h4>
          </div>
          <div class="modal-body">
                <form id="create-inspection-type-form" method="post">
                    <div class="form-group">
                        <label for="inspection_type_description">Inspection Area Description</label>
                            <input type="text" name="inspection_type_description" class="form-control" id="inspection_type_description" placeholder="Description"/>
                            <span style="color: red;" id="err_inspection_type_description"></span>
                    </div>
                    <div class="form-group">
                        <label for="position_description">Inspector Description</label>
                            <input type="text" name="position_description" class="form-control" id="position_description" placeholder="ex. Electrical Inspector"/>
                            <span style="color: red;" id="err_position_description"></span>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="save-inspection-type-info">Save</button>
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
                <a href="#" data-toggle="modal" data-target="#addInspectionTypeModal" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Inspection Area</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>Inspection Areas</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $person) : ?>
                      <tr>
                          <td><?php echo $person->inspection_type_description; ?></td>
                          <td><a href="<?php echo base_url() . "Admin/delete_inspection_type/" . $person->inspection_type_id; ?>" onClick="return doconfirm()" class="link fa fa-trash-o" title="Delete"></a>
                          &nbsp;&nbsp;
                          <a href="<?php echo base_url() . "admin/inspection-type-area-details/" . $person->inspection_type_id; ?>" > See Details</a>
                          </td>
                      </tr>
                  <?php endforeach; ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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
