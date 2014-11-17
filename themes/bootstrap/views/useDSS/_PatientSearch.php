<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo strtoupper($data);
?>

<div class="row">

     <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                      <th>Найдено</th>
                      <th>Тип поиска</th>
                      <th>Цитологический диагноз</th>
                      <th>Гистологический диагноз</th>
                      <th>Метод исследования</th>
                      <th>Выбранные микропризнаки</th>
                    </tr>
                 </thead>
                <tbody>
                <tr>
                    <td>35</td>
                    <td>И</td>
                    <td>Бронхоулез</td>
                    <td>Очень скверный</td>
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
    
    
     <table class="table table-condensed table-striped table-hover table-bordered">
            <thead>
            <th>ID</th>
            <th width="10%">№</th>
            <th width="30%">Цитологический диагноз</th>
            <th width="30%">Гистологический диагноз </th>
            <th>Возраст</th>
            <th>Пол</th>
            <th>Вероятность</th>
        </thead>
            <tbody>
              <? 
        if(isset($searchData)):
            foreach ($searchData as $dat): ?>
                <tr class='choice' data-toggle='modal' data-target='#PatientModal' id='<?=$dat['id'] ?>'>
                    <td><?=$dat['id'] ?></td>
                    <td><?=$dat['num'] ?></td>
                    <td><?=$dat['cyt'] ?></td>
                    <td><?=$dat['gyst'] ?></td>
                    <td><?=$dat['age'] ?></td>
                    <td><?=$dat['sex'] ?></td>
                    <td><?=25 + rand()%(93-25)."%" ?></td>
                </tr>
        <? endforeach; endif;?>
        
            </tbody>
        </table>
        
</div>