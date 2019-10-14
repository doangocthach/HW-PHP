<?php
include("../Logout.php");
include("ProcessUpload.php");
if ($_SESSION["user"] === null) {
    header("Location: ../Login/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="../Style/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <hr class="sidebar-divider">
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Users</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item active">
                <a class="nav-link" href="UploadForm.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Images</span></a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <button style="border: none;" type="submit" name="Logout" data-toggle="modal">
                                Logout
                            </button>
                        </form>
                    </ul>
                </nav>
            </div>


            <div class="container">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <input type="file" name="Upload" id="file_Up" required>
                    <br>
                    <label for="product_name">Product Name:</label>
                    <br>
                    <input type="text" name="product_name" required>
                    <br>
                    <label for="price">Price:</label>
                    <br>
                    <input type="number" name="price" required>
                    <br>
                    <br>
                    <button style="padding: 5px; border-radius: 4px;" class="but-upload" type="submit" name="insert" value="Upload">Upload</button>
                    <br>
                    <br>
                    <a href="admin.php">Back</a>
                </form>
            </div>
            <br>
            <hr>
            <br>
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">All Images</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <?php
                            $query = $conn->query("SELECT * FROM thachproducts");

                            if ($query->num_rows > 0) {
                                ?> <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    <?php

                                        while ($row = $query->fetch_assoc()) {
                                            ?>
                                        <tr>
                                            <td> <?php echo $row["product_image"]; ?></td>
                                            <td><?php echo $row["product_name"] ?></td>
                                            <td><?php echo $row["price"] ?></td>
                                            <td><a id="myBtn" href="<?php echo 'EditImgForm.php?imgid=' . $row["product_id"] . '' ?>" class="edit">Edit</a></td>
                                            <td><a            href="<?php echo 'DeleteImg.php? id=' . $row["product_id"] . '' ?>" class="delete">Delete</a></td>
                                        <?php
                                            }  ?>
                                        </tr>
                                        <br>
                                </table>
                            <?php

                            } else {
                                ?>
                                <p>No image(s) found...</p>
                            <?php }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>