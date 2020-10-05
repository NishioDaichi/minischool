<?php header("content-type:text/html;charset=UTF-8"); ?>
<?php
	session_start();
		
	$dsn = 'mysql:dbname=minischool;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$rs = $db->prepare($_SESSION['s']);
	$rs->execute();	

	$rs2 = $db->prepare($_SESSION['s2']);
	$rs2->execute();	

?>



<html>
<head>
<title>個人ページ</title>
</head>


<body>

<?php while($row = $rs->fetch(PDO::FETCH_ASSOC)){ ?>

<h1>ようこそ<br><?php print($row['student_name']); ?>さん</h1>

<img src="<?=$_SESSION['img'] ?>">
<?php } ?>


<h2>成績表</h2>

<ul>
<li>国語</li>
<li>算数</li>
<li>理科</li>
<li>社会</li>
<li>英語</li>
</ul>
<p>
<ul>
<?php while($row2 = $rs2->fetch(PDO::FETCH_ASSOC)){ ?>
<li><?php print($row2['jap']); ?></li>
<li><?php print($row2['math']); ?></li>
<li><?php print($row2['science']); ?></li>
<li><?php print($row2['eng']); ?></li>
<li><?php print($row2['idea']); ?></li>
<?php } ?>
</ul>
</p>
<?php while($row2 = $rs2->fetch(PDO::FETCH_ASSOC)){ ?>
<p>総合力</p>
<p><?php print($row2['total']); ?></p>
<p>先生より</p>
<p><?php print($row2['comment']); ?></p>

<?php } ?>


</body>
</head>
</html>
