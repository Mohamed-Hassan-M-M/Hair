@extends("website.layout.website")
@section("title") Service @endsection
@section("content")

    <div class="site-section" id="site-section-service">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7">
                    <h2 class="site-section-heading font-weight-light text-black text-center">Featured Services</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 text-center mb-5">
                    <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                        <span class="icon flaticon-location-pin display-3 text-primary mb-4 d-block"></span>
                        <h3 class="text-black h4">Hair</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum exercitationem quae id dolorum debitis.</p>
                        <p><a href="" class="font-weight-bold text-primary" data-toggle="modal" data-target="#hair">Try</a></p>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-5">
                    <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                        <span class="icon flaticon-shave display-3 text-primary mb-4 d-block"></span>
                        <h3 class="text-black h4">Clothes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum exercitationem quae id dolorum debitis.</p>
                        <p><a href="" class="font-weight-bold text-primary" data-toggle="modal" data-target="#clothes">Try</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal hair -->
    <div class="modal fade" id="hair" tabindex="-1" role="dialog" aria-labelledby="hairTitle" aria-hidden="true">
        <div class="modal-dialog w-75 m-auto pt-5 pb-5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="hairTitle">Hair Dressing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6 p-4">
                            <img class="w-100 img-thumbnail" id="srchair" style="height: 450px; display: none" src="" >
                            <div class="text-center rounded" id="divhair" style="height: 450px;line-height:450px;background-color: #005c43;color: white">
                                <span class="font-weight-bold" id="hairModule" style="cursor: pointer"><i class="icon-camera"></i> upload image</span>
                                <form action="">
                                    <input type="file" id="imagehair" style="display: none">
                                </form>
                            </div>
                            <img class="w-100 img-thumbnail" id="srchairafter" style="height: 450px; display: none" src="" >
                        </div>
                        <div class="col-md-6 p-4">
                            <div class="row">
                                <input type="hidden" id="color" name="color">
                                <h2 class="mb-4 w-100">Color</h2>
                                <div class="flex-row" style="display: -webkit-box!important;overflow-x: auto">
                                    @foreach($colors as $color)
                                        <div class="mr-2" style="cursor: pointer;background-color: {{$color->colour_hash}}; width: 70px;height: 70px; border-radius: 50%"></div>
                                    @endforeach
                                </div>
                            </div>
                            <hr style="border-top-color:#005c4382 ">
                            <div class="row">
                                <input type="hidden" id="style" name="style">
                                <h2 class="mb-4 w-100">Hair Style</h2>
                                <div style="white-space: nowrap; overflow-x: auto">
                                    @foreach($hairStyles as $hairStyle)
                                        <img class="mr-2" src="{{asset('dashboard/images/'. $hairStyle->link_url)}}" style="cursor: pointer;width: 70px;height: 70px; border-radius: 50%">
                                    @endforeach
                                </div>
                            </div>
                            <hr style="border-top-color:#005c4382 ">
                            <div class="row">
                                <input type="hidden" id="length" name="length">
                                <h2 class="mb-4 w-100">Hair Length</h2>
                                <div style="white-space: nowrap; overflow-x: auto">
                                    @foreach($hairLengths as $hairLength)
                                        <img class="mr-2" src="{{asset('dashboard/images/'. $hairLength->link_url)}}" style="cursor: pointer;width: 70px;height: 70px; border-radius: 50%">
                                    @endforeach
                                </div>
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
        $(document).ready(function() {
            $("#hairModule").click(function(e){
                e.preventDefault();
                $("#imagehair").click();
            });
            $('#imagehair').change(function(){
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $("#divhair").hide();
                        $('#srchair').attr('src',e.target.result);
                        $('#srchair').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    $('#hairModule').html('You can upload images only')
                }
            });
            $("#clothesModule").click(function(e){
                e.preventDefault();
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
                        $("#divclothes").hide();
                        $('#srcclothes').attr('src',e.target.result);
                        $('#srcclothes').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    $('#clothesModule').html('You can upload images only')
                }
            });
        });
    </script>
@endsection
