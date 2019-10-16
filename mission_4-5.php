<?php

$dsn = 'mysql:dbname=データベース名;host=localhost';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$name = 'Siri';
	$comment = 'Hey Siri!';
	$sql -> execute();

/*
INSERT文では、データを追加したい表の列とそれに対応した値を順に指定します。

bindParam　：　指定された変数名にパラメータをバインドする
準備された SQL ステートメント中で、   対応する名前もしくは疑問符プレースホルダにパラメータをバインドします。
   PDOStatement::bindValue() と異なり、   変数は参照としてバインドされ、PDOStatement::execute()がコールされたときのみ評価されます。
*/

?>