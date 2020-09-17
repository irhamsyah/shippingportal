@extends('layouts.page_main')

@section('content')
<section class="features18 popup-btn-cards cid-s9mp3oMIIm" id="features18-1z">
    <div class="container">
      <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">
          LAYANAN KAMI</h2>
      <h3 class="mbr-section-subtitle display-5 align-center mbr-fonts-style mbr-light"><p>
          Sebagai perusahaan shipping logistic (shiplog), BAHTERA SETIA memberika solusi layanan pengiriman logistik yang tersedia sesuai dengan kebutuhan</p></h3>
    </div>
</section>
<?php
  $index=0;
?>
<section class="features18 popup-btn-cards cid-s9mp3oMIIm" id="features18-1z">
    <div class="container">
      <div class="row">
        @foreach($services as $index => $service)
        <div class="card p-3 col-sm-12 col-md-6">
            <div class="card-wrapper ">
                <div class="card-img">
                    <div class="mbr-overlay"></div>
                    <div class="mbr-section-btn text-center"><a href="/contact" class="btn btn-primary display-4">PESAN SEKARANG</a></div>
                    <img src="{{ asset('img/service/'.$service->img_title) }}" alt="Mobirise">
                </div>
                <div class="card-box">
                    <h4 class="card-title mbr-fonts-style display-7">{{ $service->title }}</h4>
                    <p class="mbr-text mbr-fonts-style align-left display-7">
                        {!! $service->detail !!}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>
</section>

@endsection
