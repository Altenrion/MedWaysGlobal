<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo "<b>".$data."</b>";
?>
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
        
    <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                      <th>Тип поиска</th>
                      <th>Окраска</th>
                      <th>Увеличение</th>
                      <th>Цитологическое описание</th>
                      <th>Метод исследования</th>
                      <th>Выбранные микропризнаки</th>
                    </tr>
                 </thead>
                <tbody>
                <tr>
                    <td>И</td>
                    <td>Папаниколау</td>
                    <td>100</td>
                    <td> </td>
                    <td> </td>
                    <td>
                        <ul>
                            <li>Увеличенные клетки эпителия</li>
                            <li>2-клетки плоского эпителия</li>
                            <li>Возможно пипец как все плохо</li>
                        </ul>
                    </td>
                </tr>
                </tbody>
    </table>
    <div class="span7">

             
        
        
           <?php 
//           $this->widget('bootstrap.widgets.TbCarousel', array(
//                'items'=>array(
//                    array('image'=>Yii::app()->baseUrl.'/img/cells/{37cbb4ff-fa8d-4812-8597-0827a86aa622}.jpg', 'label'=>'', 'caption'=>false),
//                    array('image'=>Yii::app()->baseUrl.'/img/cells/1.jpg', 'label'=>'', 'caption'=>false),
//                    array('image'=>Yii::app()->baseUrl.'/img/cells/2.jpg', 'label'=>'', 'caption'=>false),
//                ),
//            ));
           ?>
           
           <div id="myCarousel" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">
              <div class="active item"><img src="<?=Yii::app()->baseUrl.'/img/cells/1.jpg' ?> " alt=""></div>
              <div class="item"><img src="<?=Yii::app()->baseUrl.'/img/cells/2.jpg' ?> " alt=""></div>
              <div class="item"><img src="<?=Yii::app()->baseUrl.'/img/cells/3.jpg' ?> " alt=""></div>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
          <div class="num"></div>

           
           <?
           //// if(isset($images)){
              //  foreach ($images as $img){  ?>
            <!--     <li class="span2">   
                    <a href="#" class="thumbnail">
                    <img src="<? // =Yii::app()->baseUrl.'/img/TImages/'.strtolower ($img['UNIQUEFILENAME'])  ?> " alt="">
                    </a>
                 </li>
                
-->
<!--<img src="<? //  =Yii::app()->baseUrl."/img/TImages/".strtolower ($img['UNIQUEFILENAME']) ?>" >-->

               <?// } } ?> 
                      
    </div>
    <div class="span5 ">
        <div class="scrolll">
            <ul class="thumbnails">
              <li class="span2">
                <a href="#" >
                    <img class="img-polaroid" src="<?=Yii::app()->baseUrl.'/img/cells/{37cbb4ff-fa8d-4812-8597-0827a86aa622}.jpg' ?> " alt="">
                </a>
              </li>
              <li class="span2">
                <a href="#" >
                    <img class="img-polaroid" src="<?=Yii::app()->baseUrl.'/img/cells/2.jpg' ?> " alt="">
                </a>
              </li>
              <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="<?=Yii::app()->baseUrl.'/img/cells/3.jpg' ?> " alt="">
                </a>
              </li>
              <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="<?=Yii::app()->baseUrl.'../img/cells/4.jpg' ?> " alt="">
                </a>
              </li>
              <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="<?=Yii::app()->baseUrl.'../img/cells/5.jpg' ?> " alt="">
                </a>
              </li>
            </ul>
        </div>
        <br>
        <div class="scroll " id="id1" >
           <table class="table table-condensed table-bordered">
            <tr>
                <th width='50%'>№ изображения</th>
                <td>1</td>
            </tr>
            <tr>
                <th>Окраска</th>
                <td>Папаниколау</td>
            </tr>
            <tr>
                <th>Всего изображений</th>
                <td>3</td>
            </tr>
            <tr>
                <th>Цитологическое описание</th>
                <td>первый</td>
            </tr>
            <tr>
                <th>Гистологическое описание</th>
                <td>...</td>
            </tr>
            </table>
            
            <h5 > <span class="text-info">Микро признаки</span></h5>
            <table class="table table-condensed table-bordered">
            <tr>
            <th>Клетки плоского эпителия</th>
                <td>
                    <ul>
                        <li>поверхностные</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Клетки с укрупненными ядрами</th>
                <td>
                    <ul>
                        <li>с обильной цитоплазмой</li>
                        <li>цилиндрического эпителия</li>
                        <li>с необычной цитоплазмой</li>
                    </ul>
                </td>
            </tr>
           </table>
          
          
            
        </div>
        <div class="scroll hidden" id="id2">
           <table class="table table-condensed table-bordered">
            <tr >
                <th width='50%'>№ изображения</th>
                <td>2</td>
            </tr>
            <tr>
                <th>Окраска</th>
                <td>Папаниколау</td>
            </tr>
            <tr>
                <th>Всего изображений</th>
                <td>3</td>
            </tr>
            <tr>
                <th>Цитологическое описание</th>
                <td>Второй</td>
            </tr>
            <tr>
                <th>Гистологическое описание</th>
                <td>...</td>
            </tr>
           </table>
        </div>
        <div class="scroll hidden" id="id3">
           <table class="table table-condensed table-bordered">
            <tr >
                <th width='50%'>№ изображения</th>
                <td>3</td>
            </tr>
            <tr>
                <th>Окраска</th>
                <td>Папаниколау</td>
            </tr>
            <tr>
                <th>Всего изображений</th>
                <td>3</td>
            </tr>
            <tr>
                <th>Цитологическое описание</th>
                <td>Третий</td>
            </tr>
            <tr>
                <th>Гистологическое описание</th>
                <td>...</td>
            </tr>
           </table>
        </div>
    </div>
</div>
<script>
        var totalItems = $('.item').length;
        var currentIndex = $('div.active').index() + 1;
        var currentTable = $('div.hidden table tr td').val();
        $('.num').html(''+currentIndex+'/'+totalItems+'');

        $('#myCarousel').carousel({
            interval: 3000
        });

        $('#myCarousel').bind('slid', function() {
            currentIndex = $('div.active').index() + 1;
           $('.num').html(''+currentIndex+'/'+totalItems+'');
           $('[id ^= id]').addClass('hidden');
           $('#id'+currentIndex).removeClass('hidden');
        });    
 
 </script>

