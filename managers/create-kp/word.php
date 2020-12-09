<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");?>
<?/*
function pre($x){
    print_r($x);
}*/
function file_force_download($file) {
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
class GenerateTable{
    private $arrRow;
    public function __construct($arr)
    {
        //принимаем массив строк из REQUEST
        $this->arrRow = $arr;
    }
    //разбираем повторяющиеся куски docx на функции
    private function printBorders($num){
        return "<w:tcPr>
        <w:tcW w:w=\"".$num."\" w:type=\"dxa\"/>
        <w:tcBorders>
               <w:left w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:bottom w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
            </w:tcBorders>
            <w:noWrap w:val=\"0\"/>
            <w:vAlign w:val=\"top\"/>
            </w:tcPr>";
    }
    //разбираем повторяющиеся куски docx на функции
    private function tblPrEx(){
        return "<w:tblPrEx>
         <w:tblCellMar>
            <w:top w:w=\"55\" w:type=\"dxa\"/>
            <w:left w:w=\"55\" w:type=\"dxa\"/>
            <w:bottom w:w=\"55\" w:type=\"dxa\"/>
            <w:right w:w=\"55\" w:type=\"dxa\"/>
         </w:tblCellMar>
      </w:tblPrEx>";
    }
    //генерируем строки таблицы
    private function wrPr(){?>
        <?return "<w:rPr>
                  <w:rFonts w:hint=\"default\" w:eastAsia=\"Cambria-Bold\" w:cs=\"Times New Roman\"/>
                  <w:b w:val=\"0\"/>
                  <w:bCs w:val=\"0\"/>
                  <w:sz w:val=\"26\"/>
                  <w:szCs w:val=\"26\"/>
                  <w:lang w:val=\"ru-RU\"/>
               </w:rPr>";?>
    <?}
    private function tableRow($arr){
        return '<w:tr>
      '.$this->tblPrEx().'
      <w:tc>
            '.$this->printBorders(3853).'
         <w:p>
            <w:pPr>
               <w:pStyle w:val="10"/>
               <w:jc w:val="center"/>
               <w:rPr>
                  <w:rFonts w:hint="default" w:ascii="Times New Roman" w:hAnsi="Times New Roman" w:eastAsia="Cambria-Bold" w:cs="Times New Roman"/>
                  <w:b w:val="0"/>
                  <w:bCs w:val="0"/>
                  <w:sz w:val="26"/>
                  <w:szCs w:val="26"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
            </w:pPr>
            <w:r>
               <w:rPr>
                  <w:rFonts w:eastAsia="Cambria-Bold" w:cs="Times New Roman"/>
                  <w:b w:val="0"/>
                  <w:bCs w:val="0"/>
                  <w:sz w:val="26"/>
                  <w:szCs w:val="26"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
               <w:t>'.$arr["name"].'</w:t>
            </w:r>            
         </w:p>
      </w:tc>
      <w:tc>         
            '.$this->printBorders(1927).'
         <w:p>
            <w:pPr>
               <w:pStyle w:val="10"/>
               <w:jc w:val="center"/>
               <w:rPr>
                  <w:rFonts w:ascii="Times New Roman" w:hAnsi="Times New Roman" w:eastAsia="Cambria-Bold" w:cs="Times New Roman"/>
                  <w:b w:val="0"/>
                  <w:bCs w:val="0"/>
                  <w:caps w:val="0"/>
                  <w:smallCaps w:val="0"/>
                  <w:color w:val="000000"/>
                  <w:spacing w:val="0"/>
                  <w:sz w:val="26"/>
                  <w:szCs w:val="26"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
            </w:pPr>
            <w:r>
               <w:rPr>
                  <w:rFonts w:eastAsia="Cambria-Bold" w:cs="Times New Roman"/>
                  <w:b w:val="0"/>
                  <w:bCs w:val="0"/>
                  <w:caps w:val="0"/>
                  <w:smallCaps w:val="0"/>
                  <w:color w:val="000000"/>
                  <w:spacing w:val="0"/>
                  <w:sz w:val="26"/>
                  <w:szCs w:val="26"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
               <w:t>'.$arr["count"].'</w:t>
            </w:r>
         </w:p>
      </w:tc>
      <w:tc>         
            '.$this->printBorders(1933).'
         <w:p>
            <w:pPr>
               <w:pStyle w:val="10"/>
               <w:jc w:val="center"/>
               <w:rPr>
                  <w:rFonts w:hint="default" w:ascii="Times New Roman" w:hAnsi="Times New Roman" w:eastAsia="Cambria-Bold" w:cs="Times New Roman"/>
                  <w:b w:val="0"/>
                  <w:bCs w:val="0"/>
                  <w:sz w:val="26"/>
                  <w:szCs w:val="26"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
            </w:pPr>
            <w:r>
               '.$this->wrPr().'
               <w:t>'.$arr["price"].'</w:t>
            </w:r>
         </w:p>
      </w:tc>
      <w:tc>
         <w:tcPr>
            <w:tcW w:w="1938" w:type="dxa"/>
            <w:tcBorders>
               <w:left w:val="single" w:color="000000" w:sz="0" w:space="0"/>
               <w:bottom w:val="single" w:color="000000" w:sz="0" w:space="0"/>
               <w:right w:val="single" w:color="000000" w:sz="0" w:space="0"/>
            </w:tcBorders>
            <w:noWrap w:val="0"/>
            <w:vAlign w:val="top"/>
         </w:tcPr>
         <w:p>
            <w:pPr>
               <w:pStyle w:val="10"/>
               <w:jc w:val="center"/>
               <w:rPr>
                  <w:rFonts w:hint="default"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
            </w:pPr>
            <w:r>
               <w:rPr>
                  <w:rFonts w:hint="default"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
               <w:t>'.$arr["priceRow"].'</w:t>
            </w:r>
         </w:p>
      </w:tc>
   </w:tr>';
    }
    //подпись
    private function headerTable($num){
        return "</w:t></w:r></w:p>
<w:tbl>
   <w:tblPr>
      <w:tblStyle w:val=\"9\"/>
      <w:tblW w:w=\"0\" w:type=\"auto\"/>
      <w:tblInd w:w=\"55\" w:type=\"dxa\"/>
      <w:tblLayout w:type=\"fixed\"/>
      <w:tblCellMar>
         <w:top w:w=\"55\" w:type=\"dxa\"/>
         <w:left w:w=\"55\" w:type=\"dxa\"/>
         <w:bottom w:w=\"55\" w:type=\"dxa\"/>
         <w:right w:w=\"55\" w:type=\"dxa\"/>
      </w:tblCellMar>
   </w:tblPr>
   <w:tblGrid>
      <w:gridCol w:w=\"3853\"/>
      <w:gridCol w:w=\"1927\"/>
      <w:gridCol w:w=\"1933\"/>
      <w:gridCol w:w=\"1938\"/>
   </w:tblGrid>
   <w:tr>
      <w:tblPrEx>
         <w:tblCellMar>
            <w:top w:w=\"55\" w:type=\"dxa\"/>
            <w:left w:w=\"55\" w:type=\"dxa\"/>
            <w:bottom w:w=\"55\" w:type=\"dxa\"/>
            <w:right w:w=\"55\" w:type=\"dxa\"/>
         </w:tblCellMar>
      </w:tblPrEx>
      <w:tc>
         <w:tcPr>
            <w:tcW w:w=\"3853\" w:type=\"dxa\"/>
            <w:tcBorders>
               <w:top w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:left w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:bottom w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
            </w:tcBorders>
            <w:noWrap w:val=\"0\"/>
            <w:vAlign w:val=\"top\"/>
         </w:tcPr>
         <w:p>
            <w:pPr>
               <w:pStyle w:val=\"10\"/>
               <w:jc w:val=\"center\"/>
               <w:rPr>
                  <w:rFonts w:ascii=\"Times New Roman\" w:hAnsi=\"Times New Roman\" w:eastAsia=\"Cambria-Bold\" w:cs=\"Times New Roman\"/>
                  <w:b/>
                  <w:bCs/>
                  <w:sz w:val=\"26\"/>
                  <w:szCs w:val=\"26\"/>
                  <w:lang w:val=\"ru-RU\"/>
               </w:rPr>
            </w:pPr>
            <w:r>
               <w:rPr>
                  <w:rFonts w:ascii=\"Times New Roman\" w:hAnsi=\"Times New Roman\" w:eastAsia=\"Cambria-Bold\" w:cs=\"Times New Roman\"/>
                  <w:b/>
                  <w:bCs/>
                  <w:sz w:val=\"26\"/>
                  <w:szCs w:val=\"26\"/>
                  <w:lang w:val=\"ru-RU\"/>
               </w:rPr>
               <w:t>Наименование</w:t>
            </w:r>
         </w:p>
      </w:tc>
      <w:tc>
         <w:tcPr>
            <w:tcW w:w=\"1927\" w:type=\"dxa\"/>
            <w:tcBorders>
               <w:top w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:left w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:bottom w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
            </w:tcBorders>
            <w:noWrap w:val=\"0\"/>
            <w:vAlign w:val=\"top\"/>
         </w:tcPr>
         <w:p>
            <w:pPr>
               <w:pStyle w:val=\"10\"/>
               <w:jc w:val=\"center\"/>
               <w:rPr>
                  <w:rFonts w:ascii=\"Times New Roman\" w:hAnsi=\"Times New Roman\" w:eastAsia=\"Cambria-Bold\" w:cs=\"Times New Roman\"/>
                  <w:b/>
                  <w:bCs/>
                  <w:sz w:val=\"26\"/>
                  <w:szCs w:val=\"26\"/>
                  <w:lang w:val=\"ru-RU\"/>
               </w:rPr>
            </w:pPr>
            <w:r>
               <w:rPr>
                  <w:rFonts w:ascii=\"Times New Roman\" w:hAnsi=\"Times New Roman\" w:eastAsia=\"Cambria-Bold\" w:cs=\"Times New Roman\"/>
                  <w:b/>
                  <w:bCs/>
                  <w:sz w:val=\"26\"/>
                  <w:szCs w:val=\"26\"/>
                  <w:lang w:val=\"ru-RU\"/>
               </w:rPr>
               <w:t>Кол-во, шт.</w:t>
            </w:r>
         </w:p>
      </w:tc>
      <w:tc>
         <w:tcPr>
            <w:tcW w:w=\"1933\" w:type=\"dxa\"/>
            <w:tcBorders>
               <w:top w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:left w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:bottom w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
            </w:tcBorders>
            <w:noWrap w:val=\"0\"/>
            <w:vAlign w:val=\"top\"/>
         </w:tcPr>
         <w:p>
            <w:pPr>
               <w:pStyle w:val=\"10\"/>
               <w:jc w:val=\"center\"/>
               <w:rPr>
                  <w:rFonts w:ascii=\"Times New Roman\" w:hAnsi=\"Times New Roman\" w:eastAsia=\"Cambria-Bold\" w:cs=\"Times New Roman\"/>
                  <w:b/>
                  <w:bCs/>
                  <w:sz w:val=\"26\"/>
                  <w:szCs w:val=\"26\"/>
                  <w:lang w:val=\"ru-RU\"/>
               </w:rPr>
            </w:pPr>
            <w:r>
               <w:rPr>
                  <w:rFonts w:ascii=\"Times New Roman\" w:hAnsi=\"Times New Roman\" w:eastAsia=\"Cambria-Bold\" w:cs=\"Times New Roman\"/>
                  <w:b/>
                  <w:bCs/>
                  <w:sz w:val=\"26\"/>
                  <w:szCs w:val=\"26\"/>
                  <w:lang w:val=\"ru-RU\"/>
               </w:rPr>
               <w:t>Цена за шт., руб.</w:t>
            </w:r>
         </w:p>
      </w:tc>
      <w:tc>
         <w:tcPr>
            <w:tcW w:w=\"1938\" w:type=\"dxa\"/>
            <w:tcBorders>
               <w:top w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:left w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:bottom w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
               <w:right w:val=\"single\" w:color=\"000000\" w:sz=\"0\" w:space=\"0\"/>
            </w:tcBorders>
            <w:noWrap w:val=\"0\"/>
            <w:vAlign w:val=\"top\"/>
         </w:tcPr>
         <w:p>
            <w:pPr>
               <w:pStyle w:val=\"10\"/>
               <w:jc w:val=\"center\"/>
            </w:pPr>
            <w:r>
               <w:rPr>
                  <w:rFonts w:ascii=\"Times New Roman\" w:hAnsi=\"Times New Roman\" w:eastAsia=\"Cambria-Bold\" w:cs=\"Times New Roman\"/>
                  <w:b/>
                  <w:bCs/>
                  <w:sz w:val=\"26\"/>
                  <w:szCs w:val=\"26\"/>
                  <w:lang w:val=\"ru-RU\"/>
               </w:rPr>
               <w:t>Стоимость, руб.</w:t>
            </w:r>
         </w:p>
      </w:tc>
   </w:tr>";
    }
    private function footerTable($total = 0){
        return '<w:tr>
      '.$this->tblPrEx().'
      <w:tc>         
            '.$this->printBorders(3853).'
         <w:p>
            <w:pPr>
               <w:pStyle w:val="10"/>
               <w:jc w:val="center"/>
               <w:rPr>
                  <w:rFonts w:ascii="Times New Roman" w:hAnsi="Times New Roman" w:eastAsia="Cambria-Bold" w:cs="Times New Roman"/>
                  <w:b w:val="0"/>
                  <w:bCs w:val="0"/>
                  <w:sz w:val="26"/>
                  <w:szCs w:val="26"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
            </w:pPr>
            <w:r>
               <w:rPr>
                  <w:rFonts w:ascii="Times New Roman" w:hAnsi="Times New Roman" w:eastAsia="Cambria-Bold" w:cs="Times New Roman"/>
                  <w:b w:val="0"/>
                  <w:bCs w:val="0"/>
                  <w:sz w:val="26"/>
                  <w:szCs w:val="26"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
               <w:t>Итого</w:t>
            </w:r>
         </w:p>
      </w:tc>
      <w:tc>         
            '.$this->printBorders(1927).'            
         <w:p>
            <w:pPr>
               <w:pStyle w:val="10"/>
               <w:jc w:val="center"/>
               <w:rPr>
                  <w:rFonts w:ascii="Times New Roman" w:hAnsi="Times New Roman" w:eastAsia="Cambria-Bold" w:cs="Times New Roman"/>
                  <w:b w:val="0"/>
                  <w:bCs w:val="0"/>
                  <w:sz w:val="26"/>
                  <w:szCs w:val="26"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
            </w:pPr>
         </w:p>
      </w:tc>
      <w:tc>         
            '.$this->printBorders(1933).'            
         <w:p>
            <w:pPr>
               <w:pStyle w:val="10"/>
               <w:jc w:val="center"/>
               <w:rPr>
                  <w:rFonts w:ascii="Times New Roman" w:hAnsi="Times New Roman" w:eastAsia="Cambria-Bold" w:cs="Times New Roman"/>
                  <w:b w:val="0"/>
                  <w:bCs w:val="0"/>
                  <w:sz w:val="26"/>
                  <w:szCs w:val="26"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
            </w:pPr>
         </w:p>
      </w:tc>
      <w:tc>
         <w:tcPr>
            <w:tcW w:w="1938" w:type="dxa"/>
            <w:tcBorders>
               <w:left w:val="single" w:color="000000" w:sz="0" w:space="0"/>
               <w:bottom w:val="single" w:color="000000" w:sz="0" w:space="0"/>
               <w:right w:val="single" w:color="000000" w:sz="0" w:space="0"/>
            </w:tcBorders>
            <w:noWrap w:val="0"/>
            <w:vAlign w:val="top"/>
         </w:tcPr>
         <w:p>
            <w:pPr>
               <w:pStyle w:val="10"/>
               <w:jc w:val="center"/>
               <w:rPr>
                  <w:rFonts w:hint="default"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
            </w:pPr>
            <w:r>
               <w:rPr>
                  <w:rFonts w:hint="default"/>
                  <w:lang w:val="ru-RU"/>
               </w:rPr>
               <w:t>'.$_REQUEST['totalPrice'].'</w:t>
            </w:r>
         </w:p>
      </w:tc>
   </w:tr>
</w:tbl>
<w:p>
<w:pPr>
   <w:spacing w:before="0" w:after="0" w:line="100" w:lineRule="atLeast"/>
   <w:ind w:left="0" w:right="0" w:hanging="15"/>
   <w:jc w:val="both"/>
   <w:rPr>
      <w:rFonts w:ascii="Times New Roman" w:hAnsi="Times New Roman" w:eastAsia="Calibri" w:cs="Times New Roman"/>
      <w:b w:val="0"/>
      <w:bCs w:val="0"/>
      <w:color w:val="000000"/>
      <w:sz w:val="26"/>
      <w:szCs w:val="26"/>
      <w:lang w:val="ru-RU"/>
   </w:rPr>
</w:pPr>
<w:r>
<w:rPr>
   <w:rFonts w:eastAsia="Calibri" w:cs="Times New Roman"/>
   <w:b w:val="0"/>
   <w:bCs w:val="0"/>
   <w:color w:val="000000"/>
   <w:sz w:val="26"/>
   <w:szCs w:val="26"/>
   <w:lang w:val="ru-RU"/>
</w:rPr>
<w:t>';
    }

    //размещаем строки в таблицу
    public function printTable(){
        $table = $this->headerTable();
        if(!empty($this->arrRow)):
            foreach ($this->arrRow as $row):
                $table .= $this->tableRow($row);
            endforeach;
        endif;
        $table .= $this->footerTable();
        return $table;
    }
}

$arResult["ALL_DAY"] = $_REQUEST["ALL_DAY"];
$arResult["ALL_PRICE"] = $_REQUEST["ALL_PRICE"];

if($_REQUEST['sign'] == 'Y')
    $file = "./word_templates/vis.docx"; //с подписью
else
    $file = "./word_templates/viz.docx"; //без подписи

$newfile = "./word_ok/viz.docx";

$file_name = substr($newfile, 10);

if(!copy($file, $newfile)){
    echo 'error';
}

$table = '';
if($_REQUEST["row"]){
    $tablePrint = new GenerateTable($_REQUEST['row']);
    $table = $tablePrint->printTable();
}
?><pre><?print_r($_REQUEST)?></pre><?php

if (!file_exists($newfile)) {
    die('File not found.');
}

$zip = new ZipArchive();

if (!$zip->open($newfile)) {
    die('File not open.');
}
$table = iconv("CP1251", "UTF-8", $table);

$time = $_REQUEST['time'];
$days = iconv("CP1251", "UTF-8", $_REQUEST['daysText']);
$sign = iconv("CP1251", "UTF-8", $sign);

$params = array(
    '{TABLE}'	=>	$table,
    '{TIME_WORK}' => $time.' '.$days,
    '{DATE}' => date('d.m.Y', time())
);
//Список параметров
$documentXml = $zip->getFromName('word/document.xml');
//$documentXml = iconv("ASCII", "UTF-8", $documentXml);

//$documentXml = iconv("UTF-8", "CP1251", $documentXml);
//Заменяем все найденные переменные в файле на значения
$documentXml = str_replace(array_keys($params), array_values($params), $documentXml);

//$documentXml = iconv("CP1251", "UTF-8", $documentXml);


$zip->deleteName('word/document.xml');
$zip->addFromString('word/document.xml', $documentXml);

//Закрываем и сохраняем архив
$zip->close();


header("Location: http://".SITE_SERVER_NAME."/managers/create-kp/word_ok/".$file_name);
//file_force_download($newfile);
?>