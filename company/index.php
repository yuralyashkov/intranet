<?php
require_once(__DIR__.'/../includes/load_all.php');
global $template;
$template->get_header();
$template->get_header('head-line');

$template->get_sidebar();
?>

<div class="rightpanel">
    <div class="maincontent">
        <div class="maincontentinner">
            <div class="row-fluid">
                <div id="dashboard-left" class="span16">
                    <?php $template->get_header('head-allert'); ?>
                    <div class="row-fluid">
                    <form class="form-search pull-left">
                        <input type="text" class="search-field" placeholder="Поиск сотрудника">
                    </form>
                    <a class="btn btn-success pull-right" href="#add-worker" data-toggle="modal"><span class="iconfa-plus"></span> &nbsp; Пригласить сотрудника</a>
                        </div>
                    <div class="navbar">
                        <div class="navbar-inner">
                            <ul class="nav">
                                <li class="active"><a href="#">Компания</a></li>
                                <li><a href="#">Уволенные</a></li>
                                <li><a href="#">В отпуске</a></li>
                                <li><a href="#">Приглашенные</a></li>
                            </ul>
                        </div>
                    </div>

                    <table class="table">
                        <tbody>
                        <?php
                        $user_class = new users();
                        $users = $user_class->get_users();
                        $time = time()-10;
                        foreach($users as $user) {
                        ?>
                            <tr>
                                <td style="width: 15px; vertical-align: middle;">
                                    <span class="iconsweets-user"></span>
                                </td>
                                <td>
                                    <h5>
                                        <a href="#"><?php echo $user->name; ?></a>
                                        <span class="iconfa-cog marginleft5"></span>
                                    </h5>
                                    <div><?php if($time > $user->time) echo '<span class="offline"></span> offline'; else echo '<span class="online"></span> online'; ?></div>
                                    <span class="label label-info">Администратор</span>

                                </td>
                                <td>Email: <?php echo $user->login; ?></td>
                            </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Лайтбокс приглашения сотрудника -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="add-worker" style="display: none;">
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h3 id="myModalLabel">Пригласить сотрудника</h3>
    </div>
    <div class="modal-body">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#">Пригласить</a>
            </li>
            <li>
                <a href="#add-worker2" data-toggle="modal" data-dismiss="modal">Добавить</a>
            </li>
        </ul>
        <form class="stdform" action="" method="post" id="invite-worker">

            <p>
                <label>Имя</label>
                <span class="field">
                    <input type="text" name="name">
                </span>
            </p>
            <p>
                <label>Эл. почта</label>
                <span class="field">
                    <input type="email" name="email">
                </span>
            </p>
            <p>
                <label>Текст приглашения</label>
                <span class="field">
                    <textarea style="width: 280px; resize: none; height: 100px" name="invite-text">Приглашаю вас на корпоративный портал нашей компании. Здесь мы сможем вместе работать над проектами и задачами, управлять документами, планировать встречи и собрания, общаться в блогах и многое другое.</textarea>
                </span>
            </p>
            <input type="hidden" name="invite-worker-submit" value="1">
        </form>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn">Закрыть</button>
        <button class="btn btn-primary" id="invite-worker-btn">Пригласить</button>
    </div>
</div>

<!-- Лайтбокс добавления сотрудника -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="add-worker2" style="display: none;">
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h3 id="myModalLabel">Добавить сотрудника</h3>
    </div>
    <div class="modal-body">
        <ul class="nav nav-tabs">
            <li>
                <a href="#add-worker" data-toggle="modal" data-dismiss="modal">Пригласить</a>
            </li>
            <li class="active">
                <a href="#">Добавить</a>
            </li>
        </ul>
        <form class="stdform">
            <p>
                <label>Эл. почта</label>
                <span class="field">
                    <input type="email">
                </span>
            </p>
            <p>
                <label>Имя</label>
                <span class="field">
                    <input type="text">
                </span>
            </p>
            <p>
                <label>Фамилия</label>
                <span class="field">
                    <input type="text">
                </span>
            </p>
            <hr>
            <p>
                <label>Должность</label>
                <span class="field">
                    <input type="text">
                </span>
            </p>
            <p>
                <span class="field">
                    <input type="checkbox" name="">
                    Отправить данные на email
                </span>

            </p>
        </form>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn">Закрыть</button>
        <button class="btn btn-primary">Добавить</button>
    </div>
</div>

<?php
if(isset($_POST['invite-worker-submit'])){
    $user_class = new users();
    $password = $user_class->generateCode(10);
    $to = $_POST['email'];
    $subject = 'Приглашение на корпоративный портал';
    $message = 'Здравствуйте, '.$_POST['name'].'!';
    $message .= '<br><br>';
    $message .= $_POST['invite-text'];
    $message .= '<br><br>';
    $message .= '<a href="http://'.$_SERVER['SERVER_NAME'].'">'.$_SERVER["SERVER_NAME"].'</a><br>';
    $message .= 'Ваш логин - '.$_POST['email'].'<br>';
    $message .= 'Ваш пароль - '.$password.'<br>';

    mail($to, $subject, $message, "Content-type: text/html\r\n");

    $args = array(
        'login' => $_POST['email'],
        'password' => $password,
        'name' => $_POST['name']
    );
    $user_class->add_user($args);
}
?>

<script>
    jQuery(document).ready(function(){
       jQuery('#invite-worker-btn').click(function(){
           jQuery('#invite-worker').submit();
           return false;
       });
    });
</script>

<?php $template->get_footer(); ?>
