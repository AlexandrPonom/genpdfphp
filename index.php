<?php
	// Вывод заголовка с данными о кодировке страницы
	header('Content-Type: text/html; charset=utf-8');
	// Настройка локали
	setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');
	// Настройка подключения к базе данных
	mysql_query('SET names "utf8"');
?>
<html>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<head>
		<title>Вывод таблицы</title>
		<link rel="stylesheet" type="text/css" href="css/allstyle.css">
		<? include("includef/menu_adm.php"); ?>
	</head>
	<body>
		<main>
			Основная таблица
		</main>
	</body>
</html>