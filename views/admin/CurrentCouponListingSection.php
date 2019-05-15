
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

      
<!--      <div class="couponListing">-->
<!--        <p class="label">-->
<!--          Coupon ID:-->
<!--        </p>-->
<!--        <p class="data">-->
<!--          --><?php //echo "{$record->targetId}" ?>
<!--        </p>-->
<!--        -->
<!--        <p class="label">-->
<!--          Target display page:-->
<!--        </p>-->
<!--        <p class="data">-->
<!--          --><?php //echo "{$targetPage}" ?>
<!--        </p>-->
<!--        -->
<!--        <p class="label">-->
<!--          Total number of coupon views-->
<!--        </p>-->
<!--        <p class="data">-->
<!--          --><?php //echo "{$record->totalViews}" ?>
<!--        </p>-->
<!--        -->
<!--        <p class="label">-->
<!--          Number of views before a visitor sees coupon:-->
<!--        </p>-->
<!--        <p class="data">-->
<!--          --><?php //echo "{$record->displayThreshold}" ?>
<!--        </p>-->
<!--        -->
<!--        <p class="label">-->
<!--          Number of times offer is shown:-->
<!--        </p>-->
<!--        <p class="data">-->
<!--          --><?php //echo "{$record->offerCutoff}" ?>
<!--        </p>-->
<!--        -->
<!--        <button class="label deleteButton">-->
<!--          Delete this target (can not be undone)-->
<!--        </button>-->
<!--      </div>-->
    <?php endforeach ?>
    </tbody>
  </table>
  
<!--  Prev / Next buttons  -->
    <button id="previousButton">Previous</button>
    <button id="nextButton">Next</button>
  
  <script>
    // the php variable will evaluate at runtime, along with the js variable that the below script file depends on
    const ajaxUrl = '<?php echo admin_url("admin-ajax.php") ?>'
  </script>
<!--  <script src=--><?php //echo plugin_dir_url(__FILE__) . "/CurrentCouponListingSection.js"; ?><!-- ></script>-->
</div>


<!--<script>-->
<!--  -->
<!--  const getResultMarker = () => {-->
<!--    return localStorage.getItem('resultMarker')-->
<!--  };-->
<!--  -->
<!--  const setResultMarker = (currentValue, additionOrSubtraction) => {-->
<!--    additionOrSubtraction = parseInt(additionOrSubtraction);-->
<!--    -->
<!--    const sum = currentValue + additionOrSubtraction;-->
<!--    localStorage.setItem('resultMarker', sum);-->
<!--    -->
<!--    return sum;-->
<!--  };-->
<!--  -->
<!--  -->
<!--  const adjustResultMarker = (incrementSize, currentMarker, limit) => {-->
<!--    if (!currentMarker) {-->
<!--      return 0-->
<!--    } else if (currentMarker < 0) {-->
<!--      return 0-->
<!--    } else if (-->
<!--      incrementSize < 0 &&-->
<!--      currentMarker - limit <= 0-->
<!--    ) {-->
<!--      return 0-->
<!--    }-->
<!--    else return currentMarker;-->
<!--  };-->
<!--  -->
<!--  const renderNewTableData = (jQuery, tableData) => {-->
<!--  -->
<!--  };-->
<!---->
<!---->
<!--  // incrementSize should be negative for previous button-->
<!--  function ajaxLoadTableData($, incrementSize = 10, limit = 10) {-->
<!--  -->
<!--    // get and update the result marker to avoid invalid markations-->
<!--    const oldMarker = getResultMarker();-->
<!--    const resultMarker = adjustResultMarker(incrementSize, oldMarker, limit);-->
<!--    console.log(resultMarker, `=====resultMarker=====`);-->
<!--    console.log(incrementSize, `=====incrementSize=====`);-->
<!--    console.log(limit, `=====limit=====`);-->
<!--    -->
<!--    // send an ajax request to get the new results-->
<!--    var ajaxUrl = '--><?php //echo admin_url('admin-ajax.php') //'; ?>
<!--//    $.post(-->
<!--//      ajaxUrl,-->
<!--//      {-->
<!--//        limit,-->
<!--//        resultMarker,-->
<!--//        action : 'queryDbForNewSelection'-->
<!--//      },-->
<!--//      successResponse => {-->
<!--//        console.log(successResponse, `=====successResponse=====`);-->
<!--//-->
<!--//        // update the resultMarker-->
<!--//        setResultMarker(resultMarker, incrementSize)-->
<!--//-->
<!--//        // re-render the table-->
<!--//        // renderNewTableData($, successResponse);-->
<!--//      },-->
<!--//      'json'-->
<!--//    );-->
<!--//-->
<!--//  }-->
<!--//-->
<!--//  ///// JQUERY FUNCTIONS /////-->
<!--//  jQuery(document).ready(function($) {-->
<!--//    console.log(`====jquery loaded======`);-->
<!--//-->
<!--//    $('#previousButton').click(function() {-->
<!--//      console.log(`=====CLICK=====`);-->
<!--//      $('#couponTableBody').html('');-->
<!--//      ajaxLoadTableData($, -10);-->
<!--//    });-->
<!--//    $('#nextButton').click(function() {-->
<!--//      console.log(`=====CLICK=====`);-->
<!--//      $('#couponTableBody').html('');-->
<!--//      ajaxLoadTableData($, 10);-->
<!--//    })-->
<!--//  });-->
<!--//-->
<!--//</script>-->


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

































