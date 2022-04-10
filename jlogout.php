<?php session_start();
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['product_cart']);
//session_unset();
//unset($_SESSION['counter'][$counter_no]);
//unset($_SESSION['product_qty_cart'][$counter_no]);
//unset($_SESSION['counter']);
header('Location: jsign.php');
exit;
?>