<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=1;
$newimage = "";
$imageupload = isset($_FILES['imageupload']['tmp_name'])? $_FILES['imageupload']['tmp_name']: "";
$imageupload_name = isset($_FILES['imageupload']['name'])? $_FILES['imageupload']['name'] : "";
if(filter_input(INPUT_POST,'submit')){
	$pid = filter_input(INPUT_POST,'pid');
	$pname = filter_input(INPUT_POST,'pname');
	$price = filter_input(INPUT_POST,'price');

	if($imageupload){
		$arraypic = explode(".",$imageupload_name); // Explode คือตัวแบ่งไฟล์กับนามสกุลออกจากกัน
		$filename = $arraypic[0];//ชื่อไฟล์
		$filetype = $arraypic[1];//นามสกุลไฟล์
		
		if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png" || $filetype=="gif"){
			$newimage = (int)$pid.".".$filetype;//$newimage = $pid.".".$filetype;(โค้ดเดิม) //รวมชื่อกับนามสกุลเข้าด้วยกัน 
			copy($imageupload,"upload/".$newimage); //โฟเดอเก็บรูป
			$newimage = $newimage!=''? $newimage : $pic; //ไม่มีบรรทัดนี้
			echo "<h3>ERROR : ไม่สามารถ Upload รูปภาพ</h3>";
		}
	}else{
		$newimage=$pic;
			}
$sql="update product set pname='$pname', price='$price' where pid ='$pid'";
	echo $sql;
	$result = $db->query("$sql");
	header('Location: products.php');
	}
$id = filter_input(INPUT_GET,'id');
$sql = "select * from product where pid='$id'";
$result = $db->query($sql);
$row = $result->fetch_array();
$pname=$row['pname'];
$price=$row['price'];


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
    <form class="form-basic" method="post" action="#" enctype="multipart/form-data">
      <div class="form-title-row">
        <h1>แก้ไขข้อมูลสินค้า</h1>
      </div>
      <div class="form-row">
        <label> <span>ชื่อสินค้า</span>
          <input type="text" name="pname" value="<?php echo $pname ?>" required>
        </label>
        </div>
      <div class="form-row">
        <label> <span>ราคา</span>
          <input type="number" name="price" value="<?php echo $price ?>" required>
        </label>
      </div>  
       <div class="form-row"><input type="hidden" name="pid" value="<?php echo $id ?>">
                <button type="submit" name="submit" value="submit">บันทึก</button>
            </div>
    </form>
  </div>
</div>
</body>
</html>
