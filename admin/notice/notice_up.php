<?php
$title = "공지사항 관리";
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>
  <!----------- 헤더 -->
  <body>
<div class="notice_container">
  <h3>공지사항 등록</h3>
    <ul>
    <p>카테고리</p> 
    <li class="category">
    <select class="form-select" aria-label="대분류">
      <option selected>대분류</option>
      <option value="1">강좌관리</option>
      <option value="2">게시판 관리</option>
      <option value="3">회원관리</option>
      <option value="3">쿠폰관리</option>
      <option value="3">매출관리</option>
    </select>  

    <select class="form-select" aria-label="중분류">
      <option selected>중분류</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </li>
</ul>
<ul>
  <li>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput_title" placeholder="제목">
      <label for="floatingInput_title">제목</label>
    </div>
  </li>
  <li>
      <div class="form-floating textarea">
        <textarea class="form-control" placeholder="공지 설명" id="floatingTextarea"></textarea>
        <label for="floatingTextarea" hidden>공지 설명</label>
      </div>   
  </li>
</ul>
<ul>
  <li><div class="mb-3">
    <label for="formFile" class="form-label">이미지 업로드</label>
    <input class="form-control" type="file" id="formFile">
  </div></li>
</ul>
<ul>
  <li class="btn_collect">
    <a href="" class="primary_btn">등록 완료</a>
    <a href="" class="basic_btn">목록</a>
  </li>
</ul>
</div>

</body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>

<!-------------------- 스크립트 -->
</html>