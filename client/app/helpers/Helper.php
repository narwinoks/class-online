<?php 

if (!function_exists('covert_money')) {
  function covert_money($a){
    if (isset($a)) {
        if ($a == '') {
            $a = 0;
        }
        $p 			= strlen($a);
        $result 		= number_format($a, 2);
        return "Rp. " . $result;
    } 
  }
}
?>