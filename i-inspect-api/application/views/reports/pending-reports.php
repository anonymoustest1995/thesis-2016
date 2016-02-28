
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <ul class="nav nav-tabs">
        <li class="active">
          <a href="pending-reports">Occupancy Reports</a>
        </li>
        <li>
          <a href="approved-reports">Approved Occupancy Reports</a>
        </li>
        </ul>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Building Permit Number</th>
                      <th>Lastname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customer as $person) : ?>
                        <tr>
                            <td><?php echo $person->building_permit_number; ?></td>
                            <td><?php echo $person->customer_lastname;?></td>
                            <td><?php echo $person->customer_firstname;?></td>
                            <td><?php echo $person->customer_middlename;?></td>
                            <td>
                            <!-- <a href="<?php echo base_url() . "Users/delete_user/" . $person->user_id; ?>" onClick="return doconfirm()" class="link fa fa-trash-o" title="Delete"></a> -->
                                &nbsp;&nbsp;
                            <a href="<?php echo base_url() . "admin/detailed-reports/" . $person->building_permit_number; ?>" title="VIEW Detailed Report" target="_blank"><i class="fa fa-pencil-square-o"></i> View Detailed Report</a>
                            </td>
                        </tr>
                    <?php endforeach; ?> 
                </tbody>
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
