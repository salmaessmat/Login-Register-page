<?php
session_start();
$name = $_POST['name'];
$password =$_POST['password'];
$email =$_POST['email'];
//$confirm_password = $_POST['confirm_password'];
$md5 =md5($password);
$con =new mysqli ('localhost','root','','registration');
if($con -> connect_error)
{
    die("FAILED CONNECTION:".$con->connect_error);
}else{

    $SELECT ="SELECT email FROM the_user WHERE email = ? Limit 1";
    //bey7adar el data 
    $stmt = $con ->prepare($SELECT);
    $stmt->bind_param ('s',$email);
    $stmt->execute();
    $stmt->store_result();
    $rnum =$stmt->num_rows;
    $w="WELCOME ".$_POST['name'];
    if($rnum == 0)
    {
        $stmt2 = $con->prepare("INSERT INTO the_user (email,name,password)
        VALUES('".$_POST['email']."','".$_POST['name']."','$md5')");
        //$stmt2->bind_param("sss",$email,$name,$password);
        echo"<p>$w</p>";

    }else{
        header("REFRESH :3 ;url=http://localhost/LOGINregistration/SIGNUP.html");
        echo"<p>THIS EMAIL ALREADY EXISTS...</p>";
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="LOGIN.html">LOGOUT</a>
</body>
</html>