<?php
$html = '

<table width="100">
	<tr>
		<td><img src="/auditor/pdf/images/ctr.jpg" alt=""></td>
		<td>г. Самара, ул. Победы 4А<br>Тел.: +7 (846) 212 99 70</td>
		<td>E-mail:info@creativt.ru<br>www.creativt.ru</td>
	</tr>
</table>
<h1>Аудит</h1>
';

include("mpdf/mpdf.php");
//Кодировка | Формат | Размер шрифта | Шрифт
//Отступы: слева | справа | сверху | снизу | шапка | подвал
$mpdf = new mPDF('utf-8', 'A4', '10', 'Arial');
$mpdf->charset_in = 'utf-8';

$stylesheet = 'table {
                    text-align: center;
                    width: 100%;
                    color: #000;
                    margin: 0;
                    float: left;
               }
               td {
                    width: 80px;
               }
			   h1{
				   text-align:center;
			   }
			   ';

//Записываем стили
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->list_indent_first_level = 0;
//Записываем html
$mpdf->WriteHTML($html, 2);
$mpdf->Output('mpdf.pdf', 'I');
exit;
/*include("mpdf/mpdf.php");
$mpdf=new mPDF('c'); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;*/