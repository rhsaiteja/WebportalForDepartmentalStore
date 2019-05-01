<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
echo "welcome ".$_SESSION['username'];
echo "<br/><br/>";
echo "<a href='additem.html'>add an item</a>";
echo "<br/><br/>";
echo "<a href='addstock.html'>add stock(existing products)</a>";
echo "<br/><br/>";
echo "<a href='orders.php'>check undispatched orders</a> ";
echo "<a href='mlogout.php'>logout</a>";
?>