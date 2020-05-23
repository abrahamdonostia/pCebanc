
@extends('main');

@section('content')
<!-- Middle Column -->
<div class="w3-col m7">
    
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
            <form method="post" action="{{ url('doLogin') }}">  
                {{ csrf_field() }}   
                
                <div class="w3-container w3-padding">
                   
                @foreach ($errors->all(':message') as $input_error)
                    {{ $input_error }}
                @endforeach 
                    
                    <h6 class="w3-opacity">Inicia sessión</h6>
                
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                  
                    <div class="form-group">
                        <label for="name">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <br>
                    <input type="submit" value="Login" class="w3-button w3-theme"> 
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection