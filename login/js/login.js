$('document').ready(function()
{ 
     /* validation */
  $("#login-form").validate({
      rules:
   {
   password: {
   required: true,
   },
   user_email: {
            required: true,
            email: true
            },
    },
       messages:
    {
            password:{
                      required: "please enter your password"
                     },
            user_email: "please enter your email address",
       },
    submitHandler: submitForm 
       });  
    /* validation */
    /* login submit */
    function submitForm()
    {  
   var data = $("#login-form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'login.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Enviando ...');
   },
   success :  function(response)
      {      
     if(response=="ok"){
         
      $("#btn-login").html('<img src="ajax-loader.gif" /> &nbsp; Entrando ...');
      setTimeout(' window.location.href = "evento/dashboard.php"; ',1000);
    }
     if(response =="admin"){
      $("#btn-login").html(' Entrando ...');
      setTimeout(' window.location.href = "evento/dashboard2.php"; ',1000);
     }

     if(response =="erro"){
      $("#error").fadeIn(1, function(){      
        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;<h3> senha ou email incorretos !</h3></div>');
        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; entrar');
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});