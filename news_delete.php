<?php 
include "include/conn.php";
$id = filter_input(INPUT_GET,'id');
$sql = "DELETE FROM news WHERE n_id='$id'";
$result = $db->query($sql);
header('Location: news.php');
?>