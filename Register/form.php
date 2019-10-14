<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Style/sb-admin-2.css">
    <link rel="stylesheet" href="../Style/sb-admin-2.min.css">
    <script type="text/javascript" src="../js/index.js"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
    if (strlen($_POST["pw"]) < 6 || strlen($_POST["re-pw"]) < 6) {
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

<body class="bg-gradient-primary">
    <!-- <div class="title">
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
 -->



    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="fname" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                                        <span class="errorr"><?php echo $fnameErr; ?></span><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                                        <span class="errorr"><?php echo $lnameErr; ?></span><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                    <span class="errorr"><?php echo $emailErr; ?></span><br>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="pw" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        <span class="errorr"><?php echo $pwErr; ?></span><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="re-pw" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                        <span class="errorr"><?php echo $re_pwErr; ?></span><br>
                                    </div>
                                </div>
                                <button href="login.html" name="register" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="../Login/Login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>




</body>

</html>