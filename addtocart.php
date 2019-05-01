<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$id = $_GET['id'];
$cart=array();
if(isset($_SESSION["cart"]))
{
    $cart=$_SESSION["cart"];
}
if(isset($cart[$id]))
{
    $cart[$id] = $cart[$id]+1;
}
else
    $cart[$id]=1;
$_SESSION["cart"]=$cart;
header("Location:userwelcome.php");
die();
?>
