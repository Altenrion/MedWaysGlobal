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
        $.ajax({
            type: 'post',
            url: Yii.app.createUrl('Autorized/CheckFullInfo'),
            data: $(form).serialize(),
            dataType : 'json',
            success: function(data){
                if(data == 'email'){
                    succsess.css("display", "none");
                    error.css("display", "block");
                    error.html('Указанный email уже занят!');
                }
                if(data == 'succsess'){
                    error.css("display", "none");
                    succsess.css("display", "block");
                    succsess.html('Вы зарегестрированы. На указанный email отправлено письмо активации.');
                }
                if(data == 'fail'){
                    succsess.css("display", "none");
                    error.css("display", "block");
                    error.html('Произошла техническая ошибка. Приносим извенения.');
                }


            }

        });

    });


});