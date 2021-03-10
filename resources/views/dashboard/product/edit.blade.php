@extends("dashboard.layout.dashboard")
@section("title") Product || edit @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <!-- form start -->
                            <form id="form" class="form" action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" value="{{$product->id}}" name="id">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="product_name">Product name</label>
                                            <input type="text" class="form-control @error('product_name') is-invalid @enderror " value="{{old('product_name',$product->product_name)}}" id="product_name" placeholder="Enter product name" name="product_name" required>
                                            @error('product_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="hair_color_id">Category</label>
                                            <select class="form-control @error('category_id') is-invalid @enderror " id="category_id" name="category_id" required>
                                                <option value="">Choose Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif >{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group" style="padding-left: 7.5px;">
                                            <button type="button" class="addcolor btn btn-outline-primary"><i class="fa fa-plus"></i> Add Color</button>
                                        </div>
                                    </div>

                                    <div class="row p-5" id="addcolor">
                                        @foreach($product->Color as $index => $color)
                                            <div class="card row w-100">
                                                <div class="card-body">

                                                    <button type="button" onclick="removeColor(this)" class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="row">
                                                        <div class="col-md-6 p-3">
                                                            <div id="carouselExampleControls{{$color->id}}" class="carousel slide" data-ride="carousel">
                                                                <div class="carousel-inner">
                                                                    <div class="carousel-item active">
                                                                        <img style="height: 300px; width: 100%;" class=" d-block img-thumbnail mt-3" src="{{asset('dashboard/images/' . $color->product)}}">
                                                                    </div>
                                                                    <div class="carousel-item">
                                                                        <img style="height: 300px; width: 100%;" class=" d-block img-thumbnail mt-3" src="{{asset('dashboard/images/' . $color->after)}}">
                                                                    </div>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#carouselExampleControls{{$color->id}}" role="button" data-slide="prev">
                                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next" href="#carouselExampleControls{{$color->id}}" role="button" data-slide="next">
                                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 p-3 pt-4">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label >Color name</label>
                                                                    <input type="text" class="form-control" value="{{old('colour_name[]',$color->product_color_name)}}" placeholder="Enter colour name" name="colour_name[]" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Color</label>
                                                                    <input type="color" class="form-control" placeholder="Enter name" value="{{old('colour_hash[]',$color->product_color_hash)}}" name="colour_hash[]" required>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Product</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="hidden" value="{{$color->product}}"  name="producthidden[]">
                                                                            <input type="file" class="custom-file-input" value="{{$color->product}}"  name="productimage[]">
                                                                            <label class="custom-file-label"></label>
                                                                        </div>
                                                                    </div>
                                                                    @error("productimage.$index")
                                                                    <span class="invalid-feedback d-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>After</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="hidden" value="{{$color->after}}" name="afterhidden[]">
                                                                            <input type="file" class="custom-file-input" value="{{$color->after}}" name="after[]">
                                                                            <label class="custom-file-label"></label>
                                                                        </div>
                                                                    </div>
                                                                    @error("after.$index")
                                                                    <span class="invalid-feedback d-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="form-group p-4">
                                                            <button type="button" indexColor="{{$index}}" onclick="addSize(this)" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add Size</button>
                                                        </div>
                                                    </div>

                                                    <div class="row p-5" class="size">
                                                        @foreach($color->Size as $size)
                                                        <div class="form-group col-md-3 pb-2 ml-4 mr-4 shadow-lg p-3 mb-5 rounded">

                                                            <label>Size</label>
                                                            <input type="text" class="form-control" value="{{old("size[$index][]",$size->product_size_name)}}" name="size[{{$index}}][]" required>

                                                            <label>Count</label>
                                                            <input type="number" class="form-control" value="{{old("count[$index][]",$size->count)}}" name="count[{{$index}}][]" required>

                                                        </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn b btn-primary col-md-4">Edit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>

        var countColor = {{$product->Color->count()}}
        var countRemoveColor = 0;
        var indexColor = 0
        $(document).ready(function() {

            $(".addcolor").click(function(){
                countColor++;
                $("#addcolor").append(
                    '<div class="card row w-100">'+
                    '<div class="card-body">'+

                    '<button type="button" onclick="removeColor(this)" class="close" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+

                    '<div class="row">'+
                    '<div class="form-group col-md-6">'+
                    '<label >Color name</label>'+
                    '<input type="text" class="form-control" value="" placeholder="Enter colour name" name="colour_name[]" required>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label>Color</label>'+
                    '<input type="color" class="form-control" placeholder="Enter name" name="colour_hash[]" required>'+
                    '</div>'+
                    '</div>'+

                    '<div class="row">'+
                    '<div class="form-group col-md-6">'+
                    '<label>Product</label>'+
                    '<div class="input-group">'+
                    '<div class="custom-file">'+
                    '<input type="file" class="custom-file-input"  name="productimage[]" required>'+
                    '<label class="custom-file-label"></label>'+
                    '</div>'+
                    '</div>'+
                    '@error("productimage[*]")'+
                    '<span class="invalid-feedback d-block" role="alert">'+
                    '<strong>{{ $message }}</strong>'+
                    '</span>'+
                    '@enderror'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label>After</label>'+
                    '<div class="input-group">'+
                    '<div class="custom-file">'+
                    '<input type="file" class="custom-file-input" name="after[]" required>'+
                    '<label class="custom-file-label"></label>'+
                    '</div>'+
                    '</div>'+
                    '@error("after[*]")'+
                    '<span class="invalid-feedback d-block" role="alert">'+
                    '<strong>{{ $message }}</strong>'+
                    '</span>'+
                    '@enderror'+
                    '</div>'+
                    '</div>'+

                    '<div class="row">'+
                    '<div class="form-group" style="padding-left: 7.5px;">'+
                    `<button type="button" indexColor="${countColor}" onclick="addSize(this)" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add Size</button>`+
                    '</div>'+
                    '</div>'+

                    '<div class="row p-5" class="size">' +

                    '<div class="form-group col-md-3 pb-2 ml-4 mr-4 shadow-lg p-3 mb-5 rounded" style="border-left: 1px solid #3f99b72b;border-top: 1px solid #3f99b72b;border-bottom: 1px solid #3f99b72b">'+

                    '<label>Size</label>'+
                    `<input type="text" class="form-control" name="size[${countColor}][]" required>`+

                    '<label>Count</label>'+
                    `<input type="number" class="form-control" name="count[${countColor}][]" required>`+

                    '</div>'+

                    '</div>'+

                    '</div>'+
                    '</div>');
            });

            $("#form").submit(function (e){
                if(countColor <= 0 || countRemoveColor ==  countColor)
                {
                    e.preventDefault()
                    alert('Add color first');
                    return false;
                }
                return true;
            })

        });

        function addSize(elem) {
            indexColor = $(elem).attr('indexColor');
            $(elem).parent().parent().next().append(
                '<div class="form-group col-md-3 pb-2 ml-4 mr-4 shadow-lg p-3 mb-5 rounded" style="border-left: 1px solid #3f99b72b;border-top: 1px solid #3f99b72b;border-bottom: 1px solid #3f99b72b">'+

                '<button type="button" onclick="removeSize(this)" class="close" aria-label="Close">'+
                '<span aria-hidden="true">&times;</span>'+
                '</button>'+

                '<label>Size</label>'+
                `<input type="text" class="form-control" name="size[${indexColor}][]" required>`+

                '<label>Count</label>'+
                `<input type="number" class="form-control" name="count[${indexColor}][]" required>`+

                '</div>');
        }

        function removeColor(elem){
            countRemoveColor++;
            $(elem).parent().parent().remove();
        }

        function removeSize(elem){
            $(elem).parent().remove();
        }

    </script>
@endsection
