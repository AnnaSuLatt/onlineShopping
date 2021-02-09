<?php 

	class Category_ctrl
	{
		
		function __construct()
		{
			//write one time call in multiple function like read() read1()
			require $GLOBALS['model_file_path']."Category_mdl.php";
		}

		//get data
		function read(){
			$category_mdl = new Category_mdl();
			$getallresults = $category_mdl->getall();
			return $getallresults;
		}

		function insert(){
			$name = $_POST['name'];
			$photo = $_FILES['photo'];
			
			$source_dir = $GLOBALS['file_path'].'storage/category/';
			//	var_dump($source_dir);
			//upload
			$fullpath = $source_dir.$photo['name'];
			move_uploaded_file($photo['tmp_name'], $fullpath);

			//database path
			$uploadpath ='storage/category/'.$photo['name'];
			$data = array(
				'name' => $name,
				'photo' => $uploadpath
			);
			//array(2) { ["name"]=> string(4) "home" ["photo"]=> string(69) "storage/category/139512411_1500280246846825_2371128798692019764_o.jpg" }
			//var_dump($data);

			$category_mdl = new Category_mdl();
			$addresult = $category_mdl->insert_data($data);
			//return $addresult;
			//var_dump($addresult);

			$url = $GLOBALS['view_path'].'category_list';
			header('location:'.$url);

		}

		function edit($id){
			$category_mdl = new Category_mdl();
			$getresult = $category_mdl->edit_data($id);
			//var_dump($getresult);
			return $getresult;
		}

		function update(){
			$id = $_POST['id'];
			$name = $_POST['name'];

			$oldphoto = $_POST['oldphoto'];
			$newphoto = $_FILES['photo'];

			if ($newphoto['size'] > 0) {
				$source_dir = $GLOBALS['file_path'].'storage/category/';
				$fullpath = $source_dir.$newphoto['name'];
				move_uploaded_file($newphoto['tmp_name'], $fullpath);

				$uploadpath = 'storage/category/'.$newphoto['name'];
			}else{
				$uploadpath = $oldphoto;
			}

			$data =array(
				'name'	=>	$name,
				'photo'	=>	$uploadpath
			);

			$category_mdl = new Category_mdl();

			$update_result = $category_mdl->update_data($id, $data);

			$url = $GLOBALS['view_path'].'category_list';
			header('location:'.$url);

		}

		function randomcategories(){
			$category_mdl = new Category_mdl();
			$getrandomresults = $category_mdl->randomcategories_data();

			return $getrandomresults;
		}

		function delete($id){
			$category_mdl = new Category_mdl();

			$category_mdl->delete_data($id);

			$url = $GLOBALS['view_path'].'category_list';

			header('location:'.$url);
		}



		
	}

 ?>