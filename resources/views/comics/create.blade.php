@extends('layouts.main')

@section('content')
  
  <div class="container">
    <h1>Create new comic:</h1>

    @if($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action=" {{route('comics.store')}}" method="POST" >
      @csrf
      @method('POST')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input 
        type="text" 
        name="title" 
        class="form-control 
        @error('title') is-invalid @enderror " 
        value="{{old('title')}}"
        id="title"
        aria-describedby="emailHelp"
        placeholder="Title">
        
        @error('title')
        <p>{{$message}}</p>
        @enderror
        
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea 
        type="text-area" 
        name="description" 
        class="form-control 
        @error('description') is-invalid @enderror" 
        id="description">{{old('description')}}</textarea>

        @error('description')
        <p>{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Image</label>
        <input 
        type="text" 
        name="image" 
        class="form-control
        @error('image') is-invalid @enderror"
        value="{{old('image')}}" 
        id="image" 
        placeholder="Image url">

        @error('image')
        <p>{{$message}}</p>
        @enderror

      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Price</label>
        <input 
        type="text" 
        name="price" 
        class="form-control
        @error('price') is-invalid @enderror" 
        value="{{old('price')}}"
        id="price" 
        placeholder="Price">

        @error('price')
        <p>{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Series</label>
        <input 
        type="text" 
        name="series" 
        class="form-control
        @error('series') is-invalid @enderror" 
        value="{{old('series')}}"
        id="series" 
        placeholder="Series">

        @error('series')
        <p>{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Sale date</label>
        <input 
        type="text" 
        name="sale_date" 
        class="form-control
        @error('sale_date') is-invalid @enderror" 
        value="{{old('sale_date')}}"
        id="sale_date" 
        placeholder="Sale date">

        @error('sale_date')
        <p>{{$message}}</p>
        @enderror

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Type</label>
        <input 
        type="text" 
        name="type" 
        class="form-control
        @error('type') is-invalid @enderror" 
        value="{{old('type')}}"
        id="type" 
        placeholder="Type">

        @error('type')
        <p>{{$message}}</p>
        @enderror

      </div>
      
      <div class="button-container pb-4">
        <button type="submit" class="btn btn-primary">Invia</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
      
    </form>
  </div>
@endsection