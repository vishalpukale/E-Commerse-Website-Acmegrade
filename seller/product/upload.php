<?php

    /*
        To store a uploaded product we need a table
        pid, name, detail, price, image
    */
    session_start();

    if(!isset($_SESSION['login_status']))
    {
        echo "Unautorised Attempt";
        die;
    }
    if($_SESSION['login_status']==false)
    {
        echo "Illigal Activity";
        die;
    }

    include "menu.html";
?>

<html lang="en">
<head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <?php
    
    if($sql_query)
    {
        $_SESSION['status']="not Updated";
        header("location:view.php");
    }

    ?>
    
    <div class="d-flex justify-content-center align-items-center vh-100">

        <form enctype="multipart/form-data" action="upload_db.php" class="bg-secondary p-3" method="POST">

            <div class="text-center">
                <h1 class="text-warning">Upload Product</h1>
            </div>

            <input required class="form-control mt-3" type="text" placeholder="Product Name" name="name">
            <input required min="1" class="form-control mt-3" type="number" placeholder="Product Price" name="price">
            <textarea required class="form-control mt-3"  name="detail" cols="30" rows="5" placeholder="Add details about product"></textarea>
            <input required class="form-control mt-3" type="file" placeholder="Choose a File" name="imfile">

            <div class="text-center">
                <button class="mt-3 btn btn-warning" name="upload_data">Upload</button>
            </div>

        </form>

    </div>

</body>
</html>