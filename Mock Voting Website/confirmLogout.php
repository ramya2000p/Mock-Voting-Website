<?php
session_start();
unset($_SESSION['successName']);
session_destroy();
header("Location: index.html");

?>