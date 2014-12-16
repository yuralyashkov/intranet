<?php $user_class = new users(); $user = $user_class->get_user($_SESSION['user-id']); ?>
<div class="header">
    <div class="logo">
        <a href="/admin-panel"><img src="/images/logo.png" alt="" style="width: 60px;" /></a>
    </div>
    <div class="headerinner">
        <ul class="headmenu">
            <!--
            <li class="odd">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="count"></span>
                    <span class="head-icon head-message"></span>
                    <span class="headmenu-label">Сообщения</span>
                </a>


            </li>
            <li class="odd">
                <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="count"></span>
                    <span class="head-icon head-bar"></span>
                    <span class="headmenu-label">Статистика</span>
                </a>


            </li>
            -->
            <li class="right">
                <div class="userloggedinfo">
                    <div class="userinfo">
                        <h5><?php echo $user->name.' '.$user->last_name; ?></h5>
                        <ul>

                            <li><a href="login.php?action=exit">Выход</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul><!--headmenu-->
    </div>
</div>
