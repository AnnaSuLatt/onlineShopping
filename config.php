<!-- Connect MVC with config.php -->
<?php 
	global $foldername,$file_path,$model_file_path,$view_file_path,$controller_file_path,$database_path,$view_path;

	$foldername = 'onlineshopping/';
	
	$file_path = $_SERVER['DOCUMENT_ROOT']."/$foldername";
	//var_dump($file_path);
	//string(32) "/opt/lampp/htdocs/onlineshopping/"

	$model_file_path = $file_path."models/";

	$view_file_path = $file_path."view/";

	$controller_file_path = $file_path."controllers/";

	$database_path = $file_path."db_connect.php";

	$view_path = 'http://'.$_SERVER['HTTP_HOST']."/$foldername";

	//var_dump($view_path);
	//string(36) "http://localhost:8080/onlineshopping/"

 ?>