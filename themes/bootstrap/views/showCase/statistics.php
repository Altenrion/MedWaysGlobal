<?php
/* @var $this ShowCaseController */


?>

<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 04.08.14
 * Time: 14:03
 * To change this template use File | Settings | File Templates.
 */

?>



<div class="head-image option-4" style="background-image: url(<?=Yii::app()->baseUrl?>/images/art/ptbg4.jpg);">
    <div class="overlay dark">
        <div class="container">
            <h1 class="page-title">Статистика</h1>
        </div>
    </div>
</div>

<div class="light-wrapper">
    <div class="container inner">


        <div class="row classic-blog">
            <div class="col-sm-8 content">


                <figure class="media-wrapper portfolio con">
                    <img  src="<?=Yii::app()->baseUrl?>/images/art/map_overlay.png" width="770" height="477" alt="">

                    <img id="overlay_proj" src="<?=Yii::app()->baseUrl?>/images/art/m_overlay_p.png"  class="up"  width="770" height="477" alt="" style="display:none;">
                    <img id="proj_stat" src="<?=Yii::app()->baseUrl?>/images/art/in.png"  class="up"  width="770" height="477" alt="" style="display:none;">
                    <img id="overlay_activ" src="<?=Yii::app()->baseUrl?>/images/art/m_overlay_a.png"  class="up"  width="770" height="477" alt="" style="display:none;">
                    <img id="activ_stat" src="<?=Yii::app()->baseUrl?>/images/art/in.png"  class="up"  width="770" height="477" alt="" style="display:none;">


                </figure>



                <div class="divide70"></div>
                <table class="table table-bordered table-hover table-striped" id="proj_table" style="display:none;">
                    <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Order Date</th>
                        <th>Order Time</th>
                        <th>Amount (USD)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>3326</td>
                        <td>10/21/2013</td>
                        <td>3:29 PM</td>
                        <td>$321.33</td>
                    </tr>
                    <tr>
                        <td>3325</td>
                        <td>10/21/2013</td>
                        <td>3:20 PM</td>
                        <td>$234.34</td>
                    </tr>
                    <tr>
                        <td>3324</td>
                        <td>10/21/2013</td>
                        <td>3:03 PM</td>
                        <td>$724.17</td>
                    </tr>
                    <tr>
                        <td>3323</td>
                        <td>10/21/2013</td>
                        <td>3:00 PM</td>
                        <td>$23.71</td>
                    </tr>
                    <tr>
                        <td>3322</td>
                        <td>10/21/2013</td>
                        <td>2:49 PM</td>
                        <td>$8345.23</td>
                    </tr>
                    <tr>
                        <td>3321</td>
                        <td>10/21/2013</td>
                        <td>2:23 PM</td>
                        <td>$245.12</td>
                    </tr>
                    <tr>
                        <td>3320</td>
                        <td>10/21/2013</td>
                        <td>2:15 PM</td>
                        <td>$5663.54</td>
                    </tr>
                    <tr>
                        <td>3319</td>
                        <td>10/21/2013</td>
                        <td>2:13 PM</td>
                        <td>$943.45</td>
                    </tr>
                    </tbody>
                </table>

                <table class="table table-bordered table-hover table-striped" id="act_table" style="display:none;">
                    <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Order Date</th>
                        <th>Order Time</th>
                        <th>Amount (USD)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>3326</td>
                        <td>10/21/2013</td>
                        <td>3:29 PM</td>
                        <td>$321.33</td>
                    </tr>
                    <tr>
                        <td>3325</td>
                        <td>10/21/2013</td>
                        <td>3:20 PM</td>
                        <td>$234.34</td>
                    </tr>


                    <tr>
                        <td>3319</td>
                        <td>10/21/2013</td>
                        <td>2:13 PM</td>
                        <td>$943.45</td>
                    </tr>
                    </tbody>
                </table>


            </div>
            <!-- /.col-sm-8 .content -->

            <aside class="col-sm-4 sidebar lp30">

                <div class="sidebox widget">
                    <h3>Фильтр</h3>
                    <ul class="circled">
                        <li ><a id="proj" href="#про">Кол-во проектов по ФО </a></li>
                        <li  ><a id="vuz" href="#акт">Кол-во активных вузов </a></li>
                    </ul>
                </div>
                <!-- /.widget -->

                <div class="sidebox widget">
                    <h3>Легенда</h3>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean lacinia bibendum nulla sed consectetur. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Sed posuere consectetur est at lobortis. Vivamus sagittis lacus vel augue. Fusce  mauris condimentum.</p>
                </div>
                <!-- /.widget -->


            </aside>
            <!-- /.col-sm-4 .sidebar -->
        </div>
        <!-- /.row .classic-blog -->
    </div>
    <!-- /.container -->
</div>
<!-- /.light-wrapper -->


<?
$base_url = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($base_url.'/js/statistics.js', CClientScript::POS_END);


?>
