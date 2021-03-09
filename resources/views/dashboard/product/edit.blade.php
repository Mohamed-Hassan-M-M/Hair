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
                        <div class="card card-primary row d-flex flex-row">
                            <div class="col-md-6 p-4">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img style="height: 400px; width: 100%;" class=" d-block img-thumbnail mt-3" src="{{asset('dashboard/images/' . $product->before)}}">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 400px; width: 100%;" class=" d-block img-thumbnail mt-3" src="{{asset('dashboard/images/' . $product->product)}}">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 400px; width: 100%;" class=" d-block img-thumbnail mt-3" src="{{asset('dashboard/images/' . $product->after)}}">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="col-md-6">
                                <form class="form" action="{{route('product.update',$product->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" name="id">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="product_name">Product name</label>
                                            <input type="text" class="form-control @error('product_name') is-invalid @enderror " value="{{old('product_name',$product->product_name)}}" id="product_name" placeholder="Enter product name" name="product_name" required>
                                            @error('product_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
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
                                        <div class="form-group">
                                            <label for="before">Before</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('before') is-invalid @enderror " id="before" name="before">
                                                    <label class="custom-file-label" for="before"></label>
                                                </div>
                                            </div>
                                            @error('before')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="product">Product</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('product') is-invalid @enderror " id="product" name="product">
                                                    <label class="custom-file-label" for="product"></label>
                                                </div>
                                            </div>
                                            @error('product')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="after">After</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('after') is-invalid @enderror " id="after" name="after">
                                                    <label class="custom-file-label" for="after"></label>
                                                </div>
                                            </div>
                                            @error('after')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn b btn-primary col-md-4">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
