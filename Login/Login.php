<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Style/Style.css">
    <title>Document</title>
</head>
 <?php
  $Err = $EmailErr = $PassErr ="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["umail"])) {
        $EmailErr = "Email is not empty!";
    } else {
        $email = test_input($_POST["umail"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $EmailErr = "Invalid email form";
        }
    }
    if (empty($_POST["passw"])) {
        $PassErr = "Password is not empty!";
    } else {
        $pw = test_input($_POST["passw"]);
        if (strlen($_POST["passw"]) < 6) {
            $PassErr = "Password must be greater than 8 characters !";
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

<body>
    <?php include('Process.php') ?>
    <br>
    <h1>Login</h1>
    <br>
    <div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="umail">Email</label>
            <br>
            <input  type="text" name="umail" placeholder="Enter your Email.." required>
            <span class="error"><?php echo $EmailErr; ?></span><br>
            <br>
            <label for="passw">Password</label>
            <br>
            <input type="password" name="passw" placeholder="Enter your password" required>
            <span class="error"><?php echo $PassErr; ?></span><br>
            <br>
            <button name="login">login</button>
            <br>
            <br>
            <a href="../Register/form.php">Register</a>
            <br>
            <span><?php echo $Err;?></span>
        </form>
    </div>


</body>

</html>