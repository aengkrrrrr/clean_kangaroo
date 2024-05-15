<?php
$title = '공지사항';
$css1 = ' <link rel="stylesheet" href="./css/u_notice_qna.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

//테이블조회
$idx = $_GET['idx'];
$sql = "SELECT * FROM notice_board WHERE idx={$idx}";
$result = $mysqli->query($sql);
$row = $result->fetch_object();


// 조회수 업데이트
$hit = $row->hit + 1;
$sqlUpdate = "UPDATE notice_board SET hit={$hit} WHERE idx = {$idx}";
$mysqli->query($sqlUpdate);
?>

<main class="u_body">
  <div class="wrapper usergrid">
    <h3 class="h3 view">공지사항</h3>
    <table class="u_notice table view body3">
      <thead class="notice_viewhead">
        <tr>
          <th colspan="3" scope="col"><?= $row->title; ?></th>
          <th class="body3" scope="col">작성일 : <?= $row->date; ?></th>
          <th class="body3" scope="col">조회수 : <?= $row->hit; ?></th>
        </tr>
      </thead>
      <tbody class="notice_viewd body3">
        <tr>
          <td colspan="5" scope="col">
            <?= $row->contents; ?>
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