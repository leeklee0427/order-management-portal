<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Database Table Content</title>
</head>

<body>

  <?php

  $host = "127.0.0.1";
  $user = "ldc";
  $pass = "!LDc042701";
  $database = "order_management_portal";

  try {
    $db = new mysqli($host, $user, $pass, $database);

    // Display user inputs
    $username = $_POST['username'];
    $email = $_POST['email'];
    $zip_code = $_POST['zip'];
    $address = $_POST['address'];

    // Search from database
    $sql_select1 = "SELECT * FROM CUSTOMER
    WHERE CUSTOMER.USER_ID = $user_id
    AND CUSTOMER.USERNAME like '%$username%'
    AND CUSTOMER.EMAIL_ADDRESS like '%$email%'";

    $sql_insert = "INSERT INTO CUSTOMER (EMAIL_ADDRESS, USERNAME, ADDRESS, ZIP_CODE)
    VALUES ('$email', '$username', '$address', $zip_code)";

    if ($query = $db->query($sql_insert)) {
      echo "<h2>Sign up successfully</h2>";

      echo "<h3>You entered:</h3>";
      echo "Username: " . $username . "<br>";
      echo "Email: " . $email . "<br>";
      echo "Zip: " . $zip_code . "<br>";
      echo "Address: " . $address . "<br>";

    } else {
      echo "ERROR: could not execute $sql_insert.<br>";
      header("Location: ./index.html");
      exit();
    }

    $sql_select2 = "SELECT * FROM CUSTOMER WHERE LOWER(CUSTOMER.USERNAME) LIKE LOWER('%$username%')";

    if ($result1 = $db->query($sql_select2)) {
      echo "<h3>Your account has been added to the database:</h3>";
      echo "Please note down your User_ID for later uses.";
    }

    echo "<br>";
    while ($row = $result1->fetch_assoc()) {
      echo "<b>User_ID:   " . $row["USER_ID"] . "</b> || <b>Email_Address:</b>   " . $row["EMAIL_ADDRESS"] . " || <b>Username:</b>   " . $row["USERNAME"] . " || <b>Zip_Code:</b>   " . $row["ZIP_CODE"] . " || <b>Address:</b>   " . $row["ADDRESS"];
      echo "<br><br>";
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
