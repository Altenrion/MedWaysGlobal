<?php
/* @var $this ContMainController */
/* @var $model ContMain */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'cont-main-selectium-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cont_id'); ?>
		<?php echo $form->textField($model,'cont_id'); ?>
		<?php echo $form->error($model,'cont_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cont_type_id'); ?>
		<?php echo $form->textField($model,'cont_type_id'); ?><?php echo $form->textField($model,'cont_type_id'); ?>
		<?php echo $form->error($model,'cont_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'short_title'); ?>
		<?php echo $form->textField($model,'short_title'); ?>
		<?php echo $form->error($model,'short_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'long_title'); ?>
		<?php echo $form->textField($model,'long_title'); ?>
		<?php echo $form->error($model,'long_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date'); ?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'setoff_date'); ?>
		<?php echo $form->textField($model,'setoff_date'); ?>
		<?php echo $form->error($model,'setoff_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_status_id'); ?>
		<?php echo $form->textField($model,'check_status_id'); ?>
		<?php echo $form->error($model,'check_status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_status_id'); ?>
		<?php echo $form->textField($model,'current_status_id'); ?>
		<?php echo $form->error($model,'current_status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'summ_inc_nds'); ?>
		<?php echo $form->textField($model,'summ_inc_nds'); ?>
		<?php echo $form->error($model,'summ_inc_nds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guaranty_req'); ?>
		<?php echo $form->textField($model,'guaranty_req'); ?>
		<?php echo $form->error($model,'guaranty_req'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url'); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prim_hold_comp_id'); ?>
		<?php echo $form->textField($model,'prim_hold_comp_id'); ?>
		<?php echo $form->error($model,'prim_hold_comp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prim_hold_comp_summ'); ?>
		<?php echo $form->textField($model,'prim_hold_comp_summ'); ?>
		<?php echo $form->error($model,'prim_hold_comp_summ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sec_hold_comp_id'); ?>
		<?php echo $form->textField($model,'sec_hold_comp_id'); ?>
		<?php echo $form->error($model,'sec_hold_comp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sec_hold_comp_summ'); ?>
		<?php echo $form->textField($model,'sec_hold_comp_summ'); ?>
		<?php echo $form->error($model,'sec_hold_comp_summ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc_type_id'); ?>
		<?php echo $form->textField($model,'doc_type_id'); ?>
		<?php echo $form->error($model,'doc_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cont_comp_custumers_id'); ?>
		<?php echo $form->textField($model,'cont_comp_custumers_id'); ?>
		<?php echo $form->error($model,'cont_comp_custumers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_kd'); ?>
		<?php echo $form->textField($model,'status_kd'); ?>
		<?php echo $form->error($model,'status_kd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_mod'); ?>
		<?php echo $form->textField($model,'status_mod'); ?>
		<?php echo $form->error($model,'status_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tech_mod'); ?>
		<?php echo $form->textField($model,'tech_mod'); ?>
		<?php echo $form->error($model,'tech_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suply_mod_kp'); ?>
		<?php echo $form->textField($model,'suply_mod_kp'); ?>
		<?php echo $form->error($model,'suply_mod_kp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rated_value'); ?>
		<?php echo $form->textField($model,'rated_value'); ?>
		<?php echo $form->error($model,'rated_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prospect_value'); ?>
		<?php echo $form->textField($model,'prospect_value'); ?>
		<?php echo $form->error($model,'prospect_value'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->