@extends('layouts.main')

@section('content')
  <div class="container">
    <h1>Modifica di: {{$comic->title}} </h1>

    @if($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action=" {{route('comics.update', $comic)}}" method="POST" >
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input 
        type="text" 
        value="{{old('title', $comic->title)}}  " 
        name="title" 
        class="form-control
        @error('title') is-invalid @enderror" 
        id="title" 
        aria-describedby="emailHelp" 
        placeholder="Title">

        @error('title')
        <p class="forms-errors">{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea 
        type="text-area" 
        name="description" 
        class="form-control
        @error('description') is-invalid @enderror" 
        id="description">{{old('description', $comic->description)}} </textarea>

        @error('description')
        <p class="forms-errors">{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Image</label>
        <input 
        type="text"
        value=" {{old('image', $comic->image)}} " 
        name="image" 
        class="form-control
        @error('image') is-invalid @enderror" 
        id="image" 
        placeholder="Image url">

        @error('image')
        <p class="forms-errors">{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Price</label>
        <input 
        type="text" 
        value=" {{old('price', $comic->price)}} " 
        name="price" 
        class="form-control
        @error('price') is-invalid @enderror" 
        id="price" 
        placeholder="Price">

        @error('price')
        <p class="forms-errors">{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Series</label>
        <input 
        type="text" 
        name="series"
        value=" {{old('series', $comic->series)}} " 
        class="form-control
        @error('series') is-invalid @enderror" 
        id="series" 
        placeholder="Series">

        @error('series')
        <p class="forms-errors">{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Sale date</label>
        <input 
        type="text" 
        value=" {{old('sale_date', $comic->sale_date)}} " 
        name="sale_date" 
        class="form-control
        @error('sale_date') is-invalid @enderror" 
        id="sale_date" 
        placeholder="Sale date">

        @error('sale_date')
        <p class="forms-errors">{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Type</label>
        <input 
        type="text" 
        value=" {{old('type', $comic->type)}} " 
        name="type" 
        class="form-control
        @error('type') is-invalid @enderror" 
        id="type" 
        placeholder="Type">

        @error('type')
        <p class="forms-errors">{{$message}}</p>
        @enderror

      </div>
      
      <div class="button-container pb-4">
        <button type="submit" class="btn btn-primary">Invia</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
      
    </form>
  </div>
@endsection