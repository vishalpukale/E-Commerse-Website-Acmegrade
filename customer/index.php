<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <style>


        .mycard
        {
            text-align: center;
            width: 250px;
            height: 350px;
            margin: 10px;
            padding: 5px;
            background-color: bisque;
            display: inline-block;
        }
        .img-wrapper
        {
            border-radius: 12px;
            width: 90%;
            height: 55%;
        }
        .detail 
        {
            width: 100%;
            height: 10%;
        }
    </style>
</head>
<body>

        <script>
            function confirmDelete(pid)
            {
                ans=confirm("Are you sure you want to Add this product to cart?");
                if(ans)
                {
                    window.location=`delete.php?pid=${pid}`;
                }
            }
        </script>
    
</body>
</html>



<?php

    include "menu.html";
    
    include_once "../shared/connection.php";

    $sql_cursor=mysqli_query($conn, "select * from product");


    while($row=mysqli_fetch_assoc($sql_cursor))
    {
        $pid=$row['pid'];

        $name=$row['name'];
        $price=$row['price'];
        $detail=$row['detail'];
        $impath=$row['impath'];

        echo "<div class='mycard bg-secondary'>

            <div class='name'><h2>$name</h2></div>
            
                <img class='img-wrapper' src='../$impath'>    

            <div class='detail'>$detail</div>
            <br>
            <div class='price'><h5>₹$price Rs</h5></div>

            <div class='d-flex action justify-content-around'>
                <div>
                    <a href='addcart_v2.php?pid=$pid'>
                        <button class='btn btn-warning'onclick='confirmDelete($pid)' name='edit_data'>
                            <i class='bi-cart'></i>
                        </button>
                    </a>
                </div>
                
            </div>

        </div>";
    }


?>