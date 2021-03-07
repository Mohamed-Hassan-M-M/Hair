@extends("dashboard.layout.dashboard")
@section("title") Skin Tone || create @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Skin Tone create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('skin_tone.index')}}">Skin Tone</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                    <div class="col-md-6 m-auto">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <!-- form start -->
                            <form class="form" action="{{route('skin_tone.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="skin_tone_name">Skin Tone name</label>
                                        <input type="text" class="form-control @error('skin_tone_name') is-invalid @enderror " value="" id="skin_tone_name" placeholder="Enter skin tone name" name="skin_tone_name" required>
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
                                            <option value="{{$color->id}}" style="color: {{$color->colour_hash}}; font-weight: bolder">{{$color->colour_name}}</option>
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
                                                <input type="file" class="custom-file-input @error('link_url') is-invalid @enderror " id="link_url" name="link_url" required>
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
                                    <button type="submit" class="btn b btn-success col-md-4">Create</button>
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
