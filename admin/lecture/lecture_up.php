<?php
session_start();
$title = "강좌관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
$sql = "SELECT * FROM product_category where step = 1";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
  $cate1[] = $row;
}
$dateString = $_POST['sale_start_date'];
$dateString2 = $_POST['sale_end_date']; //2024-5-2
$converTedDate = date('Y-m-d', strtotime($dateString, $dateString2))


?>
  <!----------- 헤더 -->
  <body>
  <div class="lecture_up">
    <h3>강좌 등록</h3>
    <form action="lecture_ok.php" method="POST" enctype="multipart/form-data" id="product_save">
    <input type="hidden" name="product_image" id="product_image_id">
    <input type="hidden" name="content" id="content">
    <ul>
      <p class="form-label">카테고리</p>
      <li class="category">
      <select class="form-select" aria-label="대분류" id="cate1">
        <option selected>대분류</option>
        <?php
        foreach ($cate1 as $c1) {
        ?>

          <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>

        <?php
        }
        ?>

      </select>
      <select class="form-select" aria-label="중분류" id="cate2">

      </select>
      </li>
    </ul>
    <ul>
      <li>
        <div class="form-floating mb-3">
          <input type="text" name="title" class="form-control" id="floatingInput_title" placeholder="강좌명">
          <label for="floatingInput_title">강좌명</label>
        </div>
      </li>
    </ul>
    <ul>
      <li>
        <div class="input-group c2form price">
          <div class="form-floating">
            <input type="text" name="price" class="form-control" aria-label="lecture_price" id= "lecture_price" placeholder="가격">
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
          <input type="text" id="datepicker1" class="couponC" name="sale_start_date">
          <input type="text" id="datepicker2" class="couponC" name="sale_end_date">
        </div>
        </div>
      </li>
<!-- 
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
      </li> -->
      
    </ul>
    <ul>
      <li>
        <p class="period">수강기간 <?=($dateString)?> ~ <?=($dateString1)?>  </p>
      </li>
      <li>
        <div class="form-floating textarea">
          <textarea class="form-control" placeholder="강좌설명" id="floatingTextarea" name="content"></textarea>
          <label for="floatingTextarea" hidden>강좌설명</label>
        </div>
      </li>
      <li>
        <div class="mb-3">
        <input type="file" multiple name="thumbnail" id="thumbnail" class="d-none">
            <div>
              <button type="button" class="btn primary_btn btn-sm" id="addImage">이미지 업로드</button>
            </div>
            </div>
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
    </ul>
    <ul>
      <li class="w btn_collect">
        <button type="submit" class="primary_btn">등록 완료</button>
        <a href ="javascript:history.back();" class="basic_btn">목록</a>
      </li>
    </ul>
    </form>
  </div>
  </div>




</body>
<!-- 스크립트 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="/clean_kangaroo/js/makeoption.js"></script>
<script>
    $(document).ready(function() {
     $('#product_save').on('submit', save);
    $( "#datepicker1" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
    $( "#datepicker2" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );

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
   //   $('#upfile').val('');
    });

   //추가 영상 등록
   $('#addload').click(function() {
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

  </script>

<!-------------------- 스크립트 -->

</html>