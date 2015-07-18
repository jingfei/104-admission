<!DOCTYPE html>
<html>
<head>
	<title>104學年度公私立大學校院招生檢討會</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="keywords" content="招生檢討會">
	<link rel="shortcut icon" href="img/school.ico" type="image/x-icon" />
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script src="js/main.js"></script>
	<link rel=stylesheet type="text/css" href="style/main.css"/>
	<link rel=stylesheet type="text/css" href="style/semantic.min.css"/>
	<script>
$(document).ready( function() {
	$('.ui.checkbox').checkbox();
	$('select.dropdown').dropdown();
	$("input").focus(function(){
		$(this).css("background-color","#dedede");
	});
	$("input").blur(function(){
		$(this).css("background-color","#ffffff");
	});
	$('#applyForm').form({
		school:	{identifier: 'school', 	rules:[{type: 'empty'}] },
		office:	{identifier: 'office',	rules:[{type: 'empty'}] },
		title:	{identifier: 'title',	rules:[{type: 'empty'}] },
		name:	{identifier: 'name',	rules:[{type: 'empty'}] },
		id:		{identifier: 'id',		rules:[{type: 'empty'}] },
		birth:	{identifier: 'birth',	rules:[{type: 'empty'}] },
		email:	{identifier: 'email',	rules:[{type: 'empty'},{type: 'email'}] },
		tel:	{identifier: 'tel',		rules:[{type: 'empty'}] },
		food:	{identifier: 'food',	rules:[{type: 'empty'}] },
	});
});
	</script>
</head>
<body>
<?php
include("config.php");

// define variables and set to empty values
$schoolErr = $officeErr = $titleErr = $nameErr = $idErr = $birthErr = $emailErr = $telErr = $cellErr = $foodErr = "";
$school = $office = $title = $name = $id = $birth = $email = $tel = $cell = $food = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$school = test_input($_POST["school"]);
	$office = test_input($_POST["office"]);
	$title = test_input($_POST["title"]);
	$name = test_input($_POST["name"]);
	$id = test_input($_POST["id"]);
	$birth = test_input($_POST["birth"]);
	$email = test_input($_POST["email"]);
	$food = test_input($_POST["food"]);
	$tel = test_input($_POST["tel"]);
	$cell = test_input($_POST["cell"]);
	$food1 = test_input($_POST["food1"]) == "on" ? 1 : 0;
	$food2 = test_input($_POST["food2"]) == "on" ? 1 : 0;
	$food3 = test_input($_POST["food3"]) == "on" ? 1 : 0;
	$car1 = test_input($_POST["car1"]) == "on" ? 1 : 0;
	$car2 = test_input($_POST["car2"]) == "on" ? 1 : 0;
	$car3 = test_input($_POST["car3"]) == "on" ? 1 : 0;
	$other1 = test_input($_POST["other1"]) == "on" ? 1 : 0;
	$other2 = test_input($_POST["other2"]) == "on" ? 1 : 0;
	
	$check = "SELECT * FROM `register` WHERE `id` = '$id'";
	$result = mysql_query($check)or die ("Error in query: $check. " . mysql_error());
	$rows = mysql_fetch_array($result);

	//判斷隊伍名稱是否為空值
	if (empty($rows)){
		$sql = "INSERT into `register` (school, office, title, name, id, birth, email, food, tel, cell, food1, food2, food3, car1, car2, car3, other1, other2) values ('$school','$office','$title','$name','$id','$birth','$email','$food','$tel','$cell','$food1','$food2','$food3','$car1','$car2','$car3','$other1','$other2')";
		if(mysql_query($sql)){
			echo '<meta http-equiv=REFRESH CONTENT=1;url=success.html>';
		}
		else{
			echo '<meta http-equiv=REFRESH CONTENT=1;url=fail.html>';
		}
	}
	else{
		$idErr = "重複報名!!";
	}
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data, ENT_QUOTES);
   return $data;
}
?>
	<div class="ui secondary pointing five item fixed top large menu">
		<a class="item" href="./">首頁&nbsp;&nbsp;&nbsp;Home</a>
		<a class="item" href="agenda.html">議程&nbsp;&nbsp;&nbsp;Agenda</a>
		<a class="item active">報名&nbsp;&nbsp;&nbsp;Registration</a>
		<a class="item" href="prop.php">提案&nbsp;&nbsp;&nbsp;Proposal</a>
		<a class="item" href="trans.html">交通住宿&nbsp;&nbsp;&nbsp;Transport & Stay</a>
	</div>
	<div style="width:80%;margin:70px 10%;">
		<h1 class="ui header">「104學年度公私立大學校院招生檢討會議」報名</h1>
		<form id="applyForm" class="ui large form error" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES);?>" onSubmit="return validForm();">	
<?php if($idErr!=="")
	echo '
			<div class="ui error message">
			    <div class="header">Action Forbidden</div>
			    <p>'.$idErr.'</p>
			</div>';
?>
			<font color=red> * 必要填寫欄位</font>
			<h4 class="ui dividing header">工作單位</h4>
			<div class="field">
				<div class="required ten wide field">
					<label for="school">學校</label>
					<input type="text" placeholder="School" id="school" name="school" class="required" size="25" maxlength="25" value="<?php echo $school ?>" />
					<br>
				</div>
			</div>
			<div class="two fields">
				<div class="required five wide field">
					<label for="office">單位 (處、室、組)</label>
					<input type="text" placeholder="Office" id="office" name="office" class="required" size="25" maxlength="25" value="<?php echo $office ?>" />
					<br>
				</div>
				<div class="required five wide field">
					<label for="title">職稱</label>
					<input type="text" placeholder="Job Title" id="title" name="title" class="required" size="25" maxlength="25" value="<?php echo $title ?>" />
					<br>
				</div>
			</div>
			<h4 class="ui dividing header">個人資訊</h4>
			<div class="field">
				<div class="required five wide field">
					<label for="name">姓名</label>
					<input type="text" placeholder="Name" id="name" name="name" class="required" size="25" maxlength="25" value="<?php echo $name ?>" />
					<br>
				</div>
			</div>
			<div class="two fields">
				<div class="required five wide field">
					<label for="id">身分證字號</label>
					<input type="text" placeholder="ID Number" id="id" name="id" class="required" size="25" maxlength="25" value="<?php echo $id ?>" />
					<br>
				</div>
				<div class="required five wide field">
					<label for="birth">出生年月日</label>
					<input type="text" placeholder="Birthday (ex. 1990-10-10)" id="birth" name="birth" class="required" size="25" maxlength="25" value="<?php echo $birth ?>" />
					<br>
				</div>
			</div>
			<div class="two fields">
				<div class="required six wide field">
					<label for="cell">E-mail</label>
					<input type="text" placeholder="E-mail" id="email" name="email" class="required" size="25" maxlength="25" value="<?php echo $email ?>"/>
					<br>
				</div>
				<div class="required three wide field">
					<label for="food">飲食習慣</label>
					<select name="food" id="food" class="ui dropdown">
						<option value="">Food</option>
						<option value="葷" <?php if($food=="葷") echo selected ?>>葷</option>					
						<option value="素" <?php if($food=="素") echo selected ?>>素</option>	
					</select>
				</div>
			</div>
			<div class="two fields">
				<div class="required five wide field">
					<label for="tel">聯絡電話</label>
					<input type="text" placeholder="Telephone" id="tel" name="tel" class="required" size="25" maxlength="25" value="<?php echo $tel ?>" />
					<br>
				</div>
				<div class="five wide field">
					<label for="cell">手機</label>
					<input type="text" placeholder="Cell Phone" id="cell" name="cell" size="25" maxlength="25" value="<?php echo $cell ?>"/>
					<br>
				</div>
			</div>
			<h4 class="ui dividing header">是否參與用餐</h4>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="food1" tabindex="0" class="hidden" <?php if($food1==1) echo checked ?>>
					<label for="food1">9月8日中餐</label>
				</div>
			</div>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="food2" tabindex="0" class="hidden" <?php if($food2==1) echo checked ?>>
					<label for="food2">9月8日晚宴</label>
				</div>
			</div>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="food3" tabindex="0" class="hidden" <?php if($food3==1) echo checked ?>>
					<label for="food3">9月9日中餐</label>
				</div>
			</div>
			<h4 class="ui dividing header">搭乘接駁專車</h4>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="car1" tabindex="0" class="hidden" <?php if($car1==1) echo checked ?>>
					<label>9月8日高鐵台南站至會場</label>
				</div>
			</div>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="car2" tabindex="0" class="hidden" <?php if($car2==1) echo checked ?>>
					<label>9月9日會場至高鐵台南站</label>
				</div>
			</div>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="car3" tabindex="0" class="hidden" <?php if($car3==1) echo checked ?>>
					<label>會場往返住宿飯店</label>
				</div>
			</div>
			<h4 class="ui dividing header">其他</h4>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="other1" tabindex="0" class="hidden" <?php if($other1==1) echo checked ?>>
					<label>是否參加文教活動(暫訂奇美博物館)</label>
				</div>
			</div>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="other2" tabindex="0" class="hidden" <?php if($other2==1) echo checked ?>>
					<label>需要公務人員終身學習時數</label>
				</div>
			</div>
			<br/>
			<div class="field">
				<button class="ui primary button" type="submit">確認報名</button>
			</div>
		</form>
	</div>
	<footer class="ui divider grid small header" style="margin:0 10px">
		<div class="stackable row">
			<div class="left floated four wide column">
				[contact]<br/>
				招生組組長 黃信復<br/> 06-2757575 #50191<br/> sfhuang@mail.ncku.edu.tw<br/><br/>
			</div>
			<div class="left floated four wide column"><br/>
				招生組組員 許明如<br/> 06-2757575 #50198<br/> z9302009@email.ncku.edu.tw
			</div>
			<div class="right floated right aligned six wide column" style="color:gray"><br/>
				Copyright &copy; 2015 國立成功大學<br/>
				70101 台南市東區大學路一號&nbsp;｜&nbsp;06-2757575<br/>
				Designed by Jingfei
			</div>
		</div>
	</footer>
</body>
</html>
<script>
function validForm(){
	$ans = confirm('報名後便無法修改，請再次確認內容是否正確');
	if($ans)
		return true;
	return false;
}
</script>
