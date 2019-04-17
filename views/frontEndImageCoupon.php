// for image coupons
<style>
  #couponImage {
    position: fixed;
    bottom: 50px;
    right: 5px;
    border: 2px dashed black;
  }
</style>


<img
  src=<?php
    echo plugin_dir_url(__FILE__) . '../images/' . $imageUrl
 . " " ?>
  id='couponImage' />
  alt="A special coupon"
/>


