

<div class="adminSettings">
  <h2>Frequent Visitor Coupons Settings Page</h2>
  
  <p>Explainer goes here</p>
  
  <form
    action="admin-post.php"
    method="post"
    id="newCouponForm"
    
  >
    <input
      type="hidden"
      name="action"
      value="handleNewCoupon"
    />
    
    
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
    
    <h4>Step 3) Coupon display options</h4>
    
    <p>
      <label for="hitsBeforeShowing">How many times should the user visit the target page (or website) before seeing this coupon?</label>
      <input
        type="number"
        name="hitsBeforeShowing"
      >
    </p>
    
    <p>
      <label for="numberOfOffers">
        How many times should the visitor see this offer?
      </label>
      <input
        type="number"
        name="numberOfOffers"
        id="numberOfOffers"
        value=3
      >
    </p>
    
    <h4>Step 4) Choose a text or image coupon</h4>
    <p>
      <input type="radio" name="couponChoice" value="imageCouponRadio"><span>I have an image I would like to use</span>
      
    </p>
    <p>
      <input type="radio" name="couponChoice" value="textCouponRadio"><span>I would like to type a coupon title and description to create a text based coupon</span>
    </p>
    
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
      <p>
        <label for="textCouponField">
          Choose a compelling coupon title
        </label>
        <input
          type="text"
          id="textCouponTitleField"
          name="textCouponTitleField"
          placeholder="On the fence? Order now and take 10% off!"
        >
      </p>
      
      <p>
        <label for="textCouponDescriptionField">Write any extra information for the coupon body</label>
        <textarea name="textCouponDescriptionField" id="textCouponDescriptionField" cols="30" rows="10">
        Add this item to your cart and use code 'OffTheFence' to take 10% off this product!
      </textarea>
      </p>
      
      <p>
        <label for="headlineBackgroundColor"></label>
        <select name="headlineBackgroundColor">
          <option value="black">Black</option>
          <option value="white">White</option>
          <option value="blue">Blue</option>
          <option value="red">Red</option>
          <option value="green">Green</option>
          <option value="purple">Purple</option>
        </select>
      </p>
      
      <p>
        <label for="headlineTextColor">Text Color</label>
        <select name="headlineTextColor">
          <option value="black">Black</option>
          <option value="white">White</option>
        </select>
      </p>
      
      <p>
        <label for="descriptionBackgroundColor"></label>
        <select name="descriptionBackgroundColor">
          <option value="black">Black</option>
          <option value="white">White</option>
          <option value="blue">Blue</option>
          <option value="red">Red</option>
          <option value="green">Green</option>
          <option value="purple">Purple</option>
        </select>
      </p>
      
      <p>
        <label for="descriptionTextColor">Text Color</label>
        <select name="descriptionTextColor">
          <option value="black">Black</option>
          <option value="white">White</option>
        </select>
      </p>
    
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
    // toggle the coupon type selection
    $('input[name="couponChoice"]')
      .click(function(e) {
      if (e.target.value === 'imageCouponRadio') {
        $('#imageCouponSettings').show();
        $('#textCouponSettings').hide();
      } else if (e.target.value === 'textCouponRadio') {
        $('#imageCouponSettings').hide();
        $('#textCouponSettings').show();
      }
    })
    
  });
  
  
  

</script>