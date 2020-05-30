
@extends('main')

@section('content')
<!-- Middle Column -->

@foreach($articles as $article)

<section>
    <div class="container py-3">
      <div class="card">
        <div class="row ">
          <div class="col-md-3">
              <img src="https://placeholdit.imgix.net/~text?txtsize=38&txt=400%C3%97400&w=400&h=400" class="w-100">
            </div>
            <div class="col-md-8 px-3">
              <div class="card-block px-3">
                <h4 class="card-title">{{ $article->title }}</h4>
              <p class="card-text">{{ $article->description }}</p>
                
                <a href="#" class="btn btn-primary">Leer más</a>
              </div>
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </section>

  @endforeach
            

        

@endsection