<!DOCTYPE html>
<html>
<head>
	<title>104學年度公私立大學校院招生檢討會</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="keywords" content="招生檢討會">
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
	<div class="ui secondary pointing four item fixed top large menu">
		<a class="item" href="./">首頁&nbsp;&nbsp;&nbsp;Home</a>
		<a class="item active" id="btn_reg">報名&nbsp;&nbsp;&nbsp;Registration</a>
		<a class="item" id="btn_pro" href="prop.php">提案&nbsp;&nbsp;&nbsp;Proposal</a>
		<a class="item" id="btn_tra" href="traffic.html">交通住宿&nbsp;&nbsp;&nbsp;Traffic & Stay </a>
	</div>
	<div style="width:80%;margin:70px 10%;">
		<form id="applyForm" class="ui large form error" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
			<font color=red> * 必要填寫欄位</font><br/><br/>
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
			<br/>
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
			<div class="two fields">
				<div class="required six wide field">
					<label for="cell">E-mail</label>
					<input type="text" placeholder="E-mail" id="email" name="email" class="required" size="25" maxlength="25"/>
					<br>
				</div>
				<div class="required four wide field">
					<label for="food">用餐習慣</label>
					<select name="food" id="food" class="ui food dropdown">
						<option value="">food</option>
						<option value="葷">葷</option>					
						<option value="素">素</option>	
					</select>
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
			<br/>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="act" tabindex="0" class="hidden">
					<label>參加文教活動(暫訂奇美博物館)</label>
				</div>
			</div>
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="car" tabindex="0" class="hidden">
					<label>搭乘接駁車往返會議場地及飯店</label>
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
