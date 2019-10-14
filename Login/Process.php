<?php

require("../mysqli_connect.php");

if (isset($_POST["login"])) {
    $select = "select * from thachusers";
    $result = mysqli_query($conn, $select);
    $check = 1;
    if ($result->num_rows >= 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["email"] == $_POST["umail"] && password_verify($_POST["passw"], $row["password"])) {
                session_start();
                $_SESSION["user"] = $_POST["umail"];
                if ($row["user_level"] == 2) {
                    header("Location: ../Admin/admin.php");
                    $conn->close();
                    break;
                } else if ($row["user_level"] == 1) {
                    header("Location: ../pages/index.php");
                    $conn->close();
                    break;
                }
            } else {
                $Err = "Acc not found";
                continue;
            }
        }
    }
}
