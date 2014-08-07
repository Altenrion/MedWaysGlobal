<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 24.07.14
 * Time: 9:19
 * To change this template use File | Settings | File Templates.
 */
?>


<div class="head-image option-4" style="background-image: url(<?=Yii::app()->baseUrl?>/images/art/ptbg4.jpg);">
    <div class="overlay dark">
        <div class="container">
            <h1 class="page-title">Вход в систему </h1>
        </div>
    </div>
</div>
<div class="light-wrapper">
    <div class="container inner">
        <div class="row">
            <div class="col-sm-6">
                <h2>Зарегистрированные пользователи</h2>

                <p>Уважаемый пользователь, для входа в систему вам необходимо ввести <a href="#">email</a> и <a href="#">пароль</a>, указанные при
                    регистрации.
                </p>
                <div class="divide15"></div>
                <div class="form-container">
                    <form class="formmm" action="<?=Yii::app()->createUrl('ShowCase/login')?>" method="post" name="LoginForm" id="login_form">
                        <fieldset>
                            <ol>
                                <li class="form-row text-input-row ">
                                    <input type="text" name="LoginForm[username]" class="text-input defaultText required " title=" Email (Обязательно)"/>
                                </li>
                                <li class="form-row text-input-row password-field">
                                    <input type="text" name="LoginForm[password]" class="text-input defaultText required password" title="Пароль (Обязательно)"/>
                                </li>

                                <li class="button-row">
                                    <input type="submit" value="Войти" name="submit" class="btn btn-submit bm0 pull-left" />
<!--                                    <span class="response alert alert-success"></span>-->
                                    <p class="forgot">Забыли свой <a href="#">email</a> или <a href="#">пароль</a>?</p>
                                </li>
                            </ol>
                        </fieldset>
                    </form>
                </div>
                <!-- /.form-container -->

            </div>
            <div class="col-sm-6">
                <h2>Новый пользователь? Зарегистрируйстесь сейчас!</h2>

                <p>Для регистрации в системе, вам потребуется выбрать роль участника, и заполнить регистрационные
                    данные. Регистрация в нашей системе позволит вам получить доступ к учачстию в нашем мероприятии и
                    отслеживать более подробную статистику проектов.
                </p>
                <a href="<?=Yii::app()->createUrl('ShowCase/registration')?>" class="btn">Зарегистрироваться</a>
                <div class="divide20"></div>
                <!-- /.connect -->

            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.light-wrapper -->

<?
/*
$base_url = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($base_url.'/js/validator/myscripts.js', CClientScript::POS_END);  */

?>
