<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WikiCebanc</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  
  <link rel="stylesheet" href="{{ URL::asset('css/simple-sidebar.css') }}" />
  <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" type="text/css" >
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <a class="list-group-item list-group-item-action bg-light" href="{{ url('/') }}"><div class="sidebar-heading"> Wiki Cebanc</div></a> 
      <div class="list-group list-group-flush">
        <a href="/article/category/3" class="list-group-item list-group-item-action bg-light">Hardware</a>
        <a href="/article/category/2" class="list-group-item list-group-item-action bg-light">Desarrollo</a>
        <a href="/article/category/1" class="list-group-item list-group-item-action bg-light">Sistemas</a>
        <a href="/article/category/4" class="list-group-item list-group-item-action bg-light">Hacking</a>
        <a href="/article/category/5" class="list-group-item list-group-item-action bg-light">Consolas</a>
        <a href="/article/category/6" class="list-group-item list-group-item-action bg-light">Smartphone</a>
        <a href="/article/category/7" class="list-group-item list-group-item-action bg-light">Networking</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @if (Auth::check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }} <i class="fa fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('user/createArticle') }}">Crear artículo</a>
                <a class="dropdown-item" href="{{ url('user/profile') }}">Perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar sesión</a>
              </div>
            </li>            
            @else       
            <li class="nav-item active">
              <a class="nav-link dropdown-menu-right" href="{{ url('user/loginPage') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link dropdown-menu-right" href="{{ url('user/register') }}">Registrarse</a>
            </li>
            @endif
          </ul>
        </div>
      </nav>
    
      <div class="container-fluid mt-5">
        
            
             @yield('content')
            
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ URL::asset('js/jquery/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/ckeditor5-build-classic/ckeditor.js') }}"></script>
  
 

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    $(document).ready(function() {
	
    var readURL = function(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('.profile-pic').attr('src', e.target.result);
          }
  
          reader.readAsDataURL(input.files[0]);
      }
    }
 
  $(".file-upload").on('change', function(){
      readURL(this);
  });
  
  $(".upload-button").on('click', function() {
     $(".file-upload").click();
  });
});
   

  
  </script>

</body>

</html>
