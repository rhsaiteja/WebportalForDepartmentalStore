<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(isset($_SESSION["cart"]))
{
    $bill=0;
    $cart=$_SESSION["cart"];
    //print_r($_SESSION["cart"]);
    $conn = new mysqli("localhost","root","1234","saiteja");
    foreach($cart as $id => $quantity)
    {
        if($id!='amt')
        {
            $result=$conn->query("select * from item where id=".$id.";");
            $row=$result->fetch_assoc();
            echo "id=$row[id] name=$row[name] price=$row[price] quantity is $quantity<br/><a href='remove.php?id=$row[id]'>remove from cart</a><br/><br/>";
            $bill=$bill+$row['price']*$quantity;
            
        }
    }
    $cart['amt']=$bill;
    $_SESSION['cart']=$cart;
    echo "total bill is $bill";
    echo "<br/><br/><a href='shippingaddress.html'>confirm</a>";
    echo "<br/><a href='userwelcome.php'>back</a>";
}
else
{
    echo "no items in your cart";
    echo "<br/><a href='userwelcome.php'>back</a>";
    
}