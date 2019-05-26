
<div id="outerContainer">
  <h2>Current Coupons</h2>
<!-- Table Data -->
  <table>
    <thead>
    <tr>
      <td>Coupon ID</td>
      <td>Target page</td>
      <td>Total views</td>
      <td>Pageviews before coupon displays</td>
      <td>Number of times to show offer</td>
      <td>Delete</td>
    </tr>
    </thead>
    <tbody id="couponTableBody">
    <?php
      foreach ($targetData as $record):
        
        if ($record->isSitewide === true) {
          $targetPage = 'Entire Website';
        } else {
          $targetPage = $record->targetUrl;
        }
    ?>
      
      <tr class="couponDataRow">
        <td><?php echo "{$record->targetId}" ?></td>
        <td><?php echo "{$targetPage}" ?></td>
        <td><?php echo "{$record->totalViews}" ?></td>
        <td><?php echo "{$record->displayThreshold}" ?></td>
        <td><?php echo "{$record->offerCutoff}" ?></td>
        <td>Delete</td>
      </tr>
      
    <?php endforeach ?>
    </tbody>
  </table>
  
<!--  Prev / Next buttons  -->
    <button id="previousButton">Previous</button>
    <button id="nextButton">Next</button>
  
  <script>
    // the php variable will evaluate at runtime, feeding it to the enqueued script
    const ajaxUrl = '<?php echo admin_url("admin-ajax.php") ?>'
  </script>
</div>




<style>
  #outerContainer {
    margin-top: 20vh;
  }
  
  .couponListing {
    margin-top: 7vh;
    display: grid;
    max-width: 600px;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 30px 30px 30px 30px 30px 30px;
  }
  
  .label {
    grid-column: 1;
  }
  
  .data {
    grid-column: 2;
  }
  
  .deleteButton {
    margin-top: 1vh;
  }
</style>

































