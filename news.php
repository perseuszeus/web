<?php
session_start();
include "include/conn.php";
include "include/function.php";
$act=3;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CAKE</title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
<!--

Template 2076 Zentro

http://www.tooplate.com/view/2076-zentro

-->
	<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'></head>
<body>
<?php include "include/headerr.php";?>
<div id="wrapper">
	<div id="wrapper-bgbtm">
		<div id="featured" class="container"><br><br><br>
			<h1 align = center >ข้อมูลข่าวประชาสัมพันธ์</h1><br><br><br>
        <br>
         <form class="form-search" method="get" action="#">
            <input type="search" name="search" placeholder="กรอกชื่อสินค้า">
            <button type="submit">ค้นหา</button>
            <i class="fa fa-search"></i>
        </form>
        <form class="form-add" method="post" action="news_add.php">
            <button type="submit">เพื่มข้อมูลข่าว</button>
            <br><br>
            <i class="fa fa-search"></i>
        </form>
        
<table class="bordered">
    <thead><tr> <th rowspan="2">รหัสข่าวสาร</th>        
           <th rowspan="2">วันที่ข่าวสาร</th>
           <th rowspan="2">หัวข้อข่าว</th>
           <th rowspan="2">รายละเอียดข่าวสาร</th>
      	   <th rowspan="2">รูปภาพ</th>
           <th colspan="2">จัดการ</th></tr><tr>
           <th>แก้ไข</th><th>ลบ</th></tr>
    </thead>
   <?php
	$search_query='';
	$search = filter_input(INPUT_GET,'search');
	if($search!=''){
		$search_query = "Where n_date LIKE '%$search%'";
		}
		$sql = "SELECT * FROM news $search_query";
		$result = $db->query($sql);
   //$result = $db->query("select * from news");
    while($row = $result->fetch_array()){
	echo '
    <tr>

        <td>'.$row['n_id'].'</td>        
        <td>'.$row['n_date'].'</td>  
        <td>'.$row['n_title'].'</td> 
		 <td>'.$row['n_detaill'].'</td> 
		 <td>'.$row['n_image'].'</td> 
		<td width="24"><a href="news_edit.php?id='.$row['n_id'].'"> <img src="images/boton-escribir-1.png"  height="24">
		<td width="24"><a href="news_delete.php?id='.$row['n_id'].'"> <img src="images/delete-309164_960_720.png" height="24"></td>'; 
				  
 }
 ?>
</table>

<table class="bordered">
</table>

<table class="bordered">
</table>

<table class="bordered">
</table>
<table class="bordered">
</table>
<table class="bordered">
</table>
<table class="bordered">  
</table>
		</div> 
	</div>
</div>


</body>
</html>
