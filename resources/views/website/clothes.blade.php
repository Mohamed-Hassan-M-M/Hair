@extends("website.layout.website")
@section("title") Service @endsection
@section("content")
    <div class="site-section">
        <div class="container">

            <div class="row">
                <div class="col-md-2">
                    <div class="row">
                        <div class="text-center w-100 card bg-light">
                            <div class="card-header">
                                <h2>Category</h2>
                            </div>
                            <div class="p-3 p-lg-4 site-block-feature-7 card-body">
                                @foreach($categories as $category)
                                    @if($category->Product->count() > 0)
                                        <a href="{{route('clothes.cat',$category->id)}}" class="d-block mb-2 text-uppercase font-weight-bold size-32" @if($categories_choose != null && $categories_choose->id == $category->id) style="color: #908b51" @endif ><u>{{$category->category_name}}</u></a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="row">

                        @foreach($products as $product)
                        <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
                            <div class="h-100 p-3 bg-light site-block-feature-7">

                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{asset('dashboard/images/'. $product->Color->first()->productimage)}}" height="200" class="w-100 display-3 text-primary mb-4 d-block" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('dashboard/images/'. $product->Color->first()->after)}}" height="200" class="w-100 display-3 text-primary mb-4 d-block" alt="">
                                        </div>
                                    </div>
                                </div>

                                <h3 class="text-black h4">{{$product->product_name}}</h3>
                                <div class="flex-row justify-content-center" style="display: -webkit-box!important;overflow-x: auto">
                                    @foreach($product->Color as $color)
                                        <div class="mr-1 ml-1" style="background-color: {{$color->product_color_hash}}; width: 30px;height: 30px; border-radius: 50%"></div>
                                    @endforeach
                                </div>
                                <p><a href="" class=" tryOn font-weight-bold text-primary" data-toggle="modal" data-target="#clothes" productID="{{$product->id}}">Try</a></p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal hair -->
    <div class="modal fade" id="clothes" tabindex="-1" role="dialog" aria-labelledby="clothesTitle" aria-hidden="true">
        <div class="modal-dialog w-75 m-auto pt-5 pb-5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="clothesTitle">Auto Fitting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 p-4">

                            <div class="text-center rounded" style="height: 450px;line-height:450px;background-color: #005c43;color: white">
                                <!-- for open camera -->
                                <video autoplay="true" class="w-100" id="videoElement" style="display: none">

                                </video>
                                <span class="font-weight-bold" id="openCamera" style="cursor: pointer"><i class="icon-camera"></i> Open Camera OR </span>
                                <!-- for upload image -->
                                <img class="w-100 img-thumbnail" id="srcclothes" style="height: 450px; display: none" src="" >
                                <span class="font-weight-bold" id="uploadImage" style="cursor: pointer"> <i class="icon-image"></i> Upload Image</span>
                                <form>
                                    <input type="file" id="imageclothes" style="display: none">
                                </form>

                            </div>

                        </div>

                        <div class="col-md-6 p-4">
                            <canvas class="w-100 img-thumbnail" id="srcclothesafter" style="height: 450px; display: none" src="" ></canvas>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 pl-4 pr-4 d-flex">
                            <div class="col-md-9 flex-row">
                                <input type="hidden" name="color">
                                <div id="colors" class="flex-row mb-4" style="display: -webkit-box!important;overflow-x: auto"></div>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" name="size">
                                <h3 class="mb- w-100 font-weight-bold">Size</h3>
                                <div id="sizes" class="mb-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal link -->

@endsection
@section('script')
    <script>
        window.onload = function() {

            $(document).on('click','.tryOn',function (e){
                e.preventDefault();
                $.ajax({
                    type:'get',
                    url:'{{route('product.show')}}',
                    data:{
                        '_token': "{{ csrf_token() }}",
                        'product_id':$(this).attr('productID')
                    },
                    success:function (data){
                        if(data.status === true)
                        {
                            $('#colors').html('');
                            $('#sizes').html('');
                            data.colors.forEach(color => $('#colors').append(`<div class="mr-2 color" colorID="${color.id}" style="cursor: pointer;background-color: ${color.product_color_hash}; width: 70px;height: 70px; border-radius: 50%"></div>`));
                            data.sizes.forEach(size => $('#sizes').append(`<span class="mr-2"><strong>Size: </strong>${size.product_size_name}</span>`));
                        }
                    },
                    error:function (reject){
                    }
                })
            });

            $(document).on('click','.color',function (e){
                e.preventDefault();
                $.ajax({
                    type:'get',
                    url:'{{route('size.show')}}',
                    data:{
                        '_token': "{{ csrf_token() }}",
                        'colorID':$(this).attr('colorID')
                    },
                    success:function (data){
                        if(data.status === true)
                        {
                            $('#sizes').html('');
                            data.sizes.forEach(size => $('#sizes').append(`<span class="mr-2"><strong>Size: </strong>${size.product_size_name}</span>`));
                        }
                    },
                    error:function (reject){
                    }
                })
            });

            $("#uploadImage").click(function(e){
                e.preventDefault();
                $(this).parent().parent().removeClass("col-md-12").removeClass("col-md-8").removeClass("m-auto").addClass("col-md-6");
                $("#imageclothes").click();
            });
            $('#imageclothes').change(function(){
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $("#videoElement").hide();
                        $("#openCamera").hide();
                        $("#uploadImage").hide();
                        $('#srcclothes').attr('src',e.target.result);
                        $('#srcclothes').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    $('#uploadImage').html('You can upload images only')
                }
            });

            $(document).on('click','#openCamera',function (e){

                $(this).hide();
                $(this).parent().parent().removeClass("col-md-12").addClass("col-md-8").addClass("m-auto");
                var video = document.querySelector("#videoElement")

                if (navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({ video: true })
                        .then(function (stream) {
                            $(this).next().next().hide();
                            $("#videoElement").show();
                            video.srcObject = stream;
                            //
                        })
                        .catch(function (err0r) {
                            alert('You have not camera, Try upload photo.');
                        });
                }
            });
        };
    </script>
@endsection
