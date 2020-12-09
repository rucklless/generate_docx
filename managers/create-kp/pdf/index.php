<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$arElem = array();
$arSelect = Array("ID", "NAME", "PREVIEW_TEXT");
$arFilter = Array("IBLOCK_ID"=>47, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 $arElem[$arFields['ID']] = $arFields['NAME']; 
 $arElem[$arFields['ID']] = $arFields['PREVIEW_TEXT'];  
}
function checktitle($arr){
	foreach($arr['ITEMS'] as $aa){
		$active = array_search ('Y', $aa);
		if($active == 'ACTIVE'){
			return true;				
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
$html .= '<div class="title">';
$html .= 'Аудит сайта '.$_POST['site'];
$html .= '</div>';
$html .= '<div class="pdf_body">';
	foreach($_POST['ITEMS'] as $v){		
		$html .= '<div class="section">';			
			$title = false;			
			$title = checktitle($v);			
			if($title){	
				$html .= '<h1>'.$v['NAME'].'</h1>';
				foreach($v['ITEMS'] as $vv){		
					if($vv['ACTIVE'] == 'Y'){
						$html .= '<h2>'.$vv['NAME'].'</h2>';
						$html .= '<div class="description">'.$arElem[$vv['ID']].'';
						$html .= ''.$vv['COMMENT'].'</div>';						
					}
				}
			}		
		$html .= '</div>';?>
	<?}	

$html .= '</div>';
include("mpdf/mpdf.php");
$mpdf = new mPDF('Windows-1251', 'A4', '10', 'Arial');
$mpdf->charset_in = 'Windows-1251';

$stylesheet = '
				body {
					font-family: serif;
					
				}
				table {
                    text-align: center;
                    width: 100%;
                    color: #000;
                    margin: 0;
                    float: left;
					font-size: 12px;
               }
               td {
                    width: 80px;
               }
			   h1{
				   text-align:center;
			   }
			   .title{
				   font-size:36px;
				   text-align:center;
				   margin: 30px 0;
				   font-weight:bold;
			   }
			   h1{
				   page-break-before:always;
			   }
			   ';
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->list_indent_first_level = 0;
$mpdf->WriteHTML($html, 2);
$mpdf->Output();
exit;?>