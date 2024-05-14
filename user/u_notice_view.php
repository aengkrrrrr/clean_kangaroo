<?php
session_start();
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
            <!-- <p>안녕하세요, 딥러닝캥거루 LMS 관리자입니다.</p>
                <p>9월 30일(수)부터 10월 2일(금)까지 추석 연휴 기간 고객센터 휴무 기간을 안내 드립니다.</p>
                <p>■ 휴무 기간 : 9.30 ~ 10.2</p>
                <p></p>
                <p>해당 기간에는 고객센터 휴무로 상담원과 직접 통화 할 수 없으며, ARS에 전화번호를 남겨주시면
                10월 5일(월)부터 접수 순서대로 답변 드리겠습니다.</p>
                <p></p>
                <p>홈페이지의 문의하기로 접수하시는 내용도 10월 5일(월)부터 접수 순서대로 답변 드리겠습니다.
                즐겁고 풍성한 한가위 보내시기 바랍니다.</p>
                <p></p>
                <p>감사합니다.</p></td> -->
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