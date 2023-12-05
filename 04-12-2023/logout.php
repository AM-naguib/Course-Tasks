<?php
session_start();
unset($_SESSION["login_data"]);
header("location:login.php");
die;