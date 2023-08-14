

<?php

//This code is a bit complex but You can also use this code insted of addcart.php 



    session_start();
    //session_destroy();

    /*

    check session has start
        if not create a localcart
            localcart=[[pid:$pid, pqty:1]]
            update the session cart
        if available 
            load the session cart to localhost
            need to check weather recieved pid is already inside the cart
            if not available
                localcart.append({pid:$pid, pqty:1})
                append the new pid into localhost as pqty=1
            else pid is already available in localcart
                get the index of matches pid
                using the index get the pqty, increment it
                and update again inside the localcart at same index
                

    update the session cart


    */


    $pid=$_GET['pid'];
    
    echo "Recieved pid = $pid";

    if(isset($_SESSION['cart']))
    {
        $localcart=$_SESSION['cart'];
        


        $res_ind=ispidAvailable($localcart, $pid);

        $res=$res_ind[0];
        $ind=$res_ind[1];


        if($res)
        {
            $localcart[$ind]['pqty']=$localcart[$ind]['pqty']+1;
        }
        else
        {
            array_push($localcart, ['pid'=>$pid, 'pqty'=>1]);
        }
    }
    else
    {
        $localcart=[['pid'=>$pid, 'pqty'=>1]];
    }

    $_SESSION['cart']=$localcart;

    print_r($localcart);

    header("location:index.php");

    function ispidAvailable($lc, $pid)
    {
        for($i=0; $i<=count($lc); $i++)
        {
            if($lc[$i]['pid']==$pid)
            {   
                return array(true, $i);
            }
        }

        return array(false, false);
    }


?>