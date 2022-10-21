<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
</head>

<body>
<h1>เข้าสู่ระบบ</h1>
<form method="post" action="" >
	Usernmae <input type="text" name="usr" autofocus required> <br>
    Password <input type="password" name="pwd" required> <br>
    <input type="submit" name="Submit" value="LOGIN">
</form> 

</body>
<?php
if(isset($_POST['Submit'])){
	include("../connectdb.php");
	$sql = "select * from admin where a_usr='{$_POST['usr']}' and a_pwd='".md5($_POST['pwd'])."' LIMIT 1";	
	$rs = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($rs);
	
	if ($num > 0){
		$data = mysqli_fetch_array($rs);
		$_SESSION['ses_id'] = $data['a_id'] ;
		$_SESSION['ses_name'] = $data['a_name'] ;
		echo "<script>";
		echo "window.location='b.php';";
		echo "</script>";
	}else{
		echo "<script>";
		echo "alert('เข้าไม่ได้');";
		echo "</script>";
		exit;	
		}
	
}
?>
</html>

