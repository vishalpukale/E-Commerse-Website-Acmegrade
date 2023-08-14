<?php

    $uname=$_POST["uname"];
    $upass=$_POST["upass1"];

    $hash_pass=md5($upass);

    $conn=new mysqli("localhost", "root", "", "vishal");
    $sql_status=mysqli_query($conn, "insert into seller(username, password) values('$uname', '$hash_pass')");

    if($sql_status)
    {
        echo "<h2 style='color:Green'>Registration Sucessful</h2>";
    }
    else
    {
        echo "Error in MySql syntax";
        echo mysqli_error($conn);   //show error in the code if we type usernames insted of username then it will be shown to the user.
    }

?>