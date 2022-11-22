<?php 

require '../private/init.php';

if(count($_POST) > 0){
global $connection;

	$info  = [];
	$info['data_type'] = $_POST['data_type'];
    if($_POST['data_type'] == 'read'){

		$query 			= "SELECT products.* , categories.name AS categories_name FROM products INNER JOIN categories ON categories.id=products.category;  ORDER BY id desc";
		//$result 		= query($query);
        $stmt=$connection->prepare($query);
        $stmt->execute();
		$result=$stmt->fetchAll();
		$info['data'] 	= $result;

	}
	else
	if($_POST['data_type'] == 'get-edit-row')
	{
		$id =$_POST['id'];
		$query='SELECT * FROM products WHERE ID=?';

		$stmt=$connection->prepare($query);
		$stmt->execute(array($id));
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$count=$stmt->rowCount();
		if($count > 0){
            $info['data'] 	= $row[0];
		}
	}
	else if($_POST['data_type'] == 'save'){
		$image = "";
		//check for an image
		if(!empty($_FILES['image']['name']))
		{
			$allowed = ['image/jpeg','image/png'];

			if(in_array($_FILES['image']['type'], $allowed))
			{
				$folder = "uploads/";
				if(!file_exists($folder))
				{
					mkdir($folder,0777,true);
				}
				$path = $folder . time() . $_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'], $path);
				$image = $path;
			}
		}
		$name 	=$_POST['names'];
		$quantity 	=(int)$_POST['quantitys'];
		$image 	= $image;
        $category=(int)$_POST['categorys'];
		$description 	=$_POST['descriptions'];
		$price 	= (int)$_POST['prices'];
		$date_created 	= date("Y-m-d H:i:s");

		$query 			= "insert into products (name,description,category,price,quantity,image,date) values (:name,:description,:category,:price,:quantity,:image,:date)";
		//$result 		= query($query);
        $stmt=$connection->prepare($query);
            $stmt->execute(array(
                'name' => $name,
                'description' => $description,
                'date'=>$date_created,
                'price'=>$price,
                'category'=>$category,
                'quantity'=>$quantity,
                'image'=>$image 
            ));
		$info['data'] 	= "Record was saved!";

	}
	else if($_POST['data_type'] == 'delete'){
		$id = (int)$_POST['id'];
        $stmt=$connection->prepare("DELETE FROM products WHERE ID=:id");
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$info['data'] 	= "Record deleted!!";

	}
	if($_POST['data_type'] == 'edit'){
		$image = "";
		//check for an image
		if(!empty($_FILES['image']['name'])){
			$allowed = ['image/jpeg','image/png'];
			if(in_array($_FILES['image']['type'], $allowed)){
				$folder = "uploads/";
				if(!file_exists($folder)){
					mkdir($folder,0777,true);
				}
				$path = $folder . time() . $_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'], $path);
				$image = $path;
			}
		}
		$id 	        = (int)$_POST['id'];
		$name 	        = $_POST['name'];
		$quantity 	    = (int)$_POST['quantity'];
		$image 	        = $image;
        $category       = (int)$_POST['category'];
		$description 	= $_POST['description'];
		$price 	        = (int)$_POST['price'];
		$date_created 	= date("Y-m-d H:i:s");
		if(empty($image)){
			$stmt_up=$connection->prepare('UPDATE products SET name=? , description=? , category=?, price=? , quantity=? ,date=?  WHERE id=?');
			$stmt_up->execute(array($name,$description,$category,$price,$quantity,$date_created,$id));
		}else{
			$stmt_up=$connection->prepare('UPDATE products SET name=? , description=? , category=?, price=? , quantity=?,image=? ,date=?  WHERE id=?');
			$stmt_up->execute(array($name,$description,$category,$price,$quantity,$image,$date_created,$id));
		}
		$info['data'] 	= "Record was edited!";

	}
	

	echo json_encode($info);
}

?>