<?php 

function get_random_string($length){
    $array=array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','z','e','r','t','y','u','i','o','p','q','s','g','h','j','k','l','m','w','x','v','n','A','Z','E','R','T','Y','U','I','O','P','Q','S','D','F','G','H','J','K','L','M','W','X','C','V','B','N');
    $text="";
    $length=rand(4,$length);
    for($i=0;$i<$length;$i++){
        $random=rand(0,61);
        $text.=$array[$random];
    }
    return $text;
}

function check_login($connection){
    if(isset($_SESSION['url_address'])){
        $arr['url_address']=$_SESSION['url_address'];
        $query="SELECT * FROM users WHERE url_address=:url_address LIMIT 1";
        $stmt=$connection->prepare($query);
        $check=$stmt->execute($arr);
        if($check){
            $data=$stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data)>0){
                echo "<pre>";
                print_r($data[0]);
                echo "</pre>";
                return $data[0];
            }
        }
    }
    header('Location:login.php');
    die;
}




?>