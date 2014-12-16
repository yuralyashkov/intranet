<?php
require_once(__DIR__ . '/../includes/load_all.php');
global $template;
$template->get_header();
$template->get_header('head-line');

$template->get_sidebar();
?>

    <script type="text/javascript" src="/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){

            //Replaces data-rel attribute to rel.
            //We use data-rel because of w3c validation issue
            jQuery('a[data-rel]').each(function() {
                jQuery(this).attr('rel', jQuery(this).data('rel'));
            });

            jQuery("#medialist a").colorbox();

        });
        jQuery(window).load(function(){
            jQuery('#medialist').isotope({
                itemSelector : 'li',
                layoutMode : 'fitRows'
            });

            // Media Filter
            jQuery('#mediafilter a').click(function(){

                var filter = (jQuery(this).attr('href') != 'all')? '.'+jQuery(this).attr('href') : '*';
                jQuery('#medialist').isotope({ filter: filter });

                jQuery('#mediafilter li').removeClass('current');
                jQuery(this).parent().addClass('current');

                return false;
            });
        });
    </script>

    <div class="rightpanel">
        <div class="maincontent">

            <div class="maincontentinner">

                <div class="mediamgr">
                    <div class="mediamgr_left">
                        <div class="mediamgr_head">
                            <ul class="mediamgr_menu">
                                <li><a class="btn prev prev_disabled"><span class="icon-chevron-left"></span></a></li>
                                <li><a class="btn next"><span class="icon-chevron-right"></span></a></li>
                                <li class="marginleft15"><a class="btn selectall"><span class="icon-check"></span>
                                        Выбрать все</a></li>
                                <li class="marginleft15 newfoldbtn"><a class="btn newfolder"
                                                                       title="Add New Folder"><span
                                            class="icon-folder-open"></span></a></li>
                                <li class="marginleft5 trashbtn"><a class="btn trash" title="Trash"><span
                                            class="icon-trash"></span></a></li>
                                <li class="marginleft15 filesearch">
                                    <form>
                                        <input type="text" id="filekeyword" class="filekeyword"
                                               placeholder="Поиск файла..."/>
                                    </form>
                                </li>
                                <li class="right newfilebtn"><a href="" class="btn btn-primary">Закачать файл</a></li>
                            </ul>
                            <span class="clearall"></span>
                        </div>
                        <!--mediamgr_head-->

                        <div class="mediamgr_category">
                            <ul id="mediafilter">
                                <li class="current"><a href="all">Все</a></li>
                                <li><a href="image">Изображения</a></li>
                                <li><a href="video">Видео</a></li>
                                <li><a href="audio">Аудио</a></li>
                                <li><a href="doc">Документы</a></li>
                                <li class="right"><span class="pagenuminfo">Showing 1 - 20 of 69</span></li>
                            </ul>
                        </div>
                        <!--mediamgr_category-->

                        <div class="mediamgr_content">


                            <ul id="medialist" class="listfile">
                                <li class="image">
                                    <a href="ajax/image.html"><img src="/images/thumbs/image1.png" alt=""/></a>
                                    <span class="filename">Image1.jpg</span>
                                </li>
                                <li class="image">
                                    <a href="ajax/image.html"><img src="/images/thumbs/image2.png" alt=""/></a>
                                    <span class="filename">Image2.jpg</span>
                                </li>
                                <li class="doc">
                                    <a href="ajax/doc.html"><img src="/images/thumbs/doc.png" alt=""/></a>
                                    <span class="filename">Tutorial1.pdf</span>
                                </li>
                                <li class="video">
                                    <a href="ajax/video.html"><img src="/images/thumbs/video.png" alt=""/></a>
                                    <span class="filename">Movie1.avi</span>
                                </li>
                                <li class="audio">
                                    <a href="ajax/audio.html"><img src="/images/thumbs/audio.png" alt=""/></a>
                                    <span class="filename">Song1.mp3</span>
                                </li>
                                <li class="doc">
                                    <a href="ajax/doc.html"><img src="/images/thumbs/doc.png" alt=""/></a>
                                    <span class="filename">Tutorial2.pdf</span>
                                </li>
                                <li class="doc">
                                    <a href="ajax/doc.html"><img src="/images/thumbs/doc.png" alt=""/></a>
                                    <span class="filename">Tutorial3.pdf</span>
                                </li>
                                <li class="image">
                                    <a href="ajax/image.html"><img src="/images/thumbs/image3.png" alt=""/></a>
                                    <span class="filename">Image1.jpg</span>
                                </li>
                                <li class="image">
                                    <a href="ajax/image.html"><img src="/images/thumbs/image4.png" alt=""/></a>
                                    <span class="filename">Image2.jpg</span>
                                </li>
                                <li class="doc">
                                    <a href="ajax/doc.html" data-rel="doc"><img src="/images/thumbs/doc.png" alt=""/></a>
                                    <span class="filename">Tutoria4.pdf</span>
                                </li>
                                <li class="video">
                                    <a href="ajax/video.html"><img src="/images/thumbs/video.png" alt=""/></a>
                                    <span class="filename">Movie1.avi</span>
                                </li>
                                <li class="audio">
                                    <a href="ajax/audio.html"><img src="/images/thumbs/audio.png" alt=""/></a>
                                    <span class="filename">Song1.mp3</span>
                                </li>
                                <li class="doc">
                                    <a href="ajax/doc.html"><img src="/images/thumbs/doc.png" alt=""/></a>
                                    <span class="filename">Tutorial5.pdf</span>
                                </li>
                                <li class="doc">
                                    <a href="ajax/doc.html"><img src="/images/thumbs/doc.png" alt=""/></a>
                                    <span class="filename">Tutorial6.pdf</span>
                                </li>
                                <li class="image">
                                    <a href="ajax/image.html"><img src="/images/thumbs/image5.png" alt=""/></a>
                                    <span class="filename">Image1.jpg</span>
                                </li>
                                <li class="image">
                                    <a href="ajax/image.html"><img src="/images/thumbs/image6.png" alt=""/></a>
                                    <span class="filename">Image2.jpg</span>
                                </li>
                                <li class="doc">
                                    <a href="ajax/doc.html"><img src="/images/thumbs/doc.png" alt=""/></a>
                                    <span class="filename">Tutorial.pdf</span>
                                </li>
                                <li class="video">
                                    <a href="ajax/video.html"><img src="/images/thumbs/video.png" alt=""/></a>
                                    <span class="filename">Movie1.avi</span>
                                </li>
                                <li class="audio">
                                    <a href="ajax/audio.html"><img src="/images/thumbs/audio.png" alt=""/></a>
                                    <span class="filename">Song1.mp3</span>
                                </li>
                                <li class="doc">
                                    <a href="ajax/doc.html"><img src="/images/thumbs/doc.png" alt=""/></a>
                                    <span class="filename">Tutorial1.pdf</span>
                                </li>
                            </ul>

                            <br class="clearall"/>

                        </div>
                        <!--mediamgr_content-->

                    </div>
                    <!--mediamgr_left -->

                    <div class="mediamgr_right">
                        <div class="mediamgr_rightinner">
                            <h4>Browse Files</h4>
                            <ul class="menuright">
                                <li class="current"><a href="">All Files</a></li>
                                <li><a href="">Deleted Files</a></li>
                                <li><a href="">Recently Added</a></li>
                                <li><a href="">Recently Viewed</a></li>
                                <li><a href="">New Folder</a></li>
                                <li><a href="">New Folder(2)</a></li>
                            </ul>
                        </div>
                        <!-- mediamgr_rightinner -->
                    </div>
                    <!-- mediamgr_right -->
                    <br class="clearall"/>
                </div>
                <!--mediamgr-->
                </div>
            </div>

<?php $template->get_footer(); ?>