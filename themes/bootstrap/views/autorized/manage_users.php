<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

?>

<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
    <i class="fa fa-user"></i>
    <span>Управление пользователями</span>
    <ol class="breadcrumb">
        <li><a href="">Кабинет</a></li>
        <li class="active"><a href="">Управление</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->



<section class="content">

    <div class="row ">

        <div class="col-sm-12 ">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Эксперты</a></li>
                <li class=""><a href="#profile" data-toggle="tab">Представители</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <? $this->renderPartial('_exp_grid',array('sort'=>$sort,'pages'=>$pages,'models'=>$models)); ?>
                </div>
                <div class="tab-pane" id="profile">
                    <? $this->renderPartial('_man_grid',array('sortm'=>$sortm,'pags'=>$pags,'manags'=>$manags)); ?>
                </div>






                <?
//                $gridDataProvider = new CArrayDataProvider(array(
//                    array('id'=>2, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript'),
//                    array('id'=>3, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML'),
//                    array('id'=>4, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML'),
//                    array('id'=>5, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML'),
//                    array('id'=>6, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML'),
//                    array('id'=>7, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML'),
//                    array('id'=>8, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML'),
//                    array('id'=>9, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML'),
//                    array('id'=>10, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML'),
//                ));
                ?>
                <?php $this->widget('bootstrap.widgets.TbGridView', array(
                    'type'=>'striped  condensed',
                    'dataProvider'=>$dataProvider,
                    'template'=>"{items}",
                    'columns'=>array(
                        array('name'=>'id', 'header'=>'#'),
                        array('name'=>'F_NAME', 'header'=>'Фамилия'),
                        array('name'=>'L_NAME', 'header'=>'Имя'),
                        array('name'=>'S_NAME', 'header'=>'Отчество'),
                        array('name'=>'roles', 'header'=>'Роль'),

//                        array(
////                            'class'=>'CButtonColumn',
//                        )

                    ),
                    'pager'=> array(
                        'class' => 'LinkPager',
                    ),
                 )); ?>
            </div>

            <?
                            $this->widget('zii.widgets.grid.CGridView', array(
                                'dataProvider' => $dataProvider,
                                'columns' => array(
                                    array(
                                        'name' => 'Фамилия',
                                        'type' => 'raw',
                                        'value' => 'CHtml::encode($data->F_NAME)',
                                    ),
                                    array(
                                        'name' => 'Имя',
                                        'type' => 'raw',
                                        'value' => 'CHtml::encode($data->L_NAME)',
                                    ),
                                    array(
                                        'name' => 'Отчество',
                                        'type' => 'raw',
                                        'value' => 'CHtml::link(CHtml::encode($data->S_NAME),
                                     array("view","id" => $data->id))',
                                    ),


                                ),
                                'pager'=> array(
                                    'class' => 'LinkPager',
                                ),
                            ));

            ?>





            <?
            $this->widget('bootstrap.widgets.TbTabs', array(
                'id' => 'tabs',
                'type' => 'tabs', // '', 'tabs', 'pills' (or 'list')
                'tabs' => array(
                    array(
                        'label' => 'someLabel',
                        'content' => $this->renderPartial('_exp_grid', array(
                                'sort'=>$sort,'pages'=>$pages,'models'=>$models

                            )
                            ,true),
                        'active' => true,
                    ),
                    array(
                        'label' => 'anotherLabel',
                        'content' => $this->renderPartial('_man_grid', array(
                            'sortm'=>$sortm,'pags'=>$pags,'manags'=>$manags

                        ) ,true),
                    ),
                )));

            ?>



        </div><!--/col-->

    </div><!--/profile-->


</section>