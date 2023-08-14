<?php

    session_start();
    $sellerid=$_SESSION['userid'];


    $dest="../../shared/images/".$_FILES['imfile']['name'];
    move_uploaded_file($_FILES['imfile']['tmp_name'], $dest);

    
    include_once "../../shared/connection.php";


    $name=$_POST['name'];
    $price=$_POST['price'];
    $detail=$_POST['detail'];

    $impath="shared/images/".$_FILES['imfile']['name'];

    $status=mysqli_query($conn, "insert into product(name,price,detail,impath,sellerid) values('$name',$price,'$detail','$impath',$sellerid)");

    if($status)
    {
        echo "Product Uploaded Successfully";
    }
    else
    {
        echo "Error in Product Upload <br>";
        echo mysqli_error($conn);

    }

 
?>