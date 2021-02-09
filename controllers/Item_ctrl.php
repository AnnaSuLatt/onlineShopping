<?php 

	/**
	 * 
	 */
	class Item_ctrl
	{
		
		function __construct()
		{
			require $GLOBALS['model_file_path']."Item_mdl.php";
		}

		function read(){
			$Item_mdl = new Item_mdl();
			$getallresults = $Item_mdl->getall();
			//var_dump($getallresults);
			return $getallresults;
		}

		function insert(){
			$name = $_POST['name'];
			$codeno = $_POST['codeno'];
			$photo = $_FILES['photo'];
			$price = $_POST['price'];
			$discount =$_POST['discount'];
			$description = $_POST['description'];
			$subcategoryid = $_POST['subcategoryid'];
			$brandid = $_POST['brandid'];

			$source_dir = $GLOBALS['file_path'].'storage/item/';
			$fullpath = $source_dir.$photo['name'];
			move_uploaded_file($photo['tmp_name'], $fullpath);

			//database path
			$uploadpath ='storage/item/'.$photo['name'];
			

			$data = array(
				'codeno' => $codeno,
				'name' => $name,
				'photo' => $uploadpath,
				'price' => $price,
				'discount' => $discount,
				'description' => $description,
				'subcategoryid' => $subcategoryid,
				'brandid' => $brandid,
			);

			$item_mdl = new Item_mdl();
			$addresult = $item_mdl->insert_data($data);

			$url = $GLOBALS['view_path'].'item_list';
			header('location:'.$url);
		}

		function edit($id){
			$item_mdl = new item_mdl();
			$getresult = $item_mdl->edit_data($id);
			return $getresult;
		}

		function update(){
			$id = $_POST['id'];
			//$photo = $_POST['photo'];
			$codeno = $_POST['codeno'];
			$name = $_POST['name'];
			$discount = $_POST['discount'];
			$price = $_POST['price'];
			$description = $_POST['description'];
			$subcategoryid = $_POST['subcategoryid'];
			$brandid = $_POST['brandid'];


			$oldphoto = $_POST['oldphoto'];
			$newphoto = $_FILES['photo'];

			if ($newphoto['size'] > 0) {
				$source_dir = $GLOBALS['file_path'].'storage/item/';
				$fullpath = $source_dir.$newphoto['name'];
				move_uploaded_file($newphoto['tmp_name'], $fullpath);

				$uploadpath = 'storage/item/'.$newphoto['name'];
			}else{
				$uploadpath = $oldphoto;
			}

			$data =array(
				'codeno' => $codeno,
				'name' => $name,
				'photo' => $uploadpath,
				'price' => $price,
				'discount' => $discount,
				'description' => $description,
				'subcategoryid' => $subcategoryid,
				'brandid' => $brandid,
			);

			$item_mdl = new Item_mdl();

			$update_result = $item_mdl->update_data($id, $data);

			$url = $GLOBALS['view_path'].'item_list';
			header('location:'.$url);

			}


		function delete($id){
			$item_mdl = new Item_mdl();

			$item_mdl->delete_data($id);

			$url = $GLOBALS['view_path'].'item_list';

			header('location:'.$url);
		}

			function discountitems(){
				$item_mdl = new Item_mdl();
				$getdiscountresults = $item_mdl->discountitems_data();

				return $getdiscountresults;
			}

			function newitems(){
				$item_mdl = new Item_mdl();
				$getnewitemresults = $item_mdl->newitems_data();

				return $getnewitemresults;
			}

			function randomitems(){
			$item_mdl = new Item_mdl();
			$getrandomresults = $item_mdl->randomitems_data();

			return $getrandomresults;
		}


	}

 ?>