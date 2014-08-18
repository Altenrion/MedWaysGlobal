<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

if(isset($data) && !is_null($data)){
    if(isset($data[0]['roles'])){
        $role = $data[0]['roles'];
        switch($role){
            case 'Dev': $data[0]['roles'] = 'Разработчик';break;
            case 'Manager': $data[0]['roles'] = 'Представитель проекта';break;
            case 'Exp': $data[0]['roles'] = 'Эксперт';break;
            case 'Exp1': $data[0]['roles'] = 'Эксперт';break;
            case 'Exp2': $data[0]['roles'] = 'Эксперт';break;
            case 'Exp3': $data[0]['roles'] = 'Эксперт';break;
        }
    }
}

var_dump($data);
?>



    <div id="content" class="col-lg-12 col-sm-12 col-xs-12">

    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-fw fa-graduation-cap"></i> Проект</li>
    </ol>

    <div class="row profile">

    <div class="col-sm-12 col-md-4 col-lg-3 bord">

        <div class="row">

            <div class="col-xs-12 col-sm-12">
                <div class="well">

                    <ul id="yw0" class="nav nav-list">
                        <li class="nav-header"><strong>Статусы экспертиз</strong></li>
                        </br>
                        <li>
                            <p> Подача заявки <span class="label label-success"><i class="fa fa-check"></i></span></p>
                        </li>
                        <li>
                            <p> Проверка заявки <i class="fa fa-spinner fa-spin"></i></p>

                        </li>
                        <li>
                            <p> Окружная <i class="fa fa-spinner fa-spin"></i></p>

                        </li>
                        <li>
                            <p> Федеральная <span class="label label-danger"><i class="fa fa-times"></i> доработка</span></p>

                        </li>

                        </br>
                        <li class="nav-header"><strong>Статистика</strong></li>

                        <li>
                            <p> Lorem ipsum dolor <span class="label label-danger"><i class="fa fa-times"></i></span></p>
                        </li>
                    </ul>

                </div>
            </div>
        </div><!--/row-->

    </div><!--/col-->

    <div class="col-sm-12 col-md-7 col-lg-7 ">

    <div class="alert alert-info  alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Внимание! </strong> Ваш id "<?=(isset($data))?('найден'):('---')?>"
    </div>

    <div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Проектные данные
            <button id="enable" class="btn btn-xs btn-primary pull-right"><i class="fa  fa-edit"> </i> редактировать</button>
        </h3>
    </div>
    <div class="panel-body persona">
    <table   class="table table-hover">
    <tbody>
    <tr>
        <th width="40%">Научная платформа</th>
        <td>
            <? if(isset($data[0])){

                $this->widget('editable.Editable', array(
                    'type'      => 'select',
                    'name'      => 'ID_STAGE',
                    'pk'        => $data[0]['id'],
                    'text'      => CHtml::encode($data[0]['ID_STAGE']),
                    'url'       => $this->createUrl('Autorized/updateProject'),
                    'source'    => $this->createUrl('Autorized/getStages'),
                    'title'     => 'Enter title',
                    'placement' => 'right',
                    'options' => array(
                        'disabled'=>true,
                    ),

                ));

            } ?>
        </td>
    </tr>
    <tr>
        <th>Название проекта</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'NAME',
                'text'      => CHtml::encode($data[0]['NAME']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

            } ?>
        </td>
    </tr>
    <tr>
        <th>Количество исполнителей</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'EXECUTERS_NUM',
                'text'      => CHtml::encode($data[0]['EXECUTERS_NUM']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

            } ?>
        </td>
    </tr>
    <tr>
        <th>Из них до 35 лет</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'combodate',
                'name'      => 'UN_THIRTY_FIVE',
                'pk'        => $data[0]['id'],
                'text'      => CHtml::encode(date('d / m / Y', strtotime($data[0]['UN_THIRTY_FIVE']))),
                'url'       => $this->createUrl('Autorized/updateProject'),
//                                            'format'      => 'yyyy-mm-dd', //format in which date is expected from model and submitted to server
                'format'      => 'YYYY-MM-DD', //in this format date sent to server
                'viewformat'  => 'DD / MM / YYYY', //in this format date is displayed
                'template'    => 'DD / MM / YYYY', //template for dropdowns
                'combodate'   => array('minYear' => 1930, 'maxYear' => 2015),
                'options'     => array(
                    'datepicker' => array('language' => 'ru'),
                    'disabled'=>true,
                )
            ));
            } ?>
        </td>
    </tr>
    <tr>
        <th>Из них обучающихся</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'select',
                'name'      => 'STUDY',
                'pk'        => $data[0]['id'],
                'text'      => CHtml::encode(($data[0]['STUDY'])=='m'?'M':'Ж'),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'source'    => Editable::source(array(1 => 'М', 2 => 'Ж')),
                'title'     => 'Enter title',
                'placement' => 'right',
                'options'     => array(
                    'disabled'=>true,
                    'showbuttons'=>false,
                )
            ));

            }  ?>
        </td>
    </tr>
    <tr>
        <th>Суммарное кол-во публикаций</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'PUBLICATIONS',
                'text'      => CHtml::encode($data[0]['PUBLICATIONS']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

            } ?>
        </td>
    </tr>

    <tr>
        <th>Из них в зарубежных изданиях</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'select',
                'name'      => 'FORIN_PUBL',
                'pk'        => $data[0]['id'],
                'text'      => CHtml::encode($data[0]['FORIN_PUBL']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'source'    => Editable::source(array('тестовая степень 1'=>'тестовая степень 1' , 'тестовая степень 2'=>'тестовая степень 2')),
                'title'     => 'Enter title',
                'placement' => 'right',
                'options'     => array(
                    'disabled'=>true,
                    'showbuttons'=>false,
                )
            ));
            }  ?>
        </td>
    </tr>
    <tr>
        <th>Год начала</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'select',
                'name'      => 'START_YEAR',
                'pk'        => $data[0]['id'],
                'text'      => CHtml::encode($data[0]['START_YEAR']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'source'    => Editable::source(array('тестовое звание 1'=>'тестовое звание 1' , 'тестовое звание 2'=>'тестовое звание 2')),
                'title'     => 'Enter title',
                'placement' => 'right',
                'options'     => array(
                    'disabled'=>true,
                    'showbuttons'=>false,
                )
            ));
            } ?>
        </td>
    </tr>
    <tr>
        <th>Год окончания</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'select',
                'name'      => 'END_YEAR',
                'pk'        => $data[0]['id'],
                'text'      => CHtml::encode($data[0]['END_YEAR']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'source'    => $this->createUrl('Autorized/getDistricts'),
                'title'     => 'Enter title',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),

            ));
            } ?>
        </td>
    </tr>
    <tr>
        <th>Стадия развития проекта</th>
        <td>
        <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'select',
                'name'      => 'ID_PHASE',
                'pk'        => $data[0]['id'],
                'text'      => CHtml::encode($data[0]['ID_PHASE']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'source'    => $this->createUrl('Autorized/getUniversities'),
                'title'     => 'Enter title',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),

            ));

        }    ?>
        </td>
    </tr>
    <tr>
        <th>Объем финансирования на период реализации</th>
        <td>
    <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'LONG_BUDGET',
                'text'      => CHtml::encode($data[0]['LONG_BUDGET']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

    } ?>
        </td>
    </tr>
    <tr>
        <th>Объем финансирования на календарный год</th>
        <td>
        <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'select',
                'name'      => 'YEAR_BUDGET',
                'pk'        => $data[0]['id'],
                'text'      => CHtml::encode($data[0]['YEAR_BUDGET']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'source'    => $this->createUrl('Autorized/getSpecialities'),
                'title'     => 'Enter title',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),

            ));

        }  ?>
        </td>
    </tr>
    <tr>
        <th>Доля предполагаемого финансирования</th>
        <td>
        <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'CO_FINANCING',
                'text'      => CHtml::encode($data[0]['CO_FINANCING']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

        }  ?>
        </td>
    </tr>
    <tr>
        <th>Аннотация</th>
        <td>
        <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'DESCR_PROJECT',
                'text'      => CHtml::encode($data[0]['DESCR_PROJECT']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

        }  ?>
        </td>
    </tr>

    </tbody>
    </table>
    </div>
    </div>




    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Выберите фотографию</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="exampleInputFile"> </label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Выберите фотографию для аватара. Пропорции изображения 50х50 . Рекомендуемое разрешение кадра :  300 x 300 - 500 x 500 px. </p>
                        </div>

                        <button type="submit" class="btn btn-default">Загрузить</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn">Закрыть</a>
                    <a href="#" class="btn btn-primary">Сохранить</a>
                </div>
            </div>
        </div>
    </div>

    </div><!--/col-->

    </div><!--/profile-->




    </div>
<?
$base_url = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile( $base_url.'/assets/3160b985/js/bootstrap-datetimepicker.js', CClientScript::POS_END);
$cs->registerScriptFile($base_url.'/adminka/js/MyEditsToEditable.js', CClientScript::POS_END);
?>