<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=2;
if(filter_input(INPUT_POST,'submit')){
	$cid=filter_input(INPUT_POST,'cid');
	$cname=filter_input(INPUT_POST,'cname');
	$address=filter_input(INPUT_POST,'address');
	$phoneno=filter_input(INPUT_POST,'phoneno');
	
	$sql="UPDATE customer set cname='$cname',address='$address',phoneno='$phoneno' WHERE cid='$cid'";
	//echo $sql;
	$result = $db->query("$sql");
	header('Location: customer.php');
	}


$id = filter_input(INPUT_GET,'id');
$sql = "SELECT * FROM customer WHERE cid='$id'";
$result = $db->query($sql);
$row = $result->fetch_array();
$cname=$row['cname'];
$address=$row['address'];
$phoneno=$row['phoneno'];

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
<div id="wrapper">
		<div id="featured" class="container">
        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>แก้ไขข้อมูลลูกค้า</h1>
            </div>
            
            <div class="form-row">
            
                <label>
                    <span>ชื่อลูกค้า</span>
                    <input type="text" name="cname" value="<?php echo $cname ?>" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>ที่อยู่</span>
                    <input type="text" name="address" value="<?php echo $address ?>" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>เบอร์โทร</span>
                    <input type="number" name="phoneno" value="<?php echo $phoneno ?>" required>
                </label>
            </div>

            <div class="form-row"><input type="hidden" name="cid" value="<?php echo $id ?>">
                <button type="submit" name="submit" value="submit">บันทึก</button>
            </div>

        </form>
		</div> 
</div>
<?php include "include/footer.php";?>
</body>
</html>
