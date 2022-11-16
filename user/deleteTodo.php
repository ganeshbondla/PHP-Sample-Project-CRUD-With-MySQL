<?php include('../config.php'); ?>
<?php include('../sessionVerify.php'); ?>
<?php

if(isset($_GET['id']))
{
    $editId = $_GET['id'];

    $checkId = "SELECT * FROM todo_list WHERE todo_id='$editId' AND user_id='$session_userId'";
    $sqlRun = mysqli_query($conn, $checkId);
    $checkCount = mysqli_num_rows($sqlRun);

    if($checkCount == 0)
    {
        header('location:dashboard.php?notFound=true');
    }
    else
    {
        // $deleteQuery = "DELETE FROM todo_list WHERE todo_id='$editId'";

        $deleteQuery = "UPDATE todo_list SET isDeleted='1' WHERE todo_id='$editId'";

        $runQuery = mysqli_query($conn,$deleteQuery);

        echo "<script>alert('Deleted Success!')</script>";

        header( "refresh:1;url=dashboard.php");
    }

}
else
{
    header('location:dashboard.php');
}

?>