<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$name=$_POST["name"];
$password=$_POST["password"];
$_SESSION["username"]=$name;
$conn = new mysqli("localhost","root","1234","saiteja");
if($conn->connect_error)
{
    die("FAILED");
}
else
{
    $sql = "select password from managers where name='".$name."';";
    $result = $conn->query($sql);
    if($result->num_rows>0)
    {
        $row = $result->fetch_assoc();
        if($password == $row[password])
        {
            header("Location:mwelcome.php");
        }
    }
    else
    {
        echo "no records";
        include 'mlogin.html';
    }
}
