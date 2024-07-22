<?php 

if( isset($_GET["id"])){
    $id = $_GET["id"];

    
$sname = "localhost";
$unmae = "root";
$password = "Bikesha@14!";
$db_name = "user_system";

$connection = mysqli_connect($sname, $unmae, $password, $db_name);

$sql ="DELETE FROM user_list WHERE id=$id";
$connection->query($sql);

}

header("location: /crud/home.php");
exit;

?>