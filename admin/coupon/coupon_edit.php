<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/gh/sun-typeface/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="/clean_kangaroo/css/common.css">

    <!-- datepicker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <link rel="stylesheet" href="../../css/common.css">
  <link rel="stylesheet" href="../../css/coupon.css">

  <title>쿠폰관리 | Deep Learning Kangaroo</title>
</head>

<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>

<body>
  <div class="container grid">
    <form class="coupon_wrap">
      <div class="coupon_1 d-flex">
        <div class="couponimg">
          <div id="addedimages" class="gap-3 p-3"></div>
          <input type="file" multiple name="upfile[]" id="upfile" class="d-none">
          <button type="button" class="btn btn-secondary btn-sm" id="addImage">이미지 첨부하기</button>
        </div>
        <div class="coupon_area">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">쿠폰명</label>
          </div>
          <div class="form-floating">
            <p>쿠폰 적용 기간</p>
            <div class="d-flex cDates">
              <input type="text" id="datepicker1" class="couponC">
              <input type="text" id="datepicker2" class="couponC">
            </div>
          </div>
        </div>
      </div>
      <div class="coupon_2 d-flex">
        <div class="form-floating">
          <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected>사용중</option>
            <option value="1">보류중</option>
          </select>
          <label for="floatingSelect">종류</label>
        </div>
        <div class="input-group c2form">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputGroup1" aria-label="coupon service" placeholder="쿠폰 혜택">
            <label for="floatingInputGroup1">쿠폰 혜택</label>
          </div>
          <span class="input-group-text">%</span>
        </div>
        <div class="input-group c2form">
          <div class="form-floating">
            <input type="text" class="form-control" aria-label="coupon sale" placeholder="쿠폰 사용조건">
            <label for="floatingInputGroup1">쿠폰 사용조건</label>
          </div>
          <span class="input-group-text">원</span>
        </div>
      </div>
      <button class="primary_btn couponbtn">수정</button>
      <button class="basic_btn couponbtn">취소</button>
    </form>          
  </div>
</body>

<script>
  //추가 이미지 등록
  $('#addImage').click(function() {
      $('#upfile').trigger('click');
    });
    $('#upfile').change(function() {
      let files = $(this).prop('files');
      console.log(files);
      for (let i = 0; i < files.length; i++) {
        attachFile(files[i]);
      }
      $('#upfile').val('');
    });

  $('#addedimages').on('click', 'button', function() {
      let imgid = $(this).parent().attr('id');
      file_delete(imgid);
    });
    
// 날짜 등록
$( function() {
    $( "#datepicker1, #datepicker2" ).datepicker();
  } );
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<script src="../../js/dashboard.js"></script>

<!-------------------- 스크립트 -->
</html>