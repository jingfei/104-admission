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
		<a class="item" href="show_prop.php">3. 列出提案資料</a>
		<a class="item active" href="modify_prop.php">4. 修改提案資料</a>
		<a class="item" href="logout.php">5. 登出</a>
	</div>
<?php
include("config.php");
$no = 1;

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
if($_POST["submit"] == "修改"){
    $check = "UPDATE `proposal` SET `reason`='" .$_POST["reason"]. "',`class1`='" .$_POST["class1"]. "',`class2`='" .$_POST["class2"]. "',`office`='" .$_POST["office"]. "',`name`='" .$_POST["name"]. "',`tel`='" .$_POST["tel"]. "',`text1`='" .$_POST["text1"]. "',`text2`='" .$_POST["text2"]. "' WHERE `id`='" .$_POST["id"]. "'";
    //echo "$check";
    $result = mysql_query($check) or die("modify error!");
}
else if($_POST["submit"] == "刪除"){
$check = "DELETE FROM `proposal` WHERE `id` = '" .$_POST["id"]. "'";
$result = mysql_query($check) or die("nope!");
//    echo "$check";

//Selected team deleted.
}

$check = "SELECT * FROM `proposal`";
$result = mysql_query($check) or die("nope!");

echo "<table class='ui definition table'>";
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
echo "<th></th>";
echo "<th></th>";
echo "</thead></tr>";
echo "<tbody>";
while($row = mysql_fetch_array($result))
{
	echo "<form action='modify_prop.php' method=post><tr>";
	echo "<td>$no<input type='hidden' name='id' value='$row[0]'></td>"; $no = $no + 1;
	echo "<td>$row[1]</td>";
	echo "<td><input name='reason' type=text size=25 value='$row[2]'></td>";
	echo "<td><input name='class1' type=text size=15 value='$row[3]'></td>";
	echo "<td><input name='class2' type=text size=6 value='$row[4]'></td>";
	echo "<td><input name='office' type=text size=15 value='$row[5]'></td>";
	echo "<td><input name='name' type=text size=18 value='$row[6]'></td>";
	echo "<td><input name='tel' type=text size=15 value='$row[7]'></td>";
	echo "<td><textarea name='text1' rows='5'>$row[8]</textarea></td>";
	echo "<td><textarea name='text2' rows='5'>$row[9]</textarea></td>";
	echo "<td><input type=submit name=submit value='修改'></td>";
	echo "<td><input type=submit value='刪除' name=submit></td>";
	echo "</tr></form>";

}
	echo "</table>";
}

?>
</body>
</html>
