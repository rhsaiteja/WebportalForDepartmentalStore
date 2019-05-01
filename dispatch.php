<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$conn = new mysqli("localhost","root","1234","saiteja");
if($conn->connect_error)
    die($conn->connect_error);
else {
    $ordno = $_GET['ordno'];
    $updatequery = "update orders set dispatched=1  where ord_no=$ordno";
    iF($conn->query($updatequery)==True)
    {
        header("Location:orders.php");
        die();
    }
    else
        echo $conn->error;
}