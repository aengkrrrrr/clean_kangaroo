<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$cate = $_POST['cate'];
$step = $_POST['step'];
$product_category = $_POST['product_category'];

$html = "<option selected disabled>" . $product_category . "</option>";
$sql = "SELECT * FROM product_category where step = {$step} and pcode = '{$cate}'";
$result = $mysqli->query($sql);

while ($row = $result->fetch_object()) {
  //$html .= "<option value=\"" . $row->code . "\">" . $row->name . "</option>";
  $html .= "<option value=\"$row->code\">  $row->name </option>";
}

echo $html;
