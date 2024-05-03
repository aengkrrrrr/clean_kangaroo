<?php
session_start();
$title = "공지사항 관리";
$menutitle = '게시판 관리'; 
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

//처리현황 업데이트
// $UpdateSql = "UPDATE notice_board SET title='{$title}', contents='{$contents}', image='{$image}' WHERE idx={$idx}";
// $mysqli->query($UpdateSql);


//테이블조회
$pid = $_POST['pid'];
$sql = "SELECT * FROM products WHERE pid={$pid}";
$result = $mysqli->query($sql);
$row = $result->fetch_object();

//처리현황 업데이트
// $UpdateSql = "UPDATE products SET title='{$title}', content='{$content}', url='{$url}', thumbnail='{$thumbnail}', status='{$status}', WHERE idx={$idx}";
// $mysqli->query($UpdateSql);

$mysqli->autocommit(FALSE);//커밋이 안되도록 지정
try{
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

  $dateString = $_POST['datepicker1'];
  $dateString2 = $_POST['datepicker2']; //2024-5-2
  $converTedDate = date('Y-m-d', strtotime($dateString));
  $converTedDate2 = date('Y-m-d', strtotime($dateString2));


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
  $sql = "INSERT INTO products (cate,title,content,price,sale_start_date,sale_end_date,reg_date,status,thumbnail,url) VALUES (
    '{$cate}',
    '{$title}',
    '{$content}',
    '{$price}',
    '{$converTedDate}',
    '{$converTedDate2}',
    now(),
    '{$status}',
    '{$thumbnail}',
    '{$url}'
  )";
  $result = $mysqli->query($sql);
  $pid = $mysqli->insert_id;

 


  if ($result) { 

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
  //history.back();
  </script>";
}
?>

<body>
<div class="notice_container">
  <h3>공지사항 수정</h3>
<form action="notice_edit_ok.php" method="POST">
  <input type="hidden" name="idx" value="<?=$idx?>">
  <ul>
    <li>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="title" id="floatingInput_title" placeholder="<?=$row->title?>" value="<?=$row->title?>">
        <label for="floatingInput_title">제목</label>
      </div>
    </li>
    <li>
        <div class="form-floating textarea">
          <textarea class="form-control" name="contents" id="floatingTextarea"><?=$row ->contents;?></textarea>
          <label for="floatingInput_title">공지 설명</label>
        </div>   
    </li>
  </ul>
  <ul>
  <li><div class="mb-3">
    <label for="formFile" class="form-label">이미지 업로드</label>
    <input class="form-control" type="file" id="formFile" name="image" value="<?=$row->image;?>">
  </div><span class="file_route"><?=$row->image?></span></li>
</ul>
  <ul>
    <li class="btn_collect">
      <button class="primary_btn">수정 완료</button>
      <a href="notice_list.php" class="basic_btn">닫기</a>
    </li>
  </ul>
</form>
</div>


<!-- 스크립트 -->
<script>
  //header 메뉴 액티브
  document.addEventListener('DOMContentLoaded',function(){
  const title = "<?php if(isset($menutitle)){ echo $menutitle;} else{echo $title;}  ?>";


  console.log(title);
  const headerMenu = document.querySelectorAll('#header .gnb_wrap li');
  for(let menu of headerMenu){
    menu.classList.remove('active');
    if(menu.innerText === title){
      menu.classList.add('active');
    }
  }
});

</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<!-------------------- 스크립트 -->
</html>