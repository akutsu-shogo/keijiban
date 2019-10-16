<?php

	$dsn = 'mysql:dbname=データベース名;host=localhost';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	$sql ='SHOW TABLES';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[0];
		echo '<br>';
	}
	echo "<hr>";

/*	アローの意味・使い方
fruit->$apple //りんご

「fruit」というクラスの中にある「$apple」という変数にアクセスして値を取り出します。
「fruit」という棚に「$apple」という引き出しがあって、その引き出しには「りんご」が入っていますので、その「りんご」を取り出すイメージ
*/

?>