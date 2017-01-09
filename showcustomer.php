<?php
include "include/conn.php";
$cid = filter_input(INPUT_GET,'cid');
if($cid != ""){
	$sql = "select cname from customer where cid='$cid'";
	$result = $db->query($sql);

	$row_cnt = $result->num_rows;
	if($row_cnt > 0){
		$row = $result->fetch_array();
			echo $row['cname'];
		}else {
			echo "ไม่พบข้อมูล";
		}
}
?>