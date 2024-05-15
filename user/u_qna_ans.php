<?php
$title = 'Q&A 게시판';
$css1 = ' <link rel="stylesheet" href="./css/u_notice_qna.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

//테이블조회
$idx = $_GET['idx'];
$sql = "SELECT * FROM qna_board WHERE idx={$idx}";
$result = $mysqli->query($sql);
$row = $result->fetch_object();

//조회수 업데이트
$hit = $row->hit + 1;
$sqlUpdate = "UPDATE qna_board SET hit={$hit} WHERE idx = {$idx}";
$mysqli->query($sqlUpdate);

//답변 테이블 조회
$replySql = "SELECT * FROM qna_reply WHERE idx = {$idx}";
$reply_result = $mysqli->query($replySql);
while($reply_row = mysqli_fetch_object($reply_result)){
  $replyArr[]=$reply_row;
}
?>

<main class="u_body">
    <div class="wrapper usergrid">
      <h3 class="h3">Q&A 게시판</h3>
        <table class="u_notice table body3">
          <thead class="notice_viewhead">
            <tr>
              <th colspan="3" scope="col"><?= $row->title; ?></th>
              <th class="body3" scope="col">작성일 : <?= $row->date; ?></th>
              <th class="body3" scope="col">이름 : <?= $row->name; ?></th>
            </tr>
          </thead>
          
          <tbody class="notice_viewd body3">
            <tr>
              <td class ="qna_cmt"colspan="5" scope="col">
                <p><?=$row->content?></p>
                  <div class="res_wrap body2b">
                    <p>관리자</p>
                      <div class="res body3b">
                      <?php
        if(isset($replyArr)){
          foreach($replyArr as $ra){
        echo "$ra->content";
        
      }
    }
  ?>
                      </div>
                  </div>
              </td>
            </tr>
        </tbody>
        </table>
        <table>
          <tbody>  
            <tr>
              <td class="listbtn df" colspan="5" scope="col"><a href ="javascript:history.back();" class="primary_btn list">목록</a></td>
            </tr>     
        </tbody>
        </table>
    </div>
    </main>

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';


?>