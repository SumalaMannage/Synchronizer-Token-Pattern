<!--
/**
* Registration No:IT17069564
 * Name: M.S.D.S Mannage
 * Date: 17/05/2019
 */
 -->
<?php

session_start();
session_unset();
session_destroy();
unset($_COOKIE['session_cookie']);
setcookie('PHPSESSID', '', time() - 3600, '/');
setcookie('session_cookie', '', time() - 3600, '/');

header("Location:index.php");
exit;

?>