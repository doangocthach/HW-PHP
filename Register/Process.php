<?php
require("../mysqli_connect.php");

if (isset($_POST["register"])) {
    if ($fnameErr != "" || $lnameErr != "" ||  $emailErr != "" ||  $pwErr != "" || $re_pwErr != "" ||  $Err != "" || $hihiErr != "" ) { } else {
        $select = "select * from thachusers";
        $result = mysqli_query($conn, $select);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["email"] === $_POST["email"]) {
                    $temp = 1;
                    break;
                } else {
                  
                }
            }
            if ($temp === 1) {
                $Err = "Email already exists !";
            }
            else {
                $Err = "";
                $sql = "insert into thachusers(first_name, last_name, email, password, registration_date, user_level)
                value ('" . ($_POST["fname"]) . "', '" . ($_POST["lname"]) . "', '" . ($_POST["email"]) . "','" . password_hash($_POST["pw"], PASSWORD_DEFAULT) . "',now(),1)";
                if (mysqli_query($conn, $sql) === true) {
                    header("Location: ../Login/Login.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            $Err = "";
            $sql = "insert into thachusers(first_name, last_name, email, password, registration_date, user_level)
            value ('" . ($_POST["fname"]) . "', '" . ($_POST["lname"]) . "', '" . ($_POST["email"]) . "','" . password_hash($_POST["pw"], PASSWORD_DEFAULT) . "',now(),2)";
            if (mysqli_query($conn, $sql) === true) {
                header("Location: ../Login/Login.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
