<?php 
	
	class Subcategory_mdl
	{
		protected $pdo;
		function __construct()
		{
			require $GLOBALS['database_path'];//get for catch PDO
			$this->pdo = $pdo;
		}

		function getAll(){
			$sql = "SELECT subcategories.*, categories.id as cid, categories.name as cname
				 FROM subcategories
				 LEFT JOIN categories 
				 on subcategories.category_id = categories.id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$rows = $stmt->fetchAll();
			return $rows;
		}

		function insert_data($data){
			
			$sql = "INSERT INTO subcategories (name,category_id) VALUES (:v1, :v2)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':v1',$data['name']);
			$stmt->bindParam(':v2',$data['categoryid']);
			$stmt->execute();
			
			$rows = $stmt->rowCount();	

			return $rows;
		}

		function edit_data($id){
			$sql = "SELECT * FROM subcategories WHERE id=:v1";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':v1', $id);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
		}

		function update_data($id, $data){
			$categoryid=intval($data['categoryid']);

			$sql = "UPDATE subcategories SET name=:v1,category_id=:v2 WHERE id=:v3";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':v1', $data['name']);
			$stmt->bindParam(':v2', $categoryid);
			$stmt->bindParam(':v3', $id);
			$stmt->execute();
			$row = $stmt->rowCount();

			return $row;
		}

		function delete_data($id){
		$sql = "DELETE FROM subcategories WHERE id=:v1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':v1', $id);
		$stmt->execute();

		$row = $stmt->rowCount();

		return $row;
		}

		function getallBycategoryid($id){
			$sql = "SELECT * FROM subcategories WHERE category_id = :v1";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':v1', $id);
			$stmt->execute();
			
			$rows = $stmt->fetchAll();

			return $rows;
		}

	}

 ?>