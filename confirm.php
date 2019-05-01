<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$conn = new mysqli("localhost","root","1234","saiteja");
if($conn->connect_error)
    die("$conn->error");
else
{
    $checkact = "select activated from customer where email_address='".$_SESSION['email']."';";
    $act = $conn->query($checkact)->fetch_assoc()[activated];
    if($act==0)
    {
        echo "please verify your email address";
        echo "<br/><a href='email.php?loggedin=1'>send verification link to mail</a>";
    }
 else {
        //$address = $_POST['name'].','.$_POST['houseno'].','.$_POST['add1'].','.$_POST['add2'];
        $sname=$_POST['name'];
        $houseno=$_POST['houseno'];
        $addlines=$_POST['add1'].' '.$_POST['add2'];
        $dist = $_POST['district'];
        
        $insords = "insert into orders(odate,cust_email,dispatched,amount,name,houseno,addresslines,district) values(sysdate(),'".$_SESSION['email']."',0,".$_SESSION['cart']['amt'].",'".$sname."','$houseno','$addlines','$dist');";
     if($conn->query($insords) == True)
         echo "order placed successfully";
     else
         echo $conn->error;
     $ordnoquery = "select max(ord_no) from orders where cust_email='".$_SESSION['email']."';";
    $resultords = $conn->query($ordnoquery);
    if($resultords->num_rows)
    {
        
        $ordnorow = $resultords->fetch_assoc();
        $ordno = $ordnorow['max(ord_no)'];
        echo "<br/>your order no is ".$ordno."<br/>please note it for future reference";
        foreach($_SESSION['cart'] as $id => $quantity)
        {
            if(id!='amt')
            {
                $insprods = "insert into ord_prods values($ordno,'$id',$quantity);";
                $conn->query($insprods);
            }
        }
        unset($_SESSION['cart']);
        echo "<a href='userwelcome.php'>home</a>";
    }
    else {
        echo 'ord_no not retrieveing not has rows';    
    }
 }
}