<?php 

require '../private/init.php';
$error="";
if(isset($_SESSION['url_address'])){
    header('Location:index.php');
    die;
}
if($_SERVER["REQUEST_METHOD"]=="POST" /*&& isset($_SESSION['token']) && isset($_POST['token']) && $_SESSION['token']==$_POST['token'] */ ){
    $email=$_POST['email'];
    if(!preg_match("/^[^ ]+@[^ ]+\.[a-z]{2,3}$/",$email)){
        $error.="<div class='alert alert-danger text-center'>Please Enter a valid email</div>";
    }
    $password=$_POST['password'];
    if($error==""){
        $arr['password']=$password;
        $arr['email']=$email;
        $query="SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";
        $stmt=$connection->prepare($query);
        $check=$stmt->execute($arr);
        //echo "hhh";
        if($check){
            //echo "lll";
            $data=$stmt->fetchAll(PDO::FETCH_OBJ);
            //print_r($data);
            if(is_array($data) && count($data)>0){
                $data=$data[0];
                $_SESSION['first_name']=$data->first_name;
                $_SESSION['last_name']=$data->last_name;
                $_SESSION['url_address']=$data->url_address;
                header('Location:index.php');
                die;
            }
        }
    }
    $error.="<div class='alert alert-danger text-center'>Wrong Email or password</div>";
}




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/logins.css">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,500;1,500&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200;1,500&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,200;1,400;1,500&family=Roboto:ital,wght@0,100;0,300;0,400;0,900;1,100;1,300;1,400;1,500&family=Urbanist:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="login">
        <div class="content-login">
            <div class="left">
                <img src="https://png.pngtree.com/background/20210710/original/pngtree-guitar-music-poster-background-picture-image_1059228.jpg" alt="background-gitar">
            </div>
            <div class="right">
                <h1>Login</h1>
                <?php 
                    if(isset($error) && $error!=""){
                        echo $error;
                    }
                ?>
                <form method="POST"> 
                    <div class="field field-email">
                        <input value="<?=isset($email) ? $email : ''?>" type="text" name="email" placeholder="Email">
                        <i class='bx bx-envelope icon icon-normal'></i>
                        <i class='bx bx-error-circle icon icon-err' ></i>
                        
                    </div>
                    <span class="msg-error msg-err-email">Email can't be empty</span>
                    <div class="field field-password">
                        <input type="password" name="password" placeholder="•••••••">
                        <i class='bx bx-lock icon icon-normal'></i>
                        <i class='bx bx-error-circle icon icon-err' ></i>
                    </div>
                    <span class="msg-error msg-err-pass">Password can't be empty</span>
                    <div class="check-rem">
                        <input type="checkbox" name="remember-me" >
                        <label>Remember me</label>
                    </div>
                    <div class="field field-submit">
                        <input class="btn_submit" type="submit" value="LOGIN" name="login" />
                    </div>
                    <div class="signup-div">
                        <p>New User?<a href="signup.php"> Signup</a></p>
                        <p><a href="#">Forgot your password?</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="../js/login.js"></script>
</body>
</html>