  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">MyWebsite</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      @auth
        
        <a href="{{route('logout')}}" class="text-white">Logout</a> 
      @endauth
    </div>
  </nav>

