
@extends('main');

@section('content')
<!-- Middle Column -->
<div class="w3-col m7">
    <div class="w3-row-padding">
        <div class="container">
            <h1>Edit Profile</h1>
              <hr>
            <form  method="POST" action="{{ route('api/register') }}">
                <div class="row">
               
                    <!-- left column -->
                    <div class="col-md-3">
                        <div class="text-center">
                        <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                        <h6>Cambiar foto</h6>
                        
                        <input type="file" class="form-control">
                        </div>
                    </div>
                    
                    <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                        
                        <h3>Información personal</h3>
                        
                    <form>  
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nombre:</label>
                            <div class="col-lg-8">
                            <input class="form-control" type="text" value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Apellido:</label>
                            <div class="col-lg-8">
                            <input class="form-control" type="text" value="{{ auth()->user()->surname }}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                            <input class="form-control" type="text" value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                    </form>    
                    <form  method="POST" action="{{ route('user/updatePassword') }}"> 
                        {{ csrf_field() }}   
                        <div class="form-group">
                            <label class="col-md-6 control-label">Password actual:</label>
                            <div class="col-md-8">
                            <input class="form-control" name="current_password" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label">Nuevo Password:</label>
                            <div class="col-md-8">
                            <input class="form-control" name="new_password" type="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Confirmar password:</label>
                            <div class="col-md-8">
                            <input class="form-control" name="new_password_confirm" type="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label"></label>
                            <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Cambiar Password">
                            <span></span>
                            <input type="reset" class="btn btn-default" value="Cancelar">
                            </div>
                        </div>   
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif    
                    </form>        
                    </div>
                </div>
            </form>
        </div>
        <hr>

    </div>
</div>
@endsection