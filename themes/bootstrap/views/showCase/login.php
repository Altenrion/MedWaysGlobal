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


                <div class="divide15"></div>
                <div class="form-container">
                    <form class="formmm form-horizontal" id="horizontalForm" action="<?=Yii::app()->createUrl('ShowCase/login')?>" method="post" name="LoginForm" id="login_form">
                        <fieldset>
                            <div class="form-actions">
                                <p>Уважаемый пользователь, для входа в систему вам необходимо ввести <a href="#">email</a> и <a href="#">пароль</a>, указанные при
                                    регистрации.
                                </p>
                            </div>
                            <div class="control-group ">
                                <label class="control-label" for="LoginForm_email">Email</label>
                                <div class="controls">
                                    <input name="LoginForm[username]" id="LoginForm_email" type="text">
                                    <span class="help-inline error"  style="display: none"></span>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label" for="LoginForm_password">Пароль</label>
                                <div class="controls">
                                    <input name="LoginForm[password]" id="LoginForm_password" type="text">
                                    <span class="help-inline error"  style="display: none"></span>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit" name="yt0">Войти</button>
                                <button class="btn" type="reset" name="yt1">Очистить</button>
                            </div>



                            </fieldset>

                    </form>
                </div>



            </div>
            <div class="col-sm-6">
                <h2>Новый пользователь? Зарегистрируйтесь!</h2>

                <div class="divide15"></div>
                <div class="form-container">
                    <form class="formstt form-horizontal" id="RegForm" action="<?=Yii::app()->createUrl('ShowCase/registration')?>" method="post" name="RegForm" >
                        <fieldset>
                            <div class="form-actions">
                                <p>Заполните краткую форму регистрации и выберите роль участия. Регистрация в нашей системе позволит вам получить доступ к участию в нашем мероприятии и
                                    отслеживать более подробную статистику проектов.

                                </p>
                                <i class="icon-question-sign contact"><a href="/downloads/vuznauka_project_registration.pdf" target="_blank">Инструкция по регистрации </a></i>

                            </div>
                            <div class="control-group ">
                                <label class="control-label" for="RegForm_F_NAME">Фамилия</label>
                                <div class="controls">
                                    <input name="RegForm[F_NAME]" id="RegForm_F_NAME" type="text" class="required">
                                    <span class="help-inline error"  style="display: none"></span>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label" for="RegForm_L_NAME">Имя</label>
                                <div class="controls">
                                    <input name="RegForm[L_NAME]" id="RegForm_L_NAME" type="text"  class="required">
                                    <span class="help-inline error"  style="display: none"></span>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label" for="RegForm_S_NAME">Отчество</label>
                                <div class="controls">
                                    <input name="RegForm[S_NAME]" id="RegForm_S_NAME" type="text"  class="required">
                                    <span class="help-inline error"  style="display: none"></span>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label" for="RegForm_EMAIL">Email</label>
                                <div class="controls">
                                    <input name="RegForm[EMAIL]" id="RegForm_EMAIL" type="text"  class="required email">
                                    <span class="help-inline error"  style="display: none"></span>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label" for="RegForm_passwordd">Пароль</label>
                                <div class="controls">
                                    <input name="RegForm[password]" id="RegForm_passwordd" type="text"  class="required">
                                    <span class="help-inline error"  style="display: none"></span>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label" for="RegForm_roles">Форма участия</label>
                                <div class="controls">
                                    <select name="RegForm[roles]" id="RegForm_roles"  class="required">
                                        <option value="">...</option>
                                        <option value="Manager">Руководитель проекта</option>
                                        <option value="Moder">Координатор от вуза</option>
                                        <option value="Exp">Эксперт</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit" name="subm" id="Subm">Зарегистрироваться</button>
                                <button class="btn" type="reset" name="reset" id="res">Очистить</button>
                                <div class="response alert alert-success"></div>
                                <div class="response alert alert-danger"></div>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.light-wrapper -->
<?
$base_url = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($base_url.'/js/validator/jquery.validate.min.js', CClientScript::POS_END);
$cs->registerScriptFile($base_url.'/js/activate_submit.js', CClientScript::POS_END);


?>
