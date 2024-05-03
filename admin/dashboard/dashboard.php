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

$arr = array();
$arr[0] = $row->cnt1;
$arr[1] = $row->cnt2;
$arr[2] = $row->cnt3;

$data = [];
foreach($arr as $item){
  array_push($data, $item);
}

//공지사항 출력
$sql = "SELECT * FROM notice_board LIMIT 4";
$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}

// //매출 데이터
// $saleSql = "SELECT COUNT(price) FROM sales_manage WHERE price=10000";
// $saleResult = $mysqli->query($saleSql);
// $saleRow = $saleResult->fetch_object();

// $saleArr = array();
// $saleArr[0] = $saleRow->price;

// $data2 = [];
// foreach($saleArr as $price){
//     array_push($data2, $price);
// }

?>

<body>
<div class="dashboard_wrap grid">
  <div class="dash_top_ct df">
        <div class="sale_wrap">
          <div class="dash_title df aic">
            <h5 class="h5">매출현황(만원)</h5>
            
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
          <td colspan="5"><a href=""><?=$ra->title;?></a></td>
          <!-- <td><?=$ra->cate;?></td> -->
          <td><?=$ra->date;?></td>
          <td><?=$ra->hit;?></td>
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
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
<script>
  const lineChart = document.getElementById('line-chart');
  const barChart = document.getElementById('bar-chart');
  const pieChart = document.getElementById('pie-chart');


  
/*
  const mData = <?= json_encode($data) ?>;
  const sData = <?= json_encode($data2) ?>;*/
  
//   const memberData = {
//     label: '회원수 비교',
//     data: mData,
//     borderWidth: 2   
//   }
//   const saleData = {
//     label: '매출액 비교',
//     data: sData,
//     borderWidth: 2   
//   }
//   const todayData = {
//     label: '2023',
//     data: [4, 12, 8, 7, 10, 5],
//     borderWidth: 2   
//   }
//회원 도넛차트
  new Chart(pieChart, {
    type: 'pie',
    data: {
      labels: ['일반회원', '신규회원', '탈퇴회원'],
      datasets: [
        {
          label:"2024",
          data:[80,20,9],
          backgroundColor:['skyblue','pink','yellow']
        },
        
    ]
  },
  options: {
    cutout: '50%',
    indexAxis:'y', //방향 변경
    maintainAspectRatio:false
  }
  
});

//매출 라인차트
new Chart(lineChart, {
  type:'line',
  data:{
    labels:  ['1월', '2월', '3월', '4월', '5월', '6월'],
    datasets:[
      {
        label:"2023",
        data:[10,8,6,5,12,8,16,17,6,7,6,10],
        borderColor: 'rgba(0,0,0,0.5)',
        backgroundColor:'skyblue'
        // borderWidth: 1
      },
      {
        label:"2024",
        data:[5,12,8,10,5,8,10,12,8,12,8,16],
        borderColor: 'rgba(0,0,0,0.5)',
        backgroundColor:'pink'
        // borderWidth: 2,
      }       
    ]
  }
});
// new Chart(lineChart, {
//   type: 'line',
//   data: {
//     labels: ['1월', '2월', '3월', '4월', '5월', '6월'],
//     datasets: [
//               {
//         label: '2023',
//         data: [saleData],
//         borderWidth: 1
//         },
//         {
//           label: '2024',
//           data: [saleData],
//           borderWidth: 2,
//           // hoverBorderWidth:5,
//           // borderColor: 'rgba(0,0,0,0.5)',
//           // backgroundColor:'yellow',
//           // radius:4,
//           // hoverRadius:10,
//           // pointBorderColor:'black',
//           // pointStyle:sun,
//           // showLine:true,
//           spanGaps:true,
//           // stepped:true
//         }
//     ]
//   },
//   options: {
//     scales: {
//       y: {
//         stacked:true
//       }
//     },
//     maintainAspectRatio:false
//   }
// });


//접속자수 바차트
new Chart(barChart, {
  type: 'bar',
  data: {
    labels: ['1월', '2월', '3월', '4월', '5월', '6월'],
    datasets: [{
      label:"2024",
      data:[20,30,18,50,90,76],
      borderColor: 'rgba(0,0,0,0.5)',
      backgroundColor:'pink'
    }]
  },
  options: {
    indexAxis:'x', //방향 변경
    scales: {
      y: {
        // beginAtZero: true
        stacked:true
      },
      x: {
        stacked:true
      }
    },
    maintainAspectRatio:false
  }
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';

?>
