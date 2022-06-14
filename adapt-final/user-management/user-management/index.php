<?php
    session_start();
    include 'config.php';

try {
    $query = 'SELECT 1 FROM users LIMIT 1';
    $statement = $db->prepare($query);
    $statement->execute();
} catch (Exception $e) {
    // If Users table doesn't exist then redirect to install page
    header('location:install.php');
}

// user SESSION CHECK SET OR NOT
if (isset($_SESSION['username'])) {
    if(isset($_SESSION['table']) && $_SESSION['table']== 'admin'){
        header('location:admin/');
    }else{
        header('location:user/dashboard.php');
    } 
    exit();
}
else if(isset($_COOKIE['username']) && isset($_COOKIE['userPassword'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['table'] = $_COOKIE['table'];
    header('location:user/dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>

    <title>User Panel | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!---CSS FILES -->

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="assets/css/login.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="assets/css/components-md.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="assets/css/plugins-md.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="assets/plugins/froiden-helper/helper.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <!---END OF CSS FILES -->

</head>
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="javascript:;">
<!--        <img src="assets/img/logos/logo-big.png" alt="" /> -->
        User Panel
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" method="POST" autocomplete="off">
        <h3 class="form-title font-green">Sign In</h3>
        <div id="error"></div>
        <div class="form-group form-md-line-input">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control" type="text"  placeholder="Username" name="username" id="username"  autocomplete="new-username"/>
            <span class="help-block help-block-error"> </span>
            <div class="form-control-focus"> </div>
        </div>
        <div class="form-group form-md-line-input">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control" type="password"  placeholder="Password" name="password" id="password" autocomplete="new-password"/>
            <span class="help-block help-block-error"> </span>
            <div class="form-control-focus"> </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase btn-xs btn-outline" onclick="login();return false;">Login</button>
            <span class="md-checkbox has-success m-l-20">
                <input type="checkbox" id="remember" class="md-check" name="remember" value="1" />
                    <label for="remember">
                        <span class="inc"></span>
                        <span class="check"></span>
                        <span class="box"></span> Remember </label>
            </span>
        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
        </div>

        <div class="create-account">
            <p>
                <a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
            </p>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form">
        <h3 class="font-green">Forget Password ?</h3>
        <p> Enter your username address below to reset your password. </p>
         <div id="errorForget"></div>
        <div class="form-group form-md-line-input forget">
            <input class="form-control placeholder-no-fix" type="text"  placeholder="username" name="usernameForget" id="usernameForget"/>
            <div class="form-control-focus"> </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn dark btn-outline">Back</button>
            <button type="submit" class="btn green uppercase btn-outline pull-right forget" onclick="forget();return false;" id="forget-btn">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->

    <form class="register-form">

        <h3 class="font-green">Sign Up</h3>
        <div id="errorRegister"></div>
        <p class="hint"> Enter your personal details below: </p>
        <div class="form-group form-md-line-input register">
            <input class="form-control" type="text" placeholder="Name" name="nameRegister" id="nameRegister"/>
            <label class="control-label visible-ie8 visible-ie9">Name</label>
            <span class="form-control-focus"> </span>
        </div>
        <div class="form-group form-md-line-input register">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <input class="form-control placeholder-no-fix" type="text" placeholder="Username" name="usernameRegister" id="usernameRegister" />
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <span class="form-control-focus"> </span>
        </div>
        <div class="form-group form-md-line-input register">
            <input class="form-control" type="password"  id="passwordRegister" placeholder="Password" name="passwordRegister" />
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <span class="form-control-focus"> </span>
        </div>
        <div class="form-group form-md-line-input register">
            <input class="form-control" type="password"  placeholder="Re-type Your Password" name="cpasswordRegister" id="cpasswordRegister"/>
            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
            <span class="form-control-focus"> </span>
        </div>
        <div class="form-group form-md-line-input register">
            <input class="form-control" type="email"  placeholder="Email" name="emailRegister" id="emailRegister"/>
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <span class="form-control-focus"> </span>
        </div>
        <div class="form-group register">
            <label class="control-label visible-ie8 visible-ie9">Recaptcha</label>
            <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
        </div>
        <div class="form-actions">
            <button type="button" id="register-back-btn" class="btn dark btn-outline">Back</button>
            <button type="submit" id="register-submit-btn" class="btn green uppercase btn-outline pull-right register" onclick="register();return false;">Submit</button>
        </div>
    </form>
    <!-- END REGISTRATION FORM -->
</div>

<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script>
<script src="assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="assets/global/app.min.js" type="text/javascript"></script>
<script src="assets/plugins/froiden-helper/helper.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<script>
    jQuery('#forget-password').click(function() {
        jQuery('.login-form').hide();
        jQuery('.forget-form').show();
        $('.forget').each(function () {
            $(this).removeClass('hide').addClass('show');
            $('.forget-form').trigger("reset");
            $('#alert').addClass('hide');
        });
    });

    jQuery('#back-btn').click(function() {
        jQuery('.login-form').show();
        jQuery('.forget-form').hide();
    });
    jQuery('#register-btn').click(function() {
        jQuery('.login-form').hide();
        jQuery('.register-form').show();
        $('.register').each(function () {
            $(this).removeClass('hide').addClass('show');
            $('.register-form').trigger("reset");
            $('#alert').addClass('hide');
        });
    });

    jQuery('#register-back-btn').click(function() {
        jQuery('.login-form').show();
        jQuery('.register-form').hide();
    });

    // Login Function
    function login() {
        $.easyAjax({
            url: "ajax/login.php",
            type: "POST",
            data: $(".login-form").serialize(),
            container: ".login-form",
            messagePosition: "inline"
        });
    }

    // Forget Password Function
    function forget() {
        $.easyAjax({
            url: "ajax/forget.php",
            type: "POST",
            data: $(".forget-form").serialize(),
            container: ".forget-form",
            messagePosition: "inline",
            success: function (response) {
                if (response.status == "success") {
                    $('.forget').each(function () {
                        $(this).removeClass('show').addClass('hide');
                    });

                }
            }
        });
    }

    // Register Function
    function register() {
        $.easyAjax({
            url: "ajax/register.php",
            type: "POST",
            data: $(".register-form").serialize(),
            container: ".register-form",
            messagePosition: "inline",
            success: function (response) {
                if (response.status == "success") {
                    $('.register').each(function () {
                        $(this).removeClass('show').addClass('hide');
                    });

                }
            }
        });
    }

</script>
</body>
</html>