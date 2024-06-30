@include('includes.headerb')
@extends('layouts.app')

@section('title', 'About Us')
    <!-- Start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        All Reviews				
                    </h1>	
                    <p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/reviews"> All Reviews</a></p>
                </div>	
            </div>
        </div>
    </section>
 





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
            @foreach ($reviews as $review)
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
    
    </div>    
</section>









</body>
</html>
