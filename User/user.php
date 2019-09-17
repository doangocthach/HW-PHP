<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Style/Style.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("../Logout.php");
    ?>
         <input type="submit" name="Logout" value="Logout">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    </form>
    <h1 class="text-center">Welcome to VTC A</h1>
    <input type="submit" name="Logout" value="Logout">
    </form>


</body>

</html>