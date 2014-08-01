<?php
$this->breadcrumbs=array(
	'Cont Mains',
);

$this->menu=array(
	array('label'=>'Create ContMain','url'=>array('create')),
	array('label'=>'Manage ContMain','url'=>array('admin')),
);
?>

<h1>Cont Mains</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
