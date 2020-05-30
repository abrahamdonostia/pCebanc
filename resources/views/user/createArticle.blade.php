
@extends('main')

@section('content')
<!-- Middle Column -->
<div class="col-md-10"> 
    
    <div class="w3-card w3-round w3-white">
                <form method="post" action="{{ url('article/addArticle') }}">  
                    {{ csrf_field() }}   
                    
                    <div class="w3-container w3-padding">
                        <div class="form-group">
                            
                            @foreach ($errors->all(':message') as $input_error)
                                {{ $input_error }}
                            @endforeach 
                            
                            <h3 class="w3-opacity">Crear tu nuevo artículo</h3>
                        
                            <div class="form-group">
                                <label for="name">Título</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Descripción</label>
                                <input type="text" name="description" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <select name="category" class="browser-default custom-select">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Texto</label>
                                <textarea name="content" id="editor">
                                    &lt;p&gt;This is some sample content.&lt;/p&gt;
                                </textarea>
                            </div>
                            <br>
                            <input type="submit" value="Enviar" class="btn btn-primary"> 
                        </div>
                    </div>
                </form>
           
    </div>
</div>

<script>
  
</script>
@endsection