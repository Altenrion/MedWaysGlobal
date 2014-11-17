

$(document).ready(function(){

    $("#login_form").validate({
        
       rules:{

            RegForm_F_NAME:{

                required:true

           },
           RegForm_L_NAME:{
                required:true
           },

           RegForm_S_NAME:{
               required:true
           },
           RegForm_EMAIL:{
               required:true,
                email: true
            },
           RegForm_password:{
                required: true,
                minlength: 6,
                maxlength: 16
            },

           RegForm_roles:{
                required:true
           }



       },
       messages:{
           email:{
                email: "Укажите правильный email"
            },
           password:{
                required: true,
                minlength: "Пароль должен быть минимум 6 символа",
                maxlength: 16
            }
       }
    });






}); //end of ready