<!-- for text coupons -->
<style>
  #headline {
    max-width: 100vw;
    padding: 5px 5px;
    margin: 0;
    text-align: center;
    color: <?php echo $headlineTextColor ?>;
    background-color: <?php echo $headlineBgColor ?>;
  }
  
  #description {
    max-width: 100vw;
    padding: 20px 5px;
    margin: 0;
    text-align: center;
    color: <?php echo $descriptionTextColor ?>;
    background-color: <?php echo $descriptionBgColor ?>;
  }
  
  #textCoupon {
    position: fixed;
    bottom: 70px;
    right: 10px;
    border: 3px dashed black;
  }
  
  @media (min-width: 700px) {
    #headline, #description {
      max-width: 500px;
    }
  }
  @media (min-width: 750px) {
    #textCoupon {
      bottom: 10px;
    }
  }
</style>


<div id='textCoupon'>
  <h2 id='headline'>
    <?php echo $textHeadline ?>
  </h2>
  <p id='description'>
    <?php echo $textDescription ?>
  </p>
</div>