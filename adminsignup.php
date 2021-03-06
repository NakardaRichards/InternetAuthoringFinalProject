<?php



include 'admins.php';

$adminsObj = new Admins();


if (isset($_POST['submit'])) {
    $adminsObj->adminSignup($_POST);
}






?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Sign-up Component</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">



    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="adminsignup.css">


</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="adminsignup.php" method="POST">
                    <span class="login100-form-title p-b-26">
                        Welcome to ZoOk
                    </span>
                    <span>
                    <a href="LandingPage.html">
                            <img style="width:130px;position:relative;margin-left:80px;" src="Images\o.png">
                        </a>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter your first name">
                        <input class="input100" type="text" name="fname">
                        <span class="focus-input100" data-placeholder="First Name"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter last name">
                        <input class="input100" type="text" name="lname">
                        <span class="focus-input100" data-placeholder="Last Name"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter Your gym's location">
                        <input class="input100" type="text" name="location">
                        <span class="focus-input100" data-placeholder="Gym's Location"></span>
                    </div>



                    <div class="wrap-input100 validate-input" data-validate="Enter Your gym's Available Time Slots">
                        <input class="input100" type="text" name="time_slot">
                        <span class="focus-input100" data-placeholder="Gym's Available Time Slots"></span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Enter Your Gym's Monthly Membership Fee">
                        <input class="input100" type="text" name="cost_per_month">
                        <span class="focus-input100" data-placeholder="Monthly Membership Fee USD"></span>
                    </div>



                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.com">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter Your Gym's name">
                        <input class="input100" type="text" name="gym_name">
                        <span class="focus-input100" data-placeholder="Gym Name"></span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="pass">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>



                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button name="submit" type="submit" value="Submit" class="login100-form-btn">
                                Sign Up Your Gym
                            </button>
                        </div>
                    </div>


                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Already have an admin account?
                        </span>

                        <a class="txt2" href="adminlogin.php">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="vendor/animsition/js/animsition.min.js"></script>

    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>



    <script src="js/main.js"></script>

</body>

</html>