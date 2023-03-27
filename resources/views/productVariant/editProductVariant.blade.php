@extends('products\base')
@section('link')
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
@endsection
@section('content')
    <h1>Update Product Variant</h1>
    <div class="add-product">
        <form action="{{route('productVariant.update')}}" method="POST">
            @csrf
            @method('PATCH')
            @if (!empty($dataProductVariant)&&$dataProductVariant->getAttributes())
            @php
                    $dataProductVariant = $dataProductVariant->getAttributes();
                    @endphp
                @if ($OnlyProduct  && $OnlyProduct->is_variant == 0)
                <input type="hidden" name="idProductVariant" value={{$dataProductVariant['id']}}>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input 
                          type="text" 
                          class="form-control" 
                          name="price" id="exampleInputEmail1" 
                          value={{$dataProductVariant&&$dataProductVariant['price']?$dataProductVariant['price'] : ""}} 
                          aria-describedby="emailHelp"  
                          placeholder="Enter Price" 
                          required
                      >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Quantity</label>
                      <input 
                          type="text" 
                          name="quantity" 
                          class="form-control" 
                          value={{$dataProductVariant&&$dataProductVariant['quantity'] ? $dataProductVariant['quantity'] : ""}} 
                          id="exampleInputPassword1" 
                          placeholder="Enter Quantity"
                      >
                    </div>
                    <p>Status</p>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <div class="mx-2">
                            <input 
                                type="radio" 
                                name="status" 
                                value="0" 
                                class="mx-1" 
                                {{$dataProductVariant&&$dataProductVariant['status']==0 ? 'checked' : ""}}
                                aria-label="Radio button for following text input"
                            >
                            Online
                          </div>
                          <div>
                            <input 
                              type="radio" 
                              name="status"  
                              value="1" 
                              class="mx-1" 
                              {{$dataProductVariant&&$dataProductVariant['status']==1 ? 'checked' : ""}}
                              aria-label="Radio button for following text input"
                            >
                            Offline
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="input-group my-3">
                      <select class="custom-select" id="optionCategories" name="variant_id">
                        @if ($dataVariant)
                        @foreach ($dataVariant as $key=>$value)
                          <option value={{$value->id}} {{$dataProductVariant&&$dataProductVariant['variant_id']==$value->id? 'selected':''}}>{{$value->name}}</option>
                        @endforeach
                        @endif
                      </select>
                      <div class="input-group-append">
                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                      </div>
                    </div>
                    <div class="form-group my-3">
                      <label for="nameProductVariant">Name Variant:</label>
                      <input 
                        type="text" 
                        id="nameProductVariant" 
                        class="form-control" 
                        value={{Str::length($dataProductVariant['name'])>0?$dataProductVariant['name']:" "}} 
                        name="nameProductVariant"
                      >
                    </div>
                    <div class="form-group my-3">
                        <label for="valueVariant">Value Variant:</label>
                        <input 
                          type="text" 
                          id="valueVariant" 
                          class="form-control"
                          value={{$dataProductVariant&&$dataProductVariant['value'] ? $dataProductVariant['value'] : ""}} 
                          name="valueVariant"
                        >
                    </div>
                    <div class="input-group my-3">
                        <select class="custom-select" id="optionCategories" name="product_id">
                          @if ($OnlyProduct)
                              <option value={{$OnlyProduct->id}}>{{$OnlyProduct->name}}</option>
                          @endif
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                        </div>
                    </div>
                    {{-- <div class="custom-file my-3">
                      <input type="file" class="custom-file-input" id="customFile" name="images[]" multiple required>
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div> --}}
                @else
                {{dd(false);}}    
                @endif
            @else
            {{dd(true);}}
            @endif
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <button type="submit" class="btn btn-primary">Update Product Ariant</button>
          </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
          
    </script>
@endsection