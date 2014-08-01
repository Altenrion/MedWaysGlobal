<?php
$this->breadcrumbs=array(
	'Cont Mains'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContMain','url'=>array('index')),
	array('label'=>'Manage ContMain','url'=>array('admin')),
);
?>

<h1>Create ContMain</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>