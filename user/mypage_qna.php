<?php
$title='마이페이지_내 강의실';
$css1 ='<link rel="stylesheet" href="css/cart.css">';
$css2 ='<link rel="stylesheet" href="css/mypage.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

// $idx = $_POST['idx'];
$userid = $_SESSION['UID'];

$sql = "SELECT * FROM qna_board where userid='{$userid}'";
$result = $mysqli->query($sql);
while($qna = $result->fetch_object()){
  $qarr[]=$qna;
}

?>

<main class="usergrid">
  <div class="mypage_wrap df">
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/mypage_common.php';?>
    <div class="my_qna">
      <h2 class="body1b">내 질문</h3>
      <div class="mypage_ct df">
        <form action="u_qna_del.php" method="GET">
         
          <table class="qna_table">
            <thead>
              <tr class="df aic">
                <th scope="col">상태</th>
                <th scope="col">질문명</th>
                <th scope="col" class="hidden">버튼</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($qarr)){
                foreach ($qarr as $qrs) {
              ?>
            <tr class="df aic">
              <input type="hidden" name="idx" value="<?= $qrs->idx;?>">
              <td>
                <?php
                if($qrs->status === '0'){
                  echo '답변대기';
                } else {
                  echo '답변완료';
                }
                ?>
              </td>
              <td><?=$qrs->title?></td>
              <td>
                <a href="u_qna_edit.php?idx=<?= $qrs->idx; ?>" class="secondary_btn edit">수정</a>
                <button class="delete_btn del">삭제</button>
              </td>
            </tr>
            <?php
                }
              }
            ?>
            </tbody>
          </table>
          
        </form>
        
      </div>
      

    </div>
  </div>
  <div class="nav_wrap mypage_pager">
    <nav aria-label="">
      <ul class="pagination review">
        <li class="page-item disabled">
          <a class="page-link">&laquo;</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">&raquo;</a>
        </li>
      </ul>
    </nav>
  </div>
</main>


<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>