<?php
session_start();
session_unset();
session_destroy();
header("Location: ../login-signup/login.php");
exit();
?>