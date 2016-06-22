<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    	<!-- 부트스트랩 -->
    	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="dist/css/design_list.css">
		<style>
		footer {
  			position: fixed;
  			top: 0;
  			left: 0;
  			height: 70px;
  			background-color: #FFABAB;
  			width: 100%;
		}
		body {
  			margin-top: 70px;
  			background-color : #9CC;
		}
	</style>
	</head>
	<body>

	<footer><p align="right"><a href="frame.html"><img vspace="20px" height="50%" weight="30%" src="images\logo.png" alt="로고"></a></p></footer>
	<div>
<?
	include "./connect_db.php";
	include "./post_data.php";
	
	/* 가게 이름,전화번호,위치정보 추출 쿼리*/
	$sql="select distinct store.idx,store_name,tel_no,location_N,location_E from store,stuff
	where cost <= '$cost' and addr_dong like '%$addr_dong%' and store.idx=stuff.idx";
	if(is_array($category)){
		$sql.=" and (";
		for($i=0;$i<count($category);$i++){
			$sql.="category='$category[$i]' ";
			if($i!=(count($category)-1)){
				$sql.="or ";
			}
		}
		$sql.=")";
	}
	$result = mysql_query($sql, $conn);
	$num_rows = mysql_num_rows($result);
	if($num_rows<1){
		?><p align="center"><img src="images/noresult.png" hspace="1px" vspace="3px"></p><?
	}
	else{
	$fields=mysql_num_fields($result); // 출력된 튜블 개수
	echo "<table border=1>
			<tr>
			<td>이름
			<td>전화번호
			<td>메뉴
			<td>위치";
	/* 검색된 쿼리 표에 맞춰 출력 */
	while($row=mysql_fetch_row($result))
	{
		echo("<tr>");
		echo "<td>$row[1]</td>
		<td>$row[2]</td>";?>
		<td>
			<a data-toggle="modal" data-target="#menu_<?=$row[0]?>">메뉴보기</a>
		<!-- Modal -->
		<div class="modal fade" id="menu_<?=$row[0]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title" id="myModalLabel">메뉴</h4>
      				</div>
      				<div class="modal-body">
        				<iframe src="menu.php?idx=<?=$row[0]?>&cost=<?=$cost?>" width="100%" height="100%" frameborder=0 marginwidth=0 marginheight=0></iframe>
     				</div>
    			</div>
  			</div>
  		</td>
		<td>
			<a data-toggle="modal" data-target="#map_<?=$row[0]?>">지도보기</a>

		<!-- Modal -->
		<div class="modal fade" id="map_<?=$row[0]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title" id="myModalLabel">지도</h4>
      				</div>
      				<div class="modal-body">
        				<iframe src="map.php?location_N=<?=$row[3]?>&location_E=<?=$row[4]?>&store_name=<?=$row[1]?>" width="100%" height="100%" allowfullscreen frameborder=0 marginwidth=0 marginheight=0></iframe>
      				</div>
    			</div>
  			</div>
		</div>
		</td><?
		/* 이 밑은 검색되는 모든 row 출력.*/
		//for($i=0; $i<$fields; $i++){
		//	echo("<td> $row[$i] </td>");
		//}
		echo("</tr>");
	}
	echo("</table>");
	}

?>
</div>
</body>
<!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
<script src="dist/js/bootstrap.min.js"></script>
</html>