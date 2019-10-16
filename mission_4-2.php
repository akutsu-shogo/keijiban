<?php
	$dsn = 'mysql:dbname=データベース名;host=localhost';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	$sql = "CREATE TABLE IF NOT EXISTS tbtest" //SQL言語で、表を定義する際に利用する。「CREATE TABLE 表名」のように指定することで、表が作成される。その際、表に作成する列名と列のデータ型、主キーなども同時に指定する。 
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY," //カラムに値が指定されなかった場合、MySQLが自動的に値を割り当てる。データ型は整数。値は1ずつ増加して連番になる。
	. "name char(32),"
	. "comment TEXT"
	.");";
	$stmt = $pdo->query($sql);
	/*stmtとすべきは、実行後にSQLの実行結果に関する情報を得たい場合であり、ただSQLを実行するだけであれば$db->query($sql);のように書けばよいということになります。
		stmtはstatementの略です、詰まりそのSQLを指すこと。
	*/




?>