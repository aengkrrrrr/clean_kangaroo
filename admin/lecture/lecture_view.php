<?php
session_start();
$title = "강좌관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$pid = $_GET['pid']; 
$sql = "SELECT * FROM products WHERE pid = {$pid}";
$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}
?>
  <!----------- 헤더 -->
  <div class="answer_wrap">
    <div class="user_write">
      <ul>
        <div class="title df aic pb-5">
          <h4 class="h4">강좌명 : <?= $rs->title; ?></h4>
          <div class="svg_wrap">
            <span class="body3b">조회수 : <?= $rs->hit; ?></span>
            <span class="body3b"><?= $rs->reg_date; ?></span>
            <div class="lectureSvg">
            <td class="lectureSvg">
  <a href="lecture_edit.php?pid=<?= $rs->pid; ?>"><img src="../../images/edit.svg" alt=""></a>
    <a href="lecture_del.php?pid=<?= $rs->pid; ?>" class="cart_item_del"><img src="../../images/delete.svg" alt=""></a>
  </td>
            </div>
          </div>
        </div>
        <p class="form-label ca"><?=$rs->cate;?>카테고리 > 소분류</p>
      </ul>
      <ul>
        <div class="container">
          <div class="inner_container">
            <ul class="info">
              <li><img src="/clean_kangaroo/admin/upload/<?=$rs->thumbnail;?>" alt=""></li>
              <li>
                <p class="form-label price">가격 : <?= $rs->price; ?>원</p>
              </li>
              <li class="view_status">
                <p class="status">상태&nbsp;&nbsp;</p>
               <div class="form-check">
                  <input class="form-check-input" type="radio" 
                  aria-label="공개" name="status[<?= $rs->pid ?>]" id="status[<?= $rs->pid ?>]<?php if($rs->status == 0){ echo "checked";} ?>">
                   <label class="form-check-label" for="status[<?= $rs->pid ?>]">
                    공개
                  </label>   
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" 
                  aria-label="일부공개(예약)" name="status[<?= $rs->status ?>]" id="status[<?= $rs->status ?>]<?php if($rs->status == 1){ echo "checked";} ?>">
                   <label class="form-check-label" for="status[<?= $rs->pid ?>]">
                    일부공개(예약)
                  </label>   
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" 
                  aria-label="비공개" name="status[<?= $rs->pid ?>]" id="status[<?= $rs->pid ?>]<?php if($rs->status == 2){ echo "checked";} ?>">
                   <label class="form-check-label" for="status[<?= $rs->pid ?>]">
                    비공개
                  </label>   
                </div>
              </li>
            </ul>
            <ul class="content">
              <p class="body2"><?= $rs->content; ?>사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용사용자가 작성한 내용사용자가
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