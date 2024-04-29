<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/php/header.php';
?>
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
          <a href=""><span class="material-symbols-outlined more_btn" >add</span></a>
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
            <tr>
              <td>답변대기</td>
              <td>쿠폰 사용 문의드립니다.</td>
              <td>2024-04-23</td>
              <td>10</td>
              <td>츄츄림</td>
            </tr>
            <tr>
              <td>답변대기</td>
              <td>쿠폰 사용 문의드립니다.</td>
              <td>2024-04-23</td>
              <td>10</td>
              <td>츄츄림</td>
            </tr>
            <tr>
              <td>답변대기</td>
              <td>쿠폰 사용 문의드립니다.</td>
              <td>2024-04-23</td>
              <td>10</td>
              <td>츄츄림</td>
            </tr>
            <tr>
              <td>답변대기</td>
              <td>쿠폰 사용 문의드립니다.</td>
              <td>2024-04-23</td>
              <td>10</td>
              <td>츄츄림</td>
            </tr>
          </tbody>
        </table>
      </div>
      <a href=""><span class="material-symbols-outlined more_btn">add</span></a>
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
  

</body>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/php/footer.php';
?>