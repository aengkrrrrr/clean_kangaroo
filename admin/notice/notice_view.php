<?php
session_start();
$title = "공지사항 관리";
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

//테이블조회
$idx = $_GET['idx'];
$sql = "SELECT * FROM notice_board WHERE idx={$idx}";
$result = $mysqli->query($sql);
$row = $result->fetch_object();


//조회수 업데이트
// $hit = $row->hit + 1;
// $sqlUpdate = "UPDATE notice_board SET hit={$hit} WHERE idx = {$pid}";
// $mysqli->query($sqlUpdate);

?>
  <!----------- 헤더 -->
  <div class="answer_wrap">
     
    <div class="user_write">
      <ul>
        <li>
            <p class="form-label"></p>          
            <div class="title df aic pb-5">
              <h4 class="h4"><?= $row->title; ?></h4>
              <div class="svg_wrap">
                <span class="body3b">조회수 : <?=$row ->hit;?></span>
                <span class="body3b"><?=$row ->date;?></span>
                <div class="lectureSvg">
                <a href="notice_edit.php?idx=<?= $row->idx; ?>"><img src="/clean_kangaroo/images/edit.svg" alt=""></a>
              <a href="notice_del.php?idx=<?= $row->idx; ?>" class="cart_item_del"><img src="/clean_kangaroo/images/delete.svg" alt=""></a>
                </div>
              </div> 
            </div>  
        </li>
      </ul>
      <ul>
        <div class="container">
          <div class="inner_container">
            <ul class="info">
              <li><img src="<?=$row ->image;?>" alt="" class="image_preview"></li>
            <li class="content">
              <p class="body2">
              <input type="hidden" name="idx" value="<?= $row->idx;?>">
              <?=$row ->contents;?>
              </p>
            </li>
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
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<!-------------------- 스크립트 -->

</html>