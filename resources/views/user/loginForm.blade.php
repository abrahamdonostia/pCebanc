
@extends('main')

@section('content')
<!-- Middle Column -->
<div class="col-md-7"> 
    
    <div class="w3-card w3-round w3-white">
                <form method="post" action="{{ url('doLogin') }}">  
                    {{ csrf_field() }}   
                    
                    <div class="w3-container w3-padding">
                        <div class="form-group">
                            
                            @foreach ($errors->all(':message') as $input_error)
                                {{ $input_error }}
                            @endforeach 
                            
                            <h3 class="w3-opacity">Inicia sessión</h3>
                        
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <br>
                            <input type="submit" value="Login" class="btn btn-primary"> 
                        </div>
                    </div>
                </form>
           
    </div>
</div>
@endsection