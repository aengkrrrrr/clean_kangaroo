<?php
session_start();
session_unset();
session_destroy();
$url = '/cleang_kangaroo/admin/php/login.php';
header("Location:$url");
die();