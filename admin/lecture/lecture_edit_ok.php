<?php
session_start();
$title = "공지사항 관리";
$menutitle = '게시판 관리'; 
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';


$mysqli->autocommit(FALSE);//커밋이 안되도록 지정
try{
  $pid = $_POST['pid'];
  $cate1 = $_POST['cate1'] ?? '';
  $cate2 = $_POST['cate2'] ?? '';
  $cate = $cate1 . $cate2 ;
  $price = $_POST['price']?? '';

  $title  = $_POST['title'];
  $content  = rawurldecode($_POST['content'])?? '';
 $thumbnail  = $_FILES['thumbnail'] ?? '';
 $url  = $_POST['url'] ?? '';
$status = $_POST['status'] ?? '';

  $userid = $_SESSION['AUID'];
  $dateString = $_POST['sale_start_date'];
  $dateString2 = $_POST['sale_end_date']; //2024-5-2
  $sale_start_date = date('Y-m-d', strtotime($dateString));
  $sale_end_date = date('Y-m-d', strtotime($dateString2));
  //파일 사이즈 검사
  if ($_FILES['thumbnail']['size'] > 10240000) {
    echo "<script>
      alert('10MB 이하만 업로드해주세요');
     history.back();
    </script>";
    exit;
  }
  //이미지 여부 검사
  // if (strpos($_FILES['thumbnail']['type'], 'image') === false) {
  //   echo "<script>
  //     alert('이미지만 업로드해주세요');

  //   </script>";
  //   exit;
  // }
  //파일 업로드
  $save_dir = $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/upload/';
  $fiename = $_FILES["thumbnail"]["name"]; //insta.jpg
  $ext = pathinfo($fiename, PATHINFO_EXTENSION); //jpg
  $newfilename = date("YmdHis") . substr(rand(), 0, 6); //202404111137.123123 -> 202404111137123123 
  $savefile = $newfilename . '.' . $ext;  //202404111137123123.jpg

  // if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $save_dir . $savefile)) {
  //   $thumbnail = "/clean_kangaroo/admin/upload/" . $savefile;
  // } else {
  //   echo "<script>
  //   alert('썸네일 등록에 실패했습니다. 관리자에게 문의해주세요');
  //   history.back();
  //   </script>";
  //   exit;
  // }


  // $sql = "INSERT INTO products (cate,title,content,price,sale_start_date,sale_end_date,reg_date,status,thumbnail,url) VALUES (
  //   '{$cate}',
  //   '{$title}',
  //   '{$content}',
  //   '{$price}',
  //   '{$sale_start_date}',
  //   '{$sale_end_date}',
  //   now(),
  //   '{$status}',
  //   '{$thumbnail}',
  //   '{$url}'
  // )";
  // echo $sql;
 //$result = $mysqli->query($sql);


//처리현황 업데이트
$UpdateSql = "UPDATE products SET
cate='{$cate}',
title='{$title}',
content='{$content}',
price='{$price}',
sale_start_date='{$sale_start_date}',
sale_end_date='{$sale_end_date}',
reg_date=now(),
status='{$status}',
url='{$url}'
WHERE pid={$pid}";
$result = $mysqli->query($UpdateSql);
$pid = $mysqli->insert_id;



  if ($result) { //상품 등록 하면


    $mysqli->commit();//디비에 커밋한다

    echo "<script>
    alert('강의 수정 완료');
   location.href = '/clean_kangaroo/admin/lecture/lecture_list.php';
     </script>";
    }
} catch (Exception $e) {

  $mysqli->rollback();

  echo "<script>
  alert('강의 수정 실패');
 history.back();
  </script>";
}
