<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");?>
<?
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
	?><div class="pdf_body">
	<?
	foreach($_REQUEST['ITEMS'] as $v){?>
		<div class="section">		
			<?$title = false;		
			$title = checktitle($v);				
			if($title){		
				?><h2><?=$v['NAME'];?></h2><?		
			}		
			foreach($v['ITEMS'] as $vv){		
				if($vv['ACTIVE'] == 'Y'){?>		
					<h3><?=$vv['NAME']?></h3>		
					<?$vv['ID'];?>		
					<div class="description"><?=$arElem[$vv['ID']];?></div>
				<?}
			}?>		
		</div>
	<?}?>
	</div>
	<?
	

/*function file_force_download($file) {
	if (file_exists($file)) {
	// сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
	// если этого не сделать файл будет читаться в память полностью!
	if (ob_get_level()){
		ob_end_clean();
	}
	// заставляем браузер показать окно сохранения файла
	header('Content-Description: File Transfer');
	header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	header('Content-Disposition: attachment; filename=' . basename($file));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: max-age=0');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	// читаем файл и отправляем его пользователю
	readfile($file);
	exit;
	}
}

$arResult["ALL_DAY"] = $_REQUEST["ALL_DAY"];
$arResult["ALL_PRICE"] = $_REQUEST["ALL_PRICE"];

$file = "./word_templates/viz.docx";
$newfile = "./word_ok/viz.docx";

$file_name = substr($newfile, 10);

if(!copy($file, $newfile)){
	echo 'error';
}

$arResult["ITEMS"] = $_REQUEST["ITEMS"];

$table = '</w:t></w:r></w:p><w:tbl><w:tblPr><w:tblW w:w="10049" w:type="dxa"/><w:tblInd w:w="93" w:type="dxa"/><w:tblLook w:val="04A0" w:firstRow="1" w:lastRow="0" w:firstColumn="1" w:lastColumn="0" w:noHBand="0" w:noVBand="1"/></w:tblPr><w:tblGrid><w:gridCol w:w="6819"/><w:gridCol w:w="1701"/><w:gridCol w:w="1529"/></w:tblGrid>';

$table .= '<w:tr w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidTr="00712599"><w:trPr><w:trHeight w:val="300"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="6819" w:type="dxa"/><w:tcBorders><w:top w:val="single" w:sz="8" w:space="0" w:color="auto"/><w:left w:val="single" w:sz="8" w:space="0" w:color="auto"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:noWrap/><w:vAlign w:val="center"/><w:hideMark/></w:tcPr><w:p w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidRDefault="00C46B12" w:rsidP="00712599"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr></w:pPr><w:r w:rsidRPr="00186D9F"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr><w:t>Наименование работ</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1701" w:type="dxa"/><w:tcBorders><w:top w:val="single" w:sz="8" w:space="0" w:color="auto"/><w:left w:val="nil"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:noWrap/><w:vAlign w:val="center"/><w:hideMark/></w:tcPr><w:p w:rsidR="00D24DEF" w:rsidRDefault="00C46B12" w:rsidP="00712599"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr><w:t>Срок,</w:t></w:r></w:p><w:p w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidRDefault="00C46B12" w:rsidP="00712599"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr><w:t xml:space="preserve"> раб</w:t></w:r><w:proofErr w:type="gramStart"/><w:r w:rsidR="007B01B3"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr><w:t>.</w:t></w:r><w:proofErr w:type="gramEnd"/><w:r><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr><w:t xml:space="preserve"> </w:t></w:r><w:proofErr w:type="gramStart"/><w:r><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr><w:t>д</w:t></w:r><w:proofErr w:type="gramEnd"/><w:r><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr><w:t>ней</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1529" w:type="dxa"/><w:tcBorders><w:top w:val="single" w:sz="8" w:space="0" w:color="auto"/><w:left w:val="nil"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="8" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:noWrap/><w:vAlign w:val="center"/><w:hideMark/></w:tcPr><w:p w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidRDefault="00C46B12" w:rsidP="00712599"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr></w:pPr><w:r w:rsidRPr="00186D9F"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr><w:t>Стоимость</w:t></w:r><w:r><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:bCs/><w:color w:val="000000"/></w:rPr><w:t>, рублей</w:t></w:r></w:p></w:tc></w:tr>';

if($_REQUEST["alone_price"]){

	foreach($arResult["ITEMS"] as $arSection){

		$table_items = "";

		foreach($arSection["ITEMS"] as $arItem){
			if($arItem["ACTIVE"] == "Y"){				
				$table_items .= '<w:tr><w:trPr><w:trHeight w:val="300" w:hRule="atLeast"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="6819" w:type="dxa"/><w:tcBorders><w:top w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:left w:val="single" w:sz="8" w:space="0" w:color="00000A"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:right w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideH w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideV w:val="single" w:sz="4" w:space="0" w:color="00000A"/></w:tcBorders><w:shd w:color="auto" w:fill="auto" w:val="clear"/><w:tcMar><w:left w:w="88" w:type="dxa"/></w:tcMar><w:vAlign w:val="bottom"/></w:tcPr><w:p><w:pPr><w:pStyle w:val="Normal"/><w:rPr></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:cs="Calibri" w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS"/><w:color w:val="000000"/></w:rPr><w:t>'.$arItem["NAME"].'</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1701" w:type="dxa"/><w:vMerge w:val="restart"/><w:tcBorders><w:top w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:left w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:right w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideH w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideV w:val="single" w:sz="4" w:space="0" w:color="00000A"/></w:tcBorders><w:shd w:color="auto" w:fill="auto" w:val="clear"/><w:tcMar><w:left w:w="103" w:type="dxa"/></w:tcMar><w:vAlign w:val="center"/></w:tcPr><w:p><w:pPr><w:pStyle w:val="Normal"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:cs="Calibri" w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS"/><w:color w:val="000000"/></w:rPr><w:t>'.$arItem["DAY"].'</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1529" w:type="dxa"/><w:vMerge w:val="restart"/><w:tcBorders><w:top w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:left w:val="single" w:sz="8" w:space="0" w:color="00000A"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:right w:val="single" w:sz="8" w:space="0" w:color="00000A"/><w:insideH w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideV w:val="single" w:sz="8" w:space="0" w:color="00000A"/></w:tcBorders><w:shd w:color="auto" w:fill="auto" w:val="clear"/><w:vAlign w:val="center"/></w:tcPr><w:p><w:pPr><w:pStyle w:val="Normal"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:cs="Calibri" w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS"/><w:color w:val="000000"/></w:rPr><w:t>'.$arItem["PRICE"].'</w:t></w:r></w:p></w:tc></w:tr><w:tr><w:trPr><w:trHeight w:val="300" w:hRule="atLeast"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="6819" w:type="dxa"/><w:tcBorders><w:top w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:left w:val="single" w:sz="8" w:space="0" w:color="00000A"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:right w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideH w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideV w:val="single" w:sz="4" w:space="0" w:color="00000A"/></w:tcBorders><w:shd w:color="auto" w:fill="auto" w:val="clear"/><w:tcMar><w:left w:w="88" w:type="dxa"/></w:tcMar><w:vAlign w:val="bottom"/></w:tcPr><w:p><w:pPr><w:pStyle w:val="Normal"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/><w:lang w:val="ru-RU"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:cs="Calibri" w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS"/><w:color w:val="000000"/><w:lang w:val="ru-RU"/></w:rPr><w:t>'.$arItem["VALUE"].'</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1701" w:type="dxa"/><w:vMerge w:val="continue"/><w:tcBorders><w:top w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:left w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:right w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideH w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideV w:val="single" w:sz="4" w:space="0" w:color="00000A"/></w:tcBorders><w:shd w:color="auto" w:fill="auto" w:val="clear"/><w:tcMar><w:left w:w="103" w:type="dxa"/></w:tcMar><w:vAlign w:val="center"/></w:tcPr><w:p><w:pPr><w:pStyle w:val="Normal"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:cs="Calibri" w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS"/><w:color w:val="000000"/></w:rPr></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1529" w:type="dxa"/><w:vMerge w:val="continue"/><w:tcBorders><w:top w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:left w:val="single" w:sz="8" w:space="0" w:color="00000A"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:right w:val="single" w:sz="8" w:space="0" w:color="00000A"/><w:insideH w:val="single" w:sz="4" w:space="0" w:color="00000A"/><w:insideV w:val="single" w:sz="8" w:space="0" w:color="00000A"/></w:tcBorders><w:shd w:color="auto" w:fill="auto" w:val="clear"/><w:vAlign w:val="center"/></w:tcPr><w:p><w:pPr><w:pStyle w:val="Normal"/><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:cs="Calibri" w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS"/><w:color w:val="000000"/></w:rPr></w:r></w:p></w:tc></w:tr>';				
			}
		}

		if(!empty($table_items)){

			$table .= '<w:tr w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidTr="00712599"><w:trPr><w:trHeight w:val="300"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="6819" w:type="dxa"/><w:gridSpan w:val="3"/><w:tcBorders><w:top w:val="nil"/><w:left w:val="single" w:sz="8" w:space="0" w:color="auto"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:vAlign w:val="bottom"/><w:hideMark/></w:tcPr><w:p w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidRDefault="00712599" w:rsidP="004765C8"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr></w:pPr><w:r w:rsidRPr="00712599"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr><w:t>'.$arSection["NAME"].'</w:t></w:r></w:p></w:tc></w:tr>';
			$table .= $table_items;
		}

	}

}
elseif($_REQUEST["combine_price"]){

	foreach($arResult["ITEMS"] as $arSection){

		$table_items = '<w:tr w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidTr="00712599"><w:trPr><w:trHeight w:val="300"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="6819" w:type="dxa"/><w:tcBorders><w:top w:val="nil"/><w:left w:val="single" w:sz="8" w:space="0" w:color="auto"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:vAlign w:val="bottom"/><w:hideMark/></w:tcPr>';
		$all_section_day = 0;
		$all_section_price = 0;
		$active = 0;

		foreach($arSection["ITEMS"] as $arItem){
			if($arItem["ACTIVE"] == "Y"){

				$active = 1;
				$table_items .= '<w:p w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidRDefault="00712599" w:rsidP="004765C8"><w:pPr><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr></w:pPr><w:r w:rsidRPr="00712599"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr><w:t>'.$arItem["NAME"].'</w:t></w:r></w:p>';
				$all_section_day = $all_section_day + $arItem["DAY"];
				$all_section_price = $all_section_price + $arItem["PRICE"];

			}
		}

		if($active == 1){

			$table .= '<w:tr w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidTr="00712599"><w:trPr><w:trHeight w:val="300"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="6819" w:type="dxa"/><w:gridSpan w:val="3"/><w:tcBorders><w:top w:val="nil"/><w:left w:val="single" w:sz="8" w:space="0" w:color="auto"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:vAlign w:val="bottom"/><w:hideMark/></w:tcPr><w:p w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidRDefault="00712599" w:rsidP="004765C8"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr></w:pPr><w:r w:rsidRPr="00712599"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr><w:t>'.$arSection["NAME"].'</w:t></w:r></w:p></w:tc></w:tr>';
			$table .= $table_items;
			$table .= '</w:tc><w:tc><w:tcPr><w:tcW w:w="1701" w:type="dxa"/><w:tcBorders><w:top w:val="nil"/><w:left w:val="nil"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:noWrap/><w:vAlign w:val="center"/><w:hideMark/></w:tcPr><w:p w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidRDefault="00C46B12" w:rsidP="00712599"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr></w:pPr><w:r w:rsidRPr="00186D9F"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr><w:t>'.$all_section_day.'</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1529" w:type="dxa"/><w:tcBorders><w:top w:val="nil"/><w:left w:val="nil"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="8" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:noWrap/><w:vAlign w:val="center"/><w:hideMark/></w:tcPr><w:p w:rsidR="00C46B12" w:rsidRPr="00186D9F" w:rsidRDefault="00C46B12" w:rsidP="00712599"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr></w:pPr><w:r w:rsidRPr="00186D9F"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:color w:val="000000"/></w:rPr><w:t>'.$all_section_price.'</w:t></w:r></w:p></w:tc></w:tr>';

		}

	}

}

$table .= '<w:tr w:rsidR="001819BD" w:rsidRPr="007B01B3" w:rsidTr="00712599"><w:trPr><w:trHeight w:val="300"/></w:trPr><w:tc><w:tcPr><w:tcW w:w="6819" w:type="dxa"/><w:tcBorders><w:top w:val="nil"/><w:left w:val="single" w:sz="8" w:space="0" w:color="auto"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:vAlign w:val="bottom"/><w:hideMark/></w:tcPr><w:p w:rsidR="00C46B12" w:rsidRPr="007B01B3" w:rsidRDefault="007B01B3" w:rsidP="004765C8"><w:pPr><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:color w:val="000000"/></w:rPr></w:pPr><w:r w:rsidRPr="007B01B3"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:color w:val="000000"/></w:rPr><w:t>Итого:</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1701" w:type="dxa"/><w:tcBorders><w:top w:val="nil"/><w:left w:val="nil"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="4" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:noWrap/><w:vAlign w:val="center"/><w:hideMark/></w:tcPr><w:p w:rsidR="00C46B12" w:rsidRPr="007B01B3" w:rsidRDefault="00EC20F1" w:rsidP="00712599"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:color w:val="000000"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:color w:val="000000"/></w:rPr><w:t>'.$arResult["ALL_DAY"].'</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1529" w:type="dxa"/><w:tcBorders><w:top w:val="nil"/><w:left w:val="nil"/><w:bottom w:val="single" w:sz="4" w:space="0" w:color="auto"/><w:right w:val="single" w:sz="8" w:space="0" w:color="auto"/></w:tcBorders><w:shd w:val="clear" w:color="auto" w:fill="auto"/><w:noWrap/><w:vAlign w:val="center"/><w:hideMark/></w:tcPr><w:p w:rsidR="00C46B12" w:rsidRPr="007B01B3" w:rsidRDefault="00712599" w:rsidP="00712599"><w:pPr><w:jc w:val="center"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:color w:val="000000"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:hAnsi="Trebuchet MS" w:cs="Calibri"/><w:b/><w:color w:val="000000"/></w:rPr><w:t>'.$arResult["ALL_PRICE"].'</w:t></w:r></w:p></w:tc></w:tr></w:tbl><w:p w:rsidR="007B01B3" w:rsidRPr="002634D5" w:rsidRDefault="00944BBF" w:rsidP="00C46B12"><w:pPr><w:spacing w:after="200" w:line="276" w:lineRule="auto"/><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:eastAsiaTheme="majorEastAsia" w:hAnsi="Trebuchet MS" w:cstheme="majorBidi"/><w:b/><w:bCs/><w:color w:val="365F91" w:themeColor="accent1" w:themeShade="BF"/><w:lang w:eastAsia="en-US"/></w:rPr></w:pPr><w:bookmarkStart w:id="1" w:name="_GoBack"/><w:r w:rsidRPr="002634D5"><w:rPr><w:rFonts w:ascii="Trebuchet MS" w:eastAsiaTheme="majorEastAsia" w:hAnsi="Trebuchet MS" w:cstheme="majorBidi"/><w:b/><w:bCs/><w:color w:val="365F91" w:themeColor="accent1" w:themeShade="BF"/><w:lang w:eastAsia="en-US"/></w:rPr><w:t>';

$table = iconv("CP1251", "UTF-8", $table);

//Список параметров
$params = array(
	'{TABLE}'	=>	$table
);
 
if (!file_exists($newfile)) {
	die('File not found.');
}
 
$zip = new ZipArchive();
 
if (!$zip->open($newfile)) {
	die('File not open.');
}
 
$documentXml = $zip->getFromName('word/document.xml');
 
//Заменяем все найденные переменные в файле на значения
$documentXml = str_replace(array_keys($params), array_values($params), $documentXml);
 
$zip->deleteName('word/document.xml');
$zip->addFromString('word/document.xml', $documentXml);
 
//Закрываем и сохраняем архив
$zip->close();

//header("Location: http://".SITE_SERVER_NAME."/auditor/word_ok/".$file_name);
//file_force_download($newfile);*/
?>