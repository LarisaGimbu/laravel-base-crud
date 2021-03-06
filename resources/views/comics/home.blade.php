@extends('layouts.main')

@section('content')
  <div class="container">
    <h1>Comics:</h1>
    @if(session('deleted'))
    <div class="alert alert-danger" role="alert">
      {{session('deleted')}}
    </div>
    @endif

    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Type</th>
          <th scope="col">Price</th>
          <th scope="col">Slug</th>
          <th colspan="3" scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($comics as $comic)
        <tr>
          <th scope="row"> {{$comic->id}} </th>
          <td>{{$comic->title}}</td>
          <td>{{$comic->type}}</td>
          <td>{{$comic->price}}</td>
          <td>{{$comic->slug}}</td>
          <td>
            <a class="btn-warning p-2 rounded d-flex align-items-center" href=" {{route('comics.show', $comic)}} ">Show</a>
          </td>
          <td><a class="btn-success p-2 rounded d-flex align-items-center" href=" {{route('comics.edit', $comic)}} ">Edit</a></td>
          <td>
            <form action=" {{route('comics.destroy', $comic)}}" method="POST" onsubmit=" return confirm('Confermi di voler eliminare il fumetto {{$comic->title}} ?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger p-2 rounded" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @empty
          <h3>Non sono stati trovati fumetti</h3>
        @endforelse
        
      </tbody>
    </table>

    <div class="create-container d-flex justify-content-end">
      <a class="btn-primary p-2 rounded" href=" {{route('comics.create')}} ">Create new comic</a>
    </div>
   

    {{$comics->links()}}
  </div>
@endsection