<?php
    $server = "localhost";
    $user = "root";
    $Password = "";
    $db = "sv";

    $connect = mysqli_connect($server,$user,$Password,$db);

    function Query($query){
        global $connect;
        $Result = mysqli_query($connect,$query);
        $box = [];
        while($isi = mysqli_fetch_array($Result)){
            $box[] = $isi; 
        }
        return $box;
    }
?>