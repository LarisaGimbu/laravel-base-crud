@extends('layouts.main')

@section('content')
  <div class="container">
    <h1>Comics:</h1>

    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Type</th>
          <th scope="col">Price</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($comics as $comic)
        <tr>
          <th scope="row"> {{$comic->id}} </th>
          <td>{{$comic->title}}</td>
          <td>{{$comic->type}}</td>
          <td>{{$comic->price}}</td>
          <td>
            <a class="btn-warning p-2 rounded" href=" {{route('comics.show', $comic)}} ">Show</a>
            <a class="btn-danger p-2 rounded" href=" {{route('comics.create')}} ">Create</a>
          </td>
        </tr>
        @empty
          <h3>Non sono stati trovati fumetti</h3>
        @endforelse
        
      </tbody>
    </table>

    {{$comics->links()}}
  </div>
@endsection