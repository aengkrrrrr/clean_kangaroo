<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>

<body>
<form action="" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">유저이름</label>
    <input type="text" class="form-control" id="username">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">제목</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="mb-3">
    <label for="qna_msg" class="form-label">질문등록</label>
    <textarea class="form-control" id="qna_msg" rows="3"></textarea>
  </div>
</form>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>