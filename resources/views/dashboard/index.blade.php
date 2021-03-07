@extends("dashboard.layout.dashboard")
@section("title") Home @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{\App\Models\Colour::count()}}</h3>

                                <p>Colors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-color-palette"></i>
                            </div>
                            <a href="{{route('color.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{\App\Models\Skin_tone::count()}}</h3>

                                <p>Skin Tones</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-favorite"></i>
                            </div>
                            <a href="{{route('skin_tone.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{\App\Models\User::whereHas('roles', function ($query) {$query->where('name','!=', 'admin');})->count()}}</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{\App\Models\Face_shape::count()}}</h3>

                                <p>Face Shapes</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{route('face_shape.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header bg-gradient-primary">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Hair Style
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="hairStyleChart"
                                         style="position: relative; height: 300px;">
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        new Morris.Area({
            // ID of the element in which to draw the chart.
            element: 'hairStyleChart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                @if(array_key_exists(date("d",strtotime("-7 day")), $hairStyleChart)) { day: '{{date("Y-m-d",strtotime("-7 day"))}}', value: {{$hairStyleChart[date("d",strtotime("-7 day"))]}} }, @endif
                @if(array_key_exists(date("d",strtotime("-6 day")), $hairStyleChart)) { day: '{{date("Y-m-d",strtotime("-6 day"))}}', value: {{$hairStyleChart[date("d",strtotime("-6 day"))]}} }, @endif
                @if(array_key_exists(date("d",strtotime("-5 day")), $hairStyleChart)) { day: '{{date("Y-m-d",strtotime("-5 day"))}}', value: {{$hairStyleChart[date("d",strtotime("-5 day"))]}} }, @endif
                @if(array_key_exists(date("d",strtotime("-4 day")), $hairStyleChart)) { day: '{{date("Y-m-d",strtotime("-4 day"))}}', value: {{$hairStyleChart[date("d",strtotime("-4 day"))]}} }, @endif
                @if(array_key_exists(date("d",strtotime("-3 day")), $hairStyleChart)) { day: '{{date("Y-m-d",strtotime("-3 day"))}}', value: {{$hairStyleChart[date("d",strtotime("-3 day"))]}} }, @endif
                @if(array_key_exists(date("d",strtotime("-2 day")), $hairStyleChart)) { day: '{{date("Y-m-d",strtotime("-2 day"))}}', value: {{$hairStyleChart[date("d",strtotime("-2 day"))]}} }, @endif
                @if(array_key_exists(date("d",strtotime("-1 day")), $hairStyleChart)) { day: '{{date("Y-m-d",strtotime("-1 day"))}}', value: {{$hairStyleChart[date("d",strtotime("-1 day"))]}} } @endif
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'day',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['value'],
            xLabelFormat: function (x) {
                return showDay(x.getDay());
            },
            //lineColors:['#555']

        });
        function showDay(dayNo)
        {
            switch (dayNo)
            {
                case 0:
                    return 'Sunday';
                    break;
                case 1:
                    return 'Monday';
                    break;
                case 2:
                    return 'Tuesday';
                    break;
                case 3:
                    return 'Wednesday';
                    break;
                case 4:
                    return 'Thursday';
                    break;
                case 5:
                    return 'Friday';
                    break;
                case 6:
                    return 'Saturday';
                    break;
                default:
                    return '00';
            }
        }
    </script>
@endsection
