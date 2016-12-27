$('document').ready(function()
{ 
     /* validation */
  $("#cadastroEvento").validate({
      rules:
   {
   nomeEvento: {
    required: true,
   },
   numeroConvidados: {
    required: true,
   },
   endereco: {
    required: true,
   },
 },
       messages:
    {
            nomeEvento:{
                      required: "Digite o nome para o evento"
                     },
            numeroConvidados:{
                      required: "digite o numero de Convidados"
                     },
            endereco: "digite o endereço do evento",
       },
    submitHandler: submitEvento
       });
    /* validation */
    /* login submit */
    function submitEvento()
    {  
   var data = $("#cadastroEvento").serialize();
   alert(data);
   $.ajax({
    
   type : 'POST',
   url  : 'saveEvento.php',
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