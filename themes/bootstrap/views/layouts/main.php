<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <?php
        Yii::app()->bootstrap->register();
        ?>
       
        <style>
            #page{
               /*width:960px;*/
                border:0px solid graytext;
                
            }
            .mine{
                width:50px;
                height:40px;
                color: blue;
                background: black;
                
            }
            
            .go-up, .go-down {
                display: none;
                position: fixed; /*позиционирование*/
                z-index: 9999; /*поверх все элементов на странице*/
                right: 15%; /*положение на странице, если слева - left*/
                background: #4F4F4F;
                border: 1px solid #ccc;
                border-radius: 5px;
                cursor: pointer;
                color: #fff;
                text-align: center;
                font: normal normal 42px/42px sans-serif;
                text-shadow: 0 1px 2px #000;
                opacity: .5;
                padding: 3px;
                margin-bottom: 5px;
                width: 42px;
                height: 42px;
                margin-right: -150px;
               }
               .go-up { bottom: 60px; }
               .go-down { bottom: 10px; }
               .go-down:hover,
               .go-up:hover {
                opacity: 1;
                box-shadow: 0 5px 0.5em -1px #666;
               }
         
        </style>
    </head>

    <body>

        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'СППР', 'url' => array('/UseDSS/patientDB')),
                        array('label' => 'Управление', 'url' => array('/tuneDSS/index'), 'visible' => Yii::app()->user->checkAccess('Dev')),
        
                    ),
                ),
                
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                       
                        array('label' => Yii::app()->user->name . ' - ' . Yii::app()->user->role, 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                    ),
                ),
            ),
        ));
        ?>

        <div class="container" id="page">

          
                
 <div class="btn-toolbar">
     
     <? if(Yii::app()->user->checkAccess('Dev') || Yii::app()->user->checkAccess('Moderator')): ?>
     <div class="btn-group">
        <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
          Словарь
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="" data-toggle='modal' data-target='#SimpleDictionary'>Простой словарь</a>
            </li>
            <li>
                <a class="" data-toggle='modal' data-target='#MicMacDictionary'>Словарь микро и макро признаков</a>
            </li>
        </ul>
      </div>
     <? endif; ?>
     
     
     <? if(Yii::app()->user->checkAccess('Dev') || Yii::app()->user->checkAccess('Moderator')): ?>
     <div class="btn-group">
        <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
          Пациент
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="" data-toggle='modal' data-target='#AddPatient'>Добавить нового пациента</a>
            </li>
            <li>
                <a class="" data-toggle='modal' data-target='#EditPatient'>Редактировать данные пациента</a>
            </li>
            <li>
                <a class="" data-toggle='modal' data-target='#DeletePatient'>Удалить выбранного пациента</a>
            </li>
        </ul>
      </div>
     <? endif; ?>
        
      <? if(Yii::app()->user->checkAccess('Dev') || Yii::app()->user->checkAccess('Moderator')): ?>
     <div class="btn-group">
        <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
          Изображения
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="" data-toggle='modal' data-target='#AddImage'>Добавить новое изображение</a>
            </li>
            <li>
                <a class="" data-toggle='modal' data-target='#EditImage'>Редактировать выбранное изображение</a>
            </li>
            <li>
                <a class="" data-toggle='modal' data-target='#DeleteImage'>Удалить выбранное изображение</a>
            </li>
        </ul>
      </div>
     <? endif;?>
       
     <div class="btn-group">
        <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
          Поиск
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?=Yii::app()->createUrl('UseDSS/searchOptions') ?>">Поиск по пациентам</a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl('UseDSS/searchOptions') ?>">Поиск по изображениям</a>
            </li>

        </ul>
      </div>
      <div class="btn-group">
        <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
          Аналитика
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?=Yii::app()->createUrl('UseDSS/analitics') ?>">Общая</a>
            </li>
        </ul>
      </div>  
         
</div>
            
    
<?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer"><br/><br/>
                Copyright &copy; <?php echo date('Y'); ?> by Altenrion <br/>
                <!--All Rights Reserved.-->
<?php // echo Yii::powered();  ?>
            </div><!-- footer -->

        </div><!-- page -->
        <?
        $this->renderPartial('/useDSS/_simpleDictionary');
        $this->renderPartial('/useDSS/_micMacDictionary');
        $this->renderPartial('/useDSS/_addPatient');
        $this->renderPartial('/useDSS/_editPatient');
        $this->renderPartial('/useDSS/_deletePatient');
        $this->renderPartial('/useDSS/_addImage');
        $this->renderPartial('/useDSS/_editImage');
        $this->renderPartial('/useDSS/_deleteImage');
        $this->renderPartial('/useDSS/_TEST');

        ?>
        <div class="go-up" title="Вверх" id='ToTop'>⇧</div>
        <div class="go-down" title="Вниз" id='OnBottom'>⇩</div>
</body>
</html>

 <script>
        $('#yw4.dropdown-menu').children('li').eq(0).children('a').attr({"name":"123", "data-modal":'modal','data-target':'#myl'});
       $(function(){
            if ($(window).scrollTop()>="250") $("#ToTop").fadeIn("slow")
            $(window).scroll(function(){
             if ($(window).scrollTop()<="250") $("#ToTop").fadeOut("slow")
              else $("#ToTop").fadeIn("slow")
            });

            if ($(window).scrollTop()<=$(document).height()-"999") $("#OnBottom").fadeIn("slow")
            $(window).scroll(function(){
             if ($(window).scrollTop()>=$(document).height()-"999") $("#OnBottom").fadeOut("slow")
              else $("#OnBottom").fadeIn("slow")
            });

            $("#ToTop").click(function(){$("html,body").animate({scrollTop:0},"slow")})
            $("#OnBottom").click(function(){$("html,body").animate({scrollTop:$(document).height()},"slow")})
           });
 
 
 
 
 </script>
       <!--data-toggle='modal' data-target='#PatientModal'-->

