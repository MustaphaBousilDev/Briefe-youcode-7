
<?php 

require '../private/init.php';
$user_data=check_login($connection);
#var_dump($user_data);
$username="";
if(isset($_SESSION['first_name'])){
    $username=$_SESSION['first_name'];
}

$query="SELECT * FROM categories";
$stmt=$connection->prepare($query);
$check=$stmt->execute();
$categories=$stmt->fetchAll(PDO::FETCH_OBJ);
if(is_array($categories) && count($categories)>0){
    ;
	#echo "<pre>";
    #print_r($categories);
    #echo "</pre>";
}
$query2="SELECT * FROM users";
$stmt2=$connection->prepare($query2);
$check2=$stmt2->execute();
$count=$stmt2->rowCount();
#echo "hhhh";
#echo $count;

$query3="SELECT * FROM products";
$stmt3=$connection->prepare($query3);
$check3=$stmt3->execute();
$coun2=$stmt3->rowCount();

$price="SELECT sum(price) FROM products";
$stmt7=$connection->prepare($price);
$nbr=$stmt7->execute();
$nbrd=$stmt7->fetch();






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/dashboards.css">


</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light" style="height: 60px;margin-bottom:20px">
        <div class="container">
          <a class="navbar-brand" href="#">MUGIWARA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
            </ul> 
            <div>
                <ul class="d-flex mt-3" style="list-style: none;height: 55px;">
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img class="rounded-circle" src="me.jpg" width="45px" height="45px" alt="fff"/>
                        </a> 
                        <ul class="dropdown-menu" style="left:-100px;">
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="logout.php">Log-out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
           
          </div>
          
        </div>
    </nav>
	<div class="container" >
		<div class='row'>
		<div class="card col-sm-12 col-md-4 col-lg-3 bg-transparent border-0 p-2" style="height:180px">
			<div class="card-body border d-flex justify-content-center align-items-center">
			<i class="bi bi-people-fill" style="font-size:50px"></i> <?=$count?>
			</div>
        </div>
		<div class="card col-sm-12 col-md-4 col-lg-3 bg-transparent border-0 p-2" style="height:180px">
			<div class="card-body border d-flex justify-content-center align-items-center">
			<i class="bi bi-tag-fill" style="font-size:50px"></i> <?=$coun2?>
			</div>
        </div>
		
		<div class="card col-sm-12 col-md-4 col-lg-3 bg-transparent border-0 p-2" style="height:180px">
			<div class="card-body border d-flex justify-content-center align-items-center">
			<i class="bi bi-currency-dollar" style="font-size:50px"></i> 3000
			</div>
        </div>
		<div class="card col-sm-12 col-md-4 col-lg-3 bg-transparent border-0 p-2" style="height:180px">
			<div class="card-body border d-flex justify-content-center align-items-center">
			<i class="bi bi-person-fill-check" style="font-size:50px"></i> Online(<?=$_SESSION['first_name'];?>)
			</div>
        </div>
		</div>
	</div>
    <div class="container">
        <a href="#" class="btn btn-warning mt-3 mb-0 " onclick="addModal.show()">Add Product</a>
        <div class="table-responsive-sm table-responsive-md mt-5" style="border: 1px solid rgb(200, 198, 198);border-bottom: 0;">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price($)</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="my-table-body">
                  
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add new Modal -->
	<div class="modal fade" id="add-new-modal" tabindex="-1" aria-labelledby="add-new-modalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="add-new-modalLabel">Add new customer</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form method="POST" class="js-add-user-form" onsubmit="add_new(event)">
	      <div class="modal-body">
	        
		        <label class="mt-2 d-block" style="cursor: pointer;text-align: center;">
		        	<img src="images/user.png" class="js-add-image mx-auto d-block" style="width:150px;height: 150px;object-fit: cover;">

		        	<div class="input-group mb-3">
					  <!--<label class="input-group-text" for="inputGroupFile01">Upload</label>-->
					  <input id="image"  onchange="display_image(this.files[0])" type="file" class="form-control" id="inputGroupFile01" required hidden>
					</div>

		        	<script>
		        		function display_image(file)
		        		{
		        			let allowed = ['jpg','jpeg','png'];

		        			let ext = file.name.split(".").pop();
		        			
		        			if(allowed.includes(ext.toLowerCase()))
		        			{
		        				document.querySelector('.js-add-image').src = URL.createObjectURL(file);
		        				image_added = true;
		        			}else 
		        			{
		        				alert("Only the following image types are allowed:"+ allowed.toString(", "));
		        			}

		        		}
		        	</script>
		        </label>
		      	<div class="mt-2">
				  <label for="name" class="form-label">Name</label>
				  <input  type="text" class="form-control" id="names" name="name" placeholder="Name" required>
				</div>

		      	<div class="mt-2">
				  <label for="quantity" class="form-label">quantity</label>
				  <input  type="number" min="1" max="100" value="1" class="form-control" id="quantitys" name="quantity"  required>
				</div>

		      	<div class="mt-2">
				  <label for="price" class="form-label">price</label>
          <input  type="number" min="1" max="100" value="1" class="form-control" id="prices" name="price" required>
				</div>

		      	<div class="mt-2">
				
				  <label for="category" class="form-label">Category</label>
				  <select id="categorys" name="category" class="form-select">
					<?php foreach($categories as $category): ?>
					    <option value="<?=$category->id?>"><?=$category->name?></option>
					<?php endforeach ?>
          </select>
				</div>
        <div class="mt-2">
          <textarea  id="descriptions" name="description" class="form-control">

          </textarea>
				</div>

				      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
	      </form>

	    </div>
	  </div>
	</div>
	<!-- End Add new Modal -->
	<!--##########################-->
	<!-- Edit Modal -->
	<div class="modal fade" id="edit-new-modal" tabindex="-1" aria-labelledby="edit-new-modalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="edit-new-modalLabel">Edit customer</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form class="js-edit-user-form" onsubmit="edit_row(event)">
	      <div class="modal-body">
	            <input type="hidden" id="id" name="id" />
		        <label class="mt-2 d-block" style="cursor: pointer;text-align: center;">
		        	<img src="images/user.png" class="js-edit-image mx-auto d-block" style="width:150px;height: 150px;object-fit: cover;">

		        	<div class="input-group mb-3">
					  <label class="input-group-text" for="inputGroupFile01">Upload</label>
					  <input id="image" onchange="display_edit_image(this.files[0])" type="file" class="form-control" id="inputGroupFile01" >
					</div>

		        	<script>
		        		function display_edit_image(file)
		        		{
		        			let allowed = ['jpg','jpeg','png'];

		        			let ext = file.name.split(".").pop();
		        			
		        			if(allowed.includes(ext.toLowerCase()))
		        			{
		        				document.querySelector('.js-edit-image').src = URL.createObjectURL(file);
		        				image_added = true;
		        			}else 
		        			{
		        				alert("Only the following image types are allowed:"+ allowed.toString(", "));
		        			}

		        		}
		        	</script>
		        </label>
				<div class="mt-2">
				  <label for="name" class="form-label">Name</label>
				  <input  type="text" class="form-control" id="name" name="name" placeholder="Name" required>
				</div>

		      	<div class="mt-2">
				  <label for="quantity" class="form-label">quantity</label>
				  <input  type="number" min="1" max="100" value="1" class="form-control" id="quantity" name="quantity"  required>
				</div>

		      	<div class="mt-2">
				  <label for="price" class="form-label">price</label>
          <input  type="number" min="1" max="100" value="1" class="form-control" id="price" name="price" required>
				</div>

		      	<div class="mt-2">
				  <label for="category" class="form-label">Category</label>
				  <select id="category" name="category">
            <option value="1">one</option>
            <option value="2">one</option>
            <option value="3">one</option>
            <option value="4">one</option>
          </select>
				</div>
        <div class="mt-2">
          <textarea  id="description" name="description">

          </textarea>

				<input type="hidden" id="id">
				</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      </form>

	    </div>
	  </div>
	</div>
	<!-- End Edit Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="../js/dashboard.js"></script>
<script>
    var image_added = false;
    const addModal = new bootstrap.Modal('#add-new-modal', {});
	const editModal = new bootstrap.Modal('#edit-new-modal', {});
    send_data({},'read');
    function send_data(obj, type)
	{
		var form = new FormData();
		for(key in obj)
		{
			form.append(key,obj[key]);

		}
    //console.log(form)
		form.append('data_type',type);
		var ajax = new XMLHttpRequest();
		ajax.addEventListener('readystatechange',function(){
			if(ajax.readyState == 4){
				if(ajax.status == 200){
					handle_result(ajax.responseText);
				}else{
					alert("an error occured");
				}
			}
		});
		ajax.open('post','backend.php',true);
		ajax.send(form);
	}

    function handle_result(result)
	{
		
		//console.log(result);
		var obj = JSON.parse(result);
    //console.log(obj);
        //console.log(obj.data)
		if(typeof obj == 'object'){
			if(obj.data_type == 'read'){
				let tbody = document.querySelector(".my-table-body");
				let str = "";
				if(typeof obj.data == 'object'){
					for (var i = 0; i < obj.data.length; i++) {
						let row = obj.data[i];
						str += `<tr>
                      <td>${row.id}</td>
                      <td><img class="rounded-circle" onclick="get_view_row(${row.id});viewModal.show()" src="${row.image}" style="width:25px;height:25px;object-fit: cover;cursor:pointer" /></td>
                      <td>${row.name}</td>
                      <td>${row.categories_name}</td>
                      <td>${row.quantity}</td>
                      <td>${row.price}</td>
                      <td>${row.date}</td>
					  <td>
						<button onclick="get_edit_row(${row.id});editModal.show()"  class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></button>
						<button onclick="delete_row(${row.id})"  class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
					  </td>
						        </tr>`;
					}
				}else{str = "<tr><td>No records found!</td></tr>";}

				tbody.innerHTML = str;
			}else
			if(obj.data_type == 'save')
			{
				alert(obj.data);
				send_data({},'read');
			}else
			if(obj.data_type == 'edit')
			{
				alert(obj.data);
				send_data({},'read');
			}else
			if(obj.data_type == 'delete')
			{
				alert(obj.data);
				send_data({},'read');
			}else
			if(obj.data_type == 'get-edit-row')
			{
				let row = obj.data;
				//console.log('rororororor')
				console.log(row)
				//console.log(typeof row)
				if(typeof row == 'object'){
					console.log('is object')
					let myModal = document.querySelector("#edit-new-modal");
					//console.log(row)
					for (key in row){
						//document.querySelector(".js-edit-image").src = row['image'];
						if(key == "image")
							document.querySelector(".js-edit-image").src = row[key];

						let input = myModal.querySelector("#"+key);
						
						//console.log(input)
						if(input != null)
						{
							if(key != "image")
								input.value = row[key];
						}
					}
				}
			}
		}
	}

    function add_new(e){
        e.preventDefault();
        //validate 
        if(!image_added){
          alert("An image is required");return}
        let obj = {};
        let inputs = e.currentTarget.querySelectorAll("input,select,textarea");
        //console.log(inputs)
        for (var i = 0; i < inputs.length; i++) {
          if(inputs[i].type == 'file' && image_added){
            obj[inputs[i].id] = inputs[i].files[0];
          }else{
            obj[inputs[i].id] = inputs[i].value;
            //console.log(obj)
          }
          inputs[i].value = "";
        }
        image_added = false;
        document.querySelector(".js-add-image").src = "images/user.png";
        /*document.querySelector('.image-2').src = "images/user.png";
        document.querySelector('.image-3').src = "images/user.png";
        document.querySelector('.image-4').src = "images/user.png";
        */
        //console.log('ggg')
        //console.log(obj)
        send_data(obj,'save');
        addModal.hide();
	}
	function edit_row(e){
		e.preventDefault();
		let obj = {};
		let inputs = e.currentTarget.querySelectorAll("input,select,textarea");
		console.log(inputs[0].value)

		for (var i = 0; i < inputs.length; i++) {
			if(inputs[i].type == 'file' && image_added){
				obj[inputs[i].id] = inputs[i].files[0];
			}else{
				obj[inputs[i].id] = inputs[i].value;
			}
			obj['id'] = inputs[0].value;
		}
		
		image_added = false;
		document.querySelector(".js-edit-image").src = "images/user.png";
		send_data(obj,'edit');
		console.log('fjfjfjfjf')
		console.log(obj)
		editModal.hide();
	}
	function delete_row(id){
		if(!confirm("Are you sure you want to delete row number "+id+"?!")){
			return;
		}
		send_data({id:id},'delete');
	}
	function get_edit_row(id){
		send_data({id:id},'get-edit-row');
		//console.log('fuck')
		//console.log(id)
	}
	



</script>
</body>
</html>