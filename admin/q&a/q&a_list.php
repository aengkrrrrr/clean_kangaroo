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
  
  <title>큐앤에이 | 딥러닝 캥거루</title>
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
  <div class="board_container grid">
    <form action="" id="">
      <div class="board_category df">
        <div class="select_wrap">
          <select class="form-select" aria-label="" id="" name="">
            <option selected>Q&A 관리</option>
            <option>공지사항 관리</option>
            <option>수강평 관리</option>
          </select>
        </div>
        <div class="search_wrap df">
          <input class="form-control search" type="text" id="search_keyword" name="keyword">
          <button class="primary_btn">검색</button>
        </div>
      </div>
    </form>
  
    <form action="">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">처리현황</th>
            <th scope="col">제목</th>
            <th scope="col">일자</th>
            <th scope="col">조회수</th>
            <th scope="col">이름</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <td>답변대기</td>
          <td>쿠폰 사용 문의드립니다.</td>
          <td>2024-04-23</td>
          <td>10</td>
          <td>츄츄림</td>
        </tr>
        </tbody>
      </table>
    </form>
    <!--공통 pagination-->
    <div class="nav_wrap df aic">
        <nav aria-label="">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link">&laquo;</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">&raquo;</a>
            </li>
          </ul>
        </nav>
      <!------------- 공통 pagination-->
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