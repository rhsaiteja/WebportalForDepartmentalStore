<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$idr = $_GET['id'];
$oldquantity = $_SESSION['cart'][$idr];
if($oldquantity == 1)
{
    unset($_SESSION['cart'][$idr]);
}
else if($oldquantity > 1)
    $_SESSION['cart'][$idr]=$oldquantity-1;
header('Location:cart.php');
die();