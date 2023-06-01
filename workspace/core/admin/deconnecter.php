<?php session_start(); ob_start();
$_SESSION['admin'] = NULL;
session_destroy();
header("location: ../../../index.html");