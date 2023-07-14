<?php

if (!function_exists('arrayToObject')) {
  function arrayToObject(array $array)
  {
    $obj = new stdClass();

    foreach ($array as $k => $v) {
      if (strlen($k)) {
        if (is_array($v)) {
          $obj->{$k} = arrayToObject($v);
        } else {
          $obj->{$k} = $v;
        }
      }
    }

    return $obj;
  }
}
