<meta charset="utf-8">
<?php
if (isset($_GET['id'])){
	include("../connectdb.php");
	$sql = "delete from book where b_id ='{$_GET['id']}'";
	mysqli_query($conn,$sql)or die ("ลบข้อมูลไม่ได้");
	unlink("../".$_GET['id'].".jpg");
	
	echo "<script>";
	echo "window.location = 'b.php'";
	echo "</script>";
}
?>