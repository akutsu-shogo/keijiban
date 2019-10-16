<!DOCTYPE html>

<html>

<head>

		<meta charset = "utf-8">
		<title>5-1</title>

</head>

<body>


<?php

//データベースに接続
$dsn = 'mysql:dbname=データベース名;host=localhost';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	//テーブル作成
	$sql = "CREATE TABLE IF NOT EXISTS toukou"
	."("
	."toukou_id INT AUTO_INCREMENT PRIMARY KEY,"
	."toukou_name		VARCHAR(20)	NOT NULL,"
	."toukou_comment	VARCHAR(100)	NOT NULL,"
	."toukou_date		DATE			,"
	."toukou_pass		VARCHAR(30)	NOT NULL"
	//."PRIMARY KEY (toukou_id)"
	.");";

	//データを登録
	$stmt = $pdo->query($sql);


//投稿機能
if(!empty($_POST["name"]) && !empty($_POST["comment"] && !empty($_POST["pass_word"]) && empty($_POST["number"] ))){

	//INSERTを使ってデータ入力
	$sql = $pdo -> prepare("INSERT INTO toukou (toukou_name, toukou_comment, toukou_pass, toukou_date)" 
		."VALUES (:toukou_name, :toukou_comment, :toukou_pass, :toukou_date)");
		$sql -> bindParam(':toukou_name', $toukou_name, PDO::PARAM_STR);
		$sql -> bindParam(':toukou_comment', $toukou_comment, PDO::PARAM_STR);
		$sql -> bindParam(':toukou_pass', $toukou_pass, PDO::PARAM_STR);
		$sql -> bindParam(':toukou_date', $toukou_date, PDO::PARAM_STR);
		$toukou_name = $_POST["name"];
		$toukou_comment = $_POST["comment"]; 
		$toukou_pass = $_POST["pass_word"];
		$toukou_date = date("Y-m-d");
		$sql -> execute();
}

//削除機能
if(!empty($_POST["delete"])){
	$delete_id = $_POST["delete"];
	$pass_word_delete = $_POST["pass_word_delete"];

		//削除番号と投稿番号が一致するか判断,パスワード判断
			//DELETE文を変数に格納
		$sql = 'DELETE FROM toukou WHERE toukou_id = :delete_id AND toukou_pass = :pass_word_delete';
			//値が空のままのSQL文をprepare()にセットしてSQL実行の準備
			$stmt = $pdo->prepare($sql);
			//実際に削除する値と削除するIDを格納
			$stmt->bindParam(':delete_id', $delete_id, PDO::PARAM_INT);
			$stmt->bindParam(':pass_word_delete', $pass_word_delete, PDO::PARAM_STR);
			//execute()に値をセットして実行
			$stmt->execute();
 }
//編集機能(データベースの任意のセルを投稿フォームに表示)
if(!empty($_POST["edit"])){
	$edit_id = $_POST["edit"];
	$pass_word_edit = $_POST["pass_word_edit"];

		//条件の時、SELECT文を変数に格納
		$sql = "SELECT * FROM toukou WHERE toukou_id = :edit_id AND toukou_pass  = :pass_word_edit";
			//値が空のままのSQL文をprepare()にセットしてSQL実行の準備
			$stmt = $pdo->prepare($sql);
			//実際にSELECTする値のIDとパスワードを格納
			$stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
			$stmt->bindParam(':pass_word_edit', $pass_word_edit, PDO::PARAM_STR);
			//execute()に値をセットして実行
			$stmt->execute();
				//ループ
				foreach($stmt as $row){
				//edit_nameとedit_commentを取得
				$edit_name = $row['toukou_name'];
				$edit_comment = $row['toukou_comment'];
				}
}

//編集機能(編集してから表示)
if(!empty($_POST["number"])){
	$number_edit = $_POST["number"];
	$toukou_name_edit = $_POST["name"];
	$toukou_comment_edit = $_POST["comment"];
	$pass_edit = $_POST["pass_word"];


	$sql = 'UPDATE toukou SET toukou_name = :toukou_name_edit, toukou_comment = :toukou_comment_edit, toukou_pass = :pass_edit WHERE toukou_id = :number_edit';
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':toukou_name_edit', $toukou_name_edit, PDO::PARAM_STR);
		$stmt->bindParam(':toukou_comment_edit', $toukou_comment_edit, PDO::PARAM_STR);
		$stmt->bindParam(':pass_edit', $pass_edit, PDO::PARAM_STR);
		$stmt->bindParam(':number_edit', $number_edit, PDO::PARAM_INT);
		$stmt->execute();
}
?>
<form action = "mission_5-1.php" method = "post">
	【名前】<br>
	<input type = "text"  name = "name" value = "<?php if(!empty($edit_name)){echo $edit_name;} ?>"><br>
	
	【コメント】<br>
	<input type = "text"  name = "comment" value = "<?php if(!empty($edit_comment)){echo $edit_comment;} ?>">
	<input type = "hidden"  name = "number" value = "<?php if(!empty($edit_name) && !empty($edit_comment)){echo $edit_id;} ?>"><br>
	
	【パスワード】<br>
	<input type = "text" name = "pass_word" >
	<br><input type = "submit" value = "送信" name = "send">
	</form>


	<form action = "mission_5-1.php" method = "post">
	<br>【削除対象番号】<br>
	<input type = "text" value = "" name = "delete"><br>
	
	【パスワード】<br>
	<input type = "text" name = "pass_word_delete">
	<br><input type = "submit" value = "削除" name = "send_delete">
	</form>


	<form action = "mission_5-1.php" method = "post">
	<br>【編集対象番号】<br>
	<input type = "text" value = "" name = "edit"><br>
	
	【パスワード】<br>
	<input type = "text" name = "pass_word_edit" >
	<br><input type = "submit" value = "編集" name = "send_edit"><br>
	

	<br>【投稿一覧】<br>
	</form>
-------------------------------------------------------<br>

<?php
	//入力したデータをSELECTによって表示
	$sql = 'SELECT * FROM toukou';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		echo $row['toukou_id'];
		echo $row['toukou_name'];
		echo $row['toukou_comment'];
		echo $row['toukou_date'].'<br>';
	echo "<hr>";
	}
?>
