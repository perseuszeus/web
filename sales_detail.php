<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=3;
if(filter_input(INPUT_POST,'submit')){
	$sid =filter_input(INPUT_POST,'sid');
	$pid =filter_input(INPUT_POST,'pid');
	$price =filter_input(INPUT_POST,'price');
	$qty =filter_input(INPUT_POST,'qty');
	$sql = "SELECT Max(sid) AS mxid FROM sales";
	$result = $db->query($sql);
	$row_cnt = $result->num_rows;
	if($row_cnt>0){
		$row = $result->fetch_array();
		$sid=$row[0]+1;
	}else{
		$sid = 1;
	} 

	$sql="insert into sales_detile(sid, pid, price, qty) values('$sid','$pid', '$price', '$qty')";
	//echo $sql;
	$result = $db->query($sql);
	header('Location: sales.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>KPRUPOS</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.js"></script>

<script language="JavaScript">
	function showName() {   
		
		console.log($("#pid").val());
		
		$.get('showcustomer.php?pid=' + $("#pid").val(), 
		function( data ) {
  			$( "#mySpan" ).html( data );
		});
	}
</script>
</head>
<body>
<?php include "include/header.php"; ?>
<div id="wrapper">
		<div id="featured" class="container">
        <form class="form-basic" method="post" action="#" enctype="multipart/form-data">

            <div class="form-title-row">
                <h1>เพิ่มข้อมูลการขายสินค้า</h1>
            </div>
            <div class="form-row">
                <label>
                    <span>รหัสการขาย</span>
                    <input name="sid" type="number" id="sid" required
                 onKeyUp="JavaScript:showName();">                 
                </label><span id="mySpan"></span>
            </div>
             <div class="form-row">
                <label>
                    <span>รหัสสินค้า</span>
                    <input name="pid" type="number" id="pid" required
                 onKeyUp="JavaScript:showName();">                 
                </label><span id="mySpan"></span>
            </div>
             <div class="form-row">
                <label>
                    <span>ราคา</span>
                    <input name="price" type="number" id="price" required
                 onKeyUp="JavaScript:showName();">                 
                </label><span id="mySpan"></span>
            </div>
             <div class="form-row">
                <label>
                    <span>จำนวน</span>
                    <input name="qty" type="number" id="qty" required
                 onKeyUp="JavaScript:showName();">                 
                </label><span id="mySpan"></span>
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
