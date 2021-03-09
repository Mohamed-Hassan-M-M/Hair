<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar py-1" role="banner">

    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-6 col-xl-2" data-aos="fade-down">
                <h1 class="mb-0">
                    <a href="{{route('website')}}" class="text-black h2 mb-0">
                        <img src="{{asset('website/images/logo-dark.png')}}" alt="Magic Mirror Logo">
                    </a>
                </h1>
            </div>
            <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
                <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li class=" @if(\Illuminate\Support\Facades\Request::is('/')) active @endif "><a href="{{route('website')}}">Home</a></li>
                        <li class=" @if(\Illuminate\Support\Facades\Request::is('hair*')) active @endif "><a href="">Haircut</a></li>
                        <li class=" @if(\Illuminate\Support\Facades\Request::is('clothes*')) active @endif "><a href="">Clothes</a></li>
                        <li class=" @if(\Illuminate\Support\Facades\Request::is('service*')) active @endif "><a href="{{route('service')}}">Services</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
                <div class="d-none d-xl-inline-block">
                    <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                        <li>
                            <a href="#" class="pl-0 pr-3 text-black"><span class="icon-facebook"></span></a>
                        </li>
                        <li>
                            <a href="#" class="pl-3 pr-3 text-black"><span class="icon-twitter"></span></a>
                        </li>
                        <li>
                            <a href="#" class="pl-3 pr-3 text-black"><span class="icon-instagram"></span></a>
                        </li>
                        <li>
                            <a href="#" class="pl-3 pr-3 text-black"><span class="icon-youtube-play"></span></a>
                        </li>
                    </ul>
                </div>

                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

            </div>

        </div>
    </div>

</header>
