@extends("dashboard.layout.dashboard")
@section("title") Product @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                        <a class="btn btn-lg btn-success mb-3" href="{{route("product.create")}}"><i class="fa fa-plus"></i> Add product </a>
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
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Before</th>
                                        <th>Product Image</th>
                                        <th>After</th>
                                        <th>Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($products->count() > 0)
                                        @foreach($products as $product)
                                    <tr>
                                        <td class="align-middle">{{$product->product_name}}</td>
                                        <td class="align-middle">{{$product->Category->category_name}}</td>
                                        <td class="align-middle"><img src="{{asset('dashboard/images/'. $product->before)}}" class="rounded mx-auto d-block" style="width: 100px;height: 100px;" alt="..."></td>
                                        <td class="align-middle"><img src="{{asset('dashboard/images/'. $product->product)}}" class="rounded mx-auto d-block" style="width: 100px;height: 100px;" alt="..."></td>
                                        <td class="align-middle"><img src="{{asset('dashboard/images/'. $product->after)}}" class="rounded mx-auto d-block" style="width: 100px;height: 100px;" alt="..."></td>
                                        <td class="align-middle">
                                            <a href="{{route('product.edit',$product->id)}}"><i class="fas fa-edit"></i></a>
                                            <a href="" class="delete text-danger ml-3"><i class="fas fa-trash"></i></a>
                                            <form class="form" action="{{route('product.destroy',$product->id)}}" method="POST">
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
