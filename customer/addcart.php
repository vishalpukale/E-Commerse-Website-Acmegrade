<?php

//addcart_v2 is able to tell how much time we have added a single item but that is complex compare to this code

    session_start();
    //session_destroy();

    $pid=$_GET['pid'];
    echo "Recieved pid => $pid";
    echo "<br>";

    $localcart=[];
    if(isset($_SESSION['cart']))
    {
        $localcart=$_SESSION['cart'];
    }
    array_push($localcart, $pid);

    $_SESSION['cart']=$localcart;

    print_r($localcart);

?>