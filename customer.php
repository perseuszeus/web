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
			<h1 align = center >ข้อมูลลูกค้า</h1><br>
            
        <form class="form-search" method="get" action="#">
            <input type="search" name="search" placeholder="กรอกชื่อลูกค้า">
            <button type="submit">ค้นหา</button>
            <i class="fa fa-search"></i>
        </form>
        <br>
        <form class="form-add" method="post" action="customer_add.php">
            <button type="submit">เพื่มข้อมูลลูกค้า</button>
            <br><br>
            <i class="fa fa-search"></i>
        </form>
<table class="bordered">
    <thead>

    <tr>
        <th>รหัสลูกค้า</th>        
        <th>ชื่อลูกค้า</th>
        <th>ที่อยู่</th>
        <th>เบอร์โทรศัพท์</th>
        <th>จัดการ</th>        
    </tr>
    </thead>
    <?php
	$search_query='';
	$search = filter_input(INPUT_GET,'search');
	if($search!=''){
		$search_query = "Where cname LIKE '%$search%'";
		}
		$sql = "SELECT * FROM customer $search_query";
		$result = $db->query($sql);
    while($row = $result->fetch_array()){
	echo '
    <tr>
        <td>'.$row['cid'].'</td>        
        <td>'.$row['cname'].'</td>  
        <td>'.$row['address'].'</td>  
        <td>'.$row['phoneno'].'</td>    
		<td width="24"><a href="customer_edit.php?id='.$row['cid'].'"><img src="images/1.png" width="4" height="24" ></td> 
    </tr>';        
    }?>
</table>
<table class="bordered">  
</table>

		</div> 
	</div>
</div></div></div></section>
<?php include "include/footer.php";?>
</body>
</html>
