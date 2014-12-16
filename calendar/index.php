<?php
require_once(__DIR__.'/../includes/load_all.php');
global $template;
$template->get_header();
$template->get_header('head-line');

$template->get_sidebar();
?>

<script type='text/javascript'>

    jQuery(document).ready(function() {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var calendar = jQuery('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                prev: '&laquo;',
                next: '&raquo;',
                prevYear: '&nbsp;&lt;&lt;&nbsp;',
                nextYear: '&nbsp;&gt;&gt;&nbsp;',
                today: 'сегодня',
                month: 'месяц',
                week: 'неделя',
                day: 'день'
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                var title = prompt('Заголовок события:');
                if (title) {
                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                    );
                }
                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [

            ],
            columnFormat: {
                week: 'ddd d'
            },
            height: 700,
            contentheight: 700
        });

    });

</script>
<div class="rightpanel">
    <div class="maincontent">
        <div class="maincontentinner">
            <div class="row-fluid">
                <div id="dashboard-left" class="span16">
                    <?php $template->get_header('head-allert'); ?>

                    <div id="calendar"></div>


                </div>
            </div>
        </div>
    </div>
</div>



<?php $template->get_footer(); ?>
