<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */
/* @var $this AutorisedController */

if (isset($data) && !is_null($data)) {
    $render_projects = array();

    foreach ($data as $k=>$project) {
        $render_projects[$k]['project'] = $project;
        $render_projects[$k]['config'] = AutorizedController::projectViewConf($project, $this);
    }
}

?>
    <style type="text/css">
        .form-group {
            margin-bottom: 5px;
        }

        .col-sm-7.col-xs-6 {
            margin-left: -17px;
        }

        label.control-label {
            text-transform: uppercase;
            color: #428bca;
        }

        button.btn.create-project {
            position: absolute;
            top: 85px;
            right: 25px;
        }

        #profile .btn.btn-primary {

            padding-left: 0px;
        }
        #profile .btn.btn-primary span{
            text-align: center;
            width: fit-content;
            display: inline-block;
            margin: 0;
            margin-left: 31.666667%;

        }
    </style>

    <!-- BEGIN CONTENT HEADER -->
    <section class="content-header">
        <i class="fa fa-graduation-cap"></i>
        <span>Проект пользователя</span>
        <ol class="breadcrumb">
            <li>Кабинет</li>
            <li class="active">Проект</li>
        </ol>

        <div><button class="btn create-project" ><i class="fa fa-plus"></i> Создать </button></div>

    </section>
    <!-- END CONTENT HEADER -->

    <section class="content">
        <div class="row">
            <!-- BEGIN USER PROFILE -->
            <div class="col-md-12">

                <? foreach ($render_projects as $render_project) $this->renderPartial('_project_layout',array('project'=>$render_project['project'], 'config' => $render_project['config'], 'controller' => $this)); ?>

            </div>
            <!-- END USER PROFILE -->
        </div>
    </section>

    <!-- модальное окно для добавления PDF -->

    <div class="modal fade" id="modalPrimaryPDF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel14"
         aria-hidden="true">
        <div class="modal-wrapper">
            <div class="modal-dialog">
                <div class="modal-content bg-blue">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel14">Загрузка PDF документа</h4>
                    </div>
                    <div class="modal-body">
                        <p style="font-size:13px;">
                            Файл аннотации должен являться PDF документом и содержать всю необходимую информацию,
                            которую вы можете предоставить, для непредвзятой оценки вашего проекта экспертной группой

                        </p>

                        </br>
                        <form action="<?= Yii::app()->createUrl('Images/uploadPDF') ?>" method="post"
                              enctype="multipart/form-data" id="MyUploadForm">
                            <input name="pdf_file" id="imageInput" type="file" style="float:left;"/>
                            <button type="submit" id="submit-btn" class="btn btn-sm btn-primary">Загрузить</button>

                            <i class="fa fa-refresh fa-spin" id="loading-img" style="display:none;"></i>
                        </form>
                        <div id="output"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--/PDF-->


    <!-- модальное окно для отображения инфы при заявке проекта -->

    <div class="modal fade" id="Pull_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel14"
         aria-hidden="true">
        <div class="modal-wrapper">
            <div class="modal-dialog">
                <div class="modal-content bg-red">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel14">Уважаемый пользователь!</h4>
                    </div>
                    <div class="modal-body">
                        <p style="font-size:13px;">
                            Если вы видителе это сообщение, значит вы попытались отправить свой проект на участие в
                            эстафете.
                            К сожалению, вы не заполнили некоторые поля при регистрации.</br></br>
                            Убедительная просьба, проверьте внимательно пропущенные поля в персональной форме
                            регистрации и в форме регистрации проекта.
                            Так же проверьте, загрузили ли вы PDF документ аннотации проекта.
                            Возможность заявить проект на участие предоставляется при заполнении всей информации.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/PDF-->


    <script type="text/javascript">
        var Url = '<?=Yii::app()->createUrl('Autorized/checkFullInfo')?>';
    </script>


<?
$assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('cabinet.assets'));

Yii::app()->clientScript->registerScriptFile($assetsUrl . '/js/jquery.form.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile($assetsUrl . '/js/avatar_upload.js', CClientScript::POS_END);


?>