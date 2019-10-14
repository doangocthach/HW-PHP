<?php
require("../mysqli_connect.php");
$id = $_GET["id"];

$sql = "delete from thachproducts where product_id = $id ;";
if (mysqli_query($conn, $sql) === true) {
    header("Location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}