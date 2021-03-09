@extends("website.layout.website")
@section("title") Home @endsection
@section("content")

    <div class="site-section">
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
                    </div>
                </div>
                <div class="col-md-6 text-center mb-5">
                    <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                        <span class="icon flaticon-shave display-3 text-primary mb-4 d-block"></span>
                        <h3 class="text-black h4">Clothes</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum exercitationem quae id dolorum debitis.</p>
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
                    <p class="mb-0"><a href="{{route('service').'#site-section-service'}}" class="btn btn-primary py-3 px-5 text-white">Try Now</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
