<?php
$title = 'Q&A 관리';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>

<div class="answer_wrap">
  <div class="user_write">
      <div class="profile df aic pb-5">
        <img src="../../images/favicon.png" alt="프로필 이미지" class="user_profile_img">
        <h5 class="body3b">사용자이름</h5>
      </div>
      <div class="title df aic pb-5">
        <h4 class="h4">제목입니다.</h4>
        <span class="body3b">YYYY-MM-DD</span>
      </div>
      <div class="content">
        <p class="body2">사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용 사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용</p>
      </div>
  </div>
  <div class="admin_answer">
    <h4 class="body2b mb-3">관리자</h4>
    <div class="content">
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Comments</label>
      </div>
    </div>
    <div class="answer_btn_wrap df pt-5">
      <a href="" class="primary_btn">등록</a>
      <a href="" class="basic_btn">취소</a>
    </div>
  </div>
</div>

</body>


<!-- 스크립트 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> 
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-ko-KR.min.js"></script>
<script src="/js/common.js"></script>


<!-------------------- 스크립트 -->
</html>