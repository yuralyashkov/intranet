<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 14.12.2014
 * Time: 19:06
 */
class live {
    var
        $error = null;

    function get_live_posts($much = 10){
        $db = new db();
        $mysql = $db->connect();

        $result = $mysql->query("select $db->live.id, $db->live.content, $db->live.publish_date, $db->users.name as author_name, $db->users.id as author_id, $db->users.last_name as author_lastname from $db->live, $db->users WHERE $db->live.author = $db->users.id order by id DESC limit 0, $much");


        if($result->num_rows > 0)
        {
            $array = array();
            while($data = $result->fetch_object())
                $array[] = $data;
            $mysql->close();
            return $array;
        }

        if($mysql->error)
            $this->error = $mysql->error;
        else
            $this->error = 'Ваша живая лента совсем не живая :(';

        $mysql->close();
        return false;
    }

    function add_post($args = null){
        if(!$args)
            exit();

        $db = new db();
        $mysql = $db->connect();

        $date = date('Y-m-d H:i:s');
        $content = trim($args['content'], ' ');
        $author = $_SESSION['user-id'];

        $mysql->query("insert into $db->live (content, publish_date, author) VALUES ('$content', '$date', '$author')");

        if($mysql->error) {
            $this->error = $mysql->error;
            $mysql->close();
            return false;
        } else {
            return $mysql->insert_id;
        }

    }
}