/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 16.08.14
 * Time: 14:16
 * To change this template use File | Settings | File Templates.
 */


$(document).ready(function () {
//    $('a[rel="F_NAME_1"]').editable({
//        toggle: 'manual'
//    });
    $('#enable').click(function (e) {
//        e.stopPropagation()
        console.log("I'm Here");

        $('a[rel^="F_NAME"]').editable('toggleDisabled');
        $('a[rel^="L_NAME"]').editable('toggleDisabled');
        $('a[rel^="S_NAME_1"]').editable('toggleDisabled');
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
});