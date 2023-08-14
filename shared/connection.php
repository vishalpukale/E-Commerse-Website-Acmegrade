<?php

    $conn=new mysqli("localhost", "root", "", "vishal");

    if($conn->connect_error)
    {
        echo "Connection Failed";
    }

?>