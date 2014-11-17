<?php
$this->breadcrumbs=array(
	'Cont Mains'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ContMain','url'=>array('index')),
	array('label'=>'Create ContMain','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cont-main-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cont Mains</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cont-main-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cont_id',
		'cont_type_id',
		'short_title',
		'long_title',
		'end_date',
		/*
		'status_kd',
		'setoff_date',
		'check_status_id',
		'current_status_id',
		'status_mod',
		'summ_inc_nds',
		'guaranty_req',
		'url',
		'prim_hold_comp_id',
		'prim_hold_comp_summ',
		'sec_hold_comp_id',
		'sec_hold_comp_summ',
		'tech_mod',
		'suply_mod_kp',
		'doc_type_id',
		'rated_value',
		'prospect_value',
		'cont_comp_custumers_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
