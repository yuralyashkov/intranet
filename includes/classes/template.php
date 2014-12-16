<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 09.12.14
 * Time: 19:33
 */
class template {
    var $error;

    function get_header($name = null){
        if(!$name)
            include(__DIR__.'/../../template/header.php');
        else
            include(__DIR__.'/../../template/'.$name.'.php');
    }
    function get_footer(){
        include(__DIR__.'/../../template/footer.php');
    }

    function get_sidebar(){
        include(__DIR__.'/../../template/sidebar.php');
    }
}