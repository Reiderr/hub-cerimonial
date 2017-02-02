$('document').ready(function()
{ 
     /* validation */
  $("#cadastroEvento").validate({
      rules:
   {
   nomeEvento: {
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
            URL:{
                      required: "digite a URL"
                     },
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
   success :  function(output)
      {
      var IS_JSON = true;      
      try{// verifica se o retorno é o arquivo json
        var response = $.parseJSON(output);
      }
      catch(err){
        IS_JSON = false;
      }
     if ( IS_JSON == true){
       if(response[2]=='success'){// recebe o tipo de evento e a url para redirecionamento
           
        $("#success").fadeIn(1, function(){      
          $("#success").html('<div class="alert alert-success"> <h3> Evento Criado com Sucesso, agora vamos customiza-lo</h3></div>');
          $("#criarEvento").html('salvo! ');
        });
        // utilizar json para retornar os valores de url evento e tipo de evento para separar as páginas de customização
        if(response[0] == 'festa'){// caso seja festa, enviar para customização de festa
          setTimeout(' window.location.href = "customEvento.php?url='+response[1]+'";',3000);
        }
        if(response[0] == 'casamento'){// caso seja casamento, enviar para customização de casamento
          setTimeout(' window.location.href = "customCasamento.php?url='+response[1]+'";',3000);
        }

      }
    }
     if (IS_JSON == false){
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
});