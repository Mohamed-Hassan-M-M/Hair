@extends("dashboard.layout.dashboard")
@section("title") Hair Style || edit @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hair Style edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('hair_style.index')}}">Hair Style</a></li>
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
                                <img style="height: 250px; width: 100%;" class="img-thumbnail mt-3" src="{{asset('dashboard/images/' . $hairStyle->link_url)}}">
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="col-md-6">
                                <form class="form" action="{{route('hair_style.update',$hairStyle->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" value="{{$hairStyle->id}}" name="id">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="hair_style_name">Hair Style name</label>
                                            <input type="text" class="form-control @error('hair_style_name') is-invalid @enderror " value="{{old('hair_style_name',$hairStyle->hair_style_name)}}" id="hair_style_name" placeholder="Enter hair style name" name="hair_style_name" required>
                                            @error('hair_style_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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
