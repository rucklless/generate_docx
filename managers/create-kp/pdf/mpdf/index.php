<?php
$html = '<table_ border="1"><tr_><td_>������ 1</td_><td_>������ 2</td_><td_>������ 3</td_><td_>������ 4</td_></tr_>
<tr_><td_>������ 5</td_><td_>������ 6</td_><td_>������ 7</td_><td_><a_ href="http://mpdf.bpm1.com/" title="mPDF">mPDF</a_></td_></tr_></table_>';

include("mpdf50/mpdf.php");

$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10); /*������ ������, ������� �.�.�.*/
$mpdf->charset_in = 'cp1251'; /*�� �������� ��� �������*/

$stylesheet = file_get_contents('style.css'); /*���������� css*/
$mpdf->WriteHTML($stylesheet, 1);

$mpdf->list_indent_first_level = 0;
$mpdf->WriteHTML($html, 2); /*��������� pdf*/
$mpdf->Output('mpdf.pdf', 'I');
?>