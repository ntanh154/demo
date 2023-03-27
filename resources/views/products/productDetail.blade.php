@extends('base\baseMain')
@section('css')
@vite(['resources/slick/slick/slick.css','resources/slick/slick/slick-theme.css'])
@endsection
@section('header')

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href={{route('home.index')}}>
                        Home
                    </a>
                </li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
<div class="Product-detail container mt-5">
    @if (!empty($data[0]->getAttributes()) && $IsVariant==false)
        @php
            $dataProduct  = $data[0]->getAttributes();
        @endphp
        @if ($dataProduct['path']&&isset($dataProduct['path']))
        @php
            $productImage = explode('|',$dataProduct['path']);
        @endphp
        <div class="content">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-4">
                    <h4 class="product-name">{{$dataProduct['name']}}</h4>
                    <div class="slider-for d-flex" style="width: 100%;">
                        @foreach ($productImage as $item)
                            <div>
                                <a href="#">
                                    <img src="../../build/assets/image/{{$item}}" class="img-fluid product-image" alt="?">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="slider-nav">
                        @foreach ($productImage as $item)
                            <div>
                                <a href="#">
                                    <img src="../../build/assets/image/{{$item}}" class="img-fluid product-image" alt="?">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-8">
                    <div class="d-flex justify-content-between">
                        <span class="product-price">
                            $ {{$dataProduct['price']}}.00
                        </span>
                        <div>
                            <input type="checkbox" {{$dataProduct&&$dataProduct['quantity']>0?'checked':''}} disabled>Còn hàng
                        </div>
                    </div>
                    <p>Chọn phiên bản để xem giá và chi nhánh còn hàng:</p>
                    <div class="product-variant d-flex ">
                        <span>Màu sắc: </span>
                        <div class="product-color" style="background-color: #ff0000;width: 30px; height: 30px; margin: 4px;cursor:pointer;"></div>
                        <div class="product-color" style="background-color: #62becc;width: 30px; height: 30px; margin: 4px;cursor:pointer;"></div>
                        <div class="product-color" style="background-color: #cd46bd;width: 30px; height: 30px; margin: 4px;cursor:pointer;"></div>
                        <div class="product-color" style="background-color: #b1bc37;width: 30px; height: 30px; margin: 4px;cursor:pointer;"></div>
                    </div>
                    <button class="btn btn-primary mt-5" {{$dataProduct&&$dataProduct['quantity']<=0?'disabled':''}}>Mua Hàng</button>
                </div>
            </div>  
        </div>
        @endif
    @else
            @php
                $dataProduct  = $dataProduct->getAttributes();
                $data = $data[0]->getAttributes();
            @endphp
            @if ($data['path']&&isset($data['path']))
                @php
                    $productImage = explode('|',$data['path']);
                @endphp
                <div class="content" style="overflow:hidden;">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-4">
                            <h4 class="product-name">{{$dataProduct['name']}}</h4>
                            <div class="slider-for d-flex" style="width: 100%;">
                                @foreach ($productImage as $item)
                                    <div>
                                        <a href="#">
                                            <img src="../../../build/assets/image/{{$item}}" class="img-fluid product-image" alt="?">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="slider-nav">
                                @foreach ($productImage as $item)
                                    <div>
                                        <a href="#">
                                            <img src="../../../build/assets/image/{{$item}}" class="img-fluid product-image" style="width: 100%;" alt="?">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-8">
                            <div class="d-flex justify-content-between">
                                <span class="product-price">
                                    $ {{$data['price']}}.00
                                </span>
                                <div>
                                    <input type="checkbox" {{$data&&$data['quantity']>0?'checked':''}} disabled>Còn hàng
                                </div>
                            </div>
                            <p>Chọn phiên bản để xem giá và chi nhánh còn hàng:</p>
                            <div class="product-variant d-flex ">
                                @foreach ($NameVariant as $valueVariant)
                                <span>{{$valueVariant->name}}: </span>
                                        @foreach ($arrayColorAriant as $key=>$itemColor)
                                        <a 
                                            class="product-color" 
                                            href={{route('product.show_variant',['id'=>$dataProduct['id'],'variant'=>$valueVariant->id,'productVariantID'=>$itemColor['variant_id']])}} 
                                            style="background-color: {{$itemColor['value']}};#ff0000;width: 30px; height: 30px; margin: 4px;cursor:pointer;"
                                            >
                                        </a>
                                    @endforeach
                                @endforeach
                                
                                
                            </div>
                            <p class="mt-4" style="color: #000; font-weight: 500;">Số lượng sản phẩm còn: {{$data['quantity']}}</p>
                            <button class="btn btn-primary mt-5" {{$data&&$data['quantity']<=0?'disabled':''}}>Mua Hàng</button>
                        </div>
                    </div>  
                </div>
            @endif
    @endif
    
</div>
@endsection

@section('script')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src=""></script>
    <script type="text/javascript">
        $('document').ready(function(){
            $('.product-color').click(function(){
                $(this).addClass('active').siblings().removeClass('active');
            });
            $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    asNavFor: '.slider-for',
                    dots: false,
                    centerMode: true,
                    focusOnSelect: true
            });
        });
    </script>
@endsection

