
<?php 

require '../private/init.php';
$user_data=check_login($connection);
$username="";
if(isset($_SESSION['first_name'])){
    $username=$_SESSION['first_name'];
}
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
    <link rel="stylesheet" href="../css/dashboard.css">


</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light" style="height: 60px;">
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
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="logout.php">Log-out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
           
          </div>
          
        </div>
    </nav>
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
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td><img class="rounded-circle" src="https://m.media-amazon.com/images/I/81tQhEEtiEL._AC_UL480_FMwebp_QL65_.jpg" width="25" height="25" /></td>
                    <td>Guitar</td>
                    <td>Musique</td>
                    <td>25</td>
                    <td>199</td>
                    <td>22-11-2022</td>
                    <td>
                        <a href="#" class="btn btn-sm  btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        <a href="#" class="btn btn-sm btn-primary text-white"><i class="bi bi-eye-fill"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td><img class="rounded-circle" src="https://m.media-amazon.com/images/I/81tQhEEtiEL._AC_UL480_FMwebp_QL65_.jpg" width="25" height="25" /></td>
                    <td>Guitar</td>
                    <td>Musique</td>
                    <td>25</td>
                    <td>199</td>
                    <td>22-11-2022</td>
                    <td>
                        <a href="#" class="btn btn-sm  btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        <a href="#" class="btn btn-sm btn-primary text-white"><i class="bi bi-eye-fill"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td><img class="rounded-circle" src="https://m.media-amazon.com/images/I/81tQhEEtiEL._AC_UL480_FMwebp_QL65_.jpg" width="25" height="25" /></td>
                    <td>Guitar</td>
                    <td>Musique</td>
                    <td>25</td>
                    <td>199</td>
                    <td>22-11-2022</td>
                    <td>
                        <a href="#" class="btn btn-sm  btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        <a href="#" class="btn btn-sm btn-primary text-white"><i class="bi bi-eye-fill"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td><img class="rounded-circle" src="https://m.media-amazon.com/images/I/81tQhEEtiEL._AC_UL480_FMwebp_QL65_.jpg" width="25" height="25" /></td>
                    <td>Guitar</td>
                    <td>Musique</td>
                    <td>25</td>
                    <td>199</td>
                    <td>22-11-2022</td>
                    <td>
                        <a href="#" class="btn btn-sm  btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        <a href="#" class="btn btn-sm btn-primary text-white"><i class="bi bi-eye-fill"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td><img class="rounded-circle" src="https://m.media-amazon.com/images/I/81tQhEEtiEL._AC_UL480_FMwebp_QL65_.jpg" width="25" height="25" /></td>
                    <td>Guitar</td>
                    <td>Musique</td>
                    <td>25</td>
                    <td>199</td>
                    <td>22-11-2022</td>
                    <td>
                        <a href="#" class="btn btn-sm  btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        <a href="#" class="btn btn-sm btn-primary text-white"><i class="bi bi-eye-fill"></i></a>
                    </td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>




    <!-- Add new Modal -->
	    <div class="modal fade" id="add-new-modal" tabindex="-1" aria-labelledby="add-new-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="add-new-modalLabel">Add new Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="product">
                    <div class="pro-principal d-flex justify-content-center align-items-center">
                        +
                    </div>
                    <ul>
                        <li>+</li>
                        <li>+</li>
                        <li>+</li>
                    </ul>
                </div>
                <form>
                    <input type="file" hidden name="img1"/>
                    <input type="file" hidden name="img2"/>
                    <input type="file" hidden name="img3"/>
                    <input type="file" hidden name="img4"/>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" style="box-shadow: none;">
                    </div>
                    <input type="number" name="quantity">
                    <input type="text" name="price"/>
                    <select>
                        <option>Category</option>
                        <option>one</option>
                        <option>one</option>
                        <option>one</option>
                        <option>one</option>
                    </select>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="box-shadow: none;"></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="save"/>
                </form>
            </div>
          </div>
        </div>
        </div>
    <!-- End Add new Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="../js/dashboard.js"></script>
<script>
    const addModal = new bootstrap.Modal('#add-new-modal', {});
</script>
</body>
</html>