<?php
require("../mysqli_connect.php");

if (isset($_POST["register"])) {
    if ($fnameErr != "" || $lnameErr != "" ||  $emailErr != "" ||  $pwErr != "" || $re_pwErr != "" ||  $Err != "" || $hihiErr != "") { } else {
        $select = "select * from users";
        $result = mysqli_query($conn, $select);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["email"] == $_POST["email"]) {
                    $Err = "Email already exists !";
                    break;
                } else {
                    $Err = "";
                    $sql = "insert into users(first_name, last_name, email, password, registration_date, user_level)
                    value ('" . ($_POST["fname"]) . "', '" . ($_POST["lname"]) . "', '" . ($_POST["email"]) . "','" . password_hash($_POST["pw"], PASSWORD_DEFAULT) . "',now(),2)";
                    if (mysqli_query($conn, $sql) === true) {
                        header("Location: ../Login/login.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        } else {
            $Err = "";
            $sql = "insert into users(first_name, last_name, email, password, registration_date, user_level)
            value ('" . ($_POST["fname"]) . "', '" . ($_POST["lname"]) . "', '" . ($_POST["email"]) . "','" . password_hash($_POST["pw"], PASSWORD_DEFAULT) . "',now(),1)";
            if (mysqli_query($conn, $sql) === true) {
                header("Location: ../Login/login.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
