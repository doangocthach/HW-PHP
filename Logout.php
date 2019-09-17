<?php
session_start();
if ($_SESSION["user"] !== null) {
    if (isset($_POST["Logout"])) {
        session_unset();
        session_destroy();
        header("Location: ../Login/Login.php");
    }
} else {
    header("Location: ../Login/Login.php");
}
