@extends('layouts.main')

@section('content')
  <div class="container">
    <h1>Modifica di: {{$comic->title}} </h1>

    <form action=" {{route('comics.update', $comic)}}" method="POST" >
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" value=" {{$comic->title}} " name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea type="text-area" name="description" class="form-control" id="description">{{$comic->description}} </textarea>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Image</label>
        <input type="text" value=" {{$comic->image}} " name="image" class="form-control" id="image" placeholder="Image url">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Price</label>
        <input type="text" value=" {{$comic->price}} " name="price" class="form-control" id="price" placeholder="Price">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Series</label>
        <input type="text" name="series" value=" {{$comic->series}} " class="form-control" id="series" placeholder="Series">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Sale date</label>
        <input type="text" value=" {{$comic->sale_date}} " name="sale_date" class="form-control" id="sale_date" placeholder="Sale date">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Type</label>
        <input type="text" value=" {{$comic->type}} " name="type" class="form-control" id="type" placeholder="Type">
      </div>
      
      <div class="button-container pb-4">
        <button type="submit" class="btn btn-primary">Invia</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
      
    </form>
  </div>
@endsection