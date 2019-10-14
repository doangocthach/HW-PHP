<?php session_start( );
 if($_SESSION["user"] === null){
  header("Location: ../Login/login.php");
 } ?>
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
$fnameErr = $lnameErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["upfname"]) || empty($_POST["uplname"])) {
        $fnameErr = "First name is not empty!";
        $lnameErr = "Last name is not empty!";
    } else {
        $upfname = test_input($_POST["upfname"]);
        $uplname = test_input($_POST["uplname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $upfname) || !preg_match("/^[a-zA-Z ]*$/", $uplname)) {
            $fnameErr = "Only letters and white space allowed";
            $lnameErr = "Only letters and white space allowed";
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
if (isset($_GET["id"])) {
    $id = $_GET["id"];
// echo $id;
$_SESSION["id"] = $id;
// echo $_SESSION["id"];
}

?>

<body>


    <form method="POST" action="">
        <?php
        include("EditProcess.php");
        ?>

        <div class="form">
            <label for="">Firstname</label><br>
            <input type="text" name="upfname">
            <span class="error"><?php echo $fnameErr; ?></span><br>
            <label for="">Lastname</label><br>
            <input type="text" name="uplname">
            <span class="error"><?php echo $lnameErr; ?></span><br>
        </div>
        <button type="submit" name="Edit" onclick="ConfirmEdit()">Edit</button>
        <a href="Admin.php" name="Cancel">Cancel</a>
    </form>
</body>

</html>