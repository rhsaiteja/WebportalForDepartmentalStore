<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$username = $_POST["uname"];
$pwd = md5($_POST["pwd1"]);
$email = $_POST["email"];
$gender = $_POST["gender"];
$loc = $_POST["location"];
$conn = new mysqli("localhost:3306","root","1234","saiteja");
$_SESSION["email"]=$email;
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
}
else
{
    $sqlcheck = "select name from customer where email_address='".$email."';";
    if($conn->query($sqlcheck)->num_rows)
    {
        echo "Account already exists with specified email address";
        include 'signup.html';
    }
    else{
    $sqli = "insert into customer values('$username','$pwd','$email','$gender','$loc',0);";
    if($conn->query($sqli)==TRUE)
    {
        echo "account successfully created";
        header("Location:email.php");
        die();
    }
    else {
        echo "please wait database problems".$conn->error;
    }
}
}