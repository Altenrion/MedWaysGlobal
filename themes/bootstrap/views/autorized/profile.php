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

?>

<div id="content" class="col-lg-12 col-sm-12 col-xs-12">

			<ol class="breadcrumb">
			   	<li class="active"> Профиль</li>
			</ol>

			<div class="row profile">

				<div class="col-sm-12 col-md-4 col-lg-3 bord">

					<div class="row">
						<div class="col-xs-12 col-sm-12 image-block">
							<img class="profile-image" height="200" width="200" src="<?=Yii::app()->baseUrl?>/images/badge/5549987.jpg">
						</div>
						<div class="col-xs-12 col-sm-12">
                            <div class="row image-block">
                                <div class="col-xs-5 col-sm-4 col-sm-offset-1 col-md-12 name">
                                    <h3><?=(isset($data))?($data[0]['L_NAME']):('')?></br>
                                        <small><?=(isset($data))?($data[0]['F_NAME']):('')?></small>
                                    </h3></div>
                                <div class="col-xs-7 col-sm-6 col-md-12">
                                    <ul class="vcard-details">

                                        <li class="vcard-detail">
                                            <div><i class="fa fa-fw fa-child"></i> <?=(isset($data))?($data[0]['roles']):('')?></div>

                                        </li >
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

				<div class="col-sm-12 col-md-7 col-lg-7 data bord">

                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Внимание! </strong> Ваш id "<?=(isset($data))?(var_dump($data)):('---')?>"
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Личные данные</h3>
                        </div>
                        <div class="panel-body persona">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>
                                        <?
                                        $tags = array(
                                            array('id' => 1, 'text' => 'php'),
                                            array('id' => 2, 'text' => 'html'),
                                            array('id' => 3, 'text' => 'css'),
                                            array('id' => 4, 'text' => 'javascript'),
                                        );
                                        $this->widget('editable.Editable', array(
                                            'type'      => 'select',
                                            'name'      => 'SEX',
                                            'pk'        => $data[0]['id'],
                                            'text'      => CHtml::encode($data[0]['SEX']),
                                            'url'       => $this->createUrl('Autorized/updateProfile'),
                                            'source'    => $tags, //Editable::source(Users::model()->getSex(), 'sex_id', 'sex_name'),
                                            'title'     => 'Enter title',
                                            'placement' => 'right'

                                        ));



                                        ?>


                                    </td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Culpa, reprehenderit?</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Laboriosam, tempore.</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Excepturi, veniam?</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Qui, quisquam.</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Autem, similique?</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Odit, similique!</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Ab, vel.</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Facere, vero?</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Ducimus, maiores?</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Officiis, soluta.</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Dicta, ipsum?</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Delectus, earum.</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum.</td>
                                    <td>Fuga, ratione.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div><!--/col-->

			</div><!--/profile-->



			</div>