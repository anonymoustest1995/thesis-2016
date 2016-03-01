
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Assign Inspection for Occpancy
        <small>Control panel</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="alert alert-warning alert-dismissible" role="alert">
        <i class="glyphicon glyphicon-info-sign"></i>  <strong>Select a Building Permit Number or Customer to Assign.</strong>
      </div>
      <!-- Main row -->
      <div class="row">
            <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>Building Permit Number</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $person) : ?>
                        <tr>
                            <td><?php echo $person->building_permit_number; ?></td>
                            <td><?php echo $person->customer_lastname;?> </td>
                            <td><?php echo $person->customer_firstname;?> </td>
                            <td><?php echo $person->customer_middlename;?></td>
                            <td>
                              <a href="<?php echo base_url() . "admin/customer-form/" . $person->building_permit_number; ?>" title="Assign Now"> Assign Now </a>
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