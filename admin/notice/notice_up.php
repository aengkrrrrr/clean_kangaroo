<?php
session_start();
$title = "공지사항 관리";
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
// $sql = "SELECT * FROM notice_board where 1 = 1";
// $result = $mysqli->query($sql);
// $row = $result->fetch_object();



?>


  <!----------- 헤더 -->
<body>
<div class="notice_container">
  <h3>공지사항 등록</h3>
  <form action="notice_ok.php" method="POST" enctype="multipart/form-data" id="product_save">
    <input type="hidden" name="product_image" id="product_image_id">
    <input type="hidden" name="content" id="content">
<ul>
  <li>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput_title" placeholder="제목" name="title">
      <label for="floatingInput_title">제목</label>
    </div>
  </li>
  <li>
      <div class="form-floating textarea">
        <textarea class="form-control" placeholder="공지 설명" id="floatingTextarea" name="contents"></textarea>
        <label for="floatingTextarea" hidden>공지 설명</label>
      </div>   
  </li>
</ul>
<ul>
  <li><div class="mb-3">
    <label for="formFile" class="form-label">이미지 업로드</label>
    <input class="form-control" type="file" id="formFile" name="image">
  </div></li>
</ul>
<ul>
  <li class="btn_collect">
    <button class="primary_btn">등록 완료</button>
    <a href ="javascript:history.back();" class="basic_btn">닫기</a>
  </li>
</ul>
</div>

</body>
<!-- 스크립트 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="/clean_kangaroo/js/makeoption.js"></script>

</html>