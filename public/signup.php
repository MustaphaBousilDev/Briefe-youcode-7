<?php 
require '../private/init.php';
$error="";
#$email="";
#$first_name="";
#$last_name="";$
if($_SERVER['REQUEST_METHOD']=='POST'){
    $first_name=trim($_POST['first_name']);$last_name=trim($_POST['last_name']);
    $first_name=addslashes($first_name);$last_name=addslashes($last_name);
    $phone_number=trim($_POST['phone_number']);$email=$_POST['email'];
    $password=$_POST['password'];$password_conf=$_POST['password_confirm'];
    if(!preg_match("/^[^ ]+@[^ ]+\.[a-z]{2,3}$/",$email)){
        $error.="<div class='alert alert-danger'>Email must be match <strong>abc@gmail.com</strong></div>";
    }
    if(!preg_match("/[a-zA-Z]/",$first_name) || preg_match("/[0-9]/",$first_name)){
        $error.="<div class='alert alert-danger'>first Name must be contain only alphabitic</div>";
    }
    if(!preg_match("/[a-zA-Z]/",$last_name) || preg_match("/[0-9]/",$last_name)){
        $error.="<div class='alert alert-danger'>first Name must be contain only alphabitic</div>";
    }
    if(!preg_match("/[0-9]/",$phone_number) || preg_match("/[a-zA-Z]/",$phone_number) || preg_match("/[!,@,#,$,%,^,&,*,?,_,(,),-,+,=,~]/",$phone_number) || strlen($phone_number)!=10){
        $error.="<div class='alert alert-danger'>phone number must be contain only 10 number</div>";
    }
    $date=date("Y-m-d H:i:s");
    $url_adress=get_random_string(61);
    #check email if exists
    $query="SELECT * FROM users WHERE email=:email LIMIT 1";
    $arr=false;
    $arr['email']=$email;
    $stmt=$connection->prepare($query);
    $check=$stmt->execute($arr);
    if($check){
        $data=$stmt->fetchAll(PDO::FETCH_OBJ);
        
        if(is_array($data) && count($data)>0){
            $error.="<div class='alert alert-danger text-center p-3'>this email is fucking exists</div>";
        }else{
            if($error==""){
                $arr['url_address']=$url_adress;
                $arr['first_name']=$first_name;
                $arr['last_name']=$last_name;$arr['date']=$date;
                $arr['password']=$password;$arr['email']=$email;
                $arr['phone_number']=$phone_number;
                $query="INSERT INTO users (url_address,first_name,last_name,phone_number,email,password,date) VALUES (:url_address,:first_name,:last_name,:phone_number,:email,:password,:date)";
                $stmt=$connection->prepare($query);
                $stmt->execute($arr);
                $data=$data[0];
                $_SESSION['first_name']=$data->first_name;
                $_SESSION['last_name']=$data->last_name;
                $_SESSION['url_address']=$data->url_address;
                header('Location:login.php');
                die;
            }
            
            header('Location:signup.php');
            die;
        }
    }


}





?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/singup.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,500;1,500&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200;1,500&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,200;1,400;1,500&family=Roboto:ital,wght@0,100;0,300;0,400;0,900;1,100;1,300;1,400;1,500&family=Urbanist:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
</head>
<body>
    <div class="signup">
        <div class="left-s">
            <h1>SIGN UP</h1>
            <?php 
            if(isset($error) && $error!=""){
            echo $error;
            }
        ?>
            <form method="POST">
                <div class="field-s">
                    <div class="parent-area parent-area-first">
                        <div class="input-area">
                            <i class='bx bx-user icon'></i>
                            <input value="<?=isset($first_name) ? $first_name : ''?>" name="first_name" class="name first_name" type="text" placeholder="First Name">
                            <i class='bx bx-error-circle error-icon icon' ></i>
                        </div>
                        <span>First Name Cant be Empty</span>
                    </div>
                    <div class="parent-area parent-area-last">
                        <div class="input-area">
                            <i class='bx bx-user icon'></i>
                            <input value="<?=isset($last_name) ? $last_name : ''?>" name="last_name" class="name last_name" type="text" placeholder="Last Name">
                            <i class='bx bx-error-circle error-icon icon' ></i>
                        </div>
                        <span>Last Name Cant be Empty</span>
                    </div>
                </div>
                <div class="field-s">
                    <div class="parent-area parent-area-email">
                        <div class="input-area">
                            <i class='bx bx-envelope icon' ></i>
                            <input value="<?=isset($email) ? $email : ''?>" name="email" class="email" type="text" placeholder="Email">
                            <i class='bx bx-error-circle error-icon icon' ></i>
                        </div>
                        <span>Email Cant be Empty</span>
                    </div>
                    <div class="parent-area parent-area-call">
                        <div class="input-area">
                            <i class='bx bx-phone-call icon' ></i>
                            <input value="<?=isset($phone_number) ? $phone_number : ''?>" name="phone_number" class="phone" type="text" placeholder="Phone number">
                            <i class='bx bx-error-circle error-icon icon' ></i>
                        </div>
                        <span>Phone Number Cant be Empty</span>
                    </div>
                </div>
                <div class="field-s">
                    <div class="parent-area parent-area-pass">
                        <div class="input-area ">
                            <i class='bx bx-lock-alt icon' ></i>
                            <i class='bx bx-low-vision vision icon-eye'></i>
                            <input name="password" class="password" type="password" placeholder="••••••">
                            <i class='bx bx-error-circle error-icon icon' ></i>
                        </div>
                        <span>Password Cant be Empty</span>
                    </div>
                    <div class="parent-area parent-area-confirm">
                        <div class="input-area">
                            <i class='bx bx-lock-alt icon' ></i>
                            <i class='bx bx-low-vision vision icon-eye'></i>
                            <input name="password_confirm" class="password_confirm" type="password" placeholder="••••••">
                            <i class='bx bx-error-circle error-icon icon' ></i>
                        </div>
                        <span>Password Cant Be Empty</span>
                    </div>
                </div>
                <div class="field-s field-s-btns">
                    <input class="save signup-btn-submit" type="submit" value="save">
                </div>
            </form>
        </div>
        <div class="right-s">
            <img src="https://png.pngtree.com/background/20210710/original/pngtree-guitar-music-poster-background-picture-image_1059228.jpg" alt="background-gitar" >
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="../js/signup.js"></script>
</body>
</html>