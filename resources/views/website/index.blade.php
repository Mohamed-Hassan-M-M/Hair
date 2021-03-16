@extends("website.layout.website")
@section("title") Home @endsection
@section("content")

    <div class="site-section" id="service">
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
                        <p><a href="{{route('clothes.all')}}" class="font-weight-bold text-primary">Try</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <img src="{{asset('website/images/person_1.jpg')}}" alt="Image" class="img-md-fluid">
                </div>
                <div class="col-lg-6 bg-white p-md-5 align-self-center">
                    <h2 class="display-1 text-black line-height-1 site-section-heading mb-4 pb-3">New hairstyle!</h2>
                    <p class="text-black lead"><em>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</em></p>
                    <p class="lead text-black">&mdash; <em>Stellla Martin</em></p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <img src="{{asset('website/images/dressing.png')}}" alt="Image" class="img-md-fluid">
                </div>
                <div class="col-lg-6 bg-white p-md-5 align-self-center">
                    <h2 class="display-1 text-black line-height-1 site-section-heading mb-4 pb-3">New Clothes!</h2>
                    <p class="text-black lead"><em>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</em></p>
                    <p class="lead text-black">&mdash; <em>Stellla Martin</em></p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-4 text-black">We want your look to be fabulous</h2>
                    <p class="mb-0"><a href="#service" class="btn btn-primary py-3 px-5 text-white">Try Now</a></p>
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

                        <div class="col-sm-6 p-4">
                            <img class="w-100 img-thumbnail" id="srchair" style="height: 450px; display: none" src="" >
                            <div class="text-center rounded" id="divhair" style="height: 450px;line-height:450px;background-color: #005c43;color: white">
                                <span class="font-weight-bold" id="hairModule" style="cursor: pointer"><i class="icon-camera"></i> upload image</span>
                                <form>
                                    <input type="file" id="imagehair" style="display: none">
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 p-4">
                            <canvas class="w-100 img-thumbnail" id="srchairafter" style="height: 450px; display: none" src="" ></canvas>
                        </div>
                        <div class="col-md-12 p-4">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-hair-tab" data-toggle="tab" href="#nav-hair" role="tab" aria-controls="nav-hair" aria-selected="true">Hair</a>
                                    <a class="nav-item nav-link" id="nav-lip-tab" data-toggle="tab" href="#nav-lip" role="tab" aria-controls="nav-lip" aria-selected="false">Lips</a>
                                    <a class="nav-item nav-link" id="nav-hairandlip-tab" data-toggle="tab" href="#nav-hairandlip" role="tab" aria-controls="nav-hairandlip" aria-selected="false">Hair & Lips</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-hair" role="tabpanel" aria-labelledby="nav-hair-tab">
                                    <div class="row m-2">
                                        <input type="hidden" id="colorhair" name="colorhair">
                                        <h2 class="mb-3 w-100">Color</h2>
                                        <div class="flex-row" style="display: -webkit-box!important;overflow-x: auto">
                                            @if(isset($colors))
                                                @foreach($colors as $color)
                                                    <div class="mr-2 colour" forwhat="hair" onclick="changeColor(this)" colorHash="{{$color->colour_hash}}" style="background-color: {{$color->colour_hash}}; width: 70px;height: 70px; border-radius: 50%"></div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <hr style="border-top-color:#005c4382 ">
                                    <div class="row m-2">
                                        <input type="hidden" id="style" name="style">
                                        <h2 class="mb-3 w-100">Hair Style</h2>
                                        <div style="white-space: nowrap; overflow-x: auto">
                                            @if(isset($hairStyles))
                                                @foreach($hairStyles as $hairStyle)
                                                    <img class="mr-2" forwhat="hair" src="{{asset('dashboard/images/'. $hairStyle->link_url)}}" style="cursor: pointer;width: 70px;height: 70px; border-radius: 50%">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <hr style="border-top-color:#005c4382 ">
                                    <div class="row m-2">
                                        <input type="hidden" id="length" name="length">
                                        <h2 class="mb-3 w-100">Hair Length</h2>
                                        <div style="white-space: nowrap; overflow-x: auto">
                                            @if(isset($hairLengths))
                                                @foreach($hairLengths as $hairLength)
                                                    <img class="mr-2" forwhat="hair" src="{{asset('dashboard/images/'. $hairLength->link_url)}}" style="cursor: pointer;width: 70px;height: 70px; border-radius: 50%">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-lip" role="tabpanel" aria-labelledby="nav-lip-tab">
                                    <div class="row m-2">
                                        <input type="hidden" id="colorlip" name="colorlip">
                                        <h2 class="mb-3 w-100">Color</h2>
                                        <div class="flex-row" style="display: -webkit-box!important;overflow-x: auto">
                                            @if(isset($colors))
                                                @foreach($colors as $color)
                                                    <div class="mr-2 colour" forwhat="lip" onclick="changeColor(this)" colorHash="{{$color->colour_hash}}" style="background-color: {{$color->colour_hash}}; width: 70px;height: 70px; border-radius: 50%"></div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-hairandlip" role="tabpanel" aria-labelledby="nav-hairandlip-tab">
                                    <div class="row m-2">
                                        <input type="hidden" id="colorhair&lip" name="colorhair&lip">
                                        <h2 class="mb-3 w-100">Color</h2>
                                        <div class="flex-row" style="display: -webkit-box!important;overflow-x: auto">
                                            @if(isset($colors))
                                                @foreach($colors as $color)
                                                    <div class="mr-2 colour" forwhat="hairandlip" onclick="changeColor(this)" colorHash="{{$color->colour_hash}}" style="background-color: {{$color->colour_hash}}; width: 70px;height: 70px; border-radius: 50%"></div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://docs.opencv.org/3.4.0/opencv.js"></script>
    <script>
        var hairData = {};
        var isIgnore = false;
        var changeApllied = [];
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
                    const data = new FormData()
                    data.append('file', input.files[0])
                    axios.post('http://192.168.1.10:8000/api/v1/upload',data, {
                    }).then(res =>
                    {
                        const imgData = {
                            path: res.data.path
                        };
                        axios.post('http://192.168.1.10:8000/api/v1/makeup', imgData, {
                        }).then(imgRes => {
                            hairData['prediction']=imgRes.data.prediction;
                            hairData['image']=imgRes.data.imageArray;
                            isIgnore = true;
                            $('.colour').css("cursor", "pointer");
                        });
                    });
                }
                else
                {
                    $('#hairModule').html('You can upload images only')
                }
            });
        });

        function changeColor(elem)
        {
            if(!isIgnore)
                return;
            changeApllied.push({"type": $(elem).attr('forwhat'), "color": $(elem).attr('colorHash')})
            var color = $(elem).attr('colorHash');
            // Convert hex color code to RGB color code
            const hexToRgb = hex =>
                hex.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i, (m, r, g, b) => '#' + r + r + g + g + b + b)
                    .substring(1).match(/.{2}/g)
                    .map(x => parseInt(x, 16))

            var applyColor = hexToRgb(color);
            // Segmented prediction from makeup API
            const data = hairData.prediction;
            // Original image from makeup API

            const image = hairData.image;

            const bytes = new Uint8ClampedArray(500 * 500 * 4);
            const tar = new Uint8ClampedArray(256 * 256 * 4);
            for (let i = 0; i < 500 * 500; ++i) {
                const j = i * 4;
                const k = i * 3;
                bytes[j + 0] = image[k + 0];
                bytes[j + 1] = image[k + 1];
                bytes[j + 2] = image[k + 2];
                bytes[j + 3] = 255;
            }
            alert($(elem).attr('forwhat'));
            // Changing the color of the selected feature only
            for (let i =0; i < 256 * 256; ++i) {
                const j = i * 4;
                const partId = data[i];
                switch ($(elem).attr('forwhat')){
                    case "lip": {
                        if(partId == 11 || partId == 12){
                            tar[j + 0] = applyColor[0];
                            tar[j + 1] = applyColor[1];
                            tar[j + 2] = applyColor[2];
                            tar[j + 3] = 255;
                        }
                        else{
                            tar[j + 0] = 0;
                            tar[j + 1] = 0;
                            tar[j + 2] = 0;
                            tar[j + 3] = 255;
                        }
                        break;
                    }
                    case "hair": {
                        if(partId == 13){
                            tar[j + 0] = applyColor[0];
                            tar[j + 1] = applyColor[1];
                            tar[j + 2] = applyColor[2];
                            tar[j + 3] = 255;
                        }
                        else{
                            tar[j + 0] = 0;
                            tar[j + 1] = 0;
                            tar[j + 2] = 0;
                            tar[j + 3] = 255;
                        }
                        break;
                    }
                    case "hairandlip": {
                        if(partId == 11 || partId == 12){
                            tar[j + 0] = applyColor[0];
                            tar[j + 1] = applyColor[1];
                            tar[j + 2] = applyColor[2];
                            tar[j + 3] = 255;
                        }
                        else{
                            tar[j + 0] = 0;
                            tar[j + 1] = 0;
                            tar[j + 2] = 0;
                            tar[j + 3] = 255;
                        }
                        if(partId == 13){
                            tar[j + 0] = applyColor[0];
                            tar[j + 1] = applyColor[1];
                            tar[j + 2] = applyColor[2];
                            tar[j + 3] = 255;
                        }
                        else{
                            tar[j + 0] = 0;
                            tar[j + 1] = 0;
                            tar[j + 2] = 0;
                            tar[j + 3] = 255;
                        }
                        break;
                    }
                }
            }
            let tarInter = new ImageData(tar, 256, 256);
            // Image having the feature with changes color
            let tarCanvas =  cv.matFromImageData(tarInter);
            let tsize = new cv.Size(500, 500);
            // Resize mask to match orriginal image
            cv.resize(tarCanvas, tarCanvas, tsize, 0, 0, cv.INTER_LINEAR)

            // Original image in opencv.js accepted format
            let bytesInter = new ImageData(bytes, 500, 500);
            let bytesCanvas =  cv.matFromImageData(bytesInter);

            let blur = new cv.Mat();
            let ksize = new cv.Size(7, 7);
            // Gaussian blur to sharpen the edges
            cv.GaussianBlur(tarCanvas, blur, ksize, 10);

            // Incorporating changes on the original image
            cv.addWeighted(bytesCanvas, 1, blur, 0.4, 0, bytesCanvas);

            blur.delete(); tarCanvas.delete();
            $('#srchairafter').show();
            cv.imshow('srchairafter', bytesCanvas);
            bytesCanvas.delete();
        }
    </script>
@endsection
