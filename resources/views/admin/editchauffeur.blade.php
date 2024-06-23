@include('includes.headerb')

  <div class="wrapper">
    <section class="home-about-area section-gap" id="home">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1>Editer chauffeur</h1>
              </div>
              <div class="card-body">
                @if($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                @if(session('error'))
                  <div class="alert alert-danger">
                    {{ session('error') }}
                  </div>
                @endif
 
                <form action="{{ route('admin.chauffeurs.update', $chauffeur->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="CNI">CNI</label>
                    <input type="text" name="CNI" class="form-control" id="CNI" value="{{ old('CNI', $chauffeur->CNI) }}" required>
                  </div>
                  <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom', $chauffeur->nom) }}" required>
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" value="{{ old('prenom', $chauffeur->prenom) }}" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $chauffeur->email) }}" required>
                  </div>
                  <div class="form-group">
                    <label for="datenaissance">Date de Naissance</label>
                    <input type="date" name="datenaissance" class="form-control" id="datenaissance" value="{{ old('datenaissance', $chauffeur->datenaissance) }}" required>
                  </div>
                  <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" name="lieu" class="form-control" id="lieu" value="{{ old('lieu', $chauffeur->lieu) }}" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Update chauffeur</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer as before -->
  </div>
</body>

</html>
