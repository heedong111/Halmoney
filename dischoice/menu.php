<html>
<head>
	<link rel="stylesheet" type="text/css" href="dist/css/design_list.css">
</head>
<body>
<?
	include "./connect_db.php";
	include "./post_data.php";
	$idx=$_GET[idx];
	$cost=$_GET[cost];
	$sql="select store_stuff,cost from stuff where idx='$idx' and cost<='$cost' order by cost desc";
	
	$result = mysql_query($sql, $conn);
	$num_rows = mysql_num_rows($result);
	if($num_rows<1){
		echo "검색된 결과가 없습니다.";
	}
	else{
		$fields=mysql_num_fields($result); // 출력된 튜블 개수
		echo "<table border=1>
			<tr>
			<td>메뉴
			<td>가격
			";
		/* 검색된 쿼리 표에 맞춰 출력 */
		while($row=mysql_fetch_row($result))
		{
			echo("<tr>");
			echo "<td>$row[0]</td>
			<td>$row[1] 원</td>";
			echo("</tr>");
		}
		echo("</table>");
	}
?>


</body>
</html>