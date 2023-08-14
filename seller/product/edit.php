<?php

    $conn=new mysqli("localhost", "root", "", "vishal");

?>
<html>
<head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">

    <?php
        if(isset($_GET['pid']))
    ?>

    <form enctype="multipart/form-data" action="upload_db.php" class="bg-secondary p-3" method="POST">

        <div class="text-center">
            <h1 class="text-warning">Edit Product</h1>
        </div>

        <input value="<?php echo $row['name'] ?>" required class="form-control mt-3" type="text" placeholder="Product Name" name="name">
        <input value="<?php echo $row['price'] ?>" required min="1" class="form-control mt-3" type="number" placeholder="Product Price" name="price">
        <textarea <?php echo $row['detail'] ?> required class="form-control mt-3"  name="detail" cols="30" rows="5" placeholder="Add details about product"><?php echo $row['detail'] ?></textarea>
        <input <?php echo $row['impath'].$_FILES['imfile']['name'] ?> required class="form-control mt-3" type="file" placeholder="Choose a File" name="imfile">

        <div class="text-center">
            <button class="mt-3 btn btn-warning" name="edit_data">Edit</button>
        </div>

    </form>


    </div>
</body>


<?php


    $conn=new mysqli("localhost", "root", "", "vishal");


    if(isset($_POST['edit_data']))
    {

            $pid=$_POST['pid'];

            $sql_cursor=mysqli_query($conn, "update `product` set name='$_POST[name]', detail='$_POST[detail]', price='$_POST[price]' where pid='$_POST[pid]' ");
            
            if($sql_cursor)
            {
               while($row=mysqli_fetch_assoc($sql_cursor))
               {
                $_SESSION['status']= "Data Uploaded Sucessfully";
                header("location:view.php");
               }
            }
            else
            {
                $_SESSION['status']= "Not Updated";
                header("location:view.php");
            }
    }

?>

