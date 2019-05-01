<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$conn = new mysqli("localhost","root","1234","saiteja");
if($conn->connect_error)
{
    die("connection failed ".$conn->connect_error);
}
else
{
    $sql="select * from customer where email_address='".$_SESSION['email']."';";
    $result=$conn->query($sql);
    if($result->num_rows)
    {
        $row=$result->fetch_assoc();
        
            echo "name is    :$row[name]<br/><br/>";
            echo "email is   :$row[email_address]<br/><br/>";
            echo "gender is  :$row[gender]<br/><br/>";
            echo "location is:$row[location]<br/><br/>";
            
            if($row[activated]==0)
                echo "<br/><br/><a href='email.php?loggedin=1'>activate my account</a>";
            echo '<br/><br/><br/>';
            echo "<a href='logout.php'>logout</a>";
            
            
        
    }
 else {
      echo "Sorry retry later";  
    }
}
