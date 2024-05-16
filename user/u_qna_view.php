<?php
$title = 'Q&A 게시판';
$css1 = ' <link rel="stylesheet" href="./css/u_notice_qna.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

//테이블조회
$idx = $_GET['idx'];
$sql = "select b.*, m.username
from qna_board b 
join members m 
on b.userid=m.userid WHERE b.idx={$idx}";

$result = $mysqli->query($sql);
$row = $result->fetch_object();
$_SESSION['UNAME'] = $row->username;
$_SESSION['UID'] = $row->userid;

// 조회수 업데이트
$hit = $row->hit + 1;
$sqlUpdate = "UPDATE qna_board SET hit={$hit} WHERE idx = {$idx}";
$mysqli->query($sqlUpdate);
?>

<main class="u_body">
  <div class="wrapper usergrid">
    <h3 class="h3">Q&A 게시판</h3>
    <table class="u_notice table body3">
      <thead class="notice_viewhead">
        <tr>
          <th colspan="3" scope="col"><?= $row->title; ?></th>
          <th class="body3" scope="col">작성일 : <?= $row->date; ?></th>
          <th class="body3" scope="col">이름 : <?= $row->username; ?></th>

        </tr>
      </thead>

      <tbody class="notice_viewd body3">
        <tr>
          <td colspan="5" scope="col">
            <?= $row->content; ?></td>
        </tr>
        <tr>
          <td class="edit df" colspan="5" scope="col">
            <?php
            if ($_SESSION['UID'] !== $row->username) {
              ?>
         <a href="/clean_kangaroo/user/u_qna_edit.php?idx=<?=$row->idx?>" class="secondary_btn edit qna">수정</a>
         <a href="/clean_kangaroo/user/u_qna_del.php?idx=<?=$row->idx?>" class="delete_btn del qna">삭제</a>
        <?php 
        }else{
          ?>
         <a href="/clean_kangaroo/user/u_qna_edit.php?idx=<?=$row->idx?>" class="secondary_btn edit qna" hidden>수정</a>
         <a href="/clean_kangaroo/user/u_qna_del.php?idx=<?=$row->idx?>" class="delete_btn del qna" hidden>삭제</a>
          <?php
        }
         ?>
            </td>
        </tr>
      </tbody>
    </table>
    <table>
      <tbody>
        <tr>
          <td class="listbtn df" colspan="5" scope="col"><a href="javascript:history.back();" class="primary_btn list">목록</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';


?>