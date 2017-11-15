

<div class="grid profile ">

    <div class="grid-header" style="border:0px; background: none; color: #777777">
        <i class="fa fa-graduation-cap"></i>
        <span class="grid-title">Проект <small
                    style="font-size: 11px;"><?= $this->MakeOrder($project['id']) ?>
            <?= $config['finished'] ? "- архив":" "?>
            </small> </span>
        <div class="pull-right grid-tools">
            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
        </div>
    </div>


    <div class="grid-body">
<!--        <ul class="nav nav-tabs">-->
<!--            <li class="active"><a href="#profile" data-toggle="tab">Проект</a></li>-->
<!--        </ul>-->
<!--        <div class="tab-content">-->


            <!-- BEGIN PROFILE -->

            <div class="tab-pane active" id="profile">
                <? if(!$config['finished']): ?>
                <span class="lead">Управление  <span> &nbsp;&nbsp;&nbsp;</span>

                    <? if (!$config['no_edit']) { ?>
                        <button class="btn btn-xs btn-primary enable-edition"><i class="fa  fa-edit"> </i> редактировать</button>
                    <? } ?>

                    <a class="btn btn-xs btn-primary " style="font-size: 0.6em"
                       href="/downloads/vuznauka_project_compilation.pdf" target="_blank"><i
                                class="fa  fa-info"> </i> Инструкция по оформлению проекта </a>
                </span>
                <hr>
                <?endif;?>
                <div class="row">
                    <? if (isset($project) && !is_null($project)) { ?>

                        <div class="col-sm-12">
                            <p class="lead">Название </p>
                            <? $this->widget('editable.Editable', array(
                                'type' => 'textarea',
                                'pk' => $project['id'],
                                'name' => 'NAME',
                                'text' => CHtml::encode($project['NAME']),
                                'url' => $this->createUrl('Autorized/updateProject'),
                                'title' => 'Введите название проекта',
                                'placement' => 'top',
                                'options' => array('disabled' => true,),)); ?>
                            </p>
                            <hr>
                        </div>
                        <div class="col-sm-12">
                            <p class="lead">Основная информация </p>
                        </div>
                        <div class="col-sm-6">

                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Научная платформа:</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'select',
                                            'name' => 'ID_STAGE',
                                            'pk' => $project['id'],
                                            'text' => CHtml::encode($project['ID_STAGE']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'source' => $this->createUrl('Autorized/getStages'),
                                            'title' => 'Выберите научную платформу',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true, 'showbuttons' => false,),)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Количество исполнителей:</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'text',
                                            'pk' => $project['id'],
                                            'name' => 'EXECUTERS_NUM',
                                            'text' => CHtml::encode($project['EXECUTERS_NUM']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'title' => 'Введите кол-во исполнителей',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true,),)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Из них до 35 лет:</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'text',
                                            'pk' => $project['id'],
                                            'name' => 'UN_THIRTY_FIVE',
                                            'text' => CHtml::encode($project['UN_THIRTY_FIVE']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'title' => 'Кол-во исполнителей до 35 лет',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true,))); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Из них обучающихся:</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'text',
                                            'pk' => $project['id'],
                                            'name' => 'STUDY',
                                            'text' => CHtml::encode($project['STUDY']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'title' => 'Кол-во исполнителей на обучении',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true,),)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Суммарное кол-во публикаций по
                                        теме:</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'text',
                                            'pk' => $project['id'],
                                            'name' => 'PUBLICATIONS',
                                            'text' => CHtml::encode($project['PUBLICATIONS']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'title' => 'Кол-во публикаций по теме',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true,),)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Из них в зарубежных
                                        изданиях:</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'text',
                                            'pk' => $project['id'],
                                            'name' => 'FORIN_PUBL',
                                            'text' => CHtml::encode($project['FORIN_PUBL']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'title' => 'Кол-во публикаций в зарубежных изданиях',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true,),)); ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Год начала:</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'combodate',
                                            'name' => 'START_YEAR',
                                            'pk' => $project['id'],
                                            'text' => CHtml::encode($project['START_YEAR']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'format' => 'YYYY', //in this format date sent to server
                                            'viewformat' => 'YYYY', //in this format date is displayed
                                            'template' => 'YYYY', //template for dropdowns
                                            'combodate' => array('minYear' => 2000, 'maxYear' => 2017),
                                            'options' => array('disabled' => true,))); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Год окончания:</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'combodate',
                                            'name' => 'END_YEAR',
                                            'pk' => $project['id'],
                                            'text' => CHtml::encode($project['END_YEAR']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'format' => 'YYYY', //in this format date sent to server
                                            'viewformat' => 'YYYY', //in this format date is displayed
                                            'template' => 'YYYY', //template for dropdowns
                                            'combodate' => array('minYear' => 2016, 'maxYear' => 2030),
                                            'options' => array('disabled' => true,))); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Стадия развития проекта:</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'select',
                                            'name' => 'ID_PHASE',
                                            'pk' => $project['id'],
                                            'text' => CHtml::encode($project['ID_PHASE']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'source' => $this->createUrl('Autorized/getPhases'),
                                            'title' => 'Выберите стадию развития проекта',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true, 'showbuttons' => false,),)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Объем финансирования на период
                                        реализации (руб):</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'select',
                                            'name' => 'ID_BUDGET',
                                            'pk' => $project['id'],
                                            'text' => CHtml::encode($project['ID_BUDGET']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'source' => $this->createUrl('Autorized/getBudget'),
                                            'title' => 'Выберите объем финансирования',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true, 'showbuttons' => false,),)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Объем финансирования на
                                        календарный год (руб):</label>
                                    <div class="col-sm-7 col-xs-6">
                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'text',
                                            'pk' => $project['id'],
                                            'name' => 'YEAR_BUDGET',
                                            'text' => CHtml::encode($project['YEAR_BUDGET']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'title' => 'Введите объем финансирования',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true,),)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 col-xs-6 control-label"
                                           style="text-align:right ;">Объем предполагаемого
                                        coфинансирования (руб):</label>
                                    <div class="col-sm-7 col-xs-6">

                                        <? $this->widget('editable.Editable', array(
                                            'type' => 'text',
                                            'pk' => $project['id'],
                                            'name' => 'CO_FINANCING',
                                            'text' => CHtml::encode($project['CO_FINANCING']),
                                            'url' => $this->createUrl('Autorized/updateProject'),
                                            'title' => 'Введите объем финансирования',
                                            'placement' => 'top',
                                            'options' => array('disabled' => true,),)); ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <hr>
                            <p class="lead">Краткая аннотация (1500 знаков) </p>
                            <? $this->widget('editable.Editable', array(
                                'type' => 'textarea',
                                'pk' => $project['id'],
                                'name' => 'DESCR_PROJECT',
                                'text' => CHtml::encode($project['DESCR_PROJECT']),
                                'url' => $this->createUrl('Autorized/updateProject'),
                                'title' => 'Введите краткую аннотацию ',
                                'placement' => 'top',
                                'options' => array('disabled' => true,),)); ?>
                            </p>

                            <br>
                        </div>


                    <? } else { ?>
                        <div class="grid-body">
                            <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×
                                </button>
                                <h4>Внимание! Осторожно! </h4>
                                <p>По не установленным причинам на сервере произошел технический сбой!
                                    Убедительная просьба перезайти в сой кабинет,
                                    и если ошибка повториться сообщите об этом администрации.</p>

                            </div>

                        </div>
                    <? } ?>

                </div>
                <? if(!$config['finished']): ?>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-info">
                            <p><b>Для завершения регистрации проекта загрузите полную аннотацию в PDF
                                    формате и нажмите 'Отправить на экспертизу'</b>.</p>
                            <? if (!$config['no_buttons']) { ?>
                                <button data-toggle="modal" data-target="#modalPrimaryPDF"
                                        class="btn btn-xs btn-primary " style="font-size:0.9em;"><i
                                            class="fa  fa-cloud-upload"> </i> загрузить аннотацию
                                </button>
                                <button id="Pull" data-toggle="modal" class="btn btn-xs btn-primary "
                                        style="font-size:0.9em;"><i class="fa  fa-trophy"> </i> отправить на экспертизу
                                </button>
                            <? } ?>
                            <p>В документе должны быть отражены следующие параметры: </p>
                            <ul>
                                <li>Соответствие проекта тематике заявленной научной платформы</li>
                                <li>Актуальность исследования</li>
                                <li>Научный коллектив</li>
                                <li>Финансовая модель</li>
                                <li>Конкурентные преимущества проекта</li>
                                <li>Инновационность</li>
                                <li>Информация о профильных публикациях, грантах и соисполнителях</li>
                            </ul>

                            <br>

                            <? if (!empty($project['ROADMAP_PROJECT'])): ?>
                                <span> <b>Вы загрузили документ: </b> <a
                                            href="<?= $this->createUrl('/uploads') . "/" . $project['ROADMAP_PROJECT'] ?>">Аннотация проекта</a></span>
                            <? endif; ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">

                        <div class="col-sm-3 stats">
                            <h1 id="first_check"><?= $config['mod_one'] ?></h1>
                            <span> Подача заявки <br> до 15.12.2017 </span>
                            <button class="btn btn-primary col-sm-8 col-sm-offset-2 text-center">
                                <span class=""><i class="fa fa-flag-o"></i> Подача</span></button>
                        </div>
                        <div class="col-sm-3 stats">
                            <h1 id="exp_check"> <?= $config['mod_two'] ?></h1>
                            <span> Проверка заявки <br> 15.12 – 31.12.2017</span>
                            <button class="btn btn-primary col-sm-8 col-sm-offset-2">
                                <span class=""><i class="fa fa-legal"></i> Проверка</span></button>
                        </div>
                        <div class="col-sm-3 stats">

                            <h1><?= $config['mod_three'] ?></h1>
                            <span>Окружная экспертиза <br> 10.01 – 24.01.2018</span>
                            <button class="btn btn-primary col-sm-8 col-sm-offset-2">
                                <span><i class="fa fa-flag-checkered"></i> Окружная</span></button>
                        </div>
                        <div class="col-sm-3 stats">

                            <h1><?= $config['mod_four'] ?></h1>
                            <span>Федеральная экспертиза <br> 27.01 – 04.02.2018</span>
                            <button class="btn btn-primary col-sm-8 col-sm-offset-2">
                                <span class=""><i class="fa fa-flag"></i> Федеральная</span></button>
                        </div>
                    </div>
                </div>

                <?endif;?>
            </div>
            <!-- END PROFILE -->

<!--        </div>-->
    </div>
</div>
