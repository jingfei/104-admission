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
		food1:	{identifier: 'food1',	rules:[{type: 'empty'}] },
		food2:	{identifier: 'food2',	rules:[{type: 'empty'}] },
		food3:	{identifier: 'food3',	rules:[{type: 'empty'}] },
	});
});
	</script>
</head>
<body>
	<div class="ui secondary pointing five item fixed top large menu">
		<a class="item" href="./">首頁&nbsp;&nbsp;&nbsp;Home</a>
		<a class="item" href="agenda.html">議程&nbsp;&nbsp;&nbsp;Agenda</a>
		<a class="item active">報名&nbsp;&nbsp;&nbsp;Registration</a>
		<a class="item" href="prop.php">提案&nbsp;&nbsp;&nbsp;Proposal</a>
		<a class="item" href="traffic.html">交通住宿&nbsp;&nbsp;&nbsp;Traffic & Stay </a>
	</div>
	<div style="width:80%;margin:70px 10%;">
		<h1 class="ui header">「104學年度公私立大學校院招生檢討會議」報名</h1>
		<form id="applyForm" class="ui large form error" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
			<font color=red> * 必要填寫欄位</font>
			<h4 class="ui dividing header">工作單位</h4>
			<div class="field">
				<div class="required ten wide field">
					<label for="school">學校</label>
					<input type="text" placeholder="School" id="school" name="school" class="required" size="25" maxlength="25" />
					<br>
				</div>
			</div>
			<div class="two fields">
				<div class="required five wide field">
					<label for="office">單位 (處、室、組)</label>
					<input type="text" placeholder="Office" id="office" name="office" class="required" size="25" maxlength="25" />
					<br>
				</div>
				<div class="required five wide field">
					<label for="title">職稱</label>
					<input type="text" placeholder="Job Title" id="title" name="title" class="required" size="25" maxlength="25" />
					<br>
				</div>
			</div>
			<h4 class="ui dividing header">個人資訊</h4>
			<div class="field">
				<div class="required five wide field">
					<label for="name">姓名</label>
					<input type="text" placeholder="Name" id="name" name="name" class="required" size="25" maxlength="25" />
					<br>
				</div>
			</div>
			<div class="two fields">
				<div class="required five wide field">
					<label for="id">身分證字號</label>
					<input type="text" placeholder="ID Number" id="id" name="id" class="required" size="25" maxlength="25" />
					<br>
				</div>
				<div class="required five wide field">
					<label for="birth">出生年月日</label>
					<input type="text" placeholder="Birthday (ex. 1990-10-10)" id="birth" name="birth" class="required" size="25" maxlength="25" />
					<br>
				</div>
			</div>
			<div class="field">
				<div class="required six wide field">
					<label for="cell">E-mail</label>
					<input type="text" placeholder="E-mail" id="email" name="email" class="required" size="25" maxlength="25"/>
					<br>
				</div>
			</div>
			<div class="two fields">
				<div class="required five wide field">
					<label for="tel">聯絡電話</label>
					<input type="text" placeholder="Telephone" id="tel" name="tel" class="required" size="25" maxlength="25" />
					<br>
				</div>
				<div class="five wide field">
					<label for="cell">手機</label>
					<input type="text" placeholder="Cell Phone" id="cell" name="cell" size="25" maxlength="25"/>
					<br>
				</div>
			</div>
			<h4 class="ui dividing header">用餐習慣</h4>
			<div class="inline three fields">
				<div class="required three wide field">
					<label for="food1">9月8日中餐</label>
					<select name="food1" id="food1" class="ui dropdown">
						<option value="">9月8日中餐</option>
						<option value="葷">葷</option>					
						<option value="素">素</option>	
					</select>
				</div>
				<div class="required three wide field">
					<label for="food2">9月8日晚宴</label>
					<select name="food2" id="food2" class="ui dropdown">
						<option value="">9月8日晚宴</option>
						<option value="葷">葷</option>					
						<option value="素">素</option>	
					</select>
				</div>
				<div class="required three wide field">
					<label for="food3">9月9日中餐</label>
					<select name="food3" id="food3" class="ui dropdown">
						<option value="">9月9日中餐</option>
						<option value="葷">葷</option>					
						<option value="素">素</option>	
					</select>
				</div>
			</div>
			<h4 class="ui dividing header">搭乘接駁專車</h4>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="car1" tabindex="0" class="hidden">
					<label>9月8日高鐵台南站至會場</label>
				</div>
			</div>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="car2" tabindex="0" class="hidden">
					<label>9月9日會場至高鐵台南站</label>
				</div>
			</div>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="car3" tabindex="0" class="hidden">
					<label>會場往返住宿飯店</label>
				</div>
			</div>
			<h4 class="ui dividing header">其他</h4>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="act" tabindex="0" class="hidden">
					<label>是否參加文教活動(暫訂奇美博物館)</label>
				</div>
			</div>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="time" tabindex="0" class="hidden">
					<label>需要公務人員終身學習時數</label>
				</div>
			</div>
			<br/>
			<div class="field">
				<button class="ui primary button" type="submit">確認報名</button>
			</div>
		</form>
	</div>
	<footer class="ui divider small header right aligned">Designed by Jingfei </footer>
</body>
</html>
