<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");?>
<pre><?print_r($_POST);?></pre>
<?
/*$arElem = array();
$arSelect = Array("ID", "NAME", "PREVIEW_TEXT");
$arFilter = Array("IBLOCK_ID"=>47, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 $arElem[$arFields['ID']] = $arFields['NAME']; 
 $arElem[$arFields['ID']] = $arFields['PREVIEW_TEXT'];  
}*/
function checktitle($array){
	foreach($array['ITEMS'] as $aa){
		$active = array_search ('Y', $aa);
		if($active == 'ACTIVE'){
			return true;				
		}else{
			return false;
		}			
	}
}
$html = '
<table width="100">
	<tr>
		<td><img src="/auditor/pdf/images/ctr.jpg" alt=""></td>
		<td>г. Самара, ул. Победы 4А<br>Тел.: +7 (846) 212 99 70</td>
		<td>E-mail:info@creativt.ru<br>www.creativt.ru</td>
	</tr>
</table>
';
$html .= '<div class="pdf_body">';
	foreach($_POST['ITEMS'] as $v){
		$html .= '<div class="section">';
			$title = false;		
			$title = checktitle($v);				
			if($title){	
				$html .= '<h2>'.$v['NAME'].'</h2>';
			}		
			foreach($v['ITEMS'] as $vv){		
				if($vv['ACTIVE'] == 'Y'){
					$html .= '<h3>'.$vv['NAME'].'</h3>';					
					//$html .= '<div class="description">'.$arElem[$vv['ID']].'</div>';
				}
			}		
		$html .= '</div>';?>
	<?}	

$html .= '</div>';
//$html .= ''.$_GET['name'];
echo $html;
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
$mpdf->Output();
exit;
/*include("mpdf/mpdf.php");
$mpdf=new mPDF('c'); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;*/