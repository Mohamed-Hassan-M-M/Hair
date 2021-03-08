@extends("dashboard.layout.dashboard")
@section("title") Combination Feature || edit @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Combination Feature edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('combination_feature.index')}}">Combination Feature</a></li>
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
                                <img style="height: 350px; width: 100%;" class="img-thumbnail mt-3" src="{{asset('dashboard/images/' . $combination->link_url)}}">
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="col-md-6">
                                <form class="form" action="{{route('combination_feature.update',$combination->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="skin_tone_id">Skin tone</label>
                                            <select class="form-control @error('skin_tone_id') is-invalid @enderror " id="skin_tone_id" name="skin_tone_id">
                                                <option value="">Choose Skin tone</option>
                                                @foreach($skinTones as $skinTone)
                                                    <option value="{{$skinTone->id}}" @if($skinTone->id == $combination->skin_tone_id) selected @endif >{{$skinTone->skin_tone_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('skin_tone_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="face_shape_id">Face shape</label>
                                            <select class="form-control @error('face_shape_id') is-invalid @enderror " id="face_shape_id" name="face_shape_id">
                                                <option value="">Choose Face shape</option>
                                                @foreach($faceShapes as $faceShape)
                                                    <option value="{{$faceShape->id}}" @if($skinTone->id == $combination->face_shape_id) selected @endif >{{$faceShape->shape_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('face_shape_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="hair_length_id">Hair length</label>
                                            <select class="form-control @error('hair_length_id') is-invalid @enderror " id="hair_length_id" name="hair_length_id">
                                                <option value="">Choose Hair length</option>
                                                @foreach($hairLengths as $hairLength)
                                                    <option value="{{$hairLength->id}}" @if($skinTone->id == $combination->hair_length_id) selected @endif >{{$hairLength->hair_length_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('hair_length_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="hair_style_id">Hair style</label>
                                            <select class="form-control @error('hair_style_id') is-invalid @enderror " id="hair_style_id" name="hair_style_id">
                                                <option value="">Choose Hair style</option>
                                                @foreach($hairStyles as $hairStyle)
                                                    <option value="{{$hairStyle->id}}" @if($skinTone->id == $combination->hair_style_id) selected @endif >{{$hairStyle->hair_style_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('hair_style_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="hair_color_id">Color</label>
                                            <select class="form-control @error('hair_color_id') is-invalid @enderror " id="hair_color_id" name="hair_color_id">
                                                <option value="">Choose Color</option>
                                                @foreach($colors as $color)
                                                    <option value="{{$color->id}}" @if($skinTone->id == $combination->hair_color_id) selected @endif style="color: {{$color->colour_hash}}; font-weight: bolder">{{$color->colour_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('hair_color_id')
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
