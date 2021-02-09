<?php 
	
	require 'config.php';

	//var_dump($GLOBALS['view_file_path']);
	//string(37) "/opt/lampp/htdocs/onlineshopping/view/"

	$directoryURI = $_SERVER['REQUEST_URI'];
	$path = parse_url($directoryURI, PHP_URL_PATH);
	//var_dump($path);
	// string(21) "/onlineshopping/view/"
	
	//CHANGE TO STRING
	$components = explode('/', $path);
	//var_dump($components);
	// array(4) { [0]=> string(0) "" [1]=> string(14) "onlineshopping" [2]=> string(4) "view" [3]=> string(12) "categorylist" }

	$router = $components[2];

	//CategoryController
	require $GLOBALS['controller_file_path']."Category_ctrl.php";
	//Create obj
	$category = new Category_ctrl();

	//SubCategory Controller
	require $GLOBALS['controller_file_path']."Subcategory_ctrl.php";
	//Create obj
	$subcategory = new Subcategory_ctrl();
	
	// Brand Controller
	require $GLOBALS['controller_file_path']."Brand_ctrl.php";
	$brand = new Brand_ctrl();

	// Item Controller
	require $GLOBALS['controller_file_path']."Item_ctrl.php";
	$item = new Item_ctrl();


	// Category
	if ($router == 'category_list') {
		$categories = $category->read();
		require $GLOBALS['view_file_path']."category_list.php";
	}elseif ($router == 'category_new'){
		require $GLOBALS['view_file_path']."category_new.php";
	}elseif ($router == 'category_add'){
		$category->insert();
	}elseif ($router == 'category_edit') {
		$id = $_GET['id'];
		$categoryedit = $category->edit($id);
		require $GLOBALS['view_file_path']."category_edit.php";	
	}elseif ($router == 'category_update') {
		$category->update();
	}elseif ($router == 'category_delete') {
		$id = $_POST['id'];
		$category->delete($id);
	}

	
	// Brand
	elseif ($router == 'brand_list') {
		$brands = $brand->read();
		require $GLOBALS['view_file_path']."brand_list.php";
	}elseif ($router == 'brand_new') {
		require $GLOBALS['view_file_path']."brand_new.php";
	}elseif($router == 'brand_add'){
		$brand->insert();
	}elseif( $router == 'brand_edit'){
		$id = $_GET['id'];
		$brandedit = $brand->edit($id);
		require $GLOBALS['view_file_path']."brand_edit.php";
	}elseif( $router == 'brand_update'){
		$brand->update();
	}elseif ($router == 'brand_delete') {
		$id = $_POST['id'];
		$brand->delete($id);
	}


	//SUBCATEGORY
	elseif($router == 'subcategory_list'){
		$subcategories = $subcategory->read();
		require $GLOBALS['view_file_path']."subcategory_list.php";
	}elseif ($router == 'subcategory_new') {
		$categories = $category->read();
		require $GLOBALS['view_file_path']."subcategory_new.php";
	}elseif( $router == 'subcategory_add'){
		$subcategory->insert();
	}elseif( $router == 'subcategory_edit'){
		$id = $_GET['id'];
		$categories = $category->read();
		$subcategoryedit = $subcategory->edit($id);
		require $GLOBALS['view_file_path']."subcategory_edit.php";
	}elseif( $router == 'subcategory_update'){
		$subcategory->update();
	}elseif ($router == 'subcategory_delete') {
		$id = $_POST['id'];
		$subcategory->delete($id);
	}

	//Item
	elseif($router == 'item_list'){
		$items = $item->read();
		require $GLOBALS['view_file_path']."item_list.php";
	}elseif ($router == 'item_new') {
		$subcategories = $subcategory->read();
		$brands = $brand->read();
		require $GLOBALS['view_file_path']."item_new.php";
	}elseif($router == 'item_add'){
		$item->insert();
	}elseif($router == 'item_edit'){
		$id = $_GET['id'];
		$subcategories = $subcategory->read();
		$brands = $brand->read();
		$itemedit = $item->edit($id);
		require $GLOBALS['view_file_path']."item_edit.php";
	}elseif($router == 'item_update'){
		$item->update();
	}elseif ($router == 'item_delete') {
		$id = $_POST['id'];
		$item->delete($id);
	}

	//card
	elseif ($router == 'card') {
		$brands = $brand->read();
		$categories = $category->read();
		$items = $item->read();
		require $GLOBALS['view_file_path']."card.php";
	}
	//home
	elseif ($router == '') {
		$brands = $brand->read();
		$categories = $category->read();

		$randomcategories = $category->randomcategories();

		$discountitems = $item->discountitems();

		$newitems = $item->newitems();

		$randomitems = $item->randomitems();

		
		require $GLOBALS['view_file_path']."home.php";
	}

 ?>