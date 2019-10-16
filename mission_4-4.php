<?php

$dsn = 'mysql:dbname=データベース名;host=localhost';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql ='SHOW CREATE TABLE tbtest';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[1];
	}
	echo "<hr>";

/*

SHOW CREATE TABLE テーブル名 と実行すると、指定したテーブルの作成に使われた CREATE TABLE コマンドを表示することができます。
 厳密にはテーブル作成時に使ったコマンドとは同一にはなりませんが、出力されたコマンドを実行すれば、同等のテーブルを作成することができます。
*/

?>