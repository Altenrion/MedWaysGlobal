/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 06.08.14
 * Time: 8:11
 * To change this template use File | Settings | File Templates.
 */
//
//function regProject(){
//    $("form.forms").append( $('<fieldset id="two"><h3 class="section-title">Регистрация проекта</h3><ol>'+
//
//        '<li><select name="sex" id=""><option value="m">Пол</option><option value="m">м</option><option value="f">ж</option></select></li>'+
//
//        '<li class="form-row text-input-row subject-field"><input type="text" name="qq" class="text-input defaultText required" title="Название проекта"/></li>'+
//
//
//        '<li class="form-row text-area-row"><textarea name="message" class="text-area required"></textarea></li>'+
//
//        '<li class="button-row"><input type="submit" value="Submit" name="submit" class="btn btn-submit bm0"></li></ol>'+
//
//        '</fieldset>') );
//
//}


$('#mem').change(function(){
        var num = $(this).val();
        var ol  = $('fieldset#project>ol');


        switch(num){
            case '0':
                $('#project').slideUp();
                $('#submit_butt').slideUp();


                break;
            case 'Manager':
                $('#submit_butt').slideUp();
                ol.find('input').addClass('required');
                $("#project").delay(500).slideDown( "slow" );
                break;
            case 'Exp':

                $('#project').slideUp('slow');
                $('#submit_butt').delay( 500).slideDown();

                ol.find('input').removeClass('required');
                ol.find('textarea').removeClass('required');


                //$('#project').delay( 500).remove();
                break;
        }

});
