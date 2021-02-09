<?php 

	/**
	 * 
	 */
	class Item_mdl
	{
		
		protected $pdo;

		function __construct()
		{
			require $GLOBALS['database_path'];
			$this->pdo = $pdo;
		}

		function getall(){
				$sql = "SELECT items.*, subcategories.id as sid, subcategories.name as sname,brands.id as bid, brands.name as bname
				 FROM items
				 LEFT JOIN subcategories 
				 on items.subcategory_id = subcategories.id
				 LEFT JOIN brands 
				 on items.brand_id = brands.id";
			 	 $stmt = $this->pdo->prepare($sql);
				 $stmt->execute();
				 $rows = $stmt->fetchAll();
				 return $rows;
			}

		function insert_data($data){
			
			$brandid =intval($data['brandid']);
			$subcategoryid =intval($data['subcategoryid']);
			$sql = "INSERT INTO items (codeno,name,photo,price,discount,description,brand_id,subcategory_id) VALUES (:v1, :v2,:v3, :v4,:v5, :v6,:v7, :v8)";

			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':v1',$data['codeno']);
			$stmt->bindParam(':v2',$data['name']);
			$stmt->bindParam(':v3',$data['photo']);
			$stmt->bindParam(':v4',$data['price']);
			$stmt->bindParam(':v5',$data['discount']);
			$stmt->bindParam(':v6',$data['description']);
			$stmt->bindParam(':v7',$brandid);
			$stmt->bindParam(':v8',$subcategoryid);
			$stmt->execute();
			
			$rows = $stmt->rowCount();	

			return $rows;
		}

		function edit_data($id){
			$sql = "SELECT * FROM items WHERE id=:v1";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':v1', $id);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
		}

		function update_data($id, $data){

			$brandid=intval($data['brandid']);
			$subcategoryid=intval($data['subcategoryid']);
			$sql = "UPDATE items SET codeno=:v1, name=:v2, photo=:v3, price = :v4, discount = :v5, description = :v6, brand_id = :v7, subcategory_id= :v8 WHERE id=:v9";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':v1',$data['codeno']);
			$stmt->bindParam(':v2',$data['name']);
			$stmt->bindParam(':v3',$data['photo']);
			$stmt->bindParam(':v4',$data['price']);
			$stmt->bindParam(':v5',$data['discount']);
			$stmt->bindParam(':v6',$data['description']);
			$stmt->bindParam(':v7',$brandid);
			$stmt->bindParam(':v8',$subcategoryid);
			$stmt->bindParam(':v9',$id);
			
			$stmt->execute();

			$row = $stmt->rowCount();

			return $row;
		}

		function delete_data($id){
		$sql = "DELETE FROM items WHERE id=:v1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':v1', $id);
		$stmt->execute();

		$row = $stmt->rowCount();

		return $row;
		}

		function discountitems_data(){
			$sql = "SELECT * FROM items WHERE discount != '' LIMIT 8";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();

			$rows = $stmt->fetchAll();

			return $rows;
		}

		function newitems_data(){
			$sql = "SELECT * FROM items ORDER BY created_at DESC LIMIT 8";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();

			$rows = $stmt->fetchAll();

			return $rows;
		}

		function randomitems_data(){
		$subcategoryid = 1;

		$sql = "SELECT * FROM items WHERE subcategory_id = :v1 LIMIT 8";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':v1', $subcategoryid);
		$stmt->execute();

		$rows = $stmt->fetchAll();

		return $rows;
		}

	}

 ?>