@extends('layouts.main')

@section('content')
  <div class="container">
    <h1>Create new comic:</h1>

    <form action=" {{route('comics.store')}}" method="POST" >
      @csrf
      @method('POST')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea type="text-area" name="description" class="form-control" id="description"> </textarea>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image url">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Price</label>
        <input type="text" name="price" class="form-control" id="price" placeholder="Price">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Series</label>
        <input type="text" name="series" class="form-control" id="series" placeholder="Series">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Sale date</label>
        <input type="text" name="sale_date" class="form-control" id="sale_date" placeholder="Sale date">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Type</label>
        <input type="text" name="type" class="form-control" id="type" placeholder="Type">
      </div>
      
      
      <button type="submit" class="btn btn-primary">Invia</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
  </div>
@endsection