
<?php

////// LOAD TARGET DATA FOR TARGETS TABLE //////
function loadTargets() {
  global $wpdb;
  
  $targetData = $wpdb->get_results(
    "select * from {$wpdb->prefix}frequentVisitorCoupons_targets"
  );
  
  return $targetData;
}
$targetData = loadTargets();


////// SETUP PREV / NEXT BUTTON AJAX CALLS //////

function ajaxPost() {

  // ESCAPE PHP. SETUP THE AJAX REQUEST
  ?>
  <script>
    
    jQuery(document).ready(function() {
    //   // everything below executes or registers when the document is ready (done loading)
      jQuery('#previousButton').click(function() {

    //   //////// 1st Ajax caller //////////
    //     var postData = {
    //       action : 'selectTargetsWithOffset',
    //       headers : {
    //         'Content-Type' : 'application/json'
    //       },
    //       data : {
    //         offsetMultiplier : 1,
    //         incrementSize : 10
    //       },
    //       success : function(response) {
    //         console.log(`=====jQuery.post() success response=====`);
    //       }
    //     };
    //
    //     // callback to run when response comes back
    //     var handleResponse = function(response) {
    //       console.log(response, `=====handleResponse=====`);
    //     };
    //
    //     jQuery.post(
    //       ajaxurl,
    //       postData,
    //       handleResponse
    //     );
      
      //////// 2nd Ajax caller /////////
  
        var ajaxScript = { ajaxUrl : <?php echo admin_url('admin-ajax.php') ?>};
        
        jQuery.ajax({
          type: "POST",
          url: ajaxScript.ajaxUrl,
          contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
          dataType: "json",
          data: {
            action: "selectTargetsWithOffset",
          },
          success: function(response) {
            console.log(response, `=====success response=====`);
          },
          error: function(error, textStatus, errorThrown) {
            console.log(error, '==error==');
          }
        });
        
      });

    
     //jQuery(document).on("click","#previousButton", function() {
     //  jQuery.ajax({
     //    url: "<?php //echo admin_url( 'admin-ajax.php' ) ?>//",
     //    data: {"action":"selectTargetsWithOffset","datas": {"name": "yourfields"}},
     //    type:"post",
     //    success: function(data) { alert(data); }
     //  })
     //});
  
     
    })
  </script>
  <?php
}
add_action('admin_footer', 'ajaxPost');



///// REQUEST HANDLERS AND REGISTRATION HOOKS //////

function x () {
  // below will be the response
  wp_send_json([ 'message' => 'from back end' ]);
  wp_die();
}


function selectTargetsWithOffset() {
  wp_send_json([ 'message' => 'from back end' ]);
  wp_die();
}

function selectTargetsWithOffsetcb() {
  print_r($_POST);
  die();
}

//add_action('wp_ajax_selectTargetsWithOffset', 'selectTargetsWithOffset');

add_action('wp_ajax_x', 'x');
add_action( 'wp_ajax_selectTargetsWithOffset', "selectTargetsWithOffset");
add_action( 'wp_ajax_nopriv_selectTargetsWithOffset', "selectTargetsWithOffsetcb" );

add_action('wp_ajax_addCustomer', 'addCustomer');
add_action('wp_ajax_nopriv_addCustomer', 'addCustomer');









?>




<!--  HTML TEMPLATE START  -->

<div id="outerContainer">
  <h2>Current Coupons</h2>
  
<!-- Table Data -->
    <?php
      foreach ($targetData as $record):
        if ($record->isSitewide === true) {
          $targetPage = 'Entire Website';
        } else {
          $targetPage = $record->targetUrl;
        }
      ?>
      
      <div class="couponListing">
        <p class="label">
          Coupon ID:
        </p>
        <p class="data">
          <?php echo "{$record->targetId}" ?>
        </p>
        
        <p class="label">
          Target display page:
        </p>
        <p class="data">
          <?php echo "{$targetPage}" ?>
        </p>
        
        <p class="label">
          Total number of coupon views
        </p>
        <p class="data">
          <?php echo "{$record->totalViews}" ?>
        </p>
        
        <p class="label">
          Number of views before a visitor sees coupon:
        </p>
        <p class="data">
          <?php echo "{$record->displayThreshold}" ?>
        </p>
        
        <p class="label">
          Number of times offer is shown:
        </p>
        <p class="data">
          <?php echo "{$record->offerCutoff}" ?>
        </p>
        
        <button class="label deleteButton">
          Delete this target (can not be undone)
        </button>
      </div>
    <?php endforeach ?>
  
<!--  Prev / Next buttons  -->
    <button id="previousButton">Previous</button>
    <button id="nextButton">Next</button>
  
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

































