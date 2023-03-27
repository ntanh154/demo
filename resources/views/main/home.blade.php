@extends('base\baseMain')
@section('header')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ICON</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
                </li>
            </ul>
            
            </div>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if (!empty($dataProduct))
                @foreach ($dataProduct as $key=>$item)
                        <div class="col col-sm-12 col-md-4 col-lg-3 mt-4">
                            <div class="product-wrapper">
                                <a href={{route('product.show_detail',['id'=>$item->id])}} class="product-link">
                                    <img src="build/assets/image/{{$item->image}}" alt="product" class="image-fluid product-img">
                                </a>
                                <div class="product-content">
                                    <div class="product-heading">{{$item->name}}</div>
                                    <div class="product-price my-3">${{$item->price}}</div>
                                    <div class="btn btn-product mb-4">Buy Product</div>
                                </div>
                            </div>
                        </div>
                @endforeach
            @endif   
        </div>
    <img src="build/assets/image/app_watch.jpg" alt="" style="display: block;width: 100px;height: 100px;">

    </div>
@endsection
{{-- @section('footer')
    <div class="container text-center mt-5">
        <h2 style="color:#5a5c69;">FOOTER</h2>
    </div>
@endsection --}}