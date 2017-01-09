<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn(); 
$act=1;
$imageupload = isset($_FILES['imageupload']['tmp_name'])?$_FILES['imageupload']['tmp_name']: "";
$imageupload_name = isset($_FILES['imageupload']['name'])?$_FILES['imageupload']['name'] : "";
if(filter_input(INPUT_POST,'submit')){
	$pid=(filter_input(INPUT_POST,'pid'));
	$pname = (filter_input(INPUT_POST,'pname'));
	$price = (filter_input(INPUT_POST,'price'));
	$sql = "select max(pid) as mxid FROM product";
	$result = $db->query($sql);
	$row_cnt = $result->num_rows;
	if ($row_cnt>0){
	$row = $result->fetch_array();
	$pid = $row[0]+1 ;
	}else{
	$pid = 1;
	}	
	if($imageupload){
		$arraypic = explode(".",$imageupload_name); // Explode คือตัวแบ่งไฟล์กับนามสกุลออกจากกัน
		
		$filename = $arraypic[0]; //ชื่อไฟล์
		$filetype = $arraypic[1]; //นามสกุลไฟล์
		
		if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png" || $filetype=="gif")
		{
			$newimage = $pid.".".$filetype; //รวมชื่อกับนามสกุลเข้าด้วยกัน
			copy($imageupload,"upload/".$newimage); //โฟเดอเกบรูป
		}else{
			echo "<h3>ERROR : ไม่สามารถ Upload รูปภาพ</h3>";
	  }
		}
	$sql= "insert into product(pid,pname,price,pic)values('$pid','$pname','$price','$newimage')";
	$result =$db->query("$sql");
 	header('location: products.php');
}
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
<?php include "include/headerr.php"; ?>
<div id="wrapper">	
		<div id="featured" class="container">	
	<form class="form-basic" method="post" action="#" enctype="multipart/form-data">
<br/><br/>
            <div class="form-title-row">
                <h1>เพิ่มข้อมูลสินค้า</h1></div>

            <div class="form-row">
                <label>
                    <span>ชื่อสินค้า</span>
                    <input type="text" name="pname" required>
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>ราคา</span>
                    <input type="number" name="price" required>
                </label>
            </div>
            
         
             <div class="form-row" align="center">
                <label>
                    <span>รูปสินค้า</span>
                    <input name="imageupload" type="file">
                </label>
            </div>
            
            <div class="form-row">
                <button type="submit" name ="submit" value ="submit">บันทึก</button>
            </div>
        </form>
	</div>
	</div> 
 
    

</body>
</html>