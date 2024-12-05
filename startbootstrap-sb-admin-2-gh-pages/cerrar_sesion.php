<?php
session_start();
$_SESSION = array();
session_destroy();
header('Location: index_todos.php');
exit;
?>