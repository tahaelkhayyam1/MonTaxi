@include('includes.headerb')

<header id="header">
    <div class="header-top"></div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" title="" /></a>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="/">Accueil</a></li>
                    <li class="menu-active"><a href="/passager/reservations">Reservations</a></li>
                    <li class="menu-has-children">
                        <a href="">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</a>
                        <ul>
                            <li><a href="profil">Profil</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" style="border: none; background: none; color: #007bff; text-decoration: underline; cursor: pointer;">Se Déconnecter</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
            <div class="banner-content col-lg-6 col-md-6">
                <h6 class="text-white">Besoin d'un taxi? suffit d'appeler</h6>
                <h1 class="text-uppercase">+212 658052235</h1>
                <p class="pt-10 pb-10 text-white">
                    Que vous préfériez les escapades en ville ou les vacances au soleil, vous pouvez toujours améliorer vos voyages en séjournant dans un petit hôtel.
                </p>
                <a href="tel:+212658052235" class="primary-btn text-uppercase">Appeler un taxi</a>
            </div>
            <div class="col-lg-4 col-md-6 header-right">
                <h4 class="pb-30">Réservez votre taxi en ligne !</h4>
                <form class="form" action="{{ route('passager.reservation') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control txt-field" type="text" name="name" placeholder="Nom complet" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" required>
                        <input class="form-control txt-field" type="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" required>
                        <input class="form-control txt-field" type="tel" name="phone" placeholder="Numéro de téléphone" value="{{ Auth::user()->phonenumber }}" required>
                    </div>
                    <div class="form-group">
                        <div class="default-select">
                            <select id="from_destination" class="form-control" name="from_destination" required>
                                <option value="" disabled selected hidden>De Destination</option>
                                <option value="Agdal">Agdal</option>
                                <option value="Hay Riyad">Hay Riyad</option>
                                <option value="Sala al Jadida">Sala al Jadida</option>
                                <option value="Medina">Medina</option>
                                <option value="Hassan">Hassan</option>
                                <option value="Souissi">Souissi</option>
                                <option value="Yacoub Al Mansour">Yacoub Al Mansour</option>
                                <option value="Les Orangers">Les Orangers</option>
                                <option value="Aviation">Aviation</option>
                                <option value="Océan">Océan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="default-select">
                            <select id="to_destination" class="form-control" name="to_destination" required>
                                <option value="" disabled selected hidden>Vers Destination</option>
                                <option value="Agdal">Agdal</option>
                                <option value="Hay Riyad">Hay Riyad</option>
                                <option value="Sala al Jadida">Sala al Jadida</option>
                                <option value="Medina">Medina</option>
                                <option value="Hassan">Hassan</option>
                                <option value="Souissi">Souissi</option>
                                <option value="Yacoub Al Mansour">Yacoub Al Mansour</option>
                                <option value="Les Orangers">Les Orangers</option>
                                <option value="Aviation">Aviation</option>
                                <option value="Océan">Océan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input id="facture" class="form-control txt-field"  name="tarif" type="text" value="Facture : 0 MAD" placeholder="Facture : 0 MAD"  readonly>
                  
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group dates-wrap">
                            <input id="datetimepicker" class="dates form-control" name="datetime" type="datetime-local" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Effectuer la réservation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const datetimePicker = document.getElementById('datetimepicker');
        const now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        const minDateTime = now.toISOString().slice(0, 16);

        datetimePicker.min = minDateTime;
        datetimePicker.value = minDateTime;
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fromDestination = document.getElementById('from_destination');
        const toDestination = document.getElementById('to_destination');
        const factureInput = document.getElementById('facture');

        const fareMatrix = {
            'Agdal': {
                'Hay Riyad': 30,
                'Sala al Jadida': 50,
                'Medina': 20,
                'Hassan': 25,
                'Souissi': 35,
                'Yacoub Al Mansour': 40,
                'Les Orangers': 20,
                'Aviation': 15,
                'Océan': 25
            },
            'Hay Riyad': {
                'Agdal': 30,
                'Sala al Jadida': 40,
                'Medina': 35,
                'Hassan': 40,
                'Souissi': 20,
                'Yacoub Al Mansour': 45,
                'Les Orangers': 25,
                'Aviation': 30,
                'Océan': 40
            },
            'Sala al Jadida': {
                'Agdal': 50,
                'Hay Riyad': 40,
                'Medina': 45,
                'Hassan': 50,
                'Souissi': 35,
                'Yacoub Al Mansour': 55,
                'Les Orangers': 50,
                'Aviation': 45,
                'Océan': 55
            },
            'Medina': {
                'Agdal': 20,
                'Hay Riyad': 35,
                'Sala al Jadida': 45,
                'Hassan': 10,
                'Souissi': 30,
                'Yacoub Al Mansour': 25,
                'Les Orangers': 20,
                'Aviation': 15,
                'Océan': 20
            },
            'Hassan': {
                'Agdal': 25,
                'Hay Riyad': 40,
                'Sala al Jadida': 50,
                'Medina': 10,
                'Souissi': 35,
                'Yacoub Al Mansour': 30,
                'Les Orangers': 25,
                'Aviation': 20,
                'Océan': 25
            },
            'Souissi': {
                'Agdal': 35,
                'Hay Riyad': 20,
                'Sala al Jadida': 35,
                'Medina': 30,
                'Hassan': 35,
                'Yacoub Al Mansour': 40,
                'Les Orangers': 35,
                'Aviation': 30,
                'Océan': 35
            },
            'Yacoub Al Mansour': {
                'Agdal': 40,
                'Hay Riyad': 45,
                'Sala al Jadida': 55,
                'Medina': 25,
                'Hassan': 30,
                'Souissi': 40,
                'Les Orangers': 35,
                'Aviation': 30,
                'Océan': 35
            },
            'Les Orangers': {
                'Agdal': 20,
                'Hay Riyad': 25,
                'Sala al Jadida': 50,
                'Medina': 20,
                'Hassan': 25,
                'Souissi': 35,
                'Yacoub Al Mansour': 35,
                'Aviation': 15,
                'Océan': 20
            },
            'Aviation': {
                'Agdal': 15,
                'Hay Riyad': 30,
                'Sala al Jadida': 45,
                'Medina': 15,
                'Hassan': 20,
                'Souissi': 30,
                'Yacoub Al Mansour': 30,
                'Les Orangers': 15,
                'Océan': 25
            },
            'Océan': {
                'Agdal': 25,
                'Hay Riyad': 40,
                'Sala al Jadida': 55,
                'Medina': 20,
                'Hassan': 25,
                'Souissi': 35,
                'Yacoub Al Mansour': 35,
                'Les Orangers': 20,
                'Aviation': 25
            }
        };

        function calculateFare() {
            const from = fromDestination.value;
            const to = toDestination.value;
            if (from && to && from !== to) {
                const fare = fareMatrix[from][to];
                factureInput.value = fare;
            } else {
                factureInput.value = "0";
            }
        }

        function updateToDestinationOptions() {
            const from = fromDestination.value;
            const options = toDestination.options;
            for (let i = 0; i < options.length; i++) {
                if (options[i].value === from) {
                    options[i].disabled = true;
                } else {
                    options[i].disabled = false;
                }
            }
        }

        fromDestination.addEventListener('change', function() {
            updateToDestinationOptions();
            calculateFare();
        });

        toDestination.addEventListener('change', calculateFare);
    });
</script>


<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Liens rapides</h6>
                    <ul>
                        <li><a href="#">Emplois</a></li>
                        <li><a href="#">Actifs de la marque</a></li>
                        <li><a href="#">Relations avec les investisseurs</a></li>
                        <li><a href="#">Conditions d'utilisation</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Caractéristiques</h6>
                    <ul>
                        <li><a href="#">Emplois</a></li>
                        <li><a href="#">Actifs de la marque</a></li>
                        <li><a href="#">Relations avec les investisseurs</a></li>
                        <li><a href="#">Conditions d'utilisation</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Ressources</h6>
                    <ul>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Recherche</a></li>
                        <li><a href="#">Experts</a></li>
                        <li><a href="#">Agences</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                <div class="single-footer-widget">
                    <h6>Suivez-nous</h6>
                    <p>Soyons sociaux</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Restez à jour avec nos dernières nouvelles</p>
                    <div class="" id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Entrer votre email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrer votre email '" required="" type="email">
                            <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="mt-80 mx-auto footer-text col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> Tous droits réservés | <i class="fa fa-heart-o" aria-hidden="true"></i> par <a href="https://emsi.ma/" target="_blank">Emsi</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
    <img class="footer-bottom" src="img/footer-bottom.png" alt="">
</footer>

<!-- End footer Area -->

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script> <!-- Replace YOUR_API_KEY with your actual Google Maps API key -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/hoverIntent/1.10.1/jquery.hoverIntent.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.10/js/superfish.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxchimp/1.3.0/jquery.ajaxchimp.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<script src="js/mail-script.js"></script> <!-- Keep local script -->
<script src="{{ asset('js/main.js') }}"></script> <!-- Keep local script -->

</body>