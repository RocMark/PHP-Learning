<?php
try {
  session_start();
  require_once 'Cart.php';

} catch (Exception $e) {
  echo "Error" . $e->getMessage();
}
