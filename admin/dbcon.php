<?php
$hostname = "localhost";
$dbuserid = "dlkang";
$dbpasswd = "kang1357!";
$dbname = "dlkang";

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

if ($mysqli->connect_errno) {
  // 오류 메시지를 서버의 로그 파일에 기록
  echo "연결실패";
  error_log('Database connection failed: ' . $mysqli->connect_error);

  // 사용자에게는 일반적인 오류 메시지만 표시
  die('Sorry, we are experiencing some technical difficulties. Please try again later.');
}
