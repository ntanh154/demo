@extends('base\baseContent')
@section('heading')
    <h2 class="text-center my-4">List categories</h2>
@endsection 
@section('table')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Title</th>
                  <th scope="col">Categories ID</th>
                  <th scope="col">User ID</th>
                  <th scope="col">description</th>
                  <th scope="col">content</th>
                  <th scope="col">path</th>
                  <th scope="col">image_path</th>
                  <th scope="col">Action</th>
        
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item => $value)
                    <tr>
                        <th scope="row">{{$current_page++}}</th>
                        <td>{{$value->title}}</td>
                        <td>{{$value->categories_id}}</td>
                        <td>{{$value->user_id}}</td>
                        <td>{{$value->desc}}</td>
                        <td>{{$value->content}}</td>
                        <td>{{$value->path}}</td>
                        <td>{{$value->image_path}}</td>
                        <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-primary">Delete</button>
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
    </div>
@endsection

@section('pagination')
   <div class="container pagination d-flex justify-content-end">
    @for ($i = 1; $i <= $pagination; $i++)
        <span class="pagination-page">
            <a href={{route('dashboard.categories.page',['page'=>$i])}}>{{$i}}</a>
        </span>
    @endfor
            
   </div>
@endsection