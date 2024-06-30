@include('includes.headerb')

<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">Feedback Form </h1>
                <p class="text-white link-nav"><a href="home">Home </a> <span class="lnr lnr-arrow-right"></span> <span href="/reviews"> Profil</span></p>
            </div>
        </div>
    </div>
</section>
 
<div class="feedback-form">
     @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form id="feedbackForm" method="POST" action="{{ route('passager.storeAvis') }}">
        @csrf
        <div class="name">
            <label for="name">Your Name:</label><br>
            <input type="text" id="name" name="name" value="{{ Auth::user()->nom }} {{Auth::user()->prenom }}">
        </div>
        <div class="name">
            <label for="name">Your email:</label><br>
            <input type="text" id="name" name="name" value="{{ Auth::user()->email }}">
        </div>
        <label>Rating:</label><br>

        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5">&#9733;</label>
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4">&#9733;</label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3">&#9733;</label>
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2">&#9733;</label>
            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1">&#9733;</label>
        </div>
        <div class="comment">
            <label for="comment">Tell us more:</label><br>
            <textarea id="comment" name="review" required></textarea>
        </div>
        <button type="submit" class="submit-btn">Submit</button>
    </form>
</div>


</body>

</html>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .feedback-form {
        max-width: 600px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
    }

    .feedback-form h2 {
        text-align: center;
    }

    .feedback-form .name,
    .feedback-form .rating,
    .feedback-form .comment {
        margin-bottom: 20px;
    }

    .feedback-form label {
        font-weight: bold;
        color: #333;
        display: block;
        margin-bottom: 5px;
    }

    .feedback-form input[type="text"],
    .feedback-form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 24px;
        cursor: pointer;
        color: #ccc;
    }

    .rating label:hover,
    .rating label:hover~label {
        color: orange;
    }

    .rating input:checked~label {
        color: orange;
    }

    .feedback-form .submit-btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .feedback-form .submit-btn:hover {
        background-color: #0056b3;
    }
</style>
