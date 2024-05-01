<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$number = $_GET['idx'];
$date = date('Y-m-d');

$sql = "INSERT INTO review_reply(idx, content) VALUES ('{$idx}','{$content}')";


  if ($rpl->query($sql) === TRUE) {
      echo "<script>
          alert('댓글이 작성되었습니다.');
          location.href='review_list.php';</script>";
  } else {
      echo "Error: ".$sql . "<br>" . $rpl->error;
  }

  $rpl->close();


  $script1 = '<script src="../../js/review.js"></script>';