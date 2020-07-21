<?php
	// Параметры для подключения к БД с даннными
	$db_host = "localhost"; 
	$db_user = "root";		// Логин БД
	$db_password = "";		// Пароль БД
	$db_table = "test";		// Имя Таблицы БД
	// Подключение к базе данных
	$db = mysql_connect($db_host,$db_user,$db_password)
		or die("Не могу создать соединение ");
	// Выборка базы
	mysql_select_db("test",$db);
	
	$result = mysql_query ('SELECT * FROM company WHERE id=1')//запрос на выборку нужных данных
			or die(mysql_error());
	$data = mysql_fetch_array($result);
?>
<?php
require_once("dompdf/dompdf_config.inc.php");
//разметка документа
$html =
'<html><meta http-equiv="content-type" content="text/html; charset=utf-8" /><body>'.
'<div class="main">
<table width="100%" style="font-family: Arial;">
	<tr >
		<td style="width: 68%; padding: 20px 0;">
			<div style="text-align: justify; font-size: 11pt;">Внимание! Оплата данного счета означает согласие с условиями поставки товара. Счет действителен в течение 5(пяти) банковских дней, не считая дня выписки счета. Уведомление об оплате  обязательно, в противном случае НЕ ГАРАНТИРУЕТСЯ наличие товара на складе. Товар отпускается по факту прихода денег на р/с Поставщика, самовывозом, при наличии доверенности и паспорта.</div>
		</td>
	</tr>
</table>
<table width="100%" border="2" style="border-collapse: collapse; width: 100%; font-family: Arial;" cellpadding="2" cellspacing="2">
	<tr style="">
		<td colspan="2" rowspan="2" style="min-height:13mm; width: 105mm;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" style="height: 13mm;">
				<tr>
					<td valign="top">
						<div>'. $data['BankName'] .'</div>
					</td>
				</tr>
				<tr>
					<td valign="bottom" style="height: 3mm;">
						<div style="font-size:10pt;">Банк получателя</div>
						<div style="font-size:10pt;">'. $data['BankName'] .'</div>
					</td>
				</tr>
			</table>
		</td>
		<td style="min-height:7mm;height:auto; width: 25mm;">
			<div>БИK</div>
		</td>
		<td rowspan="2" style="vertical-align: top; width: 60mm;">
			<div style=" height: 7mm; line-height: 7mm; vertical-align: middle;">044030555</div>
			<div>'. $data['BIK'] .'</div>
		</td>
	</tr>
	<tr>
		<td style="width: 25mm;">
			<div>Сч. №</div>
		</td>
	</tr>
	<tr>
		<td style="min-height:6mm; height:auto; width: 50mm;">
			<div>ИНН </div>
			<div>'. $data['INN'] .'</div>
		</td>
		<td style="min-height:6mm; height:auto; width: 55mm;">
			<div>КПП </div>
			<div>'. $data['KPP'] .'</div>
		</td>
		<td rowspan="2" style="min-height:19mm; height:auto; vertical-align: top; width: 25mm;">
			<div>Сч. №</div>
		</td>
		<td rowspan="2" style="min-height:19mm; height:auto; vertical-align: top; width: 60mm;">
			<div>40702810306000008712</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="min-height:13mm; height:auto;">
			<table border="0" cellpadding="0" cellspacing="0" style="height: 13mm; width: 105mm;">
				<tr>
					<td valign="top">
						<div>ООО ""</div>
					</td>
				</tr>
				<tr>
					<td valign="bottom" style="height: 3mm;">
						<div style="font-size: 10pt;">Получатель</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br/>
<div style="font-weight: bold; font-size: 25pt; padding-left:5px; font-family: Arial;">
	Счет № 0 от '. date("d.m.Y").'</div>
<br/>
<div style="background-color:#000000; width:100%; font-size:1px; height:2px;">&nbsp;</div>
<table width="100%" style="font-family: Arial;">
	<tr>
		<td style="width: 30mm; vertical-align: top;">
			<div style=" padding-left:2px; ">Поставщик:    </div>
		</td>
		<td>
			<div style="font-weight:bold;  padding-left:2px;">
				ООО "" ИНН , КПП ,<br>
				<span style="font-weight: normal;">, Российская Федерация, г. , Невский пр-кт, д. лит. ,<br> пом. , тел.: +7() , факс: +7()
				</span>
			</div>
		</td>
	</tr>
	<tr>
		<td style="width: 30mm; vertical-align: top;">
			<div style=" padding-left:2px;">Покупатель:    </div>
		</td>
		<td>
			<div style="font-weight:bold;  padding-left:2px;">
				ИП , ИНН 7564644646, КПП 45465446456,<br><span style="font-weight: normal;">213245, Российская Федерация, г. ,  пр-кт, д.151 лит. А,<br> пом. , тел.: +7() , факс: +7()  </span>            </div>
		</td>
	</tr>
</table>

<table border="2" width="100%" cellpadding="2" cellspacing="2" style="border-collapse: collapse; width: 100%; font-family: Arial;">
	<thead>
	<tr>
		<th style="width:13mm; ">№</th>
		<th>Товары (работы, услуги)</th>
		<th style="width:20mm; ">Кол-во</th>
		<th style="width:17mm; ">Ед.</th>
		<th style="width:27mm;  ">Цена</th>
		<th style="width:27mm;  ">Сумма</th>
	</tr>
	</thead>
	<tbody >
		<tr>
			<td style="width:13mm; ">№</td>
			<td>Товар</td>
			<td style="width:20mm; ">Кол-во</td>
			<td style="width:17mm; ">Шт.</td>
			<td style="width:27mm; text-align: center; ">Цена</td>
			<td style="width:27mm; text-align: center; ">Сумма</td>
		</tr>
	</tbody>
</table>

<table style="font-family: Arial;" border="0" width="100%" cellpadding="1" cellspacing="1">
	<tr>
		<td></td>
		<td style="width:27mm; font-weight:bold;  text-align:right;">Итого:</td>
		<td style="width:27mm; font-weight:bold;  text-align: center; ">0.00</td>
	</tr>
	<tr>
		<td></td>
		<td style="width:27mm; font-weight:bold;  text-align:right;">Итого НДС:</td>
		<td style="width:27mm; font-weight:bold;  text-align: center; ">0.00</td>
	</tr>
	<tr>
		<td></td>
		<td style="width:37mm; font-weight:bold;  text-align:right;">Всего к оплате:</td>
		<td style="width:27mm; font-weight:bold;  text-align: center; ">0.00</td>
	</tr>
</table>

<br/>
<div style="font-family: Arial;">
Всего наименований 0 на сумму 0.00 рублей.<br />
Ноль рублей 00 копеек</div>
<br /><br />
<div style="background-color:#000000; width:100%; font-size:1px; height:2px;">&nbsp;</div>
<br/>
	<div style="font-family: Arial; font-size: 10pt;">
1. Счет действителен в течении 5 (пяти) банковских дней, не считая дня выписки счета. В случае нарушения срока оплаты сохранение цены на товар и наличие товара на складе НЕ ГАРАНТИРУЕТСЯ.<br />
2. Оплата данного счета означает согласие с условиями изложенными в п.1</div>
	<br /><br />
<div>Руководитель ______________________ </div>
<br/>  <br /><br />

<div>Главный бухгалтер ______________________</div>
<br/>

<div style="width: 85mm;text-align:center;">М.П.</div>
<br/>
	</div>
	<br/>  <br /><br /><br/>  <br /><br /><br/>  <br /><br />
</div>'.

'</body></html>';

$dompdf = new DOMPDF();			//настройки создания pdf
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('mypdf.pdf'); // Выводим результат (скачивание)

?>
<?php
	mysql_close($db);
?>