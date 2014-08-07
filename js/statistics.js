/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 06.08.14
 * Time: 16:17
 * To change this template use File | Settings | File Templates.
 */


$(document).ready(function () {


    var im_p = $('#overlay_proj');
    var nums = $('#proj_stat');
    var proj_t = $('#proj_table');

    var im_a = $('#overlay_activ');
    var act = $('#activ_stat');
    var act_t = $('#act_table');


    var stat_p = im_p.add(nums);
    var stat_a = im_a.add(act);


    $('a#vuz').click(function(){
        if (stat_p.css('display') !== 'none'){

            stat_p.fadeOut(1000);
            proj_t.fadeOut(700);
        }
            if (stat_a.css('display') == 'none'){
                stat_a.fadeIn(1000);
                act_t.delay(700).fadeIn('slow');
            }
            else
            {
                stat_a.delay(500).fadeOut('slow');
                act_t.delay(500).fadeOut('slow');
            }

    })

    $("a#proj").click(function(){

        console.log('ээээээ');
        console.log(stat_p);

        if (stat_a.css('display') !== 'none'){

            stat_a.fadeOut(1000);
            act_t.fadeOut(700);
        }
            if (stat_p.css('display') == 'none'){
                stat_p.fadeIn(1000);
                proj_t.delay(700).fadeIn('slow');

            }
            else
            {
                stat_p.delay(500).fadeOut('slow');
                proj_t.delay(500).fadeOut('slow');
            }

    });
});