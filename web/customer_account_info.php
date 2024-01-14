<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Account Information</title>
</head>

<body>

<?php

$host = "127.0.0.1";
$user = "ldc";
$pass = "!LDc042701";
$database = "order_management_portal";

try {
    $db = new mysqli($host, $user, $pass, $database);

    // Display all the inputs
    $user_id = $_POST['userid'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    echo "<h3>You entered:</h3>";
    echo "Username: " . $username . "<br>";
    echo "Email: " . $email . "<br>";

    // print out all CUSTOMER Relation
    $sql_select1 = "SELECT * FROM CUSTOMER
    WHERE CUSTOMER.USERNAME like '%$username%'
    AND CUSTOMER.EMAIL_ADDRESS like '%$email%'";

    $sql_select2 = "SELECT * FROM CUSTOMER
    WHERE CUSTOMER.USERNAME like '%$username%'";

    if (!empty($order_id)) {
        if ($query1 = $db->query($sql_select1)) {
            echo "<h3>Search Result(s):</h3>";
            while ($row = $query1->fetch_assoc()) {
                echo "<b>User_ID:   " . $row["USER_ID"] . "</b> || <b>Email_Address:</b>   " . $row["EMAIL_ADDRESS"] . " || <b>Username:</b>   " . $row["USERNAME"] . " || <b>Zip_Code:</b>   " . $row["ZIP_CODE"] . " || <b>Address:</b>   " . $row["ADDRESS"];
                echo "<br><br><br>";
            }
        } else {
            echo "ERROR: could not execute $sql_select1.<br>";
        }
    } else {
        if ($query2 = $db->query($sql_select2)) {
            echo "<h3>Search Result(s):</h3>";
            while ($row = $query2->fetch_assoc()) {
                echo "<b>User_ID:   " . $row["USER_ID"] . "</b> || <b>Email_Address:</b>   " . $row["EMAIL_ADDRESS"] . " || <b>Username:</b>   " . $row["USERNAME"] . " || <b>Zip_Code:</b>   " . $row["ZIP_CODE"] . " || <b>Address:</b>   " . $row["ADDRESS"];
                echo "<br><br>";
            }
        } else {
            echo "ERROR: could not execute $sql_select2.<br>";
        }
    }

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>

<br><br>
<input type="button" onclick="location.href='./customer.html';" value="Back" />
</body>
</html>
