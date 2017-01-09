<?php 
include "include/conn.php";
$id = filter_input(INPUT_GET,'id');
$sql = "DELETE FROM album WHERE aid='$id'";
$result = $db->query($sql);
header('Location: album.php');
?>