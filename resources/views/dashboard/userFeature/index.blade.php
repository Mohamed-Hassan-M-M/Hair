@extends("dashboard.layout.dashboard")
@section("title") User Activity @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Activity</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Activity</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('dashboard.includes.alerts.errors')
                @include('dashboard.includes.alerts.success')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered table-hover text-center" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Face shape</th>
                                        <th>Skin tone</th>
                                        <th>Hair length</th>
                                        <th>Hair style</th>
                                        <th>Hair color</th>
                                        <th>Image before</th>
                                        <th>Image after</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($activities->count() > 0)
                                        @foreach($activities as $activitie)
                                    <tr>
                                        <td class="align-middle">{{$activitie->User->user_name}}</td>
                                        <td class="align-middle">{{$activitie->Face->shape_name}}</td>
                                        <td class="align-middle">{{$activitie->Skin->skin_tone_name}}</td>
                                        <td class="align-middle">{{$activitie->Length->hair_length_name}}</td>
                                        <td class="align-middle">{{$activitie->Style->hair_style_name}}</td>
                                        <td class="align-middle"><div class="m-auto" style="background-color: {{$activitie->colour_hash}}; width: 100px;height: 100px; border-radius: 30%"></div></td>
                                        <td class="align-middle"><img src="{{asset('dashboard/images/'. $activitie->uploaded_image)}}" class="rounded mx-auto d-block" style="width: 100px;height: 100px;" alt="..."></td>
                                        <td class="align-middle"><img src="{{asset('dashboard/images/'. $activitie->saved_image)}}" class="rounded mx-auto d-block" style="width: 100px;height: 100px;" alt="..."></td>
                                    </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#example").DataTable({
                scrollX:true,
            });
        });
    </script>
@endsection
