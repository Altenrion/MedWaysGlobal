<?php
$this->breadcrumbs=array(
	'Cont Mains'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ContMain','url'=>array('index')),
	array('label'=>'Create ContMain','url'=>array('create')),
	array('label'=>'Update ContMain','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ContMain','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContMain','url'=>array('admin')),
);
?>

<h1>View ContMain #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cont_id',
		'cont_type_id',
		'short_title',
		'long_title',
		'end_date',
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
	),
)); ?>
