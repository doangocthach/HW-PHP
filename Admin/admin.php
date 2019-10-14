<?php
include("../Logout.php");
if ($_SESSION["user"] === null) {
    header("Location: ../pages/index.php");
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

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Style/sb-admin-2.css" rel="stylesheet">
    <!-- <link href="../startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
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
                            <input style="border: none;" type="submit" name="Logout" value="Logout">
                        </form>
                    </ul>
                </nav>
            </div>


            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">All Users</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Registration Date</th>
                                </tr>
                                <?php
                                include('../Admin/Process.php');
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

</body>

</html>