<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Style/Style.css">
    <script type="text/javascript" src="../js/index.js"></script>
    <title>Document</title>
</head>
<?php
$fnameErr = $lnameErr = $emailErr = $pwErr = $re_pwErr = $Err = $hihiErr = "";
$fname = $lname = $email = $pw = $re_pw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"]) || empty($_POST["lname"])) {
        $fnameErr = "First name is not empty!";
        $lnameErr = "Last name is not empty!";
    } else {
        $fname = test_input($_POST["fname"]);
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fname) || !preg_match("/^[a-zA-Z ]*$/", $lname)) {
            $fnameErr = "Only letters and white space allowed";
            $lnameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is not empty!";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email form";
        }
    }
    if (empty($_POST["pw"]) || empty($_POST["re-pw"])) {
        $pwErr = "Password is not empty!";
        $re_pwErr = "Re-Password is not empty!";
    } else {
        $pw = test_input($_POST["pw"]);
        $re_pw = test_input($_POST["re-pw"]);
    }
    if (strlen($_POST["pw"]) < 8 ||strlen($_POST["re-pw"]) < 8) {
        $pwErr = "Password must be greater than 6 characters!";
        $re_pwErr = "Re-Password must be greater than 6 characters!";
    }
    if ($_POST["pw"] !== $_POST["re-pw"]) {
        $re_pwErr = "Do not match!";
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
<?php include('Process.php') ?>

<body>
    <div class="title">
        <h2>Register</h2>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form">
            <label for="">Firstname</label><br>
            <input type="text" name="fname" value="<?php echo $fname; ?>" required>
            <span class="error"><?php echo $fnameErr; ?></span><br>
            <label for="">Lastname</label><br>
            <input type="text" name="lname" value="<?php echo $lname; ?>" required>
            <span class="error"><?php echo $lnameErr; ?></span><br>
            <label for="">Email</label><br>
            <input type="email" name="email" value="<?php echo $email; ?>" required>
            <span class="error"><?php echo $emailErr; ?></span><br>
            <label for="">Password</label><br>
            <input type="password" id="pas" name="pw" value="<?php echo $pw; ?>" onkeyup='check();'required>
            <span class="error"><?php echo $pwErr; ?></span><br>
            <label for="">Re-Password</label><br>
            <input type="password" id="repas" name="re-pw" value="<?php echo $re_pw; ?>" onkeyup='check();' required>
            <br>
            <span id="message"></span>
            <br>
            <span class="error"><?php echo $re_pwErr; ?></span><br>
            <button id="butt" name="register">Register</button>
            
        </div>
        <br>
        <br>
        <a href="../Login/Login.php">Back to login</a>
        <br>
        <span class="error"><?php echo $Err; ?></span><br>
    </form>

</body>

</html>