<?php
session_start();
unset($_SESSION['user']);
header('Location: auth.php');
unset($_SESSION['admin']);
header('Location: auth.php');