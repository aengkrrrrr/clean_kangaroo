<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/gh/sun-typeface/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="/css/common.css">
  <link rel="stylesheet" href="/admin/css/qna.css">
  <!-- summernote -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  
  <title>큐앤에이 답변등록 | 딥러닝 캥거루</title>
</head>
<body>
  <header id="header">
    <div class="hd_container">
      <h1 class="logo"><a href="#" class="hidden">메인로고</a></h1>
      <nav>
        <ul class="gnb_wrap df">
          <li><a href="" class="body1b">강좌 관리</a></li>
          <li class="active"><a href="" class="body1b">게시판 관리</a></li>
          <li><a href="" class="body1b">회원 관리</a></li>
          <li><a href="" class="body1b">쿠폰 관리</a></li>
          <li><a href="" class="body1b">매출 관리</a></li>
        </ul>
      </nav>
      <button class="logout_btn primary_btn">로그아웃</button>
    </div>
    <!-- 메인 타이틀 -->
    <div class="common_main_tit">
      <div class="admin_wrap df aic">
        <a href="#" class="bell">
          <img src="/admin/images/bell_Vector.png" alt="">
          <span class="qna_quantity">5</span>
        </a>
        <span class="kang"><img src="/admin/images/popup_kang_btn.png" alt=""></span>
        <span>깨끗한 아기 캥거루</span>
      </div>
      <h4 class="body1b">Q&A 관리</h4>
    </div>
    <!------------ 메인 타이틀 -->
  </header>
<div class="answer_wrap">
  <div class="user_write">
      <div class="profile df aic pb-5">
        <img src="images/favicon.png" alt="프로필 이미지" class="user_profile_img">
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