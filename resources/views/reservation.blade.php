<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>WoOx Travel Reservation Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('index')}}" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="{{route('accueil')}}">accueil</a></li>
                        <li><a href="{{route('deals')}}">Deals</a></li>
                        <li><a href="{{route('reservation')}}" class="active">Reservation</a></li>
                        <li><a href="{{route('reservation')}}">Book Yours</a></li>
                        <li><a href="{{ route('login') }}" class="login-btn"><i class="fa fa-user"></i> Login</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>   
  </header>


<style>
/* Conteneur du menu */
.main-nav {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    width: 100% !important;
    white-space: nowrap !important; /* Empêche le retour à la ligne */
}

/* Liste des liens */
.main-nav .nav {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    gap: 20px !important;
    list-style: none !important;
    margin: 0 !important;
    padding: 0 !important;
    flex-wrap: nowrap !important; /* Empêche le passage à la ligne */
}

/* Items */
.main-nav .nav li {
    display: flex !important;
    align-items: center !important;
    height: 100% !important;
}

/* Liens */
.main-nav .nav li a {
    text-decoration: none !important;
    color: #fff !important;
    padding: 8px 14px !important;
    display: flex !important;
    align-items: center !important;
    height: 100% !important;
}


.main-nav .nav li:last-child {
    margin-left: auto !important;
}




</style>





  <!-- ***** Header Area End ***** -->

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Book Prefered Deal Here</h4>
          <h2>Make Your Reservation</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt uttersi labore et dolore magna aliqua is ipsum suspendisse ultrices gravida</p>
          <div class="main-button"><a href="{{route('Home')}}">Discover More</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="#">+123 456 789 (0)</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="#">company@email.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">24th Street North Avenue London, UK</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="450px" frameborder="0" style="border:0; border-top-left-radius: 23px; border-top-right-radius: 23px;" allowfullscreen=""></iframe>
          </div>
        </div>
        <div class="col-lg-12">
         
<form id="reservation-form" method="POST" action="{{ route('reservation.store') }}">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <fieldset>
                <label for="name" class="form-label">Votre Nom</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Ex. John Doe" required>
            </fieldset>
        </div>
        <div class="col-lg-6">
            <fieldset>
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="+212..." required>
            </fieldset>
        </div>
        <div class="col-lg-6">
            <fieldset>
                <label for="guests" class="form-label">Nombre de personnes</label>
                <select name="guests" id="guests" class="form-select" required>
                    <option value="">Sélectionner</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4+">4+</option>
                </select>
            </fieldset>
        </div>
        <div class="col-lg-6">
            <fieldset>
                <label for="check_in_date" class="form-label">Date d'arrivée</label>
                <input type="date" name="check_in_date" id="check_in_date" class="form-control" required>
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="destination" class="form-label">Destination</label>
                <select name="destination" id="destination" class="form-select" required>
                    <option value="">Choisir</option>
                    <option value="Italy, Roma">Italy, Roma</option>
                    <option value="France, Paris">France, Paris</option>
                    <option value="England, London">England, London</option>
                    <option value="Switzerland, Lausanne">Switzerland, Lausanne</option>
                </select>
            </fieldset>
        </div>
        <div class="col-lg-12 mt-3">
            <button type="submit" class="btn btn-primary w-100">
                <i class="fa fa-calendar-check"></i> Réserver maintenant
            </button>
        </div>
    </div>
</form>

<!-- Bootstrap Alert -->
<div id="reservation-alert" class="alert mt-3 d-none"></div>

<!-- Retirer le jQuery en double -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
$(document).ready(function() {
    // Récupération du token CSRF depuis la balise meta générée par Laravel
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    $('#reservation-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#reservation-alert')
                    .removeClass('d-none alert-danger')
                    .addClass('alert-success')
                    .html(response.message || 'Réservation effectuée avec succès !');

                $('#reservation-form')[0].reset();
            },
            error: function(xhr) {
                let msg = 'Erreur : Veuillez vérifier vos informations.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                $('#reservation-alert')
                    .removeClass('d-none alert-success')
                    .addClass('alert-danger')
                    .html(msg);
            }
        });
    });
});
</script>





        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

  </body>

</html>
