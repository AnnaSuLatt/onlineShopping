<?php 

	class Category_mdl
	{
		protected $pdo;
		function __construct()
		{
			require $GLOBALS['database_path'];//get for catch PDO
			$this->pdo = $pdo;
		}

		function getall(){
			//1.query,2.prepare,3.bind where condition,4.execute,5.fetch

			//1.query
			$sql = "SELECT * FROM categories ORDER BY name ASC";
			//return query for PDO
			//2.prepare
			$stmt = $this->pdo->prepare($sql);
			//3.parameter / bind (optional) where , no need in select
			//4.Execute
			$stmt->execute();
			//5.fetchall/fetchAssoc
			$rows = $stmt->fetchall();	

			return $rows;
		}

		function insert_data($data){
			
			$sql = "INSERT INTO categories (name,logo) VALUES (:v1, :v2)";
			//var_dump( $this);
			$stmt = $this->pdo->prepare($sql);
			var_dump($data['name']);
			$stmt->bindParam(':v1',$data['name']);
			$stmt->bindParam(':v2',$data['photo']);
			$stmt->execute();
			
			$rows = $stmt->rowCount();	

			return $rows;
			// var_dump($rows);
		}

		function edit_data($id){
			$sql = "SELECT * FROM categories WHERE id=:v1";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':v1', $id);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
		}

		function update_data($id, $data){
		$sql = "UPDATE categories SET name=:v1, logo=:v2 WHERE id=:v3";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':v1', $data['name']);
		$stmt->bindParam(':v2', $data['photo']);
		$stmt->bindParam(':v3', $id);
		$stmt->execute();

		$row = $stmt->rowCount();

		return $row;

		}

		function delete_data($id){
		$sql = "DELETE FROM categories WHERE id=:v1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':v1', $id);
		$stmt->execute();

		$row = $stmt->rowCount();

		return $row;
		}

		

		function randomcategories_data(){
			$sql = "SELECT * FROM categories ORDER BY rand() LIMIT 8";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();

			$rows = $stmt->fetchAll();

			return $rows;

		}


		
	}
 ?>