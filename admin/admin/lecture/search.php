<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';


$search_term = $_GET['search_term'];

// MySQL에서 검색 쿼리 실행
$sql = "SELECT * FROM 테이블명 WHERE column_name LIKE '%$search_term%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 검색 결과가 있을 경우 처리
    while($row = $result->fetch_assoc()) {
        // 각 행에서 데이터 가져오기
        echo "필드명: " . $row["column_name"]. "<br>";
    }
} else {
    // 검색 결과가 없을 경우 처리
    echo "검색 결과가 없습니다.";
}

// 데이터베이스 연결 종료
$conn->close();
?>
