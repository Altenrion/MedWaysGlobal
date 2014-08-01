/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 27.07.14
 * Time: 0:31
 * To change this template use File | Settings | File Templates.
 */

$(function ()
        {
            $("#lefthand-nav").affix({
                offset: {
                    top: function ()
                    {
                        return $("#topbar").outerHeight() + $("#banner").outerHeight();
                    }
}
});

prettyPrint();

function errorPlacement(error, element)
            {
                element.before(error);

                //element.popover({
                //    content: error.text(),
                //    placement: function ()
                //    {
                //        return (element.parents(".content").width() >= 550) ? "right" : "top";
                //    },
//    trigger: "focus hover"
//});
//$(".popover-content", element.next(".popover")).empty().prepend(error);
}

$("#wizard-1").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true
    });


$("#wizard-2").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
    $("#form-2").validate().settings.ignore = ":disabled,:hidden";
    return $("#form-2").valid();
    },
onFinishing: function (event, currentIndex)
                {
                    $("#form-2").validate().settings.ignore = ":disabled";
                    return $("#form-2").valid();
                    },
onFinished: function (event, currentIndex)
                {
                    alert("Submitted!");
                    }
});

$("#form-3").steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
    // Allways allow previous action even if the current form is not valid!
    if (currentIndex > newIndex)
    {
    return true;
    }

// Forbid next action on "Warning" step if the user is to young
if (newIndex === 3 && Number($("#age-2").val()) < 18)
                    {
                        return false;
                        }

// Needed in some cases if the user went back (clean up)
if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $("#form-3 .body:eq(" + newIndex + ") label.error").remove();
                        $("#form-3 .body:eq(" + newIndex + ") .error").removeClass("error");
                        }

    $("#form-3").validate().settings.ignore = ":disabled,:hidden";
                    return $("#form-3").valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Used to skip the "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
                    {
                        $("#form-3").steps("next");
                    }

                    // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $("#form-3").steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    $("#form-3").validate().settings.ignore = ":disabled";
                    return $("#form-3").valid();
                },
                onFinished: function (event, currentIndex)
                {
                    alert("Submitted!");
    }
    }).validate({
        errorPlacement: errorPlacement,
        rules: {
        confirm: {
        equalTo: "#password-2"
        }
    }
    });

    $("#wizard-4").steps({
                headerTag: "h3",
                bodyTag: "section",
                enableAllSteps: true,
                enablePagination: false
            });

            $("#wizard-5").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                enableFinishButton: false,
                enablePagination: false,
                enableAllSteps: true,
                titleTemplate: "#title#",
    cssClass: "tabcontrol"
    });

    $("#wizard-6").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                stepsOrientation: "vertical"

            });

            $("#wizard-7").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slide"
            });

            $("#wizard-8").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "fade"
            });
        });

