$(document).ready(function() {
    $("#monFormulaire").submit(function(e) {
      e.preventDefault(); // Empêche la soumission par défaut du formulaire
      var formData = $(this).serialize(); // Récupère les données du formulaire
      var erreur=document.getElementById("erreur");
      $.ajax({
        url: 'Welcome/login',
        type: 'POST',
        data: formData,
        success: function(response) {
          // Traitement de la réponse du serveur
          console.log(JSON.stringify(response)); 
          erreur.innerHTML=response;
        }
      });
    });
  });