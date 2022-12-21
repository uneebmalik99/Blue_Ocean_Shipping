@if ($images)
{{-- <img src="{{asset(@$images[0]['name'])}}" alt="" style="width:800px!important;height: 455px!important;"> --}}
<div class="mySlides" style="width:auto!important"; id="slider_main">
    <img src="{{asset(@$images[0]['name'])}}" alt=""
        style="width:800px!important;height: 455px!important;">
</div>
@foreach(@$images as $img) 
<div class="mySlides col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12"style="left:-2%;width:80%!important">
    <img src="{{ asset($img['name']) }}" alt=""
        style="width:137%!important;height: 455px!important;"
        onclick="openModal();currentSlide(1)">
</div>
@endforeach

@endif