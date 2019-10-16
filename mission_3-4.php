<!DOCTYPE html>
<html>
<head>
		<meta charset = "utf-8">
		<title>3-4</title>
</head>
<body>
	<?php
	$filename = "mission_3-4.txt";

	//削除機能
	if(!empty($_POST["delete"])){
	$texts_delete = file($filename);
		foreach($texts_delete as $key_delete => $value_delete){
			$texts_delete_element = explode("<>" , $value_delete);
			if ($texts_delete_element[0] == $_POST["delete"]){
				unset($texts_delete[$key_delete]);
			}
		}
	file_put_contents("mission_3-4.txt" , $texts_delete);
	}

	
	//編集機能(編集元のテキストを投稿フォームに表示)
	if(!empty($_POST["edit"])){
		$edit = $_POST["edit"];
		$texts_edit = file($filename);
			$edit_name = "";
			$edit_comment = "";
			foreach($texts_edit as $value_edit){
				$texts_edit_element = explode("<>" , $value_edit);
				if($texts_edit_element[0] == $edit){
					$edit_name = $texts_edit_element[1];
					$edit_comment = $texts_edit_element[2];
				}
			}
	}
	//編集機能(編集してから送信する)
	if(!empty($_POST["number"])){
		$texts_edit = file($filename);
		foreach($texts_edit as $key_edit => $value_edit){
			$text_edit = explode("<>" , $value_edit);
			if($text_edit[0] == $_POST["number"]){
			array_splice($texts_edit , 1 , $key_edit , $_POST["number"]."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d/G:i")."<>"."\n");
			}
		}
		file_put_contents("mission_3-4.txt" , $texts_edit);
	}



	//投稿機能
	if(!empty($_POST["name"]) && !empty($_POST["comment"] && empty($_POST["number"]))){
		$name = $_POST["name"];
		$comment = $_POST["comment"];
		$date = date("Y/m/d/G:i");
		$line_comment = file($filename);
		$key_comment = end($line_comment);
		$key_comment_element = explode("<>" , $key_comment);
		$i = ((int)$key_comment_element[0] + 1);
		$number = $i."<>".$name."<>".$comment."<>".$date;
		$fp = fopen($filename , "a");
		fwrite($fp , $number."\n");
		fclose($fp);
	}
	?>

	<form action = "mission_3-4.php" method = "post">
  
	名前:<br>
	<input type = "text"  name = "name" value = "<?php if(!empty($edit_name)){echo $edit_name;} ?>"><br>
	コメント:<br>
	<input type = "text"  name = "comment" value = "<?php if(!empty($edit_comment)){echo $edit_comment;} ?>"><br>

	<input type = "hidden"  name = "number" value = "<?php if(!empty($edit)){echo $edit;} ?>"><br>



	<br><input type = "submit" value = "送信">

	<form action = "mission_3-4.php" method = "post">

	<br><br>削除対象番号:<br>
	<input type = "text" value = "" name = "delete"><br>

	<br><input type = "submit" value = "削除">
	</form>

	<form action = "mission_3-4.php" method = "post">

	<br>編集対象番号:<br>
	<input type = "text" value = "" name = "edit"><br>

	<br><input type = "submit" value = "編集">

	<?php
	$line = file($filename);
	foreach($line as $value){
	$element = explode("<>" , $value);
	$element_number = count($element);
	echo "<br>".$element[0];
	echo $element[1];
	echo $element[2];
	echo $element[3];
	}
	?>
	</form>
	</body>
<html>