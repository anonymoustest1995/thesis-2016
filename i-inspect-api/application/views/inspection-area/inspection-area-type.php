  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">

    <?php foreach ($type as $x) : ?>
      <h1>
          <?php echo $x->inspection_type_description; ?>
        <small>Control Panel</small>
      </h1>
    </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
      <div class="col col-sm-12">
         <div class="col col-sm-4">
            <div class="panel panel-success">
              <div class="panel-heading">Add <?php echo $x->inspection_type_description; ?> Area to Inspect</div>
                <div class="panel-body">
                  <form role="form" id="create-inspection-area-form" method="post">
                  <div class="form-group">
                    <label class="input-label">Area Description</label>
                      <input type="text" name="area_description" class="form-control" required>
                      <span style="color: red;" id="err_area_description"></span>
                          <input type="hidden" name="inspection_type_id_link" class="form-control" value="<?php echo $x->inspection_type_id; ?>" required>
                      <?php endforeach; ?>
                  </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="save-inspection-area-info">Save</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>

          <div class="col col-sm-8">
            <div class="panel panel-success">
              <div class="panel-heading"><?php echo $x->inspection_type_description; ?> Area Details</div>
              <div class="panel-body">
                  <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>Areas To Be Inspected</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datas as $person) : ?>
                                <tr>
                                    <td><?php echo $person->area_description; ?></td>
                                    <td><a href="<?php echo base_url() . "Admin/delete_area/" . $person->area_id; ?>" onClick="return doconfirm()" class="link fa fa-trash-o" title="Delete"></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
              </div>
        </div>
      </div>
    </form>
  </section>

<script type="text/javascript">
    
    function pagechange(frompage, topage) {
        var page=document.getElementById('formpage_'+frompage);
        if (!page) return false;
        page.style.visibility='hidden';
        page.style.display='none';

        page=document.getElementById('formpage_'+topage);
        if (!page) return false;
        page.style.display='block';
        page.style.visibility='visible';

        return true;
    }

</script>

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



