<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<title>Taxi</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/linearicons@1.0.0/dist/font/linearicons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="{{ asset('css/main.css') }}"> 

		</head>
        <header id="header">
				<div class="header-top">
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
						<a href="/"><img src="{{ asset('img/logo.png') }}" alt="" title="" /></a>		
						<nav id="nav-menu-container">
							<ul class="nav-menu">
								<li class="menu-active"><a href="/">Accueil</a></li>
							 
								<li class="menu-has-children"><a href="">Se Connecter</a>
									<ul>
										<li><a href="/login">Passager</a></li>
										 
										<li class="menu-has-children"><a href="">Employé</a>
											<ul>
												<li><a href="/login">Admin</a></li>
												<li><a href="/login">Chaufeur</a></li>
											</ul>
										</li>					              
									</ul>
								</li>
 								<li><a href="contact">Contact</a></li>
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
    <div class="banner-content col-lg-6 col-md-6 ">
        <h6 class="text-white ">Besoin d'un taxi? suffit d'appeler</h6>
        <h1 class="text-uppercase">
            +212 658052235				
        </h1>
        <p class="pt-10 pb-10 text-white">
            Que vous préfériez les escapades en ville ou les vacances au soleil, vous pouvez toujours améliorer vos voyages en séjournant dans un petit hôtel.
        </p>
        
        <a href="#" class="primary-btn text-uppercase">Appeler un taxi</a>
    </div>
  										
</div>
</div>					
</section>
<!-- End banner Area -->	

<!-- Start home-about Area -->
<section class="home-about-area section-gap">
<div class="container">
<div class="row align-items-center">
    <div class="col-lg-6 about-left">
        <img class="img-fluid" src="./img/about-img.jpg" alt="">
    </div>
    <div class="col-lg-6 about-right">
        <h1>Connecté à l'échelle mondiale
        par un grand réseau</h1>
        <h4>Nous sommes là pour vous écouter et offrir l'excellence</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
        <a class="text-uppercase primary-btn" href="#">Obtenir des détails</a>
    </div>
</div>
</div>	
</section>

<!-- End home-about Area -->

 

<!-- Start image-gallery Area -->
<section class="image-gallery-area section-gap">
<div class="container">
<div class="row section-title">
    <h1>Galerie d'images que nous aimons partager</h1>
    <p>Pour ceux qui sont extrêmement attachés au système respectueux de l'environnement.</p>
</div>					
<div class="row">
    <div class="col-lg-4 single-gallery">
        <a href="img/g1.jpg" class="img-gal"><img class="img-fluid" src="img/g1.jpg" alt=""></a>
        <a href="img/g4.jpg" class="img-gal"><img class="img-fluid" src="img/g4.jpg" alt=""></a>
    </div>	
    <div class="col-lg-4 single-gallery">
        <a href="img/g2.jpg" class="img-gal"><img class="img-fluid" src="img/g2.jpg" alt=""></a>
        <a href="img/g5.jpg" class="img-gal"><img class="img-fluid" src="img/g5.jpg" alt=""></a>						
    </div>	
    <div class="col-lg-4 single-gallery">
        <a href="img/g3.jpg" class="img-gal"><img class="img-fluid" src="img/g3.jpg" alt=""></a>
        <a href="img/g6.jpg" class="img-gal"><img class="img-fluid" src="img/g6.jpg" alt=""></a>
    </div>				
</div>
</div>	
</section>

<!-- End image-gallery Area -->
 
@section('content');
 
<section class="reviews-area section-gap">
    <div class="container">
        <div class="row section-title">
            <h1>Avis des clients</h1>
            <p>Pour ceux qui sont extrêmement attachés au système respectueux de l'environnement.</p>
        </div>                    
        <div class="row">
            @if($reviews->isEmpty())
                <div class="col-12">
                    <p>Aucun avis pour le moment.</p>
                </div>
            @else
                @foreach($reviews->take(6) as $review)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-review">
                            <h4>{{ $review->name }}</h4>
                            <p>{{ $review->review }}</p>
                            <div class="star">
                                @for ($i = 0; $i < 5; $i++)
                                    <span class="fa fa-star {{ $i < $review->rating ? 'checked' : '' }}"></span>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if(!$reviews->isEmpty() && $reviews->count() > 6)
            <div class="row">
                <div class="col-12 text-center">
                    <a href="/reviews" class="primary-btn">Voir tous les avis</a>
                </div>
            </div>
        @endif
    </div>    
</section>

 
        
<!-- Start home-calltoaction Area -->
<section class="home-calltoaction-area relative">
<div class="container">
<div class="overlay overlay-bg"></div>
<div class="row align-items-center section-gap">
    <div class="col-lg-8">
        <h1>Expérimentez un excellent support</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
        </p>
    </div>
    <div class="col-lg-4 btn-left">
        <a href="#" class="primary-btn">Contactez notre équipe de support</a>
    </div>
</div>
</div>    
</section>

</section>

 	
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés |  <i class="fa fa-heart-o" aria-hidden="true"></i> par <a href="https://emsi.ma/" target="_blank">Emsi</a>
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
