<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Создание кп полиграфия");
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <style>
        .table-calc{
            max-width:1000px;
            margin:auto;
        }
    </style>
    <form class="table-calc" id="table-calc"  action="word.php" method="POST">
        <table class="table">
            <thead>
                <tr>
                    <td>Наименование</td>
                    <td>Количество</td>
                    <td>Цена</td>
                    <td>Стоимость</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in table">
                    <td>
                        <div class="form-group">
                            <textarea v-model="row.name" v-bind:name="'row['+index+'][name]'" class="form-control" id="" cols="30" rows="2"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input v-model="row.cnt" v-bind:name="'row['+index+'][count]'" type="num" step="1" min="0" class="form-control" id="" placeholder="Количество">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input v-model="row.price" v-bind:name="'row['+index+'][price]'" type="num" step="1" min="0" class="form-control" id="" placeholder="Цена">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input v-bind:value="row.priceRow" v-bind:name="'row['+index+'][priceRow]'" type="num" step="1" min="0" class="form-control" id="">
                        </div>
                    </td>
                    <td>
                        <svg aria-hidden="true" @click="deleteRow(index)" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" style="margin-bottom:5px; margin-top:8px;"><path fill="#6c757d" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td><svg @click="addRow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#0069d9"><path d="M12.75 7.75a.75.75 0 00-1.5 0v3.5h-3.5a.75.75 0 000 1.5h3.5v3.5a.75.75 0 001.5 0v-3.5h3.5a.75.75 0 000-1.5h-3.5v-3.5z"></path><path fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z"></path></svg></td>
                    <td></td>
                    <td>Итого</td>
                    <td>
                        <div class="form-group">
                            <input type="num" name="totalPrice" class="form-control" placeholder="Итого" v-bind:value="total">
                        </div>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div class="form-group form-inline">
                        Срок изготовления &nbsp; <input type="num" name="time" class="form-control" placeholder="0" required="required">  &nbsp;  <input type="text" name="daysText" class="form-control" placeholder="рабочих дней" value="рабочих дней" required="required">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="defaultCheck1" checked name="sign" value="Y">
                            <label class="form-check-label" for="defaultCheck1">
                                Включить подпись и печать
                            </label>
                        </div>
                    </td>

                </tr>
            </tfoot>
        </table>
        <input type="submit" class="btn btn-success" value="Сохранить"></form>
    </form>
    <script src="script.js"></script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>