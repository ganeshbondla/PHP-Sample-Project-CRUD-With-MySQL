<?php include('config.php'); ?>
<h2>ATM</h2>
<?php

if(isset($_POST['enterATM']))
{
    $acno = $_POST['acno'];
    $pin = $_POST['pin'];

    $checkAccount = mysqli_query($conn,"SELECT * FROM atm WHERE ac_no='$acno'");
    $checkAccCount = mysqli_num_rows($checkAccount);

    if($checkAccCount == 0)
    {
        echo "<script>alert('NO Account Found!')</script>";
    }
    else
    {
        while($row = mysqli_fetch_array($checkAccount))
        {
            $db_acno = $row['ac_no'];
            $db_pin = $row['ac_pin'];
            $db_hl_name = $row['hl_name'];
        }

        if($db_acno == $acno && $db_pin == $pin)
        {
            session_start();

            $_SESSION['acNo'] = $db_acno;
            $_SESSION['hlName'] = $db_hl_name;

            header('location:atm-dashboard.php');
        }
        else
        {
            echo "<script>alert('Wrong pin/wrong account number')</script>";
        }
    }
}

?>
<form action="" method="POST">
    <input type="text" name="acno" placeholder="Enter account number" ><br><br>
    <input type="text" name="pin" placeholder="Enter pin" ><br><br>
    <input type="submit" name="enterATM" value="Enter Into It">
</form>