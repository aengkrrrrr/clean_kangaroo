<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];
$title = $_POST['title'];
$content = $_POST['contents'];
$date = date("Y-m-d");
$image  = $_FILES['image'];
$hit = $_POST['hit'];


  //파일 사이즈 검사
  if ($_FILES['image']['size'] > 10240000) {
    echo "<script>
      alert('10MB 이하만 업로드해주세요');
     history.back();
    </script>";
    exit;
  }
  //이미지 여부 검사
  if (strpos($_FILES['image']['type'], 'image') === false) {
    echo "<script>
      alert('이미지만 업로드해주세요');

    </script>";
    exit;
  }
  //파일 업로드
  $save_dir = $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/upload/';
  $fiename = $_FILES["image"]["name"]; //insta.jpg
  $ext = pathinfo($fiename, PATHINFO_EXTENSION); //jpg
  $newfilename = date("YmdHis") . substr(rand(), 0, 6); //202404111137.123123 -> 202404111137123123 
  $savefile = $newfilename . '.' . $ext;  //202404111137123123.jpg
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $save_dir . $savefile)) {
    $image = "/clean_kangaroo/admin/upload/" . $savefile  ;};

  $sql = "INSERT INTO notice_board (idx, title, contents, image, date, hit) VALUES ('{$idx}','{$title}','{$content}','{$image}','{$date}','{$hit}')";
  $result = $mysqli->query($sql);
  $pid = $mysqli->insert_id;
  

// if ($mysqli->query($sql) === TRUE) {
    if ($result) { 
    $mysqli->commit();
    echo "<script>
        alert('공지사항이 작성되었습니다.');
        location.href='notice_list.php';</script>";
} else {
    echo "Error: ".$sql . "<br>" . $rpl->error;
}

$mysqli->close();

