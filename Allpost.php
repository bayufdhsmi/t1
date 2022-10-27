<?php
    require "function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POST</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">POST</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Post</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="Allpost.php">All Post</a>
                        <a class="collapse-item" href="New.php">Add New</a>
                        <a class="collapse-item" href="Preview.php">Preview</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
           

           

            <!-- Heading -->
           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Publish</h1>
                    </div>

                    <!-- Content Row -->
                    <?php
                        $DataPublish = Query("SELECT * FROM posts WHERE Status = 'Publish'");
                        $DataDraft = Query("SELECT * FROM posts WHERE Status = 'Draft'");
                        $DataTrash = Query("SELECT * FROM posts WHERE Status = 'Trash'");
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" width="23%"><center>Title</center></th>
                                    <th scope="col" width="23%"><center>Category</th>
                                    <th scope="col" width="23%"><center>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                            foreach ($DataPublish as $key) { 
                        ?>
                        <tr>
                            <td><?=$key["Title"]?></td>
                            <td><?=$key["Category"]?></td>
                            <td>
                                <a href="Edit.php?id=<?= $key["Id"] ?>" class="btn btn-success">
                                    Edit
                                </a>
                                <a href="Trash.php?id=<?= $key["Id"] ?>" class="btn btn-danger position-relative">
                                   Thrash
                                   <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php
                                    $CountTrash = Query("SELECT *,COUNT(Title) AS countt FROM posts WHERE Status = 'Trash'");
                                    foreach($CountTrash as $key){
                                    echo $key["countt"];
                                    }
                                    ?>
                                    
                                </span>
                                </a>
                            </td>
                        
                        <?php
                            }
                        ?>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <br><br>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Draft</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" width="23%"><center>Title</center></th>
                                    <th scope="col" width="23%"><center>Category</th>
                                    <th scope="col" width="23%"><center>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                            foreach ($DataDraft as $key) { 
                        ?>
                        <tr>
                            <td><?=$key["Title"]?></td>
                            <td><?=$key["Category"]?></td>
                            <td>
                                <a href="Edit.php?id=<?= $key["Id"] ?>" class="btn btn-success ">
                                    Edit
                                </a>
                                <a href="Trash.php?id=<?= $key["Id"] ?>" class="btn btn-danger position-relative">
                                   Thrash
                                   <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php
                                    $CountTrash = Query("SELECT *,COUNT(Title) AS countt FROM posts WHERE Status = 'Trash'");
                                    foreach($CountTrash as $key){
                                    echo $key["countt"];
                                    }
                                    ?>
                                    
                                </span>
                                </a>
                            </td>
                        
                        <?php
                            }
                        ?>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <br><br>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Trash</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" width="23%"><center>Title</center></th>
                                    <th scope="col" width="23%"><center>Category</th>
                                    <th scope="col" width="23%"><center>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                            foreach ($DataTrash as $key) { 
                        ?>
                            <tr>
                                <td><?=$key["Title"]?></td>
                                <td><?=$key["Category"]?></td>
                                <td>
                                <a href="Edit.php?id=<?= $key["Id"] ?>" class="btn btn-success">
                                    Edit
                                </a>
                            </td>
                        
                        <?php
                            }
                        ?>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Post Application 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>