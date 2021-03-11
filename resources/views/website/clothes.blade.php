@extends("website.layout.website")
@section("title") Service @endsection
@section("content")
    <div class="site-section">
        <div class="container">

            <div class="row">
                <div class="col-md-2">
                    <div class="row">
                        <div class="text-center w-100 card bg-light">
                            <div class="card-header">
                                <h2>Category</h2>
                            </div>
                            <div class="p-3 p-lg-4 site-block-feature-7 card-body">
                                @foreach($categories as $category)
                                <a href="{{route('clothes.cat',$category->id)}}" class="d-block mb-2 text-uppercase font-weight-bold size-32" @if($categories_choose != null && $categories_choose->id == $category->id) style="color: #908b51" @endif ><u>{{$category->category_name}}</u></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="row">

                        @foreach($products as $product)
                        <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
                            <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                                <img src="{{asset('website/images/dressing.png')}}" class="w-100 display-3 text-primary mb-4 d-block" alt="">
                                <h3 class="text-black h4">{{$product->product_name}}</h3>
                                <div class="flex-row justify-content-center" style="display: -webkit-box!important;overflow-x: auto">
                                    @foreach($product->Color as $color)
                                        <div class="mr-2" style="cursor: pointer;background-color: {{$color->product_color_hash}}; width: 30px;height: 30px; border-radius: 50%"></div>
                                    @endforeach
                                </div>
                                <p><a href="" class="font-weight-bold text-primary">Try</a></p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

    </script>
@endsection
