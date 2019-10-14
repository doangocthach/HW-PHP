<?php
include("EditImgProcess.php");
if ($_SESSION["user"] === null) {
    header("Location: ../pages/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Style/Style.css">
    <title>Edit-Profile</title>
</head>
<?php
$Err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["productname"]) || empty($_POST["productprice"])) {
        $Err = "Product name or Price not empty and invalid!";
    } else {
        $product_name = test_input($_POST["productname"]);
        $product_price = test_input($_POST["productprice"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $product_name) || !preg_match("/^[a-zA-Z ]*$/", $product_price)) {
            $Err = "Only letters and white space allowed";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<?php
if (isset($_GET["imgid"])) {
    $id = $_GET["imgid"];
    $_SESSION["imgid"] = $id;
}
?>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <input type="file" name="product_img" required>
        <br>
        <label for="product_name">Product Name:</label>
        <br>
        <input type="text" name="productname" required>
        <br>
        <label for="price">Price:</label>
        <br>
        <input type="number" name="productprice" required>
        <br>
        <button class="but-upload" type="submit" name="EditImg" value="Upload"></button>
        <br>
        <span class="errorr" style="color: red;"><?php echo $Err; ?></span>
        <br>
        <a href="UploadForm.php">Back</a>
    </form>
</body>

</html>