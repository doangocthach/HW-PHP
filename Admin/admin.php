<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
<?php
include("../Logout.php");
?>
<body>

    <div class="container">

        <h1 class="text-center">
            Admin Control Panel
        </h1>
        <h2 class="text-center">Registed Users</h2>
       
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="Logout" value="Logout">
        </form>
        <br>
            <table>
                <tr>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                </tr>
                <?php
                include('Process.php');
                ?>
            </table>
      
</body>

</html>