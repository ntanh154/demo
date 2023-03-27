@extends('base\baseContent')
@section('heading')
    <h1 class="text-center mt-4">Add Categories</h1>
@endsection

@section('table')
    <div class="categories-add-table">
        <form action={{route('dashboard.submit.view-add')}} method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        
            @endif
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Categories">
            </div>
            <select class="form-select mb-3" aria-label="Default select example" name="parent_id">
                <option selected value="">--Select items--</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            <div>
                <button type="submit" class="btn btn-primary">Add Categories</button>
            </div>
        </form>
    </div>
@endsection