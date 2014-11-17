<?php
$this->breadcrumbs=array(
	'Cont Mains'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContMain','url'=>array('index')),
	array('label'=>'Create ContMain','url'=>array('create')),
	array('label'=>'View ContMain','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ContMain','url'=>array('admin')),
);
?>

<h1>Update ContMain <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>