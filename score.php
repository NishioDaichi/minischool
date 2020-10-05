<?php header("content-type:text/html;charset=UTF-8"); ?>
<?php

$student_id = $_POST['student_id'];
$student_name = $_POST['student_name'];
$jap = $_POST['jap'];
$math = $_POST['math'];
$science = $_POST['science'];
$social = $_POST['social'];
$eng = $_POST['eng'];
$total = $_POST['total'];
$comment = $_POST['comment'];

	$dsn = 'mysql:dbname=bbs;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

	
		switch($_POST['student_id'] ) {
			case 1 :
				$sql = "INSERT INTO people1(total, math, science, social, eng, total, comment) 
				 		VALUES(?, ?, ?, ?, ?, ?, ?);";
				$data = array($jap, $math, $science, $social, $eng, $total, $comment);
				$rs = $db->prepare($sql);
				$rs->execute($data);
				header("Location: tpage.php");
				break;
			case 2 :
				$sql = "INSERT INTO people2(total, math, science, social, eng, total, comment) 
				 		VALUES(?, ?, ?, ?, ?, ?, ?);";
				$data = array($jap, $math, $science, $social, $eng, $total, $comment);
				$rs = $db->prepare($sql);
				$rs->execute($data);
				header("Location: tpage.php");
				break;
			case 3 :
				$sql = "INSERT INTO people3(total, math, science, social, eng, total, comment) 
				 		VALUES(?, ?, ?, ?, ?, ?, ?);";
				$data = array($jap, $math, $science, $social, $eng, $total, $comment);
				$rs = $db->prepare($sql);
				$rs->execute($data);
				header("Location: tpage.php");
				break;
			case 4 :
				$sql = "INSERT INTO people4(total, math, science, social, eng, total, comment) 
				 		VALUES(?, ?, ?, ?, ?, ?, ?);";
				$data = array($jap, $math, $science, $social, $eng, $total, $comment);
				$rs = $db->prepare($sql);
				$rs->execute($data);
				header("Location: tpage.php");
				break;
			case 5 :
				$sql = "INSERT INTO people5(total, math, science, social, eng, total, comment) 
				 		VALUES(?, ?, ?, ?, ?, ?, ?);";
				$data = array($jap, $math, $science, $social, $eng, $total, $comment);
				$rs = $db->prepare($sql);
				$rs->execute($data);
				header("Location: tpage.php");
				break;
			
			default:
				header("Location: tpage.php");
	}

?>
