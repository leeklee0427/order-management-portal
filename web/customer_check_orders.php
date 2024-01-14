<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check Orders</title>
</head>

<body>

<?php

$host = "127.0.0.1";
$user = "ldc";
$pass = "!LDc042701";
$database = "order_management_portal";

try {
    $db = new mysqli($host, $user, $pass, $database);

    // Display inputs
    $user_id = $_POST['userid'];
    $order_id = $_POST['orderid'];
    $username = $_POST['username'];

    echo "<h3>You entered:</h3>";
    echo "Username: " . $username . "<br>";
    echo "Order_ID: " . $order_id . "<br>";

    $sql_select1 = "SELECT PRODUCT_INFO.PRODUCT_ID AS pid, PRODUCT_INFO.PRODUCT_NAME AS pname, INCLUDES.QUANTITY AS q
    FROM CUSTOMER
    LEFT JOIN ORDER_INFO on CUSTOMER.USER_ID = ORDER_INFO.ORDER_USER_ID
    LEFT JOIN INCLUDES on ORDER_INFO.ORDER_ID = INCLUDES.INCLUDES_ORDER_ID
    LEFT JOIN PRODUCT_INFO on PRODUCT_INFO.PRODUCT_ID = INCLUDES.INCLUDES_PRODUCT_ID
    WHERE 
    ORDER_INFO.ORDER_ID = $order_id
    AND CUSTOMER.USERNAME like '%$username%'";

    $sql_select2 = "SELECT PRODUCT_INFO.PRODUCT_ID AS pid, PRODUCT_INFO.PRODUCT_NAME AS pname, INCLUDES.QUANTITY AS q,
    ORDER_INFO.ORDER_ID AS orid
    FROM CUSTOMER
    LEFT JOIN ORDER_INFO on CUSTOMER.USER_ID = ORDER_INFO.ORDER_USER_ID
    LEFT JOIN INCLUDES on ORDER_INFO.ORDER_ID = INCLUDES.INCLUDES_ORDER_ID
    LEFT JOIN PRODUCT_INFO on PRODUCT_INFO.PRODUCT_ID = INCLUDES.INCLUDES_PRODUCT_ID
    WHERE CUSTOMER.USERNAME like '%$username%'";

    $num_rows = 0; // Initialize $num_rows

    if (empty($order_id)) {
        $query_select2 = $db->query($sql_select2);
        $num_rows = $query_select2->num_rows;

        if ($query_select2) {
            if ($num_rows > 0) {
                echo "<h3>Search Result(s):</h3>";
                while ($row = $query_select2->fetch_assoc()) {
                    echo "<b>Product_ID:</b> " . $row["pid"] . " || <b>Product_Name:</b> " . $row["pname"] . " || <b>Quantity:</b> " . $row["q"] . " || <b>Order_ID:</b> " . $row["orid"];
                    echo "<br>";
                    echo "\n";
                }
            } else {
                echo "<p>No order associated with the account.</p>";
            }
        } else {
            echo "ERROR: could not execute $sql_select2.<br>";
        }
    } else {
        $query_select1 = $db->query($sql_select1);
        $num_rows = $query_select1->num_rows;

        if ($query_select1) {
            if ($num_rows > 0) {
                echo "<h3>Search Result(s):</h3>";
                while ($row = $query_select1->fetch_assoc()) {
                    echo "<b>Product_ID:</b> " . $row["pid"] . " || <b>Product_Name:</b> " . $row["pname"] . " || <b>Quantity:</b> " . $row["q"];
                    echo "<br>";
                    echo "\n";
                }
            } else {
                echo "<p>No order associated with the account.</p>";
            }
        } else {
            echo "ERROR: could not execute $sql_select1.<br>";
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
