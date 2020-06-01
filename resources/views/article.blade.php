
@extends('main')

@section('content')
<!-- Middle Column -->

<section>
    <div class="container py-3">
      <div class="container">

        <div class="row">
  
          <!-- Blog Entries Column -->
          <div class="col-lg-8">
  
            <!-- Title -->
            <h1 class="mt-4">{{ $article->title }}</h1>
  
            <!-- Author -->
            <p class="lead">
              by
              <a href="#">{{ $article->user->name }}</a>
            </p>
  
            <hr>
  
            <!-- Date/Time -->
            <p>Subido en {{ $article->created_at }}</p>
  
            <hr>
  
            <!-- Preview Image -->
            <img class="card-img-top" src="{{ asset(''.$image.'') }}" alt="Card image cap">
  
            <hr>
  
            <!-- Post Content -->
            {{ $article->text }}
  
            <blockquote class="blockquote">
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <footer class="blockquote-footer">Someone famous in
                <cite title="Source Title">Source Title</cite>
              </footer>
            </blockquote>
    </div>
  </section>

 
            

        

@endsection