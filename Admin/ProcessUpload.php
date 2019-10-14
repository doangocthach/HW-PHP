
<?php
include('../mysqli_connect.php');
if (isset($_POST["insert"])) {

    $upload_file = "../Uploads/" . basename($_FILES["Upload"]["name"]);
    $upload_ok = 1;
    $image_type = strtolower((pathinfo($upload_file, PATHINFO_EXTENSION)));
    $check = getimagesize(($_FILES["Upload"]["tmp_name"]));
    if ($check !== false) {
        $upload_ok = 1;
    } else {
        $upload_ok = 0;
    }
    if (file_exists($upload_file)) {
        $upload_ok = 0;
    }
    if ($_FILES["Upload"]["size"] > 500000) {
        $upload_ok = 0;
    }
    if ($image_type != "jpg" && $image_type != "png" && $image_type != "jpeg") {
        $upload_ok = 0;
    }
    if ($upload_ok == 0) {
        echo "Sorry, your file was not uploaded.</br>";
    } else {
        $query = "insert into thachproducts(product_name,product_image,price) values ('". $_POST["product_name"] ."','".$upload_file."',".$_POST["price"].")";
        if (mysqli_query($conn, $query)) {
            move_uploaded_file($_FILES["Upload"]["tmp_name"], $upload_file);
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}