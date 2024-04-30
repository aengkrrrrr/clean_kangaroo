<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$username = $_POST['username'];
$title = $_POST['title'];
$qna_msg = $_POST['message'];

$sql = "SELECT * FROM qna_board where userid='{$userid}' and passwd = '{$passwd}'";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();

// $rs -> idx

if($result ){
  echo "<script>
  alert('질문 등록 완료');
  location.href = '/clean_kangaroo/admin/q&a/q&a_list.php';
  </script>";
} else{
  echo "<script>
  alert('질문 등록 실패');
  history.back();
  </script>";
}