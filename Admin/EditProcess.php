<?php
require("../mysqli_connect.php");
$id = $_GET["id"];

if (isset($_POST["Edit"])) {
    $select = "update users set last_name='".$_POST["upfname"]."' and first_name ='".$_POST["upfname"]."' WHERE id=$id";
    $result = mysqli_query($conn, $select);
    if (mysqli_query($conn, $sql) === true) {
        header("Location: admin.php");
        $conn->close();
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
