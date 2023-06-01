<?php session_start(); ob_start();
$_SESSION['client'] = NULL;
session_destroy();
header("location: ../../../index.html");