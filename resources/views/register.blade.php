 
@include('includes.headerb')

			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Register		
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <span> Register</span></p>
						</div>	
					</div>
				</div>
			</section>
    <!-- start banner Area -->
<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Register</h1>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="CNI" class="form-label">CNI</label>
                        <input type="text" name="CNI" class="form-control" id="CNI" required>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Doe" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="John" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="phonenumber" class="form-label">Phone Number</label>
                        <input type="text" name="phonenumber" class="form-control" id="phonenumber" placeholder="+1234567890" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="datenaissance" class="form-label">Date de Naissance</label>
                        <input type="date" name="datenaissance" class="form-control" id="datenaissance" required>
                    </div>
                    <div class="mb-3">
                        <label for="lieu" class="form-label">Lieu de Naissance</label>
                        <input type="text" name="lieu" class="form-control" id="lieu" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control" id="role" required>
                            <option value="admin">Admin</option>
                            <option value="chauffeur">Chauffeur</option>
                            <option value="passager">Passager</option>
                        </select>
                    </div> -->
                    <div class="mb-3">
                        <div class="d-grid">
                            <button class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <span>Already Member ? <a href="/login">Login</a> </span> 
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
