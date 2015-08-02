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
	<style>ul{font-size:1.1em;}table{position:absolute;top:40px;}td{width:100px;word-wrap:break-word;}input{width:90%;}</style>
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
}

$check = "SELECT * FROM `register` ORDER BY `time`";
$result = mysql_query($check) or die("nope!");

echo "<table class='ui definition celled table'>";
echo "<thead><tr id='header'>";
echo "<th style='width:61px;'></th>";
echo "<th style='width:211px;'>報名時間</th>";
echo "<th style='width:211px;'>學校</th>";
echo "<th style='width:211px;'>單位</th>";
echo "<th style='width:211px;'>職稱</th>";
echo "<th style='width:211px;'>姓名</th>";
echo "<th style='width:211px;'>身分證字號</th>";
echo "<th style='width:211px;'>出生日期</th>";
echo "<th style='width:211px;'>email</th>";
echo "<th style='width:111px;'>飲食</th>";
echo "<th style='width:211px;'>聯絡電話</th>";
echo "<th style='width:211px;'>手機</th>";
echo "<th style='width:111px;'>9/8中餐</th>";
echo "<th style='width:111px;'>9/8晚宴</th>";
echo "<th style='width:111px;'>9/9中餐</th>";
echo "<th style='width:111px;'>高鐵 to 會場</th>";
echo "<th style='width:111px;'>會場 to 高鐵</th>";
echo "<th style='width:111px;'>會場 <-> 住宿</th>";
echo "<th style='width:111px;'>文教活動</th>";
echo "<th style='width:111px;'>學習時數</th>";
echo "<th style='width:111px;'>開車</th>";
echo "<th style='width:161px;'>車牌</th>";
echo "<th style='width:111px;'></th>";
echo "<th style='width:111px;'></th>";
echo "</thead></tr>";
echo "<tbody>";
while($row = mysql_fetch_array($result))
{
	echo "<form action='modify_reg.php' method=post><tr style='width:3500px;'>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:50px'>$no</td>"; $no = $no + 1;
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'>$row[0]</td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'><input name='school' type=text size=15 value='$row[1]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'><input name='office' type=text size=15 value='$row[2]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'><input name='title' type=text size=15 value='$row[3]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'><input name='name' type=text size=18 value='$row[4]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'><input name='id' type=text size=10 value='$row[5]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'><input name='birth' type=text size=10 value='$row[6]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'><input name='email' type=text size=28 value='$row[7]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='food'><option value='葷'>葷</option><option value='素' ".($row[8]=="素"?"selected":"").">素</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'><input name='tel' type=text size=15 value='$row[9]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:200px'><input name='cell' type=text size=15 value='$row[10]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='food1'><option value='1'>是</option><option value='0' ".($row[11]?"":"selected").">否</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='food2'><option value='1'>是</option><option value='0' ".($row[12]?"":"selected").">否</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='food3'><option value='1'>是</option><option value='0' ".($row[13]?"":"selected").">否</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='car1'><option value='1'>是</option><option value='0' ".($row[14]?"":"selected").">否</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='car2'><option value='1'>是</option><option value='0' ".($row[15]?"":"selected").">否</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='car3'><option value='1'>是</option><option value='0' ".($row[16]?"":"selected").">否</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='other1'><option value='1'>是</option><option value='0' ".($row[17]?"":"selected").">否</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='other2'><option value='1'>是</option><option value='0' ".($row[18]?"":"selected").">否</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><select name='other3'><option value='1'>是</option><option value='0' ".($row[19]?"":"selected").">否</option></select></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:150px'><input name='plate' type=text size=7 value='$row[20]'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><input type=submit name=submit value='修改'></div></td>";
	echo "<td style='padding:5px'><div style='word-wrap:break-word;width:100px'><input type=submit value='刪除' name=submit></div></td>";
	echo "</tr></form>";

}
	echo "</table>";
}
?>
</body>
</html>
