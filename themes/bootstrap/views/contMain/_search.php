<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'cont_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cont_type_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'short_title',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'long_title',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'end_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status_kd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'setoff_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'check_status_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'current_status_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status_mod',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'summ_inc_nds',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'guaranty_req',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textAreaRow($model,'url',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'prim_hold_comp_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'prim_hold_comp_summ',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sec_hold_comp_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sec_hold_comp_summ',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tech_mod',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'suply_mod_kp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'doc_type_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'rated_value',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'prospect_value',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cont_comp_custumers_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
