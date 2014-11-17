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
            case 'Dev': $data[0]['role'] = 'Разработчик';break;
            case 'Manager': $data[0]['role'] = 'Представитель проекта';break;
            case 'Exp': $data[0]['role'] = 'Эксперт';break;
            case 'Exp1': $data[0]['role'] = 'Эксперт';break;
            case 'Exp2': $data[0]['role'] = 'Эксперт';break;
            case 'Exp3': $data[0]['role'] = 'Эксперт';break;
        }
    }
}

?>



<div id="content" class="col-lg-12 col-sm-12 col-xs-12">

			<ol class="breadcrumb">
			   	<li class="active"><i class="fa fa-fw fa-user"></i> Профиль</li>
			</ol>

			<div class="row profile">

				<div class="col-sm-12 col-md-4 col-lg-3 bord">

					<div class="row">
						<div class="col-xs-12 col-sm-12 image-block">
                            <a data-toggle="modal" href="#myModal" class="">
							    <img class="profile-image" height="200" width="200" src="<?=Yii::app()->baseUrl?>/images/avatars/<?=(isset($data) && !is_null($data[0]['AVATAR']))?($data[0]['AVATAR']):('new.png')?>">
                            </a>
                        </div>
						<div class="col-xs-12 col-sm-12">
                            <div class="row image-block">
                                <div class="col-xs-5 col-sm-4 col-sm-offset-1 col-md-12 name">
                                    <h3><?=(isset($data))?($data[0]['F_NAME']):('')?></br>
                                        <small><?=(isset($data))?($data[0]['L_NAME']):('')?> <?=(isset($data))?($data[0]['S_NAME']):('')?></small>
                                    </h3></div>
                                <div class="col-xs-7 col-sm-6 col-md-12">
                                    <ul class="vcard-details">


                                        <li class="vcard-detail">
                                            <div><i class="fa fa-fw fa-child"></i> <?=(isset($data))?($data[0]['role']):('')?></div>

                                        </li >
                                        <? if($this->checkRole(array('Exp','Exp1','Exp2','Exp3'))): ?>
                                            <li class="vcard-detail">
                                                <div>
                                                    <i class="fa fa-fw fa-certificate"></i>
                                                    <?
                                                    if (isset($data) && isset($data[0])){
                                                        if($data[0]['roles']== 'Exp'){ echo 'подтверждение статуса';}
                                                        else {echo 'статус подтвержден';}
                                                    }
                                                    ?>
                                                </div>
                                            </li >
                                        <? endif; ?>
                                        <li class="vcard-detail">
                                            <div><i class="fa fa-fw fa-envelope"></i> <?=(isset($data))?($data[0]['EMAIL']):('')?></div>

                                        </li>
                                        <li class="vcard-detail">
                                            <div><i class="fa fa-fw fa-clock-o"></i>
                                                <span class="join-label"> В проекте с </span>
                                                <span class="join-date"><?=(isset($data))?(date('d.m.Y', strtotime($data[0]['REG_DATE']))):('')?></span> </div>

                                        </li>
                                    </ul>

                                </div>

                            </div>



						</div>
					</div><!--/row-->

				</div><!--/col-->

				<div class="col-sm-12 col-md-7 col-lg-6 data bord">

                    <? if($this->checkRole(array('Exp'))): ?>
                        <div class="alert alert-info  alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Внимание! </strong> Уважаемый пользователь, ваш статус "Эксперт" находиться на согласовании.
                             Результат будет известен в течении суток. Ожидайте оповещения по почте, указанной при регистрации.
                        </div>
                    <? endif; ?>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Личные данные
                            <button id="enable" class="btn btn-xs btn-primary pull-right"><i class="fa  fa-edit"> </i> редактировать</button>
                            </h3>
                        </div>
                        <div class="panel-body persona">
                            <table   class="table table-hover">
                                <tbody>
                                <tr>
                                    <th width="30%">Фамилия</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'text',
                                            'pk'        => $data[0]['id'],
                                            'name'      => 'F_NAME',
                                            'text'      => CHtml::encode($data[0]['F_NAME']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'title'     => 'Введите фамилию',
                                            'placement' => 'right',
                                            'options' => array(
                                                'disabled'=>true,
                                                'class'=>'edit',
                                            ),
                                        ));

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Имя</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'text',
                                            'pk'        => $data[0]['id'],
                                            'name'      => 'L_NAME',
                                            'text'      => CHtml::encode($data[0]['L_NAME']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'title'     => 'Введите фамилию',
                                            'placement' => 'right',
                                            'options' => array(
                                                'disabled'=>true,
                                            ),
                                        ));

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Отчество</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'text',
                                            'pk'        => $data[0]['id'],
                                            'name'      => 'S_NAME',
                                            'text'      => CHtml::encode($data[0]['S_NAME']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'title'     => 'Введите фамилию',
                                            'placement' => 'right',
                                            'options' => array(
                                                'disabled'=>true,
                                            ),
                                        ));

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Дата рождения</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'combodate',
                                            'name'      => 'BIRTH_DATE',
                                            'pk'        => $data[0]['id'],
                                            'text'      => CHtml::encode(date('d / m / Y', strtotime($data[0]['BIRTH_DATE']))),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
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


//

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Пол</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'select',
                                            'name'      => 'SEX',
                                            'pk'        => $data[0]['id'],
                                            'text'      => CHtml::encode(($data[0]['SEX'])=='1'?'M':'Ж'),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'source'    => Editable::source(array(1 => 'М', 2 => 'Ж')),
                                            'title'     => 'Enter title',
                                            'placement' => 'right',
                                            'options'     => array(
                                                'disabled'=>true,
                                                'showbuttons'=>false,
                                            )
                                        ));

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Телефон</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'text',
                                            'pk'        => $data[0]['id'],
                                            'name'      => 'PHONE',
                                            'text'      => CHtml::encode($data[0]['PHONE']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'title'     => 'Введите фамилию',
                                            'placement' => 'right',
                                            'options' => array(
                                                'disabled'=>true,
                                            ),
                                        ));

                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Ученая степень</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'select',
                                            'name'      => 'DEGREE',
                                            'pk'        => $data[0]['id'],
                                            'text'      => CHtml::encode($data[0]['DEGREE']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'source'    => Editable::source(array('тестовая степень 1'=>'тестовая степень 1' , 'тестовая степень 2'=>'тестовая степень 2')),
                                            'title'     => 'Enter title',
                                            'placement' => 'right',
                                            'options'     => array(
                                                'disabled'=>true,
                                                'showbuttons'=>false,
                                            )
                                        ));
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ученое звание</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'select',
                                            'name'      => 'ACADEMIC_TITLE',
                                            'pk'        => $data[0]['id'],
                                            'text'      => CHtml::encode($data[0]['ACADEMIC_TITLE']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'source'    => Editable::source(array('тестовое звание 1'=>'тестовое звание 1' , 'тестовое звание 2'=>'тестовое звание 2')),
                                            'title'     => 'Enter title',
                                            'placement' => 'right',
                                            'options'     => array(
                                                'disabled'=>true,
                                                'showbuttons'=>false,
                                            )
                                        ));



                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Округ</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'select',
                                            'name'      => 'ID_DISTRICT',
                                            'pk'        => $data[0]['id'],
                                            'text'      => CHtml::encode($data[0]['ID_DISTRICT']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'source'    => $this->createUrl('Autorized/getDistricts'),
                                            'title'     => 'Enter title',
                                            'placement' => 'right',
                                            'options' => array(
                                                'disabled'=>true,
                                            ),

                                        ));



                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Вуз</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'select',
                                            'name'      => 'ID_UNIVER',
                                            'pk'        => $data[0]['id'],
                                            'text'      => CHtml::encode($data[0]['ID_UNIVER']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'source'    => $this->createUrl('Autorized/getUniversities'),
                                            'title'     => 'Enter title',
                                            'placement' => 'right',
                                            'options' => array(
                                                'disabled'=>true,
                                            ),

                                        ));

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Должность</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'text',
                                            'pk'        => $data[0]['id'],
                                            'name'      => 'W_POSITION',
                                            'text'      => CHtml::encode($data[0]['W_POSITION']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'title'     => 'Введите фамилию',
                                            'placement' => 'right',
                                            'options' => array(
                                                'disabled'=>true,
                                            ),
                                        ));

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Специальность основная</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'select',
                                            'name'      => 'ID_SPECIALITY',
                                            'pk'        => $data[0]['id'],
                                            'text'      => CHtml::encode($data[0]['ID_SPECIALITY']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'source'    => $this->createUrl('Autorized/getSpecialities'),
                                            'title'     => 'Enter title',
                                            'placement' => 'right',
                                            'options' => array(
                                                'disabled'=>true,
                                            ),

                                        ));

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Индекс Хирша</th>
                                    <td>
                                        <?
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'text',
                                            'pk'        => $data[0]['id'],
                                            'name'      => 'HIRSH',
                                            'text'      => CHtml::encode($data[0]['HIRSH']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'title'     => 'Введите фамилию',
                                            'placement' => 'right',
                                            'options' => array(
                                                'disabled'=>true,
                                            ),
                                        ));

                                        ?>
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
                                    <div id="upload-wrapper">
                                        <div align="center">

                                            <h4>Загрузка персонального изображения <small>Рекомендуемое разрешение кадра : 300 x 300 - 500 x 500 px</small></h4>
                                            </br>
                                            <form action="<?=Yii::app()->createUrl('Images/upload')?>" method="post" enctype="multipart/form-data" id="MyUploadForm">
                                                <input name="image_file" id="imageInput" type="file" />
<!--                                                <input type="submit"  id="submit-btn" value="Загрузить" class="btn btn-primary" />-->
                                                <button type="submit" id="submit-btn" class="btn btn-sm btn-primary">Загрузить</button>

                                                <img src="<?=Yii::app()->baseUrl?>/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
                                            </form>
                                            <div id="output"></div>
                                        </div>
                                    </div>

                                <div class="modal-footer">
                                    <a href="#" data-dismiss="modal" class="btn">Закрыть</a>
                                    <a href="#" id="RebootAva" class="btn btn-primary">Применить</a>
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
$cs->registerScriptFile($base_url.'/adminka/js/jquery.form.min.js', CClientScript::POS_END);
$cs->registerScriptFile($base_url.'/adminka/js/avatar_upload.js', CClientScript::POS_END);
?>