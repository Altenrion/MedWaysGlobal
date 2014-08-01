<style>
    .scroll{
            height: 600px;
            overflow: auto;
            position: relative;
            }
            
    .form-horizontal .control-label {
            float: left;
            width: 180px;
            padding-top: 5px;
            text-align: right;
            padding-right: 15px;
        }
</style>

<div class="row">
   
        <br/>

    <ul class="nav nav-tabs">
        <li><a href="<?=Yii::app()->createUrl('UseDSS/patientDB')?>">База данных пациентов</a></li>
        <li><a href="<?=Yii::app()->createUrl('UseDSS/images')?>">Изображения</a></li>
        <li class="active"><a href="<?=Yii::app()->createUrl('UseDSS/searchOptions')?>">Поиск</a></li>
        <li><a href="<?=Yii::app()->createUrl('UseDSS/analitics')?>">Аналитика</a></li>
    </ul>
   <ul class="nav nav-tabs ">
       <li class="active">
            <a href="<?=Yii::app()->createUrl('UseDSS/searchOptions')?>">Параметры поиска</a>
        </li>
        <li ><a href="<?=Yii::app()->createUrl('UseDSS/searchResults')?>">Результаты поиска</a></li>
       
    </ul>
        
        
    <div class="span5 ">
        <form class="form-horizontal" method="POST" action="<?=Yii::app()->createUrl('UseDSS/searchResults') ?>">
    <div class="control-group alert-info">
        
        <label class="control-label " >Поиск по</label>
        <div class="controls">
            <label class="checkbox inline ">
                <input type="radio" name="searchBy" id="optionsRadios1" value="patient" checked=""> пациентам
            </label>
            <label class="checkbox inline">
                <input type="radio" name="searchBy" id="optionsRadios1" value="image"> изображениям
            </label>
        </div>
    </div>
            <span class="divider"></span>

    <div class="control-group alert-info">
        <label class="control-label" >Тип поиска</label>
        <div class="controls">
            <label class="checkbox inline">
                <input type="radio" name="searchType" id="optionsRadios1" value="AND" checked=""> И
            </label>
            <label class="checkbox inline">
                <input type="radio" name="searchType" id="optionsRadios1" value="OR"> ИЛИ
            </label>
        </div>
    </div>
            <div id="patientSearch">  
    <div class="control-group">
    <label class="control-label" for="inputNum">№ истории болезни</label>
        <div class="controls">
            <input type="number" name="num" id="inputNum" placeholder="Номер истории болезни">
        </div>
    </div>
        
    <div class="control-group">
    <label class="control-label" for="inputDate">Дата рождения</label>
        <div class="controls">
            <input type="date" name="date" id="inputDate" placeholder="2000-12-28">
        </div>
    </div>
        
    <div class="control-group">
    <label class="control-label" for="selectCyt">Цитологический диагноз</label>
        <div class="controls">
                 <select id="selectCyt" name="cytDiag" >
                    <option value="---"> </option>
                     <? if(isset($cytDiag)):  
                            foreach ($cytDiag as $cyt):
                          ?>
                    <option value="<?=$cyt['id']?>"><?=$cyt['name']?></option>
                    <?
                        endforeach;  endif;
                    ?>
                 
                 
                 </select>
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="selectGyst">Гистологический диагноз</label>
        <div class="controls">
                <select id="selectGyst" name="gystDiag" >
                     <option value="---"> </option>
                    <? if(isset($gystDiag)):  
                            foreach ($gystDiag as $gyst):
                          ?>
                     <option value="<?=$gyst['id']?>"><?=$gyst['name']?></option>
                    <?
                        endforeach;  endif;
                    ?>
                 
                </select>
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="selectMethod">Метод исследования</label>
        <div class="controls">
                <select id="selectMethod" name="methodPat" >
                    <option value="---"> </option>
                    <? if(isset($type)):  
                            foreach ($type as $ty):
                    ?>
                     <option value="<?=$ty['id']?>"><?=$ty['name']?></option>
                    <?
                        endforeach;  endif;
                    ?>
                </select>
        </div>
    </div>
            </div>
            
            
            
            <div id="imageSearch">  
   
        
    <div class="control-group">
    <label class="control-label" for="selectCyt">Цитологическое описание</label>
        <div class="controls">
                 <select id="selectCyt" name="cytDescr" >
                    <option value="---"> </option>
                    <? if(isset($cytDescr)):  
                            foreach ($cytDescr as $cyyt):
                          ?>
                     <option value="<?=$cyyt['id']?>"><?=$cyyt['name']?></option>
                    <?
                        endforeach;  endif;
                    ?>
                 </select>
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="selectGyst">Гистологическое описание</label>
        <div class="controls">
                <select id="selectGyst" name="gystDescr" >
                    <option value="---"> </option>
                    <? if(isset($gystDescr)):  
                            foreach ($gystDescr as $gyyst):
                    ?>
                     <option value="<?=$gyyst['id']?>"><?=$gyyst['name']?></option>
                    <?
                        endforeach;  endif;
                    ?>
                </select>
        </div>
    </div>
     <div class="control-group">
    <label class="control-label" for="paint">Окраска</label>
        <div class="controls">
                <select id="paint" name="paint" >
                    <option value="---"> </option>
                    <? if(isset($color)):  
                            foreach ($color as $co):
                    ?>
                     <option value="<?=$co['id']?>"><?=$co['name']?></option>
                    <?
                        endforeach;  endif;
                    ?>
                </select>
        </div>
    </div>
                 
     <div class="control-group">
    <label class="control-label" for="zoom">Увеличение</label>
        <div class="controls">
                <select id="zoom" name="zoom" >
                    <option value="---"> </option>
                    <? if(isset($zoom)):  
                            foreach ($zoom as $zo):
                    ?>
                     <option value="<?=$zo['id']?>"><?=$zo['name']?></option>
                    <?
                        endforeach;  endif;
                    ?>
                </select>
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="selectMethod">Метод исследования</label>
        <div class="controls">
                <select id="selectMethod" name="methodImg" >
                    <option value="---"> </option>
                    <? if(isset($type)):  
                            foreach ($type as $ty):
                    ?>
                     <option value="<?=$ty['id']?>"><?=$ty['name']?></option>
                    <?
                        endforeach;  endif;
                    ?>
                </select>
        </div>
    </div>
            </div>
  <div class="control-group">
    <div class="controls">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Очистить')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Поиск')); ?>
    </div>
  </div>
</form>
        
        </div>
    <!--//////////////////////////////////////////-->
    <div class="span5 ">
  <div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
      <li id="Micro"><a href="#tab1" data-toggle="tab">Микропризнаки</a></li>
      <li id="Macro"><a href="#tab2" data-toggle="tab">Макропризнаки</a></li>
    </ul>
  <div class="tab-content">
    <div class="tab-pane scroll" id="tab1">
        
      <p>Я первая секция.</p>
    <? //var_dump($_POST);?>
      <? //var_dump($cytDiag)?>
    </div>
    <div class="tab-pane scroll" id="tab2">
    
              
        <ul class="accordion unstyled" id="accordion3">
            <li class="accordion-group">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse2">
                      Меню #2
                    </a>
                    <ul id="collapse2" class="accordion-body collapse">
                        <li>первый под</li>
                        <li>второй под</li>
                        <li>третий под</li>
                    </ul>
            </li>
              <li class="accordion-group">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse3">
                      Меню #3
                    </a>
                    <ul id="collapse3" class="accordion-body collapse ">
                        <li>первый под 3</li>
                        <li>второй под 3</li>
                        <li>третий под 3</li>
                    </ul>
            </li>
            <li>четыри</li>
        </ul>
    </div>
  </div>
  </div>
</div>
</div>


<script>
$(document).ready(function(){
    $("#imageSearch").addClass('hidden');
    $("li#Micro").addClass('active');
    $("div#tab1").addClass('active');

$('input:radio[name=searchBy]').change(function(){
      var point = $(this).val();
        if (point == 'patient')
        {
            $("#patientSearch").removeClass('hidden'); 
            $("#imageSearch").addClass('hidden'); 
            $("li#Macro").removeClass('active');
            $("div#tab2").removeClass('active');
            $("div#tab1").addClass('active');
            $("li#Micro").addClass('active');

        }
         if (point == 'image')
        {
            
            $("div#tab1").removeClass('active');
            $("div#tab2").addClass('active');
            $("li#Micro").removeClass('active');
            $("li#Macro").addClass('active');
            $("#patientSearch").addClass('hidden');
            $("#imageSearch").removeClass('hidden'); 
        }
    });
});/*end  ready*/

</script>