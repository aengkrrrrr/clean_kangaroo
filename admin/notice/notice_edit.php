<?php
session_start();
$title = "공지사항 관리";
$menutitle = '게시판 관리'; 
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

//테이블조회
$idx = $_GET['idx'];
$sql = "SELECT * FROM notice_board WHERE idx={$idx}";
$result = $mysqli->query($sql);
$row = $result->fetch_object();

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