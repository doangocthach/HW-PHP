<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Style/sb-admin-2.css">
    <link rel="stylesheet" href="../Style/sb-admin-2.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <title>Document</title>

</head>
<?php
$Err = $EmailErr = $PassErr = "";
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
            $PassErr = "Password must be greater than 6 characters !";
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

<body class="bg-gradient-primary">
    <?php include('Process.php') ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <div class="form-group">
                                            <input type="email" name="umail" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                                            <span class="errorr"><?php echo $EmailErr; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="passw" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                            <span class="errorr"><?php echo $PassErr; ?></span>
                                        </div>
                                        <button href="index.html" class="btn btn-primary btn-user btn-block" name="login">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="../pages/index.php">Main Menu</a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="../Register/form.php">Create an Account?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>