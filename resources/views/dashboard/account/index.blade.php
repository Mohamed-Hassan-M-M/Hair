@extends("dashboard.layout.dashboard")
@section("title") Account @endsection
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Account</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Account</li>
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
                        <div class="card">
                            <div class="card-body row d-flex flex-row">
                                <div class="col-md-3 text-center p-5">
                                    <a href="" id="overview">Overview</a><hr>
                                    <a href="" id="edit">Edit Profile</a><hr>
                                    <a href="" id="password">Change Password</a>
                                </div>
                                <div class="col-md-9 pt-5" id="content" style="border-left:1px solid #2b3e505c; color: rgba(0,0,0,.5);">
                                    @include('dashboard.account.overview')
                                </div>

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
        window.onload = function() {
            $(document).on('click','#overview',function (e){
                e.preventDefault();
                $.ajax({
                    type:'get',
                    url:'{{route('admin.account.overview')}}',
                    data:{},
                    success:function (data){
                        if(data.status === true)
                        {
                            $('#content').html('');
                            $('#content').html(data.view);
                        }
                    },
                    error:function (reject){
                    }
                })
            });
            $(document).on('click','#edit',function (e){
                e.preventDefault();
                $.ajax({
                    type:'get',
                    url:'{{route('admin.account.editProfile')}}',
                    data:{},
                    success:function (data){
                        if(data.status === true)
                        {
                            $('#content').html('');
                            $('#content').html(data.view);
                        }
                    },
                    error:function (reject){
                    }
                })
            });
            $(document).on('click','#password',function (e){
                e.preventDefault();
                $.ajax({
                    type:'get',
                    url:'{{route('admin.account.password')}}',
                    data:{},
                    success:function (data){
                        if(data.status === true)
                        {
                            $('#content').html('');
                            $('#content').html(data.view);
                        }
                    },
                    error:function (reject){
                    }
                })
            });
            $(document).on('click','#updateProfile',function (e){
                e.preventDefault();
                var form = $('#updateform')[0];
                var dataform = new FormData(form);
                $.ajax({
                    type:'post',
                    url:'{{route('admin.account.doEditProfile')}}',
                    data:dataform,
                    processData: false,
                    contentType: false,
                    success:function (data){
                        if(data.status === true)
                        {
                            $("#user_name_error").hide();
                            $("#email_error").hide();
                            $('#content').html('');
                            $('#content').html(data.view);
                        }
                    },
                    error:function (reject){
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, val){
                            $("#" + key + "_error").show();
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                })
            });
        };
    </script>
@endsection
