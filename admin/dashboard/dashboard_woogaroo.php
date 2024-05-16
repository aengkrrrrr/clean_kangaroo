<?php
$title = "대시보드";
$css1 = '<link rel="stylesheet" href="../../css/dashboard.css">';

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';


//회원수 출력
$sql = "
SELECT 
(SELECT COUNT(*) FROM members WHERE status = 0) AS cnt1,
(SELECT COUNT(*) FROM members WHERE status = -1) AS cnt2,
(SELECT COUNT(*) FROM members WHERE status = '') AS cnt3;
";
$result = $mysqli->query($sql);
$row = $result->fetch_object();
//나는 members라는 테이블에서 status 컬럼에 담긴 내용들(3개)를 각각 cnt1.2.3이라는 별칭에 담아서 sql쿼리 만듦

$arr = array();
$arr[0] = $row->cnt1;
$arr[1] = $row->cnt2;
$arr[2] = $row->cnt3;
//cnt 1,2,3의 수치를 각각 차트로 보여줄거라 배열로 만드는 과정

$data = [];
foreach($arr as $item){
  array_push($data, $item);
}
//유사배열이라 찐 배열로 만들어줌(아마도)

?>

<body>
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
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const pieChart = document.getElementById('pie-chart');

  const mData = <?= json_encode($data) ?>;
  //이유는 기억 안 나는데 데이터를 변수에 담아서 출력하려면 json_encode로 변환?해야했음

  const memberData = {
    label: '회원수 비교',
    data: mData, //변수에 담은 데이터를 차트를 memberData라는 변수에 담음
    borderWidth: 2   
  }

  //회원 도넛차트
  new Chart(pieChart, {
    type: 'pie',
    data: {
      labels: ['일반회원', '신규회원', '탈퇴회원'],
    datasets: [memberData] //위에서 담은 데이터의 변수를 차트 스크립트에 넣으면 데이터 출력완료!
  },
  options: {
    cutout: '50%',
    indexAxis:'y', //방향 변경
    maintainAspectRatio:false
  }
  
});

</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';

?>