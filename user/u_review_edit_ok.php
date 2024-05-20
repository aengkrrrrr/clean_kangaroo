<?php
$title = '수강평';
$css1 =' <link rel="stylesheet" href="./css/u_review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];

$review_tit = $_POST['review_tit'];
$content = $_POST['content'];
// $star = intval($_POST['star']);

$sql = "UPDATE review_board SET 
  review_tit='{$review_tit}',
  content='{$content}'

  WHERE idx = {$idx}";
//reply테이블에서 rno(댓글번호)에 해당하는 글 중 title, content, star를 수정

$mysqli->query($sql);


  if($mysqli->query($sql) === TRUE){
    echo "<script>
        alert('수정 완료');
        location.replace('mypage_review.php');
        </script>";
  }
