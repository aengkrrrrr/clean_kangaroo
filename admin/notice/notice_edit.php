<?php
session_start();
$title = "공지사항 관리";
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>

<body>
<div class="notice_container">
  <h3>공지사항 수정</h3>
  <ul>
      <p class="form-label">카테고리</p>
      <li class="category">
      <select class="form-select" aria-label="대분류" id="cate1">
        <option selected>대분류</option>
        <?php
        foreach ($cate1 as $c1) {
        ?>

          <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>

        <?php
        }
        ?>

      </select>
      <select class="form-select" aria-label="중분류" id="cate2">

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
    <div class="primary_btn">수정 완료</div>
    <div class="basic_btn">닫기</div>
  </li>
</ul>
</div>

</body>
<!-- 스크립트 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<!-------------------- 스크립트 -->
</html>