
<?php
  $data = [
    [
      "id" => 1,
      "totalViews" => 1201,
      "targetPage(s)" => 'Whole Site'
    ]
  ]
?>

<div>Current Coupons</div>

<?php
  foreach ($data as $record) {
    echo "
      <p>Coupon ID: {$record['id']}</p>
      <p>Target display page(s): {$record['targetPage(s)']}</p>
      <p>Total number of coupon views {$record['totalViews']}</p>
      <p>Delete this coupon (can not be undone)</p>
    ";
  }
?>




































