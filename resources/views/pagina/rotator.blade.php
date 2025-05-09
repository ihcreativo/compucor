<span class="d-none">{{$x = 1}} {{$t=0}}</span>
<div id="demo" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach ($banner as $b)
        <button type="button" data-bs-target="#demo" data-bs-slide-to="{{$t}}" class=@if($x == 1) active @endif></button>
        <span class="d-none">{{$t++}}</span>
        {{-- <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button> --}}
      @endforeach
    </div>

    <div class="carousel-inner bg-dark">
      @foreach ($banner as $b)
      <div class="carousel-item @if($x == 1) active @endif">
        {{-- <img src="banner/2_.jpg" alt="Los Angeles" class=" d-sm-block d-lg-none  w-100">  --}}
        <img src="{{$b->url}}" alt="Los Angeles" class="d-none d-lg-block  w-100">
        <div class="carousel-caption text-dark">
          
          <span class="d-none">{{$x++}}</span>
        </div>
      </div>
      @endforeach
    </div> 

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  