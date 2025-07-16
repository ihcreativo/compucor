@extends('compucor.bonesHome')
@section('style')
<style>
  
</style>
@endsection
@section('title')
Contactanos
@endsection

@section('content')
<br><br><br><br><br>
<section class="container pt-5">
        <div class="title-box"><h1 class="block-title wow animated rollIn animated" style="visibility: visible; animation-name: rollIn;">
          <span class="bb-top-left"></span>
          <span class="bb-bottom-left"></span>
          CONTACTANOS
          <span class="bb-top-right"></span>
          <span class="bb-bottom-right"></span>
          </h1>
        </div>
</section>

<section class="subscribe">
    <div class="container p-5 my-5 mx-5 shadow text-center">
      <h5 class="fs-1">&nbsp;&nbsp;&nbsp;&nbsp;SEDE PRINCIPAL</h5>
      <p class="fs-5"><i class="bi bi-signpost"></i> &nbsp;Calle 29 # 41 - 64 Barrio Villa Caribe 
        <br> &nbsp;&nbsp;&nbsp;&nbsp; Montería - Córdoba  &nbsp;<img src="img/bandera.png"></p>
      <p class="fs-5"><i class="bi bi-envelope"></i> &nbsp;info@recicol.com</p>
      <p class="fs-5"> <i class="bi bi-telephone"></i> &nbsp;Teléfono:  3156493385</p>
      <p class="fs-5"> <i class="bi bi-whatsapp"></i> &nbsp;WhatsApp: 3156493385</p>
      <p class="fs-5">
        <i class="bi bi-calendar-week"></i> &nbsp; HORARIO DE ATENCION <br>  
        Lunes a Viernes ( 7:00AM  -  12:00 PM Y 2:00 A 5:30 PM )
        <br>
        Sabados : ( 7:00 AM A 12:00 PM )
      </p>
  </div>
</section>
<div class="d-sm-block d-lg-none">
    <img src="img/contactos_sm.png" class="img-fluid" alt="">
</div>
<div class="d-none d-lg-block ">
    <img src="img/contactos.png" class="img-fluid" alt="">
</div>
<section class="" style="background-color: #f0f0f0;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2938.687449457691!2d-75.88409675948833!3d8.7568089238796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e5a2fe628d40a87%3A0xac6c7ecf283d1901!2sComputadores%20de%20C%C3%B3rdoba!5e0!3m2!1ses-419!2sco!4v1751928298127!5m2!1ses-419!2sco" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<div class="container">
   
</div>
<form method="POST" class="" action="">
    @csrf {{-- Cross-Site Request Forgery protection --}}
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message" required></textarea><br>

    <input type="submit" value="Submit">
</form>

@endsection
