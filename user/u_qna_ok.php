<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$name = $_POST['userid'];
$title = $_POST['title'];
$content = $_POST['content'];

$sql = "INSERT INTO qna_board (userid, title, content, date) VALUES ('{$name}','{$title}','{$content}',now())";

if ($mysqli->query($sql) === true) {
  echo "<script>
      alert('Q&A 작성 완료');
      location.href='u_qna_list.php';
      </script>";
} else {
  echo "Error:" . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
