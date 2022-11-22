<?php include('config.php'); ?>
<?php
session_start();
if(!isset($_SESSION['acNo']))
{
    header('location:atm.php');
}
else
{
    $sessionAcNo = $_SESSION['acNo'];

    $gettingTheBal = mysqli_query($conn,"SELECT * FROM atm WHERE ac_no='$sessionAcNo'");
    while($row = mysqli_fetch_array($gettingTheBal))
    {
        $oldBalance = $row['ac_balance'];
    }
}
?>
<h2>Welcome <?php echo $_SESSION['hlName']; ?>, Atm Withdraw</h2>
<h3> Avl. Balance in Account : <?php echo $oldBalance; ?></h3>
<?php
if(isset($_POST['withdraw']))
{
    $wAmt = $_POST['balance'];

    $remains = $oldBalance - $wAmt;

    if($remains <= 1000)
    {
        echo "<script>alert('Main Min. Balance of 1000')</script>";
    }
    else
    {
        //update remains balance to db
        $updateRemains = mysqli_query($conn,"UPDATE atm SET ac_balance='$remains' WHERE ac_no='$sessionAcNo'");

        $msg = 'withdraw amount = '.$wAmt.' and Avl. balance = '.$remains.'';

        echo "<script>alert('".$msg."')</script>";

        header('refresh:5');
        
    }
}
?>
<form action="" method="POST">
    <input type="text" name="balance" placeholder="Enter balance" ><br><br>
    <input type="submit" name="withdraw" value="Withdraw Amount">
</form>