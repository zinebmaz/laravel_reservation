$(document).ready(function() {
  $('#reservation-form').on('submit', function(e) {
    e.preventDefault();

    // Cacher et réinitialiser le message d'alerte
    $('#alert-msg').addClass('d-none').removeClass('alert-danger alert-success').text('');

    $.ajax({
      url: "/reservation/store",    // URL de traitement Laravel
      method: "POST",
      data: {
        _token: $('input[name="_token"]').val(),
        name: $('input[name="Name"]').val(),           // Assure-toi que le name est bien "Name"
        phone: $('input[name="phone"]').val(),         // "phone" ici doit matcher le name de ton input
        guests: $('select[name="Guests"]').val(),
        date: $('input[name="date"]').val(),
        destination: $('select[name="Destination"]').val(),
      },
      success: function(response) {
        // Afficher message succès
        $('#alert-msg')
          .removeClass('d-none alert-danger')
          .addClass('alert-success')
          .text(response.message || 'Réservation enregistrée avec succès !');

        // Réinitialiser le formulaire
        $('#reservation-form')[0].reset();
      },
      error: function(xhr) {
        if (xhr.responseJSON && xhr.responseJSON.errors && typeof xhr.responseJSON.errors === 'object') {
          let errors = Object.values(xhr.responseJSON.errors);
          let message = errors.map(e => e[0]).join('\n');
          $('#alert-msg')
            .removeClass('d-none alert-success')
            .addClass('alert-danger')
            .text(message);
        } else if (xhr.responseJSON && xhr.responseJSON.error) {
          $('#alert-msg')
            .removeClass('d-none alert-success')
            .addClass('alert-danger')
            .text(xhr.responseJSON.error);
        } else {
          $('#alert-msg')
            .removeClass('d-none alert-success')
            .addClass('alert-danger')
            .text('Une erreur inconnue est survenue. Veuillez vérifier le serveur.');
          console.error('Réponse d’erreur non prévue :', xhr.responseText);
        }
      }
    });
  });
});

