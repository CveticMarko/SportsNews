
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });

    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }
        
    });


})(jQuery);

   function loginUser(){
        let pass=$('input[name="pass"]').val();
        let email=$('input[name="email"]').val();

        $.post("../../ajax/loginAjax.php?function=login",{email: email, pass:pass}, function(response) {
        let odgovor=JSON.parse(response);
        if(odgovor.error!=""){
            $("#odgovor").html(odgovor.error).show();
            return false;
        }
        window.location.assign(odgovor.success);
     });
   }

function registerUser(){
    let email=$('input[name="email"]').val();
    let username=$('input[name="username"]').val();
    let pass=$('input[name="pass"]').val();
    let repp=$('input[name="repPass"]').val();

     $.post("../../ajax/registrationAjax.php", {pass: pass, username: username, email: email, repp: repp}, function(response){
        let odgovor=JSON.parse(response);

          if(odgovor.error!=""){
              $("#odgovor").html(odgovor.error).show();
          }else {
              window.location.assign("login.php");
              alert(odgovor.success);
          }
     });
}
function changeUserData(){
    let username=$("#username").val();
    let role=$("#role").val();
    let id=$("#userId").val();
    $.post("../../ajax/userProfileAjax.php?function=changeData", {id: id,username: username,role: role}, function (response){
        let resp=JSON.parse(response);
        if (resp.error!="") {

            $("#response").html(resp.error).show().css("background-color","red");
        }else{
            $("#response").html(resp.success).show().css("background-color","green");
        }
    });
}
function changePassword(){
    let oldPass=$("#oldPass").val();
    let newPass=$("#newPass").val();
    let id=$("#userId").val();
    $.post("../../ajax/userProfileAjax.php?function=changePassword", {id: id,oldPass: oldPass,newPass: newPass}, function (response){
        let resp=JSON.parse(response);
        if (resp.error!="") {

            $("#response").html(resp.error).show().css("background-color","red");
        }else{
            $("#response").html(resp.success).show().css("background-color","green");
        }
    });
   }
$(".activityButton").on("click",function(){
    let userId=$(this).attr('data-id');
    $.post("../../ajax/userProfileAjax.php?function=deactiveUser", {userId: userId}, function (response){
        let resp=JSON.parse(response);
        if (resp.error!="") {
            $("#response").html(resp.error).show().css("background-color","red");
        }else{
            if (resp.success=='User is active'){
                $('.activityButton').html(resp.success).css("background-color","green");
            }else{
                $('.activityButton').html(resp.success).css("background-color","red");

            }
            $("#response").html(resp.success).show().css("background-color","green");
        }
    });
});



