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
        <li><a href="">Кабинет</a></li>
        <li class="active"><a href="">Статистика</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->
<section class="content">
			<div class="row "> <? if($this->checkRole(array('Dev'))): ?>
				<div class="col-md-12 ">

                        <?= $this->actionJuliaList() ; ?>

				</div><!--/col-->

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

                <div class="col-md-12">
                    <div class="grid">
                        <div class="grid-body">
                            
                            <div class="row">
                                <div class="col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A autem consequatur cumque doloribus eum eveniet maiores nesciunt non odio omnis quas quo, quos recusandae sed sunt unde voluptas! Aut dolores et iure iusto labore, magni, molestias, nam nemo numquam placeat quis quod repudiandae tempora. Amet aperiam assumenda autem consectetur consequatur doloremque esse, expedita fuga id magni molestiae nam odit quas recusandae reiciendis similique tenetur ullam ut? Aliquid aspernatur, beatae commodi consequuntur corporis cum dignissimos, dolorem dolorum fugit ipsum labore nobis nostrum omnis reprehenderit tenetur? A accusantium ad adipisci alias architecto aspernatur autem, blanditiis deleniti, dolor excepturi harum hic molestiae nostrum placeat, provident sequi voluptate? Corporis, deserunt enim exercitationem libero nisi non perspiciatis porro quae quam quia quidem quis. Cum cupiditate eligendi hic illo ipsum provident repudiandae tempora totam. Aut et facilis fugit quos?</div>
                                <div class="col-md-6">

                                    <p class="lead">Лидеры Эстафеты вузовской науки</p>
                                    <p>Топ 5 вузов проекта</p>
                                    <? //var_dump($topUnivers); ?>

                                    <? foreach($topUnivers as $vuz_k=>$vuz_v):?>

                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?=$vuz_v[0]?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$vuz_v[0]?>%;">
                                                <span class=""><?=$vuz_v[1]?> </span><span id="<?=$vuz_v[1]?>"><?=$vuz_v[0]?>%</span>
                                            </div>
                                        </div>

                                    <?endforeach; ?>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="grid">
                        <div class="grid-body">
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
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
                                        <? foreach($stagesData as $stage_k=>$stage_v): ?>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label"><?=$stage_v[1]?></label>
                                            <div class="col-sm-8 line-progress" >
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?=$stage_v[0]?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$stage_v[0]?>%;">
                                                        <span id="<?=$stage_v[1]?>"><?=$stage_v[0]?>%</span>
                                                    </div>
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



</section>

<script></script>

<?
Yii::app()->clientScript->registerScriptFile($assetsUrl.'/plugins/jquery-flot/jquery.flot.js', CClientScript::POS_END );
Yii::app()->clientScript->registerScriptFile($assetsUrl.'/plugins/jquery-flot/jquery.flot.resize.min.js', CClientScript::POS_END );
Yii::app()->clientScript->registerScriptFile($assetsUrl.'/plugins/jquery-knob/jquery.knob.js', CClientScript::POS_END );
Yii::app()->clientScript->registerScriptFile($assetsUrl.'/js/statistic-charts.js', CClientScript::POS_END );
?>
