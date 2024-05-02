<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];
$title = $_POST['title'] ?? '';
$contents = $_POST['contents'] ?? '';

//처리현황 업데이트
$UpdateSql = "UPDATE notice_board SET title='{$title}', contents='{$contents}' WHERE idx={$idx}";
$mysqli->query($UpdateSql);

if($mysqli->query($UpdateSql) === true){
  echo "<script>
      alert('공지사항 수정 완료');
      location.href='notice_list.php';
      </script>";
} else{
  echo "Error:".$sql."<br>".$mysqli->error;
}
$mysqli->close();

