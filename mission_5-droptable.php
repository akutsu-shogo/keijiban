<?php
$dsn = 'mysql:dbname=�f�[�^�x�[�X��;host=localhost';
	$user = '���[�U�[��';
	$password = '�p�X���[�h';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql = 'DROP TABLE toukou';
$results = $pdo -> query($sql);
?>