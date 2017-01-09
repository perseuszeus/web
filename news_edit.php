<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=3;
if(filter_input(INPUT_POST,'submit')){
	$n_id= filter_input(INPUT_POST,'n_id');
	$n_date= filter_input(INPUT_POST,'n_date');
	$n_title = filter_input(INPUT_POST,'n_title');
	$n_detaill = filter_input(INPUT_POST,'n_detaill');
	
	$sql="update news set n_date='$n_date' ,n_title='$n_title' ,n_detaill='$n_detaill'  where n_id ='$n_id'";
	echo $sql;
	$result =$db->query("$sql");
 	header('location: news.php');
}
$id = filter_input(INPUT_GET,'id');
$sql = "select * from news where n_id='$id'";
$result = $db->query($sql);
$row = $result->fetch_array();

$n_date=$row['n_date'];
$n_title=$row['n_title'];
$n_detaill=$row['n_detaill'];
$n_image=$row['n_image'];

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
        <h1>แก้ไขข้อมูลข่าวสาร</h1>
      </div>
      <div class="form-row">
        <label ><span>โปรดเลือกวันที่ข่าวสาร</span>
          <input type="date" name="n_date"  value="<?php echo $n_date ?>" required>
          </label>
          
      </div>
      <div class="form-row">
         <label> <span>หัวข้อข่าว</span>
          <input type="text" name="n_title" value="<?php echo $n_title ?>" required>
        </label>
      </div>
      <div class="form-row">
      <label> <span>รายละเอียด</span>
          <input type="text" name="n_detaill" value="<?php echo $n_detaill ?>" required>
        </label>
      
     
      <div class="form-row">
        <input type="hidden" name="n_id" value="<?php echo $id ?>">
        <button type="submit" name="submit" value="submit">บันทึก</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>

 