<?php
    require "function.php";

    if(isset($_POST["Publish"])){
        $Title = $_POST["Title"];
        $Content = $_POST["Content"];
        $Category = $_POST["Category"];
        $Status = "Publish";

        $QueryPublish = "INSERT INTO posts VALUES('','$Title','$Content','$Category','$Status')";
        $Result1 = mysqli_query($connect,$QueryPublish);

        if($Result1){
            echo "
            <script>
                alert('Data Save to Publish');
                window.location='Allpost.php';
            </script>
            ";
        }

    }
    if(isset($_POST["Draft"])){
        $Title = $_POST["Title"];
        $Content = $_POST["Content"];
        $Category = $_POST["Category"];
        $Status = "Draft";

        $QueryDraft = "INSERT INTO posts VALUES('','$Title','$Content','$Category','$Status')";
        $Result1 = mysqli_query($connect,$QueryDraft);

        if($Result1){
            echo "
            <script>
                alert('Data Save to Draft');
                window.location='Allpost.php';
            </script>
            ";
        }
    }
?>