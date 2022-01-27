@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="card text-center">
      <div class="card-header">
        <img src=" {{$comic->image}} " alt="">
      </div>
      <div class="card-body">
        <h3 class="card-title"> {{$comic->title}} </h3>
        <p class="card-text"> {{$comic->description}} </p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Price: {{$comic->price}} </li>
          <li class="list-group-item">Type: {{$comic->type}} </li>
        </ul>
        <a href=" {{route('comics.index')}} " class="btn btn-primary">Go back</a>
      </div>
      <div class="card-footer text-muted">
        Sale date:
        {{$comic->sale_date}}
      </div>
    </div>
  </div>
@endsection