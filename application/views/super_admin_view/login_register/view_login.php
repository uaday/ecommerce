<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);"><img style="width: 145px;height: 45px"
                                           src="<?php echo base_url() ?>asset/front_end/logo/logo.png" alt="Universal logo"
                                           class="hidden-xs hidden-sm"></a>
<!--        <small>Admin BootStrap Based - Material Design</small>-->
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="<?php echo base_url()?>portal/login/login_check">
                <div class="msg">Sign in to start your session</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
<!--                    <div class="col-xs-8 p-t-5">-->
<!--                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">-->
<!--                        <label for="rememberme">Remember Me</label>-->
<!--                    </div>-->
                    <div class="col-xs-offset-8 col-xs-4">
                        <input  type="submit" class="btn btn-block bg-pink waves-effect" value="SIGN IN">
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
<!--                        <a href="--><?php //echo base_url()?><!--portal/register">Register Now!</a>-->
                    </div>
<!--                    <div class="col-xs-6 align-right">-->
<!--                        <a href="forgot-password.html">Forgot Password?</a>-->
<!--                    </div>-->
                </div>
            </form>
        </div>
    </div>
</div>

</body>