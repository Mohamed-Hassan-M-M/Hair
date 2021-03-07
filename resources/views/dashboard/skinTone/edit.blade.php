@extends("dashboard.layout.dashboard")
@section("title") Skin Tone || edit @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Skin Tone edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('skin_tone.index')}}">Skin Tone</a></li>
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
                                <img style="height: 350px; width: 100%;" class="img-thumbnail mt-3" src="{{asset('dashboard/images/' . $skinTone->link_url)}}">
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="col-md-6">
                                <form class="form" action="{{route('skin_tone.update',$skinTone->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" value="{{$skinTone->id}}" name="id">
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="skin_tone_name">Skin Tone name</label>
                                                <input type="text" class="form-control @error('skin_tone_name') is-invalid @enderror " value="{{old('skin_tone_name',$skinTone->skin_tone_name)}}" id="skin_tone_name" placeholder="Enter skin tone name" name="skin_tone_name">
                                                @error('skin_tone_name')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="skin_tone_colour_id">Color</label>
                                                <select class="form-control @error('skin_tone_colour_id') is-invalid @enderror " id="skin_tone_colour_id" name="skin_tone_colour_id">
                                                    <option value="">Choose Color</option>
                                                    @foreach($colors as $color)
                                                        <option value="{{$color->id}}" style="color: {{$color->colour_hash}}; font-weight: bolder" @if($skinTone->skin_tone_colour_id == $color->id) selected @endif >{{$color->colour_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('skin_tone_colour_id')
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
