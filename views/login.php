<?php
require "frontendheader.php";
?>
    <!-- SubcategoryCtrl Title -->
    <div class="jumbotron jumbotron-fluid subtitle">
        <div class="container">
            <h1 class="text-center text-white"> Login </h1>
        </div>
    </div>

    <!-- Content -->
    <div class="container my-5">

        <div class="row justify-content-center">

            <div class="col-5">
                <?php if (isset($_SESSION['reg_session'])){


                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h1> 🎉 con! con...!</h1>
                    <h5>Well Don</h5>
                    <p><?php echo $_SESSION['reg_session']?> </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php }
                unset($_SESSION['reg_session']);
                ?>
                <?php if (isset($_SESSION['login_failed'])){


                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h1> ⚠️ Oops..!</h1>
                        <p><?php echo $_SESSION['login_failed']?> </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                unset($_SESSION['login_failed']);
                ?>
                <form action="<?php echo $GLOBALS['view_path']?>signin" method="POST">
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                            <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>


                        </div>

                        <a class="small" href="#">Forgot Password?</a>

                    </div>

                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">

                        <button type="submit" class="btn btn-secondary mainfullbtncolor btn-block">Login</button>
                    </div>


                </form>

                <div class=" mt-3 text-center ">
                    <a href="<?php echo $GLOBALS['view_path']?>register" class="loginLink text-decoration-none">Need an account? Sign Up!</a>
                </div>
            </div>
        </div>
    </div>
<?php
require "frontendfooter.php";
?>

