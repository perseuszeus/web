<?php 
include "include/conn.php";
$id = filter_input(INPUT_GET,'id');
$sql = "DELETE FROM product WHERE pid='$id'";
$result = $db->query($sql);
header('Location: products.php');
?>