<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=2;
if(filter_input(INPUT_POST,'submit')){
	$cname=filter_input(INPUT_POST,'cname');
	$address=filter_input(INPUT_POST,'address');
	$phoneno=filter_input(INPUT_POST,'phoneno');
	$sql="SELECT Max(cid) AS mxid FROM customer";
	$result = $db->query($sql);
	$row_cut = $result->num_rows;
	if($row_cut>0){
		$row = $result->fetch_array();
		$cid = $row[0]+1;
		}else{
			$cid=1;
			}
	$sql="insert into customer (cid,cname,address,phoneno)
	values('$cid','$cname','$address','$phoneno')";
	$result = $db->query("$sql");
	header('Location: customer.php');
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
<?php include "include/headerr.php";?>
<div id="wrapper">
		<div id="featured" class="container">
        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>เพิ่มข้อมูลลูกค้า</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>ชื่อลูกค้า</span>
                    <input type="text" name="cname" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>ที่อยู่</span>
                    <input type="ืีืีtext" name="address" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>เบอร์โทรศัพท์</span>
                    <input type="number" name="phoneno" required>
                </label>
            </div>
            <div class="form-row">
                <button type="submit" name="submit" value="submit">บันทึก</button>
            </div>

        </form>
		</div> 
</div>
<?php include "include/footer.php";?>
</body>
</html>
