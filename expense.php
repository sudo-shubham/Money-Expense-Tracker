<?php
session_start();
$dbhost = "localhost";
$dbname = "moneytracker";
$dbuser = "root";
$dbpass = "";

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $cat = $_POST['category'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $sql = "INSERT INTO expense VALUES (NULL, '" . $_SESSION['email'] . "', '" . $cat . "', '" . $date . "', '" . $desc . "','" . $amount . "')";
    $stmt = $conn->exec($sql);
    $conn = null;
    header("location: profile.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}

