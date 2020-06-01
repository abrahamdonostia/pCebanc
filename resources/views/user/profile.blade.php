
@extends('main')

@section('content')
<!-- Middle Column -->
<div class="w3-col m7">
    <div class="w3-row-padding">
        <div class="container">
        <div class="w3-container w3-padding">
            <h1>Edit Profile</h1>
                <hr>
                <div class="row">
                   
                
               
                    <!-- left column -->
                    <div class="col-md-3">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif 
                   
                        <div class="avatar-wrapper">
                            <form  method="POST" action="{{ route('user/updateAvatar') }}" enctype="multipart/form-data">
                                {{ csrf_field() }} 
                            @if(Auth::user()->image )
                                <img src="{{ asset(''.$image.'') }}" alt="Avatar" class="avatar"/>
                            @else
                                <img src="{{ asset('/img/avatar/avatar2.png') }}" alt="Avatar" class="avatar" />
                            @endif
                            
                            <input name="image" class="file-upload" type="file" accept="image/*"/>
                            <input type="submit" class="btn btn-primary" value="Subir imagen">
                            </form>
                        </div>
                    
                    </div>
                    
                    <div class="col-md-1">
                    </div>
                
                    <!-- edit form column -->
                    <div class="col-md-8 personal-info">
                        
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
                            
                            </div>
                        </div>   
                       
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            <ul>
                                
                                <li> {{ session()->get('message') }}</li>
                               
                            </ul>
                        </div>
                        @endif     
                    </form>        
                </div>
            
        </form>
    </div>
</div>
        <hr>

    </div>
</div>
@endsection