<?php
session_start();
session_destroy();
// header("Location: index.php");
$uri = str_replace("logout.php","homepage.php",$_SERVER['REQUEST_URI']);
 header('Location: '.$uri);
?>