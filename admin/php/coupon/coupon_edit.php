<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/php/header.php';
?>

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
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/php/footer.php';
?>