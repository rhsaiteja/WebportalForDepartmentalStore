<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$conn = new mysqli("localhost","root","1234","saiteja");
if($conn->connect_error)
{
    die("connect failed".$conn->connect_error);
}
else
{
    
    $result= $conn->query("select stock from item where id=".$_POST['id'].";");
    if($result->num_rows==0)
    {
        echo "no item wih specified id";
        include "addstock.html";
    }
    else
    {
        $ostock = $result->fetch_assoc()[stock];
        $sqlupdate = "update item set stock=".($_POST['nstock']+$ostock)." where id=".$_POST['id'].";";
        if($conn->query($sqlupdate)==True)
        {
            echo "update success";
            include "addstock.html";
        }
        else
         echo $conn->error;
    }
}
