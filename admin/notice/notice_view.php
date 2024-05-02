<?php
session_start();
$title = "공지사항 관리";
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
$sql = "SELECT * FROM product_category where step = 1";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
  $cate1[] = $row;
}
?>
  <!----------- 헤더 -->
  <div class="answer_wrap">
    <div class="user_write">
      <ul>
        <li>
          <p class="form-label"><?=$ra->cate;?>카테고리 > 소분류</p>          
          <div class="title df aic pb-5">

          <h4 class="h4">공지사항 제목</h4>
          <div class="svg_wrap">
            <span class="body3b">조회수 : <?=$ra->hit;?></span>
            <span class="body3b"><?=$ra->date;?></span>
            <div class="lectureSvg">
              <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
              <a href=""><img src="/admin/images/delete.svg" alt=""></a>
            </div>
          </div> 
          </div>  
           </li>
          </ul>
      <ul>
        <div class="container">
          <div class="inner_container">
            <ul class="info">
              <li><img src="/admin/images/test_coupon.png" alt="" class="image_preview"></li>
<li class="content">
              <p class="body2">
              <?=$ra->contents;?>사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용사용자가 작성한 내용사용자가
                작성한
                내용사용자가 작성한 내용 사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한
                내용사용자가
                작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용</p>
            </li>
              </ul>
          </div>
        </div>
      </ul>
      <div class="answer_btn_wrap df pt-5">
        <a href="notice_list.html" class="primary_btn">목록</a>
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