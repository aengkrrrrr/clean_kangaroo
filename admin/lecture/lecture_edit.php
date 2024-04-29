<?php
$title = "강좌관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>

<body>
  <!-- 헤더 -->
  <header id="header">
    <div class="hd_container">
      <h1 class="logo"><a href="#" class="hidden">메인로고</a></h1>
      <nav>
        <ul class="gnb_wrap df">
          <li class="active"><a href="lecture_list.php" class="body1b">강좌 관리</a></li>
          <li><a href="notice_list.php" class="body1b">게시판 관리</a></li>
          <li><a href="" class="body1b">회원 관리</a></li>
          <li><a href="" class="body1b">쿠폰 관리</a></li>
          <li><a href="sales_manage.php" class="body1b">매출 관리</a></li>
        </ul>
      </nav>
      <button class="logout_btn primary_btn">로그아웃</button>
    </div>
    <!-- 메인 타이틀 -->
    <div class="common_main_tit">
      <div class="admin_wrap df aic">
        <a href="#" class="bell"><img src="../../images/bell_Vector.png" alt=""></a>
        <span class="kang"><img src="../../images/popup_kang_btn.png" alt=""></span>
        <span>깨끗한 아기 캥거루</span>
      </div>
      <h4 class="body1b">강좌관리</h4>
    </div>
    <!------------ 메인 타이틀 -->
  </header>
  <!----------- 헤더 -->
  <div class="lecture_up">
    <h3>강좌 수정</h3>
    <ul>
      <p class="form-label">카테고리</p>
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
          <input type="text" class="form-control" id="floatingInput_title" placeholder="강좌명" disabled>
          <label for="floatingInput_title" disabled>강좌명</label>
        </div>
      </li>
    </ul>
    <ul>
      <li>
        <div class="input-group c2form price">
          <div class="form-floating">
            <input type="text" class="form-control" aria-label="lecture_price" id= "lecture_price" placeholder="가격">
            <label for="floatingInputGroup1">가격</label>
          </div>
          <span class="input-group-text">원</span>
        </div>
      </li>
    </ul>
    <ul class="date_select">
      <li>
        <div class="form-floating">
        <div class="d-flex lDates">
          <input type="text" id="datepicker1" class="couponC">
        </div>
        </div>
      </li>
      <li>
        <select class="form-select" aria-label="대분류">
          <option selected>1개월</option>
          <option value="1">3개월</option>
          <option value="2">6개월</option>
          <option value="3">1년</option>
        </select>
      </li>
      <li class="view_status">
        <p class="status">상태&nbsp;&nbsp;</p>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            공개
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            일부공개(예약)
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            비공개
          </label>
        </div>
      </li>
    </ul>
    <ul>
      <li>
        <p class="period">수강기간 yyyy-mm-dd ~ yyyy-mm-dd </p>
      </li>
      <li>
        <div class="form-floating textarea">
          <textarea class="form-control" placeholder="강좌설명" id="floatingTextarea"></textarea>
          <label for="floatingTextarea" hidden>강좌설명</label>
        </div>
      </li>
      <li>
        <div class="mb-3">
          <label for="formFile" class="form-label">썸네일 이미지 업로드</label>
          <input class="form-control" type="file" id="formFile">
        </div>
      </li>
      <li class="image_preview">
        <div class="preview primary_btn">이미지 삭제</div>
      </li>
      <li>
        <div class="mb-3">
          <label for="formFile" class="form-label">강의 영상 업로드</label>
          <input class="form-control" type="file" id="formFile">
        </div>
      </li>
      <li>
        <div class="form-floating mb-3">
          <input type="url" class="form-control" id="floatingInput_url" placeholder="https://">
          <label for="floatingInput_url">URL</label>
        </div>
      </li>
      <li class="image_preview">
        <div class="preview primary_btn">영상 삭제</div>
      </li>
    </ul>
    <ul>
      <li class="w btn_collect">
        <a href="" class="primary_btn">수정 완료</a>
        <a href="lecture_list.php" class="basic_btn">목록</a>
      </li>
    </ul>
  </div>
  </div>




</body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<script>
  $( function() {
    $( "#datepicker1, #datepicker2" ).datepicker();
  } );
  </script>

<!-------------------- 스크립트 -->

</html>