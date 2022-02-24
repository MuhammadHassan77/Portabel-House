<?php
require_once("./admin_func.php");

?>

<!DOCTYPE html>
<html lang="en" class="h-100">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">    
    <title>Portable House</title>

    <!-- Favicons -->
    <link rel="icon" href="../img/favicon.png" sizes="16x16" type="image/png">
    <link rel="icon" href="../img/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="./css/style.css" rel="stylesheet">

</head>


<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="" class="text-white" style="font-size: 2em;font-family: cursive;">
                                            PORTABLE HOUSE
                                            <!-- <img src="../img/logo.png" alt="" style="width: 50%;"> -->
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <form id="loginAdminForm">
                                        <div class="loginNotify"></div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white" for="loginEmail"><strong>Email</strong></label>
                                            <input type="email" class="form-control" id="loginEmail" placeholder="hello@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white" for="loginPassword"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                                        </div>
                                        <!-- <div class="form-row d-flex justify-content-between mt-4 mb-2" style="display: none !important;">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1 text-white">
                                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a class="text-white" href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div> -->
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <!-- <div class="new-account mt-3" style="display: none;">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="page-register.html">Sign up</a></p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/dlabnav-init.js"></script>

<script>
    $(document).ready(function() {
        // login function
        $(document).on("submit", "#loginAdminForm", function(e) {
            e.preventDefault();
            let email = $("#loginEmail").val().trim();
            let password = $("#loginPassword").val().trim();
            let act = "adminlogin";
            // console.log(name, email, password, phone);
            if (email == "" || password == "") {
                $(".loginNotify").html(`
                <div class="alert alert-danger alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                    <strong>All fields are required!!</strong>
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                </div>
                `)
            } else {
                let dataString = `act=${act}&email=${email}&password=${password}`;
                // console.log(datastring);
                $.ajax({
                    url: "./admin_func.php",
                    method: "POST",
                    data: dataString,
                    caches: false,
                    success: (res) => {
                        console.log(res);
                        if (res == "success") {
                            $(".loginNotify").html(`
                                <div class="alert alert-success alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
									<strong>Login successfully!</strong>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
								</div>
                                `);
                            $("#loginEmail").val("");
                            $("#loginPassword").val("");
                            setTimeout(() => {
                                window.location.href = "./index.php"
                            }, 1000);
                        } else {
                            $(".loginNotify").html(`
                            <div class="alert alert-danger alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
									<strong>Incorrect Email Or Password!</strong>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
								</div>
                            `);
                        }
                    },
                    error: (err) => {
                        console.log(err);
                    }
                })
            }
        })
    })
</script>

</html>