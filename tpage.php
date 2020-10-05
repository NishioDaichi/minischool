<?php header("content-type:text/html;charset=UTF-8");

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

<html>
<head>
<meta charset="utf-8">
<title>管理部</title>
</head>

<body>
<h1>管理部</h1>

<h2>お知らせ</h2>

<div class="info">
 <?php while($row = $rs->fetch(PDO::FETCH_ASSOC)){ ?>
<p>・<?php print($row['info_text']); ?>
     <?php print("  "); ?>
     <?php print($row['info_date']); ?></p>
     <?php } ?>
</div>

<h2>お知らせ更新</h2>

<form method="POST" action="info.php">
<p>本文：<input type="text" name="t_name"></p>

<p>
<input type="submit" value="登録">
</p>
</form>

<h2>成績表書込</h2>
<form method="POST" action="score.php">
学籍番号
<select name="student_id">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>

</select>
名前
<select name="student_name">
<option value="people1">peple1</option>
<option value="people2">peple2</option>
<option value="people3">peple3</option>
<option value="people4">peple4</option>
<option value="people5">peple5</option>
</select>
<p>
国語
<select name="jap">
<option value="S">"S"</option>
<option value="A">"A"</option>
<option value="B">"B"</option>
<option value="C">"C"</option>
<option value="D">"D"</option>
</select>
算数
<select name="math">
<option value="S">"S"</option>
<option value="A">"A"</option>
<option value="B">"B"</option>
<option value="C">"C"</option>
<option value="D">"D"</option>
</select>
理科
<select name="science">
<option value="S">"S"</option>
<option value="A">"A"</option>
<option value="B">"B"</option>
<option value="C">"C"</option>
<option value="D">"D"</option>
</select>
社会
<select name="social">
<option value="S">"S"</option>
<option value="A">"A"</option>
<option value="B">"B"</option>
<option value="C">"C"</option>
<option value="D">"D"</option>
</select>
英語
<select name="eng">
<option value="S">"S"</option>
<option value="A">"A"</option>
<option value="B">"B"</option>
<option value="C">"C"</option>
<option value="D">"D"</option>
</select>
</p>
<p>
総合力
<select name="total">
<option value="S">"S"</option>
<option value="A">"A"</option>
<option value="B">"B"</option>
<option value="C">"C"</option>
<option value="D">"D"</option>
</select>
</p>
先生から一言
<input type="text" name="comment">
<p><input type="submit" value="送信" name="send"></p>
</form>





</body>
</html>