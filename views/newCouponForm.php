

<div class="adminSettings">
  <h2>Frequent Visitor Coupons Settings Page</h2>
  
  <p>Explainer goes here</p>
  
  <form
    action="<?php echo
      esc_url(admin_url('admin-post.php'));
    ?>"
    id="newCouponForm"
  >
    <h3>Add a new coupon</h3>
    <input type="hidden" name="action" value="fromNewCouponForm">
  
    <p>
    <label for="trackingScope">
      This new coupon should track a visitor's visits to...
    </label>
    </p>
  
    <p>
      <input
        type="radio"
        name="trackingScope"
        value="wholeSite"
      >my entire website (multiple page views still only counts as 1 "visit")
    </p>
    <p>
    <input
        type="radio"
        name="trackingScope"
        value="specificPage"
      >a specific product page
    </p>
  
    <input
      type="text"
      name="specificPageField"
      id="specificPageField"
    >
    
  </form>
  
  <!-- include jquery -->
  <script
    src="https://code.jquery.com/jquery-3.4.0.slim.min.js"
    integrity="sha256-ZaXnYkHGqIhqTbJ6MB4l9Frs/r7U4jlx7ir8PJYBqbI="
    crossorigin="anonymous"></script>
  
  <script>
    // conditional render the target box
    $('input[name="trackingScope"]')
      .click(function(event) {
        if (event.target.value === 'specificPage') {
          $("#specificPageField").show();
        } else {
          $("#specificPageField").hide();
        }
      });

    $("#specificPageField").hide();
    
    
    $('input[name="choose"]').click(function(e) {
      if(e.target.value === 'yes') {
        $('#optional').show();
      } else {
        $('#optional').hide();
      }
    });

    $('#optional').hide();
    
  </script>
  
</div>