<?php	
	//$dsnの式の中にスペースを入れないこと！

	$dsn = 'mysql:dbname=データベース名;host=localhost';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

/*    個人的なメモ
PDO::ERRMODE_WARNING    エラーコードを設定することに加え、PDO は 伝統的な E_WARNING メッセージも出力します。
この設定はデバッグ/テストの際に有用で、 アプリケーションの動作を妨げることなしに問題点を確認できるように なります。

PDO::ATTR_ERRMODE デフォルトのエラー発生時の処理方法を指定します。サンプルでは Exception の形で例外を投げます。
*/

?>
