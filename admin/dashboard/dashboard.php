<?php
$title = "대시보드";
$css1 = '<link rel="stylesheet" href="../../css/dashboard.css">';

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$sql = "SELECT * FROM qna_board LIMIT 4";
$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}

?>

<body>
<div class="dashboard_wrap grid">
  <div class="dash_top_ct df">
        <div class="sale_wrap">
          <div class="dash_title df aic">
            <h5 class="h5">매출현황</h5>
            
          </div>
          <div class="sale_ct">
            <div class="chart">
              <canvas id="line-chart"></canvas>
            </div>
          </div>
          <a href="../sales/sales_manage.php"><span class="material-symbols-outlined more_btn" >add</span></a>
        </div>
        <div class="today_wrap">
          <div class="dash_title df aic">
            <h5 class="h5">접속자 수 비교</h5>
          </div>
          <div class="today_ct">
            <div class="chart">
              <canvas id="bar-chart"></canvas>
            </div>
          </div>
        </div>
  </div>
  <div class="dash_bt_ct df">
    <div class="board_wrap">
      <div class="dash_title df aic">
        <h5 class="h5">공지사항</h5>
      </div>
      <div class="board_ct">
        <table class="table">
          <tbody>
          <?php
          if(isset($rsArr)){
            foreach($rsArr as $ra){
          ?>
          <tr>
            <td><?php if($ra->status == 0){echo '답변대기';}?></td>
            <td><?=$ra->title;?></td>
            <td><?=$ra->date;?></td>
            <td><?=$ra->hit;?></td>
            <td><?=$ra->name;?></td>
          </tr>
        <?php
            }
          }
        ?>
          </tbody>
        </table>
      </div>
      <a href="../notice/notice_list.php"><span class="material-symbols-outlined more_btn">add</span></a>
    </div>
    <div class="member_wrap">
      <div class="dash_title df aic">
        <h5 class="h5">회원수 비교</h5>
      </div>
      <div class="member_ct">
        <div class="chart">
          <canvas id="pie-chart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
  


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
$script1 = "<script src='../../js/dashboard.js'></script>";
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';

?>
