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


@endsection
