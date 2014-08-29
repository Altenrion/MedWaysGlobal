<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

?>

<div id="content" class="col-lg-12 col-sm-12 col-xs-12">


			<ol class="breadcrumb">
			   	<li class="active"><i class="fa fa-fw fa-bar-chart-o"></i> Статистика</li>
			</ol>


			<div class="row profile">

				<div class="col-sm-12 col-md-7 col-lg-7 bord">
                    <div class="panel">
                        <?

                        $model= new Users();
                        $dest = Yii::getPathOfAlias('webroot.images.art').DIRECTORY_SEPARATOR.'in.png';
                        $overlay = Yii::getPathOfAlias('webroot.images.art').DIRECTORY_SEPARATOR.'m_overlay_p.png';

//                        $src = Yii::app()->baseUrl.DIRECTORY_SEPARATOR.'images/art/in.png'
//                        print_r($dest);

                        
                        $map= new MapStat($model,$dest,$overlay);
                        $map->getProjectsPointsData();
                        var_dump($map);


                        ?>
<!--                        <img src=' --><?//=$src ?><!-- ' width="300" height="auto" alt=""/>-->
                        
                    </div>
				</div><!--/col-->

			</div><!--/profile-->



			</div>