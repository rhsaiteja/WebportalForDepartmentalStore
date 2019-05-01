<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$email=$_POST["email"];
$pswd=md5($_POST["password"]);
$_SESSION["email"]=$email;
$conn = new mysqli("localhost","root","1234","saiteja");
if($conn->connect_error)
{
    die("connection failed ".$conn->connect_error);
}
else
{
    
    $sql1="select password from customer where email_address='".$email."';";
    $result=$conn->query($sql1);
    
    if($result->num_rows)
    {
        $retrievedpwd=$result->fetch_assoc()[password];
        if($pswd == $retrievedpwd)
        {
            
            header("Location:userwelcome.php");
            die();
        }
        ELSE
        {
            echo "invalid password";
            INCLUDE 'login.html';
        }
    }
 else {
     
        echo "invalid username";
        include 'login.html';
    }
}

?>