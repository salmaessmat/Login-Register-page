<?php

$password= $_POST['password'];
$md5 =md5($password);
$email= $_POST['email'];

$con = new mysqli ('localhost','root','','registration');
if($con->connect_error)
{
    die ("FAILED CONNECTION:".$con->connect_error);

}else{
    $query=mysqli_query($con,"select * from `the_user` where email='$email' && password ='$password'");
    $num_rows=mysqli_num_rows($query);
    $row=mysqli_fetch_array($query);
    $name=$row['name'];
    $w="WELCOME  ".$name;
    if($num_rows>0){
        echo"<p>$w</p";

    }
    else{
       header("Refresh :3 ;url=http://localhost/LOGINregistration/LOGIN.html");
       echo"<p>FAILED LOGIN!USER NOT FOUND PLEASE TRY AGAIN</p>";
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