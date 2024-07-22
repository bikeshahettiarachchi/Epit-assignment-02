<?php

$sname="localhost";
$unmae="root";
$password="Bikesha@14!";

$db_name= "user_system";

$connection= mysqli_connect($sname,$unmae,$password,$db_name);

if (!$connection){
    echo"connection failed!";
}

?>