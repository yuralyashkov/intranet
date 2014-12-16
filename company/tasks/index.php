<?php
require_once(__DIR__.'/../../includes/load_all.php');
global $template;
$template->get_header();
$template->get_header('head-line');

$template->get_sidebar();
?>

<div class="rightpanel">
    <div class="pageheader">
        <div class="searchbar">
            <a href="#add-task-simple" class="btn left" data-toggle="modal" style="vertical-align: top; padding: 8px 10px"><span class="iconfa-plus"></span> &nbsp; Добавить задачу</a>
            <form style="display: inline-block">
                <input type="text" placeholder="Поиск задач">
            </form>
        </div>
        <div class="pageicon"><span class="iconfa-tasks"></span> </div>
        <div class="pagetitle"><h5>Управление задачами персонала</h5><h1>Задачи</h1></div>
    </div>
    <div class="maincontent">
        <div class="maincontentinner">
            <div class="row-fluid">
                <div id="dashboard-left" class="span16">

                    <?php $template->get_header('head-allert'); ?>
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#"><span class="iconfa-play"></span> &nbsp; Делаю</a> </li>
                        <li><a href="#"><span class="iconsweets-arrowright"></span>  &nbsp; Помогаю</a> </li>
                        <li><a href="#"><span class=" iconsweets-user"></span> &nbsp; Поручил</a> </li>
                        <li><a href="#"><span class=" iconsweets-preview"></span> &nbsp; Наблюдаю</a> </li>
                        <li><a href="#"><span class=" iconsweets-archive"> </span> &nbsp; Все</a> </li>
                        <li><a href="#"><span class="iconsweets-zip2"></span> &nbsp; Проекты</a> </li>
                        <li><a href="#"><span class="iconsweets-flag2"></span>  &nbsp; Отчеты</a> </li>
                    </ul>

                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Показывать в работе<span class="caret"></span> </button>
                        <ul class="dropdown-menu dropdown">
                            <li><a href="#">все</a></li>
                            <li><a href="#">в работе</a></li>
                            <li><a href="#">завершенные</a></li>
                            <li><a href="#">просроченные</a></li>
                            <li><a href="#">отложенные</a></li>
                        </ul>
                    </div>

                    <table class="table table-bordered dataTable">
                        <thead>
                            <th><input type="checkbox"></th>
                            <th>Название</th>
                            <th>Крайний срок</th>
                            <th>Ответственный</th>
                            <th>Оценка</th>
                            <th>Постановщик</th>
                            <th>
                                <div style="position: relative">
                                    <div data-toggle="dropdown" style="font-size: 16px; cursor: pointer"><span class="iconfa-cog" ></span></div>
                                    <div class="dropdown-menu dropdown" style="right: 0; left: auto; color: #444; text-transform: none">
                                        <form class="formwrapper padding5">
                                            <label><input type="checkbox" name="form-field-tasks[1]" checked>Название</label>
                                            <label><input type="checkbox" name="form-field-tasks[2]" checked>Крайний срок</label>
                                            <label><input type="checkbox" name="form-field-tasks[3]" checked>Ответственный</label>
                                            <label><input type="checkbox" name="form-field-tasks[4]" checked>Оценка</label>
                                            <label><input type="checkbox" name="form-field-tasks[5]" checked>Постановщик</label>
                                            <label><input type="checkbox" name="form-field-tasks[6]" checked>Статус</label>
                                            <label><input type="checkbox" name="form-field-tasks[6]" checked>Дата создания</label>
                                            <label><input type="checkbox" name="form-field-tasks[6]" checked>Затраченное время</label>
                                        </form>
                                    </div>
                                </div>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td class="title"><a href="#">Заполнить профиль</a></td>
                                <td>завтра</td>
                                <td>Юрий Ляшков</td>
                                <td>123</td>
                                <td>Юрий Ляшков</td>
                                <td class="tooltip-col">
                                    <a href="#" class="icon" rel="tooltip" data-original-title="Завершить задачу" data-placement="top" data-rel="tooltip"><span class="iconfa-ok-circle"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td class="title"><a href="#">Пригласить сотрудников</a></td>
                                <td>завтра</td>
                                <td>Юрий Ляшков</td>
                                <td>123</td>
                                <td>Юрий Ляшков</td>
                                <td class="tooltip-col">
                                    <a href="#" class="icon" rel="tooltip" data-original-title="Завершить задачу" data-placement="top" data-rel="tooltip"><span class="iconfa-ok-circle"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td class="title"><a href="#">Познакомиться с системой</a></td>
                                <td>завтра</td>
                                <td>Юрий Ляшков</td>
                                <td>123</td>
                                <td>Юрий Ляшков</td>
                                <td class="tooltip-col">
                                    <a href="#" class="icon" rel="tooltip" data-original-title="Завершить задачу" data-placement="top" data-rel="tooltip"><span class="iconfa-ok-circle"></span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="dataTables_info">
                        <select>
                            <option>выбрать действие</option>
                            <option>завершить</option>
                            <option>указать крайний срок</option>
                            <option>перенести крайний срок вперед</option>
                            <option>перенести крайний срок назад</option>
                            <option>сменить ответственного</option>
                            <option>сменить постановщика</option>
                            <option>добавить наблюдателя</option>
                            <option>добавить соисполнителя</option>
                            <option>указать группу</option>
                            <option>удалить</option>
                        </select>
                        <input type="submit" value="Применить" class="btn selectable-btn">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Лайтбокс добавления задачи (простой формы) -->
<div aria-hidden="true" aria-labelledby="simple-add-form" role="dialog" tabindex="-1" class="modal hide fade" id="add-task-simple" style="display: none; width: 630px;">
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h3 id="myModalLabel">Добавить задачу</h3>
    </div>
    <div class="modal-body">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#">Быстрое добавление</a>
            </li>
            <li>
                <a href="#">Подробная форма</a>
            </li>
        </ul>
        <form class="stdform">
            <p style="margin: 0">
                <label style="text-align: left">Название задачи</label>
                <input type="text" placeholder="Что нужно сделать" class="input-block-level" style="font-weight: bold; font-size: 16px">
            </p>
            <p style="margin: 0;" class="clearfix">
                <label style="text-align: left;">Исполнитель</label>
            </p>
            <p style="margin: 0;">
                <span class="formwrapper" style="margin-left: 0">
                    <select class="chzn-select" data-placeholder="Выберите исполнителя">
                        <option>asdasd</option>
                    </select>

                    <span style="display: inline-block; vertical-align: top; margin-top: 5px; margin-left: 10px">
                        Приоритет:
                        <span><input type="radio" name="priority"><span class="label">Обычный</span></span>
                        <span><input type="radio" name="priority"><span class="label label-success">Важный</span></span>
                        <span><input type="radio" name="priority"><span class="label label-important">Очень важный</span></span>
                    </span>
                </span>
            </p>
            <p>
                <label style="text-align: left; width: 110px;">Крайний срок:</label>
                <label style="text-align: left; width: 35px;;">Дата</label>
                <input id="datepicker" class="input-small" style="float: left;">
                <label style="text-align: left; width: 35px; margin-left: 35px">Время</label>
            <div class="input-append bootstrap-timepicker">
                <input id="datetime" type="text" class="input-small" />
                <span class="add-on"><i class="iconfa-time"></i></span>
            </div>
            </p>

            <a href="#" id="drop-files-open" class="dotted-href">Загрузить документы или картинку</a>
            <a href="#" id="drop-files-close" class="dotted-href red" style="display: none;">Отменить загрузку файлов</a>

            <form>
                <div id="drop-files" class="text-center" ondragover="return false">
                    <h5>Загрузите файл или картинку</h5>
                    <span>перетяните сюда файл или кликните для обзора</span>

                        <input type="file" id="uploadbtn" name="file" multiple style="display: none;">

                </div>
                <!-- Область предпросмотра -->
                <div id="uploaded-holder" style="display: none">
                    <div id="dropped-files">
                        <!-- Кнопки загрузить и удалить, а также количество файлов -->
                        <div id="upload-button">
                            <center>
                                <span id="much-files">0 Файлов</span>
                                <a href="#" class="delete red right"><span class="iconfa-remove red"></span> Удалить все</a>
                                <!-- Прогресс бар загрузки -->
                                <div id="loading" style="display: none;">
                                    <div id="loading-bar" class="progress progress-danger progress-striped active">
                                        <div class="loading-color bar"></div>
                                    </div>
                                    <div id="loading-content"></div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </form>
        </form>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn">Закрыть</button>
        <button class="btn btn-primary">Добавить</button>
    </div>
</div>

<script>
    jQuery(document).ready(function(){
        jQuery(".chzn-select").chosen();
        jQuery("#datetime").timepicker({
            minuteStep: 5,
            showMeridian: false
        });
        var $ = jQuery.noConflict();
        jQuery('#drop-files-open').click(function(){
            jQuery(this).hide();
            jQuery('#drop-files').fadeIn();
            jQuery('#drop-files-close').fadeIn();
            return false;
        });
        jQuery('#drop-files-close').click(function(){
            jQuery(this).hide();
            jQuery('#drop-files').fadeOut();
            jQuery('#drop-files-open').show();
            return false;
        });
        jQuery('#drop-files').click(function(){
           setTimeout(function(){jQuery('input#uploadbtn').click();}, 0);
        });
        if(jQuery('.tooltip-col').length > 0)
            jQuery('.tooltip-col').tooltip({selector: "a[rel=tooltip]"});

    });

</script>

<?php $template->get_footer(); ?>
