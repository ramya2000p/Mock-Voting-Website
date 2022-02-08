<?php
session_start();

if(!isset($_SESSION['successName']))
{
    header("Location: notLoggedIn.html");
}
?>