
<style>
    .scrolll{
            height: 180px;
            overflow: auto;
            position: relative;
            }
    .scroll{
            height: 400px;
            overflow: auto;
            position: relative;
            }
     .sho{
            display: block;
            visibility:visible;

            }
    .num{
            margin-top:-60px;
            background:#E0E0E0;
            color:#3299B7;
            padding:10px;
            width:50px;
            text-align:center;
            height:20px;
            //z-index: 9900;
            position:absolute;

    }
    
</style>


<div class="row">
   
        <br/>

    <ul class="nav nav-tabs">
        <li><a href="<?=Yii::app()->createUrl('UseDSS/patientDB')?>">База данных пациентов</a></li>
        <li class="active">
            <a href="<?=Yii::app()->createUrl('UseDSS/images')?>">Изображения</a></li>
        <li><a href="<?=Yii::app()->createUrl('UseDSS/searchOptions')?>">Поиск</a></li>
        <li><a href="<?=Yii::app()->createUrl('UseDSS/analitics')?>">Аналитика</a></li>
    </ul>
   
        
    <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                      <th>№ истории болезни</th>
                      <th>Возраст</th>
                      <th>Пол</th>
                      <th>Цитологическое заключение</th>
                      <th>Гистологическое заключение</th>
                      <th>Изображений</th>
                    </tr>
                 </thead>
                 <? if(isset($dataPatient)) :
                        foreach ($dataPatient as $d):
                 ?>
                    <tbody>
                    <tr>
                        <td><?=$d['num']?></td>
                        <td><?=$d['age']?></td>
                        <td><?=$d['sex']?></td>
                        <td><?=$d['cyt']?></td>
                        <td><?=$d['gyst']?></td>
                        <td><?=$d['imgs']?></td>

                    </tr>
                    </tbody>
                    <?
                    endforeach; endif;
                    ?>
    </table>
    <div class="span7">  
           <div id="myCarousel" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">
              <? if(isset($dataImages)):
                  $i = 0;
                  $org = Yii::app()->session['organ'];
                  
              foreach ($dataImages as $dd):
                  $fileURL = Yii::app()->baseUrl.'/img/Cytology/'.$org.'/'.$dd['im_name'] ;
                  $filePath = Yii::app()->basePath.'/../img/Cytology/'.$org.'/'.$dd['im_name'] ;
                  $noFile = Yii::app()->baseUrl.'/img/Cytology/not_found.jpg';
                  if(file_exists($filePath)){
                    ?>
                        <div <?=($i == 0)?('class="active item"'):('class="item"')?> ><img src="<?=$fileURL ?>" alt=""></div>
                    <?
                    }else{   ?>
                        <div <?=($i == 0)?('class="active item"'):('class="item"')?> ><img src="<?=$noFile ?>" alt=""></div>
                  <?
                    }
                $i++; endforeach; endif;
              ?>
            
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
          <div class="num"></div>
           
    </div>
    <div class="span5 ">
        <div class="scrolll">
            <ul class="thumbnails">
                
                <? if(isset($dataImages)):
                  $x = 0;
                  $org = Yii::app()->session['organ'];
                  
              foreach ($dataImages as $dd):
                  $fileURL = Yii::app()->baseUrl.'/img/Cytology/'.$org.'/'.$dd['im_name'] ;
                  $filePath = Yii::app()->basePath.'/../img/Cytology/'.$org.'/'.$dd['im_name'] ;
                  $noFile = Yii::app()->baseUrl.'/img/Cytology/not_found_small.jpg';
                  if(file_exists($filePath)){
                    ?>
                        <li class="span2">
                            <a href="#" class="thumbnail" data-toggle='modal' data-target='#ImageModal' id='<?=$dd['im_id']?>'>
                                <img  src="<?=$fileURL ?> ?> " alt="">
                            </a>
                        </li>                
                    <?
                    }else{   ?>
                        <li class="span2">
                            <a href="#" class="thumbnail" data-toggle='modal' data-target='#ImageModal' id='<?=$dd['im_id']?>'>
                                <img  src="<?=$noFile ?> " alt="">
                            </a>
                        </li> 
                            <?
                    }
                $i++; endforeach; endif;
              ?>
            </ul>
        </div>
        <br>
        
        <?
        if(isset($dataImgProp)):
                  $z = 1;                  
              foreach ($dataImgProp as $dd):
        ?>
        
        <div <?=($z==1)?('class="scroll"'):('class="scroll hidden"')?> id="id<?=$z?>" >
           <table class="table table-condensed table-bordered">
            <tr>
                <th width='50%'>№ изображения</th>
                <td><?=$z?></td>
            </tr>
            <tr>
                <th>Окраска</th>
                <td><?=$dd[0]['color']?></td>
            </tr>
            <tr>
                <th>Всего изображений</th>
                <td><?=count($dataImgProp)?></td>
            </tr>
            <tr>
                <th>Цитологическое описание</th>
                <td><?=$dd[0]['cyt']?></td>
            </tr>
            <tr>
                <th>Гистологическое описание</th>
                <td><?=$dd[0]['gyst']?></td>
            </tr>
            </table>
            
            
            <?
            if(!empty($dd[1])): 
                               
            ?>
            <h5 > <span class="text-info">Микро признаки</span></h5>
            <table class="table table-condensed table-bordered">
            
             <?
             foreach ($dd[1] as $f ):
             ?>   
            <tr>
            <th width='40%'><?=$f['main']?></th>
            <td>
                <ul>
                <? if(!empty($f['sub'])):  
                    foreach ($f['sub'] as $sub): ?>                    
                    <li><?=$sub['name']?></li>
                <? endforeach;  endif; ?>
                </ul>
            </td>
            </tr>
            <? endforeach;?>
            </table>
            <? endif; ?>
            
            
          </div>
          <?
          $z++;
        endforeach;  endif;
          
          
          ?>
            
           <!-- <a class="" data-toggle='modal' data-target='#TEST'>Простой словарь</a> -->
            
            
            
            
        
    </div>
</div>

<? // print_r($dataImgProp); ?>



<script>
        var totalItems = $('.item').length;
        var currentIndex = $('div.active').index() + 1;
        var currentTable = $('div.hidden table tr td').val();
        $('.num').html(''+currentIndex+'/'+totalItems+'');

        $('#myCarousel').carousel({
            interval: 7000
        });

        $('#myCarousel').bind('slid', function() {
            currentIndex = $('div.active').index() + 1;
           $('.num').html(''+currentIndex+'/'+totalItems+'');
           $('[id ^= id]').addClass('hidden');
           $('#id'+currentIndex).removeClass('hidden');
        });    
 
 </script>
 
 <?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'ImageModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4 class="text-info">Выбор изображения</h4>
</div>
 
<div class="modal-body">
    <p class="text-info">Вы выбрали изображение ID <span id="image"></span>.</p>
</div>
 
<div class="modal-footer">
   
    
</div>
 
<?php $this->endWidget(); ?>



