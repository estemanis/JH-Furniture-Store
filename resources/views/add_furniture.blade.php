@extends('master')

@section('title','Add Furniture')

@section('content')

<div class="welcome">
    <h2>Add Furniture</h2>
</div>
    
<section>
    <form class="col-sm-3" action="/add-furniture" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" 
            required placeholder="Enter furniture's name">
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
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" required
            required placeholder="Enter furniture's price">
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
                <select id="inputState" class="form-control @error('type') is-invalid @enderror" name="type" required>
                  <option disabled selected>Choose furniture's type</option>
                  <option value="Living Room">Living Room</option>
                  <option value="Kitchen">Kitchen</option>
                  <option value="Decoration">Decoration</option>
                  <option value="Lamp and Electronic">Lamp and Electronic</option>
                  <option value="Storage">Storage</option>
                  <option value="Workstation">Workstation</option>
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
                <select id="inputState" class="form-control @error('color') is-invalid @enderror" name="color" required> 
                  <option disabled selected>Choose furniture's color</option>
                  <option value="Red">Red</option>
                  <option value="Green">Green</option>
                  <option value="Blue">Blue</option>
                  <option value="Yellow">Yellow</option>
                  <option value="Black">Black</option>
                  <option value="White">White</option>
                </select>
                @error('color')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              </div>
          </div>

          <div class="form-group">
            <label class=" control-label" for="image">Image</label>
            <div class="">
              <input id="image" name="image" class="input-file" type="file">
              @error('image')
              <div class="text-danger">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

       
        <div class="form-group row">
          <div class="col-sm-10 offset-sm-3">
            <button type="submit" class="btn-updatebtn">Add Furniture</button>
          </div>
        </div>
      </form>
</section>
@endsection