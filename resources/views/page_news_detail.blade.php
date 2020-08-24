<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.12.4, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.12.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{ '../assets/images/logo-coba-150x108.png' }}" type="image/x-icon">
  <meta name="description" content="">


  <title>Tracking</title>
  <link rel="stylesheet" href="{{'../assets/web/assets/mobirise-icons/mobirise-icons.css'}}">
  <link rel="stylesheet" href="{{'../assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css'}}">
  <link rel="stylesheet" href="{{'../assets/bootstrap/css/bootstrap.min.css'}}">
  <link rel="stylesheet" href="{{'../assets/bootstrap/css/bootstrap-grid.min.css'}}">
  <link rel="stylesheet" href="{{'../assets/bootstrap/css/bootstrap-reboot.min.css'}}">
  <link rel="stylesheet" href="{{'../assets/facebook-plugin/style.css'}}">
  <link rel="stylesheet" href="{{'../assets/dropdown/css/style.css'}}">
  <link rel="stylesheet" href="{{'../assets/tether/tether.min.css'}}">
  <link rel="stylesheet" href="{{'../assets/socicon/css/styles.css'}}">
  <link rel="stylesheet" href="{{'../assets/theme/css/style.css'}}">
  <link rel="preload" as="style" href="{{'../assets/mobirise/css/mbr-additional.css'}}">
  <link rel="stylesheet" href="{{'../assets/mobirise/css/mbr-additional.css'}}" type="text/css">



</head>
<body>
  <section class="menu cid-s4m48Yx6UN" once="menu" id="menu2-y">
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
                        <img src="../assets/images/logo-coba-150x108.png" alt="Mobirise" title="" style="height: 4rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-5" href="index.html">
                        PT. XXXXX</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
              <li class="nav-item">
                <a class="nav-link link text-black display-4" href="/#content4-7"><span class="mbrib-extension mbr-iconfont mbr-iconfont-btn"></span>Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-black display-4" href="/#features1-c"><span class="mbrib-delivery mbr-iconfont mbr-iconfont-btn"></span>Layanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-black display-4" href="/tracking.html"><span class="mbrib-search mbr-iconfont mbr-iconfont-btn"></span>Lacak Kargo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link text-black display-4" href="/news.html"><span class="mbri-paper-plane mbr-iconfont mbr-iconfont-btn"></span>Berita</a>
              </li>
            </ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="https://wa.me/6281333110886"><span class="socicon socicon-whatsapp mbr-iconfont mbr-iconfont-btn"></span>Live Chat</a></div>
        </div>
    </nav>
  </section>

<section class="services2 cid-s4VrqTpZSQ" id="services2-1a">
  <!--Container-->
  <div class="container">
    @foreach($newss as $index => $news)
      <div class="col-md-12">
          <div class="media-container-row">
              <div class="mbr-figure">
                  <img src="../img/news/{{ $news->img_title }}" alt="img_news" style="max-width: 600px;">
              </div>
          </div>
          <div class="media-container-row">
              <div class="align-left aside-content">
                  <h5 class="mbr-title pt-2 mbr-fonts-style display-2">{!! $news->title !!}</h5>
                  <div class="mbr-section-text">
                      <p class="mbr-text text1 pt-2 mbr-light mbr-fonts-style display-7">{!! $news->text !!}</p>
                  </div>
                  <p class="mbr-text text1 pt-2 mbr-light mbr-fonts-style display-7">{{  'Kategori : '.$news->category_name.' | Redaksi : '.$news->user_name }}</p>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</section>

<section class="services6 cid-s4Vrww86q1" id="services6-1b">
    <!--Container-->
    <div class="container">
        <div class="row">
            <!--Titles-->
            <div class="title col-12">
                <h2 class="align-left mbr-fonts-style m-0 display-1">Kilas berita maritim</h2>

            </div>
            <!--Card-1-->
            <div class="card col-12 pb-5">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <!--Image-->
                                <div class="mbr-figure">
                                    <img src="../assets/images/product1.jpg" alt="Mobirise">
                                </div>
                            </div>
                            <div class="col-12 col-md-10">
                                <div class="wrapper">
                                    <div class="top-line pb-3">
                                        <h4 class="card-title mbr-fonts-style display-5">&nbsp;DERMAGA 2 SIAP DI BUKA KEMBALI</h4>
                                        <p class="mbr-text cost mbr-fonts-style m-0 display-5">
                                            <a href="news.html?id=3" >Selengkapnya</a>
                                        </p>
                                    </div>
                                    <div class="bottom-line">
                                        <p class="mbr-text mbr-fonts-style display-7">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, odit?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Card-2-->
            <div class="card col-12 pb-5">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <!--Image-->
                                <div class="mbr-figure">
                                    <img src="../assets/images/product1.jpg" alt="Mobirise">
                                </div>
                            </div>
                            <div class="col-12 col-md-10">
                                <div class="wrapper">
                                    <div class="top-line pb-3">
                                        <h4 class="card-title mbr-fonts-style display-5">PT. XXXXX BERENCANA BUKA KEMBALI 4 CABANG BARU</h4>
                                        <p class="mbr-text cost mbr-fonts-style m-0 display-5">
                                            <a href="news.html?id=1" >Selengkapnya</a>
                                        </p>
                                    </div>
                                    <div class="bottom-line">
                                        <p class="mbr-text mbr-fonts-style display-7">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, odit?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Card-3-->
            <div class="card col-12">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <!--Image-->
                                <div class="mbr-figure">
                                    <img src="../assets/images/product1.jpg" alt="Mobirise">
                                </div>
                            </div>
                            <div class="col-12 col-md-10">
                                <div class="wrapper">
                                    <div class="top-line pb-3">
                                        <h4 class="card-title mbr-fonts-style display-5">MENTERI KELAUTAN TARGETKAN AGUSTUS PEMBANGUNAN TERMINAL PETIKEMAS SELESAI</h4>
                                        <p class="mbr-text cost mbr-fonts-style m-0 display-5">
                                            <a href="news.html?id=2" >Selengkapnya</a>
                                        </p>
                                    </div>
                                    <div class="bottom-line">
                                        <p class="mbr-text mbr-fonts-style display-7">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, odit?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Card-4-->

            <!--Card-5-->

            <!--Card-6-->

        </div>
    </div>
</section>

<section once="footers" class="cid-s4mg6Rh7O6" id="footer7-z">

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

                            <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon"></span>

                    </div><div class="soc-item">

                            <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>

                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                  <strong>Copyright &copy; 2020 <a href="#">Shipping Portal</a>.</strong>
                  All rights reserved.
                </p>
            </div>
        </div>
    </div>
</section>


  <script src="{{'../assets/popper/popper.min.js'}}"></script>
  <script src="{{'../assets/web/assets/jquery/jquery.min.js'}}"></script>
  <script src="{{'../assets/bootstrap/js/bootstrap.min.js'}}"></script>
  <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script>
  <script src="https://apis.google.com/js/plusone.js"></script>
  <script src="{{'../assets/facebook-plugin/facebook-script.js'}}"></script>
  <script src="{{'../assets/smoothscroll/smooth-scroll.js'}}"></script>
  <script src="{{'../assets/touchswipe/jquery.touch-swipe.min.js'}}"></script>
  <script src="{{'../assets/ytplayer/jquery.mb.ytplayer.min.js'}}"></script>
  <script src="{{'../assets/vimeoplayer/jquery.mb.vimeo_player.js'}}"></script>
  <script src="{{'../assets/dropdown/js/nav-dropdown.js'}}"></script>
  <script src="{{'../assets/dropdown/js/navbar-dropdown.js'}}"></script>
  <script src="{{'../assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js'}}"></script>
  <script src="{{'../assets/mbr-testimonials-slider/mbr-testimonials-slider.js'}}"></script>
  <script src="{{'../assets/mbr-clients-slider/mbr-clients-slider.js'}}"></script>
  <script src="{{'../assets/parallax/jarallax.min.js'}}"></script>
  <script src="{{'../assets/tether/tether.min.j'}}s"></script>
  <script src="{{'../assets/theme/js/script.js'}}"></script>
  <script src="{{'../assets/slidervideo/script.js'}}"></script>


</body>
</html>
