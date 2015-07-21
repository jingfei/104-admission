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
</head>
<body>
	<div class="ui secondary pointing five item fixed top large menu">
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
echo "<thead><tr>";
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
	echo "<td>$row[8]</td>";
	echo "<td>$row[9]</td>";
	echo "</tr>";

}
	echo "</tbody></table>";
}
?>
</body>
</html>
