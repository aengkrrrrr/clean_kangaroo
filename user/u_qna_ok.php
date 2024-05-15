<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];
$name = $_POST['name'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d");

$sql = "INSERT INTO qna_board (idx, name, title, content, date) VALUES ('{$idx}','{$title}','{$content}',now())";

if($mysqli->query($sql) === true){
  echo "<script>
      alert('Q&A 작성 완료');
      location.href='u_qna_list.php';
      </script>";
} else{
  echo "Error:".$sql."<br>".$mysqli->error;
}
$mysqli->close();
