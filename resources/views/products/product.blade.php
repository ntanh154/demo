@extends('products\base')
@section('content')
    <h1>List Product</h1>
    <button class=btn btn-primary>
        <a href={{route('product.add')}}>Add Products</a>  
    </button>
    @if (session('addProduct'))
    <div class="alert alert-success" role="alert">
        {{session('addProduct')}}
      </div>
    @endif
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th scope="col">description</th>
                <th scope="col">product category ID</th>
                <th scope="col">price</th>
                <th scope="col">quantity</th>
                <th scope="col">status</th>
                <th scope="col">Is Variant</th>
                <th scope="col">Handle</th>
                <th scope="col">Variant</th>
              </tr>
            </thead>
            <tbody>
              @if ($pagination)
              @foreach ($pagination as $key=>$value)
                  <tr>
                      <th scope="row">{{$currentPage++}}</th>
                      <td style="width:180px;">{{$value->name}}</td>
                      <td>{{$value->description}}</td>
                      <td>{{$value->product_category_id}}</td>
                      <td>{{$value->price}}</td>
                      <td>{{$value->quantity}}</td>
                      <td>
                        @if ($value->status==0)
                            @php
                                echo 'Đang bán'
                            @endphp
                        @else
                          @php
                            echo 'Không bán'
                          @endphp
                        @endif
                      </td>
                      <td>
                        @if ($value->is_variant==0)
                            @php
                                echo 'Có Variant'
                            @endphp
                        @else
                          @php
                            echo 'Không Có Variant'
                          @endphp
                        @endif  
                      </td>
                      <td>
                          <button class="btn btn-primary"><a href={{route('productVariant.edit', ['id'=>$value->id])}} style="color: #fff; text-decoration: none;">Edit</a></button>
                          <button class="btn btn-primary">Delete</button>
                      </td>
                      <td>
                        <button class="btn btn-primary">
                            <a href={{route('productVariant.create', ['id'=>$value->id])}} style="color: #fff;text-decoration: none;">Variant</a>
                        </button>
                      </td>
                  </tr>
              @endforeach
          @endif
            </tbody>
          </table>
          <div class="container pagination d-flex justify-content-end">
            @for ($i = 1; $i <= $numberPage; $i++)
                <span class="pagination-page">
                    <a href={{route('product.pagination.page',['page'=>$i])}}>{{$i}}</a>
                </span>
            @endfor     
        </div>
@endsection

