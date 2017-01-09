<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=4;
$startdate = date('Y-m-d');
$enddate = date('Y-m-d');
if(filter_input(INPUT_POST,'submit')){
	$startdate = (filter_input(INPUT_POST,'startdate'));
	$enddate = (filter_input(INPUT_POST,'enddate'));

	}
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
		<div id="featured" class="container"><br><br>
        <br><h1 align="center">ข้อมูลการขายสินค้า</h1><br>
       <form class="form-basic" method="post" action="#" enctype="multipart/form-data">
            <div class="form-row">
                <label>
                    <span>วันที่เริ่มต้น</span>
                    <input type="date" name="startdate"  value="<?php echo $startdate; ?>">ถึง
                    <span>วันที่สิ้นสุด</span>
                    <input type="date" name="enddate"  value="<?php echo $enddate; ?>">
                </label>
            </div>
              <div class="form-row">
                <button type="submit" name ="submit" value ="submit">ออกรายงาน</button>
            </div>
        </form>
        <br>
        <?php echo '<h3>รายงานการขายสินค้า วันที่ '.
		date("d/m/y", strtotime($startdate)).' ถึง '.
		date("d/m/y", strtotime($enddate)).'</h3>';?>
        
<table class="bordered">
    <thead>
    <tr>    	  
        <th>รหัสการขาย</th>      
        <th>วันที่ขาย</th>  
        <th>รหัสลูกค้า</th>
        <th>ชื่อลูกค้า</th>
        <th>ยอดซื้อ</th>      
    </tr>
    </thead>
<?php
    $ttotal=0;
	$sql = "SELECT * FROM sales left join customer on sales.cid=customer.cid WHERE sdate between '$startdate' and '$enddate'";
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
    </tr>'; 
 } ?>           
</table>
		</div>
</div>
<?php include "include/footer.php"; ?>
</body>
</html>
