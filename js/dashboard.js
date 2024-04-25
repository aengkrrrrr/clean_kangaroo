const lineChart = document.getElementById('line-chart');
const barChart = document.getElementById('bar-chart');
const pieChart = document.getElementById('pie-chart');

const todayData = {
  label: '2023',
  data: [4, 12, 8, 7, 10, 5],
  borderWidth: 2   
}

const memberData = {
  label: '회원수 비교',
  data: [60, 45, 8],
  borderWidth: 2   
}


//매출 라인차트
new Chart(lineChart, {
  type: 'line',
  data: {
    labels: ['1월', '2월', '3월', '4월', '5월', '6월'],
    datasets: [
              {
        label: '2023',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
        },
        {
          label: '2024',
          data: [4, 12, null, 7, 10, 5],
          borderWidth: 2,
          // hoverBorderWidth:5,
          // borderColor: 'rgba(0,0,0,0.5)',
          // backgroundColor:'yellow',
          // radius:4,
          // hoverRadius:10,
          // pointBorderColor:'black',
          // pointStyle:sun,
          // showLine:true,
          spanGaps:true,
          // stepped:true
        }
    ]
  },
  options: {
    scales: {
      y: {
        stacked:true
      }
    },
    maintainAspectRatio:false
  }
});


//접속자수 바차트
new Chart(barChart, {
  type: 'bar',
  data: {
    labels: ['1월', '2월', '3월', '4월', '5월', '6월'],
    datasets: [todayData]
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

//회원 도넛차트
new Chart(pieChart, {
  type: 'pie',
  data: {
    labels: ['일반회원', '신규회원', '탈퇴회원'],
    datasets: [memberData]
  },
  options: {
    cutout: '50%',
    indexAxis:'y', //방향 변경
    maintainAspectRatio:false
  }
});