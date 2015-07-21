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
		<a class="item active" href="modify_reg.php">2. 修改報名資料</a>
		<a class="item" href="show_prop.php">3. 列出提案資料</a>
		<a class="item" href="modify_prop.php">4. 修改提案資料</a>
		<a class="item" href="logout.php">5. 登出</a>
	</div>
<?php
include("config.php");
$no = 1;
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
if($_POST["submit"] == "修改"){
    $check = "UPDATE `register` SET `school`='" .$_POST["school"]. "',`office`='" .$_POST["office"]. "',`title`='" .$_POST["title"]. "',`name`='" .$_POST["name"]. "',`id`='" .$_POST["id"]. "',`birth`='" .$_POST["birth"]. "',`email`='" .$_POST["email"]. "',`food`='" .$_POST["food"]. "',`tel`='" .$_POST["tel"]. "',`cell`='" .$_POST["cell"]. "',`food1`='" .$_POST["food1"]. "',`food2`='" .$_POST["food2"]. "',`food3`='" .$_POST["food3"]. "',`car1`='" .$_POST["car1"]. "',`car2`='" .$_POST["car2"]. "',`car3`='" .$_POST["car3"]. "',`other1`='" .$_POST["other1"]. "',`other2`='" .$_POST["other2"]. "',`other3`='" .$_POST["other3"]. "',`plate`='" .$_POST["plate"]. "' WHERE `id`='" .$_POST["id"]. "'";
    //echo "$check";
    $result = mysql_query($check) or die("modify error!");
}
else if($_POST["submit"] == "刪除"){
$check = "DELETE FROM `register` WHERE `id` = '" .$_POST["id"]. "'";
$result = mysql_query($check) or die("nope!");
//    echo "$check";

//Selected team deleted.
}

$check = "SELECT * FROM `register`";
$result = mysql_query($check) or die("nope!");

echo "<table class='ui definition table'>";
echo "<thead><tr>";
echo "<th></th>";
echo "<th>報名時間</th>";
echo "<th>學校</th>";
echo "<th>單位</th>";
echo "<th>職稱</th>";
echo "<th>姓名</th>";
echo "<th>身分證字號</th>";
echo "<th>出生日期</th>";
echo "<th>email</th>";
echo "<th>飲食</th>";
echo "<th>聯絡電話</th>";
echo "<th>手機</th>";
echo "<th>9/8中餐</th>";
echo "<th>9/8晚宴</th>";
echo "<th>9/9中餐</th>";
echo "<th>高鐵 to 會場</th>";
echo "<th>會場 to 高鐵</th>";
echo "<th>會場 <-> 住宿</th>";
echo "<th>文教活動</th>";
echo "<th>學習時數</th>";
echo "<th>開車</th>";
echo "<th>車牌</th>";
echo "<th></th>";
echo "<th></th>";
echo "</thead></tr>";
echo "<tbody>";
while($row = mysql_fetch_array($result))
{
	echo "<form action='modify_reg.php' method=post><tr>";
	echo "<td>$no</td>"; $no = $no + 1;
	echo "<td>$row[0]</td>";
	echo "<td><input name='school' type=text size=15 value='$row[1]'></td>";
	echo "<td><input name='office' type=text size=15 value='$row[2]'></td>";
	echo "<td><input name='title' type=text size=15 value='$row[3]'></td>";
	echo "<td><input name='name' type=text size=18 value='$row[4]'></td>";
	echo "<td><input name='id' type=text size=10 value='$row[5]'></td>";
	echo "<td><input name='birth' type=text size=10 value='$row[6]'></td>";
	echo "<td><input name='email' type=text size=28 value='$row[7]'></td>";
	echo "<td><input name='food' type=text size=3 value='$row[8]'></td>";
	echo "<td><input name='tel' type=text size=15 value='$row[9]'></td>";
	echo "<td><input name='cell' type=text size=15 value='$row[10]'></td>";
	echo "<td><input name='food1' type=text size=2 value='$row[11]'></td>";
	echo "<td><input name='food2' type=text size=2 value='$row[12]'></td>";
	echo "<td><input name='food3' type=text size=2 value='$row[13]'></td>";
	echo "<td><input name='car1' type=text size=2 value='$row[14]'></td>";
	echo "<td><input name='car2' type=text size=2 value='$row[15]'></td>";
	echo "<td><input name='car3' type=text size=2 value='$row[16]'></td>";
	echo "<td><input name='other1' type=text size=2 value='$row[17]'></td>";
	echo "<td><input name='other2' type=text size=2 value='$row[18]'></td>";
	echo "<td><input name='other3' type=text size=2 value='$row[19]'></td>";
	echo "<td><input name='plate' type=text size=7 value='$row[20]'></td>";
	echo "<td><input type=submit name=submit value='修改'></td>";
	echo "<td><input type=submit value='刪除' name=submit></td>";
	echo "</tr></form>";

}
	echo "</table>";
}
?>
</body>
</html>
