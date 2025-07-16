@extends('compucor.bonesHome')
@section('style')
<style>
	.thum{width: 200px !important}
</style>
@endsection
@section('title')
C O M P U C O R
@endsection
@section('content')

	<!-- ****************************** Features Section ************************** -->
	<section id="features_" class="text-center">
		<img src="assets/img/samsung.png" id="im" alt="">
		<img src="assets/img/lg.png" id="im" alt="">
		<img src="assets/img/acer.png" id="im" alt="">
		<img src="assets/img/dell.png" id="im" alt="">
		<img src="assets/img/asus.png" id="im" alt="">
		<img src="assets/img/apple.png" id="im" alt="">
		<img src="assets/img/hp.png" id="im" alt="">
		<img src="assets/img/lenovo.png" id="im" alt="">
		<img src="assets/img/intel.png" id="im" alt="">
		<img src="assets/img/amd.png" id="im" alt="">
	</section>
	<section id="subscribe_">
		<div class="text-center">
			<h5 class="block-title wow animated rollIn">
				<span class="bb-top-left"></span>
				<span class="bb-bottom-left"></span>
				COMPUTADORES DE CORDOBA
				<span class="bb-top-right"></span>
				<span class="bb-bottom-right"></span>
			</h5>
		</div>
		<section class="container">
			<section class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<br>
					<p class="susbcribe-text">
						Somos una empresa con más de 20 años de experiencia en el sector tecnológico. Desde nuestros inicios, nos hemos enfocado en ser un aliado confiable para hogares, empresas e instituciones que buscan soluciones tecnológicas efectivas, accesibles y de alta calidad.
					</p>
				</div>
			</section>
		</section>
		 
	</section>
	<section id="feature" class="block">
		<section class="testimonial" id="app">
			<section class="row">
				<div class="title-box">
					<h1 class="block-title wow animated rollIn">
					<span class="bb-top-left"></span>
					<span class="bb-bottom-left"></span>
					OFERTAS COMPUCOR
					<span class="bb-top-right"></span>
					<span class="bb-bottom-right"></span>
					</h1>
					<div class="">
						<productos_home path="{{route('login.index')}}"></productos_home>
					</div>
				</div>
			</section>
			
			{{-- <section class="row ">
				<div class="col-sm-6 col-md-4">
					<div class="feature-box wow animated flipInX" data-wow-delay="0.3s">
						<i class="ion-ios-settings" style="color:#9b59b6;"></i>
						<h2>Tune up</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="feature-box wow animated flipInX" data-wow-delay="0.3s">
						<i class="ion-ios-locked-outline" style="color:#d35400;"></i>
						<h2>Security</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="feature-box wow animated flipInX" data-wow-delay="0.3s">
						<i class="ion-nuclear" style="color:#00ceb8;"></i>
						<h2>Firewall</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="feature-box wow animated flipInX" data-wow-delay="0.6s">
						<i class="ion-ios-browsers-outline" style="color:#c0392b;"></i>
						<h2>HD Widgets</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="feature-box wow animated flipInX" data-wow-delay="0.6s">
						<i class="ion-ios-loop" style="color:#27ae60;"></i>
						<h2>Data Sync</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="feature-box wow animated flipInX" data-wow-delay="0.6s">
						<i class="ion-ios-glasses" style="color:#2c3e50;"></i>
						<h2>Customize</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="feature-box wow animated flipInX" data-wow-delay="0.6s">
						<i class="ion-ios-glasses" style="color:#2c3e50;"></i>
						<h2>Customize</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="feature-box wow animated flipInX" data-wow-delay="0.6s">
						<i class="ion-ios-glasses" style="color:#2c3e50;"></i>
						<h2>Customize</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
					</div>
				</div>
			</section> --}}
			<div class="clearfix"></div>
		</section>
	</section>

	<!-- ****************************** Gallery Section ************************** -->

	<section id="gallery" class="block">
		<section class="container">
			<section class="row">
				<div class="col-xs-12">
					<div id="screenshots" class="owl-carousel owl-theme">
						@foreach ($catProducto as $ctt)
							<div class="item">
								<a href="categoria/{{$ctt->slug}}">
									<img src="catalogo_all/{{$ctt->banner}}" class="img_res wow animated zoomIn">
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

	<!-- ****************************** Team Section ************************** -->

	{{-- <section id="team" class="block">
		<section class="container">
			<section class="row">
				<div class="col-md-12">
					<div class="title-box">
						<h1 class="block-title wow animated rollIn">
							<span class="bb-top-left"></span>
							<span class="bb-bottom-left"></span>
							Development Team
							<span class="bb-top-right"></span>
							<span class="bb-bottom-right"></span>
						</h1>
					</div>
				</div>
			</section>
			<section class="row">
				<section class="col-md-3 col-sm-6">
					<div class="team-member wow animated fadeIn" data-wow-delay=="0.3s">
						<img src="assets/img/dev-1.jpg" class="img_res team-pic">
						<h2 class="wow animated fadeInDown" data-wow-delay=="0.7s">Rubel Saheb</h2>
						<p class="wow animated fadeIn" data-wow-delay=="0.7s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
						<ul class="team-social">
							<li class="wow animated fadeInLeft facebook"><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li class="wow animated fadeInLeft linkedin"><a href="#"><i class="ion-social-linkedin"></i></a></li>
							<li class="wow animated fadeInRight googleplus"><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
							<li class="wow animated fadeInRight github"><a href="#"><i class="ion-social-github"></i></a></li>
						</ul>
					</div>
				</section>
				<section class="col-md-3 col-sm-6">
					<div class="team-member wow animated fadeIn" data-wow-delay=="0.3s">
						<img src="assets/img/dev-2.jpg" class="img_res team-pic">
						<h2 class="wow animated fadeInDown" data-wow-delay=="0.7s">Rubel Saheb</h2>
						<p class="wow animated fadeIn" data-wow-delay=="0.7s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
						<ul class="team-social">
							<li class="wow animated fadeInLeft facebook"><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li class="wow animated fadeInLeft linkedin"><a href="#"><i class="ion-social-linkedin"></i></a></li>
							<li class="wow animated fadeInRight googleplus"><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
							<li class="wow animated fadeInRight github"><a href="#"><i class="ion-social-github"></i></a></li>
						</ul>
					</div>
				</section>
				<section class="col-md-3 col-sm-6">
					<div class="team-member wow animated fadeIn" data-wow-delay=="0.3s">
						<img src="assets/img/dev-3.jpg" class="img_res team-pic">
						<h2 class="wow animated fadeInDown" data-wow-delay=="0.7s">Rubel Saheb</h2>
						<p class="wow animated fadeIn" data-wow-delay=="0.7s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
						<ul class="team-social">
							<li class="wow animated fadeInLeft facebook"><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li class="wow animated fadeInLeft linkedin"><a href="#"><i class="ion-social-linkedin"></i></a></li>
							<li class="wow animated fadeInRight googleplus"><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
							<li class="wow animated fadeInRight github"><a href="#"><i class="ion-social-github"></i></a></li>
						</ul>
					</div>
				</section>
				<section class="col-md-3 col-sm-6">
					<div class="team-member wow animated fadeIn" data-wow-delay=="0.3s">
						<img src="assets/img/dev-4.jpg" class="img_res team-pic">
						<h2 class="wow animated fadeInDown" data-wow-delay=="0.7s">Rubel Saheb</h2>
						<p class="wow animated fadeIn" data-wow-delay=="0.7s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
						<ul class="team-social">
							<li class="wow animated fadeInLeft facebook"><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li class="wow animated fadeInLeft linkedin"><a href="#"><i class="ion-social-linkedin"></i></a></li>
							<li class="wow animated fadeInRight googleplus"><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
							<li class="wow animated fadeInRight github"><a href="#"><i class="ion-social-github"></i></a></li>
						</ul>
					</div>
				</section>
			</section>
		</section>
	</section> --}}



	<!-- ****************************** Subscribe Section ************************** -->

@endsection
