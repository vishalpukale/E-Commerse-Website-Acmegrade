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

        .place-order
        {
            flex-direction: column;
            height: 10%;
        }
        hr
        {
            border: 3px solid black;
        }
    </style>
</head>




<?php

    include "menu.html";
    
    session_start();
    //session_destroy();

    if(!isset($_SESSION['cart']))
    {
        echo "No items in cart";
        die;
    }

    echo "
    <hr>'
    <hr>
    <div class='place-order d-flex justify-content-center'>
        <a href='placeorder.php'>
            <button class='btn btn-success p-3'>Place Order</button><br>
        </a>
    </div>
    ";

    $localcart=$_SESSION['cart'];

    //Extract the local pids from localcart
    $pids=[];
    for($i=0; $i<count($localcart);$i++)
    {
        array_push($pids,$localcart[$i]['pid']);
    }

    include "../shared/connection.php";
    $str_pids=implode(",", $pids);

    $sql_cursor=mysqli_query($conn, "select * from product where pid in ($str_pids)");


    while($row=mysqli_fetch_assoc($sql_cursor))
    {
        $pid=$row['pid'];

        $name=$row['name'];
        $price=$row['price'];
        $detail=$row['detail'];
        $impath=$row['impath'];

        //Get the qty match for the PID
        $qty=getQty($localcart,$pid);


        echo "<div class='mycard bg-secondary'>

            <div class='name'><h2>$name</h2></div>
            
                <img class='img-wrapper' src='../$impath'>    

            <div class='detail'>$detail</div>
            <br>
            <div class='price'><h5>₹$price Rs</h5></div>

            <div class='d-flex action justify-content-around'>
                <div>
                    <a >
                        <button class='btn btn-warning'onclick='confirmDelete($pid)' name='edit_data'>
                            Quantity : $qty
                        </button>
                    </a>
                </div>
                
            </div>

        </div>";
    }

    function getQty($lc, $pid)
    {
        for($i=0; $i<=count($lc); $i++)
        {
            if($lc[$i]['pid']==$pid)
            {   
                return $lc[$i]['pqty'];
            }
        }

        return array(false, false);
    }

?>