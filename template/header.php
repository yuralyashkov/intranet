<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Административная панель сайта - WD engine</title>
    <link rel="stylesheet" href="/css/style.default.css" type="text/css" />
    <link rel="stylesheet" href="/css/style.navyblue.css" type="text/css" />
    <link rel="stylesheet" href="/css/responsive-tables.css">
    <link rel="stylesheet" href="/css/bootstrap-timepicker.min.css">
    <script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>

    <script type="text/javascript" src="/js/drop-files.js"></script>
    <script type="text/javascript" src="/js/jquery-migrate-1.1.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-1.9.2.min.js"></script>
    <script type="text/javascript" src="/prettify/prettify.js"></script>
    <script type="text/javascript" src="/js/modernizr.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/js/fullcalendar.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.js"></script>

    <script type="text/javascript" src="/js/ui.spinner.min.js"></script>
    <script type="text/javascript" src="/js/jquery.jgrowl.js"></script>
    <script type="text/javascript" src="/js/jquery.alerts.js"></script>
    <script type="text/javascript" src="/js/jquery.uniform.min.js"></script>

    <script type="text/javascript" src="/js/flot/jquery.flot.min.js"></script>
    <script type="text/javascript" src="/js/flot/jquery.flot.resize.min.js"></script>

    <script type="text/javascript" src="/js/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" src="/js/responsive-tables.js"></script>
    <script type="text/javascript" src="/js/custom.js"></script>

    <script type="text/javascript" src="/js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.slimscroll.js"></script>

    <script type="text/javascript" src="/js/jquery.tagsinput.min.js"></script>

    <script type="text/javascript" src="/js/charCount.js"></script>
    <script type="text/javascript" src="/js/forms.js"></script>


    <script type="text/javascript" src="/js/elements.js"></script>
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="/js/tinymce/jquery.tinymce.js"></script>
    <script type="text/javascript" src="/js/wysiwyg.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/js/excanvas.min.js"></script><![endif]-->
    <script>
        jQuery(document).ready(function(){
            function refreshUser(){
                jQuery.ajax({
                    type: 'POST',
                    url: '/includes/refresh_user_online.php',
                    data: 'user_id=<?php echo $_SESSION['user-id']; ?>',
                    success: function(data){
                        jQuery('body').append(data);
                    }
                });
                setTimeout(refreshUser, 10000);
            }
            refreshUser();

        });
    </script>
</head>

