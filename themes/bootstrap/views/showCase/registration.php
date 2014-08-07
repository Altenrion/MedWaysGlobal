<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 05.08.14
 * Time: 21:22
 * To change this template use File | Settings | File Templates.
 */
?>


<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 04.08.14
 * Time: 14:03
 * To change this template use File | Settings | File Templates.
 */

?>
<style type="text/css">
    #File1
    {
        position: absolute;
    }
    .customFile
    {
        width: 219px;
        margin-left: 0px;
        cursor: default;
        height: 40px;
        z-index: 2;
        filter: alpha(opacity: 0);
        opacity: 0;
    }
    .fakeButton
    {
        position: absolute;
        z-index: 1;
        width: 125px;
        height: 40px;
        background: url(<?=Yii::app()->baseUrl?>/images/button.jpg) no-repeat left top;
        float: left;
    }

    .blocker
    {
        position: absolute;
        z-index: 3;
        width: 150px;
        height: 40px;
        background: url(<?=Yii::app()->baseUrl?>/images/transparent.gif);
        margin-left: -155px;
    }
    #FileName
    {
        position: absolute;
        height: 17px;
        margin-left: 145px;
        font-family: Verdana;
        font-size: 8pt;
        color: Gray;
        margin-top: 10px;
        padding-top: 1px;
        padding-left: 19px;
    }
    #activeBrowseButton
    {
        background: url(<?=Yii::app()->baseUrl?>/images/button_active.jpg) no-repeat left top;
        display: none;
    }
</style>
<div class="head-image option-4" style="background-image: url(<?=Yii::app()->baseUrl?>/images/art/ptbg4.jpg);">
    <div class="overlay dark">
        <div class="container">
            <h1 class="page-title">Регистрация</h1>
        </div>
    </div>
</div>

<div class="light-wrapper">
    <div class="container inner">
        <div class="row classic-blog">
            <div class="col-sm-12 content">
                <p>Здравствуйте! Благодарим вас за интерес к нашему проекту. Для участия в нем вам необходимо заполнить регистрационные данные
                    и активировать учетную запись через письмо, которое будет направлено вам на почту, по окончанию регистрации. Убедительная просьба заполнить все поля формы.
                    Подсказки и рекомендации к заполнению вы найдете в закладках, правее регистрационной анкеты. </p>
            </div>
        </div>

        <div class="row classic-blog">
            <div class="col-sm-6 content">


                <h3 class="section-title">Регистрация участника</h3>
                <div class="divide10"></div>

                <div class="form-container">
                    <form class="forms" action="<?=Yii::app()->createUrl('ShowCase/registration')?>" method="post">
                        <fieldset id="one">
                            <ol>
                                <li class="form-row text-input-row name-field">
                                    <input type="text" name="F_NAME" class="text-input defaultText required" title="Фамилия (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row name-field">
                                    <input type="text" name="L_NAME" class="text-input defaultText required" title="Имя (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row name-field">
                                    <input type="text" name="S_NAME" class="text-input defaultText required" title="Отчество (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row email-field">
                                    <input type="email" name="email" class="text-input defaultText required email" title="Email (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row name-field">
                                    <input type="tel" name="phone" class="text-input defaultText required" title="Телефон (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row subject-field">
                                    <input type="date" name="birth_date" class="text-input defaultText required" title="Дата рождения (Обязательно)"/>
                                </li>
                                <li><select name="sex" id="">
                                        <option value="m">Пол</option>
                                        <option value="m">м</option>
                                        <option value="f">ж</option>
                                    </select>
                                </li>
                                <li>
                                    <select name="degree" id="">
                                        <option value="">Ученая степень</option>
                                        <option value="">Lorem.</option>
                                        <option value="">Nisi?</option>
                                        <option value="">Consequuntur?</option>
                                    </select>

                                </li>
                                <li>
                                    <select name="degree" id="">
                                        <option value="">Ученое звание</option>
                                        <option value="">Lorem.</option>
                                        <option value="">Nisi?</option>
                                        <option value="">Consequuntur?</option>
                                    </select>
                                </li>
                                <li>
                                    <select name="degree" id="">
                                        <option value="">Округ</option>
                                        <option value="">Lorem.</option>
                                        <option value="">Nisi?</option>
                                        <option value="">Consequuntur?</option>
                                    </select>
                                </li>
                                <li>
                                    <select name="degree" id="">
                                        <option value="">Вуз</option>
                                        <option value="">Lorem.</option>
                                        <option value="">Nisi?</option>
                                        <option value="">Consequuntur?</option>
                                    </select>
                                </li>
                                <li class="form-row text-input-row name-field">
                                    <input type="text" name="academic_title" class="text-input defaultText required" title="Должность (Обязательно)"/>
                                </li>
                                <li>
                                    <select name="degree" id="">
                                        <option value="">Специальность основная</option>
                                        <option value="">Lorem.</option>
                                        <option value="">Nisi?</option>
                                        <option value="">Consequuntur?</option>
                                    </select>
                                </li>
                                <li class="form-row text-input-row name-field">
                                    <input type="text" name="hirsh" class="text-input defaultText required" title="Индекс Хирша (Обязательно)"/>
                                </li>

                                <li>
                                    <label class="checkbox inline">
                                        <input type="checkbox"  value="option1"> Подтверждение конфиденциальности
                                    </label>
                                    </br>
                                </li>
                                </br>

                                <li>
                                    <select name="degree" id="mem">
                                        <option value="0">Форма участия</option>
                                        <option value="1">Руководитель проекта</option>
                                        <option value="2">Эксперт</option>
                                    </select>
                                </li>
                            </ol>
                        </fieldset>
                        <div class="divide35"></div>
                        <fieldset id="project" style="display:none;">
                            <h3 class="section-title">Регистрация проекта</h3>
                            <div class="divide10"></div>
                            <ol>

                                <li>
                                    <select   name="stage"  id="mem">
                                        <option value="0">Профильная научная платформа</option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                    </select>
                                </li>
                                <li class="form-row text-input-row subject-field">
                                    <input type="text" name="name" class="text-input defaultText required" title="Название проекта (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row subject-field">
                                    <input type="text" name="executers_num" class="text-input defaultText required" title="Количество исполнителей включая руководителя (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row subject-field">
                                    <input type="text" name="executers_num" class="text-input defaultText required" title="Из них до 35 лет (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row subject-field">
                                    <input type="text" name="executers_num" class="text-input defaultText required" title="Из них обучающихся (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row subject-field">
                                    <input type="text" name="executers_num" class="text-input defaultText required" title="Суммарное количество публикаций исполнителей по теме проекта (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row subject-field">
                                    <input type="text" name="executers_num" class="text-input defaultText required" title="Из них в зарубежных изданиях (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row subject-field">
                                    <input type="number" name="executers_num" class="text-input defaultText required" title="Год начала проекта (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row subject-field">
                                    <input type="number" name="executers_num" class="text-input defaultText required" title="Год окончания проекта (Обязательно)"/>
                                </li>
                                <li>
                                    <select   name="stage"  id="mem">
                                        <option value="0">Стадия развития проекта</option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                    </select>
                                </li>
                                <li>
                                    <select   name="stage"  id="mem">
                                        <option value="0">Объем финансирования на период реализации</option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                    </select>
                                </li>
                                <li>
                                    <select   name="stage"  id="mem">
                                        <option value="0">Объем финансирования на календарный год</option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                    </select>
                                </li>
                                <li>
                                    <select   name="stage"  id="mem">
                                        <option value="0">Доля предполагаемого финансирования</option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                        <option value="1">бла бла </option>
                                    </select>
                                </li>
                                <li class="form-row text-area-row">
                                    <label for="">Аннотация</label>
                                    <textarea name="message" class="text-area required"></textarea>
                                </li>

                                <div id="wrapper">
                                    <input id="File1" type="file" class="customFile">
                                    <div class="fakeButton"></div><div class="blocker"></div><div id="activeBrowseButton" class="fakeButton" style="display: none;"></div><div id="FileName" style="display: block; background: url(<?=Yii::app()->baseUrl?>/images/icons.png) 0px -128px no-repeat;">

                                    </div>

                                </div><div class="divide70"></div>
                                <li>
                                    <label class="checkbox inline">
                                        <input type="checkbox"  value="option1">Даю согласие на обработку данных и проведение экспертизы
                                    </label>
                                    </br>
                                </li>
                                <li class="button-row" >
                                    <input type="submit" value="Зарегистрироваться" name="submit" class="btn btn-submit bm0">
                                    <span class="response alert alert-success"></span>
                                </li>
                            </ol>
                        </fieldset>
                        <fieldset id="submit_butt" style="display:none;">

                            <ol>
                                <li class="button-row" >
                                    <input type="submit" value="Зарегистрироваться" name="submit" class="btn btn-submit bm0">
                                    <span class="response alert alert-success"></span>
                                </li>
                            </ol>
                        </fieldset>





                    </form>
                </div>
                <!-- /.form-container -->

            </div>
            <!-- /.col-sm-8 .content -->



            <aside class="col-sm-6 sidebar lp30">
                <h3 class="section-title">Инструкция к регистрации</h3>
                <div class="divide10"></div>

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseOne"> 1. Donec ullamcorper nulla non midd elit? </a> </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseTwo"> 2. Integer posuere eegna mollis euismod? </a> </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseThree"> 3. Duis mollis, est noagna mollis euismod? </a> </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseFour"> 4. Fusce dapibus, tel condimentum nibh? </a> </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseFive"> 5. Integer posuere eraliquet? </a> </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseSix"> 6. Nullam id dolcus vel augue laoreet rutrum? </a> </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseSeven"> 7. Curabitur blnia bibendum nulla consectetur? </a> </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseEight"> 8. Etiam porta sem malesu at eros? </a> </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseNine"> 9. Pellentesque ornatis vestibulum? </a> </h4>
                        </div>
                        <div id="collapseNine" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseTen"> 10. Fusce dapibus, tellris condimentum? </a> </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse">
                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                        </div>
                    </div>
                </div>


            </aside>
            <!-- /.col-sm-4 .sidebar -->
        </div>
        <!-- /.row .classic-blog -->
    </div>
    <!-- /.container -->
</div>
<!-- /.light-wrapper -->

<?
$base_url = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($base_url.'/js/registration.js', CClientScript::POS_END);
$cs->registerScriptFile($base_url.'/js/fileInput.js', CClientScript::POS_END);


?>
