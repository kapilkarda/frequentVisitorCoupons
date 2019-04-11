

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
        id="specificPageRadio"
      >a specific product page
    </p>
  
    <div id="specificPageFieldContainer">
      <label for="specificPageField">
        Enter the target page you would like to track hits on
      </label>
      <input
        type="text"
        name="specificPageField"
        id="specificPageField"
      >
    </div>


  </form>
  
</div>



<script>
  const newCouponForm = document.querySelector("#newCouponForm");
  const specificPageRadio = document.getElementById('specificPageRadio');
  const specificPageFieldContainer = document.getElementById("specificPageFieldContainer");

  newCouponForm.addEventListener('click',
    function(event) {
    if (event.target.value === 'specificPage') {
      specificPageFieldContainer.style.display = "block";
    } else if (event.target.value === 'wholeSite') {
      specificPageFieldContainer.style.display = "none";
    }
  });
  
  
  // function controlSpecificPageField() {
  //   if (specificPageRadio.checked) {
  //     console.log(specificPageRadio.checked, `=====specificPageRadio.checked=====`);
  //     specificPageField.style.display = 'block'
  //   } else {
  //     specificPageField.style.display = 'none'
  //   }
  // }
  
  
  // jQuery way
  // conditional render the target box
  // $('input[name="trackingScope"]')
  //   .click(function(event) {
  //     if (event.target.value === 'specificPage') {
  //       $("#specificPageField").show();
  //     } else {
  //       $("#specificPageField").hide();
  //     }
  //   });
  //
  // $("#specificPageField").hide();
  //
  //
  // $('input[name="choose"]').click(function(e) {
  //   if(e.target.value === 'yes') {
  //     $('#optional').show();
  //   } else {
  //     $('#optional').hide();
  //   }
  // });
  //
  // $('#optional').hide();

</script>