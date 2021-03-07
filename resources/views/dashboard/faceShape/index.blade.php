@extends("dashboard.layout.dashboard")
@section("title") Face Shape @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Face Shape</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Face Shape</li>
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
                        <a class="btn btn-lg btn-success mb-3" href="{{route("face_shape.create")}}"><i class="fa fa-plus"></i> Add face shape </a>
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
                                        <th>Shape Name</th>
                                        <th>Image</th>
                                        <th>Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($faceShapes->count() > 0)
                                        @foreach($faceShapes as $faceShape)
                                    <tr>
                                        <td class="align-middle">{{$faceShape->shape_name}}</td>
                                        <td class="align-middle"><img src="{{asset('dashboard/images/'. $faceShape->link_url)}}" class="rounded mx-auto d-block" style="width: 100px;height: 100px;" alt="..."></td>
                                        <td class="align-middle">
                                            <a href="{{route('face_shape.edit',$faceShape->id)}}"><i class="fas fa-edit"></i></a>
                                            <a href="" class="delete text-danger ml-3"><i class="fas fa-trash"></i></a>
                                            <form class="form" action="{{route('face_shape.destroy',$faceShape->id)}}" method="POST">
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
