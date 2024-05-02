<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];
$title = $_POST['title'];
$content = $_POST['contents'];
$date = $_POST['date'];
$hit = $_POST['hit'];

$sql = "INSERT INTO notice_board (idx, title, contents, date, hit) VALUES ('{$idx}','{$title}','{$content}','{$date}','{$hit}')";


if ($mysqli->query($sql) === TRUE) {
    echo "<script>
        alert('댓글이 작성되었습니다.');
        location.href='notice_list.php';</script>";
} else {
    echo "Error: ".$sql . "<br>" . $rpl->error;
}

$mysqli->close();

