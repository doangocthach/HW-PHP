<?php
require("../mysqli_connect.php");
$id = $_GET["id"];

$sql = "delete from thachusers where userid = $id ;";
if (mysqli_query($conn, $sql) === true) {
    header("Location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
