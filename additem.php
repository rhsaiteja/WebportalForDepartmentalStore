<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$conn = new mysqli("localhost","root","1234","saiteja");
define('img','images/');
$fileloc=$_FILES["file1"]["tmp_name"];
$filename=$_FILES['file1']['name'];    
$target=img.$filename;
move_uploaded_file($fileloc, $target);
    
$query="insert into item values('".$_POST['name']."',".$_POST['price'].",".$_POST['id'].",".$_POST['stock'].",'".$target."');";
IF($conn->query($query)==True)
    echo "added successfully ".$_SESSION['username'];
else
    echo $conn->error;
include 'additem.html';
?>