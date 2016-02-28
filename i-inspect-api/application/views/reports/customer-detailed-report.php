
<div class="container" style="margin-top:30px;">
  <div class="col-lg-12">
    <div class="row">
      <form id="create-approved-form" method="post">
      <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Occupancy Inspection Detailed Report</h3>
          </div>
          <div class="panel-body">
          
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><strong  style="text-transform: uppercase;">Customer Information</strong ></h3>
              </div>

              <div class="panel-body">
              <?php foreach ($customer as $person) : ?>
                  <div class="row">
                    <div class="col-sm-8 form-group">
                      <label>Building Permit Number</label>
                        <span class="form-control"><?php echo $person->building_permit_number; ?></span>
                        <input type="hidden" name="building_permit_number_link" value="<?php echo $person->building_permit_number; ?>">
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>TIN</label>
                      <span class="form-control"><?php echo $person->customer_tin_no; ?></span>
                    </div>
                  </div>
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>Last Name</label>
                    <span class="form-control"><?php echo $person->customer_lastname; ?></span>
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>First Name</label>
                    <span class="form-control"><?php echo $person->customer_firstname; ?></span>
                  </div>
                   <div class="col-sm-4 form-group">
                    <label>Middle Name</label>
                    <span class="form-control"><?php echo $person->customer_middlename; ?></span>
                  </div>
                </div>          
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>Address</label>
                    <span class="form-control">
                        <?php echo "#".$person->customer_address_no        ." " . 
                                      $person->customer_address_street    ." , ".
                                      $person->customer_address_barangay  ." , ".
                                      $person->customer_address_city_or_municipality ;?>
                    </span>
                  </div>

                  <div class="col-sm-6 form-group">
                    <label>Construction Address</label>
                    <span class="form-control">
                          <?php echo "#".$person->customer_location_address_no        ." " . 
                                          $person->customer_location_address_street    ." , ".
                                          $person->customer_location_address_barangay  ." , ".
                                          $person->customer_location_address_city_or_municipality ;?>
                    </span>
                    </div>
                </div> 
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>Form of Ownership</label>
                    <span class="form-control"><?php echo $person->customer_form_of_ownership; ?></span>
                  </div>  
                  <div class="col-sm-4 form-group">
                    <label>Telephone / Cellphone Number</label>
                    <span class="form-control"><?php echo $person->customer_tel_no; ?></span>
                  </div>  
                  <div class="col-sm-4 form-group">
                    <label>Occupancy Type</label>
                    <span class="form-control"><?php echo $person->occupancy_type_description; ?></span>
                  </div>
                </div>
                  <?php endforeach; ?> 
              </div>
            </div>

            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><strong style="text-transform: uppercase;">Architectural Report R.A 9266</strong ></h3>
              </div>
              <div class="panel-body">
              <?php foreach ($architectural as $arch) : ?>
                    <div class="row">
                      <div class="col-sm-4 form-group">
                        <label>Inspector Name</label>
                        <span class="form-control"><?php echo $arch->user_lastname; ?>, <?php echo $arch->user_firstname; ?>  <?php echo $arch->user_middlename; ?> </span>
                      </div>
                      <div class="col-sm-4 form-group">
                        <label>Least Floor To Celling</label>
                        <span class="form-control"><?php echo $arch->least_floor_to_celling; ?></span>
                      </div>  
                      <div class="col-sm-4 form-group">
                        <label>Estimated Ventilation</label>
                        <span class="form-control"><?php echo $arch->estimated_ventilation; ?></span>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-sm-4 form-group">
                        <label>Date/Time Inspected</label>
                        <span class="form-control"><?php echo $arch->datetime; ?></span>
                      </div>

                      <div class="col-sm-4 form-group">
                        <label>Payment</label>
                        <span class="form-control">Php <?php echo $arch->payment; ?></span>
                      </div>
                      <div class="col-sm-4 form-group">
                        <label>Remarks</label>
                        <span class="form-control"><?php echo $arch->remarks; ?></span>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                        <label>Feedbacks</label>
                        <p><?php echo $arch->feedbacks; ?></p>
                      </div>  
                    </div>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><strong style="text-transform: uppercase;">Structural Report R.A 544 / 1582</strong ></h3>
              </div>
              <div class="panel-body">
            <?php foreach ($structural as $struc) : ?>
                    <div class="row">
                    <div class="col-sm-3 form-group">
                        <label>Inspector Name</label>
                        <span class="form-control"><?php echo $struc->user_lastname; ?>, <?php echo $struc->user_firstname; ?>  <?php echo $struc->user_middlename; ?> </span>
                      </div>
                      <div class="col-sm-3 form-group">
                        <label>Footing Size</label>
                        <span class="form-control"><?php echo $struc->footing_size; ?></span>
                      </div>  
                      <div class="col-sm-3 form-group">
                        <label>Column Size</label>
                        <span class="form-control"><?php echo $struc->column_size; ?></span>
                      </div>
                      <div class="col-sm-3 form-group">
                        <label>Main Rebars Size</label>
                        <span class="form-control"><?php echo $struc->main_rebars_size; ?></span>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4 form-group">
                        <label>Date/Time Inspected</label>
                        <span class="form-control"><?php echo $struc->datetime; ?></span>
                      </div>
                      <div class="col-sm-4 form-group">
                        <label>Payment</label>
                        <span class="form-control"><?php echo $struc->payment; ?></span>
                      </div>
                      <div class="col-sm-4 form-group">
                        <label>Remarks</label>
                        <span class="form-control"><?php echo $struc->remarks; ?></span>
                      </div>
                    </div>
                    <div class="row">
                          <div class="col-sm-12 form-group">
                          <label>Feedbacks</label>
                          <p><?php echo $struc->feedbacks; ?></p>
                        </div>  
                    </div>
                  <?php endforeach; ?>
              </div>
          </div>

          <div id="formpage_3" class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><strong style="text-transform: uppercase;">Mechanical Report R.A 8495</strong ></h3>
            </div>
            <div class="panel-body">
          <?php foreach ($mechanical as $mec) : ?>
                  <div class="row">
                  <div class="col-sm-4 form-group">
                        <label>Inspector Name</label>
                        <span class="form-control"><?php echo $mec->user_lastname; ?>, <?php echo $mec->user_firstname; ?>  <?php echo $mec->user_middlename; ?> </span>
                      </div>
                    <div class="col-sm-12 form-group">
                      <label>Installation Operation Description</label>
                      <p> <?php echo $mec->mechanical_installation_operation_description; ?> </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 form-group">
                      <label>Date/Time Inspected</label>
                      <span class="form-control"><?php echo $mec->datetime; ?></span>
                    </div> 
                    <div class="col-sm-4 form-group">
                      <label>Mechanical Payment</label>
                      <span class="form-control"><?php echo $mec->payment; ?></span>
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>Remarks</label>
                      <span class="form-control"><?php echo $mec->remarks; ?></span>
                    </div>
                  </div>

                  <div class="row">
                     <div class="col-sm-12 form-group">
                      <label>Feedbacks</label>
                      <p><?php echo $mec->feedbacks; ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
            </div>
          </div>

          <div class="panel panel-success" >
            <div class="panel-heading">
              <h3 class="panel-title"><strong style="text-transform: uppercase;">Electronics Report R.A 9292</strong ></h3>
            </div>
            <div class="panel-body">
          <?php foreach ($electronics as $electro) : ?>
                  <div class="row">
                  <div class="col-sm-4 form-group">
                        <label>Inspector Name</label>
                        <span class="form-control"><?php echo $electro->user_lastname; ?>, <?php echo $electro->user_firstname; ?>  <?php echo $electro->user_middlename; ?> </span>
                      </div>
                    <div class="col-sm-12 form-group">
                      <label>Nature of Installation Works</label>
                      <p> <?php echo $electro->installation_operation_description; ?> </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 form-group">
                      <label>Date/Time Inspected</label>
                      <span class="form-control"> <?php echo $electro->datetime; ?></span>
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>Electronics Payment</label>
                      <span class="form-control"> <?php echo $electro->payment; ?></span>
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>Remarks</label>
                      <span class="form-control"> <?php echo $electro->remarks; ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 form-group">
                      <label>Feedbacks</label>
                      <p> <?php echo $electro->feedbacks; ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
            </div>
          </div>
          

          <div id="formpage_5" class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><strong style="text-transform: uppercase;">Electrical Report R.A 7920</strong ></h3>
            </div>
            <div class="panel-body">
              <?php foreach ($electrical as $electri) : ?>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label>Inspector Name</label>
                        <span class="form-control"><?php echo $electri->user_lastname; ?>, <?php echo $electri->user_firstname; ?>  <?php echo $electri->user_middlename; ?> </span>
                      </div>
                    </div>

                    <div>
                      <label>Number of Outlets</label>
                    </div> 
                    <div class="row">
                      <div class="col-sm-2 form-group">
                        <label>Light</label>
                        <span class="form-control"><?php echo $electri->number_of_light_outlet; ?></span>
                      </div>
                      <div class="col-sm-2 form-group">
                        <label>Convenience</label>
                        <span class="form-control"><?php echo $electri->number_of_convenience_outlet; ?></span>
                      </div>
                      <div class="col-sm-2 form-group">
                        <label>Aircon</label>
                        <span class="form-control"><?php echo $electri->number_of_aircon_outlet; ?></span>
                      </div>
                      <div class="col-sm-2 form-group">
                        <label>Cooking Unit</label>
                        <span class="form-control"><?php echo $electri->number_of_cooking_unit_outlet; ?></span>
                      </div>
                      <div class="col-sm-2 form-group">
                        <label>Water Heater</label>
                        <span class="form-control"><?php echo $electri->number_of_water_heater_outlet; ?></span>
                      </div>
                      <div class="col-sm-2 form-group">
                        <label>Water Pump</label>
                        <span class="form-control"><?php echo $electri->number_of_water_pump_outlet; ?></span>
                      </div>
                    </div>

                    <div>
                      <label>Number of Other Equipments</label>
                    </div> 
                    <div class="row">
                      <div class="col-sm-3 form-group">
                        <label>Toggle Switch</label>
                        <span class="form-control"><?php echo $electri->number_of_toggle_switch; ?></span>
                      </div>
                      <div class="col-sm-3 form-group">
                        <label>Bells / Buzzers</label>
                        <span class="form-control"><?php echo $electri->number_of_bells_or_buzzers; ?></span>
                      </div>
                      <div class="col-sm-3 form-group">
                        <label>Push Buttons</label>
                        <span class="form-control"><?php echo $electri->number_of_push_buttons; ?></span>
                      </div>
                      <div class="col-sm-3 form-group">
                        <label>FA Detectors</label>
                        <span class="form-control"><?php echo $electri->number_of_fa_detectors; ?></span>
                      </div>
                    </div>

                  <div class="row">
                    <div class="col-sm-4 form-group">
                      <label>Date/Time Inspected</label>
                      <span class="form-control"><?php echo $electri->datetime; ?></span>
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>Electrical Payment</label>
                      <span class="form-control"><?php echo $electri->payment; ?></span>
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>Remarks</label>
                      <span class="form-control"><?php echo $electri->remarks; ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 form-group">
                      <label>Feedbacks</label>
                      <p><?php echo $electri->feedbacks; ?></p>
                    </div>  
                  </div>
                <?php endforeach; ?>
            </div>
          </div>

          <div id="formpage_6" class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><strong style="text-transform: uppercase;">Plumbing or Sanitary Report</strong ></h3>
              </div>
              <div class="panel-body">
          <?php foreach ($plum as $plu) : ?>
                <div class="row">
                  <div class="col-sm-4 form-group">
                        <label>Inspector Name</label>
                        <span class="form-control"><?php echo $plu->user_lastname; ?>, <?php echo $plu->user_firstname; ?>  <?php echo $plu->user_middlename; ?> </span>
                      </div>
                  <div class="col-sm-4 form-group">
                    <label>Nature of Installation Works</label>
                    <span class="form-control"><?php echo $plu->fixtures_to_be_installed; ?></span>
                  </div>  
                  <div class="col-sm-4 form-group">
                    <label>Date/Time Inspected</label>
                    <span class="form-control"><?php echo $plu->datetime; ?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3 form-group">
                      <label>Date Installed</label>
                      <span class="form-control"><?php echo $plu->date_installed; ?></span>
                    </div>
                    <div class="col-sm-3 form-group">
                      <label>Date Completed</label>
                      <span class="form-control"><?php echo $plu->date_completion; ?></span>
                    </div>
                    <div class="col-sm-3 form-group">
                      <label>Remarks</label>
                      <span class="form-control"><?php echo $plu->remarks; ?></span>
                    </div>
                    <div class="col-sm-3 form-group">
                      <label>Plumbing or Sanitary Payment</label>
                      <span class="form-control"><?php echo $plu->payment; ?></span>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 form-group">
                    <label>Feedbacks</label>
                    <p><?php echo $plu->feedbacks; ?></p>
                  </div>
                </div>
              <?php endforeach; ?> 
              </div>
          </div>

          <div id="formpage_7" class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <strong > Other Reports </strong ></h3>
              </div>
              <div class="panel-body">
              <?php foreach ($others as $x) : ?>
                <div class="row">
                 <div class="panel-heading">
                    <h3 class="panel-title">
                      <strong style="text-transform: uppercase;"> <?php echo $x->inspection_type; ?> Report  </strong ></h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>Inspector Name</label>
                    <span class="form-control"><?php echo $x->user_lastname; ?>, <?php echo $x->user_firstname; ?>  <?php echo $x->user_middlename; ?> </span>
                  </div> 
                  <div class="col-sm-6 form-group">
                    <label>Date/Time Inspected</label>
                    <span class="form-control"><?php echo $x->datetime; ?></span>
                  </div>
                </div>
                <div class="row"> 
                  <div class="col-sm-6 form-group">
                    <label>Remarks</label>
                    <span class="form-control"><?php echo $x->remarks; ?></span>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label><?php echo $x->inspection_type; ?> Payment</label>
                    <span class="form-control"><?php echo $x->payment; ?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 form-group">
                    <label>Feedbacks</label>
                    <p><?php echo $x->feedbacks; ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
              </div>
            </div> 
                  <button type="button" class="btn btn-success" id="save-approved-info"> <i class="glyphicon glyphicon-ok"></i> Approved !</button>
                  <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
              </div>
            </div>
        </form> 
      </div> 
    </div>
</div>






















