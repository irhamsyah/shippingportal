@extends('layouts.page_main')

@section('content')
<section class="features18 popup-btn-cards cid-s9mp3oMIIm" id="features18-1z">
    <div class="container">
      <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">
          {{ __('service.service_title') }}</h2>
      <h3 class="mbr-section-subtitle display-5 align-center mbr-fonts-style mbr-light"><p>
          {{ __('service.service_desc') }}</p></h3>
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
                    <div class="mbr-section-btn text-center"><a href="/contact" class="btn btn-primary display-4">{{ __('service.pesan') }}</a></div>
                    <img src="{{ asset('img/service/'.$service->img_title) }}" alt="Mobirise">
                </div>
                <div class="card-box">
                    <h4 class="card-title mbr-fonts-style display-7">{{ $service->title }}</h4>
                    <p class="mbr-text mbr-fonts-style align-left display-7">
                      <?php
                        $loc=app()->getLocale();
                        //check locatization
                        if($loc=='en'){$detail='detail_en';}else{$detail='detail_id';}
                      ?>
                        {!! $service->$detail !!}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>
</section>

@endsection
