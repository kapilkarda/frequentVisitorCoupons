<?php


class MyGlobals {
  
  public static function debugToConsole($data, $label) {
    
    $jsonObject = json_encode($data);
    echo "<script>
            console.log({$jsonObject});
            console.log('===={$label}====');
          </script>";
  }
  
}