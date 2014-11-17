<style>
    #Alt-middle{
        margin:0 auto;
        width:400px;
        
        
        
    }
      #verticalForm{
            width:500px;
            margin:0 auto; 
            margin-top: 150px;
        }  
    .site_logo {
            margin-left:50px;
            top: 43px;
            display: block;
            width: 186px;
            height: 38px;
            background: url(http://axiomatica.ru/image/site/logo.png) no-repeat top;
            }
    .site_logo:hover{background-position: bottom}
</style>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//var_dump($_POST);

 /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

<div id="Alt-middle">
    
    
    

<a class="site_logo"></a>
<br/><br/> 
<?php echo $form->textFieldRow($model, 'name', array('class'=>'span3')); ?>
<?php echo $form->passwordFieldRow($model, 'email', array('class'=>'span3')); ?>
<?php //echo $form->checkboxRow($model, 'email'); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
 
<?php $this->endWidget(); ?>

</div>