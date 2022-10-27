<?php
    require "function.php";
    $id = $_GET["id"];
    $QueryUpdate = Query("SELECT * FROM posts WHERE Id = $id")[0];
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
           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
           
            

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
                        <h1 class="h3 mb-0 text-gray-800">Edit</h1>
                    </div>
                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$QueryUpdate["Id"]?>">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label><span style="color:red;">*</span>
                                <input type="text" class="form-control" id="title" name="Title" autocomplete="off" value="<?=$QueryUpdate["Title"]?>">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label><span style="color:red;">*</span>
                                <input type="text" class="form-control" id="content" name="Content" autocomplete="off" value="<?=$QueryUpdate["Content"]?>">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label><span style="color:red;">*</span>
                                <input type="text" class="form-control" id="category" name="Category" autocomplete="off" value="<?=$QueryUpdate["Category"]?>">
                            </div>

                    <button type="submit" class="btn btn-success position-relative" name="PublishEdit"style="margin-bottom:10px;">
                        Publish
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php
                            $CountPublish = Query("SELECT *,COUNT(Title) AS countt FROM posts WHERE Status = 'Publish'");
                            foreach($CountPublish as $key){
                            echo $key["countt"];
                            }
                            ?>
                             
                        </span>
                    </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="submit" class="btn btn-danger position-relative" name="DraftEdit"  style="margin-bottom:10px;">
                    Draft
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php
                            $CountDraft = Query("SELECT *,COUNT(Title) AS countt FROM posts WHERE Status = 'Draft'");
                            foreach($CountDraft as $key){
                            echo $key["countt"];
                            }
                            ?>
                             
                        </span>
                
                </button>
                </form>

                    <!-- Content Row -->
                    

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


</body>

</html>
<?php
    if(isset($_POST["PublishEdit"])){
        $Id = $_POST["id"];
        $Title = $_POST["Title"];
        $Content = $_POST["Content"];
        $Category = $_POST["Category"];
        $Status = "Publish";

        $QueryPublishUpdate = "UPDATE posts SET Title = '$Title'
        ,Content = '$Content'
        ,Category = '$Category'
        ,Status='$Status' WHERE Id = $Id";
        $ResultUpdate = mysqli_query($connect,$QueryPublishUpdate);
        
        echo "
        <script>
            alert('Data Updated to Publish');
            window.location='Allpost.php';
        </script>
        ";
        
    }

    if(isset($_POST["DraftEdit"])){
        $Id = $_POST["id"];
        $Title = $_POST["Title"];
        $Content = $_POST["Content"];
        $Category = $_POST["Category"];
        $Status = "Draft";

        $QueryDraftUpdate = "UPDATE posts SET Title = '$Title'
        ,Content = '$Content'
        ,Category = '$Category'
        ,Status='$Status' WHERE Id = $Id";
        $ResultUpdate = mysqli_query($connect,$QueryDraftUpdate);
        
        echo "
        <script>
            alert('Data Updated to Draft');
            window.location='Allpost.php';
        </script>
        ";
    }
?>