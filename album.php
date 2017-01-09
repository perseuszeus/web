<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=2;
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
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
</head>
<body>
<?php include "include/headerr.php";?>
<section id="gallery" class="parallax-section">
	<div class="container">
		<div class="row">
<div id="wrapper">
	<div id="wrapper-bgbtm">
		<div id="featured" class="container"><br>
			<h1 align = center >ข้อมูลภาพกิจกรรม</h1>
			<br>
            
    
        <br>
        <form class="form-add" method="post" action="album_add.php">
            <button type="submit">เพื่มภาพกิจกรรม</button>
            <br><br>
            <i class="fa fa-search"></i>
        </form>
<table class="bordered">
    <thead><tr> <th rowspan="2">รหัสภาพกิจกรรม</th>        
           <th rowspan="2">ชื่อภาพกิจกรรม</th>
           <th rowspan="2">รูปภาพกิจกรรม</th>
           <th colspan="2">จัดการ</th></tr><tr>
           <th>แก้ไข</th><th>ลบ</th></tr>
    </thead>

    <?php
	$search_query='';
	$search = filter_input(INPUT_GET,'search');
	if($search!=''){
		$search_query = "Where pname LIKE '%$search%'";
		}
		$sql = "SELECT * FROM album $search_query";
		$result = $db->query($sql);
    while($row = $result->fetch_array()){
	echo '
    <tr>
        <td>'.$row['aid'].'</td>        
        <td>'.$row['aname'].'</td>  
        <td>'.$row['pic'].'</td>    
		<td width="25"><a href="album_edit.php?id='.$row['aid'].'"><img src="images/boton-escribir-1.png" >
		<td width="25"><a href="album_delete.php?id='.$row['aid'].'"><img src="images/delete-309164_960_720.png" ></td>';
		}
		?>
</table>
<table class="bordered">
</table>
<table class="bordered">  
</table>

		</div> 
</section>

</body>
</html>
