<?php
	session_start();
	// Вывод заголовка с данными о кодировке страницы
	header('Content-Type: text/html; charset=utf-8');
	// Настройка локали
	setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');
	// Настройка подключения к базе данных
	mysql_query('SET names "utf8"');
?>
<!--Форма внесения данных-->
<html>
	<head>
		<title>Ввод данных</title>
		<!--<link rel="stylesheet" type="text/css" href="css/formstyle.css">-->
		<link rel="stylesheet" type="text/css" href="css/allstyle.css">
		<? include("includef/menu_adm.php"); ?>
	</head>
	<body>
		<!--<center>-->
			<form id="form" method="POST" action="" method="post">
				<div class="pole">
					<label>Наименование Банка получателя</label>
					<input name="AppType" type="text" />							<br>
				</div>
				<div class="pole">
					<label>ИНН</label><br>
					<input name="TypeOfINN" type="text"/>							<br>
				</div>
				<div class="pole">
					<label>БИК</label><br>
					<input name="TypeOfBIK" type="text"/>							<br>
				</div>
				<div class="pole">
					<label>КПП</label><br>
					<input name="TypeOfKPP" type="text"/>							<br>
				</div>
				<div class="pole">
					<label>Наименование Компании</label><br>
					<input name="CompName" type="text"/>							<br>
				</div>
				<div class="pole">
					<label>Адрес</label><br>
					<input name="Address" type="text"/>								<br>
				</div>
				<div class="sub">
					<input name="submit" type="submit" value="GOIN">
				</div>
			</form>
		<!--</center>-->
	</body>
	<?php
	if(isset($_POST['submit'])){
		$AppType = $_POST['AppType'];
		$TypeOfINN = $_POST['TypeOfINN'];
		$TypeOfBIK = $_POST['TypeOfBIK'];
		$TypeOfKPP = $_POST['TypeOfKPP'];
		$CompName = $_POST['CompName'];
		$Address = $_POST['Address'];
		// Параметры для подключения
		$db_host = "localhost"; 
		$db_user = "root";			// Логин БД
		$db_password = "";			// Пароль БД
		$db_table = "test";			// Имя Таблицы БД
		// Подключение к базе данных
		$db = mysql_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
		// Выборка базы
		mysql_select_db("Company",$db);

		//Запрос для записи в БД и запись его в переменную
		$result = mysql_query ("INSERT INTO `test`.`company`(`BankName`,`INN`,`BIK`,`KPP`,`CompName`,`Address`) VALUES ('$AppType','$TypeOfINN','$TypeOfBIK','$TypeOfKPP','$CompName','$Address')")
				or die(mysql_error());
		//Создадим небольшую проверку, чтобы знать, выполнился ли наш запрос или нет.
		mysql_close($db);
	}
	?>
</html>