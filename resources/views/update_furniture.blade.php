@extends('master')

@section('title','Update Furniture')

@section('content')

<div class="welcome">
    <h2>Update Furniture</h2>
</div>
    
<section>
    @foreach ($furniture as $furniture)
      <form class="col-sm-3" action="/update-furniture/{{$furniture->id}}" method="POST">
          @csrf
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$furniture->name}}" required>
              @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
            </div>
          </div>
          
          <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{$furniture->price}}" required>
              @error('price')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
            </div>
          </div>

          <div class="form-group row">
              <label for="Type" class="col-sm-2 col-form-label">Type</label>
              <div class="form-group col-sm-10">
                  <select id="inputState" class="form-control  @error('type') is-invalid @enderror" name="type" value="{{$furniture->type}}" required>
                    <option disabled selected>Choose furniture's type</option>
                    <option {{ ($furniture->type) == 'Living Room' ? 'selected' : '' }}  value="Living Room">Living Room</option>
                    <option {{ ($furniture->type) == 'Kitchen' ? 'selected' : '' }}  value="Kitchen">Kitchen</option>
                    <option {{ ($furniture->type) == 'Decoration' ? 'selected' : '' }}  value="Decoration">Decoration</option>
                    <option {{ ($furniture->type) == 'Lamp and Electronic' ? 'selected' : '' }}  value="Lamp and Electronic">Lamp and Electronic</option>
                    <option {{ ($furniture->type) == 'Storage' ? 'selected' : '' }}  value="Storage">Storage</option>
                    <option {{ ($furniture->type) == 'Workstation' ? 'selected' : '' }}  Workstation">Workstation</option>
                  </select>
                  @error('type')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
                </div>
            </div>

            <div class="form-group row">
              <label for="Color" class="col-sm-2 col-form-label">Color</label>
              <div class="form-group col-sm-10">
                  <select id="inputState" class="form-control @error('color') is-invalid @enderror" name="color" value="{{$furniture->color}}" required>
                    <option disabled selected>Choose furniture's color</option>
                    <option {{ ($furniture->color) == 'Red' ? 'selected' : '' }}  value="Red">Red</option>
                    <option {{ ($furniture->color) == 'Green' ? 'selected' : '' }}  value="Green">Green</option>
                    <option {{ ($furniture->color) == 'Blue' ? 'selected' : '' }}  value="Blue">Blue</option>
                    <option {{ ($furniture->color) == 'Yellow' ? 'selected' : '' }}  value="Yellow">Yellow</option>
                    <option {{ ($furniture->color) == 'Black' ? 'selected' : '' }}  value="Black">Black</option>
                    <option {{ ($furniture->color) == 'White' ? 'selected' : '' }}  value="White">White</option>
                  </select>
                  @error('color')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
                </div>
            </div>

            <div class="form-group row">
              <label for="Image" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input type="file" class="form-control py-1 @error('image') is-invalid @enderror" value="{{$furniture->image}}" name="image" id="image" >
                @error('image')
              <div class="text-danger">
                {{ $message }}
              </div>
              @enderror
              </div>
            </div>

        
          <div class="form-group row">
            <div class="col-sm-10 offset-sm-3">
              <button type="submit" class="btn-updatebtn">Update Furniture</button>
            </div>
          </div>
        </form>
     @endforeach  
</section>
@endsection