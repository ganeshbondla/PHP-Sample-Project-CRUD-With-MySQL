<?php include('config.php'); ?>
<?php include('header.php'); ?>
<body>
    <div class="container p-3 mt-4 shadow">
            <div class="row p-2">
                <div class="col-md-6 col-lg-6 p-2">
                    <img class="img-fluid gda-img" src="./img/login.png">
                </div>
                <div class="col-md-6 col-lg-6 p-2 my-auto">
                    <div class="p-4 mt-3 mb-3 shadow rounded text-center">
                        <h3><b>Login</b></h3>
                        <?php

                        if(isset($_POST['loginNow']))
                        {
                            $inputEmail = $_POST['inputEmail'];
                            $inputPassword = $_POST['inputPassword'];

                            $checkUser = mysqli_query($conn,"SELECT * FROM users WHERE user_email = '$inputEmail'");
                            $checkCount = mysqli_num_rows($checkUser);

                            if($checkCount == 0)
                            {
                                // User Not Registered
                                echo '
                                    <div class="alert alert-danger" role="alert">
                                        Email is not regstred, try to register and login!
                                        </div>
                                    ';
                            }
                            else
                            {
                                // User Registered
                                $checkUserIn = mysqli_query($conn,"SELECT * FROM users WHERE user_email = '$inputEmail'");
                                while($row = mysqli_fetch_array($checkUserIn))
                                {
                                    $db_userId = $row["user_id"];
                                    $db_user_name = $row["user_name"];
                                    $db_user_email = $row["user_email"];
                                    $db_user_password = $row["user_password"];
                                }

                                if($db_user_email == $inputEmail && $db_user_password == $inputPassword)
                                {
                                    // True User Dashboard
                                    header('location:dashboard.php');
                                }
                                else
                                {
                                    echo '
                                    <div class="alert alert-danger" role="alert">
                                        Invalid username or password
                                        </div>
                                    ';
                                }
                            }
                        }

                        ?>
                        <form class="mt-4" method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                            </div>
                            <button type="submit" name="loginNow" class="btn btn-block btn-primary">Submit</button>
                        </form>
                        <div class="row mt-3 text-center">
                            <div class="col">
                                <small><b>Dont have account <a href="register.php">Register here</a></b></small>
                            </div>
                            <div class="col">
                                <small><b><a href="#">Forgot Password?</a></b></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>