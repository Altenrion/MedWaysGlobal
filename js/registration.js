/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 06.08.14
 * Time: 8:11
 * To change this template use File | Settings | File Templates.
 */


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
