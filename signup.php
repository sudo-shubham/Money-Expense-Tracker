<?php
$errmsg_arr = array();
$errflag = false;

$dbhost = "localhost";
$dbname = "moneytracker";
$dbuser = "root";
$dbpass = "";

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pword'];
    $cs = $_POST['cs'];
    $sql = "INSERT INTO users VALUES (NULL, '" . $name . "', '" . $email . "', '" . $password . "', '" . $cs . "', '0',NULL)";
    $stmt = $conn->exec($sql);
    echo "<script>
alert('You have successfully Signed Up');
window.location.href='index.php';
</script>";
} catch (PDOException $e) {
    echo $e->getMessage();
}

