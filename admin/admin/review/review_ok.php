<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];
$content = $_POST['content'];

$sql = "INSERT INTO review_reply (b_idx, content) VALUES ('{$idx}','{$content}')";


if ($mysqli->query($sql) === TRUE) {
    echo "<script>
        alert('댓글이 작성되었습니다.');
        location.href='review_list.php';</script>";
} else {
    echo "Error: ".$sql . "<br>" . $rpl->error;
}

$mysqli->close();