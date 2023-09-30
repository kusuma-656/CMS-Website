<?php 

$connect = mysqli_connect('localhost','cms','kusuma','cms');

if(mysqli_connect_errno()){
    exit('Failed to connect to MySqli: ' . mysqli_connect_errno());
}
?>