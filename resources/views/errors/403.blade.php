@extends('layout')


@section('content')
<div class="col-md-12">
  <div class="col-middle">
    <div class="text-center text-center">
      <h1 class="error-number">403</h1>
      <h2>Acceso denegado</h2>
      <p class="alert alert-info">Mensaje:  {{ __($exception->getMessage()) }} </p>
      <p>Se requiere permisos de administrador para acceder a este modulo<br>
        Si cree que es un error contacte al administrador del sitio
       <a href="#">Report this?</a>
      </p>
      <div class="mid_center">
        <h3>Search</h3>
        <form>
          <div class="  form-group pull-right top_search">
            <div class="input-group">

              <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Regresar</button>
                  </span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection