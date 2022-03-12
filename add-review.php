<?php 
$name = $_POST['name'];
$des = $_POST['des'];
$id = $_POST['id'];
include_once('config/config.php');
$des=$conn->real_escape_string($des);
$res = $conn->query("INSERT INTO review (place_id,name,des) VALUES ('$id','$name','$des');");
header("Location:view-place.php?id=$id");
?>