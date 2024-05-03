<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$date = date("Y-m-d");

$sql = "INSERT INTO notice_board (idx, title, contents, date) VALUES ('{$idx}','{$title}','{$contents}',now())";

if($mysqli->query($sql) === true){
  echo "<script>
      alert('공지사항 작성 완료');
      location.href='notice_list.php';
      </script>";
} else{
  echo "Error:".$sql."<br>".$mysqli->error;
}
$mysqli->close();

