
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="../assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/vendors/login/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/vendors/login/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/vendors/login/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/vendors/login/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/vendors/login/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/vendors/login/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../assets/css/login1.css">
<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
<!--===============================================================================================-->

<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Create your account
					</span>
                <span class="login100-form-title p-b-48">
					<a href="../index.php">	<img src="../assets/images/logo.png" alt="" width="280px" height="120px"/></a>
					</span>

                <div class="wrap-input100 validate-input" data-validate="Enter your username">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="text" name="username">
                    <span class="focus-input100" data-placeholder="Your Username"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Your Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter  password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="pass">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>
                <div class="wrap-input100 validate-input notEqual"  data-validate="Repeat password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="repPass">
                    <span class="focus-input100" data-placeholder="Repeat your password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>

                        <button class="login100-form-btn" onclick="registerUser()">
                            Register
                        </button>


                    </div>
                </div>


            </form>
            <div id="odgovor" style=" display: none; text-align: center; margin-top: 30px; background-color: red; color: white; padding: 5px;opacity: 75%; border-radius: 5px"></div>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
<script src="../assets/vendors/login/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendors/login/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendors/login/bootstrap/js/popper.js"></script>
<script src="../assets/vendors/login/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendors/login/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendors/login/daterangepicker/moment.min.js"></script>
<script src="../assets/vendors/login/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendors/login/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../assets/js/login.js"></script>

</body>
</html>