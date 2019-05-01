<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$conn = new mysqli("localhost","root","1234","saiteja");
if($conn->connect_error)
    die($conn->connect_error);
else
{
    $ordnos = "select * from orders where dispatched=0;";
    $result = $conn->query($ordnos);
    if($result->num_rows)
    {
        echo "<table border=2><tr><th>order no</th><th>product id</th><th>quantity</th><th>amount</th><th>ship to</th></tr>";
        while($row = $result->fetch_assoc())
        {
            $noitems = $conn->query("select count(*) from ord_prods where ord_no=$row[ord_no];")->fetch_assoc()['count(*)'];
                $prods ="select pro_id,quantity from ord_prods where ord_no=$row[ord_no]";
                $result2=$conn->query($prods);
                $row2 = $result2->fetch_assoc();
                $address=$row[name].",<br/>".$row[houseno].",<br/>".$row[addresslines].",<br/>".$row[district];
            echo "<tr><td rowspan=$noitems>$row[ord_no]</td><td>$row2[pro_id]</td><td>$row2[quantity]</td><td rowspan=$noitems>$row[amount]</td><td rowspan=$noitems>$address</td>";
            echo "<td rowspan=$noitems><a href='dispatch.php?ordno=$row[ord_no]'>dispatch order</a></td></tr>";
                while($row2=$result2->fetch_assoc())
                {
                    echo "<tr><td>$row2[pro_id]</td><td>$row2[quantity]<td></td></tr>";
                }
                
            
        }
        echo "</table>";
    }
    else
        echo "no undispatched orders";
}   echo "<a href='mwelcome.php'>home</a>";