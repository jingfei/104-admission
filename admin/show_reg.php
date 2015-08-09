<?php 
session_start(); 
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
	echo '<meta http-equiv=REFRESH CONTENT=1;url=../>'
?>
<!DOCTYPE html>
<html>
<head>
	<title>104學年度公私立大學校院招生檢討會</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="keywords" content="招生檢討會">
	<link rel="shortcut icon" href="../img/ncku.ico" type="image/x-icon" />
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/semantic.min.js"></script>
	<script src="../js/main.js"></script>
	<link rel=stylesheet type="text/css" href="../style/main.css"/>
	<link rel=stylesheet type="text/css" href="../style/semantic.min.css"/>
	<style>ul{font-size:1.1em;}table{position:absolute;top:40px;}</style>
<script>
$(window).scroll(function(){
	if($(this).scrollTop()<50)
		$('#header').css({'top':'auto','position':'relative'});
	else
		$('#header').css({
			'top': $(this).scrollTop(),
			'position': 'absolute',
		});
});
function Search(){
	$("tr").each(function(){
		if($(this).attr('id')=="header") $(this).show();
		else if($(this).html().indexOf($("#search").val())==-1)
			$(this).hide();
		else $(this).show();
	});
	return false;
}
</script>
</head>
<body>
	<div class="ui secondary pointing six item fixed top large menu">
		<div class="item"><form onSubmit="return Search();" class="ui action small input"><input type="text" id="search" placeholder="Search...">
		  <button class="ui icon button">
		      <i class="search icon"></i>
			    </button></form></div>
		<a class="item active" href="show_reg.php">1. 列出報名資料</a>
		<a class="item" href="modify_reg.php">2. 修改報名資料</a>
		<a class="item" href="show_prop.php">3. 列出提案資料</a>
		<a class="item" href="modify_prop.php">4. 修改提案資料</a>
		<a class="item" href="logout.php">5. 登出</a>
	</div>
<?php
include("config.php");
$no = 1;

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
$check = "SELECT * FROM `register` ORDER BY `time`";
$result = mysql_query($check) or die(mysql_error());

echo "<table class='ui definition celled table' style='width:2200px'>";
echo "<thead><tr id='header'>";
echo "<th style='width:111px;'></th>";
echo "<th style='width:111px;'>報名時間</th>";
echo "<th style='width:111px;'>學校</th>";
echo "<th style='width:111px;'>單位</th>";
echo "<th style='width:111px;'>職稱</th>";
echo "<th style='width:111px;'>姓名</th>";
echo "<th style='width:111px;'>身分證字號</th>";
echo "<th style='width:111px;'>出生日期</th>";
echo "<th style='width:111px;'>email</th>";
echo "<th style='width:111px;'>飲食</th>";
echo "<th style='width:111px;'>聯絡電話</th>";
echo "<th style='width:111px;'>手機</th>";
echo "<th style='width:111px;'>9/8中餐</th>";
echo "<th style='width:111px;'>9/8晚宴</th>";
echo "<th style='width:111px;'>9/9中餐</th>";
echo "<th style='width:111px;'>高鐵 to 會場</th>";
echo "<th style='width:111px;'>會場 to 高鐵</th>";
echo "<th style='width:111px;'>會場 <-> 住宿</th>";
echo "<th style='width:111px;'>文教活動</th>";
echo "<th style='width:111px;'>學習時數</th>";
echo "<th style='width:111px;'>開車</th>";
echo "<th style='width:111px;'>車牌號碼</th>";
echo "</tr></thead>";
echo "<tbody>";
while($row = mysql_fetch_array($result))
{
	for($i=11; $i<=19; ++$i)
		$row[$i]=$row[$i]?"是":"否";
	echo "<tr style='width:2200px'>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$no</div></td>"; $no = $no + 1;
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[0]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[1]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[2]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[3]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[4]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[5]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[6]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[7]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[8]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[9]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[10]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[11]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[12]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[13]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[14]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[15]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[16]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[17]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[18]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[19]</div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'>$row[20]</div></td>";
	echo "</tr>";

}
	echo "</tbody></table>";
}
?>
</body>
</html>
