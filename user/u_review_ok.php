<?php
$title = '수강평';
$css1 =' <link rel="stylesheet" href="./css/u_review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

$pid = intval($_POST['pid']);
$userid = $_SESSION['UID'];
$title = $_POST['title'];
$content = $_POST['content'];

// $star = intval($_POST['star']);


  $sql = "INSERT INTO review_board (pid,userid,review_tit,content,date) VALUES (
    '{$pid}',
    '{$userid}', 
    '{$title}', 
    '{$content}',
    now()
    )";


    if($mysqli->query($sql) === TRUE){
        echo "<script>
        alert('리뷰쓰기 성공');
        location.href = '/clean_kangaroo/user/u_review_list.php';
        </script>";
    } else{
      echo "<script>
      alert('리뷰쓰기 실패');
      history.back();
      </script>";
  }