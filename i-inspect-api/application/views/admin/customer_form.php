  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assign Inspection for Occpancy
        <small>Customer Details</small>
      </h1>
    </section>
  <!-- Main content -->
    <section class="content">
      <form role="form" id="create-assign-form" method="post">
      <div class="row">
        <?php foreach ($datas as $person) : ?>
        <div class="col col-sm-12">
          <div class="panel panel-danger">
            <div class="panel-heading">Customer Information</div>
            <div class="panel-body">
              <div class="col col-sm-6">
                <div class="form-group">
                    <label class="control-label">Building Permit Number</label>
                      <input type="hidden" class="form-control" name="building_permit_number" value="<?php echo $person->building_permit_number; ?>" readonly>
                      <span  class="form-control">
                        <?php echo $person->building_permit_number; ?>
                      </span>
                      <input type="hidden" name="purpose" value="Occupancy">
                </div>
                  <div class="form-group">
                    <label class="control-label">Customer Name</label>
                    <input type="hidden" name="customer_lastname"   value="<?php echo $person->customer_lastname; ?>">
                    <input type="hidden" name="customer_firstname"  value="<?php echo $person->customer_firstname; ?>">
                    <input type="hidden" name="customer_middlename" value="<?php echo $person->customer_middlename; ?>">
                        <span class="form-control" readonly>
                            <?php echo $person->customer_lastname; ?>, <?php echo $person->customer_firstname; ?> <?php echo $person->customer_middlename; ?>
                        </span>
                  </div>
                  <div class="form-group">
                        <label class="control-label">TIN</label>
                          <input type="hidden" class="form-control" name="customer_tin_no" value="<?php echo $person->customer_tin_no; ?>" readonly>
                          <span class="form-control">
                            <?php echo $person->customer_tin_no; ?>
                          </span>
                  </div>                
                  <div class="form-group">
                    <label class="control-label">Form of Ownership</label>
                      <input type="hidden" class="form-control" name="customer_form_of_ownership" value="<?php echo $person->customer_form_of_ownership; ?>" readonly>
                      <span class="form-control" >
                        <?php echo $person->customer_form_of_ownership; ?>
                      </span>
                  </div>
              </div>  
            <div class="col col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Address</label>
                        <input type="hidden" class="form-control" name="customer_address_no" value="<?php echo $person->customer_address_no; ?>">
                        <input type="hidden" class="form-control" name="customer_address_street" value="<?php echo $person->customer_address_street; ?>">
                        <input type="hidden" class="form-control" name="customer_address_barangay" value="<?php echo $person->customer_address_barangay; ?>">
                        <input type="hidden" class="form-control" name="customer_address_city_or_municipality" value="<?php echo $person->customer_address_city_or_municipality; ?>">

                        <span class="form-control" readonly>
                            <?php echo $person->customer_address_no; ?>
                            <?php echo $person->customer_address_street; ?>,
                            <?php echo $person->customer_address_barangay; ?>,
                            <?php echo $person->customer_address_city_or_municipality; ?>
                        </span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Contact</label>
                        <input type="hidden" class="form-control" name="customer_tel_no" value="<?php echo $person->customer_tel_no; ?>" readonly>
                        <span class="form-control">
                          <?php echo $person->customer_tel_no; ?>
                        </span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Type of Occupancy</label>
                        <input type="hidden" class="form-control" name="occupancy_type_description" value="<?php echo $person->occupancy_type_description; ?>" readonly>
                        <span class="form-control">
                            <?php echo $person->occupancy_type_description; ?>
                        </span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Construction Address</label>
                        <input type="hidden" class="form-control" name="customer_location_address_no" value="<?php echo $person->customer_location_address_no; ?>">
                        <input type="hidden" class="form-control" name="customer_location_address_street" value="<?php echo $person->customer_location_address_street; ?>">
                        <input type="hidden" class="form-control" name="customer_location_address_barangay" value="<?php echo $person->customer_location_address_barangay; ?>">
                        <input type="hidden" class="form-control" name="customer_location_address_city_or_municipality" value="<?php echo $person->customer_location_address_city_or_municipality; ?>">

                        <span class="form-control" readonly>
                            <?php echo $person->customer_location_address_no; ?>
                            <?php echo $person->customer_location_address_street; ?>
                            <?php echo $person->customer_location_address_barangay; ?>
                            <?php echo $person->customer_location_address_city_or_municipality; ?>
                        </span>
                    </div>
                </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="col col-sm-12">
         <div class="col col-sm-4">
            <div class="panel panel-success">
              <div class="panel-heading">Assign Here</div>
              <div class="panel-body">
                <div class="form-group">
                  <?php $positions['#'] = 'Please Select'; ?>
                  <label for="positions">Inspector Type: </label>
                  <?php echo form_dropdown('position_id', $positions, '#','id="positions"'); ?>
                </div>
                <div class="form-group">
                <?php $user['#'] = 'Please Select'; ?>
                <label for="users">Inspector Name: </label>
                  <?php echo form_dropdown('user_id_link', $user, '#', 'id="users"'); ?>
                </div>
                <button type="button" id="save-assign-info" class="btn btn-success"> <i class="fa fa-check-square-o"></i> SAVE</button>
                </div>
            </div>
          </div>

          <div class="col col-sm-8">
            <div class="panel panel-success">
              <div class="panel-heading">Assigning Details</div>
              <div class="panel-body">
                  <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>Building Permit Number</th>
                              <th>Inspection Type</th>
                              <th>Inspector</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($assigned as $person) : ?>
                                <tr>
                                    <td><?php echo $person->building_permit_number; ?></td>
                                    <td><?php echo $person->position_description;?></td>
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
            </div>
          </div>

      </div>
    </form>
  </section>
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


  <script type="text/javascript">
    $(document).ready(function(){       
        $('#positions').change(function(){ //any select change on the dropdown with id country trigger this code         
            $("#users > option").remove(); //first of all clear select items
            var positions_id = $('#positions').val();  // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                url: "http://localhost/i-inspect-api/admin/get_user/"+positions_id, //here we are calling our user controller and get_cities method with the country_id
                 
                success: function(users) //we're calling the response json array 'cities'
                {
                    $.each(users,function(user_id,user_username) //here we're doing a foeach loop round each city with id as the key and city as the value
                    {
                        var opt = $('<option />'); // here we're creating a new select option with for each city
                        opt.val(user_id);
                        opt.text(user_username);
                        $('#users').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                    });
                }
                 
            });
             
        });
    });
    // ]]>
</script>



