<?php
    require "function.php";
    $id = $_GET["id"];
    $QueryUpdate = Query("SELECT * FROM posts WHERE Id = $id")[0];

    $Status = "Trash";
    $QueryTrash = "UPDATE posts SET Status = 'Trash' WHERE Id = '$id'";
    $result2 = mysqli_query($connect,$QueryTrash);

    echo "
    <script>
        alert('Data Updated to Trash');
        window.location='Allpost.php';
    </script>
    ";
?>