<?php include "include/conn.php"; 
$act=3;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Payao Bakery</title>

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
<?php include "include/headerr.php"; ?>
<div id="wrapper">
		<div id="featured" class="container">
        <br><br><h1 align="center">ข้อมูลการขายสินค้า</h1><br><br>
        <form class="form-search" method="get" action="#">
            <input type="search" name="search" placeholder="กรอกชื่อลูกค้า">
            <button type="submit">ค้นหา</button>
            <i class="fa fa-search"></i>
        </form>
        <br>
        <form class="form-add" method="post" action="sales_add.php">
            <button type="submit">เพิ่มข้อมูลการขายสินค้า</button>
        </form>
        <br>
<table class="bordered">
    <thead>

    <tr>    	  
        <th>รหัสการขาย</th>      
        <th>วันที่ขาย</th>  
        <th>รหัสลูกค้า</th>
        <th>ชื่อลูกค้า</th>
        <th>ยอดซื้อ</th>
        <th>ขายสินค้า</th>
      
    </tr>
    </thead>
<?php
	$search_query='';
	$search =filter_input(INPUT_GET,'search');
	if($search!=''){
		$search_query = " where customer.cname like '%$search%'";
	}
	$sql = "SELECT * FROM sales left join customer on sales.cid=customer.cid $search_query";
	$result = $db->query($sql);
	while ($row = $result->fetch_array()){ 
	echo '   
    	<tr>
        <td>'.$row['sid'].'</td>        
        <td>'.$row['sdate'].'</td>
        <td>'.$row['cid'].'</td>
        <td>'.$row['cname'].'</td> '; 
		$sqltotal="SELECT sum(price*qty) as total FROM sales_detail where sid =".$row['sid'];	
		$resulttotal = $db->query($sqltotal);	
		$rowtotal = $resulttotal->fetch_array();
	echo '<td>'.$rowtotal['total'].'</td>        
        <td width="36">
		<a href="sales_detail_add.php?id='.$row['sid'].'">
		<img src="images/cart-icon.png" width="20" height="20">
		</a>
		</td>
		
    </tr>'; 
 } ?>           
</table>
		</div>
</div>
<?php include "include/footer.php"; ?>
</body>
</html>
