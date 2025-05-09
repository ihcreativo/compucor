@extends('compucor.bonesHome')
@section('style')
<style>
  
</style>
@endsection
@section('title')
Contactanos
@endsection
@section('content')
<div class="d-sm-block d-lg-none">
    <img src="img/contactos_sm.png" class="img-fluid" alt="">
</div>
<div class="d-none d-lg-block ">
    <img src="img/contactos.png" class="img-fluid" alt="">
</div>
<div class="container">
    <div class="card p-5 my-5 mx-5 shadow text-center">
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
</div>
<form method="POST" class="d-none" action="">
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
