<?php header("Content-Type:text/html;charset=utf-8");
	
	$dsn = 'mysql:dbname=minischool;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "select info_text, info_date
			from info
			order by info_id ;";
	
	$rs = $db->prepare($sql);
	$rs->execute();
 ?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>testminischool</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
	<h1>テストミニスクール</h1>
</header>

<div class="info">
<h1>～お知らせ～</h1>
	<?php while($row = $rs->fetch(PDO::FETCH_ASSOC)){ ?>
	<p>
	   <?php print($row['info_text']); ?>
	   <?php print("  "); ?>
	   <?php print($row['info_date']); ?>
	</p>
	   <?php } ?>
</div>


<div class="sarea">
<h1>生徒用ログイン</h1>
<h2>学籍番号を入力してください</h2>

<p>
<form method="POST" action="index_view.php">
<input type="text" name="spass">
<input type="submit" value="ログイン" name="slogin">
</form>
</p>

<?php
$err = "";


	session_start();
	$_SESSION['s'] = "" ;
	$_SESSION['img'] = "" ;
	$_SESSION['s2'] = "" ;
	
	if(isset($_POST['slogin'])) {
	
		switch($_POST['spass'] ) {
			case 1 :
				$sql = "select student_id, student_name, jap, math , science , social, eng , total, comment 
				from people1;";
				$_SESSION['s'] = $sql;
				$sql = "select jap, math , science , social, eng , total, comment, 
				from people1;
				order by student_id";
				$_SESSION['s2'] = $sql2 ;
				$_SESSION['img'] = "imgfail/1.jpg" ;
				header("Location: spage.php");
				break;
			
			case 2 :
				$sql = "select student_id, student_name, jap, math , science , social, eng , total, comment 
				from people2;";
				$_SESSION['s'] = $sql;
				$_SESSION['img'] = "imgfail/2.jpg" ;
				header("Location: spage.php");
				break;
			case 3 :
				$sql = "select student_id, student_name, jap, math , science , social, eng , total, comment 
				from people3;";
				$_SESSION['s'] = $sql;
				$_SESSION['img'] = "imgfail/3.jpg" ;
				header("Location: spage.php");
				break;
			case 4 :
				$sql = "select student_id, student_name, jap, math , science , social, eng , total, comment 
				from people4;";
				$_SESSION['s'] = $sql;
				$_SESSION['img'] = "imgfail/4.jpg" ;
				header("Location: spage.php");
				break;
			case 5 :
				$sql = "select student_id, student_name, jap, math , science , social, eng , total, comment 
				from people5;";
				$_SESSION['s'] = $sql;
				$_SESSION['img'] = "imgfail/5.jpg" ;
				header("Location: spage.php");
				break;
			
		default:
				$err = "学籍番号が存在しません";
	}
		}
	
	
	if($err) {
    echo $err;
	}
?>
</div>

<div class="tarea">
<h1>先生用ログイン</h2>
<h2>パスワードを入力してください</h2>

<p>
<form method="POST" action="index_view.php">
<input type="text" name="tpass">
<input type="submit" value="ログイン" name="tlogin">
</form>
</p>

<?php
$err = "";

	if(isset($_POST['tlogin'])) {
		if($_POST['tpass'] == "pass") {
			header("Location: tpage.php");
			exit; }
		$err = "パスワードが間違っています";
	}
	
	if($err) {
    echo $err;
	}
?>
</div>



<footer>
	<p><small>テストミニスクール</small></p>
</footer>
</body>
</html>