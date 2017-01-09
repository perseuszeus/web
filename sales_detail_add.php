<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=3;
$sid = (filter_input(INPUT_GET,'id'));
if(filter_input(INPUT_POST,'submit')){
	$sid = (filter_input(INPUT_POST,'sid'));
	$pid = (filter_input(INPUT_POST,'pid'));
	$qty = (filter_input(INPUT_POST,'qty'));
	$sql = "SELECT price,qty FROM product WHERE pid='$pid'";
	$result = $db->query($sql);
	$row = $result->fetch_array(); 
	$price = $row['price'];
	$qty_new = $row['qty'] - $qty;


	$sql= "insert into sales_detail(sid,pid,price,qty)values('$sid','$pid','$price','$qty')";
	$result =$db->query($sql);
	
	$sql = "UPDATE product SET qty = '$qty_new' WHERE pid='$pid'";
	$result =$db->query($sql);
	
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
		<div id="featured" class="container">	
	<form class="form-basic" method="post" action="#" enctype="multipart/form-data">

            <div class="form-title-row">
                <h1>เพิ่มข้อมูลรายละเอียดการขายสินค้า</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>ชื่อสินค้า</span>
                    <select name="pid">
                    <option value="">เลื่อกสินค้า</option>
                    <?php 
					$sql = "select * FROM product";
					$result = $db->query($sql);
					while ($row = $result->fetch_array()){
						echo '<option value="'.$row['pid'].'"> '.$row['pname'].' </option>';
						}					
					?>
                    </select>
                </label>
            </div>
            
     
            <div class="form-row">
                <label>
                    <span>จำนวน</span>
                    <input type="number" name="qty" required>
                </label>
            </div>
            
           
            
            <div class="form-row">
            <input type="hidden" name="sid" value="<?php echo $sid;?>">
                <button type="submit" name ="submit" value ="submit">บันทึก</button>
            </div>
        </form>
         <table class="bordered">
    <thead>

    <tr>
        <th>รหัสการขาย</th>        
        <th>ชื่อสินค้า</th>
        <th>ราคา</th> 
        <th>จำนวน</th> 
        <th>ราคารวม</th>
    </tr>
    </thead>
    <?php
	$sumtotal= 0;
		$sql = "SELECT sales_detail.*,product.pname FROM sales_detail left join product on sales_detail.pid=product.pid  WHERE sid ='$sid'";
		$result = $db->query($sql);
    while($row = $result->fetch_array()){
		$total = $row['price']*$row['qty'];
		$sumtotal=$sumtotal + $total;
	echo '
    <tr>
        <td>'.$row['sid'].'</td>        
        <td>'.$row['pname'].'</td>  
        <td>'.$row['price'].'</td>  
        <td>'.$row['qty'].'</td>  
        <td>'.$total.'</td>';    	      
    }?>
</table>
<?php 
echo "<h4>รวมทั้งสิ้น $sumtotal บาท</h4>"
 ?>
<table class="bordered">
</table>
<table class="bordered">  
</table>
	</div>
	</div>

<?php include "include/footer.php"; ?>
</body>
</html>