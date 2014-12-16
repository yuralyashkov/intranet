<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 25.11.14
 * Time: 18:09
 */
class db {

    var $error;
    var $users = 'wd_users';
    var $users_meta = 'wd_users_meta';
    var $live = 'wd_live';

    function connect(){

        $host = '185.25.117.119';
        $user = 'intranet_user_bd';
        $password = 'n55qZq37';
        $db = 'intranet';
        $db = new mysqli($host, $user, $password, $db);

        if($db->connect_error)
        {
            $this->error = 'Ошибка подключения к базе данных!';
            exit();
        } else
        {
            $db->set_charset('utf8');
            return $db;
        }
    }


}