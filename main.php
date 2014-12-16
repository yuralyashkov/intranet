<?php
require_once('includes/load_all.php');

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
                    <div class="span9">
                        <?php require_once('template/head-allert.php'); ?>
                        <h2 class="topictitle">Живая лента</h2>

                        <?php

                        $live_class = new live();
                        if(isset($_POST['add-live-post'])) {
                            $args = array(
                                'content' => $_POST['live-content']
                            );
                            if (!$live_class->add_post($args))
                                echo $live_class->error;
                        }
                        ?>

                        <a href="#" class="btn" style="margin-top: 15px" id="add-message-btn"><span class="iconfa-envelope"></span> Написать сообщение</a>

                        <div class="replypanel" id="add-message" style="display: none;">

                            <div class="nomargin topic-content" style="margin-left: 0">
                                <form action="" method="post">
                                    <p><textarea name="live-content" class="tinymce"></textarea></p>

                                    <input type="submit" class="btn btn-success" value="Опубликовать" name="add-live-post">
                                    <a href="#" class="btn" id="add-message-close">Отменить</a>
                                </form>
                            </div><!--topic-content-->
                        </div>

                        <?php
                        $date_class = new rus_date();
                        $posts = $live_class->get_live_posts(10);
                        if($posts && count($posts) > 0)
                        {
                            foreach($posts as $post) { ?>

                                <div class="topicpanel">
                                    <div class="author-thumb">
                                        <img src="images/photos/thumb1.png" alt="">
                                    </div><!--author-thumb-->

                                    <div class="topic-content">
                                        <h5><a href=""><strong><?php echo $post->author_name.' '.$post->author_lastname; ?></strong></a></h5>
                                        <?php echo $post->content; ?>
                                        <p class="date"><span class="iconfa-time"></span> <?php echo $date_class->get_rus_date($post->publish_date, 'd F H:i'); ?></p>
                                    </div><!--topic-content-->


                                </div>
                            <?php }
                        } else echo $live_class->error; ?>
                        <!--<ul class="comments">
                            <li>
                                <a class="authorimg" href=""><img alt="" src="images/photos/thumb2.png"></a>
                                <div class="comment">
                                    <div class="commentauthor">
                                        <strong>Nusjan Nawancali</strong> <span class="commenttime">less than a minute</span> - <a href="" class="commentreply">Reply</a>
                                    </div>
                                    <p class="commentbody">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                </div>
                            </li>
                        </ul>
                        -->
                    </div>
                    <div class="span3">
                        <h3 class="subtitle">Мои задачи</h3>
                        <ul class="sidebarlist">
                            <li><i class="iconfa-angle-right"></i> <a href="">Делаю <span>21</span></a></li>
                            <li><i class="iconfa-angle-right"></i> <a href="">Помогаю <span>5</span></a></li>
                            <li><i class="iconfa-angle-right"></i> <a href="">Поручил <span>1</span></a></li>
                            <li><i class="iconfa-angle-right"></i> <a href="">Наблюдаю <span>3</span></a></li>
                        </ul>

                        <h4 class="widgettitle" style="margin-top: 15px">Календарь</h4>
                        <div class="widgetcontent nopadding">
                            <div id="datepicker"></div>
                        </div>

                        <script>
                            jQuery(document).ready(function(){
                                jQuery('#datepicker').datepicker();

                                jQuery('#add-message-btn').click(function(){
                                    jQuery(this).hide();
                                    jQuery('#add-message').fadeIn();
                                    return false;
                                });

                                jQuery('#add-message-close').click(function(){
                                    jQuery('#add-message').fadeOut();
                                    jQuery('#add-message-btn').fadeIn();
                                    return false;
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $template->get_footer(); ?>