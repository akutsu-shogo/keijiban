<!DOCTYPE html>
<html>
<head>
		<meta charset = "utf-8">
		<title>3-1</title>
</head>
<body>

	<form action = "mission_3-1.php" method = "post">
  
	名前:<br>
	<input type = "text" value = "" name = "name"><br>
	コメント:<br>
	<input type = "text" value = "" name = "comment"><br>
	
	<br><input type = "submit" value = "送信">


	<?php
	$filename = "mission_3-1.txt";

	if(!empty($_POST["name"]) && !empty($_POST["comment"])){
	$name = $_POST["name"];
	$comment = $_POST["comment"];
	$date = date("Y/m/d/G:i");
	$i = (count(file($filename)) + 1);
	$number = $i."<>".$name."<>".$comment."<>".$date;
	$fp = fopen($filename , "a");
	fwrite($fp ,$number."\n");
	fclose($fp);
	}
	?>
</body>
<html>