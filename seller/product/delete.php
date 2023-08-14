<?php

    $pid=$_GET['pid'];

    include_once "../../shared/connection.php";

    $status=mysqli_query($conn, "delete from product where pid=$pid");

    if($status)
    {
        echo "<h1>Product Removed Sucessfully</h1>";
        header("location:view.php");
    }
    else 
    {
        echo "Error while Deleting the Product";
        echo mysqli_errno($conn);
    }

?>