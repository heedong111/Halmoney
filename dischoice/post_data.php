<?php
function val_category($category){
	for($i=0;$i<sizeof($category);$i++) {
		$category[$i]=$category[$i];
	}
	return $category;
}
$cost= $_POST[cost];
$addr_dong = $_POST[addr_dong];
$category=$_POST[category];
val_category($category);

?>