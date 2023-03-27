@extends('products\base')
@section('link')
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
@endsection
@section('content')
    <h1>Add Variant</h1>
    <div class="add-variant">
        <form action={{route('variant.add')}} method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <button type="submit" class="btn btn-primary">Add Variant</button>
          </form>
    </div>
@endsection