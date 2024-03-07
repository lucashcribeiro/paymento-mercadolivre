<?php
$link = mysqli_connect("localhost", "u235829330_imp4ct_user", "@Imp4ct.xyz");
$database = mysqli_select_db($link, "u235829330_imp4ct_db");

$user = $_GET['user_id'];
$storedtoken = '1337';
//$hwid = mysqli_real_escape_string($link, $_GET['end_date']);
//$tables = "xf_user";
$tables = "xf_user_upgrade_active";

$sql = "SELECT * FROM ". $tables ." WHERE user_id = '". mysqli_real_escape_string($link,$user) ."'" ;
$result = $link->query($sql);

$dir = __DIR__;
require($dir . '/src/XF.php');
XF::start($dir);

if ($result->num_rows > 0) {
    // Outputting the rows
    while($row = $result->fetch_assoc())
    {
        function Redirect($url, $permanent = false)
        {
            if (headers_sent() === false)
            {
                header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
            }
        exit();
        }
		
		echo \XF::language()->date($row['end_date'], 'd-m-Y');
        /*if (strlen($row['hwid']) > 1)
        {
            if ($hwid != $row['hwid'])
            {
                echo 'declined';
            }
            else
            {
                echo 'accepted';
            }
        }
        else
        {
            $sql = "UPDATE ". $tables ." SET hwid='$hwid' WHERE username='$user'";
            if(mysqli_query($link, $sql))
            {
                echo 'new';
            }
            else
            {
                echo 'error';
            }
        }*/
    }
}  
?>
