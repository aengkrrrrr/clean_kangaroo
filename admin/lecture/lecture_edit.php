<?php
session_start();
$title = "강좌관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';


$pid = $_GET['pid'];
$sql = "SELECT * FROM products where pid={$pid}";
$result = $mysqli->query($sql);
$rowp = $result->fetch_object();

$category = $rowp->cate;
$cate = str_split($category, 5);
//$catesql = "SELECT * FROM product_category where code = '{$cate}'";
$catesql = "SELECT * FROM product_category c join products p on c.pcode=p.cate where 1=1";  

$cateResult = $mysqli->query($catesql);
$caterow = $cateResult ->fetch_object();





?>

  <!----------- 헤더 -->
  <body>
  <div class="lecture_up">
    <h3>강좌 수정</h3>
    <form action="lecture_edit_ok.php" method="POST" enctype="multipart/form-data" id="product_save">
    <input type="hidden" name="pid" value="<?=$pid?>">
    <ul>
      <p class="form-label">카테고리</p>
      <li class="category">
      <select class="form-select" aria-label="대분류" id="cate1">
        <option selected value="<?=$caterow->name;?>"><?=$caterow->name;?></option>
      </select>
      <select class="form-select" aria-label="중분류" id="cate2" value="<?$rowp->cate;?>">
      <option selected value="<?=$caterow->name;?>"><?=$caterow->name;?></option>
    </select>
      </li>
    </ul>
    <ul>
      <li>
        <div class="form-floating mb-3">
          <input type="text" name="title" class="form-control" id="floatingInput_title" placeholder="<?=$rowp->title;?>" value="<?=$rowp->title;?>" readonly>
          <label for="floatingInput_title">강좌명</label>
        </div>
      </li>
    </ul>
    <ul>
      <li>
        <div class="input-group c2form price">
          <div class="form-floating">
            <input type="text" name="price" class="form-control" aria-label="lecture_price" id="lecture_price" placeholder="<?=$rowp->price;?>" value="<?=$rowp->price;?>">
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
        수강기간 : 
          <input type="text" id="datepicker1" class="couponC" name="datepicker1" value="<?=$rowp->sale_start_date?>">
          <input type="text" id="datepicker2" class="couponC" name="datepicker2" value="<?=$rowp->sale_end_date?>">
        </div>
      </div>
      </li>

      <li class="view_status">
                <p class="status">상태&nbsp;&nbsp;</p>
               <div class="form-check">
                  <input class="form-check-input" type="radio" 
                  aria-label="공개" name="status" id="status1" 
                  <?php if($rowp->status == 0){ 
                    echo "checked";} ?>
                   value=0>
                   <label class="form-check-label" for="status1">
                    공개
                  </label>   
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" 
                  aria-label="일부공개(예약)" name="status" id="status2"
                  <?php if($rowp->status == 1){
                     echo "checked";} ?> value=1>
                   <label class="form-check-label" for="status2">
                    일부공개
                  </label>   
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" 
                  aria-label="비공개" name="status" id="status3"
                  <?php if($rowp->status == 2){ 
                    echo "checked";} ?> value=2>
                   <label class="form-check-label" for="status3">
                    비공개
                  </label>   
                </div>
              </li>    </ul>
    <ul>
      <li>
        <div class="form-floating textarea">
          <textarea class="form-control" placeholder="강좌설명" id="floatingTextarea" name="content"><?=$rowp->content;?></textarea>
          <label for="floatingTextarea" hidden>강좌설명</label>
        </div>
      </li>
      <li>
      <div class="mb-3">
          <label for="formFile" class="form-label">이미지 업로드</label>
          <input class="form-control" type="file" multiple name="thumbnail" id="thumbnail" class="d-none" value="<?=$rowp->thumbnail;?>">
        </div>
      </li> 
      <li>
        <div class="form-floating mb-3">
          <input type="url" class="form-control" multiple name="url"  id="url" value="<?=$rowp->url;?>">
          <label for="floatingInput_url">강의 영상 URL</label>
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
  //header 메뉴 액티브
  document.addEventListener('DOMContentLoaded',function(){
  const title = "<?php if(isset($menutitle)){ echo $menutitle;} else{echo $title;}  ?>";
  console.log(title);
  const headerMenu = document.querySelectorAll('#header .gnb_wrap li');
  for(let menu of headerMenu){
    menu.classList.remove('active');
    if(menu.innerText === title){
      menu.classList.add('active');
    }
  }

    // $('#product_save').on('submit', save);

    $( ".couponC" ).datepicker({
      dateFormat: "yy-mm-dd"
    });


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
  })


  </script>

<!-------------------- 스크립트 -->

</html>