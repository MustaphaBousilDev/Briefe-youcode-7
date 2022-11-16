<?php 

require '../private/init.php';

if(count($_POST) > 0)
global $connection;
{
	$info  = [];
	$info['data_type'] = $_POST['data_type'];
    if($_POST['data_type'] == 'read')
	{

		$query 			= "select * from products ORDER BY ID desc";
		//$result 		= query($query);
        $stmt=$connection->prepare($query);
        $stmt->execute();
		$result=$stmt->fetchAll();
		$info['data'] 	= $result;

	}
	else if($_POST['data_type'] == 'save')
	{
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
	

	echo json_encode($info);
}

?>