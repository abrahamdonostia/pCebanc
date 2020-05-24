
@extends('main');

@section('content')
<!-- Middle Column -->
<div class="w3-col m7">
    
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
            <form method="POST" action="{{ route('api/register') }}">  
                {{ csrf_field() }}   
                
                <div class="w3-container w3-padding">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <h6 class="w3-opacity">Registro de nuevo usuario</h6>
               
               
                
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Apellido</label>
                        <input type="text" name="surname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Contraseña</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                    <br>
                    <input type="submit" value="Registrate" class="w3-button w3-theme"> 
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection