
<?php

function loadTargets() {
  global $wpdb;
  
  $targetData = $wpdb->get_results(
    "select * from {$wpdb->prefix}frequentVisitorCoupons_targets"
  );
  
  return $targetData;
}
$targetData = loadTargets();

?>


<div id="outerContainer">
  <h2>Current Coupons</h2>
    <?php
      foreach ($targetData as $record):
        if ($record->isSitewide === true) {
          $targetPage = 'Entire Website';
        } else {
          $targetPage = $record->targetUrl;
        }
      ?>
        
      <div class="couponListing">
        <p>Coupon ID: <?php echo "{$record->targetId}" ?></p>
        <p>Target display page: <?php echo "{$targetPage}" ?></p>
        <p>Total number of coupon views <?php echo "{$record->totalViews}" ?></p>
        <p>Threshold of views before a visitor sees: <?php echo "{$record->displayThreshold}" ?></p>
        <p>Number of times offer is shown: <?php echo "{$record->offerCutoff}" ?></p>
        <p>Delete this coupon (can not be undone)</p>
      </div>
    <?php endforeach ?>
</div>


<style>
  #outerContainer {
    margin-top: 20vh;
  }
  
  .couponListing {
    margin-top: 7vh;
  }
</style>

































