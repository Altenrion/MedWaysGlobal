<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */
$assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('cabinet.assets'));
?>


<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
    <i class="fa fa-user"></i>
    <span>Статистика мероприятия</span>
    <ol class="breadcrumb">
        <li>Кабинет</li>
        <li class="active">Статистика</li>
    </ol>
</section>
<!-- END CONTENT HEADER -->
<section class="content">
			<div class="row ">
				<div class="col-md-12 ">
                    <? if($this->checkRole(array('Dev', 'Admin'))): ?>
                        <?= $this->actionJuliaList() ; ?>
                    <? endif; ?>
				</div><!--/col-->




                <div class="col-md-12">
                    <div class="grid">
                        <div class="grid-body">
                            
                            <div class="row">
                                <div class="col-md-6"></br></br></br>
                                    В настоящем разделе приведена актуальная статистика мероприятия "Эстафета вузовской науки". В блоке справа вы можете видеть Вузы, лидирующие по количеству проектов.
                                    По результатам экспертизы регионального этапа определятся Базовые вузы Эстафеты 2015 года. </br></br>

                                    В блоке ниже представлено схематичное распределение проектов по платформам (<span style="color:#5cb85c; font-weight: bold" >Идея</span>, <span style="color:#f0ad4e; font-weight: bold">НИР</span>, <span style="color:#d9534f;font-weight: bold">НИОКР</span>).</br>
                                    Настоящая статистика будет пополняться по окончанию каждого этапа экспертизы.
                                </div>
                                <div class="col-md-6">

                                    <p class="lead">Лидеры Эстафеты вузовской науки</p>
                                    <p>Топ 5 вузов проекта</p>
                                    <?
                                    $max = reset($topUnivers);
                                    $total_max = $max[0];

                                     foreach($topUnivers as $vuz_k=>$vuz_v):?>

                                        <? $local_max = $vuz_v[0] / $total_max * 100; ?>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label"><?=$vuz_v[1]?></label>
                                            <div class="col-sm-8 line-progress" >
                                                <div class="progress">
                                                    <div class="progress-bar " aria-valuenow="<?= round(($vuz_v[0] / $total_max) * 100)  ?>" aria-valuemin="0" aria-valuemax="<?= $total_max ?>" ><span ><?= $vuz_v[0]?> %</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="grid">
                        <div class="grid-body">
                            <div class="row">
                                <style>
                                    .form-group{
                                        margin-bottom: 0px;
                                        height: 25px;
                                    }
                                    .form-group label{
                                        padding-bottom: 0px;
                                        height: 5px;
                                    }
                                    .line-progress{
                                        padding-top:10px;
                                        height: 15px;
                                    }

                                    @media screen and (max-width: 768px) {
                                        .form-group{
                                            margin-bottom: 10px;
                                            height: 50px;
                                        }
                                        .form-group label{
                                            padding-bottom: 10px;
                                            line-height: 10px;
                                        }

                                    }
                                </style>
                                <div class="col-md-12">
                                    <p class="lead">Платформы Эстафеты вузовской науки</p>
                                    <p>Количество проектов по платформам</p>
                                    <form class="form-horizontal" role="form">

                                        <?
                                        $max = reset($stagesData);
                                        $total_max = $max['total'];

                                        foreach($stagesData as $stage_k=>$stage_v): ?>

                                            <? $local_max = $stage_v['total'] / $total_max * 100; ?>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"><?=$stage_v["stage"]?></label>
                                                <div class="col-sm-8 line-progress" >
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" aria-valuenow="<?= round(($stage_v['phase1'] / $total_max) * 100)  ?>" aria-valuemin="0" aria-valuemax="<?= $total_max ?>" ><span ><?= $stage_v['phase1']?></span></div>
                                                        <div class="progress-bar progress-bar-warning" aria-valuenow="<?= round(($stage_v['phase2'] / $total_max) * 100)  ?>" aria-valuemin="0" aria-valuemax="<?= $total_max ?>" ><span ><?= $stage_v['phase2']?></span></div>
                                                        <div class="progress-bar progress-bar-danger" aria-valuenow="<?= round(($stage_v['phase3'] / $total_max) * 100)  ?>" aria-valuemin="0" aria-valuemax="<?= $total_max ?>" ><span ><?= $stage_v['phase3']?></span></div>
                                                    </div>
                                                </div>
                                            </div>

                                        <? endforeach; ?>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    <? if(false): ?>

                <div class="col-md-12">
                    <div class="grid">
                        <div class="grid-header">
                            <i class="fa fa-bar-chart-o"></i>
                            <span class="grid-title">Регистрация в проекте</span>
                            <div class="pull-right grid-tools">
                                <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                                <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                                <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="grid-body">
                            <div id="chart-register-line" style="width:100%; height:250px;"></div>
                        </div>
                    </div>
                </div>

               <div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="grid widget bg-light-blue">
                       <div class="grid-body">
                           <span class="title">Обучающихся</span>
                           <span class="value"><?=$managersData[0]?>%</span>
                           <span class="stat6 chart"><canvas width="114" height="14" style="display: inline-block; vertical-align: top; width: 114px; height: 14px;"></canvas></span>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="grid widget bg-light-blue">
                       <div class="grid-body">
                           <span class="title">Участников до 35 лет</span>
                           <span class="value"><?=$managersData[1]?>%</span>
                           <span class="stat6 chart"><canvas width="114" height="14" style="display: inline-block; vertical-align: top; width: 114px; height: 14px;"></canvas></span>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="grid widget bg-light-blue">
                       <div class="grid-body">
                           <span class="title">Зарубежных публикаций</span>
                           <span class="value"><?=$managersData[2]?>%</span>
                           <span class="stat6 chart"><canvas width="114" height="14" style="display: inline-block; vertical-align: top; width: 114px; height: 14px;"></canvas></span>
                       </div>
                   </div>
               </div>

            <? if(false):?>
               <? foreach($moneyData as $money_k=>$money_v): ?>

               <div class="col-md-4">
                    <div class="grid">
                        <div class="grid-body">
                            <p class=" text-center"><?=$money_v[1]?> <i class="fa fa-rub "></i> (%) </p>
                            <div class="knob-box">
                                <input class="knob" data-angleOffset=0 data-linecap=round value="<?=$money_v[0]?>">
                            </div>
                        </div>
                    </div>
               </div>
               <? endforeach; ?>
            <? endif; ?>

			</div><!--/profile-->


<? endif; ?>

</section>

<script></script>

<?
Yii::app()->clientScript->registerScriptFile($assetsUrl.'/plugins/jquery-flot/jquery.flot.js', CClientScript::POS_END );
Yii::app()->clientScript->registerScriptFile($assetsUrl.'/plugins/jquery-flot/jquery.flot.resize.min.js', CClientScript::POS_END );
Yii::app()->clientScript->registerScriptFile($assetsUrl.'/plugins/jquery-knob/jquery.knob.js', CClientScript::POS_END );
Yii::app()->clientScript->registerScriptFile($assetsUrl.'/js/statistic-charts.js', CClientScript::POS_END );
?>
