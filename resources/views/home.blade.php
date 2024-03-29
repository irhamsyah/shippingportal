<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Site made with Mobirise Website Builder v4.12.4, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.12.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{ 'assets/images/bs2-102x107.png' }}" type="image/x-icon">
  <meta name="description" content="">


  <title>BAHTERA SETIA</title>
  <link rel="stylesheet" href="{{'assets/web/assets/mobirise-icons/mobirise-icons.css'}}">
  <link rel="stylesheet" href="{{'assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css'}}">
  <link rel="stylesheet" href="{{'assets/bootstrap/css/bootstrap.min.css'}}">
  <link rel="stylesheet" href="{{'assets/bootstrap/css/bootstrap-grid.min.css'}}">
  <link rel="stylesheet" href="{{'assets/bootstrap/css/bootstrap-reboot.min.css'}}">
  <link rel="stylesheet" href="{{'assets/facebook-plugin/style.css'}}">
  <link rel="stylesheet" href="{{'assets/dropdown/css/style.css'}}">
  <link rel="stylesheet" href="{{'assets/tether/tether.min.css'}}">
  <link rel="stylesheet" href="{{'assets/socicon/css/styles.css'}}">
  <link rel="stylesheet" href="{{'assets/theme/css/style.css'}}">
  <link rel="preload" as="style" href="{{'assets/mobirise/css/mbr-additional.css'}}">
  <link rel="stylesheet" href="{{'assets/mobirise/css/mbr-additional.css'}}" type="text/css">



</head>
<body>
  <section class="menu cid-s4m48Yx6UN" once="menu" id="menu2-3">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="/">
                        <img src="{{'assets/images/bs2-102x107.png'}}" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-5" href="/">
                        BAHTERA SETIA</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
              <li class="nav-item">
                <a class="nav-link link text-black display-4" href="/#header7-1u"><span class="mbrib-extension mbr-iconfont mbr-iconfont-btn"></span>{{ __('home.menu_tentang') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-black display-4" href="/service"><span class="mbrib-delivery mbr-iconfont mbr-iconfont-btn"></span>{{ __('home.menu_layanan') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-black display-4" href="/tracking"><span class="mbrib-search mbr-iconfont mbr-iconfont-btn"></span>{{ __('home.menu_lacak') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-black display-4" href="/news"><span class="mbri-paper-plane mbr-iconfont mbr-iconfont-btn"></span>{{ __('home.menu_berita') }}</a>
              </li>
              <li class="nav-item">
                <div class="nav-link link display-4" style="display: inline-flex;">
                  <a class="{{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ route('localization.switch', 'en') }}">EN</a>
                  <a class="{{ app()->getLocale() == 'id' ? 'active' : '' }}" href="{{ route('localization.switch', 'id') }}">ID</a>
                </div>
              </li>
            </ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="https://wa.me/6281333110886"><span class="socicon socicon-whatsapp mbr-iconfont mbr-iconfont-btn"></span>Live Chat</a></div>
        </div>
    </nav>
</section>

<section class="carousel slide cid-s4m4lPuCAG" data-interval="false" id="slider1-5">
    <div class="full-screen">
      <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="3000" data-pause="true">
        <div class="carousel-inner" role="listbox">
            <?php
                $index=0;
            ?>
          @foreach($sliders as $index => $slider)
          <div class="carousel-item slider-fullscreen-image @if($slider->id == 1) {{ 'active' }} @endif" data-bg-video-slide="false" style="background-image: url({{ asset('img/slider/'.$slider->img_title) }});">
            <div class="container container-slide">
              <div class="image_wrapper">
                <img src="{{ asset('img/slider/'.$slider->img_title) }}" alt="" title="">
                <div class="carousel-caption justify-content-center">
                  <div class="col-10 align-right"></div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <ol class="carousel-indicators">
          @for ($i = 0; $i<=$index; $i++)
              <li data-app-prevent-settings="" data-target="#slider1-5" data-slide-to="{{ $i }}"></li>
          @endfor
        </ol>
        <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider1-5">
          <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-5">
          <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

</section>

<section class="header7 cid-s9lWkXbnx3" id="header7-1u">
<div class="container">
        <div class="media-container-row">

            <div class="media-content align-right">
                <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">
                    {{ __('home.about_title') }}</h1>
                <div class="mbr-section-text mbr-white pb-3">
                    <p class="mbr-text mbr-fonts-style display-5">
                      {{ __('home.about_desc') }}</p>
                </div>

            </div>

            <div class="mbr-figure" style="width: 100%;"><iframe class="mbr-embedded-video" src="https://www.youtube.com/embed/HWhXsteYLfw?rel=0&amp;amp;showinfo=0&amp;autoplay=1&amp;loop=0" width="1280" height="720" frameborder="0" allowfullscreen></iframe></div>

        </div>
    </div>
</section>

<section class="features2 cid-s9lXoGMl5l" id="features2-1v">
    <div class="container">
        <div class="media-container-row">
          <?php
            $loc=app()->getLocale();
            //check locatization
            if($loc=='en'){$newss=$newss_en;}else{$newss=$newss_id;}
          ?>

          @foreach($newss as $index => $news)
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="{{ asset('img/news/'.$news->img_title) }}" alt="Mobirise" title="">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">{!! $news->title !!}</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {!! substr($news->text,0,250) !!}
                            <a href="news_detail/{{ $news->news_id }}"><br>{{ __('home.selengkapnya') }}</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>

<section class="mbr-section article content9 cid-s9lXT37Lf2" id="content9-1x">
    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-5">
              <a href="news">View All News</a>
            </div>
            <hr class="line" style="width: 25%;">
        </div>
        </div>
</section>

<section class="features15 cid-s9lXIX2lfZ" id="features15-1w">

    <div class="container">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">{{ __('home.service_title') }}</h2>
        <h3 class="mbr-section-subtitle display-5 align-center mbr-fonts-style">
            {{ __('home.service_slogan') }}
        </h3>

        <div class="media-container-row container pt-5 mt-2">

            <div class="col-12 col-md-6 mb-4 col-lg-3">
                <div class="card flip-card p-5 align-center">
                    <div class="card-front card_cont">
                        <img src="assets/images/8-512x600.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card_back card_cont">
                        <h4 class="card-title display-5 py-2 mbr-fonts-style">{{ __('home.service_detail_title1') }}</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {{ __('home.service_detail_desc1') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4 col-lg-3">

                <div class="card flip-card p-5 align-center">
                    <div class="card-front card_cont">
                        <img src="assets/images/7-900x1055.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card_back card_cont">
                        <h4 class="card-title py-2 mbr-fonts-style display-5">
                            {{ __('home.service_detail_title2') }}</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {{ __('home.service_detail_desc2') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4 col-lg-3">
                <div class="card flip-card p-5 align-center">
                    <div class="card-front card_cont">
                        <img src="assets/images/3-900x1055.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card_back card_cont">
                        <h4 class="card-title py-2 mbr-fonts-style display-5">
                            {{ __('home.service_detail_title3') }}</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {{ __('home.service_detail_desc3') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4 col-lg-3">
                <div class="card flip-card p-5 align-center">
                    <div class="card-front card_cont">
                        <img src="assets/images/4-900x1055.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card_back card_cont">
                        <h4 class="card-title py-2 mbr-fonts-style display-5">
                            {{ __('home.service_detail_title4') }}</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                          {{ __('home.service_detail_desc4') }}</p>
                    </div>
                </div>
            </div>
        </div>
</div></section>

<section class="carousel slide testimonials-slider cid-s4moDU74iK" data-interval="false" id="testimonials-slider1-k">
    <div class="container text-center">
        <div class="carousel slide" role="listbox" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
              @foreach($testimonis as $index => $testimoni)
              <div class="carousel-item">
                <div class="user col-md-8">
                  <div class="user_image">
                      <img src="{{ asset('img/testimoni/'.$testimoni->img_testimoni) }}" alt="" title="">
                  </div>
                  <div class="user_text pb-3">
                      <p class="mbr-fonts-style display-7">{!! $testimoni->testimoni !!}</p>
                  </div>
                  <div class="user_name mbr-bold pb-2 mbr-fonts-style display-7">
                      {{ $testimoni->name }}</div>
                  <div class="user_desk mbr-light mbr-fonts-style display-7">
                      {{ $testimoni->position }}</div>
                  </div>
                </div>
                @endforeach
              </div>

            <div class="carousel-controls">
                <a class="carousel-control-prev" role="button" data-slide="prev">
                  <span aria-hidden="true" class="mbri-arrow-prev mbr-iconfont"></span>
                  <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" role="button" data-slide="next">
                  <span aria-hidden="true" class="mbri-arrow-next mbr-iconfont"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="clients cid-s4m6BDZgye mbr-parallax-background" data-interval="false" id="clients-9">


    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(255, 255, 255);">
    </div>
        <div class="container mb-5">
            <div class="media-container-row">
                <div class="col-12 align-center">
                    <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2">
                        {{ __('home.klien_title') }}</h2>
                    <h3 class="mbr-section-subtitle mbr-light mbr-fonts-style display-5">{{ __('home.klien_info') }}</h3>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="carousel slide" role="listbox" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner" data-visible="6">
            <div class="carousel-item ">
                    <div class="media-container-row">
                        <div class="col-md-12">
                            <div class="wrap-img ">
                                <img src="assets/images/1200px-cmyk-logo-01-pngs-1200x1108.png" class="img-responsive clients-img" alt="" title="">
                            </div>
                        </div>
                    </div>
                </div><div class="carousel-item ">
                    <div class="media-container-row">
                        <div class="col-md-12">
                            <div class="wrap-img ">
                                <img src="assets/images/pnm-240x92.png" class="img-responsive clients-img" alt="" title="">
                            </div>
                        </div>
                    </div>
                </div><div class="carousel-item ">
                    <div class="media-container-row">
                        <div class="col-md-12">
                            <div class="wrap-img ">
                                <img src="assets/images/pp-1600x989.png" class="img-responsive clients-img" alt="" title="">
                            </div>
                        </div>
                    </div>
                </div><div class="carousel-item ">
                    <div class="media-container-row">
                        <div class="col-md-12">
                            <div class="wrap-img ">
                                <img src="assets/images/logo-wika-1929x1563.png" class="img-responsive clients-img" alt="" title="">
                            </div>
                        </div>
                    </div>
                </div><div class="carousel-item ">
                    <div class="media-container-row">
                        <div class="col-md-12">
                            <div class="wrap-img ">
                                <img src="assets/images/jaya-beton-ok-1772x591.png" class="img-responsive clients-img" alt="" title="">
                            </div>
                        </div>
                    </div>
                </div><div class="carousel-item ">
                    <div class="media-container-row">
                        <div class="col-md-12">
                            <div class="wrap-img ">
                                <img src="assets/images/adhimix-logo-0c600d7c5e0d84881b2d1ebed01de2a83e7742bf6a6c1e9078d806264c9c1e5c-1501x777.png" class="img-responsive clients-img" alt="" title="">
                            </div>
                        </div>
                    </div>
                </div></div>
            <div class="carousel-controls">
                <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev">
                    <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next">
                    <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="cid-s4mgVxxJsb" id="footer2-h">
    <div class="container">
        <div class="media-container-row content mbr-white">
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <p class="mbr-text">
                    <strong>Address</strong>
                    <br>
                    <br>Jl. Yos Sudarso Blok II/10, Pulopancikan, Kebungson, Kec. Gresik, Kabupaten Gresik, Jawa Timur 61114<br>
                    <br>
                    <br><strong>Contacts</strong>
                    <br>
                    <br>Email: support@ptxxxxx.com
                    <br>Phone: +62 1234567 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>Fax: +62 31 9876543</p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <p class="mbr-text">
                    <strong>Links</strong>
                    <br>
                    <br>Gallery<br>Catalog<br><br>
                    <br><strong>Feedback</strong>
                    <br>
                    <br>Please send us your ideas, bug reports, suggestions! Any feedback would be appreciated.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15834.979148510152!2d112.6596961!3d-7.1554781!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x912eabca7968720d!2sPT.%20Bahtera%20Setia%20Gresik!5e0!3m2!1sid!2sid!4v1598980865702!5m2!1sid!2sid" allowfullscreen=""></iframe></div>
            </div>
        </div>

    </div>
</section>

<section once="footers" class="cid-s4mg6Rh7O6" id="footer7-g">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                <li class="foot-menu-item mbr-fonts-style display-7">
                        About us
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        Services
                    </li><li class="foot-menu-item mbr-fonts-style display-7">Tracking</li></ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                <div class="soc-item">

                            <span class="mbr-iconfont mbr-iconfont-social socicon-twitter socicon"></span>

                    </div><div class="soc-item">

                            <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>

                    </div><div class="soc-item">

                            <a href="https://www.youtube.com/watch?v=LGjgD_AC-yE" target="_blank"><span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon"></span></a>

                    </div><div class="soc-item">

                            <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>

                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2020 PT. BAHTERA SETIA - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>


  <script src="{{'assets/popper/popper.min.js'}}"></script>
  <script src="{{'assets/web/assets/jquery/jquery.min.js'}}"></script>
  <script src="{{'assets/bootstrap/js/bootstrap.min.js'}}"></script>
  <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script>
  <script src="https://apis.google.com/js/plusone.js"></script>
  <script src="{{'assets/facebook-plugin/facebook-script.js'}}"></script>
  <script src="{{'assets/smoothscroll/smooth-scroll.js'}}"></script>
  <script src="{{'assets/touchswipe/jquery.touch-swipe.min.js'}}"></script>
  <script src="{{'assets/ytplayer/jquery.mb.ytplayer.min.js'}}"></script>
  <script src="{{'assets/vimeoplayer/jquery.mb.vimeo_player.js'}}"></script>
  <script src="{{'assets/dropdown/js/nav-dropdown.js'}}"></script>
  <script src="{{'assets/dropdown/js/navbar-dropdown.js'}}"></script>
  <script src="{{'assets/mbr-flip-card/mbr-flip-card.js'}}"></script>
  <script src="{{'assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js'}}"></script>
  <script src="{{'assets/mbr-testimonials-slider/mbr-testimonials-slider.js'}}"></script>
  <script src="{{'assets/mbr-clients-slider/mbr-clients-slider.js'}}"></script>
  <script src="{{'assets/parallax/jarallax.min.js'}}"></script>
  <script src="{{'assets/tether/tether.min.j'}}s"></script>
  <script src="{{'assets/theme/js/script.js'}}"></script>
  <script src="{{'assets/slidervideo/script.js'}}"></script>



</body>
</html>
