<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table Contents</title>
</head>

<body>
    <h3>Table Contents in our Database:</h3>
    <h4>Note: This page is for debugging purposes. If there are contents showing, the connection is succesful.</h4>
    <input href="#" class="but" type="button" onclick="location.href='./index.html';" value="Home" />
    <br><br>

    <?php

    // display errors
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // credentials
    $host = "127.0.0.1";
    $user = "ldc";
    $pass = "!LDc042701";
    $database = "order_management_portal";

    try {
        $db = new mysqli($host, $user, $pass, $database);

        echo "Connection successful" . "<br>";
        echo "host: " . "$host" . "<br>";
        echo "database: " . "$database" . "<br>";
        echo "user: " . "$user" . "<br>";
        echo "<br><br>";

        // print out all Tables/Relations
        $sql = "SHOW TABLES";
        if ($query0 = $db->query($sql)) {
            echo ">>> Querying: $sql.<br>";
            echo "<br>" . "<b>SHOW TABLES:</b>" . "<br><br>";

            while ($row = $query0->fetch_assoc()) {
                echo $row["Tables_in_order_management_portal"] . "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql.<br>";
        }

        echo "<br>";

        // print out all CUSTOMER Relation
        $sql_customer = "SELECT * FROM CUSTOMER";

        if ($query1 = $db->query($sql_customer)) {
            echo ">>> Querying: $sql_customer.<br>";
            echo "<br>" . "<b>CUSTOMER Relation:</b>" . "<br>";
        
            while ($row = $query1->fetch_assoc()) {
                echo "<b>User_ID:   " . $row["USER_ID"] . "</b> || <b>Email_Address:</b>   " . $row["EMAIL_ADDRESS"] . " || <b>Username:</b>   " . $row["USERNAME"] . " || <b>Zip_Code:</b>   " . $row["ZIP_CODE"] . " || <b>Address:</b>   " . $row["ADDRESS"];
                echo "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql_customer.<br>";
        }
        
        echo "<br>";

        // print out all EMPLOYEE_INFO Relation
        $sql_employee_info = "SELECT * FROM EMPLOYEE_INFO";
        if ($query2 = $db->query($sql_employee_info)) {
            echo ">>> Querying: $sql_employee_info.<br>";
            echo "<br>" . "<b>EMPLOYEE_INFO Relation:</b>" . "<br><br>";

            while ($row = $query2->fetch_assoc()) {
                echo "<b>Employee_ID:   " . $row["EMPLOYEE_ID"] . "</b> || <b>Employee_Name:</b>   " . $row["EMPLOYEE_NAME"] . "</b> || <b>Home_Address:</b>   " . $row["HOME_ADDRESS"];
                echo "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql_employee_info.<br>";
        }

        echo "<br>";

        // print out all EMPLOYEE_TITLE_INFO Relation
        $sql_employee_title_info = "SELECT * FROM EMPLOYEE_TITLE_INFO";
        if ($query3 = $db->query($sql_employee_title_info)) {
            echo ">>> Querying: $sql_employee_title_info.<br>";
            echo "<br>" . "<b>EMPLOYEE_TITLE_INFO Relation:</b>" . "<br><br>";

            while ($row = $query3->fetch_assoc()) {
                echo "<b>Employee_Name:   " . $row["EMPLOYEE_NAME"] . "</b> || <b>Home_Address:</b>   " . $row["HOME_ADDRESS"] . " || <b>Job_Title:</b>   " . $row["JOB_TITLE"];
                echo "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql_employee_title_info.<br>";
        }

        echo "<br>";

        // print out all CATEGORY Relation
        $sql_category = "SELECT * FROM CATEGORY";
        if ($query4 = $db->query($sql_category)) {
            echo ">>> Querying: $sql_category.<br>";
            echo "<br>" . "<b>Category Relation:</b>" . "<br><br>";

            while ($row = $query4->fetch_assoc()) {
                echo "<b>Category_Name:   " . $row["CATEGORY_NAME"] . "</b> || <b>Mgr_Employee_ID:</b>   " . $row["MGR_EMPLOYEE_ID"];
                echo "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql_category.<br>";
        }

        echo "<br>";

        // print out all PRODUCT_CATEGORY_INFO Relation
        $sql_product_category_info = "SELECT * FROM PRODUCT_CATEGORY_INFO";
        if ($query5 = $db->query($sql_product_category_info)) {
            echo ">>> Querying: $sql_product_category_info.<br>";
            echo "<br>" . "<b>PRODUCT_CATEGORY_INFO Relation:</b>" . "<br><br>";

            while ($row = $query5->fetch_assoc()) {
                echo "<b>Product_Name:   " . $row["PRODUCT_NAME"] . "</b> || <b>Product_Category_Name:</b>   " . $row["PRODUCT_CATEGORY_NAME"];
                echo "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql_product_category_info.<br>";
        }

        echo "<br>";

        // print out all PRODUCT_INFO Relation
        $sql_product_info = "SELECT * FROM PRODUCT_INFO";
        if ($query6 = $db->query($sql_product_info)) {
            echo ">>> Querying: $sql_product_info.<br>";
            echo "<br>" . "<b>PRODUCT_INFO Relation:</b>" . "<br><br>";

            while ($row = $query6->fetch_assoc()) {
                echo "<b>Product_ID:   " . $row["PRODUCT_ID"] . "</b> || <b>Product_Name:</b>   " . $row["PRODUCT_NAME"] . " || <b>Supply:</b>   " . $row["SUPPLY"] . " || <b>Price:</b>   " . $row["PRICE"];
                echo "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql_product_info.<br>";
        }

        echo "<br>";

        // print out all ORDER_STATUS_INFO Relation
        $sql_order_status_info = "SELECT * FROM ORDER_STATUS_INFO";
        if ($query7 = $db->query($sql_order_status_info)) {
            echo ">>> Querying: $sql_order_status_info.<br>";
            echo "<br>" . "<b>ORDER_STATUS_INFO Relation:</b>" . "<br><br>";

            while ($row = $query7->fetch_assoc()) {
                echo "<b>Order_Time:   " . $row["ORDER_TIME"] . "</b> || <b>Delivery_Zip_Code:</b>   " . $row["DELIVERY_ZIP_CODE"] . " || <b>Delivery_Address:</b>   " . $row["DELIVERY_ADDRESS"] . " || <b>Order_Status:</b>   " . $row["ORDER_STATUS"] . " || <b>Total_Amount:</b>   " . $row["TOTAL_AMOUNT"];
                echo "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql_order_status_info.<br>";
        }

        echo "<br>";

        // print out all ORDER_INFO Relation
        $sql_order_info = "SELECT * FROM ORDER_INFO";
        if ($query8 = $db->query($sql_order_info)) {
            echo "Querying: $sql_order_info.<br>";
            echo "<br>" . "<b>ORDER_INFO Relation:</b>" . "<br><br>";

            while ($row = $query8->fetch_assoc()) {
                echo "<b>Order_ID:   " . $row["ORDER_ID"] . "</b> || <b>Order_User_ID</b>   " . $row["ORDER_USER_ID"] . " || <b>Order_Employee_ID:</b>   " . $row["ORDER_EMPLOYEE_ID"] . " || <b>Order_Time:</b>   " . $row["ORDER_TIME"] . " || <b>Delivery_Address:</b>   " . $row["DELIVERY_ADDRESS"] . " || <b>Delivery_Zip_Code:</b>   " . $row["DELIVERY_ZIP_CODE"] . " || <b>Last_Four_Digits:</b>   " . $row["LAST_FOUR_DIGITS"];
                echo "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql_order_info.<br>";
        }

        echo "<br>";

        // print out all INCLUDES Relation
        $sql_includes = "SELECT * FROM INCLUDES";
        if ($query9 = $db->query($sql_includes)) {
            echo "Querying: $sql_includes.<br>";
            echo "<br>" . "<b>INCLUDES Relation:</b>" . "<br><br>";

            while ($row = $query9->fetch_assoc()) {
                echo "<b>Includes_Order_ID:   " . $row["INCLUDES_ORDER_ID"] . "</b> || <b>Includes_Product_ID</b>   " . $row["INCLUDES_PRODUCT_ID"] . " || <b>Quantity:</b>   " . $row["QUANTITY"];
                echo "<br>";
            }

        } else {
            echo "ERROR: could not execute $sql_includes.<br>";
        }

        echo "- End -";

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    ?>

</body>

</html>
