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
    number: true,
   },
   endereco: {
    required: true,
   },
   URL:{
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
            URL:{
                      required: "digite a URL"
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
   url  : 'assets/backend/saveEvento.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#criarEvento").html('Enviando ...');
   },
   success :  function(response)
      {      
      alert(response);
     if(response!="erro!"){
         
      $("#success").fadeIn(1, function(){      
        $("#success").html('<div class="alert alert-success"> <h3> Evento Criado com Sucesso, agora vamos customiza-lo</h3></div>');
        $("#criarEvento").html('salvo! ');
      });
      // utilizar json para retornar os valores de url evento e tipo de evento para separar as páginas de customização
      setTimeout(' window.location.href = "customEvento.php?url='+response+'";',5000);

    }
     else{
      $("#error").fadeIn(1, function(){      
        $("#error").html('<div class="alert alert-success"> <h3> URL do evento está em uso, por favor tente outra!</h3></div>');
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