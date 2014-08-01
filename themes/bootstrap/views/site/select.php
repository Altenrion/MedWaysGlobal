<?php
/* @var $this ContMainController */
/* @var $model ContMain */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'cont-main-select-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'type'=>'horizontal',
        'clientOptions'=>array(
                    'validateOnSubmit'=>true,
            ),
        'htmlOptions'=>array('class'=>'well'),
        
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
        <?php echo $form->errorSummary($model); ?>
        
        
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'label'=>'Проверка',
                    'type'=>'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=>'mini', // null, 'large', 'small' or 'mini'
                    'htmlOptions'=>
                        [
                          'rel'=> 'tooltip',
                          'title'=>'Проверка доступных проектов'
                        ],
                    'icon'=>'icon-tasks',
                )); ?>
        	
        
		<?= $form->labelEx($model,'cont_id'); ?>
                <?= $form->textField($model,'cont_id'); ?>
                <?= $form->error($model,'cont_id'); ?>
		<?= $form->textFieldRow($model,'cont_type_id'); ?>
		<?= $form->textFieldRow($model,'short_title'); ?>
                <?= $form->textAreaRow($model, 'long_title', array('class'=>'span3', 'rows'=>3,'text'=>'12.07.2012')); ?>
		<?= $form->textFieldRow($model,'end_date'); ?>
		<?= $form->textFieldRow($model,'setoff_date',array('prepend'=>'12.07.2012')); ?>
                <?= $form->textFieldRow($model,'check_status_id'); ?>
		<?= $form->textFieldRow($model,'current_status_id'); ?>
		<?= $form->textFieldRow($model,'summ_inc_nds'); ?>
		<?= $form->textFieldRow($model,'guaranty_req'); ?>
		<?= $form->textFieldRow($model,'url'); ?>
		<?= $form->textFieldRow($model,'prim_hold_comp_id'); ?>
		<?= $form->textFieldRow($model,'prim_hold_comp_summ'); ?>
		<?= $form->textFieldRow($model,'sec_hold_comp_id'); ?>
		<?= $form->textFieldRow($model,'sec_hold_comp_summ'); ?>
		<?= $form->textFieldRow($model,'doc_type_id'); ?>
		<?= $form->textFieldRow($model,'cont_comp_custumers_id'); ?>
		<?= $form->textFieldRow($model,'status_kd'); ?>
		<?= $form->textFieldRow($model,'status_mod'); ?>
		<?= $form->checkBoxRow($model,'tech_mod'); ?>
		<?= $form->textFieldRow($model,'suply_mod_kp'); ?>
		<?= $form->textFieldRow($model,'rated_value'); ?>
		<?= $form->textFieldRow($model,'prospect_value'); ?>

        <div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->