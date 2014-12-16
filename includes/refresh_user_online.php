<?php
require_once('load_all.php');
$user_class = new users();
$user_class->refresh_user($_POST['user_id']);
$result = $user_class->refreshNewOnlineUsers();
if(!empty($result) && count($result) > 0){
foreach($result as $item) {
    if(!empty($item->last_name))
        $name = $item->name.' '.$item->last_name;
    else
        $name = $item->name;
?>
<script>
    jQuery.jGrowl("<?php echo $name; ?> теперь в сети", {life: 7000});
</script>
<?php } } ?>