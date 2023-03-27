@extends('products\base')
@section('content')
    <h1>List Categories</h1>
    <button class="btn  my-3" > 
        <a href={{route('category.add')}}>Add Categories</a>
    </button>
    @if (session('addCategory'))
    <div class="alert alert-success" role="alert">
        {{session('addCategory')}}
      </div>
    @endif
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
                @if ($pagination)
                    @foreach ($pagination as $key=>$value)
                        <tr>
                            <th scope="row">{{$currentPage++}}</th>
                            <td>{{$value->name}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>{{$value->updated_at}}</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-primary">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
          <div class="container pagination d-flex justify-content-end">
            @for ($i = 1; $i <= $numberPage; $i++)
                <span class="pagination-page">
                    <a href={{route('category.pagination.page',['page'=>$i])}}>{{$i}}</a>
                </span>
            @endfor     
        </div>
@endsection

