<div class="container">
    <div class="text-center">
      <div class="row">
        <div class="col-xs-3">
        <img src="../../assets/images/cdo-logo.jpg" alt="CDO Logo" class="r-logo">
        </div>
        <div class="col-xs-6"><br/> </br />
        <h5>Republic of the Philippines</h5>
        <h5>OFFICE OF THE CITY BUILDING OFFICAL</h5>
        <h5>City of Cagayan de Oro</h5> </br>
        <h5>FINAL OCCUPANCY INSPECTION REPORT</h5></br></br>
        </div>
        <div class="col-xs-3">
        <img src="../../assets/images/obo-logo.jpg" alt="OBO Logo" class="r-logo">
        </div>
      </div>
    </div>              
    <div>
      <section style="text-transform:Uppercase;">
        <?php foreach ($occupancy as $person) : ?>  
        OCCUPANCY PERMIT NO: <?php echo $person->occupancy_number; ?> <br />
        APPLICANT     :
        <span>
          <?php echo $person->customer_lastname; ?> , 
          <?php echo $person->customer_firstname; ?>
          <?php echo $person->customer_middlename; ?>
        </span></br>
        PROJECT TYPE DESCRIPTION :  <?php echo $person->occupancy_type_description; ?> </br>
        LOCATION      :
          <?php echo "#".$person->customer_location_address_no        ." " . 
                        $person->customer_location_address_street    ." , ".
                        $person->customer_location_address_barangay  ." , ".
                        $person->customer_location_address_city_or_municipality ;?></br>
        DATE/TIME ISSUED   : <?php echo $person->date_approved; ?> 
      </section> </br>
        <?php endforeach; ?>
    </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center active"><strong>Inspection Type</strong></th>
        <th class="text-center active"><strong>Remarks</strong></th>
        <th class="text-center active"><strong>Payment</strong></th>
        <th class="text-center active"><strong>Inspector</strong></th>
        <th class="text-center active"><strong>Signature</strong></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>ARCHITECTURAL R.A. 9266</td>
        <?php foreach ($architectural as $architectural) : ?>
        <td> <?php echo $architectural->remarks; ?> </td>
        <td> &#8369; <?php echo $architectural->payment; ?> </td>
        <td> <?php echo $architectural->user_lastname; ?>,
             <?php echo $architectural->user_firstname; ?>
             <?php echo $architectural->user_middlename; ?>
        </td>
        <?php endforeach; ?>
        <td></td>
      </tr>
      <tr>
        <td>STRUCTURAL R.A. 544/1582</td>
        <?php foreach ($structural as $structural) : ?>
        <td> <?php echo $structural->remarks; ?> </td>
        <td> &#8369; <?php echo $structural->payment; ?> </td>
        <td> <?php echo $structural->user_lastname; ?>,
             <?php echo $structural->user_firstname; ?>
             <?php echo $structural->user_middlename; ?>
        </td>
        <?php endforeach; ?>
        <td></td>
      </tr>
      <tr>
        <td>PLUMBING AND SANITARY</td>
        <?php foreach ($plum as $plum) : ?>
        <td> <?php echo $plum->remarks; ?> </td>
        <td> &#8369; <?php echo $plum->payment; ?> </td>
        <td> <?php echo $plum->user_lastname; ?>,
             <?php echo $plum->user_firstname; ?>
             <?php echo $plum->user_middlename; ?>
        </td>
        <?php endforeach; ?>
        <td></td>
      </tr>
      <tr>
        <td>MECHANICAL R.A. 8495</td>
        <?php foreach ($mechanical as $mechanical) : ?>
        <td> <?php echo $mechanical->remarks; ?> </td>
        <td> &#8369; <?php echo $mechanical->payment; ?> </td>
        <td> <?php echo $mechanical->user_lastname; ?>,
             <?php echo $mechanical->user_firstname; ?>
             <?php echo $mechanical->user_middlename; ?>
        </td>
        <?php endforeach; ?>
        <td></td>
      </tr>
      <tr>
        <td>ELECTRICAL R.A. 7920</td>
        <?php foreach ($electrical as $electrical) : ?>
        <td> <?php echo $electrical->remarks; ?> </td>
        <td> &#8369; <?php echo $electrical->payment; ?> </td>
        <td> <?php echo $electrical->user_lastname; ?>,
             <?php echo $electrical->user_firstname; ?>
             <?php echo $electrical->user_middlename; ?>
        </td>
        <?php endforeach; ?>
        <td></td>
      </tr>
      <tr>
        <td>ELECTRONICS R.A. 9292</td>
        <?php foreach ($electronics as $electronics) : ?>
        <td> <?php echo $electronics->remarks; ?> </td>
        <td> &#8369; <?php echo $electronics->payment; ?> </td>
        <td> <?php echo $electronics->user_lastname; ?>,
             <?php echo $electronics->user_firstname; ?>
             <?php echo $electronics->user_middlename; ?>
        </td>
         <?php endforeach; ?>
        <td></td>
      </tr>

      <th>Others</th>
        <?php foreach ($others as $others) : ?>
      <tr>
        <td> <?php echo $others->inspection_type; ?> </td>
        <td> <?php echo $others->remarks; ?> </td>
        <td> &#8369; <?php echo $others->payment; ?> </td>
        <td> <?php echo $others->user_lastname; ?>,
             <?php echo $others->user_firstname; ?>
             <?php echo $others->user_middlename; ?>
        </td>
        <td></td>
        <?php endforeach; ?>
      </tr>
    </tbody>
  </table>

  <?php foreach ($total as $person) : ?>    
    <p class="text-right">TOTAL PAYMENT:  &#8369; <?php echo $person->total_payment; ?></p> </br>
  <?php endforeach; ?>
    <h5><strong>BP 344/SIGNAGE:</strong></h5> </br> </br>
</div>
  <div class="panel-body">
      <div class="row">
        <div class="col-xs-6 form-group">
          <label>NOTED BY:</label> </br>
          <label>_________________________</label> </br>
          <label>CHIEF, PROCESSING DIVISION</label> </br>
        </div>
         <div class="col-xs-6 form-group">
          <label>RECEIVED BY:</label> </br>
          <label>_________________________</label> </br>
        </div> 
      </div>
  </div>


 <?php foreach ($occupancy as $person) : ?> 
  <span>Scan Code: </span> <br />
    <img src="../../assets/images/qr_codes/<?= $person->building_permit_number?>.png" 
<?php endforeach; ?>
  


