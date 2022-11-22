<?php include('config.php'); ?>
<html>
    <body>
        <h1>Bank Account Opening</h1>
        <?php
            if(isset($_POST['createAccount']))
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $pin = $_POST['pin'];
                $balance = $_POST['balance'];

                $acno = rand(100000,999999);

                //validate the balance
                if($balance < 1000)
                {
                    echo "<script>alert('Balance must be above 1000')</script>";
                }
                else
                {
                    $createact = mysqli_query($conn,"INSERT INTO atm(ac_no, hl_name, hl_email, hl_mobile, ac_balance, ac_pin, status) 
                    VALUES ('$acno','$name','$email','$mobile','$balance','$pin','0')");

                    echo "<script>alert('Account is Created')</script>";

                    header('refresh:1');
                }
                
            }
        ?>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Enter full name" ><br><br>
            <input type="text" name="email" placeholder="Enter email" ><br><br>
            <input type="text" name="mobile" placeholder="Enter mobile" ><br><br>
            <input type="text" name="pin" placeholder="Enter pin" ><br><br>
            <input type="text" name="balance" placeholder="Enter balance" ><br><br>
            <input type="submit" name="createAccount" value="Create Account">
        </form>
    </body>
</html>