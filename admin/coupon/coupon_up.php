<?php
session_start();
$title = "쿠폰 등록";
$css1 = '<link rel="stylesheet" href="../../css/coupon.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>




<body>
  <div class="container grid">
    <form class="coupon_wrap">
      <div class="coupon_1 d-flex">
        <div class="couponimg">
          <input type="file" multiple name="upfile[]" id="upfile" class="d-none">
          <div id="addedimages" class="gap-3 p-3">
            <!--    
                <div class="card" style="width: 10rem;" id="f_01">
                  <img src="..." class="img-fluid" alt="...">
                  <button type="button" class="btn btn-danger btn-sm">삭제</button>
                </div>
                -->
          </div>
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
      <button class="primary_btn couponbtn">등록</button>
      <button class="basic_btn couponbtn">취소</button>
    </form>          
  </div>
</body>


<script>
  $(document).ready(function() {
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
      
        function file_delete(imgid) {
      if (!confirm('정말 삭제할까요?')) {
        return false;
      }
      let data = {
        imgid: imgid
      }
      $.ajax({
        async: false, //결과가 있으면 반영해줘
        type: 'POST',
        url: 'image_delete.php',
        data: data,
        dataType: 'json',
        error: function(error) {
          console.log('error:', error);
        },
        success: function(return_data) {
          if (return_data.result === 'member') {
            alert('권한이 없습니다.');
            return;
          } else if (return_data.result === 'mine') {
            alert('본인이 등록한 이미지만 삭제할 수 있습니다.');
            return;
          } else if (return_data.result === 'fail') {
            alert('삭제 실패!');
            return;
          } else {
            $('#' + imgid).remove();
          }
        }
      });
    }
    // 날짜 등록
    $( function() {
        $( "#datepicker1, #datepicker2" ).datepicker();
      } );

  });
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<script src="../../js/dashboard.js"></script>

<!-------------------- 스크립트 -->
</html>