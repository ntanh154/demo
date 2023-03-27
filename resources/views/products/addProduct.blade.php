@extends('products\base')
@section('link')
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
@endsection
@section('content')
    <h1>Add Product</h1>
    <div class="add-product">
        <form action={{route('product.addData')}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="nameProduct" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      {{$errors->nameProduct}}
                  </div>
              @endif
            </div>
            <div class="input-group mb-3">
                <select class="custom-select" id="optionCategories" name="optionCategories">
                  <option selected>Choose Category...</option>
                  @if ($dataCategory)
                      @foreach ($dataCategory as $key=>$value)
                        <option value={{$value->id}}>{{$value->name}}</option>
                      @endforeach
                  @endif
                </select>
                <div class="input-group-append">
                  <label class="input-group-text" for="inputGroupSelect02">Options</label>
                </div>
            </div>
            @if ($errors->any())
                  <div class="alert alert-danger">
                      {{$errors->optionCategories}}
                  </div>
              @endif
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="desc" class="form-control" id="exampleInputPassword1" rows="6"></textarea>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      {{$errors->desc}}
                  </div>
              @endif
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Enter Price">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      {{$errors->price}}
                  </div>
                 @endif
              </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Quantity</label>
                <input type="text" name="quantity" class="form-control" id="exampleInputPassword1" placeholder="Enter Quantity">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      {{$errors->quantity}}
                  </div>
              @endif
              </div>
            <div class="form-group">
                <p>Is Variant</p>
                <input type="radio" aria-label="Radio button for following text input" class="variant_check" name="variant" value="0">Yes
                <input type="radio" aria-label="Radio button for following text input" class="variant_check" name="variant" value="1">No
            </div>
            {{-- <div class="input-group my-3">
                <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile04" >Choose file</label>
                    <input type="file" class="custom-file-input" id="inputGroupFile04" name="images[]" multiple >
                </div>
              </div> --}}

            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
    </div>
@endsection

@section('script')
    
@endsection