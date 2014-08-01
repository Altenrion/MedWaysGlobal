<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */


?>
<style>
    #Alt-middle{
        margin:0 auto;
        width:520px;
        margin-top:70px;
        box-shadow: 0 0 30px rgba(0,0,0,0.5);

        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        
    }
    .shadow{
        box-shadow: 0 0 30px rgba(0,0,0,0.5);
/*        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;*/
        min-width: 490px;
    }
    .loggo{
        width: 130px;
        height: auto;
        margin-top:-20px;
        margin-bottom: -150px;
        border: 0px solid black;
    }
    .logg{
        height:250px;
        width: 130px;
        padding:  10px 0 10px 0;
        margin-top:-20px;
        margin-right:-10px;
    }
    .formm{
        margin-left:-70px;
    }
    .mtop{margin-top:0px;}
    .mbot{margin-bottom:0px;}
        
        .site_logo {
            margin: 0 auto;
            top: 43px;
            display: block;
            width: 440px;
            font-size: 18px;
            color: #143FAE;
            text-align: center;
            border: 0px solid black;
           // background: url(http://axiomatica.ru/image/site/logo.png) no-repeat top;
            }
               
          .span1{           
              border: 0px solid black;
            }
            .form-actions{



            }
</style>





<div class="row">
<div class="span6 offset3 shadow">
    <div class="form-actions mtop">
        <span class="site_logo">Система поддержки принятия решений </br>при цитологической диагностике заболеваний</span>
    </div>
    <div class="form">
    <div class="row">
        <div class="span1 logg"><img  src="<?=Yii::app()->baseUrl.'../img/logo.png'?>" /></div>
        <div class="span5 formm">
            
                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'id'=>'login-form',
                        'type'=>'horizontal',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                        ),
                )); ?>
                <br/>
                    <?php echo $form->textFieldRow($model,'username', [ 
                        //'hint'=>'имя пользователя',
                         ]); ?>
                    <?php echo $form->passwordFieldRow($model,'password',[
                   //'hint'=>'Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>',
                         ]); ?>
                    <?php echo $form->checkBoxRow($model,'rememberMe'); ?>
        </div>
        </div>
        
                   <div class="form-actions mbot">
                       <div class="row"> 
                           <div class="span1 offset2">
                           <?php $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType'=>'submit',
                            'type'=>'primary',
                            'label'=>'Войти',
                        )); ?>
                            </div>
                       </div>
                   </div>

            <?php $this->endWidget(); ?>



            </div><!-- form -->
            </div>
        
    

</div>