/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 16.08.14
 * Time: 14:16
 * To change this template use File | Settings | File Templates.
 */


$(document).ready(function () {
    $('#openBtn').click(function(){
        $('#myModal').modal({show:true})
    });



    $('#enable').click(function (e) {
//        e.stopPropagation()
        console.log("I'm Here");

        $('a[rel^="F_NAME"]').editable('toggleDisabled');
        $('a[rel^="L_NAME"]').editable('toggleDisabled');
        $('a[rel^="S_NAME"]').editable('toggleDisabled');
        $('a[rel^="BIRTH_DATE"]').editable('toggleDisabled');
        $('a[rel^="PHONE"]').editable('toggleDisabled');
        $('a[rel^="SEX"]').editable('toggleDisabled');
        $('a[rel^="DEGREE"]').editable('toggleDisabled');
        $('a[rel^="ACADEMIC_TITLE"]').editable('toggleDisabled');
        $('a[rel^="ID_DISTRICT"]').editable('toggleDisabled');
        $('a[rel^="ID_UNIVER"]').editable('toggleDisabled');
        $('a[rel^="ID_SPECIALITY"]').editable('toggleDisabled');
        $('a[rel^="W_POSITION"]').editable('toggleDisabled');
        $('a[rel^="HIRSH"]').editable('toggleDisabled');
        $('a[rel^="PRIVACY"]').editable('toggleDisabled');


    });

    $('#enable').click(function (e) {
//        e.stopPropagation()
        console.log("I'm Here");

        $('a[rel^="ID_STAGE"]').editable('toggleDisabled');
        $('a[rel^="NAME"]').editable('toggleDisabled');
        $('a[rel^="DESCR_PROJECT"]').editable('toggleDisabled');
        $('a[rel^="ROADMAP_PROJECT"]').editable('toggleDisabled');
        $('a[rel^="ID_PHASE"]').editable('toggleDisabled');
        $('a[rel^="EXECUTERS_NUM"]').editable('toggleDisabled');
        $('a[rel^="UN_THIRTY_FIVE"]').editable('toggleDisabled');
        $('a[rel^="STUDY"]').editable('toggleDisabled');
        $('a[rel^="PUBLICATIONS"]').editable('toggleDisabled');
        $('a[rel^="FORIN_PUBL"]').editable('toggleDisabled');
        $('a[rel^="START_YEAR"]').editable('toggleDisabled');
        $('a[rel^="END_YEAR"]').editable('toggleDisabled');
        $('a[rel^="YEAR_BUDGET"]').editable('toggleDisabled');
        $('a[rel^="LONG_BUDGET"]').editable('toggleDisabled');
        $('a[rel^="CO_FINANCING"]').editable('toggleDisabled');
        $('a[rel^="ID_BUDGET"]').editable('toggleDisabled');


    });

    function doSomething()
    {
        alert("before submit");
        document.getElementById('someform').submit();
        alert("after submit");
    }

    $('#Pull').click(function(){
//        console.log('Я тут');
//        console.log(Url);


        $('#Pull>i').addClass('fa-spinner fa-spin');
//        $('#Pull_Modal').delay('1000');
        $.ajax({
            type: 'post',
            url:  Url,
            dataType : 'json',
            success: function(data){
                if(data == 'fail'){

//                    console.log('я тут 2 ');
                    setTimeout(function() {
                        $('#Pull>i').removeClass('fa-spinner fa-spin').addClass('fa-times');
                        $('#Pull_Modal').modal('show')
                    }, 1500);

                }
                if(data == 'ok'){
//                    console.log('Я тут 3');
                    setTimeout(function() {
                        $('#Pull>i').removeClass('fa-spinner fa-spin');
                        $('#first_check>i').removeClass('fa-spinner fa-spin').addClass('fa-check');
                        $('#exp_check>i').removeClass('fa fa-times').addClass('fa fa-spinner fa-spin');
                    }, 1500);
                }



            }

        });

    });


});