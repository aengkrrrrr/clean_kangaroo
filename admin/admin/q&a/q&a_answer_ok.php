<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];
$content = $_POST['content'];
$date = date("Y-m-d");

$sql = "INSERT INTO qna_reply (idx,content,date) values ('{$idx}','{$content}','{$date}')";

//처리현황 업데이트
$UpdateSql = "UPDATE qna_board SET status=1 WHERE idx = {$idx}";
$mysqli->query($UpdateSql);

if($mysqli->query($sql) === true){
  echo "<script>
      alert('답변 작성 완료');
      location.href='q&a_list.php';
      </script>";
} else{
  echo "Error:".$sql."<br>".$mysqli->error;
}
$mysqli->close();

