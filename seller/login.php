<?php

    session_start();

    $_SESSION['login_status']=false;

    $uname=$_POST['uname'];
    $upass=$_POST['upass'];

    $hash_upass=md5($upass);

    echo "$hash_upass<br>";

    $conn=new mysqli("localhost", "root", "", "vishal");

    $sql_cursor=mysqli_query($conn, "select * from seller where username='$uname' and password='$hash_upass'");

    $total_rows=mysqli_num_rows($sql_cursor);

    if($total_rows>0)
    {
        $row=mysqli_fetch_assoc($sql_cursor);

        $_SESSION['login_status']=true;
        $_SESSION['userid']=$row['sellerid'];
        $_SESSION['username']=$row['username'];

        echo "<h1>Login Sucessful</h1>";
        header("location:product/upload.php");  
    }
    else
    {
        echo "<h1>Invalid Credentials</h1>";
    }

?>