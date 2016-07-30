<?php
session_start();
$errmsg_arr = array();
$errflag = false;

$dbhost 	= "localhost";
$dbname		= "moneytracker";
$dbuser		= "root";
$dbpass		= "";

try{
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
    $user = $_POST['email'];
    $password = $_POST['pword'];
}
catch(PDOException $e) {
    echo $e->getMessage();
}
if($user == '') {
    $errmsg_arr[] = 'You must enter your Username';
    $errflag = true;
}
if($password == '') {
    $errmsg_arr[] = 'You must enter your Password';
    $errflag = true;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email=:email AND password=:pw LIMIT 1");
$stmt->execute(array(':email'=>$user, ':pw'=>$password));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0) {
    $_SESSION['email']=$userRow['email'];
    $_SESSION['name']=$userRow['name'];
    $_SESSION['salary']=$userRow['Current Salary'];
    $conn=null;
    header("location: profile.php");
}
else{
    $errmsg_arr[] = 'Username and Password are not found';
    $errflag = true;
}

if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
}
?>
