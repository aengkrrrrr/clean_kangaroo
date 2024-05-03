<?php
session_start();
$title = "강좌관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$pid = $_GET['pid']; 
// $sql = "SELECT * FROM products p join product_category c on p.cate=c.pcode where 1=1";
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
        <p class="form-label ca"><?=$row->cate;?></p>
      </ul>
      <ul>
        <div class="container">
          <div class="inner_container">
            <ul class="info">
              <li><a href="<?=$row->url;?>"><img src="<?=$row->thumbnail;?>" alt=""></a></li>
              <li>
                <p class="form-label price">가격 : <?= $row->price; ?>원</p>
<<<<<<< HEAD
<<<<<<< HEAD
                <p class="form-label period">수강기간 :<?=$row->sale_start_date?> ~ <?=$row->sale_end_date?>
=======
                <p class="form-label price">수강기간 : <?= $row->sale_start_date; ?>~<?= $row->sale_end_date; ?>
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
=======
                <p class="form-label price">수강기간 : <?= $row->sale_start_date; ?>~<?= $row->sale_end_date; ?>
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
              </p>               
              </li>
              <li class="view_status">
                <p class="status">상태&nbsp;&nbsp;</p>
               <div class="form-check">
                  <input class="form-check-input" type="radio" 
<<<<<<< HEAD
<<<<<<< HEAD
                  aria-label="공개" name="status" id="status1" 
                  <?php if($row->status == 0){ 
                    echo "checked";} ?>
                   disabled>
                   <label class="form-check-label" for="status1">
=======
                  aria-label="공개" name="status[<?= $row->pid ?>]" id="status[<?= $row->pid ?>]<?php if($row->status == 0){ echo "checked";} ?>">
                   <label class="form-check-label" for="status[<?= $row->pid ?>]">
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
=======
                  aria-label="공개" name="status[<?= $row->pid ?>]" id="status[<?= $row->pid ?>]<?php if($row->status == 0){ echo "checked";} ?>">
                   <label class="form-check-label" for="status[<?= $row->pid ?>]">
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
                    공개
                  </label>   
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" 
<<<<<<< HEAD
<<<<<<< HEAD
                  aria-label="일부공개(예약)" name="status" id="status2"
                  <?php if($row->status == 1){
                     echo "checked";} ?> disabled>
                   <label class="form-check-label" for="status2">
                    일부공개
=======
                  aria-label="일부공개(예약)" name="status[<?= $row->status ?>]" id="status[<?= $rs->status ?>]<?php if($row->status == 1){ echo "checked";} ?>">
                   <label class="form-check-label" for="status[<?= $row->pid ?>]">
                    일부공개(예약)
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
=======
                  aria-label="일부공개(예약)" name="status[<?= $row->status ?>]" id="status[<?= $rs->status ?>]<?php if($row->status == 1){ echo "checked";} ?>">
                   <label class="form-check-label" for="status[<?= $row->pid ?>]">
                    일부공개(예약)
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
                  </label>   
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" 
<<<<<<< HEAD
<<<<<<< HEAD
                  aria-label="비공개" name="status" id="status3"
                  <?php if($row->status == 2){ 
                    echo "checked";} ?> disabled>
                   <label class="form-check-label" for="status3">
=======
                  aria-label="비공개" name="status[<?= $row->pid ?>]" id="status[<?= $row->pid ?>]<?php if($row->status == 2){ echo "checked";} ?>">
                   <label class="form-check-label" for="status[<?= $row->pid ?>]">
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
=======
                  aria-label="비공개" name="status[<?= $row->pid ?>]" id="status[<?= $row->pid ?>]<?php if($row->status == 2){ echo "checked";} ?>">
                   <label class="form-check-label" for="status[<?= $row->pid ?>]">
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
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