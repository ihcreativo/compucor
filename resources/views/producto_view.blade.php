@extends('compucor.bonesHome')
@section('style')
<style>
  
</style>
@endsection
@section('title')
Contactanos
@endsection
@section('content')
<br>
<br><br><br>
<section id="features_" class="text-center">
    <img src="{{asset('assets/img/samsung.png')}}" id="im" alt="">
    <img src="{{asset('assets/img/lg.png')}}" id="im" alt="">
    <img src="{{asset('assets/img/acer.png')}}" id="im" alt="">
    <img src="{{asset('assets/img/dell.png')}}" id="im" alt="">
    <img src="{{asset('assets/img/asus.png')}}" id="im" alt="">
    <img src="{{asset('assets/img/apple.png')}}" id="im" alt="">
    <img src="{{asset('assets/img/hp.png')}}" id="im" alt="">
    <img src="{{asset('assets/img/lenovo.png')}}" id="im" alt="">
    <img src="{{asset('assets/img/intel.png')}}" id="im" alt="">
    <img src="{{asset('assets/img/amd.png')}}" id="im" alt="">
</section>

<section id="app" class="px-3 mx-3">
    <producto_view path="{{route('login.index')}}" id="{{$id}}"></producto_view>
</section>

<section id="gallery" class="block">
    <section class="container">
        <section class="row">
            <div class="col-xs-12">
                <div id="screenshots" class="owl-carousel owl-theme">
                    @foreach ($datos as $ctt)
                        <div class="item">
                            <a href="categoria/{{$ctt->slug}}">
                                <img src="{{route('login.index')}}/catalogo_all/{{$ctt->banner}}" class="img_res wow animated zoomIn">
                            </a>
                        </div>
                    @endforeach  
                </div>
                <div class="customNavigation">
                <a class="btn prev gallery-nav wow animated bounceInLeft"><i class="ion-ios-arrow-left"></i></a> 
                <a class="btn next gallery-nav wow animated bounceInRight"><i class="ion-ios-arrow-right"></i></a>
            </div>
            </div>
        </section>
    </section>
</section>
@endsection
