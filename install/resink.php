<?php
$link = mysqli_connect("localhost", "u235829330_imp4ct_user", "@Imp4ct.xyz");
$database = mysqli_select_db($link, "u235829330_imp4ct_db");

$user = $_GET['username'];
$tables = "xf_user";

$sql = "SELECT * FROM ". $tables ." WHERE username = '". mysqli_real_escape_string($link,$user) ."'" ;
$result = $link->query($sql);

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

        $sql = "UPDATE ". $tables ." SET hwid=null WHERE username='$user'";
        if(mysqli_query($link, $sql))
        {
            echo 'reset';
        }
        else
        {
            echo 'error';
        }
    }
}  
?>
