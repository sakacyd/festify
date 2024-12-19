<?php
include 'session-start.php';
session_destroy();
header("Location: login.php");
exit();
?>
