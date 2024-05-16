<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];
$title = $_POST['title'];
$content = $_POST['content'];
//처리현황 업데이트
$UpdateSql = "UPDATE qna_board SET
title='{$title}',
content='{$content}',
date=now()
WHERE idx={$idx}";
echo $UpdateSql;
$mysqli->query($UpdateSql);
if ($mysqli->query($UpdateSql) === true) {
  echo "<script>
      alert('Q&A 수정 완료');
      location.href='u_qna_list.php';
      </script>";
} else {
  echo "Error:" . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
