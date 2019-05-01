<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if($_GET['otp']==$_SESSION['otp'])
{
    $conn  = new mysqli("localhost","root","1234","saiteja");
    $conn->query("update customer set activated=1 where email_address='".$_SESSION['email']."';");
    echo "account activated".$_SESSION["username"];
    if(!isset($_GET['loggedin']))        
        echo "<br/><a href='login.html'>LOGIN TO ACCOUNT</a>";
    else
        echo "you can continue shopping";
}
else
    echo "link expired <br>get a link by logging in again";

