<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$conn = new mysql("locahost","root","1234","saiteja");
if($conn->connect_error)
    die($conn->connect_error);
else {
    $hint="";
    $query = "select * from item where name like '".$_GET['js_var']."%';";
    $result=$conn->query($query);
    if($result->num_rows)
    {
        while($row=$result->fetch_assoc())
        {
            $hint = $hint.",".$row[name];
        }
    }
    else
        $hint ="no suggestions";
    echo $hint;
}