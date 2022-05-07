<?php session_start(); ?>

<?php
if (!isset($_SESSION['login']) && ($_SESSION['login'] !== true)) {
    header("Location: login.php");
    exit;
}
?>


<?php

if (isset($_GET['logout'])) {
    $_SESSION['login'] = null;
    header("Location: login.php");
    exit;
}
