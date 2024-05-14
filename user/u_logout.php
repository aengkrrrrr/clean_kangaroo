<?php
session_start();
session_unset();
session_destroy();
$url = '/clean_kangaroo/user/index.php';
header("Location:$url");
die();