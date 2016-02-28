
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php foreach ($count as $x) : ?>
      <h1>
        Lists of Customers
      </h1>
    <?php endforeach; ?>
        
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
                      <th>Contact No.</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $person) : ?>
                        <tr>
                            <td><?php echo $person->customer_lastname;?></td>
                            <td><?php echo $person->customer_firstname;?></td>
                            <td><?php echo $person->customer_middlename;?></td>
                            <td><?php echo $person->customer_tel_no;?></td>
                            <td>
                                <?php echo $person->customer_address_no;?>
                            </td>
                            <td><a href="<?php echo base_url() . "Users/delete_user/" . $person->customer_id; ?>" onClick="return doconfirm()" class="link fa fa-trash-o" title="Delete"></a></td>
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
