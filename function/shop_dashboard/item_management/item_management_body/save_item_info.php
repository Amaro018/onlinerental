<?php 

include '../../../connection.php';
$item_name = $_POST['item_name'];
$item_desc = $_POST['item_desc'];
$category_no = $_POST['category_no'];
// $item_category = $_POST['item_category'];
$min = $_POST['min'];
$max = $_POST['max'];
$type = $_POST['type_of_ship'];
$shop_no = $_POST['shop_no'];
$availability = true;

$item = $con->query("INSERT INTO tbl_item (shop_no, category_no, item_name, item_desc, min, max, availability, type_of_ship) VALUES ($shop_no, $category_no, '$item_name', '$item_desc', $min, $max, $availability, '$type') ");

$last_id_info = $con->insert_id;

echo $last_id_info;

?>