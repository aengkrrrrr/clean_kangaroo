<?php		
$hostname = "localhost";
$dbuserid = "dlkang";
$dbpasswd = "kang1357!";
$dbname = "dlkang";
$db = $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);


if(!isset($_SESSION)) {
  session_start(); 
} 	
$currdt = date("Y-m-d H:i:s");
$userid = $_SERVER['REMOTE_ADDR'];

if(isset($_SERVER['HTTP_REFERER'])){
  $referer = $_SERVER['HTTP_REFERER'];
}  	else {
  $referer = "";
}		

if($db){ // 처음 방문했는지 검사		
  if(!isset($_SESSION['visit'])) {
    $_SESSION['visit'] = "1";
    $query = "insert into m_counter (regdate, userid, referer) values('$currdt','$userid','$referer')";
    $result = $db->query($query);
}		
// 오늘 방문자수		
$query = "select count(*) as count from m_counter where DATE(regdate) = DATE('$currdt')";
$data = $db->query($query)->fetch_array();
$today_visit_count = $data['count'];

// 전체 방문자수
$query = "select count(*) as count from m_counter";
$data = $db->query($query)->fetch_array();
$total_visit_count = $data['count'];}

?>