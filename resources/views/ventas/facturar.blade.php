@extends('layout')
@section('title','Crear orden de compra')

@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Factura <small>Facturacion para cliente</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
      </div>
      <div class="x_content">


          <section class="content">
              <div class="col-lg-12">
                <!--CODIGO-->
                  @csrf
                  <div class="row col-md-3 col-sm-3 col-lg-3 " >
                    <label>No. Documento del cliente</label>
                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
                    <input id="documento" placeholder="No. de documento" class="form-control has-feedback-left  {{ $errors->has('documento') ? 'is-invalid' : '' }}">
                      <span class="fa fa-id-card  form-control-feedback left blue" aria-hidden="true"></span>
                      @error('documento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
              </div>
          </section>
          <section class="content invoice">
            <div class="row invoice-info col-lg-12 col-md-12 col-sm-12 p-3">
                <!-- /.col -->
          			<div class="col-lg-4 col-md-4 col-sm-4" >
          				<table class="" border="0">
          				  <tr><td colspan="2"><h5>Proveedor</h5></td></tr>
          				  <tr><th>Nombre: </th><td>{{$empresa->nombre}}</td></tr>
          				  <tr><th>Nit: </th><td>{{$empresa->nit}} - {{$empresa->digito_verificacion}}</td></tr>
          				  <tr><th>Direccion: </th><td>{{$empresa->direccion}}</td></tr>
          				  <tr><th>Telfono: </th><td>{{$empresa->telefono}}</td></tr>
          				  <tr><th>Email: </th><td>{{$empresa->email}}</td></tr>
          				</table>
          			</div>
                        <!-- /.col -->
                          <!-- /.col -->
          			<div class="col-lg-4 col-md-4 col-sm-4">
          				<table class="" border="0">
          				  <tr><td colspan="2"><h5>Cliente</h5></td></tr>
          				  <tr><th>Nombre: </th><td><nombre></nombre></td></tr>
          				  <tr><th>Documento: </th><td><documento></documento></td></tr>
          				  <tr><th>Direccion: </th><td><direccion></direccion></td></tr>
          				  <tr><th>Telfono: </th><td><telefono></telefono></td></tr>
          				  <tr><th>Email: </th><td><email></email></td></tr>
          				</table>
          			</div>
    			              <!-- /.col -->
    		        <div class="col-lg-4 col-md-4 col-sm-4">
    			        <table class="" border="0">
    							  <tr><td colspan="2"><h5>Factura</h5></td></tr>
    							  <tr><th>Numero: </th><td>{{$numero_factura}}</td></tr>
    							  <tr><th>Fecha: </th><td>{{$fecha_factura}}</td></tr>
    							  <tr><th>Medio de pago: </th><td>Efectivo</td></tr>
    							  <tr><th>Fecha vencimiento: </th><td>30 dias a partir de la fecha</td></tr>
    							</table>
    		        </div>
    	              <!-- /.col -->
                <div class="p-3"></div>

                <factura></factura>
            </div>
          </section>

      </div>
    </div>
  </div>
</div>
@endsection
@section('components')
<script src="../components/todo.riot" type="riot"></script>

<script>
        riot.compile()
          .then(() => {
            riot.mount('factura')
             var options = {
              url: function (phrase) {
                  return baseUrl()+'findclient/'+phrase;
                },
               getValue: "documento",
                  /*onClickEvent: function() {
                     var e = $("#documento").getSelectedItemData();
                     alert('saludo');
                     $("nombre").text(nombre+" "+apellidos);
                     $("documento").text(e.documento);
                     $("direccion").text(e.direccion);
                     $("telefono").text(e.telefono);
                     $("email").text(e.email);

                },*/
                template: {
                    type: "description",
                    fields: {
                        description: "nombre"
                    }
                },

                list: {
                    match: {
                        enabled: false
                    },
                    onKeyEnterEvent: function() {
                        var e = $("#documento").getSelectedItemData();
                        $("nombre").text(e.nombre+" "+e.apellidos);
                         $("documento").text(e.documento);
                         $("direccion").text(e.direccion);
                         $("telefono").text(e.telefono);
                         $("email").text(e.email);
                    },
                    onClickEvent: function() {
                        var e = $("#documento").getSelectedItemData();
                        $("nombre").text(e.nombre+" "+e.apellidos);
                         $("documento").text(e.documento);
                         $("direccion").text(e.direccion);
                         $("telefono").text(e.telefono);
                         $("email").text(e.email);
                    },
                    showAnimation: {
                          type: "fade", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        },

                        hideAnimation: {
                          type: "slide", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        }

                },
                autoSelect: true,

                theme: "plate-dark"
             };
             $("#documento").easyAutocomplete(options);
          });


</script>

@endsection
@push('styles')

@endpush

@push('scripts')

@endpush
