<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

if (isset($_POST['userid'])) {
  $userid = $_POST['userid'];
  $sql = "SELECT count(*) AS cnt FROM members WHERE userid='{$userid}'";
  $result = $mysqli->query($sql);

  if ($result) {
    $rc = $result->fetch_object();
    $data = array('cnt' => $rc->cnt);
    echo json_encode($data);
  } else {
    echo json_encode(array('cnt' => 0)); // 에러 처리를 위한 기본값 반환
  }

} else {
  // 오류 처리
  echo json_encode(array('cnt' => 0));
}



?>