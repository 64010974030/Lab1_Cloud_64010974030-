<?
include("../connectdb.php");
$sql = "select * from book where b_id='{$_GET['id']}'";
$rs = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($rs);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">

<body>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>ฟอร์มแก้ไขข้อมูลหนังสือ</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="b_id">รหัสสินค้า</label>  
  <div class="col-md-4">
  <input id="b_id" name="b_id" type="text" placeholder="รหัสสินค้า" class="form-control input-md" required=""
  value="<?=$data['b_id'];?>" readonly>
    
  </div>
</div>

</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="b_title">ชื่อหนังสือ</label>  
  <div class="col-md-4">
  <input id="b_title" name="b_title" type="text" placeholder="ชื่อหนังสือ" class="form-control input-md" required=""
  value="<?=$data['b_title'];?>">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="b_detail">รายละเอียด</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="b_detail" name="b_detail"><?=$data['b_detail'];?></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="b_author">ผู้แต่ง</label>  
  <div class="col-md-4">
  <input id="b_author" name="b_author" type="text" placeholder="ผู้แต่ง" class="form-control input-md"  required=""
  value="<?=$data['b_author'];?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="b_publisher">สำนักพิมพ์</label>  
  <div class="col-md-4">
  <input id="b_publisher" name="b_publisher" type="text" placeholder="สำนักพิมพ์" class="form-control input-md" required=""
  value="<?=$data['b_publisher'];?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="b_price">ราคา</label>  
  <div class="col-md-4">
  <input id="b_price" name="b_price" type="text" placeholder="ราคา" class="form-control input-md" required=""
  value="<?=$data['b_price'];?>">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="img">รูปสินค้า</label>
  <div class="col-md-4">
    <input id="img" name="img" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
    <button id="Submit" name="Submit" class="btn btn-primary">แก้ไขข้อมูล</button>
  </div>
</div>

</fieldset>
</form>

	<?php
		if(isset($_POST['Submit'])){
			
			include("../connectdb.php");
			$sql = "UPDATE `book` SET `b_title` = '{$_POST['b_title']}', `b_detail` = '{$_POST['b_detail']}',
			 `b_author` = '{$_POST['b_author']}', `b_publisher` = '{$_POST['b_publisher']}', `b_price` = '{$_POST['b_price']}' 
			 WHERE `book`.`b_id` = '{$_GET['id']}';";
			mysqli_query($conn,$sql) or die ("แก้ไขข้อมูลไม่ได้");	
			
		if(isset($_FILES['img']['name'])){
			@copy($_FILES['img']['tmp_name'],"../".$_POST['b_id'].".jpg");		
		}
			echo "<script>";
			echo "alert('แก้ไขข้อมูลสำเร็จ');";
			echo "window.location ='b.php';";
			echo "</script>";
		}
	
	?>

</body>
</html>