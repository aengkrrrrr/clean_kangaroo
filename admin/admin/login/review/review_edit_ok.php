<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];//댓글번호
$content = $_POST['content']; //게시글 번호

$sql3 = "UPDATE review_reply SET content='".$_POST['content']."' where idx = '".$idx."'";
//reply테이블에서 rno(댓글번호)에 해당하는 글 중 content를 수정
$result3 = $conn->query($sql3);




  if($mysqli->query($sql)){
    echo "<script>
        alert('댓글수정 완료');
        location.replace('review_list.php');
        </script>";
  }



  $script1 = '<script src="../../js/review.js"></script>';