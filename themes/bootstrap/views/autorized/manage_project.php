<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 06.10.14
 * Time: 11:53
 * To change this template use File | Settings | File Templates.
 */
?>

<style type="text/css">
    .form-group {
        margin-bottom: 15px;
    }
    .col-sm-7.col-xs-6 {
        margin-left: -17px;
    }
    label.control-label {
        text-transform: uppercase;
        color:#428bca;
    }
        .form-horizontal .control-label {
            padding-top: 2px;
            margin-bottom: 0;
            text-align: right;
        }
</style>

<?// var_dump($manager);  ?>
<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
    <i class="fa fa-user"></i>
    <span>Проект № <?=$project->ID_PROJECT ?></span>
    <ol class="breadcrumb">
        <li><a href="">Кабинет</a></li>
        <li><a href="<?=Yii::app()->createUrl('Autorized/projects')?>">Проекты</a></li>
        <li class="active"><a href="">Управление проектами</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->



<section class="content">

    <div class="row ">
        <div class="col-sm-12 ">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="grid-title">Название проекта</span>
                        <div class="pull-right grid-tools">
                            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="grid-body">
                        <p><?=$project->NAME?></p>
                    </div>
            </div>
        </div><!--/col-->
    </div><!--/title row-->

    <div class="row ">
        <div class="col-md-6 ">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="grid-title">Руководитель проекта</span>
                        <div class="pull-right grid-tools">
                            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="grid-body">

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Фамилия:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=$manager->F_NAME?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Имя:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=$manager->L_NAME?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Отчество:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=$manager->S_NAME?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Пол:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=(($manager->SEX =='1')?'M':(($manager->F_NAME =='2')?'Ж':'-'))?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Дата рождения:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=$manager->BIRTH_DATE?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Телефон:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=$manager->PHONE?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Ученая степень:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=$manager->DEGREE?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Ученое звание:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=$manager->ACADEMIC_TITLE?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Округ:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <? $dist = District::model()->find(array(
                                        'select'=>'NAME',
                                        'condition'=>'ID_DISTRICT=:ID_DISTRICT',
                                        'params'=>array(':ID_DISTRICT'=>$manager->ID_DISTRICT)
                                    ));
                                    echo $dist->NAME;
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Вуз:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <? $univ = University::model()->find(array(
                                        'select'=>'NAME_UNIVER',
                                        'condition'=>'ID_UNIVER=:ID_UNIVER',
                                        'params'=>array(':ID_UNIVER'=>$manager->ID_UNIVER)
                                    ));
                                    echo $univ->NAME_UNIVER;
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Должность:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=$manager->W_POSITION?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Специальность:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <? $spec = Speciality::model()->find(array(
                                        'select'=>'NAME',
                                        'condition'=>'ID_SPECIALITY=:ID_SPECIALITY',
                                        'params'=>array(':ID_SPECIALITY'=>$manager->ID_SPECIALITY)
                                    ));
                                    echo $spec->NAME;
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-4 control-label" style="text-align:right ;">Индекс Хирша:</label>
                                <div class="col-sm-8 col-xs-8">
                                    <?=$manager->HIRSH?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div><!--/col-->

        <div class="col-md-6 ">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="grid-title">Информация проекта</span>
                        <div class="pull-right grid-tools">
                            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="grid-body">


                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Научная платформа:</label>
                                <div class="col-sm-6 col-xs-6">
                                    <? $st = Stage::model()->find(array(
                                                'select'=>'NAME_STAGE',
                                                'condition'=>'ID_STAGE=:ID_STAGE',
                                                'params'=>array(':ID_STAGE'=>$project->ID_STAGE)
                                            ));
                                    echo $st->NAME_STAGE;
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Количество исполнителей:</label>
                                <div class="col-sm-6 col-xs-6">
                                    <?=$project->EXECUTERS_NUM;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Из них до 35 лет:</label>
                                <div class="col-sm-6 col-xs-6">
                                    <?=$project->UN_THIRTY_FIVE;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Из них обучающихся:</label>
                                <div class="col-sm-6 col-xs-6">
                                    <?=$project->STUDY;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Суммарное кол-во публикаций по теме:</label>
                                <div class="col-sm-6 col-xs-6">
                                    <?=$project->PUBLICATIONS;?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Из них в зарубежных изданиях:</label>
                                <div class="col-sm-6 col-xs-6">
                                    <?=$project->FORIN_PUBL;?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Год начала:</label>
                                <div class="col-sm-6 col-xs-6">
                                    <?=$project->START_YEAR;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Год окончания:</label>
                                <div class="col-sm-6 col-xs-6">
                                    <?=$project->END_YEAR;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Стадия развития проекта:</label>
                                <div class="col-sm-6 col-xs-6">
                                    <? $phase = Phase::model()->find(array(
                                                    'select'=>'NAME',
                                                    'condition'=>'ID_PHASE=:ID_PHASE',
                                                    'params'=>array(':ID_PHASE'=>$project->ID_PHASE)
                                                ));
                                    echo $phase->NAME;
                                   ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Объем финансирования на период реализации (руб):</label>
                                <div class="col-sm-6 col-xs-6">
                                    <? $budget = Budget::model()->find(array(
                                                    'select'=>'NAME',
                                                    'condition'=>'ID_BUDGET=:ID_BUDGET',
                                                    'params'=>array(':ID_BUDGET'=>$project->ID_BUDGET)
                                                ));
                                    echo $budget->NAME;
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Объем финансирования на календарный год (руб):</label>
                                <div class="col-sm-6 col-xs-6">
                                    <?=$project->YEAR_BUDGET;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-xs-6 control-label" style="text-align:right ;">Объем предполагаемого coфинансирования (руб):</label>
                                <div class="col-sm-6 col-xs-6">
                                    <?=$project->CO_FINANCING;?>

                                </div>
                            </div>


                        </div>


                    </div>
                </div>
        </div><!--/col-->

    </div><!--/tables row-->

    <div class="row ">
        <div class="col-sm-12 ">
            <div class="grid">
                <div class="grid-header">
                    <i class="fa fa-bar-chart-o"></i>
                    <span class="grid-title">Аннотация проекта</span>
                    <div class="pull-right grid-tools">
                        <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                        <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="grid-body">
                    <p class="lead">Краткая аннотация</p>
                    <p><?=$project->DESCR_PROJECT?></p>

                    <p class="lead">Полная аннотация</p>
                    <p>Для просмотра перейдите по ссылке : <a href="<?=Yii::app()->baseUrl."/uploads/".$project->ROADMAP_PROJECT?>" target='_blank' ><i class="fa fa-lg fa-file-pdf-o" style="color:#D9534F"></i></a></p>
                </div>
            </div>
        </div><!--/col-->
    </div><!--/text row-->

    <div class="row ">
        <div class="col-sm-12 ">
            <div class="grid">
                <div class="grid-header">
                    <i class="fa fa-bar-chart-o"></i>
                    <span class="grid-title">Верификация проекта</span>
                    <div class="pull-right grid-tools">
                        <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                        <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="grid-body">
                    <ul>
                        <li>
                            <strong style="color:#428BCA">Подтвердить</strong> - проект аффелирован с вашим вузом, заполнен корректно
                        </li>
                        <li><strong style="color:#D9534F">Заблокировать</strong> - одно из условий не соблюдено</li>

                    </ul>
                    <button type="button" class="btn btn-primary"  title="">
                        Подтвердить
                    </button>

                    <button type="button" class="btn btn-danger"  title="">
                        Заблокировать
                    </button>
                </div>
            </div>
        </div><!--/col-->
    </div><!--/text row-->

    <div class="row ">
        <div class="col-sm-12 ">
            <div class="grid">
                <div class="grid-header">
                    <i class="fa fa-bar-chart-o"></i>
                    <span class="grid-title">Региональная оценка проекта</span>
                    <div class="pull-right grid-tools">
                        <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                        <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="grid-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Соответствие проекта тематике заявленной научной платформы</label>
                            <div class="col-sm-7">
                                <select class="form-control">
                                    <option>-- не выбрано --</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Актуальность исследования</label>
                            <div class="col-sm-7">
                                <select class="form-control">
                                    <option>-- не выбрано --</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Научный коллектив</label>
                            <div class="col-sm-7">
                                <select class="form-control">
                                    <option>-- не выбрано --</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do1</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do2</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Финансовая модель</label>
                            <div class="col-sm-7">
                                <select class="form-control">
                                    <option>-- не выбрано --</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do1</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do2</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                    <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm col-sm-10">
                                <div >
                                    <button type="submit" class="btn btn-primary">Сохранить оценку</button>

                                    <button type="reset" class="btn btn-default">Очистить форму</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/col-->
    </div><!--/text row-->

</section>