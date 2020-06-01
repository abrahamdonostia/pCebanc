
@extends('main')

@section('content')
<!-- Middle Column -->
<section>
@foreach($articles as $article)

<a href="/article/{{ $article->id }}" style="text-decoration: none; color:black">
    <div class="container py-3">
      
        <div class="card">
          <div class="row ">
              <div class="col-md-3">
                <img src="{{asset($article->image) }}" class="w-100">
              </div>
              <div class="col-md-8 px-3">
              <div class="card-block px-3">
                <h4 class="card-title">{{ $article->title }}</h4>
              <p class="card-text">{{ $article->description }}</p>
                
                
              
            </div>
            </div>
          </div>
        </div>
      
    </div>
  </a>
  

  @endforeach
  <section>       
          

        

@endsection