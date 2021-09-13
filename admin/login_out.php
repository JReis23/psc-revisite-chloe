<?php
require_once("../inc/init.php");

session_destroy();
header("location:../accueil.php");
exit;

?>