<?php include('config.php'); ?>
<?php include('header.php') ?>
<body>
    <div class="container p-3 mt-4 shadow">
            <div class="row p-2">
                <div class="col-md-6 col-lg-6 p-2">
                    <img class="img-fluid" src="./img/login.png">
                </div>
                <div class="col-md-6 col-lg-6 p-2 my-auto">
                    <div class="p-4 mt-3 mb-3 shadow rounded text-center">
                        <h3><b>Register</b></h3>
                        <?php
                        if(isset($_POST['registerNow']))
                        {
                            $inputName = $_POST['inputName'];
                            $inputMobile = $_POST['inputMobile'];
                            $inputEmail = $_POST['inputEmail'];
                            $inputPassword = $_POST['inputPassword'];

                            $randomNumber = rand(100000,999999);

                            $userId = "GDA".$randomNumber."";

                            $createdDate = date('d-m-Y');

                            $checkInDbQuery = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$inputEmail'");

                            $checkCountOfUsers = mysqli_num_rows($checkInDbQuery);

                            if($checkCountOfUsers == 0)
                            {
                                //No User
                                $saveData = "INSERT INTO users(user_id, user_name, user_email, user_mobile, user_password, created_date, status, isDeleted)
                                VALUES('$userId','$inputName','$inputEmail','$inputMobile','$inputPassword','$createdDate','0','0')"; 

                                $inserData = mysqli_query($conn, $saveData);

                                if(!$inserData)
                                {
                                    echo '
                                    <div class="alert alert-danger" role="alert">
                                        Register Failed!
                                        </div>
                                    ';
                                }
                                else
                                {
                                    echo '
                                    <div class="alert alert-success" role="alert">
                                        Register Success!
                                    </div>
                                    ';
                                }
                            }
                            else
                            {
                                echo '
                                <div class="alert alert-danger" role="alert">
                                    User is Already Registered!, Try Login 
                                </div>
                                ';
                            }

                        }
                        ?>
                        <form class="mt-4" action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="Enter Mobile">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                            </div>
                            <button type="submit" name="registerNow" class="btn btn-block btn-primary">Submit</button>
                        </form>
                        <div class="row mt-3 text-center">
                            <div class="col">
                                <small><b>Already have account <a href="index.php">Login here</a></b></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>