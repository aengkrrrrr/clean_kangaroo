<?php
session_start();
session_unset();
session_destroy();
$url = '/clean_kangaroo/admin/login.php';
header("Location:$url");
die();