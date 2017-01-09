<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=3;
if(filter_input(INPUT_POST,'submit')){
	$cid =filter_input(INPUT_POST,'cid');
	$sdate =filter_input(INPUT_POST,'sdate');
	
	$sql = "SELECT Max(sid) AS mxid FROM sales";
	$result = $db->query($sql);
	$row_cnt = $result->num_rows;
	if($row_cnt>0){
		$row = $result->fetch_array();
		$sid=$row[0]+1;
	}else{
		$sid = 1;
	} 

	$sql="insert into sales(sid, cid, sdate) values('$sid','$cid', '$sdate')";
	//echo $sql;
	$result = $db->query($sql);
	header('Location: sales.php');
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
<script src="js/jquery.js"></script>

<script language="JavaScript">
	function showName() {   
		
		console.log($("#cid").val());
		
		$.get('showcustomer.php?cid=' + $("#cid").val(), 
		function( data ) {
  			$( "#mySpan" ).html( data );
		});
	}
</script>
</head>
<body>
<?php include "include/headerr.php"; ?>
<div id="wrapper">
		<div id="featured" class="container">
        <form class="form-basic" method="post" action="#" enctype="multipart/form-data">

            <div class="form-title-row">
                <h1>เพิ่มข้อมูลการขายสินค้า</h1>
            </div>
            <div class="form-row">
                <label>
                    <span>รหัสลูกค้า</span>
                    <input name="cid" type="number" id="cid" required
                 onKeyUp="JavaScript:showName();">                 
                </label><span id="mySpan"></span>
            </div>
            
            <div class="form-row">
                <label>
                    <span>วันที่ซื้อสินค้า</span>
                    <input type="date" name="sdate" value="<?php echo date('Y-m-d'); ?>">
                </label>
            </div>            
            <div class="form-row">
                <button type="submit" name="submit" value="submit">บันทึก</button>
            </div>

        </form>
		</div>
</div>
<?php include "include/footer.php"; ?>
</body>
</html>
