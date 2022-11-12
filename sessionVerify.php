<?php

session_start();

if(isset($_SESSION['userEmail']))
{
    $sessionUser = $_SESSION['userEmail'];

    //getting all details of session user from db
    $getUserDetails = mysqli_query($conn,"SELECT * FROM users WHERE user_email='$sessionUser'");
    while($row = mysqli_fetch_array($getUserDetails))
    {
        $session_userId = $row["user_id"];
        $session_user_name = $row["user_name"];
    }
}
else
{
    header('location:index.php?sessionOut=true');
}
?>