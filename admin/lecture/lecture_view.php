<?php
session_start();
$title = "강좌 관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$pid = $_GET['pid']; 
$sql = "SELECT * FROM products WHERE pid = {$pid}";
$result = $mysqli->query($sql);
$row = mysqli_fetch_object($result);


?>
  <!----------- 헤더 -->
  <div class="answer_wrap">
    <div class="user_write">
      <ul>
        <div class="title df aic pb-5">
          <h4 class="h4">강좌명 : <?= $row->title; ?></h4>
          <div class="svg_wrap">
            <span class="body3b">조회수 : <?= $row->hit; ?></span>
            <span class="body3b"><?= $row->reg_date; ?></span>
            <div class="lectureSvg">
            <td class="lectureSvg">
  <a href="lecture_edit.php?pid=<?= $row->pid; ?>"><img src="../../images/edit.svg" alt=""></a>
    <a href="lecture_del.php?pid=<?= $row->pid; ?>" class="cart_item_del"><img src="../../images/delete.svg" alt=""></a>
  </td>
            </div>
          </div>
        </div>
        <p class="form-label ca"><?=$row->cate;?>카테고리 > 소분류</p>
      </ul>
      <ul>
        <div class="container">
          <div class="inner_container">
            <ul class="info">
              <li><img src="<?=$row->thumbnail;?>" alt=""></li>
              <li>
                <p class="form-label price">가격 : <?= $row->price; ?>원</p>
                <p class="form-label price">수강기간 :<?=$row->sale_start_date?> ~ <?=$row->sale_end_date?>
              </p>               
              </li>
              <li class="view_status">
                <p class="status">상태&nbsp;&nbsp;</p>
               <div class="form-check">
                  <input class="form-check-input" type="radio" 
                  aria-label="공개" name="status" id="status1" 
                  <?php if($row->status == 0){ 
                    echo "checked";} ?>
                  >
                   <label class="form-check-label" for="status1">
                    공개
                  </label>   
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" 
                  aria-label="일부공개(예약)" name="status" id="status2"
                  <?php if($row->status == 1){
                     echo "checked";} ?>>
                   <label class="form-check-label" for="status2">
                    일부공개
                  </label>   
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" 
                  aria-label="비공개" name="status" id="status3"
                  <?php if($row->status == 2){ 
                    echo "checked";} ?>>
                   <label class="form-check-label" for="status3">
                    비공개
                  </label>   
                </div>
              </li>
            </ul>
            <ul class="content">
              <p class="body2"><?= $row->content; ?></p>
            </ul>
          </div>
        </div>
      </ul>
      <div class="answer_btn_wrap df pt-5">
      <a href ="javascript:history.back();" class="basic_btn">목록</a>
      </div>
    </div>
  </div>
  </div>




</body>
<!-- 스크립트 -->
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
});

</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>

<!-------------------- 스크립트 -->

</html>