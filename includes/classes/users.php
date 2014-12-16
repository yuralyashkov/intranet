<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 25.11.14
 * Time: 18:36
 */
session_start();

class users {
    var $error;

    function add_admin_user(){
        $login = 'wd_user';
        $password = md5(md5('kzirjd'));

        $db = new db();
        $mysql = $db->connect();

        $mysql->query("insert into $db->users (`login`, `password`, `type`) values ('$login', '$password', '10')");
        if($mysql->error)
            $this->error = 'Не удалось создать администратора';
        else
            return $mysql->insert_id;
    }

    function user_auth($login = null, $password = null)
    {
        $db = new db();
        $mysql = $db->connect();

        if(!$login || !$password)
            $this->error = 'Логин или пароль не введен';
        else
        {
            $password = md5(md5($password));
            $result = $mysql->query("select * from $db->users where `login` = '$login' AND `password` = '$password'");

            if($result->num_rows) {
                $hash = md5($this->generateCode(10));
                $ip = $_SERVER['REMOTE_ADDR'];

                $user_info = $result->fetch_object();

                $_SESSION['user-id'] = $user_info->id;
                $_SESSION['user-hash'] = $user_info->hash;
                $time = time();

                $new_result = $mysql->query("update $db->users set `hash` = '$hash', `authorized_time` = '$time', `ip` = '$ip' where `id` = '$user_info->id'");
                return true;
            } else {
                $this->error = 'Логин или пароль введен не верно';
                return false;
            }

        }
    }

    function generateCode($length=6) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

        $code = "";

        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];
        }

        return $code;

    }

    function get_user($id = null){
        $db = new db();
        $mysql = $db->connect();

        $result = $mysql->query("select * from $db->users where id = $id");
        if($result->num_rows > 0) {
            $user_info = $result->fetch_object();
            return $user_info;
        } else
            $this->error = 'Пользователь не найден';

    }

    function get_users($args = null){
        $db = new db();
        $mysql = $db->connect();

        $result = $mysql->query("select * from $db->users");
        $array = array();
        while($data = $result->fetch_object())
            $array[] = $data;
        return $array;
    }

    function add_user($args = null){
        if(!$args)
            exit();

        $db = new db();
        $mysql = $db->connect();

        $login = $args['login'];
        $password = md5(md5($args['password']));
        $name = $args['name'];

        $result = $mysql->query("insert into $db->users (login, password, name) VALUES ('$login', '$password', '$name')");

        if($mysql->error)
            echo $mysql->error;

    }

    function refresh_user($user_id){
        $db = new db();
        $mysql = $db->connect();

        $time = time();
        $mysql->query("update $db->users set time = $time WHERE (id = $user_id)");
        $mysql->close();
    }

    function refreshNewOnlineUsers(){
        $db = new db();
        $mysql = $db->connect();

        $time = time();
        $result = $mysql->query("select * from $db->users WHERE ($time - authorized_time < 10 and authorized_time <> 0)");


        if($result->num_rows > 0){
            $array = array();
            while($data = $result->fetch_object())
                $array[] = $data;
            return $array;
        }
    }
}