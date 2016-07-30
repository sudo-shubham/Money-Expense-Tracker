<?php
$dbhost = "localhost";
$dbname = "moneytracker";
$dbuser = "shubham8";
$dbpass = "shubham8";

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pword'];
    $cs = $_POST['cs'];
    $sql = "INSERT INTO users VALUES (NULL, '" . $name . "', '" . $email . "', '" . $password . "', '" . $cs . "', '0',NULL)";
    $stmt = $conn->exec($sql);
    $code = substr(number_format(time() * rand(),0,'',''),0,5);
    $message = "Your Activation Code is ".$code."";
    $to=$email;
    $sql = "INSERT INTO verifyemail VALUES ('".$code."','".$email."')";
    $stmt = $conn->exec($sql);
    $subject="Activation Code For Money Expense Tracker";
    $from = 'contact@shubhampatel.com';
    $body="Click Below<br>";
    $body.='http://www.shubhampatel.com/verification.php?id='.$email.'&code='.$code;
    $headers = "From:".$from;
    mail($to,$subject,$body,$headers);
    echo "<script> alert('You have successfully Signed Up.Please Verify Your Email Address.'); window.location.href='index.php'; </script>";
} catch (PDOException $e) {
    echo $e->getMessage();
}

