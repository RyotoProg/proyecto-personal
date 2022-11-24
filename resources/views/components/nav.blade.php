<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{url('/')}}">Notes.io</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="{{url('/notas/add')}}">Aregar Nota</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{url('/links/add')}}">Aregar Link</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-danger" href="{{url('/logout')}}">Cerrar sesion</a>
      </li>
    </ul>
  </div>
</nav>