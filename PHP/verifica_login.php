<?php
session_start();
if (!$_SESSION['usuario']) {
    header('Location: indexphp.php');
    exit();
}
