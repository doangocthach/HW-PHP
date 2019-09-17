<?php
require("../mysqli_connect.php");
$userid =  $_SESSION["id"];

if (isset($_POST["Edit"])) {
    $sql = "update users set last_name='".$_POST["uplname"]."', first_name ='".$_POST["upfname"]."' WHERE userid=". $userid;
    $result = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql) === true) {
        header("Location: admin.php");
        $conn->close();
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
