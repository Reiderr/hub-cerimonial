$('document').ready(function()
{ 
     /* validation */
  $("#custom-festa").validate({
      rules:
   {
   mensagem1: {
    required: true,
   },
   mensagem2: {
    required: true,
   },
 },
       messages:
    {
            mensagem1:{
                      required: "Digite uma mensagem para o template"
                     },
            mensagem2:{
                      required: "digite uma mensagem para o template"
                     },
       },
    submitHandler: submitFesta
       });
    /* validation */
    /* login submit */
    function submitFesta()
    {  
   var data = $("#custom-festa").serialize();
   alert(data);
   $.ajax({
    
   type : 'POST',
   url  : 'assets/backend/saveCustomEvento.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#salvarDados").html('Enviando ...');
   },
   success :  function(response)
      {      
     alert(response);
     if(response=="ok"){
         
      $("#success").fadeIn(1, function(){      
        $("#success").html('<div class="alert alert-success"> <h3> Tudo Pronto!, agora vamos ver como ficou sua página!!</h3></div>');
        $("#salvarDados").html('salvo! ');
      });
      setTimeout(' window.location.href = "dashboard.php";',5000);// redirecionar para o preview do evento (a fazer) 

    }
     else{
      $("#error").fadeIn(1, function(){      
        $("#error").html('<div class="alert alert-success"> <h3> Ops, parece que algo deu errado :( tente novamente!</h3></div>');
        $("#error").fadeOut(5000);
        $("#criarEvento").html('Criar Evento');
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});