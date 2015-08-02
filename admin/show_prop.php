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
		<a class="item" href="show_reg.php">1. 列出報名資料</a>
		<a class="item" href="modify_reg.php">2. 修改報名資料</a>
		<a class="item active" href="show_prop.php">3. 列出提案資料</a>
		<a class="item" href="modify_prop.php">4. 修改提案資料</a>
		<a class="item" href="logout.php">5. 登出</a>
	</div>
<?php
include("config.php");
$no = 1;

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
$check = "SELECT * FROM `proposal`";
$result = mysql_query($check) or die("nope!");

echo "<table class='ui definition celled table'>";
echo "<thead><tr id='header'>";
echo "<th></th>";
echo "<th>提案時間</th>";
echo "<th>案由</th>";
echo "<th>類別</th>";
echo "<th>分類</th>";
echo "<th>提案單位</th>";
echo "<th>聯絡人</th>";
echo "<th>電話</th>";
echo "<th>說明</th>";
echo "<th>辦法</th>";
echo "</tr></thead>";
echo "<tbody>";
while($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>$no</td>"; $no = $no + 1;
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	echo "<td>$row[5]</td>";
	echo "<td>$row[6]</td>";
	echo "<td>$row[7]</td>";
	$row[8] = str_replace("\n", "<br/>", $row[8]);
	$row[8] = str_replace(" ", "&nbsp;", $row[8]);
	echo "<td>$row[8]</td>";
	$row[9] = str_replace("\n", "<br/>", $row[9]);
	$row[9] = str_replace(" ", "&nbsp;", $row[9]);
	echo "<td>$row[9]</td>";
	echo "</tr>";

}
	echo "</tbody></table>";
}
?>
</body>
</html>
