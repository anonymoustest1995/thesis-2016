  <!-- Content Wrapper. Contains page content -->
  <div class="content-area">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assign Annual Inspection
        <small>Customer Details</small>
      </h1>
    </section>

    <!-- Add Inspection Type -->
    <div class="modal fade" id="addInspectionTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Inspection Type</h4>
          </div>
          <div class="modal-body">
                <form id="create-inspection-type-form" method="post">
                    
                    <div class="form-group">
                        <label for="inspection_type_description">Description</label>
                            <input type="text" name="inspection_type_description" class="form-control" id="inspection_type_description" placeholder="Description"/>
                            <span style="color: red;" id="err_inspection_type_description"></span>
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


    <div class="con">
      <form class="form-horizontal" role="form" id="create-assign-annual-form" method="post">
        <?php foreach ($data as $person) : ?>
          <div id="formpage_1" style="visibility: visible; display: block;"> 
            <div class="form-group">
                <label class="control-label col-sm-5">Occupancy Permit Number</label>
                <div class="col-sm-7">
                  
                  <input type="text" class="form-control" value="<?php echo $person->occupancy_number; ?>" readonly>
                  
                  <input type="hidden" name="building_permit_number_link" value="<?php echo $person->building_permit_number; ?>" readonly>
                  <input type="hidden" name="purpose" value="Annual">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Customer Name</label>
                <div class="col-sm-7">
                    <span class="form-control" readonly>
                        <?php echo $person->customer_lastname; ?>, <?php echo $person->customer_firstname; ?> <?php echo $person->customer_middlename; ?>
                    </span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5">TIN</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" value="<?php echo $person->customer_tin_no; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5">Form of Ownership</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" value="<?php echo $person->customer_form_of_ownership; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5">Address</label>
              <div class="col-sm-7">
                <span class="form-control" readonly>
                    <?php echo $person->customer_address_no; ?>
                    <?php echo $person->customer_address_street; ?>,
                    <?php echo $person->customer_address_barangay; ?>,
                    <?php echo $person->customer_address_city_or_municipality; ?>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5">Contact</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" value="<?php echo $person->customer_tel_no; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5">Type of Occupancy</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" value="<?php echo $person->occupancy_type_description; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5">Construction Address</label>
              <div class="col-sm-7">

                <span class="form-control" readonly>
                    <?php echo $person->customer_location_address_no; ?>
                    <?php echo $person->customer_location_address_street; ?>
                    <?php echo $person->customer_location_address_barangay; ?>
                    <?php echo $person->customer_location_address_city_or_municipality; ?>
                </span>
              </div>
            </div>

                <ul class="pager">
                    <li class="next"><a href="#" onclick="pagechange(1,2);">Next</a></li>
                </ul>
            </div>

        <?php endforeach; ?>

        <!-- page 2 -->
            <div id="formpage_2" style="visibility: hidden; display: none;">
                <div class="form-group">
                    <label class="control-label col-sm-5">Occupancy Permit Number</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php echo $person->occupancy_number; ?>" readonly>
                    </div>
                </div>
                
                <div class="form-group">
                        <label class="control-label col-sm-5">Inspector And Inspection Type</label>
                        <div class="col-sm-7">
                            <!-- <input type="text" class="form-control" name=""> -->
                            <select class="form-control" name="user_id_link">
                                <option>SELECT</option>
                                <?php foreach($users as $val){ ?>
                                    <option value="<?php echo $val->user_id;?>">
                                    <?php echo $val->user_lastname;?>, 
                                    <?php echo $val->user_firstname;?>
                                    <?php echo $val->user_middlename;?>
                                    - <?php echo $val->user_position_link;?>
                                    </option> 
                                <?php } ?>
                            </select>
                        </div>
                </div>

                <ul class="pager">
                    <li class="prev"><a href="#" onclick="pagechange(2,1);">Previous</a></li>
                    <li class="next"><a href="" type="button" id="save-assign-annual-info">SAVE</a></li>
                </ul>
            </div>
      </form>
    </div>
    
      <h2>
        Annual Inspectors and Their Assigned Occupancy Permit Numbers
      </h2>

        <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>Occupancy Permit Number</th>
              <th>Customer Name</th>
              <th>Inspection Type</th>
              <th>Inspector</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assigned as $person) : ?>
                <tr>
                    <td><?php echo $person->occupancy_number; ?></td>
                    <td><?php echo $person->customer_lastname;?>,
                        <?php echo $person->customer_firstname;?>
                        <?php echo $person->customer_middlename;?>
                    </td>
                    <td><?php echo $person->user_position_link;?></td>
                    <td><?php echo $person->user_lastname;?>,
                        <?php echo $person->user_firstname;?>
                        <?php echo $person->user_middlename;?>
                    </td>
                    <td><a href="<?php echo base_url() . "Admin/delete_assign/" . $person->assigned_id; ?>" onClick="return doconfirm()" class="link fa fa-trash-o" title="Delete"></a>
                    </td>
                </tr>
            <?php endforeach; ?> 
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->

  </div>
  <!-- /.content-wrapper -->

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


