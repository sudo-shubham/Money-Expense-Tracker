<?php
session_start();
if(!$_SESSION['email'])
{
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Money Expense Tracker</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>
<body class="content bgcolor-4">
<div class="container">
    <h3 style="color:#FFF; float:left; margin-left:20px;">Welcome, <?php echo $_SESSION['name']; ?></h3>
    <h3 style="color:#FFF; float:right; margin-right:20px;">Current Salary : Rs. <?php echo $_SESSION['salary']; ?></h3>
    <h2 style="color:#FFF; margin-top:100px;">Current Expenses</h2>
    <table id="issues">
        <tr>
            <th>Category</th>
            <th>Description</th>
            <th>Date</th>
            <th>Amount</th
        </tr>
        <?php
        $dbhost = "localhost";
        $dbname = "moneytracker";
        $dbuser = "root";
        $dbpass = "";

        try {
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        } catch (PDOException $e) {
        echo $e->getMessage();
        }
        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $sql = "SELECT * FROM expense WHERE email='".$_SESSION['email']."'";
        $users = $conn->query($sql);
        $sum=0;
        foreach ($users as $row) {
            echo '<tr>
            <td>'.$row["category"].'</td>
            <td>'.$row["description"].'</td>
            <td>'.$row["date"].'</td>
            <td>'.$row["amount"].'</td>
        </tr>';
            $sum=$sum+$row["amount"];
        }
?>
        <tr>
            <form method="post" action="expense.php">
                <td><select name="category">
                        <option value="Personal">Personal</option>
                        <option value="Utility Bills">Utility Bills</option>
                        <option value="Food">Food</option>
                        <option value="Transportation">Transportation</option>
                    </select></td>
                <td><input type="text" name="desc" placeholder="Description"></td>

                <td><input type="date" name="date" placeholder="DD/MM/YYYY Format"></td>
                <td><input type="number" name="amount" placeholder="Rs Spent"><input type="submit" value="Add Expense"></td>
            </form>
        </tr>
        <tr>
            <th colspan="4">Total Spent:-<?php echo $sum; ?></th>
        </tr>
        <tr>
            <th colspan="4">Savings:-<?php echo $_SESSION['salary']-$sum; ?></th>
        </tr>
    </table>
    <a href="logout.php"><h3 style="color:#FFF; margin-left:20px;">Logout</h3></a>
</div>
</body>
</html>
