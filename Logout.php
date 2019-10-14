<?php
session_start();
if ($_SESSION["user"] !== null) {
    if (isset($_POST["Logout"])) {
        session_unset();
        session_destroy();
        header("Location: ../pages/index.php");
    }
}
else{
    header("Location: ../pages/index.php");
}

