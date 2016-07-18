<?php 

$uri = str_replace("/index.php","",$_SERVER['REQUEST_URI']);
header("Location: http://".$_SERVER['SERVER_NAME'].$uri."/application/controller/website/homepage.php");
die();