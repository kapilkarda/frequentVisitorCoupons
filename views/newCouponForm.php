

<div class="adminSettings">
  <h2>Frequent Visitor Coupons Settings Page</h2>
  
  <p>Explainer goes here</p>
  
  <form
    action="<?php echo
      esc_url(admin_url('admin-post.php'));
    ?>"
    id="newCouponForm"
    enctype="multipart/form-data"
  >
    <h3>Add a new coupon</h3>
    
    <h4>Step 1) Choose where visitors will be tracked and counted</h4>
    <input type="hidden" name="action" value="fromNewCouponForm">
  
    <p>
    <h4>Step 2) Choose where visits count</h4>
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
      <p>
        <input
          type="text"
          name="specificPageField"
          id="specificPageField"
        >
      </p>
    </div>

    <h4>Step 3) Number of times to make the offer</h4>
  
    <label for="numberOfOffers">
      How many times should the visitor see this offer?
    </label>
    
    <p>
      <input
        type="number"
        name="numberOfOffers"
        id="numberOfOffers"
        value=3
      >
    </p>
  
    <h4>Step 4) Choose a text or image coupon</h4>
    <input type="radio" name="couponChoice" value="imageCouponRadio">I have an image I would like to use</input>
    <input type="radio" name="couponChoice" value="textCouponRadio">I would like to type a coupon title and description to create a text based coupon</input>

    <!--  Step 4 settings area. hidden by default  -->
    <div id="imageCouponSettings"
         style="display: none"
    >
      <label for="imageCouponField">
        Choose an image on your computer to upload as your coupon
      </label>
      <input type="file" name="imageCoupon" id="imageCouponField">
    </div>
  

    <div id="textCouponSettings"
         style="display: none"
    >
      <label for="textCouponField">
        Choose a compelling coupon title
      </label>
      <input
        type="text"
        id="textCouponTitleField"
        placeholder="On the fence? Order now and take 10% off!"
      >
  
      <label for="textCouponDescriptionField">Write any extra information for the coupon body</label>
      <textarea name="textCouponDescriptionField" id="textCouponDescriptionField" cols="30" rows="10">
        Add this item to your cart and use code 'OffTheFence' to take 10% off this product!
      </textarea>

    </div>
    
    <p>
      <button type="submit">Create New Coupon</button>
    </p>
  </form>
  
</div>



<script>
  // toggle the specific page url box
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
  
  
  
  jQuery(document).ready(function($) {
    console.log(`=====jquery loaded=====`);
    $('input[name="couponChoice"]')
    console.log($('input[value="imageCouponRadio"]'), `=====$('input[name="couponChoice"]')=====`);
    
    
      // toggle the coupon type selection
    $('input[name="couponChoice"]')
      .click(function(e) {
      if (e.target.value === 'imageCouponRadio') {
        console.log(`=====imageCouponRadio=====`);
        $('#imageCouponSettings').show();
        $('#textCouponSettings').hide();
      } else if (e.target.value === 'textCouponRadio') {
        console.log(`=====textCouponRadio=====`);
        $('#imageCouponSettings').hide();
        $('#textCouponSettings').show();
      }
    })
    
    // $('input[value="imageCouponRadio"]')
    // $("#imageCouponSettings").hide();
    // $('input[value="textCouponRadio"]')
    //   .click(function() {
    //     console.log(`====fire text=====`);
    //     $("#textCouponSettings").toggle();
    //   })
    
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