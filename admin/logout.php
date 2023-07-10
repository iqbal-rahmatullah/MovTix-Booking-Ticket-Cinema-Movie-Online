<?php
setcookie("id_admin", "", time() - 3600);
setcookie("username_admin", "", time() - 3600);

session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
