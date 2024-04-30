<?php
$title = "강좌관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>
  <!----------- 헤더 -->
  <div class="answer_wrap">
    <div class="user_write">
      <ul>
        <div class="title df aic pb-5">
          <h4 class="h4">강좌명</h4>
          <div class="svg_wrap">
            <span class="body3b">조회수 : 160</span>
            <span class="body3b">YYYY-MM-DD</span>
            <div class="lectureSvg">
              <a href="lecture_edit.html"><img src="../../images/edit.svg" alt=""></a>
              <a href=""><img src="../../../images/delete.svg" alt=""></a>
            </div>
          </div>
        </div>
        <p class="form-label ca">카테고리 > 소분류</p>
      </ul>
      <ul>
        <div class="container">
          <div class="inner_container">
            <ul class="info">
              <li><img src="../../images/test_coupon.png" alt=""></li>
              <li>
                <p class="form-label price">가격 : 100,000 원</p>
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
            <ul class="content">
              <p class="body2">사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용사용자가 작성한 내용사용자가
                작성한
                내용사용자가 작성한 내용 사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한
                내용사용자가
                작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용</p>
            </ul>
          </div>
        </div>
      </ul>
      <div class="answer_btn_wrap df pt-5">
        <a href="lecture_list.html" class="primary_btn">목록</a>
      </div>
    </div>
  </div>
  </div>




</body>
<!-- 스크립트 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>

<!-------------------- 스크립트 -->

</html>