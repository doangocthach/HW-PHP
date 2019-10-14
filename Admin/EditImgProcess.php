<?php
require("../mysqli_connect.php");
session_start();
$imgid = $_SESSION["imgid"];

// if (isset($_POST["EditImg"])) {
//     $sql = "update thachproducts set product_name='".$_POST["productname"]."', product_image ='".$_POST["product_img"]."', price ='".$_POST["productprice"]."' WHERE product_id=".$_SESSION["imgid"];
//     $result = mysqli_query($conn, $sql);
//     if (mysqli_query($conn, $sql) === true) {
//         header("Location: admin.php");
//         $conn->close();
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

if (isset($_POST["EditImg"])) {
    $upload_file = "../Uploads/" . basename($_FILES["product_img"]["name"]);
    $upload_ok = 1;
    $image_type = strtolower((pathinfo($upload_file, PATHINFO_EXTENSION)));
    $check = getimagesize(($_FILES["product_img"]["tmp_name"]));
    if ($check !== false) {
        $upload_ok = 1;
    } else {
        $upload_ok = 0;
    }
    if (file_exists($upload_file)) {
        $upload_ok = 0;
    }
    if ($_FILES["product_img"]["size"] > 500000) {
        $upload_ok = 0;
    }
    if ($image_type != "jpg" && $image_type != "png" && $image_type != "jpeg") {
        $upload_ok = 0; 
    }
    if ($upload_ok == 0) {
        echo "Sorry, your file was not uploaded.</br>";
    } else {
        $query = "UPDATE thachproducts set product_name='" . $_POST["productname"] . "', product_image= '".$upload_file ."', price ='" . $_POST["productprice"] . "' WHERE product_id=" . $_SESSION["imgid"];
        if (mysqli_query($conn, $query)) {
            move_uploaded_file($_FILES["product_img"]["tmp_name"], $upload_file);
            header("location: admin.php");
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}
