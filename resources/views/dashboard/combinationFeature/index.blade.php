@extends("dashboard.layout.dashboard")
@section("title") Combination Feature @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Combination Feature</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Combination Feature</li>
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
                    <div class="col-12">
                        <a class="btn btn-lg btn-success mb-3" href="{{route("combination_feature.create")}}"><i class="fa fa-plus"></i> Add combination feature </a>
                    </div>
                </div>
                @include('dashboard.includes.alerts.errors')
                @include('dashboard.includes.alerts.success')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered table-hover text-center" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Face shape</th>
                                        <th>Skin tone</th>
                                        <th>Hair length</th>
                                        <th>Hair style</th>
                                        <th>Hair color</th>
                                        <th>Result Image</th>
                                        <th>Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($combinations->count() > 0)
                                        @foreach($combinations as $combination)
                                    <tr>
                                        <td class="align-middle"> @if($combination->face_shape_id) {{$combination->Face->shape_name}} @endif </td>
                                        <td class="align-middle"> @if($combination->skin_tone_id ) {{$combination->Skin->skin_tone_name}} @endif </td>
                                        <td class="align-middle"> @if($combination->hair_length_id ) {{$combination->Length->hair_length_name}} @endif </td>
                                        <td class="align-middle"> @if($combination->hair_style_id ) {{$combination->Style->hair_style_name}} @endif </td>
                                        <td class="align-middle"> @if($combination->hair_color_id  ) <div class="m-auto" style="background-color: {{$combination->Color->colour_hash}}; width: 100px;height: 100px; border-radius: 30%"></div> @endif </td>
                                        <td class="align-middle"><img src="{{asset('dashboard/images/'. $combination->link_url)}}" class="rounded mx-auto d-block" style="width: 100px;height: 100px;" alt="..."></td>
                                        <td class="align-middle">
                                            <a href="{{route('combination_feature.edit',$combination->id)}}"><i class="fas fa-edit"></i></a>
                                            <a href="" class="delete text-danger ml-3"><i class="fas fa-trash"></i></a>
                                            <form class="form" action="{{route('combination_feature.destroy',$combination->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
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
            $(".delete").click(function(e){
                e.preventDefault();
                if(confirm('Warnning! are you sure to delete.'))
                {
                    $(this).next().submit()
                }
                else {
                    return false;
                }
            });
        });
    </script>
@endsection
