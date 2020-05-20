
@extends('main');

@section('content')
<!-- Middle Column -->
<div class="w3-col m7">
    
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
            <p>El usuario se ha registrado correctamente, <a href="{{ url('user/loginPage') }}">inicia sesión</a>
        </div>
      </div>
    </div>
</div>
@endsection