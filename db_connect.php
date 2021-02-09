<?php 
	$servername="localhost";
	$dbname="b20_pos";
	$dbuser="root";
	$dbpassword="";

	// データベースに接続
	$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
	$pdo = new PDO($dsn, $dbuser,$dbpassword);
	// 接続状況をチェックします
	try{
		$conn = $pdo;

		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "Connected Successfully";
 /* データベースから値を取ってきたり， データを挿入したりする処理 */
		}catch(PDOException $e){
			echo "Connection failed:".$e->getMessage();
//SQL実行でエラーが起こった際にどう処理するかを指定します．
		}

	
 ?>