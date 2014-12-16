<?php
require_once("includes/load_all.php");
if(isset($_POST['login_admin']))
{
    $user_class = new users();
    if($user_class->user_auth($_POST['login'], $_POST['password']))
        header('location: /main.php');
    else
        $error = $user_class->error;
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8">
    <title>Административная панель сайта - WD engine</title>
    <link rel="stylesheet" href="/css/style.default.css">
    <link rel="stylesheet" href="/css/style.navyblue.css">

    <script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-migrate-1.1.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-1.9.2.min.js"></script>
    <script type="text/javascript" src="/js/modernizr.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/js/custom.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#login').submit(function(){
                var u = jQuery('#username').val();
                var p = jQuery('#password').val();
                if(u == '' && p == '') {
                    jQuery('.login-alert').fadeIn();
                    return false;
                }
            });
        });
    </script>
</head>
<body class="loginpage">

<?php

if(isset($error) && $error != '') { ?>
    <script>
        jQuery(document).ready(function(){
            jQuery('.login-alert').fadeIn();
        });
    </script>
<?php } ?>
<div class="loginpanel">

    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="images/logo.png" alt="" /></div>
        <form id="login" action="" method="post">
            <div class="inputwrapper login-alert">
                <div class="alert alert-error"><?php if($error) echo $error; else echo 'Поля пустые!'; ?></div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="login" id="username" placeholder="Введите логин" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Введите пароль" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="login_admin" value="login_admin">Вход</button>
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <label><input type="checkbox" class="remember" name="signin" /> Запомнить меня</label>
            </div>

        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2014. Разработано компанией "Веб Девелопер". Все права защищены законом</p>
</div>


</body>
</html>
