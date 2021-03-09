@extends("dashboard.layout.dashboard")
@section("title") Color || edit @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Color edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('color.index')}}">Color</a></li>
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
                                <img style="height: 350px; width: 100%;" class="img-thumbnail mt-3" src="{{asset('dashboard/images/' . $color->link_url)}}">
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="col-md-6">
                                <form class="form" action="{{route('color.update',$color->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" value="{{$color->id}}" name="id">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="colour_name">Color name</label>
                                            <input type="text" class="form-control @error('colour_name') is-invalid @enderror " value="{{old('colour_name',$color->colour_name)}}" id="colour_name" placeholder="Enter colour name" name="colour_name" required>
                                            @error('colour_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="colour_hash">Color</label>
                                            <input type="color" class="form-control" id="colour_hash" value="{{old('colour_hash',$color->colour_hash)}}" placeholder="Enter name" name="colour_hash" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="link_url">Sample image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('link_url') is-invalid @enderror " id="link_url" name="link_url">
                                                    <label class="custom-file-label" for="link_url"></label>
                                                </div>
                                            </div>
                                            @error('link_url')
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
