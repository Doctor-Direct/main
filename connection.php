<?php
    $connection = mysqli_connect('localhost','root','','doc_direct');

    if(mysqli_connect_errno()){
        die('Database Connection Failed'. mysqli_connect_error());
    
    }else {
       // echo 'Connection Successfull';
    }

?>